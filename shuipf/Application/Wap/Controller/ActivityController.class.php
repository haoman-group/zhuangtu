<?php
namespace Wap\Controller;
use Common\Controller\Base;

class ActivityController extends Base {

    protected function _initialize() {
        parent::_initialize();
        $this->model = D("Admin/ActivityWechat");
    }

    public function _empty(){
        $this->display();
    }
    public function index(){
    	if(IS_AJAX){
    		$data = I('GET.');
    		// var_dump($data['mobile']);
    		if($this->model->create($data)){
    			$this->model->add();
    			session('mkbl_seesion',$data['mobile']);
    			echo json_encode(array('status'=>'1','msg'=>'success','mobile'=>$data['mobile']));
    			die();
    		}else{
    			$msg = $this->model->getError();
    			if($msg == '手机号码已经登记，无需重复登记!'){
    				echo json_encode(array('status'=>'-2','msg'=>$this->model->getError(),'mobile'=>$data['mobile']));
    				die();	
    			}else{
    				echo json_encode(array('status'=>'-1','msg'=>$this->model->getError()));
    				die();	
    			}	
    		}
    	}else{
    		if(session('?mkbl_seesion')){
    			$this->redirect('success',array('mobile'=>$data['mobile']));
    		}
    		$this->display();
    	}
    }
    public function success(){
    	if(session('?mkbl_seesion')|| $_GET['mobile'] !=null){
	    	$mobile = empty(session('mkbl_seesion'))?$_GET['mobile']:session('mkbl_seesion');
	    	$data = $this->model->where(array('mobile'=>$mobile))->find();
	    	$this->assign('data',$data);
	    	$this->display();
    	}else{
    		$this->redirect('index');
    	}
    }

}
