<?php

// +----------------------------------------------------------------------
// | 订单管理
// +----------------------------------------------------------------------
// | Author: libokai <lbk747@163.com>
// +----------------------------------------------------------------------

namespace Buyer\Model;

use Common\Model\Model;

class OrderRefundModel extends Model {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('order_id', 'require', 'Order_id不能为空！'),
        array('order_id','','order_id已经存在退款记录',self::EXISTS_VALIDATE,'unique',1),
        array('received',array("0","1"),"收货状态不正确",self::VALUE_VALIDATE,'in')
    );
    //array(填充字段,填充内容,[填充条件,附加规则])
    protected $_auto = array(
        array('addtime', 'time', self::MODEL_BOTH, 'function')
    );

}