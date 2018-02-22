<?php

// +----------------------------------------------------------------------
// | 收货地址管理
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Model;

use Common\Model\Model;

class BuyerAddrModel extends Model {
    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_auto = array(
        array('addtime','time',   self::MODEL_INSERT,'function'),
        array('updatetime','time',self::MODEL_UPDATE,'function'),
        array('zone','area',      self::MODEL_BOTH,'field'),
        array('zone','_getZone',  self::MODEL_BOTH,'callback'),
        array('area1','area',     self::MODEL_BOTH,'field'),
        array('area1','_getArea1',self::MODEL_BOTH,'callback'),
        array('area2','area',     self::MODEL_BOTH,'field'),
        array('area2','_getArea2',self::MODEL_BOTH,'callback'),
        array('area3','area',     self::MODEL_BOTH,'field'),
        array('area3','_getArea3',self::MODEL_BOTH,'callback'),
    );
    protected $_validate = array(
        array('uid','require','用户ID必须含有！'),
        array('name','require','收件人必须填写！'),
        array('area','require','收货地区必须填写！'),
        array('address','require','详细收货地址必须填写！'),
        array('phone','require','联系电话必须填写！'),
    );
    //获取地址
    public function getAddr($userid){
        $result = $this->where(array('uid'=>$userid))->order(array('default'=>'desc'))->select();
        foreach($result as $k=>$v){
            $result[$k]['area'] = $this->getArea($v['area']);
        }
        return $result;
    }
    public function getDefaultAddr($userid){
        $result = $this->where(array('uid'=>$userid,'default'=>'1'))->order(array('default'=>'desc'))->find();
        return $result;   
    }
    //获取地址APP用
    public function getAddrOfApp($userid){
        $result = $this->where(array('uid'=>$userid))->order(array('default'=>'desc','addtime'=>'desc'))->select();
        // print_r($result);
        foreach($result as $k=>$v){
            $result[$k]['area1'] = M('Area')->getFieldById($v['area1'],'name');
            $result[$k]['area2'] = M('Area')->getFieldById($v['area2'],'name');
            $result[$k]['area3'] = M('Area')->getFieldById($v['area3'],'name');
        }
        return $result;
    }
    public function getAddrInfo($condition){
        return $this->where($condition)->where($condition)->find();
    }
    //获取地区汉字
    public function getArea($area){
        $token = strtok($area,",");
        $str = '';
        for($k = 0;$k<3;$k++){
            $name = M("Area")->where(array('id'=>$token))->getField('name');
            $str = $str.$name;
            $token = strtok(",");
        }
        return $str;
    }
    //新增地址
    public function addAddr($data){
        $this->create($data);
        $this->add();
    }
    //删除地址
    public function deleteAddr($id){
        if(empty($id)){return false;}
        $addr = $this->where(array('id'=>$id))->find();
        if(empty($addr)){
            $this->error = "未找到指定删除记录！";
            return false;
        }
        if($this->where(array('id'=>$id))->delete()){
            if($addr['default'] == '1'){
                $this->where(array('uid'=>$addr['uid']))->limit(1)->order('addtime desc')->setField('default','1');
            }
        }else{
            $this->error = "执行delete错误！";
            return false;
        }
        return true;
    }
    //修改地址
    public function editAddr(){
        $this->create($data);
        $this->save();
    }
    //修改默认地址
    public function setDefault($id,$uid){
        $this->where(array('uid'=>$uid))->setField('default','0');
        return $this->where(array('id'=>$id))->setField('default','1');
    }
    //获取收货地区的汉字
    protected function _getZone($area){
        $area = explode(",", $area);
        $zone = null;
        foreach ($area as $key => $value) {
            # code...
            $zone = $zone.M('Area')->getFieldById($value,'name');
        }
        return $zone;
        // return D('Buyer/BuyerAddr')->
    }
    //获取收货地区的省份
    protected function _getArea1($area){
        $area = explode(",", $area);
        return $area[0];
    }
    //获取收货地区的市
    protected function _getArea2($area){
        $area = explode(",",$area);
        return $area[1];
    }
    //获取收货地区的区县
    protected function _getArea3($area){
        $area = explode(",",$area);
        return $area[2];
    }

}