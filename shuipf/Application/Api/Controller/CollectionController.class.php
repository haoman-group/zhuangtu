<?php

//wap端的收藏店铺和收藏宝贝以及他们的判断
namespace Api\Controller;

use Common\Controller\Base;

class CollectionController extends Base{
    protected $model=NULL;
    protected function _initialize(){
		parent::_initialize();
		$this->model = D("Collection");
	}

//判断是否收藏
	public function checkcollection(){
		$where['uid']=$this->userid;
		$where['itemid']=I("itemid");
		$where['type']=I("type");
		$where['isdelete']=I("isdelete");
		$result=$this->model->where($where)->count();
		if($result == 1){
            $this->ajaxReturn(array('status'=>'1','msg'=>"已收藏"));
		}else{
			$this->ajaxReturn(array('status'=>'0','msg'=>'未收藏'));
		}
	}

//收藏

public function addcollection(){
   $this->userid==0?NULL:$data['uid']=$this->userid;
   empty(I("itemid"))?NULL:$data['itemid']=I("itemid");
   empty(I("type"))?NULL:$data['type']=I("type");
   
  if(empty($data)){
      $this->ajaxReturn(array('status'=>0,'msg'=>'操作失败'));
  }else{
   $result=$this->model->where($data)->count();
  
   if($result == 0 ){
      $data['isdelete']=0;
      $data['addtime']=time();
      $re=$this->model->data($data)->add();
      if($re){
       $this->ajaxReturn(array('status'=>1,'msg'=>'操作成功'));
      }else{
      	$this->ajaxReturn(array('status'=>0,'msg'=>'操作失败'));
      }
   }else{
   	 $data['isdelete']=0;
   	 $re=$this->model->where($data)->count(); 
   	 if($re == 1){
   	   $updata=$this->model->where(array('uid'=>$this->userid,'itemid'=>I("itemid"),'type'=>I("type")))->setField("isdelete",I('isdelete'));
   	   if($updata){
       $this->ajaxReturn(array('status'=>1,'msg'=>'操作成功'));
      }else{
      	$this->ajaxReturn(array('status'=>0,'msg'=>'操作失败'));
      }	
   	 }else{
       $updata=$this->model->where(array('uid'=>$this->userid,'itemid'=>I("itemid"),'type'=>I("type")))->setField("isdelete",I('isdelete'));
       if($updata){
       $this->ajaxReturn(array('status'=>1,'msg'=>'操作成功'));
      }else{
        $this->ajaxReturn(array('status'=>0,'msg'=>'操作失败'));
      } 
     }
   }
}

}	

} 


?>