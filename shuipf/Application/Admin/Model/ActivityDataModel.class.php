<?php

// +----------------------------------------------------------------------
// | shop_category表映射类
// +----------------------------------------------------------------------
// | Author: libing <makeup1123@gmail.com>
// +----------------------------------------------------------------------

namespace Admin\Model;

use Common\Model\Model;

class ActivityDataModel extends Model {
    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('max_price', 'require', '金额最大值不能为空'),
        array('min_price', 'require', '金额最小值不能为空'),
        array('act_id','require','活动类型必须选择'),
        array('dataid','require','产品id必须选择')
    );
    protected $_auto = array(
		array('addtime','time',   self::MODEL_INSERT,'function'),
        array('updatetime','time',self::MODEL_UPDATE,'function')
        );
}