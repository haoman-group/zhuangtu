<?php
namespace Api\Controller;
  class CommentController extends ApibaseController {
   public function lists(){
       $productid = I('get.productid');
       if(empty($productid)){
       $productid=I("productid");
       }
        $type=I('type');
        $image=array('neq','');
       if(empty($type)){
           $type = 0;
       }

       if($type == 0){
        $comment=M("CommentProduct")->where(array('product_id'=>$productid,'state'=>0))->select();
       }elseif($type == 1){
        $comment=M("CommentProduct")->where(array('product_id'=>$productid,'image'=>$image,'state'=>0))->select();
       }

       $countlist=M('CommentProduct')->where(array('product_id'=>$productid,'state'=>0))->count();
       foreach ($comment as $key => $value) {
         $comment[$key]['picture']= explode(",",$value['image']);
         $comment[$key]['statue']=$countlist;
       }
      if($comment){
          $this->ajaxReturn(array('status'=>1,'infor'=>'成功','data'=>$comment));
       }else{
          $this->ajaxReturn(array('status'=>0,'infor'=>'失败'));
       } 
    }
   }


