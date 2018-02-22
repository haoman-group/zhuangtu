<?php
namespace App\Controller;

class ProductPriceController extends ApibaseController{
    
     protected function _initialize() {
        $this->product = M('Product');
        parent::_initialize();

    }

    public function pricejson($productid){
    	  $productid=I("productid");
    	  $json=$this->product->where(array('id'=>$productid))->getField("price_json");
    	  // if(empty($json)){$this->ajaxReturn(array('status'=>0,'msg'=>'数据获取失败'));}
          $json_array = json_decode($json,true);
          foreach ($json_array as $key => $value) {
            $hidden_value_true ='';
              if(is_array($value)){
                    foreach ($value as $k => $v) {
                        if(is_array($v)){
                            $hidden_value_true = $hidden_value_true.$v['txt'].$v['idx'];
                        }
                    }
              }
             $json_array[$key]['hidden_value_true'] = $hidden_value_true;
          }
           $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功','data'=>json_encode($json_array,JSON_UNESCAPED_UNICODE|JSON_FORCE_OBJECT)));

    }


}

?>