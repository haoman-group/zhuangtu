<?php
//网购轻工
namespace App\Controller;
class WorkerController extends ApibaseController{
    protected $positiondata=NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->positiondata= D('Admin/PositionData');
}
  public function worker(){

      $posdata=$this->positiondata->getDataByPageID("2");
          // var_dump($posdata['124']);
       foreach ($posdata as $key=>$value){
           
           foreach ($value as $k=>$v){  
               $shopid=M("Product")->where(array('id'=>$v['data']['id']))->getField("shopid");

               $star=M("Shop")->where(array('id'=>$shopid))->getField("star");
               if($star == ''){
                $posdata[$key][$k]['data']['star']="0";
               }else{
                $posdata[$key][$k]['data']['star']=$star;
               }
                if(empty($v['wap_picture'])){
                    $posdata[$key][$k]['wap_picture']=$v['picture'][0];
                }
               
           }
          
       }
       
      if(empty($posdata)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败！'));}

      $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功！','data'=>$posdata));
  }

}
?>