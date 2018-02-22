<?php

namespace Seller\Model;

use Common\Model\Model;

class MaterialModel extends \Member\Model\ProductModel{
    //字段映射
    protected $_map = array(
     );
    //自动验证
    protected $_validate = array(
        array('cid','require','缺少CID值!',self::VALUE_VALIDATE,'',self::MODEL_INSERT),
        array('title','require','标题必须填写！'), //默认情况下用正则进行验证
        array('picture','require','请至少上传一张图片!'),
        array('number','number','宝贝数量必须为数字' ),
    );
    //自动完成
    protected $_auto = array ( 
        array('addtime','time',1,'function'),
        array('updatetime','time',3,'function'),
        array('key_prop','serialize',3,'function'),
        array('nokey_prop','serialize',3,'function'),
        array('sale_prop','serialize',3,'function'),
        array('custom_prop','serialize',3,'function'),
    );
}
