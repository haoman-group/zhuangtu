<?php
namespace Wap\Controller;
use Common\Controller\Base;

class WapbaseController extends Base {

    protected function _initialize() {
        parent::_initialize();
        $Jssdk = new \Jssdk();
        $sign = $Jssdk->getSignPackage();
        $this->assign('sign',$sign);
        // dump($this->uid);exit;
        if(is_weixin() && !$this->userid && (strtolower(CONTROLLER_NAME)<>'wechat') && !$_SESSION['openid']){
          redirect('/Wap/Wechat/login?ref='.urlencode(__SELF__).'&noreg=1');
        }elseif(is_weixin() && $this->userid && (strtolower(CONTROLLER_NAME)<>'wechat') && !$_SESSION['openid']){
            $_SESSION['openid'] = D('Member')->getFieldByUserid($this->userid,'weixin_unionid');
        }
    }

    public function _empty(){
        $this->display();
    }
    public function rmsession(){
        $_SESSION['openid'] = NULL;
    }
    
}



