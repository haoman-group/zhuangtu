<?php
#微信活动信息表
namespace Admin\Model;
use Common\Model\Model;
class ActivityWechatModel extends  Model{
	protected $_validate = array(
		array('mobile','require','手机号必须填写'),
		array('mobile','checkMobile','手机号码格式错误',self::MUST_VALIDATE,'function'),
		array('mobile','','手机号码已经登记，无需重复登记!',self::EXISTS_VALIDATE,'unique',self::MODEL_INSERT),
		array('name','require','姓名必须填写'),
		array('name','1,5','姓名长度在1-5个字之间',self::EXISTS_VALIDATE,'length',self::MODEL_INSERT),
		// array('addr','require','地址必须填写'),
		array('actname','require','活动名称必须填写')
		);
	protected $_auto = array(
		array('addtime','time',self::MODEL_INSERT,'function'));
	// 获取活动名称
	public  function getActNameArray(){
		return $this->field('actname')->group('actname')->select();
	}
}