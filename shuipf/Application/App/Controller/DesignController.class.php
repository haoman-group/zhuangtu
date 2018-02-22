<?php
namespace App\Controller;
//网购设计
class DesignController extends ApibaseController{
     
    protected $positiondata=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->positiondata= D('Admin/PositionData');
    }

  public function design(){
  	   $posdata=$this->positiondata->getDataByPageID("1");
  	   //var_dump($posdata);exit;
  	    foreach ($posdata as $key=>$value){
           foreach ($value as $k=>$v){
                if(empty($v['wap_picture'])){
                    $posdata[$key][$k]['wap_picture']=$v['picture'][0];
                }
               
           }

          
       }


       $posdata['style']=M('option_field')->where(array('name'=>'attr_style','status'=>'1','value'=>array("neq","古典")))->getField('id,value',true);
        $shopid=array();
       foreach ($posdata['style'] as $k1=> $v1) {
        $posdata['styledata']['1'][$k1]=M("DesignLibrary")->where(array("style"=>$v1,'isdelete'=>0))->select();
        
        
       }
      
      foreach ($posdata['styledata']['1'] as $k2 => $v2) {
      foreach ($v2 as $k3 => $v3) {
        $url=M("Shop")->where(array('id'=>$v3['shopid']))->getField("domain");
        $posdata['styledata']['1'][$k2][$k3]['url']="www.zhuangtu.net/s/$url";
      }
       
      }
      if(empty($posdata)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败！'));}
      $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功！','data'=>$posdata));

  }  
}
?>