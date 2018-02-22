<?php
// +----------------------------------------------------------------------
// | 设计师管理--Design Model
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Seller\Model;

use Common\Model\Model;

class DesignerModel extends Model {
    protected function getUserid(){
      return (int) service("Passport")->userid;
    }
    protected function getUsername(){
      return service("Passport")->username;
    }
    //获取当前用户可用设计师列表
    public function getDesignerList(){
        //服务中 & 上架
        return $this->where(array('status'=>1,'service_status'=>1,'uid'=>$this->getUserid()))->select();
    }
}