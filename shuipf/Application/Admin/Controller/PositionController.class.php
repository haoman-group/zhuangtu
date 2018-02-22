<?php

namespace Admin\Controller;

use Common\Controller\AdminBase;

class PositionController extends AdminBase {

    protected $model = NULL;
    protected $dataModel = NULL;
    protected $pageModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = M('Position');
        $this->dataModel = D('Admin/PositionData');
        $this->pageModel = M('PositionPage');
        // echo $_SERVER['REQUEST_URI'];
    }
    public function page(){
        $data = $this->pageModel->select();
        $this->assign('data',$data);
        $this->display();
    }
    public function lists(){

        $where = array();
        $pageid = I('pageid');
        if($pageid) $where['pageid'] = $pageid;
        $data = M('Position')->where($where)->order(array('listorder' => 'ASC', 'posid' => 'DESC'))->select();
        $this->assign('data', $data)->display();
    }
    public function add() {

         $num =M('PositionPage')->select();
        $this->assign('num',$num);
        if(IS_POST){
            $data = I('post.');

            $re = $this->model->data($data)->add();
            if(!$re) $this->error('提交失败');
            $this->success('提交成功');
        }else{
            $this->display();
        }
    }
    public function edit(){
          $posid = I('posid');

          $num =M('PositionPage')->select();
          $this->assign('num',$num);
        $data = $this->model->where(array('posid'=>$posid))->find();

        if(!$data) $this->error('数据不存在');
        if(IS_POST){
            $data = I('post.');
            $re = $this->model->data($data)->save();
            if(!$re) $this->error('提交失败');
            $this->error('提交成功');
        }else{
            $this->assign('data',$data);
            $this->display();
        }
    }
    public function item(){
        $posid = I('posid');
        $place = I('place');
        $position = $this->model->where(array('posid'=>$posid))->find();
        $data = $this->dataModel->where(array('posid'=>$posid,'place'=>$place))->order(array('listorder'=>'desc','id'=>'desc','starttime'=>"desc"))->select();
        foreach($data as $k=>$v){
            if($v['starttime']>date("Y-m-d H:i:s")) $data[$k]['window_status'] = '即将开始';
            elseif($v['endtime']<date("Y-m-d H:i:s")) $data[$k]['window_status'] = '已结束';
            elseif(($v['starttime']<=date("Y-m-d H:i:s"))&&($v['endtime']>=date("Y-m-d H:i:s"))) $data[$k]['window_status'] = '<span style="color:red">进行中</span>';
            else $data[$k]['window_status'] = '------';
        }
        $this->assign('data',$data);        
        $this->assign('position',$position);
        $this->assign('place',$place);
        $this->display();
    }
    public function item_add(){
        ($posid = I('posid',0)) || $this->error('推荐位不能为空');
        $place = I('place',0);
        $status=I('status',0);
        
        $position = $this->model->where(array('posid'=>$posid))->find();
        if(!$position) $this->error('推荐位不存在');
        if(IS_POST){

            $picture = implode(',',I('picture_url'));
            $wap_picture= implode(',',I('picture1_url'));
            $void=htmlspecialchars_decode(I('void'));
            $post = array(
                'pageid'=>I('pageid'),
                'posid'=>$posid,
                'starttime'=>I('starttime'),
                'endtime'=>I('endtime'),
                'listorder'=>I('listorder',0),
                'title'=>I('title'),
                'description'=>I('description'),
                'picture'=>$picture,
                'wap_picture'=>$wap_picture,
                'place'=>$place,
                'dataid'=>I('dataid',0),
                'status'=>$status,
                'url'=>I('url'),
                'void'=>$void
            );

            if($position['model']){
                $dataid = I('dataid'); 

                if(!empty($dataid)){
                    $data = D($position['model'])->field($position['field'])->find($dataid);
                    if(!$data) $this->error('数据不存在',U("Admin/Position/item",array('posid'=>$posid,'place'=>$place)));
                    if(!$this->dataModel->checkProduct($dataid)){
                        $this->error('错误！当前推荐的宝贝已删除或者下架!',U("Admin/Position/item",array('posid'=>$posid,'place'=>$place)));
                    }
                    $post['data'] = serialize($data);
                }
            }
            $re = $this->dataModel->create($post);
            if(!$re) $this->error('提交失败');
            $this->dataModel->add();
            $this->success('提交成功',U("Admin/Position/place",array('posid'=>$posid)));
        }else{
            $this->assign('place',$place);
            $this->assign('position',$position);
            $this->display();
        }
    }
    public function item_edit(){
         $status=I('status',0);
        $place = I('place',0);
        ($id = I('id',0)) || $this->error('信息不能为空');
        $data = $this->dataModel->where(array('id'=>$id))->find();
        //var_dump($data);exit;
        $posid = $data['posid'];
         $position = $this->model->where(array('posid'=>$data['posid']))->find();
        if(!$data) $this->error('信息不存在');
        if(IS_POST){
            // $position = $this->model->where(array('posid'=>$data['posid']))->find();
            $picture = implode(',',I('picture_url'));
            $void=htmlspecialchars_decode(I("void"));
            if(!empty(I('picture1_url'))){
                 $wap_picture=implode(',',I('picture1_url')); 
            }else{
            $wap_picture='';
            }
            $post = array(
                'pageid'=>I('pageid'),
                'posid'=>$posid,
                'starttime'=>I('starttime'),
                'endtime'=>I('endtime'),
                'listorder'=>I('listorder',0),
                'title'=>I('title'),
                'description'=>I('description'),
                'picture'=>$picture,
                'wap_picture'=>$wap_picture,
                //'url'=>$url,
                'place'=>$place,
                'dataid'=>I('dataid'),
                'status'=>$status,
                'url'=>I('url'),
                'void'=>$void
            );
            if($position['model']){
                $dataid = I('dataid');
                if(!empty($dataid)){
                    $data = D($position['model'])->field($position['field'])->find($dataid);
                    if(!$data) $this->error('数据不存在');
                    if(!$this->dataModel->checkProduct($dataid)){
                        $this->error('错误！当前推荐的宝贝已删除或者下架!',U("Admin/Position/item",array('posid'=>$posid,'place'=>$place)));
                    }
                    $post['data'] = serialize($data);
                }
                // $data = D($position['model'])->field($position['field'])->find();
                // if(!$data) $this->error('数据不存在');
                // $post['data'] = serialize($data);
            }
            $re = $this->dataModel->create($post);
            if(!$re) $this->error('提交失败');
            $this->dataModel->where(array('id'=>$id))->save();
            $this->success('提交成功',U("Admin/Position/place",array('posid'=>$posid)));
        }else{
            $data['picture'] = explode(',',$data['picture']);
            $data['wap_picture'] = explode(',',$data['wap_picture']);
            $this->assign('data',$data);
             $this->assign('place',$place);
            $this->assign('position',$position);
            $this->display();
        }
    }
    public function item_delete() {
        $id = I("get.id", 0, "intval");
       //$posid = I('get.posid',0,'intval');
        if (!$id) {
            $this->error("请指定需要删除的项目！");
        }
        $where  = array('id'=>$id);
        $re = $this->dataModel->where($where)->find();
        if(!$re) $this->error("不存在");
        if (false == $this->dataModel->where($where)->delete()) {
            $this->error("删除失败");
        }
        $this->success("删除成功！");
    }
    public function item_status(){
        $id = I('get.id');
        $data = $this->dataModel->where(array('id'=>$id))->find();
        if(!$data) $this->error('信息不存在');
        if(  $data['status']==1){
            $this->dataModel->where(array('id'=>$id))->setField('status',0);
        }else{
            if(!$this->dataModel->checkProduct($data['dataid'])){
                $this->error('错误！当前推荐的宝贝已删除或者下架!');
            }
            $this->dataModel->where(array('id'=>$id))->setField('status',1);
        }
        $this->success('提交成功');

          }
    public function place(){
       
        
        $posid = I('posid',0);
       
        $position = $this->model->where(array('posid'=>$posid))->find();
       
        if(!$position) $this->error('指定项目不存在');
        $page = $this->pageModel->where(array('id'=>$position['pageid']))->find();
        $this->assign('position',$position);
        $this->assign('posid',$posid);
        $this->assign('page',$page);
        $this->display();
    }
    public function pageadd(){
        if(IS_POST){
            $data['name'] = $_POST['pageadd']?$_POST['pageadd']:$this->error('信息不能为空');
            $re =$this->pageModel->add($data);
          
            if(!$re) $this->error('提交失败');
            $this->success('提交成功');
        }else{
            $this->display();
        }

      
    }
    public function check(){
       $posid=I('posid'); 
       $check=$_POST['checkAll'];
       if(empty($check)) $this->error("请选择");
       //获取推荐位模型数据
        $position = $this->model->where(array('posid'=>$posid))->find();
        //获取推荐位产品数据
        $infor =array();
        $data=$this->dataModel->where(array('posid'=>$posid,'place'=>array(in,$check),status=>'1'))->select();
         foreach($data as $key=>$value){
           $dataArr =D($position['model'])->field($position['field'])->find($value['dataid']);
           $dataArr=serialize($dataArr); 
            $infor[]=$this->dataModel->where(array('posid'=>$posid,'place'=>$value['place'],'dataid'=>$value['dataid']))->setField('data',$dataArr);
        }
         $num=array_sum($infor);
         if($num ==0){
           $this->error("无更新");
         }else{
           $this->error("更新成功");
         }
         

        

         }

         public function search(){
            $key=I('keyword');
            $search_items = preg_split("/\s+/", trim($key));
            // $where['title'] = array('like', '%' . implode('%', $search_items) . '%');
            $where['_string'] ="title like '%".trim($key)."%' or dataid =".trim($key);
            $result=M('PositionData')->where($where)->select();
            foreach ($result as $key => $value) {
                 $posid['name']=M('Position')->where(array('posid'=>$value['posid']))->getField('name');
                 $posid['pageid']=M('Position')->where(array('posid'=>$value['posid']))->getField('pageid');
                 $result[$key]['pageid']=$posid['pageid'];
                 $result[$key]['name']=$posid['name'];
                 

              }  
              foreach ($result as $k1 => $v1) {
                //var_dump($v1['pageid']);
                  $pos['pagename']=M('PositionPage')->where(array('id'=>$v1['pageid']))->getField('name');
                 
                  $result[$k1]['pagename']=$pos['pagename'];
              }
           
            $this->assign('search',$result);
            $this->display();
         }
            
      
}
