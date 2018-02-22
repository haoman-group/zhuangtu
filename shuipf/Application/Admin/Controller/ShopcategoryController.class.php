<?php

// +----------------------------------------------------------------------
// | 店铺分类管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;
use Common\Model\Model;

class ShopcategoryController extends AdminBase {
    
    private $Model = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->Model = M('ShopCategory');
    }
    public function index(){
        $data = $this->Model->select();
        $this->assign('data', $data);
        $this->display();
    }
    public function add(){
        if (IS_POST) {
            $data = I('post.', '', '');
            $data['addtime'] = time();
            $this->Model->add($data);
            redirect(U('Shopcategory/index'));
        }
        else{
            $this->display();
        }
    }
    public function delete(){
        $id = I('request.id','','');
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->Model->find($id);
        if(!$re) $this->error("不存在待删除数据");
         if (false == $this->Model->delete($id)){
             $this->error('删除失败！');
         }
        $this->success('删除成功！');
    }
    public function edit(){
        if (IS_POST) {
            $data = I('post.', '', '');
            $data['addtime'] = time();
            $this->Model->save($data);
            redirect(U('Shopcategory/index'));
        }
        else{
            $id = I('request.id','','');
            $data = $this->Model->where(array('id' => $id))->select();
            $this->assign('data', $data);
            $this->display();
        }
        
    }
}