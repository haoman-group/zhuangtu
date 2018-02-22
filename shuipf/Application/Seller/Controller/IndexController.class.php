<?php

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class IndexController extends SellerbaseController {

    public function index() {
        $userInfo = $this->userinfo;
        if($userInfo['step'] != "8"){redirect(U("/Member/Seller/index"));}
        if(!empty($userInfo)){
            $shopInfo=D("Member/Shop")->where(array('uid'=>$userInfo['userid']))->find();
            if(!empty($shopInfo)){
                $this->assign('shopinfo',$shopInfo);
            }
            $this->assign('userinfo',$userInfo);
        }
        $this->assign('hasCard',D('Member/Member')->checkData($this->userid));
        $this->display();
    }
    public function test(){
        $data = D('ProductProperty')->getProperty(50003881);
        dump($data);
    }

   

}
