<?php

use Phpmig\Migration\Migration;

class CreateShopDesign extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_shop_design` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `module` varchar(255) DEFAULT '',
          `data` longtext,
          `uid` int(11) DEFAULT '0',
          `shopid` int(11) DEFAULT '0',
          `addtime` int(11) DEFAULT '0',
          `updatetime` int(11) DEFAULT '0',
          `status` tinyint(1) DEFAULT '0',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql  = "DROP TABLE zt_shop_design";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
