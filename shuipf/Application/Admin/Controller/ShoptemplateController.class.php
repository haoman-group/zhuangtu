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

class ShoptemplateController extends AdminBase {
    
    private $Model = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->Model = M('ShopTemplate');
        $this->assign('status',array(0=>'禁用',1=>'启用'));
        $this->assign('type',array('level1'=>'一级页面','detail'=>'详情页'));
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
            $data['updatetime'] = time();
            $this->Model->add($data);
            $this->success('提交成功',U('index'));
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
            $data['updatetime'] = time();
            $this->Model->save($data);
            $this->success('提交成功',U('index'));
        }
        else{
            $id = I('request.id','','');
            $data = $this->Model->where(array('id' => $id))->find();
            $this->assign('data', $data);
            $this->display();
        }
        
    }
}