<?php

use Phpmig\Migration\Migration;

class CreateMaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql = "CREATE table `zt_material`(
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `uid` int(11) DEFAULT '0',
                `cid` int(11) DEFAULT '0',
                `vid` int(11) DEFAULT '0',
                `title` varchar(255) DEFAULT '',
                `sell_points` varchar(255) DEFAULT '' COMMENT '宝贝卖点',
                `key_prop` text COMMENT '宝贝关键属性',
                `nokey_prop` text COMMENT '宝贝非关键属性',
                `sale_prop` text COMMENT '宝贝销售属性',
                `custom_prop` text COMMENT '用户自定义属性',
                `shopcode` varchar(255) DEFAULT '' COMMENT '商家编码',
                `attribute` text COMMENT '宝贝规格',
                `number` int(11) DEFAULT 1 COMMENT '宝贝数量',
                `pay_mode` varchar(255) DEFAULT '' COMMENT '付款模式',
                `charge_unit` varchar(255) DEFAULT '',
                `purchase_addr` tinyint(1)  COMMENT '采购地',
                `picture` varchar(2550) DEFAULT '',
                `headpic` varchar(255) DEFAULT '',
                `show` text,
                `video` varchar(255) DEFAULT '',
                `cate_inshop` varchar(255) DEFAULT '' COMMENT '店铺所属的分类',
                `addtime` int(11) DEFAULT '0',
                `updatetime` int(11) DEFAULT '0',
                `status` smallint(4) DEFAULT '0',
                `listorder` int(11) DEFAULT '0',
                `weight` int(11) DEFAULT '0',
                `is_member_discount` tinyint(1) DEFAULT '0',
                `stock_type` smallint(4) DEFAULT '1',
                `is_showcase` tinyint(1) DEFAULT '0',
                `isdelete` tinyint(1) DEFAULT '0',    
                `expiry_date` tinyint(1) DEFAULT '0',
                `starttime_type` tinyint(1) DEFAULT '1',
                `starttime` varchar(16) DEFAULT NULL,
                `deletetime` int(11) DEFAULT NULL,
                `auditstatus` tinyint(1) DEFAULT NULL,
                `ill_reason` varchar(255) DEFAULT NULL,
                `audittime` int(11) DEFAULT NULL,
                `auditid` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
                )ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE IF EXISTS `zt_material`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
