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

class ServiceimMessageModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_auto = array(
        array('addtime','time',self::MODEL_INSERT,'function')
    );

    protected $_validate = array(
        array('direction','require','需要会话方向！')
    );








    /*新增token记录*/
    public function addmsg($data){
        $uid = $data['uid'];
        $shopid = $data['shopid'];
        $recordthis = M('ServiceimRecord')->where(array('uid'=>$uid,'shopid'=>$shopid))->getField("id");
        if(empty($recordthis)){
            $datarecord['uid']= $uid;
            $datarecord['shopid']= $shopid;
            $recordid = D('Member/ServiceimRecord')->addrecord($datarecord);
        }
        else{
            $recordid = $recordthis;
            M('ServiceimRecord')->where('id='.$recordid)->setField('updatetime',time());
        }

        $data['recordid'] = $recordid;

        $this->create($data);
        return $this->add();
    }

}
