<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 卖家地址信息操作
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Api\Controller;

// use Seller\Controller\;

class SellerOrderController extends ApibaseController {
    private $orderGoodsmodel = null;
    private $orderModel = null;
    private $orderCommonModel = null;
    protected $memberModel = null;
    protected $shop_id = null;
    protected function _initialize(){
        parent::_initialize();
        $this->orderGoodsmodel = D("Buyer/OrderGoods");
        $this->orderModel = D("Buyer/Order");
        $this->orderCommonModel = M("OrderCommon");
        $this->memberModel = D('Member/Member');
        $this->shopid =  M('Shop')->getFieldByUid($this->userid,'id');
    }
      //卖家订单列表
    public function lists(){
        //订单状态
        $order_state = I('order_state');
        if($order_state) $where['order_state'] = $order_state;
        //卖家店铺ID
        $where['shop_id'] = $this->shopid ;
        $where['delete_state'] = '0';
        // 获取数据
        $data = $this->orderModel->where($where)->order('addtime desc')->select();
        foreach($data as $k=>$v){
            $data[$k]['addtime'] = date('Y.m.d H:i:s',$data[$k]['addtime']);
            $shop_cat = D('Member/Shop')->getCatpidById($data[$k]['shop_id']);
            $data[$k]['order_state_txt'] = \Seller\Controller\Status::$OrderStatus[$shop_cat][$data[$k]['order_state']];
            $data[$k]['goods'] = $this->orderModel->getOrderGoodsList(array('order_id'=>$v['order_id']));
            foreach ($data[$k]['goods'] as $key => $value) {
                    $data[$k]['goods'][$key]['snapshot'] = null;
                    $proval = array();
                    foreach ($value['provalue'] as $key1 => $value1) {
                         if($key1=='price' || $key1 == 'price_act') break; 
                        $proval[$key1] =$value1['txt'];
                        # code...
                    }
                    if(empty($proval)){
                        $data[$k]['goods'][$key]['provalue'] = "";
                    }else{
                        $data[$k]['goods'][$key]['provalue'] =$proval;
                    }
                # code...
            }
            $data[$k]['buyer'] = $this->memberModel->field("userid,mobile,username")->where(array('userid'=>$v['buyer_id']))->find();
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$data));
    }
    //取消订单
    public function cancel(){
    	$order_sn = I('order_sn');
            // $this->_checkAuth($order_sn);
    	if(empty($order_sn)){
    		$this->error('未指定订单号！');
    	}
    	$this->orderModel->where(array('order_sn'=>$order_sn))->setField('order_state','-1');
    	return 	$this->ajaxReturn(array('status'=>1,'msg'=>'取消成功'));	
    }
    //改价
    private function changePrice(){
    	$rec_id = I('rec_id');
            // $this->_checkAuth("",$rec_id);
            $order_id = I('order_id');
    	$goods_pay_price = I('new_price');
    	if(empty($rec_id) || empty($order_id)){
    		return    $this->ajaxReturn(array('status'=>-1,'msg'=>'未指定订单号！'));
    	}
    	$this->orderGoodsmodel->where(array('rec_id'=>$rec_id))->setField('goods_pay_price',$goods_pay_price);
        $this->orderModel->changePrice($order_id);
    	return 	$this->ajaxReturn(array('status'=>1,'msg'=>'修改成功'));	
    }
    //发货
    public function send(){
    	$order_sn = I('order_sn');
        // $this->_checkAuth($order_sn);
    	$shipping_code = I('shipping_code','');
        $order_info = $this->orderModel->where(array('order_sn'=>$order_sn))->find();
        if(empty($order_info)){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'错误！订单不存在！')); 
        }
        if($order_info['order_state'] != ORDER_STATE_PAY){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'错误！订单状态错误！'));    
        }
        $order_info['shipping_code'] = $shipping_code;
        $order_info['order_state'] = ORDER_STATE_SEND;
    	$this->orderModel->where(array('order_sn'=>$order_sn))->save($order_info);
        $this->orderCommonModel->where(array('order_id'=>$order_info['order_id']))->setField('shipping_time',time());
    	// echo $this->orderModel->getLastSql();
    	return 	$this->ajaxReturn(array('status'=>1,'msg'=>'成功'));	
    }
    //安装
    public function setup(){
        $order_sn = I('order_sn');
        // $this->_checkAuth($order_sn);
        $order_info = $this->orderModel->where(array('order_sn'=>$order_sn))->find();
        if(empty($order_info)){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'错误！订单不存在！')); 
        }
        if($order_info['order_state'] != ORDER_STATE_SEND){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'错误！订单状态错误！'));    
        }
        $order_info['order_state'] = ORDER_STATE_SETUP;
        $order_info['setup_time'] = time();
        $this->orderModel->where(array('order_sn'=>$order_sn))->save($order_info);
        // echo $this->orderModel->getLastSql();
        return  $this->ajaxReturn(array('status'=>1,'msg'=>'成功'));  
    }
    //验证当前待操作的数据是否为当前用户
    private function _checkAuth($order_sn="",$rec_id=""){
        if(empty($order_sn) && empty($rec_id)){
            return $this->ajaxReturn(array('status'=>-3,"msg"=>"参数错误!不能为空!"));
        }
        if(!empty($order_sn)){
            $order_shop_id = $this->orderModel->where(array('order_sn'=>$order_sn,'status'=>array(array('egt',10),array('elt',40)),'delete_state'=>0))->getField('shop_id');
            if($order_shop_id != $this->shop_id){
                return $this->ajaxReturn(array('status'=>-4,"msg"=>"订单号错误!当前订单号不属于您!"));       
            }
        }else{
            $order_shop_id = $this->orderGoodsmodel
                                               ->join("zt_order  on zt_order_goods.order_id= zt_order.order_id","LEFT")
                                               ->where(array('zt_order.status'=>array(array('egt',10),array('elt',40)),'zt_order.delete_state'=>0,'zt_order_goods.rec_id'=>$rec_id))
                                               ->getField('shop_id');
            if($order_shop_id != $this->shop_id){
                return $this->ajaxReturn(array('status'=>-5,"msg"=>"订单产品错误!当前订单产品不属于您!"));       
            }
        }
        return ;
    }
}