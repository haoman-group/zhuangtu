<?php

use Phpmig\Migration\Migration;

class AddCart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_cart` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `proid` int(11) DEFAULT '0',
              `num` int(11) DEFAULT '0',
              `shopid` int(11) DEFAULT '0',
              `uid` int(11) DEFAULT '0',
              `addtime` int(11) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_cart";
        $container = $this->getContainer();
        $container['db']->query($sql); 

    }
}
