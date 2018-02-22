<?php
namespace Api\Controller;

class CommentListController extends ApibaseController {
        protected function _initialize() {
        parent::_initialize();
        $this->model = D("Buyer/Cart");
        $this->productModel = D("Product");
        $this->memberModel=D('Member/Member');
        $this->shopModel = D("Shop");
        $this->addrModel = D("Buyer/BuyerAddr");
        $this->orderModel = D("Buyer/Order");
        $this->orderGoodsModel = D('OrderGoods');
        $this->orderCommonModel = D('OrderCommon');
    }

  	public function pay_commentend(){

        $content=I('content');

        $lineshop=I('star1');
        $lineservice=I('star2');
        $onlineshop=I('star3');
        $onlineservice=I('star4');
        $star=I('star');
        $leve=I("bb");
        $addcom=I("addcom");
        //var_dump($addcom);exit;
        $anonymous=I('anonymous');
        $pic=I('pic');
        $pic=implode(",",$pic );
        $comment=array();
        $sn=I('sn');
        $orid=$this->orderModel->where(array('order_sn'=>$sn))->find();
        $goods=M('OrderGoods')->where(array('order_id'=>$orid['order_id']))->find();
        $comment=array(
            'order_id'=>$orid['order_id'],
            'order_sn'=>$orid['order_sn'],
            'ordergoods_id'=>$goods['rec_id'],
            'product_id'=>$goods['goods_id'],
            'product_name'=>$goods['goods_name'],
            'product_price'=>$goods['goods_price'],
            'product_image'=>$goods['goods_image'],
            'scores'=>$leve,
            'content'=>$content,
            'isanonymous'=> $anonymous,
            'addtime'=>time(),
            'shop_id'=>$orid['shop_id'],
            'shop_name'=>$orid['shop_name'],
            'userid'=>$orid['buyer_id'],
            'username'=>$orid['buyer_name'],
            'state'=>0,
            'remark'=>'',
            'type'=>'0',
            'explain'=>'',
            'image'=>$pic

        );
        $commentadd=array(
            'order_id'=>$orid['order_id'],
            'order_sn'=>$orid['order_sn'],
            'ordergoods_id'=>$goods['rec_id'],
            'product_id'=>$goods['goods_id'],
            'product_name'=>$goods['goods_name'],
            'product_price'=>$goods['goods_price'],
            'product_image'=>$goods['goods_image'],
            'scores'=>$leve,
            'content'=>$content,
            'isanonymous'=> $anonymous,
            'addtime'=>time(),
            'shop_id'=>$orid['shop_id'],
            'shop_name'=>$orid['shop_name'],
            'userid'=>$orid['buyer_id'],
            'username'=>$orid['buyer_name'],
            'state'=>0,
            'remark'=>'',
            'type'=>'1',
            'explain'=>'',
            'image'=>$pic

        );
        $shopComment=array(
            'order_id'=>$orid['order_id'],
            'order_sn'=>$orid['order_sn'],
            'addtime'=>time(),
            'shop_id'=>$orid['shop_id'],
            'shop_name'=>$orid['shop_name'],
            'userid'=>$orid['buyer_id'],
            'username'=>$orid['buyer_name'],
            'lineshop'=>$lineshop,
            'lineservice'=>$lineservice,
            'onlineshop'=>$onlineshop,
            'onlineseveri'=>$onlineservice

        );
        if(!$addcom) {
            $coshop = M('CommentShop')->where(array('order_sn' => $sn))->find();
            if (!$coshop) {
                $commshop = M("CommentShop")->data($shopComment)->add();
            } else {

                $commshop = M("CommentShop")->where(array('order_sn' => $sn))->data($shopComment)->save();
            }
            $re = M('CommentProduct')->where(array('order_sn' => $sn))->find();
            $sta = $this->orderModel->where(array('order_sn' => $sn))->setField('evaluation_state', '1');
            if (!$re) {

                $comm = M('CommentProduct')->data($comment)->add();
                 $count=M("CommentProduct")->where(array('product_id'=>$goods['goods_id']))->count();
                $update=M("Product")->where(array('id'=>$goods['goods_id']))->setField('count_comment',$count);
                 if($comm){
                 $this->ajaxReturn(array('status'=>1,'infor'=>'评论成功'));
              }else{
              $this->ajaxReturn(array('status'=>0,'infor'=>'评论失败'));
              }

            } else {

            return ;
            }
        }else{
              $add=M('CommentProduct')->data($commentadd)->add();
              $count=M("CommentProduct")->where(array('product_id'=>$goods['goods_id']))->count();
              $update=M("Product")->where(array('id'=>$goods['goods_id']))->setField('count_comment',$count);
              if($add){
                 $this->ajaxReturn(array('status'=>1,'infor'=>'评论成功'));
              }else{
              $this->ajaxReturn(array('status'=>0,'infor'=>'评论失败'));
              }
        }
     
    }

  }


?>