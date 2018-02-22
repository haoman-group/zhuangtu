<?php
// +----------------------------------------------------------------------
// | 宝贝管理--建材类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Controller;

class MaterialController extends SellerbaseController {

    protected $model =　NULL;
    protected $proCate = NULL;
    protected $property = NULL;
    protected function _initialize(){
        parent::_initialize();
        $this->model = D('Product');
        //产品分类表
        $this->proCate = D('Admin/ProductCategory');
        $this->property = D('ProductProperty');
    }
    
    public function add(){
      if(IS_POST){
        // if(!session('form_member_product_add')){
        //   $this->error('请勿重复提交！');
        //   redirect('Product/addMaterial');
        // }
        $maxpro = $this->model->where(array('uid'=>$this->userid))->order('id desc')->find();
        if($maxpro['addtime']>(time()-3)){
            $this->error('请勿重复提交');
        }
        $data = $this->_procData();
        if(!$this->model->create($data)){
            $this->error('提交失败:'.$this->model->getError());
        }
        $proid = $this->model->add();
        // var_dump($this->model->where(array('id'=>$proid))->find());
        if(!$proid) $this->error('提交失败');
        session('form_member_product_add',NULL);
        $this->success('提交成功',U('Product/lists'));
      }else{
        //获取类目CID
        $cid = I('get.inpcid');
        //获取类目名称
        $this->assign('categoryName',$this->proCate->getFieldByCid($cid,'name'));
        //获取属性
        $this->assign('property',$this->property->getProperty($cid));
        // var_dump($this->property->getProperty($cid));
        session('form_member_product_add',md5('form_member_product_add'.time()));
        $this->display('Product/addMaterial');
      }
    }
    public function edit(){
      $id = I('get.id');
      if(IS_POST){
        if(!$this->model->where(array('id' => $id))->count()){
          $this->error('数据不存在！');
        }
        else{
          $data = $this->_procData();
          $data['id'] = $id;
          $data['auditstatus'] = 2;  //任何修改操作 都将审核状态置为“2-待处理”
          if(!$this->model->create($data)){
            $this->error('提交失败:'.$this->model->getError());
          }
          $result = $this->model->where(array('id' => $id))->save();
          $this->success('提交成功',U('Product/lists'));
          return;
        }
      }
        $data = $this->model->where(array('id'=>$id))->find();
        //反序列化宝贝属性值
        $data['key_prop'] = unserialize($data['key_prop']);
        $data['sale_prop'] = unserialize($data['sale_prop']);
        $data['nokey_prop'] = unserialize($data['nokey_prop']);
        $data['custom_prop'] = unserialize($data['custom_prop']);
        $this->assign('data',$data);
        //图像处理
        $this->assign('picture_urls',explode(",",$data['picture']));
        //获取类目名称
        $this->assign('categoryName',$this->proCate->getFieldByCid($data['cid'],'name'));
        //获取属性分类和属性值
        $this->assign('property',$this->property->getProperty($data['cid']));
        // $this->assign('category',$this->_getCateType());
        $this->display('Product/addMaterial');
    }
     //处理提交数据
    private function _procData(){
        //post数据
        $data = I('post.');
        // var_dump($data);
        //宝贝图片
        $data['headpic'] = $data['product_picture_url'][0];
        $data['picture'] = implode(',',$data['product_picture_url']);
        //状态
        $data['status'] = ($data['starttime_type']==1)?Status::STATUS_SELLING:Status::STATUS_NEVER;
        //当前用户
        $data['uid'] = $this->userid;
        return $data;
    }
    protected function _special($data){
        foreach($data as $key => $da){
            $data[$key]['ill_reason'] = unserialize($data[$key]['ill_reason']);
            $data[$key]['num'] = 1;
        }
        return $data;
    }
        
}