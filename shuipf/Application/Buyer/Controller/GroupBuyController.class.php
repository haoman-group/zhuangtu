<?php 
// +----------------------------------------------------------------------
// | ShuipFCMS 买家会员中心
// +----------------------------------------------------------------------
// | Action Base: 用户数据
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Controller;

class GroupBuyController extends BuyerbaseController {
    protected $activityModel=null;
    protected $activityDataModel=null;
    protected $addrModel = null;
    protected $orderModel = null;
    protected function _initialize() {
        parent::_initialize();
        $this->activityModel= D("Admin/Activity");
        $this->activityDataModel= D("Admin/ActivityData");
        $this->addrModel = D("Buyer/BuyerAddr");
        $this->orderModel = D("Buyer/Order");
    }
      //团购页面添加到购物车
   public function addCartByGroupBuy(){  
        if(IS_POST){
            $prodids = I('productIds');
            $act_id = I('act_id');  
            $cartlist = $this->activityModel->getList($prodids,$act_id);
            $addrlist = $this->addrModel->getAddr($this->userid);
            $this->assign('cartlist',$cartlist['cartlist']);
            $this->assign('total',$cartlist['total']);
            $this->assign("addrlist",$addrlist);
            $this->assign('cartid',implode(',',$prodids));
            $this->assign('act_id',$act_id);
            $this->display();
        }
   }
    public function GroupBuyorderpay(){
        if(IS_POST){
            $msg = I('msg');//买家留言
            $cartid = I('cartid');
            $addrid = I('addrid');
            $act_id = I('act_id');
            $data = array(
                'cartid'=>$cartid,
                'addrid'=>$addrid,
                'act_id'=>$act_id,
                'msg'=>$msg
            );
            $order_info = $this->orderModel->addGroupBuyOrder($data,$this->userid,$act_id);
           if(empty($order_info)){
                $this->error("请添加地址");
            }
            redirect(U('GroupBuyorderpay',array('pay_sn'=>$order_info[0])));
        }else{
            $pay_sn = I('pay_sn');
            $order = $this->orderModel->getOrderByPaySn($pay_sn,array('order_common','order_goods'));
            $total_fee = $this->orderModel->getTotalfee($pay_sn);
            $this->assign('order',$order);
            $this->assign('order_common',$order[0]['order_common']);
            $this->assign('total_fee',$total_fee);
            $this->assign('pay_sn',$pay_sn);
            $this->display("Buyer/Cart/orderpay");
        }
        
    }
}