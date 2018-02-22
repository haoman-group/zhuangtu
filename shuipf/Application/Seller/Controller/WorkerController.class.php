<?php
// +----------------------------------------------------------------------
// | 宝贝管理--工人类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class WorkerController extends SellerbaseController {

    protected $model = NULL;
    protected $property = NULL;
    protected $proCate = NULL;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Seller/Product');
        $this->property = D('Seller/ProductProperty');
        //产品分类表
        $this->proCate = D('Admin/ProductCategory');
        // C('TOKEN_ON',true);
    }
    
    public function add(){
      if(IS_POST){
        $maxpro = $this->model->where(array('uid'=>$this->userid))->order('id desc')->find();
        if($maxpro['addtime']>(time()-3)){
            $this->error('请勿重复提交');
        }
        // if(!session('form_member_product_add')){
        //   $this->error('请勿重复提交！');
        //   redirect('Product/addWorker');
        // }
        $data = $this->_procData();
        if(!$this->model->create($data)){
           $this->error('提交失败:'.$this->model->getError());
          return false;
        }
        $proid = $this->model->add();
        if(!$proid) $this->error('提交失败');
        session('form_member_product_add',NULL);
        $this->success('提交成功',U('Product/lists'));
      }else{
        session('form_member_product_add',md5('form_member_product_add'.time()));
          //获取类目CID
        $cid = I('get.inpcid');
        $this->assign('property',$this->property->getProperty($cid));
        // $this->assign('craftname',M('ProductCategory')->where(array('cid'=>I('get.inpcid')))->getField('name'));
        //获取类目名称
        $this->assign('categoryName',$this->proCate->getFieldByCid($cid,'name'));
        $this->display('Product/addWorker');
      }
    }
    public function edit(){
      $id = I('get.id');
      if(IS_POST){
        if(!$this->model->where(array('id' => $id))->count()){
          $this->error('数据不存在！');
        }
        else{
          $data = $this->_procData();
          $data['auditstatus'] = 2;  //任何修改操作 都将审核状态置为“2-待处理”
          $data['id'] = $id;
          if(!$this->model->create($data)){
            $this->error('提交失败:'.$this->model->getError());
          }
          $result = $this->model->where(array('id' => $id))->field('vid,cid',true)->save();
          // echo $this->model->getLastSql();
          $this->success('提交成功',U('Product/lists'));
          return;
        }
      }
        $data = $this->model->where(array('id'=>$id))->find();
          //反序列化宝贝属性值
        $data['key_prop'] = unserialize($data['key_prop']);
        //$data['details'] = unserialize($data['details']);
        //var_dump($data['details']);
        $data['starttime'] = date("Y-m-d h:i:s", $data['starttime']);
        $data['sale_prop'] = unserialize($data['sale_prop']);
        $data['nokey_prop'] = unserialize($data['nokey_prop']);
        $data['case'] = unserialize($data['case']);
        $data['service_promise'] = unserialize($data['service_promise']);
        $data['showecplay'] = htmlspecialchars_decode($data['showecplay']);
        $data['show'] = htmlspecialchars_decode($data['show']);
        // trace($data,'用户数据','debug');
         $data['price_json'] = json_decode($data['price_json'], true);
        //颜色数组
        $selected_prop = array();
        $selected_pics = array();
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
        $this->assign("id",$id);
         //已选择宝贝规格属性
        $this->assign('selected_prop', $selected_prop);
        // $this->assign('selected_pics', $selected_pics);
         //颜色数组
        $this->assign('colorArray',$colorArray);
         //获取属性分类和属性值
        $this->assign('property',$this->property->getProperty($data['cid']));
        $this->assign('data',$data);
        $this->assign('charge_type',unserialize($data['type']));
        $this->assign('picture_urls',explode(",",$data['picture']));
        // $this->assign('craftname',M('ProductCategory')->where(array('cid'=>$data['crafttype']))->getField('name'));
        //获取类目名称
        $this->assign('categoryName',$this->proCate->getFieldByCid($cid,'name'));
        $this->display('Product/addWorker');
    }
     //处理提交数据
    private function _procData(){
        //判断用户
        $shopid_post = I('shopid');
        if($shopid_post != $this->shopid){
          $this->error("无法提交,您已登陆别的店铺,请先刷新页面!");
        }
        //标题
        ($title = I('title')) || $this->error("宝贝的标题必须填写！");
        ($picture = I('product_picture_url')) || $this->error("请选择宝贝图片进行上传！");
        //工人姓名
        $workername = I('workername');
        //获取工人类型
        if(!empty(I('cid','',''))){$crafttype = I('cid','','');}
        //从业年限
        $workyears = I('workyears');
        //工人籍贯
        $hometown = I('hometown');
        //联系电话
        $phone = I('phone');
        //自我评价
        $selfevalu = I('selfevalu');
        //成功案例
        $case = serialize(I('case'));
        //付款模式
        $pay_mode = I('pay_mode','一口价');
        //宝贝规格
        // $charge_type = serialize(I('charge_type'));
         //价格和价格区间
        $price_json = html_entity_decode(I('price'));
        //拆分金额区间
        $min_price = 0;
        $max_price = 0;
        $min_price_ori = 0;
        $max_price_ori = 0;
        // foreach(I('charge_type') as $k => $ty){
        //   if($ty[0] =="on"){
        //     if($min_price == 0){ $min_price = $ty[1] ;}
        //     if($min_price > $ty[1]){ $min_price= $ty[1] ;}
        //     if($max_price < $ty[1]){ $max_price = $ty[1] ;}
        //   } 
        // }
        $priceArray = json_decode($price_json,true);
        foreach($priceArray as $price){
          if($min_price == 0){ $min_price = $price['price_act'] ;}
          if($min_price > $price['price_act']){ $min_price = $price['price_act'] ;}
          if($max_price < $price['price_act']){ $max_price = $price['price_act'] ;}

          //门店价
          if($min_price_ori == 0){ $min_price_ori = $price['price'] ;}
          if($min_price_ori > $price['price']){ $min_price_ori = $price['price'] ;}
          if($max_price_ori < $price['price']){ $max_price_ori = $price['price'] ;}
        }
        //价格活动
        $activity = I('activity');
        //图片
        $headpic = $picture[0];
        $picture = implode(',',$picture);
        //宝贝展示
        $showway = I('showway','1');
        $show = I('show','');
        $showecplay = I('showecplay','');
        //服务承诺
        $service_promise = serialize(I('service_promise'));
        //会员打折
        $is_member_discount = I('is_member_discount');
        $stock_type = I('stock_type');
        //橱窗推荐
        $is_showcase = I('is_showcase');
          //合同
        $agreement = I('agreement');
        //有效期
        $expiry_date = I('expiry_date');
        //开始时间
        $starttime_type = I('starttime_type');
         if($starttime_type == '2'){
          $starttime = I('starttime');  
        }
        //状态
        $status = (I('starttime_type')==1)?10:-1;
        //库存计数
        $track_times = I('track_times');
        $data = array(
          'uid'=>$this->userid,
          'shopid'=>$this->shopid,
          'workername'=>$workername,
          'cid'=>$crafttype,
          'proptype'=>$crafttype,
          'crafttype'=>$crafttype,
          'workyears'=>$workyears,
          'hometown'=>$hometown,
          'phone'=>$phone,
          'selfevalu'=>$selfevalu,
          'case'=>$case,
          // 'addtime'=>time(),
          'title'=>$title,
          'charge_unit'=>$charge_unit,
          'pay_mode'=>$pay_mode,
          'type'=>$charge_type,
          'picture'=>$picture,
          'headpic'=>$headpic,
          'showway'=>$showway,
          'showecplay'=>$showecplay,
          'show'=>$show,
          'video'=>$video,
          'is_member_discount'=>$is_member_discount,
          'stock_type'=>$stock_type,
          'expiry_date'=>$expiry_date,
          'is_showcase'=>$is_showcase,
          'status'=>$status,
          'starttime_type'=>$starttime_type,
          'starttime'=>$starttime,
          'min_price'=>$min_price,
          'max_price'=>$max_price,
          'service_promise'=>$service_promise,
          'agreement'=>$agreement,
          'activity'=>$activity,
          'price_json'=>$price_json,
          'key_prop'=>I('key_prop',''),
          'nokey_prop'=>I('nokey_prop',''),
          'sale_prop'=>I('sale_prop',''),
          'service_promise'=>I('service_promise'),
          'min_price_ori'=>$min_price_ori,
          'max_price_ori'=>$max_price_ori,
          '__hash__'=>I('__hash__'),
          'certification'=>I('certification'),
          'goodworker'=>I('goodworker'),
          'age'=>I('age'),
          'experience'=>I('experience'),
          'price_sys'=>I('price_sys'),
          'limitnum'=>-1,
          'case_price'=>0.00,
          'min_price_ori'=>0.00,
          'max_price_ori'=>0.00
        );
        // var_dump($data);
        return $data;
    }
    protected function _special($data){
        foreach($data as $key => $da){
            $data[$key]['ill_reason'] = unserialize($data[$key]['ill_reason']);
            $data[$key]['num'] = '/';
        }
        return $data;
    }
        
}