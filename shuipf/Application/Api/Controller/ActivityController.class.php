<?php
namespace Api\Controller;
  class ActivityController extends ApibaseController {
    protected $dataModel = NULL;
    protected $activityModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->dataModel = D('Admin/ActivityData');
        $this->activityModel = D('Admin/Activity');
    }
    //获取计费接口
   public function charge(){
       $prodids = I('productIds');
        $act_id= I('act_id','');
        $data = $this->activityModel->chargeCalcByType($prodids,$act_id);
        if(!$data){
          $this->ajaxReturn(array('status'=>-1,'msg'=>'错误'.$this->activityModel->getError()));  
        }
        $this->ajaxReturn(array('status'=>1,'msg'=>'成功','data'=>$data));      
    }
}


