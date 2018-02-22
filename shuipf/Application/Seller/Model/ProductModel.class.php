<?php

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Seller\Model;

use Common\Model\Model;

class ProductModel extends Model {
     //自动完成
    protected $_auto = array ( 
        array('addtime','time',1,'function'),
        array('updatetime','time',3,'function'),
        array('key_prop','serialize',3,'function'),
        array('nokey_prop','serialize',3,'function'),
        array('sale_prop','serialize',3,'function'),
        array('custom_prop','serialize',3,'function'),
        array('service_promise','serialize',3,'function'),
        array('solution','serialize',3,'function'),
        array('price_json',html_entity_decode,3,'function'),
        array('starttime',strtotime,3,'function'),
    );
     //自动验证
    protected $_validate = array(
        array('cid','require','缺少CID值!',self::VALUE_VALIDATE,'',self::MODEL_INSERT),
        array('title','require','标题必须填写！'), //默认情况下用正则进行验证
        // array('sell_points','require','宝贝卖点必须填写！'),
        array('picture','require','请至少上传一张图片!'),
        array('number','number','宝贝数量必须为数字' ),
        array('workyears','number','工作年限必须为数字' ),
        //array('limitnum','number','限量数必须为大于1数字'),
    );
    protected function getUserid(){
      return (int) service("Passport")->userid;
    }
    protected function getUsername(){
      return service("Passport")->username;
    }

    /**
    * @name 删除商品
    * @param int $id
    **/
    public function del($id){
      $data = array('isdelete'=>1,'deletetime'=>time());
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField($data);
    }
    /**
    * @name 恢复商品
    * @param int $id
    **/
    public function recover($id){
      //先下架再恢复,防止直接上架
      $this->unshelve($id);
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('isdelete',0);
    }
    /**
    * @name 下架商品
    * @param int $id
    **/
    public function unshelve($id){
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('status',\Seller\Controller\Status::STATUS_SELLEROUT);
    }
    /**
    * @name 上架商品
    * @param int $id
    **/
    public function shelve($id){
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('status',\Seller\Controller\Status::STATUS_SELLING);
    }
     /**
    * @name 设置橱窗推荐
    * @param int $id
    **/
    public function setshowcase($id){
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('is_showcase',1);
    }
     /**
    * @name 取消橱窗推荐
    * @param int $id
    **/
    public function unsetshowcase($id){
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('is_showcase',0);
    }
    /**
    * @name 已用橱窗位总数
    **/
    public function countcase(){
      return $this->where(array('uid'=>$this->getUserid(),'is_showcase' =>'1','status' => \Seller\Controller\Status::STATUS_SELLING))->count();
    }
    //获取最低价
    public function getMinPriceById($id){
      // if(empty($id)){return false;}
      // $priceJson = $this->where(array('id'=>$id))->getField('price_json');
      // if(empty($priceJson)){return false;}
      // $price_Array = json_decode($priceJson);
      // if(empty($price_Array)){return false;}
      // $range = array();
      // $range['price_min'] = 0;
      // $range['price_max'] = 0;
      // $range['price_act_min'] = 0;
      // $range['price_act_max'] = 0;
      // foreach ($price_Array as $key => $value) {
      //     if((int)($value->price) <= $range['price_min'] ||  $range['price_min'] === 0){
      //       $range['price_min'] = (int)($value->price);
      //     }
      //     if((int)($value->price) >= $range['price_max']){
      //       $range['price_max'] = (int)($value->price); 
      //     }
      //     if((int)($value->price_act) <= $range['price_act_min'] || $range['price_act_min'] === 0){
      //       $range['price_act_min'] = (int)($value->price_act); 
      //     }
      //     if((int)($value->price_act) > $range['price_act_max']){
      //       $range['price_act_max'] = (int)($value->price_act); 
      //     }
      // }
      // return $range;
    }
    //获取设计师的作品
    public function getProductByDesigner($designer_name,$type,$limit){
      return $this->where(array('designer_name'=>$designer_name,'type'=>$type,'isdelete'=>'0','status'=>'10'))->limit($limit)->select();
    }
    //是否有合作工长页面的内容
    public function checkTeamWorker($uid,$shopid){
      return $this->where(array('cid'=>array('IN','103,124886059,124886060'),'uid'=>$uid,'shopid'=>$shopid,'isdelete'=>'0','status'=>'10'))->count();
    }
}
