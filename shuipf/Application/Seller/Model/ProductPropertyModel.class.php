<?php

namespace Seller\Model;

use Common\Model\Model;

class ProductPropertyModel extends \Member\Model\ProductModel {
    /*
    * 根据产品分类id获取宝贝属性
    **/
    public function getProperty($cid){
        $data = $this->where(array('cid'=>$cid,'parent_pid'=>0,"status"=>"normal"))->select();
        foreach($data as $k=>$v){
            if($v['is_enum_prop']){
                $data[$k]['value'] = M('ProductPropertyValue')->where(array('cid'=>$cid,'pid'=>$v['pid'],"status"=>"normal"))->order('sort_order asc')->select();
            }
        }
        return $data;
    }
    
     public function getAddr($userid){
    }

}