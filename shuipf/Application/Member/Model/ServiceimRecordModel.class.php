<?php

// +----------------------------------------------------------------------
// | ShuipFCMS 会员收藏模型
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.shuipfcms.com, All rights reserved.
// +----------------------------------------------------------------------
// | Author: 水平凡 <admin@abc3210.com>
// +----------------------------------------------------------------------

namespace Member\Model;

use Common\Model\Model;

class ServiceimRecordModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_auto = array(
        array('updatetime','time',self::MODEL_BOTH,'function')
    );

    protected $_validate = array(
        array('uid','require','缺少用户ID！'),
        array('shopid','require','需要shopID！'),
    );



    /*新增token记录*/
    public function addrecord($data){
        $this->create($data);
        return $this->add();
    }


    public function latestrecord($uid,$lmt){
        //$voimrecord = $this->where('uid='.$uid)->order('updatetime desc')->limit($lmt)->getField('id,uid,shopid,updatetime');
        $voimrecord = $this->where('uid='.$uid)->order('updatetime desc')->limit($lmt)->select();
        foreach($voimrecord as $k=>$v){
            $voimrecord[$k]["shop"] = D('Member/Shop')->where(array("id"=>$v["shopid"]))->find();
            $voimrecord[$k]["updatetime"] =date('m-d', $voimrecord[$k]["updatetime"]);
        }
        return $voimrecord;
    }


}
