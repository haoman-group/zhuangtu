<?php

// +----------------------------------------------------------------------
// | 宝贝属性管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBase;
class PropertyController extends AdminBase{

    protected function _initialize() {
        parent::_initialize();
        $this->assign("status",array("normal"=>"正常","disabled"=>"不可用"));
    }
    public function index(){
        if(IS_AJAX){
            $cid = I('get.cid','','');
            $products = M('ProductCategory')->where(array("parent_cid" => $cid,'isdelete'=>'0'))->getField('cid,name',true);
            $this->ajaxReturn($products);
            return;
        }
        $pid = I('get.pid','','');
        if($pid != ""){
            $props = M('ProductProperty')->where(array('cid'=>$pid,'isdelete'=>'0'))->select();
            if(!empty($props)){
                
            
            foreach($props as $key=>$p){
                $values = M('ProductPropertyValue')->where(array("pid" =>$p['pid'],"cid" => $p['cid']))->getField("name",true);
                $props[$key]["values"]=$values;
            }   
            $this->assign("data",$props);
            }
        }
        $products = M('ProductCategory')->where(array("parent_cid" => "0",'isdelete'=>'0'))->getField('cid,name',true);
        $this->assign("category",$products);
        $this->display();
    }
    public function edit(){
        if(IS_POST){
            $data = I('request.','','');
            // if( false == M('ProductProperty')->where(array("id" => $data['id']))->save($data)){
            //     $this->error("更新修改发生错误！". $data['id']);
            // }
            // var_dump($data);
            // foreach($data['value'] as $key => $va){
                
            //     if(false == M('ProductPropertyValue')->where(array("vid" => $va['vid']))->save($va)){
            //         $this->error("更新修改发生错误！". $va['vid']);
            //     }
            // }
            M('ProductProperty')->where(array("id" => $data['id']))->save($data);
            foreach($data['value'] as $key => $va){
                if($va['vid'] == "勿填"){
                    $va['vid'] = M('ProductPropertyValue')->max('vid') + 1;
                    $va['cid'] = $data['cid'];
                    $va['pid'] = $data['pid'];
                    $va['prop_name'] = M('ProductProperty')->where(array("cid"=>$data['cid'],'pid' => $data['pid']))->getField('name');
                    //var_dump($va);
                    M('ProductPropertyValue')->add($va);
                }
                else{
                    M('ProductPropertyValue')->where(array("cid"=>$data['cid'],"pid"=>$data['pid'],"vid" => $va['vid']))->save($va);    
                }
                
            }
            $this->success("更新成功!");
        }else{
            $id = I('request.id','','');
            $data = M('ProductProperty')->where(array("id" => $id))->find();
            $values = M('ProductPropertyValue')->where(array("pid" =>$data['pid'],"cid" => $data['cid']))->select();
            $this->assign("values",$values);
            $this->assign("vo",$data);
            $this->display();
        }
        
    }
    public function delete(){
        $id = I('request.id','','');
        $cid = I('request.cid','','');
        $pid = I('request.pid','','');
        if (!$id or !$cid or !$pid) {
            $this->error("参数错误！无法定位需要删除的项目！");
        }
        $re = M('ProductProperty')->find($id);
        if(!$re) $this->error("不存在待删除数据");
        if (false == M('ProductPropertyValue')->where(array("cid"=>$cid,"pid"=>$pid))->delete()){
             $this->error('删除属性值表失败！');
        }
        if (false == M('ProductProperty')->where(array("cid"=>$cid,"id"=>$id))->delete()){
             $this->error('删除属性表失败！');
        }
        $this->success('删除成功！');
    }
    public function deletevalue(){
         $data = I('get.','','');
        //if(IS_AJAX){
        if(false == M('ProductPropertyValue')->where(array("vid" => $data['vid'],"pid" =>$data['pid'],"cid" => $data['cid']))->delete()){
            $this->error('删除属性表失败！');
        }
        $this->success("删除成功");
        //}
    }
    //获取子类目属性
    public function show(){
        $pid = I('get.pid','','');
        $props = M('ProductProperty')->where(array('cid'=>$pid))->select();
        foreach($props as $key=>$p){
            $values = M('ProductPropertyValue')->where(array("pid" =>$p['pid'],"cid" => $p['cid']))->getField("name",true);
            $props[$key]["values"]=$values;
        }
        $this->assign("data",$props);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $data = I('request.','','');
            // var_dump($data);
            if($data['name'] =="品牌"){
                $data['pid'] = 20000;
            }else{
               $data['pid'] = M('ProductProperty')->max('pid') + 1;   
            }
            if(false == M('ProductProperty')->add($data)){
                $this->error("保存到数据库错误！");
            }
            $values = $data['value'];
            foreach( $values as $va){
                $va['vid'] = M('ProductPropertyValue')->max('vid') + 1;
                $va['pid'] = $data['pid'];
                $va['cid'] = $data['cid'];
                $va['prop_name'] = M('ProductProperty')->where(array("cid"=>$data['cid'],'pid' => $data['pid']))->getField('name');
                if(false == M('ProductPropertyValue')->add($va)){
                    $this->error("保存到数据库错误！");
                }
            }
            $this->success("更新成功！");
        }else{
            $products = M('ProductCategory')->where(array("parent_cid" => "0",'isdelete'=>'0'))->getField('cid,name',true);
            $this->assign("category",$products);
            $this->display();
        }
    }
    //添加品牌
    public function addBrand(){
        if(IS_POST){
            $data = I("post.");
            $data['cid'] = array_unique($data['cid']);
            foreach($data['cid'] as $key=>$va){
                $pval['vid'] = M('ProductPropertyValue')->max('vid') + 1 + $key;
                $pval['cid'] = $va; 
                $pval['pid'] = '20000';
                $pval['prop_name'] = M('ProductProperty')->where(array("cid"=>$pval['cid'],'pid'=>$pval['pid']))->getField('name');
                $pval['name'] = $data['name'];
                $pval['name_alias'] = $data['name'];
                $pval['status'] = $data['status'];
                if(!empty($pval['prop_name'])){//如果存在品牌，则添加
                    if(false == M('ProductPropertyValue')->add($pval)){
                        $this->error("保存到数据库错误！");
                    }
                }
            }
            $this->success('更新成功！',U('index'));
        }else{
            $products = M('ProductCategory')->where(array("parent_cid" => "0",'isdelete'=>'0'))->getField('cid,name',true);
            $this->assign("category",$products);
            $this->display();
        }
    }
      //批量添加属性
    public function addProValue(){
        if(IS_POST){
            $data = I("post.");
            $data['cid'] = array_unique($data['cid']);
            foreach($data['cid'] as $key=>$va){
                $pval['vid'] = M('ProductPropertyValue')->max('vid') + 1 + $key;
                $pval['cid'] = $va; 
                $pval['pid'] = $data['pid'];
                $pval['prop_name'] = M('ProductProperty')->where(array("cid"=>$pval['cid'],'pid'=>$pval['pid']))->getField('name');
                $pval['name'] = $data['name'];
                $pval['name_alias'] = $data['name'];
                $pval['status'] = $data['status'];
                if(!empty($pval['prop_name'])){//如果存在品牌，则添加
                    if(false == M('ProductPropertyValue')->add($pval)){
                        $this->error("保存到数据库错误！");
                    }
                }
            }
            $this->success('更新成功！',U('index'));
        }else{
            $products = M('ProductCategory')->where(array("parent_cid" => "0",'isdelete'=>'0'))->getField('cid,name',true);
            $this->assign("category",$products);
            $this->display();
        }
    }
}