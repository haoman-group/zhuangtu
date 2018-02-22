<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/23/16
 * Time: 16:28
 */

namespace Admin\Model;
use Common\Model\Model;

class AccessoryModel extends Model{
    protected $_validate = array(
        array('name', 'require', '辅材名不能为空'),
        array('unit_name', 'require', '单位不能为空'),
        array('unit_price', 'require', '单价不能为空'),
        array('norm_id', 'require', '请选择规格'),
        array('brand_id', 'require', '请选择品牌'),
    );

    protected $_auto = array(
        array('updatetime', 'time', self::MODEL_UPDATE, 'function'),
        array('addtime', 'time', self::MODEL_INSERT, 'function'),
    );
}
