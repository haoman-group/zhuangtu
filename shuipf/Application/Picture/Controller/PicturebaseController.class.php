<?php

namespace Picture\Controller;

use Common\Controller\Base;

class PicturebaseController extends Base {
    protected $userid = 0;
    protected $username = '';
    protected function _initialize() {
        parent::_initialize();
        $this->userid = 0;

        $this->userid = (int) service("Passport")->userid;
        $this->username = service("Passport")->username;
        if(!$this->userid) $this->error('未登录',U('Member/Seller/login'));
        $this->assign('userid', $this->userid);
        $this->assign('username', $this->username);
        
    }


}
