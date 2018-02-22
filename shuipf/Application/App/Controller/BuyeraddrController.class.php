<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 买家地址信息操作 app接口
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace App\Controller;

class BuyeraddrController extends ApibaseController {
	private $model = null;
	protected function _initialize(){
		parent::_initialize();
		$this->model = D("Buyer/BuyerAddr");
	}
	//获取当前用户地址列表
	public function lists(){
		$uid = I('request.uid');
		if(empty($uid)){$this->ajaxReturn(array('status'=>0,'msg'=>'错误：未指定用户！'));}
		$lists = $this->model->getAddrOfApp($uid);
		$this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$lists));
	}
	//新增地址
	public function add(){
		$data = I('request.');
		if(empty($data)){
			$this->ajaxReturn(array('status'=>0,'msg'=>'添加失败!未指定数据!'));
		}
        if(!$this->model->create($data)){
        	$this->ajaxReturn(array('status'=>0,'msg'=>'操作失败:'.$this->model->getError().'！'));
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
			$this->ajaxReturn(array('status'=>0,'msg'=>'删除失败!未指定ID!'));
		}
        if($this->model->deleteAddr($id)){
            $this->ajaxReturn(array('status'=>1,'msg'=>'删除成功！'));
        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'删除失败:'.$this->model->getError()));
        }
	}

	//设置默认收货地址
    public function setDefault(){
        $id = I('request.id');
        $uid = I('request.uid');
        if(empty($id)){
			$this->ajaxReturn(array('status'=>0,'msg'=>'设置默认地址失败!未指定数据!'));
		}
        if($this->model->setDefault($id,$uid)){
            $this->ajaxReturn(array('status'=>1,'msg'=>'设置默认地址成功！'));
        }else{
            $this->ajaxReturn(array('status'=>0,'msg'=>'设置默认地址失败！'));
        }
    }
    // 获取地区数据
    public function getArea(){
        $id = I('get.id');
        if(empty($id) && ($id ==='0')){$id = '1';}
        $result = M('Area')->where(array("pid"=>$id))->select();
        $data = array();
        foreach($result as $key=>$v){
            $data[$key]['id'] = $v['id'];
            $data[$key]['name'] = $v['name'];
        }
         $this->ajaxReturn(array('status'=>1,'msg'=>'查询成功！','data'=>$data));
    }
}