<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 行为管理
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;

class OptionController extends AdminBase {

    protected $model = NULL;
    protected $fieldModel = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->model = M('Option');
        $this->fieldModel = M('OptionField');
    }

    public function index(){
        
        $where = array();
        $count = $this->model->where($where)->order('id desc')->count();
        $page = $this->page($count, 10);
        $data = $this->model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        foreach($data as $k=>$v){
            $data[$k]['field'] = $this->fieldModel->where(array('name'=>$v['name']))->select();
        }
        $this->assign('Page',$page->show());
        $this->assign('data',$data);
        $this->assign('status',array(1=>'启用',0=>'禁用'));
        $this->display();
    }

    public function add(){
        $id = I('id',0);
        $data = $this->model->find($id);
        if(IS_POST){
            $data = array(
                'name'=>I('name'),
                'key'=>I('key'),
                'value'=>I('value'),
                'status'=>I('status'),
                'pid'=>I('pid'),
            );
            $re = $this->fieldModel->data($data)->add();
            if(!$re) $this->error('提交失败');
            $this->success('提交成功',U('index'));
        }else{
            $parent = $this->fieldModel->where(array('name'=>$data['name'],'pid'=>0))->getField('id,value');
            $this->assign('parent',$parent);
            $this->assign('data',$data);
            $this->assign('status',array(1=>'启用',0=>'禁用'));
            $this->display();    
        }
    }

    public function edit(){
        $id = I('id',0);
        $data = $this->fieldModel->find($id);
        if(IS_POST){
            $data = array(
                'key'=>I('key'),
                'value'=>I('value'),
                'status'=>I('status'),
                'pid'=>I('pid'),
            );
            $re = $this->fieldModel->where(array('id'=>$id))->data($data)->save();
            if(!$re) $this->error('提交失败');
            $this->success('提交成功',U('index'));
        }else{
            $parent = $this->fieldModel->where(array('name'=>$data['name'],'pid'=>0))->getField('id,value');
            $this->assign('parent',$parent);
            $this->assign('data',$data);
            $this->assign('status',array(1=>'启用',0=>'禁用'));
            $this->display();    
        }
    }
    //删除
    public function delete() {
        $id = I("get.id", 0, "intval");
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->fieldModel->find($id);
        if(!$re) $this->error("不存在");
        if (false == $this->fieldModel->where(array('id'=>$id))->delete()) {
            $this->error("删除失败");
        }
        $this->success("删除成功！");
    }
    public function status(){
        $id = I("get.id", 0, "intval");
        if (!$id) {
            $this->error("请指定需要的项目！");
        }
        $re = $this->model->find($id);
        if(!$re) $this->error("不存在");
        if($re['status']=1){
            $this->model->where(array('id'=>$id))->setField("status",-1);
        }elseif($re['status']=-1){
            $this->model->where(array('id'=>$id))->setField("status",1);
        }
        $this->success("提交成功！", U("index"));
    }
}
