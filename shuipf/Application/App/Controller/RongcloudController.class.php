<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 移动端模块
// +----------------------------------------------------------------------
// | Action 购物车接口
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace App\Controller;

class RongcloudController extends ApibaseController {
	private $model = null;
	protected function _initialize(){
		parent::_initialize();
		$this->model = D("Member/RongcloudToken");
		$this->ServiceimMessageModel = D('Member/ServiceimMessage');

	}
	//获取当前用户地址列表
//	public function lists(){
//		$uid = I('request.uid');
//		if(empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定用户！'));}
//		$lists = $this->model->getCartList(array('uid'=>$uid));
//		$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$lists));
//	}

	public function getToken(){
		$uid = I('request.uid');
		if(empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定用户！'));}
		$count = M('Member')->where(array('userid'=>$uid))->count();
		if($count == 0){
			$this->ajaxReturn(array('status'=>0,'msg'=>'错误！','data'=>''));
		}
		else{
			$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功!','data'=>$this->model->getToken($uid)));
		}
	}


	public function addmsg(){
		$data['content'] = I('content');
		$data['uid'] = I('uid');
		$data['shopid'] = I('shopid');
		$data['productid'] = I('productid');
		$data['direction'] = I('direction');
		$data['msgtype'] = I('msgtype');

		$result = $this->ServiceimMessageModel->addmsg($data);
	}
}