<?php
namespace Shop\Controller;
use Common\Controller\Base;

class PageController extends Base {

    protected $model = NULL;
    protected $shopModel = NULL;
    protected $pageModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->shopModel = D('Shop');
        $this->pageModel = D('ShopPage');
    }
  
    public function show(){
        $pageid = I('id');
        $page = $this->pageModel->where(array('id'=>$pageid))->find();
        $shopid = $page["shopid"];
        $shop = $this->shopModel->where(array('id'=>$shopid))->find();
        if(!$page) $this->error('页面不存在');
        $page['setting'] = unserialize($page['setting']);

        $this->assign('pageid',$page['id']);
        $this->assign('layout',$page['setting']['layout']);
        $this->assign('page',$page);
        $this->assign('shopInfo',$shop);
        $this->display();

    }
    

}