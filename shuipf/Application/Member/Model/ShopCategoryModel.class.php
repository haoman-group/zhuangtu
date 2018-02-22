<?php

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Member\Model;

use Common\Model\Model;

class ShopCategoryModel extends Model {

  public function getCategory(){
    $cate = $this->where(array('status'=>1,'pid'=>0))->order(array('listorder'=>'desc','id'=>'asc'))->select();
    foreach($cate as $k=>$v){
      $cate[$k]['son'] = $this->where(array('status'=>1,'pid'=>$v['id']))->select();
    }
    return $cate;
  }
  /**
   * 获取父类PID
   * $id 当前ID
   * */
  public function getPid($id){
    return $this->where(array('id'=>$id, 'status'=>array('in', '1,2')))->order(array('listorder'=>'desc','id'=>'asc'))->getField('pid');
  }  
  /**
   * 获取店铺分类名称字符串
   * $catid 当前ID
   * */
  public function getCateNames($catid){
    $data = $this->where(array('id'=>$catid))->find();
    $parentName = $this->where(array('id'=>$data['pid']))->getField('name');
    return $parentName.'/'.$data['shopname'];
  }
  /**
   * 获取当前店铺分类父名称
   * $catid 当前ID
   * */
  public function getPName($catid){
    return $this->where(array('id'=>$this->getPid($catid)))->getField('name');
  }
  /**
   * 获取当前店铺的父分类
   * $shopid 店铺ID
   * */
  public function getPidByShopid($shopid){
    $catid = M('Shop')->getFieldById($shopid,'catid');
    return $this->getPid($catid);
  }
}
