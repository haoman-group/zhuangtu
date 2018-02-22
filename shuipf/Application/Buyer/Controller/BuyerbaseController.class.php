<?php
// +----------------------------------------------------------------------
// | ShuipFCMS 买家会员中心
// +----------------------------------------------------------------------
// | Action Base: 基类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Controller;
use Common\Controller\Base;
class BuyerbaseController extends Base {
    protected function _initialize() {
        parent::_initialize();
        $this->check_member();
        $this->userinfo = service("Passport")->getInfo();
    }
    /**
     * 检测用户是否已经登陆 
     */
    final public function check_member() {
        if ($this->userid == 0) {
            redirect(U('Member/Buyer/login'));
        }
    }
}
