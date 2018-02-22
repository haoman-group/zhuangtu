<?php

use Phpmig\Migration\Migration;

class ReCreateShopDesign extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "DROP table zt_shop_design;
        CREATE TABLE `zt_shop_design` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `uid` int(11) DEFAULT '0',
          `data` longtext,
          `shopid` int(11) DEFAULT '0',
          `addtime` int(11) DEFAULT '0',
          `updatetime` int(11) DEFAULT '0',
          `status` tinyint(1) DEFAULT '0',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
    
        
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
