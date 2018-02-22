<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 卖家地址信息操作
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace App\Controller;

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
        if($order_state) $this->where['order_state'] = array('IN',$order_state);
        //退款状态
        $refund_state = I('refund_state','0');
        $this->where['refund_state'] = array('IN',$refund_state);
        $this->where['installment'] = '0';
        //卖家店铺ID
        $this->where['buyer_id'] = $this->userid ;
        // 获取数据
        //是否分页处理
        $pageid = I('pageid',null);
        if(empty($pageid) || $pageid == '0'){
            $data = $this->orderModel->where($this->where)->order('addtime desc')->select();
        }else{
            //分页数据信息
            $pageinfo = array();
            $pageinfo['pageSize'] = '20';
            //总数
            $pageinfo['count'] =  $this->orderModel->where($this->where)->count();  
            $pageinfo['pageid'] = $pageid;
            $data = $this->orderModel->where($this->where)->page($pageid.','.$pageinfo['pageSize'])->order('addtime desc')->select();
            $pageinfo['curCount'] = sizeof($data);
        }
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
                        $data[$k]['goods'][$key]['provalue'] = (object)[];
                    }else{
                        $data[$k]['goods'][$key]['provalue'] =$proval;
                    }
                   // $data[$k]['goods'][$key]['provalue'] =$proval;
                # code...
            }
            // $data[$k]['buyer'] = $this->memberModel->field("userid,mobile,username")->where(array('userid'=>$v['buyer_id']))->find();
        }
        if(isset($pageinfo)){            
            $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$data,'pageinfo'=>$pageinfo));
        }else{
            $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$data));   
        }
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
        // 订单详情页
    public function detail(){
         $order_sn = I('order_sn');
        if(empty($order_sn)){
            $this->ajaxReturn(array('status'=>-1,"msg"=>"未指定订单号！"));       
        }
        $order = $this->orderModel->getOrderInfo(array('order_sn'=>$order_sn,'buyer_id'=>$this->userid),array('order_common','order_goods','shop','order_refund'));
        // echo $this->orderModel->getLastSql();
        $order['addtime'] = date('Y-m-d H:i:s',$order['addtime']);
        $order['shop_phone'] = $order['extend_shop']['phone'];
        unset($order['extend_shop']);
        foreach ($order['extend_order_goods'] as $key => $good) {
            $order['extend_order_goods'][$key]['snapshot'] =null;
            // $order['extend_order_goods'][$key]['addtime'] =  date('Y-m-d H:i:s',$order['extend_order_goods'][$key]['addtime']);
            $proval = array();
                    foreach ($order['extend_order_goods'][$key]['provalue'] as $key1 => $value1) {
                         if($key1=='price' || $key1 == 'price_act') break; 
                        $proval[$key1] =$value1['txt'];
                        # code...
                    }
                    if(empty($proval)){
                        $order['extend_order_goods'][$key]['provalue'] = "";
                    }else{
                        $order['extend_order_goods'][$key]['provalue'] =$proval;
                    }
       
        }
        $this->ajaxReturn(array('status'=>1,"msg"=>"请求成功",'data'=>$order));       
    }
    //退款流程
    public function refund(){
        $order_id = I('order_id');
         $refundModel = D('Buyer/OrderRefund');
        if(empty($order_id)){
            $this->ajaxReturn(array('status'=>-1,"msg"=>"未指定订单ID！"));       
        }
        $refund_state = I('refund_state','0');
        if($refund_state == '0'){
            if($refundModel->where(array('order_id'=>$order_id))->find()){
                $this->ajaxReturn(array('status'=>-3,"msg"=>"该订单已经申请退款,请耐心等待!"));
            }
            $where = array();
            $where['order_id'] = $order_id;
            $where['refund_state'] = '0';
            $where['_string'] = "(order_state >=20) and (order_state <40)";
            //设置退款状态
            $this->orderModel->where($where)->setField('refund_state','1');
            $refund_info = array();
            $refund_info['order_id'] =$order_id;
            $refund_info['received'] = I('received','0');
            $refund_info['explain']  = I('explain','','trim');
            $refund_info['reason']  = I('reason','其他原因');
            if(!$refundModel->create($refund_info)){
                $this->ajaxReturn(array('status'=>-1,'msg'=>'退款记录错误!'.$refundModel->getError()));
            }else{
                $refundModel->add();
                $this->ajaxReturn(array('status'=>1,'msg'=>'退款申请提交成功!','data'=>$refund_info));
            }
        }else if($refund_state =='1'){
            $where = array();
            $where['order_id'] = $order_id;
            $where['refund_state'] = '1';
            $where['_string'] = "(order_state >=20) and (order_state <40)";
            $data['refund_state'] = '2';
            $data['order_state'] = '-1';
            //设置退款状态
            $this->orderModel->where($where)->data($data)->save();
            $this->ajaxReturn(array('status'=>1,'msg'=>'退款确认提交成功!'));
        }else{
            $this->ajaxReturn(array('status'=>-1,'msg'=>'错误的退款状态!'));
        }
    }
}