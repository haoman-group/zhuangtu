<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 11/2/15
 * Time: 20:00
 */

namespace Admin\Controller;

use Common\Controller\AdminBase;

class DesignLibraryController extends AdminBase {
    private $designLibraryModel = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->designLibraryModel = D('Seller/DesignLibrary');
    }

    public function index() {
        $search = I('get.search', null);
        $where = array('zt_design_library.isdelete' => 0);
        if ($search) {
            $startTime = I('get.start_time', '');
            $endTime = I('get.end_time', '');
            $whereStartTime = strtotime($startTime) ? strtotime($startTime) : 0; //开始时间
            $whereEndTime = strtotime($endTime) ? (strtotime($endTime) + 86400) : 0; //结束时间
            if ($whereStartTime and $whereEndTime) $where['addtime'] = array('between', array($whereStartTime, $whereEndTime));
            $keyWords = I('keyword', '', 'htmlspecialchars');
            if (!empty($keyWords)) {
                $keyType = I('type', 1);//关键字类型
                switch ($keyType) {
                    case 1://用户ID
                        $where['uid'] = array('EQ', $keyWords);
                        break;
                    case 2://用户名
                        $where['username'] = array('LIKE', '%' . $keyWords . '%');
                        break;
                    case 3://店铺ID
                        $shopName = $keyWords;
                        break;
                    case 4://店铺类型ID
                        $shopCatName = $keyWords;
                        break;
                    case 5://风格
                        $where['style'] = array('LIKE', '%' . $keyWords . '%');
                        break;
                }
            }
        }
        if (!empty($shopName)) {
            //需要联合查询
            $count = $this->designLibraryModel->join("zt_shop on zt_shop.name like '%" . $shopName . "%' and zt_shop.id=zt_design_library.shopid")->where($where)->field('zt_design_library.*')->count();
            $page = $this->page($count, 20);
            $data = $this->designLibraryModel->join("zt_shop on zt_shop.name like '%" . $shopName . "%' and zt_shop.id=zt_design_library.shopid")->where($where)->field('zt_design_library.*')->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
        }elseif (!empty($shopCatName)) {
            //需要联合查询
            $count = $this->designLibraryModel->join("zt_shop_category on zt_shop_category.name like '%" . $shopCatName . "%' and zt_shop_category.id=zt_design_library.shopcatid")->where($where)->field('zt_design_library.*')->count();
            $page = $this->page($count, 20);
            $data = $this->designLibraryModel->join("zt_shop_category on zt_shop_category.name like '%" . $shopCatName . "%' and zt_shop_category.id=zt_design_library.shopcatid")->where($where)->field('zt_design_library.*')->limit($page->firstRow . ',' . $page->listRows)->order(array("id" => "DESC"))->select();
        }else{
            //不需要联合查询
            $count = $this->designLibraryModel->where($where)->order('id desc')->count();
            $page = $this->page($count, 20);
            $data = $this->designLibraryModel->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        }

        foreach($data as $k=>$v) {
            $data[$k]['shopname']="--";
            $shopId=$data[$k]['shopid'];
            $shop=M('Shop');
            $shopRes=$shop->where(array('id'=>$shopId))->select();
            $shopName=$shopRes[0]['name'];
            if(!empty($shopName)){
                $data[$k]['shopname']=$shopName;
            }
            $data[$k]['shopcatname']="--";
            $shopCatId=$data[$k]['shopcatid'];
            $shop=M('ShopCategory');
            $shopCatRes=$shop->where(array('id'=>$shopCatId))->find();
            if(!empty($shopCatRes)){
                $data[$k]['shopcatname']=$shopCatRes['name'].'/'.$shopCatRes['shopname'];
            }
        }

        $this->assign('Page', $page->show());
        $this->assign('data', $data);
        $this->assign('status',array(0=>'待审核',1=>'审核通过',-1=>'不通过'));
        $this->display();
    }

    public function delete() {
        $id = I("get.id", 0, "intval");
        if (!$id) {
            $this->error("请指定需要删除的设计作品！");
        }
        $re = $this->designLibraryModel->find($id);
        if(!$re) $this->error("不存在");
        if (false == $this->designLibraryModel->where(array('id'=>$id))->delete()) {
            $this->error("删除失败");
        }
        D("Seller/Product")->where(array('id'=>$re['proid']))->setField('is_library',0);
        $this->success("删除成功！");
    }

    public function status() {
        $id = I('id',0);
        $data = $this->designLibraryModel->where(array('id'=>$id))->find();
        if(!$data) $this->error("作品不存在");
        if(IS_POST){
            $data = array('status'=>I('post.status'));
            $this->designLibraryModel->where(array('id'=>$id))->data($data)->save();
            $this->success('提交成功',U('index'));
        }else{
            $data['shopname']="--";
            $shopId=$data['shopid'];
            $shop=M('Shop');
            $shopRes=$shop->where(array('id'=>$shopId))->select();
            $shopName=$shopRes[0]['name'];
            if(!empty($shopName)){
                $data['shopname']=$shopName;
            }
            $this->assign('status',array(0=>'待审核',1=>'审核通过',-1=>'不通过'));
            $this->assign('data',$data);
            $this->display();
        }
    }
}