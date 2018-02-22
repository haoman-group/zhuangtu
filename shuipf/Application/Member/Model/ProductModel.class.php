<?php

// +----------------------------------------------------------------------
// | 会员设置管理
// +----------------------------------------------------------------------
// | Author: 李博凯 <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Member\Model;

use Common\Model\Model;

class ProductModel extends Model {

    protected $_validate = array(

    );
    protected $_auto = array ( 
         array('status','1',1),
         array('addtime','time',1,'function') ,
         array('updatetime','time',3,'function'),
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
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('isdelete',1);
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
}
