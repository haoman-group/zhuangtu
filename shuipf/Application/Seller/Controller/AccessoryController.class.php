<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 5/27/16
 * Time: 16:15
 */

namespace Seller\Controller;


class AccessoryController extends SellerbaseController {
    protected $model = NULL;
    protected $property = null;
    protected $proCate = null;

    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Seller/Product');
        $this->proCate = D('Admin/ProductCategory');
        $this->property = D('Seller/ProductProperty');
    }

    public function add() {
        if(IS_POST) {
            $maxpro = $this->model->where(array('uid'=>$this->userid))->order('id desc')->find();
            if($maxpro['addtime']>(time()-3)){
                $this->error('请勿重复提交');
            }
            $data = $this->_procData();
            if(!$this->model->create($data)){
                $this->error('提交失败:'.$this->model->getError());
            }
            $proid = $this->model->add();
            if(!$proid) $this->error('提交失败');

            $this->success('提交成功',"javascript:history.back(-1);");
        } else {
            session('detail_template',null);
            //获取类目CID
            $cid = I('get.inpcid');

            //获取类目名称
            $this->assign('categoryName',$this->proCate->getFieldByCid($cid,'name'));
            //获取属性
            $this->assign('property',$this->property->getProperty($cid));
            $this->display('Product/addAccessory');
        }
    }

    public function edit(){
        $id = I('get.id');
        if(IS_POST){
            if(!$this->model->where(array('id' => $id))->count()){
                $this->error('数据不存在！');
            }
            else{
                //删除模板session
                session('detail_template',null);
                $data = $this->_procData();
                $data['id'] = $id;
                $data['auditstatus'] = 2;  //任何修改操作 都将审核状态置为“2-待处理”

                if(!$this->model->create($data)){
                    $this->error('提交失败:'.$this->model->getError());
                }
                //过滤Cid、vid字段，不更新这两个字段
                $result = $this->model->where(array('id' => $id))->field('vid,cid',true)->save();
                $this->success('提交成功','javascript:history.back(-1);');
                return;
            }
        }
        $data = $this->model->where(array('id'=>$id))->find();

        //反序列化宝贝属性值
        $data['key_prop'] = unserialize($data['key_prop']);
        $data['starttime'] = date("Y-m-d h:i:s", $data['starttime']);
        //$data['details'] = unserialize($data['details']);
        //var_dump($data['details']);
        $data['sale_prop'] = unserialize($data['sale_prop']);
        $data['nokey_prop'] = unserialize($data['nokey_prop']);
        $data['custom_prop'] = unserialize($data['custom_prop']);
        $data['service_promise'] = unserialize($data['service_promise']);
        $data['details'] = unserialize($data['details']);
        $data['showecplay'] = htmlspecialchars_decode($data['showecplay']);
        $data['show'] = htmlspecialchars_decode($data['show']);
        $selected_prop = array();
        $selected_pics = array();
        $data['price_json'] = json_decode($data['price_json'], true);
        //颜色数组
        $colorArray =  array();
        $rowspanArray = array();
        foreach($data['price_json'] as $pkey => $pvalue) {
            foreach($pvalue as $key => $value) {
                if (array_key_exists('vid', $value)){
                    if (!array_key_exists($key, $selected_prop)) {
                        $selected_prop[$key] = array(); // selected_prop = { 分类名称: [已选分类元素列表]}
                    }
                    // 设置rowspan
                    if (!array_key_exists($key, $rowspanArray)) {
                        $rowspanArray[$key] = $pkey;
                    }
                    $data['price_json'][$pkey][$key]['rowspan'] = 1;
                    if ($data['price_json'][$rowspanArray[$key]][$key]['vid'] == $value['vid']) {
                        if ($rowspanArray[$key] != $pkey) {
                            $data['price_json'][$rowspanArray[$key]][$key]['rowspan'] += 1;
                            $data['price_json'][$pkey][$key]['rowspan'] = 0;
                        }
                    } else {
                        $rowspanArray[$key] = $pkey;
                    }
                    //判断属性名是否还有汉字
                    if(preg_match("/[\x7f-\xff]/", $key)){
                        $colorArray[$value['idx']] = $value['txt'];
                    }
                    array_push($selected_prop[$key], $value['vid']);
                    if (array_key_exists('pictures', $value) && !array_key_exists($key, $selected_pics)) {
                        $selected_pics[$value['vid']] = array();
                        foreach($value['pictures'] as $ikey=>$ivalue) {
                            $selected_pics[$value['vid']][(string)mt_rand(0, 10000)] = $ivalue;
                            //selected_pics = {颜色vid : {随机数字:图片地址, 随机数字:图片地址}}
                        }
                    }
                }
            }
        }
        $this->assign('data',$data);
        $this->assign("id",$id);
        //图像处理
        $this->assign('picture_urls',explode(",",$data['picture']));
        //获取类目名称
        $this->assign('categoryName',$this->proCate->getFieldByCid($data['cid'],'name'));
        //获取属性分类和属性值
        $this->assign('property',$this->property->getProperty($data['cid']));
        // $this->assign('category',$this->_getCateType());
        //已选择宝贝规格属性
        $this->assign('selected_prop', $selected_prop);
        $this->assign('selected_pics', $selected_pics);
        //颜色数组
        $this->assign('colorArray',$colorArray);
        $this->display('Product/addAccessory');
    }

    //处理提交数据
    private function _procData(){
        //post数据
        $data = I('post.');

        if($data['showway'] == "2"){//高级编辑
            $data['show'] = $data['showecplay'];
        }elseif($data['showway']=='3'){
            if(!$template=session('detail_template')){
                $id = I('get.id');
                if(empty($id)){//新增时必须选择模板
                    $this->error('请先选择模版');
                }
            }
            $data['showecplay'] = $template['content'];
        }

        // var_dump($data['service_promise']);
        //宝贝图片
        $data['headpic'] = $data['product_picture_url'][0];
        if($data['product_picture_url'] != ""){
            $data['picture'] = implode(',',$data['product_picture_url']);
        }else{
            $this->error("请选择宝贝图片进行上传！");
        }
        //状态
        $data['status'] = ($data['starttime_type']==1)?Status::STATUS_SELLING:Status::STATUS_NEVER;
        //当前用户
        $data['uid'] = $this->userid;
        //店铺ID
        $data['shopid'] = $this->shopid;
        //价格和价格区间
        $data['price_json'] = html_entity_decode($data['price']);
        $priceArray = json_decode(html_entity_decode($data['price']),true);
        foreach($priceArray as $price){
            //活动价
            if($data['min_price'] == 0){ $data['min_price'] = $price['price_act'] ;}
            if($data['min_price'] > $price['price_act']){ $data['min_price'] = $price['price_act'] ;}
            if($data['max_price'] < $price['price_act']){ $data['max_price'] = $price['price_act'] ;}
            //门店价
            if($data['min_price_ori'] == 0){ $data['min_price_ori'] = $price['price'] ;}
            if($data['min_price_ori'] > $price['price']){ $data['min_price_ori'] = $price['price'] ;}
            if($data['max_price_ori'] < $price['price']){ $data['max_price_ori'] = $price['price'] ;}
        }
        //产品分类
        if(!empty($data['cid'])){
            $data['proptype'] = D('Admin/ProductCategory')->getRootCate($data['cid']);
        }
        return $data;
    }

    protected function _special($data){
        foreach($data as $key => $da){
            $data[$key]['ill_reason'] = unserialize($data[$key]['ill_reason']);
            $data[$key]['num'] = $data[$key]['number'] ;
        }
        return $data;
    }
}