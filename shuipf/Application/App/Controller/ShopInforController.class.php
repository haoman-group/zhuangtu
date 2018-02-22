<?php
namespace App\Controller;

class ShopInforController extends ApibaseController{
	 protected function _initialize() {
        $this->product = M('Product');
        $this->shop=M('Shop');
        parent::_initialize();

    }
    public function infor($userid){
        $userid=I("userid");
    	$shopid=$this->shop->where(array('uid'=>$userid,'status'=>1))->getField("id",true);
		$productinfo = array();
    	foreach ($shopid as $k => $v) {
    		$product[$k]=$this->product->where(array("status"=>10,'shopid'=>$v,'isdelete'=>'0'))->order('addtime desc')->select();
    		foreach ($product as $key => $value) {
    			  foreach ($value as $k1 => $v1) {
    			  	$productinfo[$k1]['id']=$v1['id'];       
    	 	        $productinfo[$k1]['headpic']=thumb($v1['headpic'],'320','320','');
    	 	        $productinfo[$k1]['title']=$v1['title'];
    	 	        $productinfo[$k1]['min_price']=$v1['min_price'];
    			  }
    	 	}
    	}
        $this->ajaxReturn(array('status'=>1,'msg'=>'数据获取成功','data'=>$productinfo));
    }
}
?>