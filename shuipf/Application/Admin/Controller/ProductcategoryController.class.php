<?php

// +----------------------------------------------------------------------
// | 宝贝分类管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;
use Common\Model\Model;

class ProductcategoryController extends AdminBase {
    
    private $Model = NULL;
    protected $path = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->path = "<a href=".U('Productcategory/index').">首页></a>>";
        $this->Model = D('Admin/ProductCategory');
    }
    public function index(){
        if(IS_POST){
            
        }
        else{
            $result = D('Admin/ProductCategory')->childlist('0');
            $this->assign('data',$result);
            $this->assign('path',$this->path);
            $this->display();
        }
    }
    public function add(){
        if (IS_POST) {
            $data = I('post.', '', '');
            $data['addtime'] = time();
            $this->Model->add($data);
            redirect(U('Productcategory/index'));
        }
        else{
            $Newcid = D('Admin/ProductCategory')->getCID();
            $parent_id = 
            $this->assign('cid',$Newcid);
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
         if (false == $this->Model->where(array('id'=>$id))->setField('isdelete',1)){
             $this->error('删除失败！');
         }
        $this->success('删除成功！');
    }
    public function edit(){
        if (IS_POST) {
            $data = I('post.', '', '');
            $data['addtime'] = time();
            $this->Model->save($data);
            redirect(U('Productcategory/index'));
        }
        else{
            $cid = I('request.cid','','');
            $data = $this->Model->where(array('cid' => $cid))->select();
            $this->assign('data', $data);
            $this->display();
        }
        
    }
    //展示子菜单
    //@cid 父菜单ID
    public function child(){
        $pid = I('request.cid','','');
        $path = $this->getPath($pid,$this->path);
        $this->getPPid($pid);
        $result = D('Admin/ProductCategory')->childlist($pid);
        if($result){
            $this->assign('data',$result);
            $this->assign('path',$path);
            $this->display('Productcategory/index');
        }
        else{
            $this->success('没有子菜单！');
        }
    }
    public function back(){
        $CurrentPid = cache('currentPid');
        $this->getPPid($CurrentPid);
         $path = $this->getPath($CurrentPid,$this->path);
        $result = D('Admin/ProductCategory')->childlist($CurrentPid);
        $this->assign('data',$result);
         $this->assign('path',$path);
        $this->display('Productcategory/index');
    }
    //根据当前ID缓存取父ID
    protected function getPPid($CurrentPid){
        $parent = D('Admin/ProductCategory')->where(array('cid' => $CurrentPid))->getField('parent_cid');
        if(!empty($parent)){
            cache('currentPid',$parent);
        }else{
            cache('currentPid',0);
        }
    }
    //获取<a>类型的路径
    protected function getPath($id,$path){
        $result = D('Admin/ProductCategory')->where(array('cid' => $id))->select();
        if(!empty($result)){
            //$path = $this->getPath($result['0']['parent_cid'],$path).$result['0']['name'].'> ';
            $path = $this->getPath($result['0']['parent_cid'],$path). "<a href=".U('Productcategory/child',array("cid" => $result['0']['cid'])).">".$result['0']['name']."</a>>";
        }
        return $path;
    }
    //获取纯文本类型的所在路径
    protected function getTextPath($cid,$path){
        $result = D('Admin/ProductCategory')->where(array('cid' => $cid))->find();
        if(!empty($result)){
            $path = $this->getPath($result['parent_cid'],$path).$result['0']['name'].">";
        }
        return $path;
    }
    public function search(){
        if(IS_POST){
        $content = I('post.name');
        $where =array();
        $where['name'] = array('LIKE',"%".$content."%");
        $result = D('Admin/ProductCategory')->where($where)->select();
        // var_dump($result);
        $data =array();
        foreach($result as $cate){
            $item = $this->getPath($cate['parent_cid']);
            echo $item;
            echo $cate['name'];
            echo "<br>";
            }
        // var_dump($data);
        }
        $this->display();
    }
}