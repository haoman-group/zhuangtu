<?php

use Phpmig\Migration\Migration;

class AddShopTemplate extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_shop_template` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(255) DEFAULT '',
              `content` mediumtext,
              `type` enum('detail','level1') DEFAULT NULL,
              `addtime` int(11) DEFAULT '0',
              `updatetime` int(11) DEFAULT '0',
              `status` tinyint(1) DEFAULT '0',
              `isdelete` tinyint(1) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `zt_shop_template`";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
