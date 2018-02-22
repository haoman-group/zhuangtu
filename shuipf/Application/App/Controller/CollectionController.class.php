<?php
//收藏的接口
namespace App\Controller;
class  CollectionController  extends ApibaseController{
	protected $collectionmodel=NULL;
	protected function  _initialize(){
		 parent::_initialize();
        $this->collectionmodel=M('Collection');
	}

	public function collectadd(){
		$data['itemid']=I("itemid");
		$data['uid']=I('uid');
		$data['type']=I('type');
		$data['isdelete']=I('isdelete');
		$data['addtime']=time();
		$where['itemid']=I("itemid");
		$where['uid']=I('uid');
		$where['type']=I('type');
		$result=$this->collectionmodel->where($where)->find();
		if(empty($result)){
			$addcollect=$this->collectionmodel->add($data);
			 $this->ajaxReturn(array('status'=>1,'meg'=>'操作成功'));
		}else{
			$updata=$this->collectionmodel->where($where)->setField("isdelete",0);
			$this->ajaxReturn(array('status'=>1,'meg'=>'操作成功'));
		}

	}

	public function collectdele(){
		$where['itemid']=I("itemid");
		$where['uid']=I('uid');
		$where['type']=I('type');
		$data['isdelete']=I('isdelete');
		$data['addtime']=time();
		$result=$this->collectionmodel->where($where)->data($data)->save();
		if($result){
          $this->ajaxReturn(array('status'=>1,'meg'=>'操作成功'));
		}else{
			$this->ajaxReturn(array('status'=>0,'meg'=>'操作失败'));
		}
	}

}

?>