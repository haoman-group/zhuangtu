<?php
namespace App\Controller;
//手机端的产品详情信息

class ProductController extends ApibaseController{
    protected function _initialize() {
        $this->propmodel = D('Admin/ProductProperty');
        $this->valueModel=D('Admin/ProductPropertyValue');
        parent::_initialize();

    }
    //根据产品id来获取产品的详细信息
    public function productinfo($id){
        $cid=M('Product')->where(array('id'=>$id))->getField('cid');
        if(empty($cid)){
           $this->ajaxReturn(array('status'=>0,'msg'=>"获取数据失败"));
        }else{
        $crafttypename=M('ProductCategory')->where(array('cid'=>$cid))->getField("name");
        $catid=$this->getProductCategory($id);
        $productmsg=M('Product')->where(array('id'=>$id))->find();
        if($productmsg['showway'] == 2){
            $productmsg['show']=htmlspecialchars_decode($productmsg['showecplay']);
        }else{
            $productmsg['show']=htmlspecialchars_decode($productmsg['show']);
        }
        $shopinfo=M('Shop')->where(array('id'=>$productmsg['shopid']))->find();
        $comment=M('CommentProduct')->where(array('product_id'=>$id,'scores'=>0))->count();
        $comments=M('CommentProduct')->where(array('product_id'=>$id))->count();
        if($catid >=12 && $catid <=20){
            $productmsg['key_prop']=$this->getProperty($productmsg);
            $productmsg['nokey_prop']=$this->getnokey($productmsg);
            $productmsg['service_promise']=unserialize($productmsg['service_promise']);
            $productmsg['shopname']=$shopinfo['name'];
            $productmsg['shopaddr']=$shopinfo['addr'];
            $productmsg['shoplog']=$shopinfo['log'];
            $productmsg['shopphone']=$shopinfo['phone'];
            $productmsg['years']=$shopinfo['years'];
            $productmsg['shoplog']=$shopinfo['log'];
            $productmsg['commentnum']=$comment;
            $productmsg['comments']=$comments;
            $productmsg['shopcertification']=$shopinfo['certification'];
            $productmsg['shopdomain']=$shopinfo['domain'];
            $productmsg['classification']=1;//次为商品类
        } elseif($catid>=9 && $catid<11){
            // $productmsg=M('Product')->where(array('id'=>$id))->find();
            // $shopinfo=M('Shop')->where(array('id'=>$productmsg['shopid']))->find();
            //$comment=M('CommentProduct')->where(array('product_id'=>$id,'scores'=>0))->count();
            $productmsg['key_prop']=$this->getProperty($productmsg);
            $case=unserialize($productmsg['case']);
            $case=implode("/",$case);
            $productmsg['nokey_prop']='{"'.工种.'":"'.$crafttypename.'","'.姓名.'":"'.$productmsg['workername'].'","'.联系电话.'":"'.$productmsg['phone'].'","'.年龄.'":"'.$productmsg['age'].'","'.从业年限.'":"'.$productmsg['workyears'].'","'.籍贯.'":"'.$productmsg['hometown'].'","'.成功案例.'":"'.$case.'"}';

            $productmsg['service_promise']=unserialize($productmsg['service_promise']);
            $productmsg['shopname']=$shopinfo['name'];
            $productmsg['shopaddr']=$shopinfo['addr'];
            $productmsg['shopphone']=$shopinfo['phone'];
            $productmsg['years']=$shopinfo['years'];
            $productmsg['shoplog']=$shopinfo['log'];
            $productmsg['commentnum']=$comment;
            $productmsg['comments']=$comments;
            $productmsg['shopcertification']=$shopinfo['certification'];
            $productmsg['classification']=2;//此为工人类
            $productmsg['shopdomain']=$shopinfo['domain'];
            if($productmsg['certification'] == 1){

                $productmsg['nokey_prop']=substr($productmsg['nokey_prop'],0,-2).'","'.实名认证.'":"'.公安系统查询认证.'"}';
            }

        }elseif($catid==11){
            //$productmsg=M('Product')->where(array('id'=>$id))->find();
            //$shopinfo=M('Shop')->where(array('id'=>$productmsg['shopid']))->find();
            //$comment=M('CommentProduct')->where(array('product_id'=>$id,'scores'=>0))->count();
            $productmsg['key_prop']=$this->getProperty($productmsg);
            $productmsg['service_promise']=unserialize($productmsg['service_promise']);
            $case=unserialize($productmsg['case']);
            $case=implode("/",$case);
            $productmsg['nokey_prop']='{"'.工种.'":"'.$crafttypename.'","'.姓名.'":"'.$productmsg['workername'].'","'.联系电话.'":"'.$productmsg['phone'].'","'.年龄.'":"'.$productmsg['age'].'","'.从业年限.'":"'.$productmsg['workyears'].'","'.籍贯.'":"'.$productmsg['hometown'].'","'.成功案例.'":"'.$case.'"}';
            $productmsg['shopname']=$shopinfo['name'];
            $productmsg['shopaddr']=$shopinfo['addr'];
            $productmsg['shopphone']=$shopinfo['phone'];
            $productmsg['years']=$shopinfo['years'];
            $productmsg['shoplog']=$shopinfo['log'];
            $productmsg['commentnum']=$comment;
            $productmsg['comments']=$comments;
            $productmsg['shopdomain']=$shopinfo['domain'];
            $productmsg['shopcertification']=$shopinfo['certification'];
            $productmsg['classification']=3;//此为工长类
            if($productmsg['certification'] == 1){
                $productmsg['nokey_prop']=substr($productmsg['nokey_prop'],0,-2).'","'.实名认证.'":"'.公安系统查询认证.'"}';
            }
        }else{
            //$productmsg=M('Product')->where(array('id'=>$id))->find();
            $designerinfo=M('designer')->where(array('uid'=>$productmsg['uid']))->find();
            //$shopinfo=M('Shop')->where(array('id'=>$productmsg['shopid']))->find();
            //$comment=M('CommentProduct')->where(array('product_id'=>$id,'scores'=>0))->count();
            $productmsg['key_prop']=$this->getProperty($productmsg);
            $productmsg['nokey_prop']='{"'.案例设计师.'":"'.$designerinfo['name'].'","'.级别.'":"'.$designerinfo['qualification'].'","'. 从业年限.'":"'.$designerinfo['work_time'].'","'.毕业院校.'":"'.$designerinfo['school'].'","'.擅长风格.'":"'.$designerinfo['style'].'","'.所获奖项.'":"'.$designerinfo['credential'].'","'.个人简介.'":"'.$designerinfo['style'].'"}';
            //$productmsg['nokey_prop']=$this->getnokey($productmsg);
            $productmsg['service_promise']=unserialize($productmsg['service_promise']);
            $productmsg['shopname']=$shopinfo['name'];
            $productmsg['shopaddr']=$shopinfo['addr'];
            $productmsg['shopphone']=$shopinfo['phone'];
            $productmsg['years']=$shopinfo['years'];
            $productmsg['shoplog']=$shopinfo['log'];
            $productmsg['commentnum']=$comment;
            $productmsg['comments']=$comments;
            $productmsg['shopdomain']=$shopinfo['domain'];
            $productmsg['shopcertification']=$shopinfo['certification'];
            $productmsg['classification']=4;//此为设计类
        }

        
        $this->ajaxReturn(array('status'=>1,'msg'=>"获取数据成功",'data'=>$productmsg));
    }
}
    private function getProperty($data){
        $key_Array = unserialize($data['key_prop']);
        $property = null;
        if(empty($key_Array)){
            return "";
        }
        foreach ($key_Array as $key => $value) {
            $key_data = $this->propmodel->where(array('cid'=>$data['cid'],'pid'=>$key))->getField('name');
            $key_prop=$this->valueModel->where(array('cid'=>$data['cid'],'vid'=>$value))->getField('name');
            $property[$key_data]=$key_prop;
        }
        return  $property;
    }
    private function getnokey($data){
        $nokey_Array = unserialize($data['nokey_prop']);
        $nokey=array();
        foreach ($nokey_Array as $key => $value) {
            $nokey_data=$this->propmodel->where(array('cid'=>$data['cid'],'pid'=>$key))->find();
            if($nokey_data['is_enum_prop'] == '1'){
                if($nokey_data['multi'] =='1'){
                    $nokey_prop=$this->valueModel->where(array('cid'=>$data['cid'],'pid'=>$key,'vid'=>array('in',$value)))->getField('name',true);
                    if(!empty($nokey_prop)){
                        $nokey[$nokey_data['name']] = implode("/",$nokey_prop);
                    }
                }else{
                    $nokey_prop=$this->valueModel->where(array('cid'=>$data['cid'],'pid'=>$key,'vid'=>$value))->getField('name');
                    if(!empty($nokey_prop)){
                        $nokey[$nokey_data['name']] = $nokey_prop;
                    }
                }
            }else{
                if (!empty($nokey_data['name'])) {
                    $nokey[$nokey_data['name']]=$value;
                }
            }
        }
        return $nokey;
    }
    public function getProductCategory($id){
        //$id=10711;
        $shopid=M('Product')->where(array('id'=>$id))->getField("shopid");
        $catid=M('Shop')->where(array('id'=>$shopid))->getField('catid');
        return $catid;
    }
}

?>