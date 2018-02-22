<?php
namespace Api\Controller;

use Common\Controller\Base;
class BuyerController extends Base {
	private $model = null;
	protected function _initialize(){
		parent::_initialize();
		$this->model = D("Buyer/Product");
	}
public function collecton(){
      $collecton=array();
      $uid=$this->userid;
      $productid=I('productid');//产品id
      $shopid=I('shopid');//店铺id
      $is_delete=I("is_delete");
       $collection=array(
      'productid'=>$productid,
      'shopid'=>$shopid,
      'uid'=>$uid,
      'addtime'=>date('Y-m-d H:i:s',time()),
      'isdelete'=>$is_delete
      );
      $result=$this->collectionModel->data($collection
      )->add();
      if($result){

       $this->ajaxReturn(array('status'=>1,'infor'=>'收藏成功','data'=>$result));
      }else{
          $this->ajaxReturn(array('status'=>0,'infor'=>'失败'));
      }
}
    public function deleproduct(){
     $productid=I('productid');

     $result=$this->collectionModel->where(array('productid'=>$productid))->delete();

     //$this->ajaxReturn(array('status'=>1, "info"=>$result));
     if($result){
       $this->ajaxReturn(array('status'=>1,'infor'=>'取消成功','data'=>$result));
     }else{
       $this->ajaxReturn(array('status'=>0,'infor'=>'取消失败'));
     }


    }

    public function deleshop(){
      $shopid=I("shopid");
       $result=$this->collectionModel->where(array('shopid'=>$shopid))->delete();
        // $this->ajaxReturn(array('status'=>1, "info"=>$result));
        if($result){
       $this->ajaxReturn(array('status'=>1,'infor'=>'取消成功','data'=>$result));
     }else{
       $this->ajaxReturn(array('status'=>0,'infor'=>'取消失败'));
     }
    }
}
?>
