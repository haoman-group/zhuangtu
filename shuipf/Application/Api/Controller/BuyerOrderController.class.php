<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 卖家地址信息操作
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Api\Controller;

// use Seller\Controller\;

class BuyerOrderController extends ApibaseController {
    private $orderGoodsmodel = null;
    private $orderModel = null;
    private $orderCommonModel = null;
    protected $memberModel = null;
    protected $shop_id = null;
    protected $where = null;
    protected function _initialize(){
        parent::_initialize();
        $this->orderGoodsmodel = D("Buyer/OrderGoods");
        $this->orderModel = D("Buyer/Order");
        $this->orderCommonModel = M("OrderCommon");
        $this->memberModel = D('Member/Member');
        //通用搜索条件
        $this->where = array('delete_state'=>'0','status'=>array(array('egt',10),array('elt',40)));
        // $this->shopid =  M('Shop')->getFieldByUid($this->userid,'id');
    }
      //卖家订单列表
    public function lists(){
        //订单状态
        $order_state = I('order_state');
        if($order_state) $this->where['order_state'] = $order_state;
        //卖家店铺ID
        $this->where['buyer_id'] = $this->userid ;
        // 获取数据
        $data = $this->orderModel->where($this->where)->order('addtime desc')->select();
        foreach($data as $k=>$v){
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
                   $data[$k]['goods'][$key]['provalue'] =$proval;
                # code...
            }
            // $data[$k]['buyer'] = $this->memberModel->field("userid,mobile,username")->where(array('userid'=>$v['buyer_id']))->find();
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$data));
    }
    //取消订单
    public function cancel(){
        $order_sn = I('order_sn');
        if(empty($order_sn)){
    	return $this->ajaxReturn(array('status'=>-1,'msg'=>'未指定订单号!'));
        }
        $this->_checkAuth($order_sn);
        $this->where['order_sn'] = $order_sn;
        $this->orderModel->where($this->where)->setField('order_state','-1');
        return 	$this->ajaxReturn(array('status'=>1,'msg'=>'取消成功'));	
    }
    //删除
    public function delete(){
        $order_sn = I('order_sn');
        if(empty($order_sn)){
            return $this->ajaxReturn(array('status'=>-1,'msg'=>'未指定订单号!'));
        }
        $this->_checkAuth($order_sn);
        $this->where['order_sn'] = $order_sn;
        $this->orderModel->where($this->where)->setField('delete_state','1');
        return  $this->ajaxReturn(array('status'=>1,'msg'=>'删除成功'));    	
    }
    //验证当前待操作的数据是否为当前用户
    private function _checkAuth($order_sn="",$rec_id=""){
        if(empty($order_sn) && empty($rec_id)){
            return $this->ajaxReturn(array('status'=>-3,"msg"=>"参数错误!不能为空!"));
        }
        if(!empty($order_sn)){
            $buyer_id = $this->orderModel->where(array('order_sn'=>$order_sn,'status'=>array(array('egt',10),array('elt',40)),'delete_state'=>0))->getField('buyer_id');
            if($buyer_id != $this->userid){
                return $this->ajaxReturn(array('status'=>-4,"msg"=>"订单号错误!当前订单号不属于您或者已经不存在!"));       
            }
        }else{
            $buyer_id = $this->orderGoodsmodel
                                               ->join("zt_order  on zt_order_goods.order_id= zt_order.order_id","LEFT")
                                               ->where(array('zt_order.status'=>array(array('egt',10),array('elt',40)),'zt_order.delete_state'=>0,'zt_order_goods.rec_id'=>$rec_id))
                                               ->getField('buyer_id');
            if($buyer_id != $this->userid){
                return $this->ajaxReturn(array('status'=>-5,"msg"=>"订单产品错误!当前订单产品不属于您或者已经不存在!"));       
            }
        }
        return ;
    }
}