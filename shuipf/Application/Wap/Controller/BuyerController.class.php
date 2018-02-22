<?php

namespace Wap\Controller;

class BuyerController extends WapbaseController {

    protected function _initialize() {
        parent::_initialize();
    }

    public function index(){
        $this->display();
    }
    public function autologin(){
      $home = U('Wap/Index/index');
      $ref = I('ref');
      ($userid = I('userid')) || redirect($home);
      ($token = I('token')) || redirect($home);
      if($token<>$this->_login_encrypt($userid,$ref)){
        redirect($home);
      }
      $ref = $ref?$ref:$home;
      service('Passport')->loginLocal(intval($userid));
      redirect($ref);
    }
    private function _login_encrypt($userid,$ref){
      $key = 'd924b9f2ab3ddf2f';
      return md5('ref'.$ref.'userid'.$userid.$key);
    }


}
