<?php

// +----------------------------------------------------------------------
// | 订单管理
// +----------------------------------------------------------------------
// | Author: libokai <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Model;

use Common\Model\Model;

class OrderModel extends Model {


    //定义根类目
    const TYPE_DESIGN   =1;   //设计
    const TYPE_WORKER   =2;   //工人
    const TYPE_MATERIAL =3; //主材
    const TYPE_FURNITURE=4;   //家具
    const TYPE_APPLIANCE=5;   //家电
    
    public function addOrder($post,$buyer_id){

        $order = array();
        $order_common = array();
        $order_pay = array();

        $cart_list = D('Buyer/Cart')->getCartList(array('id'=>array('in',$post['cartid'])));
        if(empty($cart_list['cartlist'])){
            return false;
        }
        $pay_sn = $this->makePaySn($buyer_id);
        $order_pay['pay_sn'] = $pay_sn;
        $order_pay['buyer_id'] = $buyer_id;
        $order_pay_id = D("OrderPay")->data($order_pay)->add();
        if (!$order_pay_id) {
            throw new Exception('订单保存失败');
        }

        D('Buyer/Cart')->deleteCart($post['cartid']);

        foreach($cart_list['cartlist'] as $k=>$v){
            $order['order_sn'] = $this->makeOrderSn($order_pay_id);
            $order['pay_sn'] = $pay_sn;
            $order['shop_id'] = $v['shop']['id'];
            $order['shop_name'] = $v['shop']['name'];
            $order['buyer_id'] = $buyer_id;
            $order['buyer_name'] = M('Member')->getFieldByUserid($buyer_id,'username');
            $order['addtime'] = time();
            $order['payment_code'] = '';
            $order['order_state'] = ORDER_STATE_NEW;
            //$order['order_amount'] = 0.01;
            $order['order_amount'] = $v['total_fee'];
            $order['shipping_fee'] = 0;
            $order['goods_amount'] = $order['order_amount'] - $order['shipping_fee'];
            $order['order_from'] = 1;
            $order['refund_amount']=0.0;
            $order_id = $this->data($order)->add();
            if (!$order_id) {
                throw new Exception('订单保存失败');
            }
            $order_list[$order_id] = $order;

            $order_common['order_id'] = $order_id;
            $order_common['shop_id'] = $v['shop']['id'];
            $order_common['order_message'] = $post['msg'][$v['shop']['id']];
            //收货类型:0-商家发货(默认),1-买家自提
            if($post['reciver_type'] == '1'){
                $order_common['reciver_type']= 1;
                $order_common['reciver_info']= '';
                $order_common['reciver_name']='';
            }else{
                $address = D('Buyer/BuyerAddr')->getAddrInfo(array('id'=>$post['addrid']));
                $order_common['reciver_info']= serialize($address);
                $order_common['reciver_name'] = $address['name'];
            }
            $order_common['evalseller_state'] = 1;
            //如果是POS机支付，需添加终端号
            $order_common_id = M('OrderCommon')->data($order_common)->add();
            if (!$order_common_id) {
                throw new Exception('订单保存失败');
            }

            $order_goods = array();
            $i = 0;
            foreach($v['cart'] as $k1=>$cart){
                $order_goods[$i]['order_id'] = $order_id;
                $order_goods[$i]['goods_id'] = $cart['product']['id'];
                $order_goods[$i]['store_id'] = $cart['product']['uid'];
                $order_goods[$i]['goods_name'] = $cart['product']['title'];
                $order_goods[$i]['goods_price'] = $cart['product']['provalue']['price_act'];
                $order_goods[$i]['goods_num'] = $cart['num'];
                $order_goods[$i]['goods_image'] = $cart['product']['headpic'];
                $order_goods[$i]['buyer_id'] = $buyer_id;
                $order_goods[$i]['goods_type'] = 1;
                $order_goods[$i]['provalue'] = serialize($cart['product']['provalue']);

                // //计算商品金额
                // $goods_total = $goods_info['goods_price'] * $goods_info['goods_num'];
                // //计算本件商品优惠金额
                // $promotion_value = floor($goods_total*($promotion_rate));
                // $order_goods[$i]['goods_pay_price'] = $goods_total - $promotion_value;
                // $promotion_sum += $promotion_value;
                $order_goods[$i]['goods_pay_price'] = $cart['product']['provalue']['price_act'];
                //交易快照
                $order_goods[$i]['snapshot'] = json_encode(M('product')->where(array('id'=>$cart['proid']))->find());
                $i++;
            }
            M('OrderGoods')->addAll($order_goods);
        }

        return array($pay_sn,$order_list);
    }
    public function addGroupBuyOrder($post,$buyer_id,$act_id){

        $order = array();
        $order_common = array();
        $order_pay = array();

        $pay_sn = $this->makePaySn($buyer_id);
        $order_pay['pay_sn'] = $pay_sn;
        $order_pay['buyer_id'] = $buyer_id;
        $order_pay_id = D("OrderPay")->data($order_pay)->add();
        if (!$order_pay_id) {
            throw new Exception('订单保存失败');
        }

        $cart_list = D('Admin/Activity')->getList($post['cartid'],$act_id);

        // D('Cart')->deleteCart($post['cartid']);

        foreach($cart_list['cartlist'] as $k=>$v){
            $order['order_sn'] = $this->makeOrderSn($order_pay_id);
            $order['pay_sn'] = $pay_sn;
            $order['shop_id'] = $v['shop']['id'];
            $order['shop_name'] = $v['shop']['name'];
            $order['buyer_id'] = $buyer_id;
            $order['buyer_name'] = M('Member')->getFieldByUserid($buyer_id,'username');
            $order['addtime'] = time();
            $order['payment_code'] = '';
            $order['order_state'] = ORDER_STATE_NEW;
            //$order['order_amount'] = 0.01;
            $order['order_amount'] = $v['total_fee'];
            $order['shipping_fee'] = 0;
            $order['goods_amount'] = $order['order_amount'] - $order['shipping_fee'];
            $order['order_from'] = 1;
            $order_id = $this->data($order)->add();
            if (!$order_id) {
                throw new Exception('订单保存失败');
            }
            $order_list[$order_id] = $order;

            $order_common['order_id'] = $order_id;
            $order_common['shop_id'] = $v['shop']['id'];
            // $order_common['order_message'] = '';
            var_dump($post);
            $order_common['order_message'] = $post['msg'][$v['shop']['id']];
            $address = D('Buyer/BuyerAddr')->getAddrInfo(array('id'=>$post['addrid']));

            $order_common['reciver_info']= serialize($address);
            $order_common['reciver_name'] = $address['name'];
            $order_common_id = M('OrderCommon')->data($order_common)->add();
            if (!$order_common_id) {
                throw new Exception('订单保存失败');
            }

            $order_goods = array();
            $i = 0;
            foreach($v['cart'] as $k1=>$cart){
                $order_goods[$i]['order_id'] = $order_id;
                $order_goods[$i]['goods_id'] = $cart['product']['id'];
                $order_goods[$i]['store_id'] = $cart['product']['uid'];
                $order_goods[$i]['goods_name'] = $cart['product']['title'];
                $order_goods[$i]['goods_price'] = $cart['product']['provalue']['price_act'];
                $order_goods[$i]['goods_num'] = $cart['num'];
                $order_goods[$i]['goods_image'] = $cart['product']['headpic'];
                $order_goods[$i]['buyer_id'] = $buyer_id;
                $order_goods[$i]['provalue'] = serialize($cart['product']['provalue']);

                // //计算商品金额
                // $goods_total = $goods_info['goods_price'] * $goods_info['goods_num'];
                // //计算本件商品优惠金额
                // $promotion_value = floor($goods_total*($promotion_rate));
                // $order_goods[$i]['goods_pay_price'] = $goods_total - $promotion_value;
                // $promotion_sum += $promotion_value;
                $order_goods[$i]['goods_pay_price'] = $cart['product']['provalue']['price_act'];
                //交易快照
                $order_goods[$i]['snapshot'] = json_encode(M('product')->where(array('id'=>$cart['proid']))->find());
                $i++;
            }
            M('OrderGoods')->addAll($order_goods);
        }

        return array($pay_sn,$order_list);;     
    }
    /**
     * 取单条订单信息
     *
     * @param unknown_type $condition
     * @param array $extend 追加返回那些表的信息,如array('order_common','order_goods','store')
     * @return unknown
     */
    public function getOrderInfo($condition = array(), $extend = array(), $fields = '*') {
        $order_info = $this->field($fields)->where($condition)->find();
        if (empty($order_info)) {
            return array();
        }
        if (isset($order_info['order_state'])) {
            // $order_info['state_desc'] = orderState($order_info);
        }
        if (isset($order_info['payment_code'])) {
            // $order_info['payment_name'] = orderPaymentName($order_info['payment_code']);
        }

        //追加返回订单扩展表信息
        if (in_array('order_common',$extend)) {
            $order_info['extend_order_common'] = D('OrderCommon')->where(array('order_id'=>$order_info['order_id']))->find();
            if(isset($order_info['extend_order_common']['reciver_info']) && !empty($order_info['extend_order_common']['reciver_info'])){
                $order_info['extend_order_common']['reciver_info'] = unserialize($order_info['extend_order_common']['reciver_info']);
            }else{
                $order_info['extend_order_common']['reciver_info'] = (object)[];
            }
            if(isset($order_info['extend_order_common']['invoice_info']) && !empty($order_info['extend_order_common']['invoice_info'])){
                $order_info['extend_order_common']['invoice_info'] = unserialize($order_info['extend_order_common']['invoice_info']);
            }else{
                $order_info['extend_order_common']['invoice_info'] = (object)[];
            }
        }

        //追加返回店铺信息
        if (in_array('shop',$extend)) {
            $order_info['extend_shop'] = D('Shop')->where(array('id'=>$order_info['shop_id']))->find();
        }

        //返回买家信息
        if (in_array('member',$extend)) {
            $order_info['extend_member'] = D('Member')->where(array('userid'=>$order_info['buyer_id']))->find();
        }

        //追加返回商品信息
        if (in_array('order_goods',$extend)) {
            //取商品列表
            $order_goods_list = $this->getOrderGoodsList(array('order_id'=>$order_info['order_id']));
            $order_info['extend_order_goods'] = $order_goods_list;
        }
        //退货信息
        if (in_array('order_refund',$extend)) {
            //取商品列表
            $order_refund_info = D('Buyer/OrderRefund')->where(array('order_id'=>$order_info['order_id']))->find();
            $order_info['extend_order_refund'] = $order_refund_info;
        }

        return $order_info;
    }



  /**
   * 生成支付单编号(两位随机 + 从2000-01-01 00:00:00 到现在的秒数+微秒+会员ID%1000)，该值会传给第三方支付接口
   * 长度 =2位 + 10位 + 3位 + 3位  = 18位
   * 1000个会员同一微秒提订单，重复机率为1/100
   * @return string
   */
  public function makePaySn($member_id) {
    return mt_rand(10,99)
          . sprintf('%010d',time() - 946656000)
          . sprintf('%03d', (float) microtime() * 1000)
          . sprintf('%03d', (int) $member_id % 1000);
  }

  /**
   * 订单编号生成规则，n(n>=1)个订单表对应一个支付表，
   * 生成订单编号(年取1位 + $pay_id取13位 + 第N个子订单取2位)
   * 1000个会员同一微秒提订单，重复机率为1/100
   * @param $pay_id 支付表自增ID
   * @return string
   */
  public function makeOrderSn($pay_id) {
      //记录生成子订单的个数，如果生成多个子订单，该值会累加
      static $num;
      if (empty($num)) {
          $num = 1;
      } else {
          $num ++;
      }
    return (date('y',time()) % 9+1) . sprintf('%013d', $pay_id) . sprintf('%02d', $num);
  }
  public function getPayState($pay_sn){
    return M('OrderPay')->where(array('pay_sn'=>$pay_sn))->getField('api_pay_state');
  }
  public function getTotalfee($pay_sn){
    $fee = M('Order')->where(array('pay_sn'=>$pay_sn))->sum('order_amount');
    return $fee;
  }
  public function getOrderByPaySn($pay_sn,$extend=array()){
    $order = $this->where(array('pay_sn'=>$pay_sn))->select();
    foreach($order as $k=>$v){
      if(in_array('order_common',$extend)){
        $order[$k]['order_common'] = M('OrderCommon')->where(array('order_id'=>$v['order_id']))->find();
        $order[$k]['order_common']['reciver_info'] = unserialize($order[$k]['order_common']['reciver_info']);
      }

      if(in_array('order_goods',$extend)){
        $order[$k]['order_goods'] = M('OrderGoods')->where(array('order_id'=>$v['order_id']))->select();
      }
    }
    return $order;
  }

  /**
   * 支付成功后修改实物订单状态
   */
  public function updateOrder($out_trade_no, $payment_code, $order_list, $trade_no) {
      $post['payment_code'] = $payment_code;
      $post['trade_no'] = $trade_no;
      return $this->changeOrderReceivePay($order_list, 'system', '系统', $post);
  }

  /**
     * 收到货款
     * @param array $order_info
     * @param string $role 操作角色 buyer、seller、admin、system 分别代表买家、商家、管理员、系统
     * @param string $user 操作人
     * @return array
     */
    public function changeOrderReceivePay($order_list, $role, $user = '', $post = array()) {

        try {

            $data = array();
            $data['api_pay_state'] = 1;


            $update = $this->editOrderPay($data,array('pay_sn'=>$order_list[0]['pay_sn']));
            
            if (!$update) {
                throw new \Exception('更新支付单状态失败');
            }

            //更新订单状态
            
            $update_order = array();
            $update_order['payment_time'] = time();
            $update_order['payment_code'] = $post['payment_code'];
            if (array_key_exists('termid', $post)) {
                $update_order['termid'] = $post['termid'];
            }
            foreach($order_list as $k=>$v){
                $update_order['order_state'] = ($v['pay_type']==1)?ORDER_STATE_SUCCESS:ORDER_STATE_PAY;
                $update_order['finnshed_time'] = time();
                $update = $this->editOrder($update_order,array('order_id'=>$v['order_id'],'order_state'=>ORDER_STATE_NEW));
            }
            if (!$update) {
                throw new \Exception('操作失败');
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }

        foreach($order_list as $order_info) {

            if ($order_info['order_state'] != ORDER_STATE_NEW) continue;
            $order_id = $order_info['order_id'];

            //添加订单日志
            $data = array();
            $data['order_id'] = $order_id;
            $data['log_role'] = $role;
            $data['log_user'] = $user;
            $data['log_msg'] = '收到了货款 ( 支付平台交易号 : '.$order_info['pay_sn'].' )';
            $data['log_orderstate'] = 20;
            $this->addOrderLog($data);     
            $this->updateProductCount($order_info);       
        }
        // $order_infor=$this->where(array('pay_sn'=>$order_list[0]['pay_sn']))->find();
        //拉卡拉用户付款后不通知买家和卖家
        if(trim($post['payment_code']) == "LAKALA") {
            $order_info = $order_list[0];
            $consumertel = M('Member')->where(array('userid' => $order_info['buyer_id']))->find();
            // $Seller_mobile = M('Member')->join("zt_shop on zt_shop.uid = zt_member.userid")->where(array('zt_shop.id' =>$order_info['shop_id']))->getField("zt_member.mobile");
            $shop = M('Shop')->where(array('id'=>$order_info['shop_id']))->find();
            $Seller_mobile = M('Member')->getFieldByUserid($shop['uid'],'mobile');

            $this->memberModel = D('Member/Member');
            //付款后统治买家
            if(!empty($consumertel['mobile'])){
               $send_consumer = $this->memberModel->send_user_pay($consumertel['mobile'], $Seller_mobile, $order_info['order_sn']); 
            }
            //付款后统治卖家
            $send_business = $this->memberModel->send_company($Seller_mobile, $consumertel['mobile'], $consumertel['username'], $order_info['order_sn']);
            // 付款后统治市场部
            // $telphone = M('Shop')->where(array('id' => $order_info['shop_id']))->getField('telphone');
            // 李冰修改  -20160830 
            // $telphone = $shop['telphone'];
            // if (!empty($telphone)) {
            //     $telphone = unserialize($telphone);
            //     foreach ($telphone as $key =>$value) {
            //         if (!empty($value["mobile"])) {
            //             $send_zhuangtu = $this->memberModel->send_zhuangtu($value["mobile"], $consumertel['mobile'], $consumertel['username'], $order_info['order_sn']);
            //         }
            //     }
            // }
        }
        $_SESSION['order_sn']=$order_info['order_sn'];
        
        return true;
    }
    public function addOrderLog($data){
      return M('OrderLog')->data($data)->add();
    }
    public function editOrder($data,$condition){
      return $this->where($condition)->data($data)->save();
    }
    public function editOrderPay($data,$condition){
      return M('OrderPay')->where($condition)->data($data)->save();
    }

    public function getOrderGoodsList($condition = array(), $fields = '*', $limit = null) {
      $goods = M("OrderGoods")->field($fields)->where($condition)->limit($limit)->select();

      foreach($goods as $k=>$v){
        $goods[$k]['provalue'] = unserialize($v['provalue']);
        $goods[$k]['snapshot'] = json_decode($v['snapshot'],true);
      }

      return $goods;
    }


    //修改订单价格
    public function changePrice($order_id){
        $goods = M('OrderGoods')->where(array('order_id'=>$order_id))->select();
        $price = 0.00;
        foreach ($goods as $key => $value) {
          # code...
          $price = $price + (int)$value['goods_num'] * (float)$value['goods_pay_price'];
        }
        $order_info['goods_amount']= $price;
        $order_info['order_amount']= $price;
        $this->where(array('order_id'=>$order_id))->save($order_info);
        return true;
    }
    public function setPayType($pay_sn,$pay_type){
      $orders = $this->where(array('pay_sn'=>$pay_sn,'order_state'=>'10'))->select();
      foreach ($orders as $key => $value) {
        $cat_pid = D('Member/ShopCategory')->getPidByShopid($value['shop_id']);
        if(in_array($cat_pid,array('3','4','5')))
        {
          $value['pay_type'] = $pay_type;
          $this->save($value);
        }
        # code...
      }
    }
    //修改产品库存
    public function updateProductCount($order_info){
        $goods = M('OrderGoods')->where(array('order_id'=>$order_info['order_id']))->select();
        // $goods['provalue'] = unserialize($goods['provalue']);
        foreach ($goods as $key => $value) {
            $data = array();
            $value['provalue'] = unserialize($value['provalue']);
            //获取产品信息
            $product = M("Product")->where(array("id"=>$value['goods_id']))->find();
            //修改销量数字
            $data['count_sold'] = (int)$product['count_sold'] + (int)$value['goods_num'];
            //修改总库存
            $data['number'] = (int)$product['number'] - (int)$value['goods_num'];
            if((int)$data['number'] < 0){$data['number'] = 0;}
            //修改分类库存
            $price = json_decode($product['price_json'], true);
            foreach ($price as $kp => $vp) {
                if($vp['hidden_value'] == $value['provalue']['hidden_value'] && !empty($price[$kp]['quantity'])){
                    $price[$kp]['quantity'] = (int)$price[$kp]['quantity'] - (int)$value['goods_num'];
                    if($price[$kp]['quantity'] <0){$price[$kp]['quantity']= '0';}
                }
            }
            $data['price_json'] = json_encode($price,JSON_UNESCAPED_UNICODE|JSON_FORCE_OBJECT);
            M("Product")->where(array("id"=>$value['goods_id']))->data($data)->save();
        }
    }
    
}