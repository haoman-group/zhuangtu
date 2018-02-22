<?php

// +----------------------------------------------------------------------
// | 后台 验证码查询页
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;
class SmsverifyController extends AdminBase {
    private $model;
    protected function _initialize() {
        parent::_initialize();
        $this->model = M('SmsVerify');
    }
    public function index(){
        $where = array();
        if(I("get.search") == 1){
            $where['mobile'] = array('LIKE','%'.I('get.keyword').'%');
        }
        $count = $this->model->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        $this->assign('Page', $page->show());
        $this->assign('data', $data);
        $this->display();
    }
    
   

    
}
    
    


