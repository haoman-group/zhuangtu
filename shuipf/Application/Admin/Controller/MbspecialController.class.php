<?php

namespace Admin\Controller;
use Common\Controller\AdminBase;


class MbspecialController extends AdminBase {

    protected function _initialize(){
        parent::_initialize();
        $this->specialModel = D('Wap/MbSpecial');
        $this->specialItemModel = M('MbSpecialItem');
        $this->productModel = D('Product');
    }
    //列表页
    public function index(){
        $where = array();
        $count = $this->specialModel->where($where)->order('special_id desc')->count();
        $page = $this->page($count, 10);
        $data = $this->specialModel->where($where)->limit($page->firstRow . ',' . $page->listRows)->order('special_id desc')->select();
        $this->assign('data',$data);
        $this->display();
    }
    //添加页
    public function add(){
        if(IS_POST){
            $title = I('title');
            $description = I('description');
            $data = array(
                'title'=>$title,
                'description'=>$description,
            );
            $re = $this->specialModel->data($data)->add();
            if(!$re) $this->error('添加失败');
            $this->success('添加成功',U('index'));
        }else{
            $this->display();
        }
    }

    //修改页
    public function edit(){
        ($special_id = I('special_id',0)) || $this->error('记录不存在');
        $special = $this->specialModel->where(array('special_id'=>$special_id))->find();
        if(IS_POST){
            $title = I('title');
            $description = I('description');
            $data = array(
                'title'=>$title,
                'description'=>$description,
            );
            $re = $this->specialModel->where(array('special_id'=>$special_id))->data($data)->save();
            if(!$re) $this->error('修改失败');
            $this->success('修改成功',U('index'));
        }else{
            $this->assign('data',$special);
            $this->display();
        }
    }

    public function delete(){
        ($special_id = I('special_id',0)) || $this->error('记录不存在');
        $re = $this->specialModel->delMbSpecialByID($special_id);
        if($re){
            $this->success('删除成功',U('index'));
        }
        $this->error('删除失败');
    }

    public function special_edit(){


        $special_item_list = $this->specialModel->getMbSpecialItemListByID($_GET['special_id']);
        $this->assign('list', $special_item_list);
        $this->assign('page', '');
        $this->assign('module_list', $this->specialModel->getMbSpecialModuleList());
        $this->assign('special_id', $_GET['special_id']);

        $this->display();
    }
    public function special_item_add(){

        $param = array();
        $param['special_id'] = I('special_id');
        $param['item_type'] = I('item_type');

        $re = $this->specialItemModel->data($param)->add();
        if($re) {
            $item_info = $this->specialItemModel->find($re);
            echo json_encode($item_info);die;
        } else {
            echo json_encode(array('error' => '添加失败'));die;
        }
    }
    public function special_item_del(){
        $item_id = I('item_id');
        $special_id = I('special_id');
        $re = $this->specialItemModel->where(array('item_id'=>$item_id))->delete();
        if($re) {
            echo json_encode(array('message' => '删除成功'));die;
        } else {
            echo json_encode(array('error' => '删除失败'));die;
        }
    }
    public function special_item_edit(){

        $theitemid=$_GET['item_id'];
        $item_info = $this->specialModel->getMbSpecialItemInfoByID($theitemid);

        $this->assign('item_info',$itme_info);
        Tpl::showpage('mb_special_item.edit');
    }
    public function special_item_save(){

        $result = $this->specialModel->editMbSpecialItemByID(array('item_data' => $_POST['item_data']), $_POST['item_id'], $_POST['special_id']); 

        if($result) {
            $this->success('保存成功');
        } else {
            $this->error('保存失败');
        }
    }
    public function special_image_upload(){
        $data = array();
        if(!empty($_FILES['special_image']['name'])) {

            $Attachment = service("Attachment", array('module' => 'Shop', 'catid' => 1, 'isadmin' =>1, 'userid' => $this->adminid));
            //缩略图宽度
            // $thumb_width = 100;
            // $thumb_height = 100;
            //图片裁减相关设置，如果开启，将不保留原图
            if ($thumb_width && $thumb_height) {
                $Attachment->thumb = true;
                $Attachment->thumbRemoveOrigin = true;
                //设置缩略图最大宽度
                $Attachment->thumbMaxWidth = $thumb_width;
                //设置缩略图最大高度
                $Attachment->thumbMaxHeight = $thumb_height;
            }
            //开始上传
            $info = $Attachment->upload($Callback);
            if ($info) {
                if (in_array(strtolower($info[0]['extension']), array("jpg", "png", "jpeg", "gif"))) {
                    $picture = $info[0]['url'];
                    $data['image_url'] = $picture;
                    $data['image_name'] = '' ;
                } else {
                    $data['error'] = '头像上传失败';
                }
            } else {
                $data['error'] = $Attachment->getErrorMsg();
            }
        }
        echo json_encode($data);
    }
    public function goods_list(){
        $keyw=$_GET['keyword']; 
            
        $condition = array();
        
        $condition['title'] = array('like', '%' . $_GET['keyword'] . '%');
        $goods_list = $this->productModel->field('id,title,price,headpic')->where(array('status'=>10,'audit'=>10))->limit('10')->select();
        $this->assign('goods_list',$goods_list);
        $this->display();
        
    }
    public function update_item_sort(){
        $item_id_string = $_POST['item_id_string'];
        $special_id = $_POST['special_id'];
        if(!empty($item_id_string)) {
            $item_id_array = explode(',', $item_id_string);
            $index = 0;
            foreach ($item_id_array as $item_id) {
                $result = $this->specialModel->editMbSpecialItemByID(array('item_sort' => $index), $item_id, $special_id);
                $index++;
            }
        }
        $data = array();
        $data['message'] = '操作成功';
        echo json_encode($data);
    }
    public function update_item_usable(){
        $result = $this->specialModel->editMbSpecialItemUsableByID($_POST['usable'], $_POST['item_id'], $_POST['special_id']);
        $data = array();
        if($result) {
            $data['message'] = '操作成功';
        } else {
            $data['error'] = '操作失败';
        }
        echo json_encode($data);
    }







}