<?php
namespace Shop\Controller;
use Common\Controller\Base;

class DesignerController extends Base {

    protected $model = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Seller/Designer');
        $this->Productmodel = D('Seller/Product');
    }
    public function index(){
      $this->display();
    }
    public function show(){
        $id = I('get.id');
        if(empty($id)){$this->error('未指定设计师!');}
        //获取作品集数据
        $products = $this->Productmodel->getProductByDesigner($id,"1",4);
        //获取成功案例数据
        $success_products = $this->Productmodel->getProductByDesigner($id,"2",8);
        $this->assign('products',$products);
        $this->assign('success',$success_products);
        //获取设计师信息
        $Designer = $this->model->where(array('id'=>$id))->find();
        $this->assign('designer',$Designer);
        //获取域名
        $domain = D('Member/Shop')->where(array('uid'=>$Designer['uid']))->getField('domain');
        $this->assign('domain',$domain);
        $this->display('show2');
    }

}