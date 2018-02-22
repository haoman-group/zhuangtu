<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 卖家地址信息操作
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Api\Controller;
class SelleraddrController extends ApibaseController {
	private $model = null;
	protected function _initialize(){
		parent::_initialize();
		$this->model = D("Seller/SellerAddr");
	}
	//新增地址
	public function add(){
		$data = I('request.');
		if(empty($data)){
			$this->ajaxReturn(array('status'=>-1,'msg'=>'添加失败!未指定数据!'));
		}
        $data['uid'] = $this->userid;
        if(!$this->model->create($data)){
        	$this->ajaxReturn(array('status'=>-1,'msg'=>'操作失败:'.$this->model->getError().'！'));
        }else{
        	if(!empty($data['id'])){
        		$this->model->save();
        		$this->ajaxReturn(array('status'=>1,'msg'=>'更新成功！'));
        	}else{
        		$this->model->add();
        		$this->ajaxReturn(array('status'=>1,'msg'=>'添加成功！'));	
        	}
        }
	}
	//删除地址
	public function delete(){
		$id = I('request.id');
		if(empty($id)){
			$this->ajaxReturn(array('status'=>-1,'msg'=>'删除失败!未指定ID!'));
		}
        if($this->model->deleteAddr($id)){
            $this->ajaxReturn(array('status'=>1,'msg'=>'删除成功！'));
        }else{
            $this->ajaxReturn(array('status'=>-1,'msg'=>'删除失败！'));
        }
	}
	//编辑地址
	// public function edit(){
	// 	$data = I('request.');
	// 			if(empty($data)){
	// 		$this->ajaxReturn(array('status'=>-1,'msg'=>'添加失败!未指定数据!'));
	// 	}
	// 	if(!$this->model->create($data)){
 //        	$this->ajaxReturn(array('status'=>-1,'msg'=>'更新失败:'.$this->model->getError().'！'));
 //        }else{
 //        	$this->model->save();
 //        	$this->ajaxReturn(array('status'=>1,'msg'=>'更新成功！'));
 //        }
	// }
	//设置默认收货地址
    public function setDefault(){
        $id = I('request.id');
        if(empty($id)){
			$this->ajaxReturn(array('status'=>-1,'msg'=>'设置默认地址失败!未指定数据!'));
		}
        if($this->model->setDefault($id,$this->userid)){
            $this->ajaxReturn(array('status'=>1,'msg'=>'设置默认地址成功！'));
        }else{
            $this->ajaxReturn(array('status'=>-1,'msg'=>'设置默认地址失败！'));
        }
    }
}