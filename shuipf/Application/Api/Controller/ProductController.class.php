<?php

namespace Api\Controller;

use Common\Controller\Base;

class ProductController extends Base {

    protected $model = NULL;
    protected $cateModel = NULL;
    protected $propertyModel = NULL;
    protected $propertyValueModel = NULL;
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Product');
        $this->cateModel = D('ProductCategory');
        $this->propertyModel = D('ProductProperty');
        $this->propertyValueModel = D('ProductPropertyValue');
    }
    /**
    * @name 根据cid返回产品分类信息
    **/
    public function getcat() {
        $cid = I('cid');
        $vid = I('vid');
        $hasbrand = I('hasbrand');
        if($cid && !$vid && !$hasbrand){
            $type = 'cate';
            $cate = $this->cateModel->field("cid,name,is_parent")->where(array('parent_cid'=>$cid,'isdelete'=>'0'))->select();
            $category = array();

            foreach($cate as $k=>$v){
                $category[$k]['cid'] = $v['cid'];
                $category[$k]['name'] = $v['name'];
                $category[$k]['spell'] = '';
                $category[$k]['vid'] = 0;
                if($v['is_parent']){
                    $category[$k]['hascate'] = 1;
                    $category[$k]['hasbrand'] = 0;
                }else{
                    $category[$k]['hascate'] = 0;
                    $brand = $this->propertyValueModel->where(array('cid'=>$v['cid'],'pid'=>20000))->select();
                    $category[$k]['hasbrand'] = $brand?1:0;
                }
            }
        }elseif($cid && !$vid && $hasbrand){
            $type = 'prop';
            $brand = $this->propertyValueModel->where(array('cid'=>$cid,'pid'=>20000))->select();
            $category = array();
            foreach($brand as $k=>$v){
                $category[$k]['cid'] = $v['cid'];
                $category[$k]['vid'] = $v['vid'] ;
                $category[$k]['name'] = $v['name'];
                $category[$k]['spell'] = '';
                $category[$k]['hascate'] = 0;
                $son = $this->propertyModel->where(array('parent_vid'=>$v['vid'],'cid'=>$cid))->find();
                $category[$k]['hasbrand'] = $son?1:0;
            }
        }elseif($cid && $vid && $hasbrand){
            $type = 'prop';
            $son = $this->propertyModel->where(array('parent_vid'=>$vid,'cid'=>$cid))->find();
            $brand = $this->propertyValueModel->where(array('cid'=>$cid,'pid'=>$son['pid']))->select();
            $category = array();
            foreach($brand as $k=>$v){
                $category[$k]['cid'] = $v['cid'];
                $category[$k]['vid'] = $v['vid'];
                $category[$k]['name'] = $v['name'];
                $category[$k]['spell'] = '';
                $category[$k]['hascate'] = 0;
                $category[$k]['hasbrand'] = 0;
            }
        }

        $data = array(
            'type'=>$type,
            'content'=>$category,
        );
        echo json_encode($data);
        exit;
    }

    //修改搜索排名
    public function changeRank() {
        $prod_id = I('prodid');
        $prod_new_rank = I('new_rank');
        if(empty($prod_id)){
            return    $this->ajaxReturn(array('status'=>-1,'msg'=>'未指定产品ID！'));
        }
        $this->model->where(array('id' => $prod_id))->setField('rank', $prod_new_rank);
        return 	$this->ajaxReturn(array('status'=>1,'msg'=>'修改成功'.$prod_id));
    }
    //获取同类商品
    public function getSameProducts(){
        //产品id
        $prodis = I('id','','int');
        //获取个数
        $count = I('count',10,'int');
        if(empty($prodis) || empty($count)){
            return  $this->ajaxReturn(array('status'=>-1,'msg'=>'参数错误:参数确实id=['.$prodis.'],count=['.$count.']'));
        }
        //分类id
        $cid = $this->model->where(array('id'=>$prodis))->getField('cid');
        if(empty($cid)){
            return  $this->ajaxReturn(array('status'=>-2,'msg'=>'未找到相关产品'.$prodis));
        }
        $result = $this->model->where(array('cid'=>$cid,'isdelete'=>'0','status'=>'10'))->order('count_sold desc, updatetime desc')->limit($count)->getField("id,headpic,title,min_price",true);
        foreach ($result as $key => $value) {
            $result[$key]['url']=U('Shop/Product/show',array('id'=>$key));
        }
          return    $this->ajaxReturn(array('status'=>1,'msg'=>'成功','data'=>$result));
    }
}
