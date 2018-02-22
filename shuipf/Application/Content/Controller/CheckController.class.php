<?php
/**
* @class 预约验收
* @author 李冰
**/
namespace Content\Controller;

use Common\Controller\Base;
class CheckController extends Base {
    protected $model = NULL;
    protected function _initialize() {
        parent::_initialize();
    }
    //折扣折扣
    public function index() {
        $this->display();
    }
}