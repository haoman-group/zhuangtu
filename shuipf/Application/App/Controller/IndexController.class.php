<?php

namespace App\Controller;

class IndexController extends ApibaseController {

    protected $moduleModel = NULL;
    protected $memberModel = NULL;
    protected $productModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->moduleModel = D("ShopModule");
        $this->memberModel = D('Member/Member');
        $this->productModel = D('Product');
        // if(!$this->userid) $this->error('未登录');
    }
    /** 
    * 醉优风token验证接口
    **/
    public function index(){
        
        $this->success('1');
    }


}
