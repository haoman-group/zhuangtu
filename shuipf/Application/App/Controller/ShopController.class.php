<?php
namespace App\Controller;
//店铺信息
class ShopController extends ApibaseController{
    protected function _initialize() {
        $this->propmodel = D('Admin/ProductProperty');
        $this->valueModel=D('Admin/ProductPropertyValue');
        parent::_initialize();

    }
    //根据店铺的域名查找该店铺的所有产品
   public function shopinfo($domain){
        $domain=I("domain");
       //如果穿过来得是自定义的urlhttp://www.zhuangtu.net/s_LBDQ/p_1893.html
       if(preg_match('/(\d+)/',$domain,$a)){
           $shopinfo=M('ShopPage')->where(array('id'=>$a[1]))->find();
           $shopinfo['setting']=unserialize($shopinfo['setting']);
           $shopinfo['product']=M('Product')->where(array('shopid'=>$shopinfo['shopid'],'status'=>10))->select();
           foreach ($shopinfo['product'] as $key=>$value){
               $shopinfo['product'][$key]['key_prop']=$this->getProperty($value);
               $shopinfo['product'][$key]['nokey_prop']=$this->getnokey($value);
           }
           if(empty($shopinfo)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败'));}
           $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功','data'=>$shopinfo));
          }else{
           $yu=explode("/",$domain);//把传过来的url以"/"分隔成数组
           $count=count($yu);
           $yuming=$yu[$count-1];
           $shopinfo=M('Shop')->where(array('domain'=>$yuming))->find();
           $shopinfo['product']=M('Product')->where(array('shopid'=>$shopinfo['id'],'status'=>10))->select();
                foreach ($shopinfo['product'] as $key=>$value){
                    $shopinfo['product'][$key]['key_prop']=$this->getProperty($value);
                    $shopinfo['product'][$key]['nokey_prop']=$this->getnokey($value);
                }
           if(empty($shopinfo)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败'));}
           $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功','data'=>$shopinfo));

       }
   }
    //获取关键属性
    private function getProperty($data){
        $key_Array = unserialize($data['key_prop']);
        $property = null;
        if(empty($key_Array)){
            return "";
        }
        foreach ($key_Array as $key => $value) {

            $key_data = $this->propmodel->where(array('cid'=>$data['cid'],'pid'=>$key))->getField('name');
            $key_prop=$this->valueModel->where(array('cid'=>$data['cid'],'vid'=>$value))->getField('name');
            $property = "{".$property.$key_data.'":"'.$key_prop."}";
        }
        return  $property;
    }
    //获取非关键属性
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
}

?>