<?php

use Phpmig\Migration\Migration;

class CrateTableRongcloudToken extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_rongcloud_token` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                  `uid` int(11) NOT NULL COMMENT '用户ID',
                  `token` varchar(100) NOT NULL DEFAULT '' COMMENT '融云token',
                  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
                  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
                  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_rongcloud_token";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
