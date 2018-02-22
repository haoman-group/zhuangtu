<?php
// +----------------------------------------------------------------------
// | 宝贝管理--工人类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Common\Controller\AdminBase;


class WorkerController extends AdminBase {
    /**
    * @name 上传宝贝
    **/
    private $model =　NULL;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Seller/Product');
    }
    public function index(){
        redirect('Admin/Product/index');
        // $this->display();
    }
}