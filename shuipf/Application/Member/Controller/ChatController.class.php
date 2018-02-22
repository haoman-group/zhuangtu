<?php

namespace Member\Controller;

class ChatController extends MemberbaseController {


    protected function _initialize() {
        parent::_initialize();

        $this->RongcloudModel = D('Member/RongcloudToken');
        $this->ServiceimMessageModel = D('Member/ServiceimMessage');
        $this->shopModel = D('Shop');

    }

    public function index() {
        $shopid = I('shopid');
        $productid = I('productid');
        $order_sn = I('order_sn');
        $ischating = I('ischating');
        $uid = 451;
        if(!empty($this->userid)){
            $uid = $this->userid;
        }
        else{
            $this->error('请先登录');
        }
        if(empty($shopid)){$shopid = 442;}
        $shop = $this->shopModel->where(array('id'=>$shopid))->find();
        if(!$shop) $this->error('店铺不存在');
        if(empty($shop["logo"])){$shop["logo"] = "/statics/zt/images/hema_blueround_92_92.png";}

        if(empty($ischating)){$ischating = 0;}

        $avatar = getavatar($uid);
        $mobile = D('Member')->where(array('userid'=>$uid))->getField("mobile");
        if(empty($avatar)){$avatar = "/statics/zt/images/hema_blueround_92_92.png";}

        $rongtoken = $this->RongcloudModel->getToken($uid);

        if($uid != 451){
            $voimrecord = D('Member/ServiceimRecord')->where('uid='.$uid)->order('updatetime desc')->limit(6)->getField('id,uid,shopid,updatetime');
            foreach($voimrecord as $k=>$v){
                $voimrecord[$k]["shop"] = $this->shopModel->where(array("id"=>$v["shopid"]))->find();
            }
        }
        else{
            $voimrecord ="";
        }


        if(empty($productid)){
            $productid = 0;
        }
        else{
            $improduct = M('product')->where(array('id'=>$productid))->find();
        }

        if(empty($order_sn)){
            $order_sn = "";
        }
        else{
            $imorder = M('order')->where(array('id'=>$order_sn))->find();
        }

        if($uid != 451) {
            $recordid = D('Member/ServiceimRecord')->where(array('uid' => $uid, 'shopid' => $shopid))->getField("id");
            if (!empty($recordid)) {
                $voimmessage = $this->ServiceimMessageModel->where(array('recordid' => $recordid))->order('id')->select();
            }
        }
        else{
            $voimmessage = "";
        }

        $this->assign("ischating",$ischating);
        $this->assign("uid",$uid);
        $this->assign('voimmessage',$voimmessage);
        $this->assign('improduct',$improduct);
        $this->assign('imorder',$imorder);
        $this->assign("productid",empty($productid)?0: $productid);
        $this->assign("order_sn",empty($order_sn)?"": $order_sn);
        $this->assign("voimrecord",$voimrecord);
        $this->assign("shop",$shop);
        $this->assign("avatar",$avatar);
        $this->assign("mobile",$mobile);
        $this->assign("rongtoken",$rongtoken);
        $this->display();
    }

    public function addmsg(){
        $data['content'] = I('content');
        $data['uid'] = I('uid');
        $data['shopid'] = I('shopid');
        $data['productid'] = I('productid');
        $data['direction'] = I('direction');
        $data['order_sn'] = I("order_sn");

        $result = $this->ServiceimMessageModel->addmsg($data);
    }


    public function isread() {
        $uid = 451;
        if(!empty($this->userid)){
            $uid = $this->userid;
        }

        $rongtoken = $this->RongcloudModel->getToken($uid);

        $this->assign("uid",$uid);
        $this->assign("rongtoken",$rongtoken);
        $this->display();
    }
}



