<?php

//足迹的操作

namespace Api\Controller;
class FootController extends ApibaseController{

      protected $model=NULL;
      protected $orderModel=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model=M('Url');
        $this->orderModel=M("Order");
    }

//我的足迹的操作
    public function delfoot(){
    	$userid=$this->userid;
    	$itemid=I("productid");
    	$where['urlid']=array("in",$itemid);
    	$where['uid']=$userid;
    	$result=$this->model->where($where)->delete();
    	if($result){
    		$this->ajaxReturn(array('status'=>1,'msg'=>"sucess"));

    	}else{
    		$this->ajaxReturn(array('status'=>0,'msg'=>'error'));
    	}
    	    }

//订单回收站处理还原
    public function redorder(){
        $buyer_id=$this->userid;
        $order_sn=array("in",I("order_sn"));
        $result=$this->orderModel->where(array('order_sn'=>$order_sn,'buyer_id'=>$buyer_id))->setField("delete_state",0);
         if($result){
            $this->success("还原成功");
         }else{
           $this->error("还原失败");
         }
    }
    //彻底删除
     public function deleorder(){
        $order_sn=array("in",I("order_sn"));

        $buyer_id=$this->userid;
        $result=$this->orderModel->where(array('order_sn'=>$order_sn,'buyer_id'=>$buyer_id))->delete();
        if($result){
            $this->success("删除成功");
         }else{
           $this->error("删除失败");
         }
    }


     //移入回收站
    public function addrecycle_bin(){
        $order_sn=I("order_sn");
        $buyer_id=$this->userid;
        $result=$this->orderModel->where(array('order_sn'=>$order_sn,'buyer_id'=>$buyer_id))->setField("delete_state",1);
        if($result){
            $this->ajaxReturn(array('status'=>1,'msg'=>"操作成功"));

        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'操作失败'));
        }
    }

}
?>
