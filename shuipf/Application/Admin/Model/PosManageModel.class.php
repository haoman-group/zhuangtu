<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/22/16
 * Time: 19:06
 */

namespace Admin\Model;
use Common\Model\Model;

class PosManageModel extends Model{
    protected $_validate = array(
        array('uid', 'require', '用户ID不能为空'),
    );

    protected $_auto = array(
        // array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
    );
    function getByUid($uid){
    	if(empty($uid)){return false;}
    	$res = $this->join('zt_member on zt_member.userid= zt_pos_manage.uid','left')->where(array('uid'=>$uid))->find();
    	return $res;
    }
}