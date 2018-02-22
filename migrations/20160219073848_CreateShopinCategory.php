<?php

use Phpmig\Migration\Migration;

class CreateShopinCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_shopin_category` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `pid` int(11) DEFAULT '0',
              `name` varchar(255) DEFAULT '',
              `isunfolder` tinyint(1) DEFAULT '0',
              `listorder` int(11) DEFAULT '0',
              `type` tinyint(1) DEFAULT '1' COMMENT '1自动分类 2手动分类',
              `userid` int(11) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `zt_shopin_category`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
