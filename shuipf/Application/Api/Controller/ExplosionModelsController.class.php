<?php
//微信爆款
namespace Api\Controller;

use Common\Controller\Base;

class ExplosionModelsController extends Base{
	 protected $model = null;
	  protected $Page_Size = 10;//每次获取10个产品
	   protected function _initialize() {
	   	$this->model=M('PositionData');
        parent::_initialize();
       
    }
  //获取微信爆款产品列表
   public function getLists(){
   
   	$posdata=$this->getDataByPageID();
   	  
     if(empty($posdata)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败！'));}

      $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功！','data'=>$posdata));

   }
   public function getDataByPageID(){
   	     $data=I("get.");
   	     $where['posid']=236;
		 $where['status'] = 1; //启用
		 $where['starttime'] = array("ELT",date("Y-m-d H:i:s")); //启用时间小于当前时间
	 	 $where['endtime'] = array("EGT",date("Y-m-d H:i:s")); 
	 	 $positioninfo=$this->model->where($where)->order("place asc")->select();
	 	 $count=count($positioninfo);  
	 	$page=new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
	 	$libs = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order("place asc")->select();
	 	foreach ($libs as $key => $value) {
	 		$libs[$key]['data']=unserialize($value['data']);
	 	}
   	      return $libs;
		
	}

}



?>