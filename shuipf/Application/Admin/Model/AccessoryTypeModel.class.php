<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/22/16
 * Time: 19:06
 */

namespace Admin\Model;
use Common\Model\Model;

class AccessoryTypeModel extends Model{
    protected $_validate = array(
        array('name', 'require', '辅材类型名不能为空'),
    );

    protected $_auto = array(
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
    );
}