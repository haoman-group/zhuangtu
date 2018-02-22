<?php

use Phpmig\Migration\Migration;

class CreateDesignLibrary extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_design_library` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `picture` varchar(255) DEFAULT '',
              `uid` int(11) DEFAULT '0',
              `username` varchar(255) DEFAULT '',
              `shopid` int(11) DEFAULT '0',
              `shopcatid` int(11) DEFAULT '0',
              `style` varchar(255) DEFAULT '',
              `proid` int(11) DEFAULT '0',
              `title` varchar(255) DEFAULT '',
              `addtime` int(11) DEFAULT '0',
              `listorder` int(11) DEFAULT '0',
              `status` int(11) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_design_library;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
