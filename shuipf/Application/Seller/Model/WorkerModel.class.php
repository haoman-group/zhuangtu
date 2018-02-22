<?php
// +----------------------------------------------------------------------
// | 宝贝管理--worker Model
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Model;

use Common\Model\Model;
use Admin\Model\ProductCategoryModel as Cate;
class WorkerModel extends \Member\Model\ProductModel {
    
    // const WEIGHT_INDEX = 90;//首页推荐
    // const WEIGHT_LIST = 60;//首页推荐

    // const STATUS_VIOLATE=-10;//违规下架
    // const STATUS_SELLEROUT=-5;//商家下架
    // const STATUS_SELLOUT=-1;//售完下架
    // const STATUS_NEVER=1;//从未上架
    // const STATUS_SOON=5;//即将开始
    // const STATUS_SELLING=10;//出售中
    // const STATUS_SHOWCASE=20;//橱窗推荐

    // const AUDIT_PASS=10;//通过
    // const AUDIT_PENDING=-1;//待处理
    // const AUDIT_VIOLATE=-10;//违规
    // const AUDIT_SELLOUT=-5;//下架
    // const AUDIT_AUDIT=0;//待审核

    protected $_validate = array(
        array('workyears','number','工作年限必须为数字' ),
    );
    protected $_auto = array ( 
        // array('status','1',1),
        array('addtime','time',1,'function') ,
        array('updatetime','time',3,'function'),
    );
    public function getinfo($limit){
        $info = array();
        $cateidx = D("Admin/ProductCategory")->parent[CATE::TYPE_WORKER];
        $cate = explode(',',$cateidx);
        foreach($cate as $cid){
            $temp = $this->where(array('crafttype'=>$cid))->limit($limit)->select();
            foreach($temp as $key=>$tmp){
                $temp[$key]['shopname'] = M('Shop')->getFieldById($tmp['shopid'],'name');
            }
            $info[$cid] = $temp;
        }
        return $info;
    }
        $result = $this->where(array('uid'=>$userid))->select();
        foreach($result as $k=>$v){
            $result[$k]['area'] = $this->getArea($v['area']);
        }
        return $result;
    }
    // protected function getUserid(){
    //   return (int) service("Passport")->userid;
    // }
    // protected function getUsername(){
    //   return service("Passport")->username;
    // }

    // /**
    // * @name 删除商品
    // * @param int $id
    // **/
    // public function del($id){
    //   return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('isdelete',1);
    // }
    // /**
    // * @name 恢复商品
    // * @param int $id
    // **/
    // public function recover($id){
    //   //先下架再恢复,防止直接上架
    //   $this->unshelve($id);
    //   return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('isdelete',0);
    // }
    // /**
    // * @name 下架商品
    // * @param int $id
    // **/
    // public function unshelve($id){
    //   return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('status',12);
    // }
    // /**
    // * @name 上架商品
    // * @param int $id
    // **/
    // public function shelve($id){
    //   return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('status',10);
    // }
    // /**
    // * @name 设置橱窗推荐
    // * @param int $id
    // **/
    // public function setshowcase($id){
    //   return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('is_showcase',1);
    // }
    // /**
    // * @name 取消橱窗推荐
    // * @param int $id
    // **/
    // public function unsetshowcase($id){
    //   return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('is_showcase',0);
    // }
    // /**
    // * @name 已用橱窗位总数
    // **/
    // public function countcase(){
    //   return $this->where(array('uid'=>$this->getUserid(),'is_showcase' =>'1','status' => '10'))->count();
    // }
}