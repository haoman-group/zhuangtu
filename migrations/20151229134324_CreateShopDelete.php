<?php

use Phpmig\Migration\Migration;

class CreateShopDelete extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
            CREATE TABLE `zt_shop_delete` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `uid` int(11) DEFAULT '0',
          `username` varchar(255) DEFAULT '',
          `name` varchar(255) DEFAULT '',
          `catid` int(11) DEFAULT '0',
          `addtime` int(11) DEFAULT '0',
          `updatetime` int(11) DEFAULT '0',
          `status` int(11) DEFAULT '0',
          `isdelete` tinyint(1) DEFAULT '0',
          `headpic` varchar(255) DEFAULT '',
          `introduce` varchar(2550) DEFAULT '',
          `domain` varchar(255) DEFAULT NULL,
          `logo` varchar(255) DEFAULT '',
          `addr` varchar(255) DEFAULT '',
          `goodsfrom` varchar(12) DEFAULT '' COMMENT '主要货源',
          `detail` text COMMENT '详细介绍',
          `deletetime` int(11) DEFAULT '0',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM  DEFAULT CHARSET=utf8;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_shop_delete";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
