<?php
namespace App\Controller;
class CommentController extends ApibaseController{
	protected $commentModel=null;
	protected function  _initialize(){
		 parent::_initialize();
        $this->commentModel=M('CommentProduct');
	}
	public function comminfo($proid){
		$proid=I('proid');
		$comment=$this->commentModel->where(array('product_id'=>$proid))->select();
		$count=$this->commentModel->where(array('product_id'=>$proid))->count();
		foreach ($comment as $key => $value) {
			$comment[$key]['image']=explode(",", $value['image']);
			$comment[$key]['count']=$count;
			$comment[$key]['provalue']=M('OrderGoods')->where(array('rec_id'=>$value['ordergoods_id']))->getField('provalue');
			$comment[$key]['provalue']=unserialize($comment[$key]['provalue']);
			$num=M('CommentShop')->where(array('order_id'=>$value['order_id']))->find();
			$comment[$key]['star']=($num['lineshop']+$num['lineservice']+$num['onlineshop']+$num['onlineseveri'])/4;
		}

        if(empty($comment)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败！'));}
        $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功！','data'=>$comment));
	}

}


?>