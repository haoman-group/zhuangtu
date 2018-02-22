<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/23/16
 * Time: 09:47
 */

namespace Admin\Model;
use Common\Model\Model;

class AccessoryNormModel extends Model {
    protected $_auto = array(
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
    );
}