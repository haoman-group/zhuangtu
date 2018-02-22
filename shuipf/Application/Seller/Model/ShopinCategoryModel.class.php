<?php

namespace Seller\Model;

use Common\Model\Model;

class ShopinCategoryModel extends Model {
	//获取产品列表
	public function getProducts($id, $userid = ''){
		if(empty($id)){return false;}
		$productsList = null;
		$where = array('id'=>$id);
		if ($userid != '') {
			$where['userid'] = $userid;
		}
		$cate = $this->where($where)->find();
		if($cate['pid']=='0'){
			$subwhere = array('pid'=>$cate['id']);
			if ($userid != '') {
				$subwhere['userid'] = $userid;
			}
			$result = $this->where($subwhere)->getField("products",true);
			foreach ($result as $key => $value) {
				$productsList = $productsList.",".$value;
			}
			 $productsList = array_filter(explode(",", $productsList.','.$cate['products']));
			 return implode(",",array_unique($productsList));
		}else{
			return $cate['products'];
		}
	}
	//添加分类的产品列表
	public function editProducts($prodID_array,$cate_array,$uid){
		// var_dump($prodID_array);
		// var_dump($cate_array);
		// var_dump($uid);
		if(sizeof($prodID_array) == 1 ){ //单个宝贝的分类
			//获取当前用户的所有分类列表
			$products = $this->where(array('uid'=>$uid))->select();
			//遍历当前用户的所有分类
			foreach ($products as $key => $value) {
				//解析产品列表
				$products_Array = explode(",", $value['products']);
				// dump($products_Array);
				//选中分类
				if(in_array($value['id'],$cate_array)){
					//是否存在
					if(in_array($prodID_array[0],$products_Array)){
					}else{
						//插入新的产品ID
						$products_Array[] = $prodID_array[0];
						$this->where(array('uid'=>$uid,'id'=>$value['id']))->setField("products",implode(",",$products_Array));
					}
				}else{//未选中分类
					if(in_array($prodID_array[0],$products_Array)){
						//删除新的产品ID
						foreach ($products_Array as $k=>$v)
						{
    						if ($v === $prodID_array[0])
        					unset($products_Array[$k]);
						}
						$this->where(array('uid'=>$uid,'id'=>$value['id']))->setField("products",implode(",",$products_Array));
						// return true;
					}else{
						// return true
					}
				}	
			}
		}else{//多个宝贝批量修改分类
			$products = $this->where(array('uid'=>$uid))->select();
			foreach ($products as $k1 => $v1) {
				//解析产品列表
				$products_Array = explode(",", $v1['products']);
				if(in_array($v1['id'],$cate_array)){
					//遍历产品ID
					foreach ($prodID_array as $k2 => $v2) {
						if(!in_array($v2, $products_Array)){
							$products_Array[] = $v2;
						}
					}
					$this->where(array('uid'=>$uid,'id'=>$v1['id']))->setField("products",implode(",",$products_Array));
				}else{
					//遍历产品ID
					foreach ($products_Array as $k3 => $v3) {
						if(in_array($v3, $prodID_array)){
							unset($products_Array[$k3]); 
						}
					}
					$this->where(array('uid'=>$uid,'id'=>$v1['id']))->setField("products",implode(",",$products_Array));
				}
			}
		}
	}
	//获取产品分类路径
	public function getPath($cateID,$path){
		$result= $this->where(array('id'=>$cateID))->find();
		if(!empty($result)){
			$path = $this->getPath($result['pid'],$path).$result['name'].">";
		}
		return $path;
	}
}