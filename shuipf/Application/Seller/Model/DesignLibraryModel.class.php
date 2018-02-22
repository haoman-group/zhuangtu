<?php

namespace Seller\Model;

use Common\Model\Model;

class DesignLibraryModel extends Model {
                                 
    protected function getUserid(){
      return (int) service("Passport")->userid;
    }
    protected function getUsername(){
      return service("Passport")->username;
    }
    protected $_scope = array(
        'normal'=>array(
            'where'=>array('status'=>1,'isdelete'=>0),
            'order'=>array('listorder'=>'desc','id'=>'desc')
        ),
    );
    protected $_auto = array ( 
        array('title','_procTitle',1,callback),  // 新增的时候把status字段设置为1
        );
    /**
    * @name 删除设计库
    * @param int $id
    **/
    public function del($id){
      return $this->where(array('id'=>$id,'uid'=>$this->getUserid()))->setField('isdelete',1);
    }
    protected function _procTitle(){
    }
     /**
    * @name 获取设计库展示内容
    * @param 设计风格
    **/
    public function getListByStyle($style){
      $where = array();
      $where['style'] = array('LIKE','%'.$style.'%');
      $where['isdelete'] = 0;
      $where['status'] = 1;
      return $this->where($where)->select();
    }
    /**
    * @name 获取设计库展示内容
    * @param 设计风格
    **/
    public function getCountByStyle($style){
      $where = array();
      $where['style'] = array('LIKE','%'.$style.'%');
      $where['isdelete'] = 0;
      $where['status'] = 1;
      return $this->where($where)->count();
    }
}