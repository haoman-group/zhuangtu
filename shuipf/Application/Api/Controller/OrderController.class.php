<?php

namespace Api\Controller;

// use Common\Controller\Base;

class OrderController extends ApibaseController {

    protected function _initialize() {
        parent::_initialize();
        $this->orderModel = D('Buyer/Order');
    }
    
    public function return_url(){
        /**
         * http类型为 Application/json, 非XMLHttpRequest的application/x-www-form-urlencoded, $_POST方式是不能获取到的
         */
        $appId = C('BEECLOUD.APP_ID');
        $appSecret = C('BEECLOUD.APP_SECRET');;
        $jsonStr = file_get_contents("php://input");

        $msg = json_decode($jsonStr);

        // webhook字段文档: https://beecloud.cn/doc/?index=webhook

        //第一步:验证签名
        $sign = md5($appId . $appSecret . $msg->timestamp);
        if ($sign != $msg->sign) {
            // 签名不正确
            exit('签名不正确');
        }


        //第二步:过滤重复的Webhook
        //客户需要根据订单号进行判重，忽略已经处理过的订单号对应的Webhook
        if($this->orderModel->getPayState($msg->transaction_id)){
         exit('已经处理过');
        }

        //第三步:验证订单金额与购买的产品实际金额是否一致
        //也就是验证调用Webhook返回的transaction_fee订单金额是否与客户服务端内部的数据库查询得到对应的产品的金额是否相同
        if(intval($msg->transaction_fee) != intval(($this->orderModel->getTotalfee($msg->transaction_id))*100)){
         exit('订单金额不一致');
        }

        //第四步:处理业务逻辑和返回
        if($msg->transaction_type == "PAY") { //支付的结果
            //付款信息
            //支付状态是否变为支付成功,true代表成功
            $result = $msg->trade_success;

            $post = array(
                'payment_code'=>$msg->sub_channel_type,
            );
            $order_list = $this->orderModel->where(array('pay_sn'=>$msg->transaction_id))->select();
            $status = $this->orderModel->changeOrderReceivePay($order_list,'buyer','',$post);
            if(!$status) {
                exit('fail');
            }

            //message_detail 参考文档
            //channel_type 微信/支付宝/银联/快钱/京东/百度/易宝/PAYPAL
            // switch ($msg->channel_type) {
            //     case "WX":
            //         /**
            //          * 处理业务
            //          */
            //         break;
            //     case "ALI":
            //         break;
            //     case "UN":
            //         break;
            //     case "KUAIQIAN":
            //         break;
            //     case "JD":
            //         break;
            //     case "BD":
            //         break;
            //     case "YEE":
            //         break;
            //     case "PAYPAL":
            //         break;
            // }
        } else if ($msg->transaction_type == "REFUND") { //退款的结果

        }

        //打印所有字段
        // print_r($msg);

        //处理消息成功,不需要持续通知此消息返回success
        echo 'success';
    }
    //H5普通下单
    public function add(){
        $msg = I('msg');//买家留言
        $cartid = I('cartid');
        $addrid = I('addrid');
        $reciver_type = I('reciver_type');
        if(empty($cartid)){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'订单产品序号不能为空!'));    
        }
        if(empty($this->userid)){
            return $this->ajaxReturn(array('status'=>-4,'msg'=>'买家ID不能为空!'));       
        }
        if(!empty($reciver_type) && $reciver_type =='1'){
            
        }else{
            if(empty($addrid)){
                return $this->ajaxReturn(array('status'=>-2,'msg'=>'地址不能为空!'));    
            }
        }
        $data = array(
                'cartid'=>$cartid,
                'addrid'=>$addrid,
                'msg'=>$msg,
                'reciver_type'=>$reciver_type
        );
        $order_info = $this->orderModel->addOrder($data,$this->userid);
        if(!$order_info){
            return $this->ajaxReturn(array('status'=>-3,'msg'=>'订单已提交！'));        
        }
        $this->pushMsgToSeller($order_info);
        return $this->ajaxReturn(array('status'=>1,'msg'=>'订单已确认成功','data'=>array('pay_sn'=>$order_info[0])));    
    }
    //H5普通下单
    public function addForMobile(){
        $userid= I('userid');
        $msg = I('msg');//买家留言
        $cartid = I('cartid');
        $addrid = I('addrid');
        $reciver_type = I('reciver_type');
        if(empty($cartid)){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'订单产品序号不能为空!'));    
        }
        if(!empty($reciver_type) && $reciver_type =='1'){
            
        }else{
            if(empty($addrid)){
                return $this->ajaxReturn(array('status'=>-2,'msg'=>'地址不能为空!'));    
            }
        }
        $data = array(
                'cartid'=>$cartid,
                'addrid'=>$addrid,
                'msg'=>$msg,
                'reciver_type'=>$reciver_type
        );
        $order_info = $this->orderModel->addOrder($data,$userid);
        if(!$order_info){
            return $this->ajaxReturn(array('status'=>-3,'msg'=>'订单提交错误！'));        
        }
        $this->pushMsgToSeller($order_info);
        return $this->ajaxReturn(array('status'=>1,'msg'=>'订单已确认成功','data'=>array('pay_sn'=>$order_info[0])));    
    }
     //H5 QR下单
    // public function addQR(){
    //     var_dump(I('request.'));
        // $msg = I('msg');//买家留言
        // $cartid = I('cartid');
        // $addrid = I('addrid');
        // if(empty($cartid)){
        //     return $this->ajaxReturn(array('status'=>-1,'msg'=>'订单产品序号不能为空!'));    
        // }
        // if(empty($addrid)){
        //     return $this->ajaxReturn(array('status'=>-2,'msg'=>'地址不能为空!'));    
        // }
        // $data = array(
        //         'cartid'=>$cartid,
        //         'addrid'=>$addrid,
        //         'msg'=>$msg
        // );
        // $order_info = $this->orderModel->addOrder($data,$this->userid);
        // if(!$order_info){
        //     return $this->ajaxReturn(array('status'=>-3,'msg'=>'订单已提交！'));        
        // }
        // return $this->ajaxReturn(array('status'=>1,'msg'=>'订单已确认成功','data'=>array('pay_sn'=>$order_info[0])));    
    // }
    //更新支付状态
    public function updatePayment(){
            $data = I('post.');
            //支付方式
            if(empty($data['payment_code'])){
                return $this->ajaxReturn(array('status'=>-1,'msg'=>'选择支付方式！'));        
            }
            $post = array(
                'payment_code'=>$data['payment_code'],
            );
            if (array_key_exists('termid', $data)) {
                $post['termid'] = $data['termid'];
            }
            $order_list = $this->orderModel->where(array('pay_sn'=>$data['pay_sn']))->select();
            if(empty($order_list)){
                return $this->ajaxReturn(array('status'=>-2,'msg'=>'支付序号不存在'));        
            }
            $this->orderModel->changeOrderReceivePay($order_list,'buyer','',$post);
            //如果支付时间不为空则更新
            if(!empty($data['payment_time'])){
                    $this->orderModel->where(array('pay_sn'=>$data['pay_sn']))->setField('payment_time',strtotime($data['payment_time']));
            }
            return $this->ajaxReturn(array('status'=>1, 'msg'=>'支付成功'));
    }
    private function pushMsgToSeller($order_info){
        if(!APP_DEBUG){
            //重置数组
            reset($order_info[1]);
            // 获取当前数组第一个元素
            $order = current($order_info[1]);
            // 获取买家id
            $seller_id = M('Shop')->where(array('id'=>$order['shop_id']))->getField('uid');
            $buyer_mobile = M('Member')->getFieldByUserid($order['buyer_id'],'mobile');
            $message = array();
            $message['msgType'] ="201";
            $message['data']['order_sn'] = $order['order_sn'];
            $message['data']['content'] = "亲爱的商家，您有一笔新订单! 用户".$order['buyer_name']."，电话".$buyer_mobile;
            pushMessage(json_encode($message,JSON_UNESCAPED_UNICODE),"message",0,$seller_id);
        }
    }
    //修改订单状态
    public function UpdateState(){
        $data = I('request.');
        if(empty($data['userid'])){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'未指定用户!'));
        }
        if(empty($data['order_sn'])){
            return $this->ajaxReturn(array('status'=>-2,'msg'=>'未指定订单号!'));   
        }
        if(!in_array($data['order_state'],array("30","35","40"))){
            return $this->ajaxReturn(array('status'=>-5,'msg'=>'错误的订单状态!'));      
        }
        if(empty($data['buyer_id'])){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'未指定买家ID!'));
        }
        $where = array("order_sn"=>$data['order_sn'],'buyer_id'=>$data['buyer_id']);
        $order = $this->orderModel->where($where)->find();
        if(!$order){
            return $this->ajaxReturn(array('status'=>-3,'msg'=>'未找到订单信息!'));      
        }
        if((int)($order['order_state']) < 20 || (int)($order['order_state']) >=40){
            return $this->ajaxReturn(array('status'=>-4,'msg'=>'订单状态不能修改!'));   
        }
        $update = array();
        $update['order_state'] = $data['order_state'];
        // $update['order_sn'] = $data['order_sn'];
        switch ($data['order_state']) {
            case '30':
                # code...
                // $update['']=
                break;
            case '35':
                # code...
                $update['setup_time']= time();
                break;
            case '40':
                $update['finnshed_time']= time();
                # code...
                break;
            
            default:
                # code...
                break;
        }
        $res = $this->orderModel->where($where)->data($update)->save();
        // echo $this->orderModel->getLastSql();
        if(!$res){
            return $this->ajaxReturn(array('status'=>-6,'msg'=>'订单状态修改失败'.$this->orderModel->getError()));   
        }
        return $this->ajaxReturn(array('status'=>1,'msg'=>'订单状态修改成功!'));   
    }
}