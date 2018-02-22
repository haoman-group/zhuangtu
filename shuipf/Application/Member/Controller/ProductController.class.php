<?php

namespace Member\Controller;

class ProductController extends MemberbaseController {

    protected $model = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Member/Product');
    }

    /**
    * @name 宝贝列表
    **/
    public function index() {
        $this->display();
    }
    /**
    * @name 上传宝贝
    **/
    public function add(){
      dump(cache('Module'));
      if(IS_POST){
        if(!session('form_member_product_add')){
          redirect('add');
        }
        $title = I('title');
        $idea = I('idea');
        $attr_style = I('attr_style');
        $attr_area = I('attr_area');
        $attr_huxing = I('attr_huxing');
        $attr_jubu = I('attr_jubu');
        $attr_kongjian = I('attr_kongjian');
        $attr_code = I('attr_code');
        $charge_unit = I('charge_unit');
        $pay_mode = I('pay_mode');
        $designer_qualification = I('designer_qualification');
        $is_personal = I('is_personal');
        $designer_name = I('designer_name');
        $type = I('type');
        $picture = I('picture');
        $headpic = I('headpic');
        $video = I('video');
        $service_added = I('service_added');
        $service_assurance = I('service_assurance');
        $pictype_effect = I('pictype_effect');
        $pictype_cad  = I('pictype_cad');

        $data = array(
          'uid'=>$this->userid,
          'username'=>$this->username,
          'shopid'=>$this->shopid,
          'addtime'=>time(),
          'updatetime'=>time(),
          'status'=>1,
          'title'=>$title,
          'idea'=>$idea,
          'attr_style'=>$attr_style,
          'attr_area'=>$attr_area,
          'attr_huxing'=>$attr_huxing,
          'attr_jubu'=>$attr_jubu,
          'attr_kongjian'=>$attr_kongjian,
          'attr_code'=>$attr_code,
          'charge_unit'=>$charge_unit,
          'pay_mode'=>$pay_mode,
          'designer_qualification'=>$designer_qualification,
          'is_personal'=>$is_personal,
          'designer_name'=>$designer_name,
          'type'=>$type,
          'picture'=>$picture,
          'headpic'=>$headpic,
          'video'=>$video,
          'service_added'=>$service_added,
          'service_assurance'=>$service_assurance,
          'pictype_effect'=>$pictype_effect,
          'pictype_cad'=>$pictype_cad,
        );
        $re = $this->model->data($data)->add();
        if(!$re) $this->error('提交失败');
        $this->success('提交成功',U('index'));
      }else{
        session('form_member_product_add',md5('form_member_product_add'.time()));
        $this->display();
      }
    }
    /**
    * @name 商品上架
    **/
    public function shelve(){

    }
    /**
    * @name 商品上架
    **/
    public function unshelve(){
      
    }
    /**
    * @name 删除商品
    * @param int id 商品id 
    **/
    public function delete(){
      $id = I('id',0);
      $re = $this->model->del($id);
      if($re) $this->error('删除失败');
      $this->success('删除成功');
    }





}