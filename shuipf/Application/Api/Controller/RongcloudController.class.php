<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 移动端模块
// +----------------------------------------------------------------------
// | Action 购物车接口
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Api\Controller;

class RongcloudController extends ApibaseController {
	private $model = null;
	protected function _initialize(){
		parent::_initialize();
		$this->model = D("Member/RongcloudToken");
		$this->ServiceimMessageModel = D('Member/ServiceimMessage');
		$this->ServiceimRecordModel = D('Member/ServiceimRecord');

	}
	//获取当前用户地址列表
//	public function lists(){
//		$uid = I('request.uid');
//		if(empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定用户！'));}
//		$lists = $this->model->getCartList(array('uid'=>$uid));
//		$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$lists));
//	}


	public function getToken(){
		$uid = $this->userid;
		if(empty($uid)){
			$uid = 451;
			//$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定用户！'));
		}
		$count = M('Member')->where(array('userid'=>$uid))->count();
		if($count == 0){
			$this->ajaxReturn(array('status'=>0,'msg'=>'错误！','data'=>''));
		}
		else{
			$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功!','data'=>$this->model->getToken($uid)));
		}
	}


	public function addmsg(){
		$uid = $this->isLogin();
		if(empty($uid)){
			$uid = 451;
			//$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未登录！'));
		}

		$content = I('content');
		$shopid = I('shopid');
		$productid = I('productid');
		$order_sn = I('order_sn');
		$direction = I('direction');
		$msgtype = I('msgtype');

		if(empty($shopid)){
			$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定店铺！'));
		}
		$shopcount = M('Shop')->where(array('id'=>$shopid))->count();
		if($shopcount == 0){
			$this->ajaxReturn(array('status'=>0,'msg'=>'错误！','data'=>''));
		}

		$data['content'] = $content;
		$data['uid'] = $uid;
		$data['shopid'] = $shopid;
		$data['productid'] = $productid;
		$data['order_sn'] = $order_sn;
		$data['direction'] = $direction;
		$data['msgtype'] = $msgtype;


		$result = $this->ServiceimMessageModel->addmsg($data);
		if(false !== $result){
			$this->ajaxReturn(array('status'=>1,'msg'=>'成功！','data'=>$result));
		}
		else{
			$this->ajaxReturn(array('status'=>0,'msg'=>'添加失败！','data'=>$result));
		}

	}


	public function latestrecord(){
		$uid = $this->isLogin();
		if(empty($uid)){
			$this->ajaxReturn(array('status'=>0,'msg'=>'未登录'));
		}
		$voimrecord = $this->ServiceimRecordModel->latestrecord($uid,16);
		$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>empty($voimrecord)?"":$voimrecord  ));
	}
}