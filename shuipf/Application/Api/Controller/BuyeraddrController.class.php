<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 买家地址信息操作
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Api\Controller;

use Common\Controller\Base;

class BuyeraddrController extends Base {
	private $model = null;
	protected function _initialize(){
		parent::_initialize();
		$this->model = D("Buyer/BuyerAddr");
	}
    //获取当前用户地址列表
    public function lists(){
        $uid = $this->userid;
        if(empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定用户！'));}
        $lists = $this->model->getAddrOfApp($uid);
        $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$lists));
    }
	//新增地址
	public function add(){
		$data = I('request.');
		if(empty($data)){
			$this->ajaxReturn(array('status'=>-1,'msg'=>'添加失败!未指定数据!'));
		}
		$count = $this->model->where(array('uid'=>$this->userid))->count();
		if($count == 0){ $data['default'] = 1;}
        $data['uid'] = $this->userid;
        if(!$this->model->create($data)){
        	$this->ajaxReturn(array('status'=>-1,'msg'=>'操作失败:'.$this->model->getError().'！'));
        }else{
        	if(!empty($data['id'])){
        		$this->model->save();
        		$this->ajaxReturn(array('status'=>1,'msg'=>'更新成功！','data'=>''));
        	}else{
        		$redata = $this->model->add();
        		$this->ajaxReturn(array('status'=>1,'msg'=>'添加成功！','data'=>$redata));
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
            $this->ajaxReturn(array('status'=>-1,'msg'=>'删除失败:'.$this->model->getError()));
        }
	}
	// // 设置默认地址
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
    public function getArea(){
        $id = I('get.id');
        if(empty($id) && ($id ==='0')){$id = '1';}
        $result = M('Area')->where(array("pid"=>$id,"status"=>"0"))->select();
        $data = array();
        foreach($result as $key=>$v){
            $data[$v['id']] = array('name'=>$v['name']);
        }
        echo json_encode($data);
    }
}