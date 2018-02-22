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
        array('sell_points','require','宝贝卖点必须填写！'),
        // array('workername','require','工人姓名必须填写！'),
        // array('workyears','require','从业年限必须填写！'),
        // array('hometown','require','工人籍贯必须填写！'),
        // array('phone','require','联系电话必须填写!'),
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
        array('price_json',html_entity_decode,3,'function'),
    );
      
}
