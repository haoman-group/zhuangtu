<?php
// +----------------------------------------------------------------------
// | 后台 邮箱验证码查询页
// +----------------------------------------------------------------------
// | Author: qinke <270710922@qq.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;
class SmsemailController extends AdminBase {
    private $model;
    protected function _initialize() {
        parent::_initialize();
        $this->model = M('EmailVerify');
    }
    public function email(){
        $where = array();
        if(I("get.search") == 1){
            $where['email'] = array('LIKE','%'.I('get.keyword').'%');
        }
        $count = $this->model->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        $this->assign('Page', $page->show());
        $this->assign('data', $data);
        $this->display();
    }
    
   

    
}
    
    


