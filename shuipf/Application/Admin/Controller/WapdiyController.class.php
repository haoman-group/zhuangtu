<?php
// +----------------------------------------------------------------------
// | 手机专题页管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use Common\Controller\AdminBase;


class WapdiyController extends AdminBase {
    /**
    * @name 上传宝贝
    **/
    private $model ;
    protected function _initialize(){
        parent::_initialize();
        // $this->model = D('Seller/Product');
    }
    //列表页
    public function index(){
        $this->display();
    }
    //添加页
    public function add(){
        $this->display();
    }

    //修改页
    public function edit(){
        $this->display();
    }

    //装修页
    public function diy(){
        $this->display();
    }

    //编辑图片
    public function diy1(){
        $this->display();
    }

    //编辑轮播图
    public function diy2(){
        $this->display();
    }

    //编辑产品列表
    public function diy3(){
        $this->display();
    }


}