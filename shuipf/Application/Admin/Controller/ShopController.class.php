<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 10/29/15
 * Time: 17:19
 */

namespace Admin\Controller;

use Common\Controller\AdminBase;


class ShopController extends AdminBase {

    private $shopModel = NULL;
    private $shopCategoryModel = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->shopModel = D('Member/Shop');
        $this->shopCategoryModel = D('Member/ShopCategory');
        $this->assign('status',array('-1'=>"冻结",'1'=>"正常"));
    }

    public function index() {
        $search = I('get.search', null);
        $where = array('isdelete'=>0);
        if ($search) {
            $startTime = I('get.start_time', '');
            $endTime = I('get.end_time', '');
            $whereStartTime = strtotime($startTime) ? strtotime($startTime) : 0; //开始时间
            $whereEndTime = strtotime($endTime) ? (strtotime($endTime) + 86400) : 0; //结束时间
            if ($whereStartTime and $whereEndTime) $where['updatetime'] = array('between', array($whereStartTime, $whereEndTime));
            $keyWords=I('keyword','','htmlspecialchars');
            if (! empty($keyWords)) {
                $keyType=I('type',1);//关键字类型
                switch($keyType) {
                    case 1://用户ID
                        $where['uid'] = array('EQ', $keyWords);
                        break;
                    case 2://用户名
                        $where['username'] = array('LIKE', '%' . $keyWords . '%');
                        break;
                    case 3://店铺名称
                        $where['name'] = array('LIKE', '%' . $keyWords . '%');
                        break;
                    case 4://店铺类型ID
                        $where['catid'] = array('EQ', $keyWords);
                        break;
                    case 5://站内域名
                        $where['domain'] = array('LIKE', '%' . $keyWords . '%');
                        break;
                }
            }
        }
        $count = $this->shopModel->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->shopModel->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        foreach($data as $key=>$va){
            $data[$key]['category'] = $this->shopCategoryModel->getCateNames($va['catid']);
        }
        $this->assign('Page', $page->show());
        $this->assign('data', $data);
        $this->display();
    }

    public function delete() {
        $id = I("id");
        // var_dump($id);
        if (!$id) {
            $this->error("请指定需要删除的店铺！");
        }
        foreach ($id as $key => $value) {
            $shop = $this->shopModel->where(array('id'=>$value))->find();
            if(!$shop) continue;
            // 防止出现店铺删除时，账号还是可用状态的问题
            //D('Member/Member')->where(array('userid'=>$this->userid))->setField('step',1);
            $shop['deletetime'] = time();
            M('ShopDelete')->data($shop)->add();
            $re = $this->shopModel->where(array('id'=>$value))->delete();
        }
        // if (!$re) {
        //     $this->error("删除失败");
        // }
        $this->success("删除成功！");
    }

    private function _procData() {
        ($name = I('name')) || $this->error('店铺名称必须填写');
        ($domain = I('domain')) || $this->error('店铺域名必须填写');
        $catid = I('catid');
        $data = array(
            'name' => $name,
            'domain' => $domain,
            'catid' => $catid,
            'uid'=>I('uid'),
            'rank'=>I('rank','0')
        );
        return $data;
    }

    public function edit() {

        if (IS_POST) {
            $id = I('post.id', '', '');
            $years=I("post.years");
            $star=I("post.star");
            $certification=I("certification");
            $telphone=I("post.telphone");
            //$telphone=unserialize($telphone);
            if (!$this->shopModel->where(array('id'=>$id))->count()) {
                $this->error('店铺不存在！');
            } else {
                $data = $this->_procData();
                $data['id'] = $id;
                $data['star']=$star;
                $data['certification']=$certification;
                $data['years']=$years;
                $data['telphone']=$telphone;
                $data['phone']= I('post.phone');
                $data['addr']= I('post.addr');
                $checked = $this->shopModel->checkdata($data);
                if($checked == -1){//检测店铺内容
                    $this->error("店铺名称和站内域名不能为空！");
                    return;
                }else if($checked == -2){
                    $this->error("店铺名称已存在！");
                    return;
                }else if($checked == -3){
                    $this->error("站内域名已存在！");
                    return;
                }else if($checked == -4){
                    $this->error("店铺已上传宝贝，请先彻底删除所有宝贝！");
                    return;
                }else if($checked == -5){
                    $this->error("店铺近期已发生有效交易，无法修改店铺名称！");
                    return;
                }
                $this->shopModel->create($data);
                $this->shopModel->where(array('id'=>$id))->save();
                $this->shopModel->changeType($data['uid']);
                $this->success('提交成功',U('index'));
            }
        }
        $id = I('get.id', '', '');
        $data = $this->shopModel->where(array('id'=>$id))->find();
         $data['telphone']=unserialize($data['telphone']);
        $category = $this->shopCategoryModel->getCategory();
       
        $data['catpid'] = $this->shopCategoryModel->getPid($data['catid']);
        //$this->assign("telphone",$data['telphone']);
        $this->assign('data', $data);
        $this->assign('category', $category);
        $this->display();
    }
    //批量冻结店铺
    public function lock(){
        $id = I('id');
        if(empty($id)){$this->error("请指定需要冻结的店铺！");}
        foreach ($id as $key => $value) {
            $shop = $this->shopModel->find($value);
            //批量下架
            D('Seller/Product')->where(array('uid'=>$shop['uid'],'idelete'=>'0','status'=>\Seller\Controller\Status::STATUS_SELLING))->setField('status',\Seller\Controller\Status::STATUS_VIOLATE);
            if(!$shop) continue;
            $this->shopModel->where(array('id'=>$value))->setField("status","-1");
        }
        $this->success('冻结成功');
    }
    //批量解冻店铺
    public function unlock(){
        $id = I('id');
        if(empty($id)){$this->error("请指定需要解冻的店铺！");}
        foreach ($id as $key => $value) {
            $shop = $this->shopModel->find($value);
            if(!$shop) continue;
            $this->shopModel->where(array('id'=>$value))->setField("status","1");
        }
        $this->success('解冻成功');
    }
}
