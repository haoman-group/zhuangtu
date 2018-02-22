<?php

// +----------------------------------------------------------------------
// | product_category表映射类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class ProductCategoryModel extends Model {
    //定义根类目
    const TYPE_DESIGN   =1;   //设计
    const TYPE_WORKER   =2;   //工人
    const TYPE_MATERIAL =3; //主材
    const TYPE_FURNITURE=4;   //家具
    const TYPE_APPLIANCE=5;   //家电
    const TYPE_ACCESSORY=21;  //辅材
    const TYPE_YANSHOU=23;  //验收
    //根类目数组
    public $parent = array(
        self::TYPE_DESIGN=>'101,102,124886054',
        self::TYPE_WORKER=>'103,104,105,106,107,108,112,113,124886054',
        self::TYPE_MATERIAL=>'27,50020332,50020485,124050001,50008163,50008164,50022703,124886054',
        self::TYPE_FURNITURE=>'50008164,50008163,122852001,50020808,124050001,124886054',
        self::TYPE_APPLIANCE=>'27,50022703,50011972,50012100,50012082,21,124242008,1101,1512,14,124886051,124886054',
        self::TYPE_ACCESSORY=>'124886017,124886054',
        self::TYPE_YANSHOU=>'114',
      );
    public function ifhasChild($id = 0){
        $result = $this->where(array('parent_cid' => $id))->select();
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    public function childlist($pid = 0){
        // if($this->ifhasChild($pid)){
        //     $result =  $this->where(array('parent_cid' => $pid))->select();
        //     foreach ($result as $b=>$r){
        //         $result[$b]['is_parent'] = 0;
        //         if($this->ifhasChild($r['cid'])){
        //             $result[$b]['is_parent'] = 1;
        //         }
        //     }
        //     return $result;
        // }
        // else{
        //     return false;
        // }
        return $this->where(array('parent_cid' => $pid,'isdelete'=>'0'))->order('id')->select();
    }
    public function checkcate($cateid,$cate_type){
        $cateidArray = explode(",",$this->parent[$cate_type]);
        return in_array($cateid,$cateidArray);
    }
    public function getPpid($pid){
        $Parent = $this->where(array('cid' => $pid))->select();
        if(empty($Parent)){
            return false;
        }
        else{
            $grandParent = $this->where(array('parent_cid' => $current['parent_cid']))->select();    
            if(empty($grandParent)){
                return false;
            }
            else{
                return $grandParent['id'];
            }
        }
    }
    //获取add的cid
    public function getCID(){
        return $this->max('cid') + 1;
    }
    //获取根类目
    public function getRootCate($cid){
        $parent = $this->where(array('cid' => $cid))->select();
        //var_dump($parent);
        if(empty($parent)){
            return false;
        }else if($parent[0]['parent_cid'] == 0 ){
            return $parent[0]['cid'];
        }else{
            return $this->getRootCate($parent[0]['parent_cid']);
        }
    }
    /**
	  * @name 根据店铺类别，获取产品宝贝分类列表
	* */
    public function getCateType($catpid){
      $cate = $this->where(array('cid'=>array('in',$this->parent[$catpid])))->select();
      $category = array();
      foreach($cate as $k=>$v){
          $category[$v['cid']] = $v['name'];
      }
      return $category;
    }
    /**
	  * @name 根据产品分类，获取产品类目
	* */
    public function getCate($type){
      return $this->parent[$type];
    }

    /**
     * @name 获取宝贝的大分类对应的名称
     */
    public function getType() {
        return array(self::TYPE_DESIGN=>"设计",
            self::TYPE_WORKER=>"工人",
            self::TYPE_FURNITURE => "家具",
            self::TYPE_APPLIANCE => "家电",
            self::TYPE_MATERIAL => "主材");
    }
    
}