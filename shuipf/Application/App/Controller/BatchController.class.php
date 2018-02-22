<?php
//批量删除

namespace App\Controller;

class BatchController extends ApibaseController{
     protected $collection=NULL;
	protected function _initialize(){
		parent::_initialize();
		$this->collection=M("Collection");
	}
   //删除宝贝
	public function prodelete(){
		$productid=I("productid");
		$where['itemid']=array("in",$productid);
        $where['uid']=I('uid');
		$where['type']=1;
		$result=$this->collection->where($where)->delete();
		if($result){
			$this->ajaxReturn(array('status'=>1,'msg'=>'删除成功'));
		}else{
			$this->ajaxReturn(array('status'=>0,'msg'=>'删除失败'));
		}
	}
   //删除店铺
	public function shopdele(){
		$shopid=I("shopid");
		$where['uid']=I('uid');
		$where['itemid']=array("in",$shopid);
		$where['type']=2;
		$result=$this->collection->where($where)->delete();
		if($result){
			$this->ajaxReturn(array('status'=>1,'msg'=>'删除成功'));
		}else{
			$this->ajaxReturn(array('status'=>0,'msg'=>'删除失败'));
		}
	}

	//单个删除宝贝

	public function singledel(){
		$where['itemid']=I("productid");
		$where['type']=1;
		$where['uid']=I('uid');
		$result=$this->collection->where($where)->delete();

		if($result){
			$this->ajaxReturn(array('status'=>1,'msg'=>'删除成功'));

		}else{
			$this->ajaxReturn(array('status'=>0,'msg'=>'删除失败'));
		}

	}
   //单个删除店铺
	public function singledelshop(){
		$where['itemid']=I("shopid");
		$where['type']=2;
		$where['uid']=I('uid');
		$result=$this->collection->where($where)->delete();
		if($result){
			$this->ajaxReturn(array('status'=>1,'msg'=>'删除成功'));
		}else{
			$this->ajaxReturn(array('status'=>0,'msg'=>'删除失败'));
		}

	}
}

?>