<?php
namespace App\Controller;

class MemberpicController extends ApibaseController{
	protected $model=NULL;

	 protected function _initialize() {
        parent::_initialize();
        $this->model=M("Member");

 }
 //手机端修改头像
    public function userpic(){
        empty(I('userid'))?$this->error("用户不存在"):$where['userid']=I("userid");
        empty(I("userpic"))?$this->error("修改头像不能为空"):$userpic=I("userpic");
        $result=$this->model->where($where)->setField(array('userpic'=>$userpic));
        if($result){
            $this->ajaxReturn(array('status'=>1,'msg'=>'修改成功'));

        }else{
        	 $this->ajaxReturn(array('status'=>1,'msg'=>'修改失败'));
        }
    }
}

?>