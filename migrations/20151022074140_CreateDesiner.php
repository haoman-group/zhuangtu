<?php

use Phpmig\Migration\Migration;

class CreateDesiner extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_designer` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `name` varchar(255) DEFAULT '',
              `sex` tinyint(1) DEFAULT '0',
              `school` varchar(255) DEFAULT '',
              `credential` varchar(255) DEFAULT '',
              `username` varchar(255) DEFAULT '',
              `uid` int(11) DEFAULT '0',
              `addtime` int(11) DEFAULT '0',
              `picture` varchar(2550) DEFAULT '',
              `qualification` varchar(255) DEFAULT '',
              `idea` varchar(255) DEFAULT '',
              `introduce` varchar(2550) DEFAULT '',
              `style` varchar(255) DEFAULT '',
              `number` varchar(255) DEFAULT '',
              `sales` int(11) DEFAULT '0',
              `popularity` int(11) DEFAULT '0',
              `status` smallint(4) DEFAULT '0' COMMENT '1上架 -1下架',
              `is_showcase` tinyint(1) DEFAULT '0' COMMENT '橱窗推荐',
              `service_status` tinyint(1) DEFAULT '1' COMMENT '1服务中 -1暂停服务',
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
        $sql = "DROP TABLE zt_designer;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
