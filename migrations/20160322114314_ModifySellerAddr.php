<?php

use Phpmig\Migration\Migration;

class ModifySellerAddr extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {   
            $sql ="DROP TABLE `zt_seller_addr`;
CREATE TABLE IF NOT EXISTS `zt_seller_addr` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `name` varchar(12) DEFAULT '' COMMENT '收货人姓名',
  `area` varchar(64) DEFAULT '' COMMENT '收货地区',
  `address` varchar(64) DEFAULT '' COMMENT '收货地址',
  `postcode` varchar(6) DEFAULT '' COMMENT '邮编',
  `phone` varchar(12) DEFAULT '' COMMENT '联系电话',
  `email` varchar(64) DEFAULT '' COMMENT '联系邮箱',
  `default` int(1) DEFAULT '0' COMMENT '默认地址',
  `pay_type` varchar(12) DEFAULT '' COMMENT '支付方式',
  `alias` varchar(12) DEFAULT '' COMMENT '地址别名',
  `addtime` int(11) DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `zt_seller_addr`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
