<?php

namespace Picture\Controller;

class ApiController extends PicturebaseController {
    protected $model = NULL;
    protected $Page_Size = 54;
    protected $categoryModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D("Picture/Picture");
        $this->categoryModel = D('PictureCategory');
    }
    public function pictureAdd() {
        $data = I("post.pics");
        $pid = I("get.pid");
        $num['success'] = 0;
        $num['fail'] = 0;
        foreach( $data as $key=>$pic){
            $result = $this->model->fileInfoAdd($pic, MODULE_NAME , $pid,0,0, $this->userid);
            if($result){
                $data[$key]['status'] = 1;
                $data[$key]['id'] = $result;
            }else{
                $data[$key]['status'] = 0;
            }
        }
        $this->success($data,"插入成功!");
    }
    public function pictureDelete(){
      ($id = I('id')) || $this->error('参数不完整');
      $shift = I('shift',0);//是否彻底删除
      ($shift == 0)?$isdelete = 0:$isdelete = 1;
      $data = $this->model->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>$isdelete))->find();
      if(!$data) $this->error('数据不存在');
      if($shift == 0){
        $re = $this->model->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>$isdelete))->setField('isdelete','1');
      }else{
        $re = $this->model->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>$isdelete))->delete();
      }
      if(!$re) $this->error('删除失败');
      $this->success(self::fileInfo(),'删除成功');
    }
    public function picturRestore(){
      ($id = I('id')) || $this->error('参数不完整');
      $data = $this->model->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>1))->find();
      if(!$data) $this->error('数据不存在');
      $re = $this->model->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>1))->setField('isdelete','0');
      if(!$re) $this->error('删除失败');
      $this->success("",'删除成功');
    }
    public function pictureShow(){
      $id = I('id');
      $data = $this->model->where(array('id'=>$id,'userid'=>$this->userid))->find();
      if(!$data) $this->error('数据不存在');
      $this->success($data);
    }
    public function pictureLists(){
      $catid = I('catid',0);
      $data = $this->model->where(array('catid'=>$catid,'userid'=>$this->userid))->order('id desc')->select();
      $this->success($data);
    }
    public function folderLists(){
        $pid = I('pid',0);
        $data = $this->categoryModel->where(array('pid'=>$pid,'userid'=>$this->userid))->order('listorder desc,id desc')->select();
        $this->success($data);
    }
    public function folderAdd(){
        ($name = I('name')) || $this->error('文件夹名称不能为空');
        $pid = I('pid',0);
        if($pid && !($this->categoryModel->where(array('userid'=>$this->userid,'id'=>$pid,"isdelete"=>"0"))->find())){
          $this->error('上级文件夹不存在');
        }
        if($this->categoryModel->where(array('userid'=>$this->userid,'pid'=>$pid,'name'=>$name,"isdelete"=>"0"))->find()){
          $this->error('文件夹名称重复');
        }
        $data = array('name'=>$name,'userid'=>$this->userid,'pid'=>$pid,'addtime'=>time());
        $re = $this->categoryModel->data($data)->add();
        if(!$re) $this->error('提交失败');
        $data = self::folderTree();
        $this->success($data,$re);
    }
    public function folderRename(){
      ($id = I('id')) || $this->error('ID参数不完整');
      ($name = I('name')) || $this->error('文件夹名称不能为空');
      $data = $this->categoryModel->where(array('id'=>$id,'userid'=>$this->userid))->find();
      if(!$data) $this->error('文件夹不存在');
      if($this->categoryModel->where(array('userid'=>$this->userid,'pid'=>$data['pid'],'name'=>$name))->find()){
        $this->error('文件夹名称重复');
      }
      $re = $this->categoryModel->where(array('id'=>$id))->data(array('name'=>$name))->save();
      if(!$re) $this->error('提交失败');
      $this->success(self::folderTree(),'提交成功');
    }
    public function folderDelete(){
      ($id = I('id')) || $this->error('参数不完整');
      $shift = I('shift',0);//是否彻底删除
      ($shift == 0)?$isdelete = 0:$isdelete = 1;
      $data = $this->categoryModel->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>$isdelete))->find();
      if(!$data) $this->error('文件夹不存在');
      if($this->categoryModel->where(array('pid'=>$id,'userid'=>$this->userid,"isdelete"=>$isdelete))->find()){
        $this->error('此文件夹下还存在子文件夹');
      }
      if($this->model->where(array('catid'=>$id,'userid'=>$this->userid,"isdelete"=>$isdelete))->find()){
        $this->error('此文件夹下还存在文件');
      }
      if($shift == 0){//彻底删除
        $re = $this->categoryModel->where(array('id'=>$id,"isdelete"=>$isdelete))->setField('isdelete','1');
      }else{//删除
        $re = $this->categoryModel->where(array('id'=>$id,"isdelete"=>$isdelete))->delete();
      }
      if(!$re){
        $this->error('提交失败');
      }
      $this->success(self::folderTree(),'提交成功');
    }
    public function folderRestore(){
      ($id = I('id')) || $this->error('参数不完整');
      $data = $this->categoryModel->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>1))->find();
      if(!$data) $this->error('数据不存在');
      $re = $this->categoryModel->where(array('id'=>$id,'userid'=>$this->userid,"isdelete"=>1))->setField('isdelete','0');
      if(!$re) $this->error('删除失败');
      $this->success("",'删除成功');
    }
    private function folderTree(){
        $tree = array();
        $tree = $this->categoryModel->field('id,pid,name')->where(array('userid'=>$this->userid,'isdelete'=>'0'))->order("id desc")->select();
        // if(!empty($tree)){
        foreach($tree as $k=>$v){
            $tree[$k]['parent'] = $v['pid']?$v['pid']:'0';
            $tree[$k]['text'] = $v['name'];
        }
        $root['id'] = "0";
        $root['text'] = "图片空间";
        $root['pid'] = "#";
        $root['parent']="#";
        // array_push($tree,$root);
        $tree[] = $root;
   
        return $tree;
    }
    private function fileInfo(){
        $data['fileNum'] = count($tree);$this->model->where(array('catid'=>$catid,'userid'=>$this->userid,'isdelete'=>'0'))->count();
        return $data;
    }
    //获取图片空间内容
    public function getContent(){
        //页码
        $pagenum = I("page",1);
        $pid = I('get.pid',0);
        $catid = I('catid',0);
        $isdelete = I('isdelete',0);//回收站内容--文件内容
        $where = array();
        //是否回收站请求
        if($isdelete == 1){
            $where['isdelete'] = "1";
        }else{
            $where['isdelete'] = "0";
        }
        $where['pid'] = $pid;
        $where['catid'] = $pid;
        //设置用户
        $where['userid'] = $this->userid;
        //记录总数，分页用
        $count_file = $this->categoryModel->where($where)->count();//目录总数
        $count_pic  = $this->model->where($where)->count();        //图片总数
        $count = $count_pic + $count_file;
        //分页数据
        $page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $data["page"] = array("count"=>ceil($count/$this->Page_Size),"current"=>$pagenum);
        //目录分页数据
        $folder = $this->categoryModel->where($where)->page($pagenum.','.$this->Page_Size)->order('listorder desc,id desc')->select();
        foreach($folder as $k=>$v){
            $folder[$k]['parent'] = $v['pid']?$v['pid']:'#';
            $folder[$k]['text'] = $v['name'];
        }
        $data['folder'] = $folder;
        $data['folderNum'] = count($folder)?count($folder):0;
        //获取图片分页数据
        $data['picture'] = $this->_getPicPage($count_pic,$count_file,$pagenum,$where);
        $data['picNum'] = count($data['picture']);
        $data['tree'] = self::folderTree();
        $this->success($data,'提交成功');
    }
    // public function getContent(){
    //     $pid = I('get.pid',0);
    //     $catid = I('catid',0);
    //     $isdelete = I('isdelete',0);//回收站
        
    //     $where = array();
    //     if($isdelete == 1){//回收站请求
    //         $where['isdelete'] = "1";
    //     }else{
    //         $where['pid'] = $pid;
    //         $where['isdelete'] = "0";
    //     }
    //     $where['userid'] = $this->userid;
    //     $folder = $this->categoryModel->where($where)->order('listorder desc,id desc')->select();
    //     foreach($folder as $k=>$v){
    //         $folder[$k]['parent'] = $v['pid']?$v['pid']:'#';
    //         $folder[$k]['text'] = $v['name'];
    //     }
    //     //  echo $this->categoryModel->getLastSql();
    //     unset($where['pid']);
    //     if(!($isdelete == 1)){//回收站请求
    //         $where['catid'] = $pid;
    //     }
    //     $pic = $this->model->where($where)->order('id desc')->select();
    //     $data['folder'] = $folder;
    //     $data['folderNum'] = count($folder);
    //     $data['picture'] = $pic;
    //     $data['picNum'] = count($pic);
    //     $data['tree'] = self::folderTree();
    //     $this->success($data,'提交成功');
    // }
    private function _search(){
        $where = array();
        $where['catid'] = I('catid',0);
        $where['pid'] = I('pid',0);
        $where['page'] = I('page',1);
        $where['order_by'] = I('order_by',0);
        $where['status'] = I('status',0);
    }
    protected function ajaxReturn($data,$type='',$json_option=0) {
        if(empty($type)) $type  =   C('DEFAULT_AJAX_RETURN');
        switch (strtoupper($type)){
            case 'JSON' :
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                exit(json_encode($data,$json_option));
            case 'XML'  :
                // 返回xml格式数据
                header('Content-Type:text/xml; charset=utf-8');
                exit(xml_encode($data));
            case 'JSONP':
                // 返回JSON数据格式到客户端 包含状态信息
                header('Content-Type:application/json; charset=utf-8');
                $handler  =   isset($_GET[C('VAR_JSONP_HANDLER')]) ? $_GET[C('VAR_JSONP_HANDLER')] : C('DEFAULT_JSONP_HANDLER');
                exit($handler.'('.json_encode($data,$json_option).');');  
            case 'EVAL' :
                // 返回可执行的js脚本
                header('Content-Type:text/html; charset=utf-8');
                exit($data);            
            default     :
                // 用于扩展其他返回格式数据
                Hook::listen('ajax_return',$data);
        }
    }
    public function success($data='',$msg=''){
        $this->ajaxReturn(array('status'=>1,'data'=>$data,'msg'=>$msg));
    }
    public function error($msg){
        $this->ajaxReturn(array('status'=>0,'msg'=>$msg));
    }
    //获取图片显示列表
    private function _getPicPage($pics,$files,$page,$where){
        //目录页码总数
        $filepage = ceil($files/$this->Page_Size);
        //目录页最后一页的目录个数
        $filelast = $files%$this->Page_Size;
        //剩余图片数
        $limit = $this->Page_Size - $filelast;
        //当前页面全部为图片
        if($page < $filepage){//图片不需要显示
            return false;
        }else if($page == $filepage){//当前页包含图片和文件
            if($filelast > 0 ){
                $pic = $this->model->where($where)->order('id desc')->limit($limit)->select();
            }
        }else if($page > $filepage){
            if($page == "1"){
                $pic = $this->model->where($where)->order('id desc')->limit($limit)->select();
            }else if($filelast == "0"){
                if($filepage == "0"){
                    $limit = ($page - 1)*$this->Page_Size;
                }else{
                    $limit = ($page - $filepage)*$this->Page_Size;   
                }
                $pic = $this->model->where($where)->order('id desc')->limit($limit)->getField('id',true); 
                $where['id'] = array("LT",end($pic));
                $pic =  $this->model->where($where)->order('id desc')->limit($this->Page_Size)->select();
            }else{
                $limit = $limit + ($page - $filepage - 1)*$this->Page_Size;
                $pic = $this->model->where($where)->order('id desc')->limit($limit)->getField('id',true); 
                $where['id'] = array("LT",end($pic));
                $pic =  $this->model->where($where)->order('id desc')->limit($this->Page_Size)->select();
            }
        }
        return $pic;
    }

}
