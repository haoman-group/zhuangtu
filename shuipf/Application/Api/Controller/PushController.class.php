<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 获取当前登陆信息
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

//use Common\Controller\Base;

class PushController extends ApibaseController {
    protected $model = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Member/Member');
    }
    //推送消息
    // public function testPushMsg(){
    // 	$msg = I('msg');
    // 	$userid = I('userid');
    //     $res = pushMessage($msg,'message',0,$userid);
    //     var_dump($res);
    // }
}
