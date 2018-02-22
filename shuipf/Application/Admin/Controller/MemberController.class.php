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

class MemberController extends AdminBase {

    protected $model = NULL;
    protected $dataModel = NULL;

    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Member/Member');
        $this->dataModle = D('MemberData');
    }

    public function index(){
        $where = array();
        $where['isdelete'] = 0;
        $count = $this->model->where($where)->order('id desc')->count();
        $page = $this->page($count, 20);
        $data = $this->model->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('id desc')->select();
        $this->assign('Page',$page->show());
        $this->assign('data',$data);
        $this->display();
    }
    public function add(){

        if(IS_POST){
            $data = $_POST;
            $data['catpid'] = M('ProductCategory')->getFieldById($data['catid'],'pid');
            $data['picture'] = serialize($data['picture']);
            $data['addtime'] = time();
            $this->model->data($data)->add();
            $this->success('提交成功');
        }else{
            $cate = M('ProductCategory')->where(array('pid'=>0))->getField("id,name,pid");
            foreach ($cate as $k => $v) {
                $cate[$k]['son'] = M('ProductCategory')->where(array('pid'=>$k))->getField('id,name,pid');
            }
            $this->assign('cate',$cate);
            $this->display();    
        }
    }

    public function edit(){
        $id = I('id',0);
        $data = $this->model->where(array('id'=>$id))->find();
        if(!$data) $this->error("页面不存在");
        if(IS_POST){
            $data = $_POST;
            $data['catpid'] = M('ProductCategory')->getFieldById($data['catid'],'pid');
            $data['picture'] = serialize($data['picture']);
            $this->model->where(array('id'=>$id))->data($data)->save();
            $this->success('提交成功',U('index'));
        }else{
            $data['picture'] = unserialize(($data['picture']));

            $cate = M('ProductCategory')->where(array('pid'=>0))->getField("id,name,pid");
            foreach ($cate as $k => $v) {
                $cate[$k]['son'] = M('ProductCategory')->where(array('pid'=>$k))->getField('id,name,pid');
            }            $this->assign('cate',$cate);
            $this->assign('data',$data);
            $this->display();  

        }
    }
    //删除
    public function delete() {
        $id = I("get.id", 0, "intval");
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $re = $this->model->find($id);
        if(!$re) $this->error("不存在");
        if (false == $this->model->where(array('id'=>$id))->setField('isdelete',1)) {
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
