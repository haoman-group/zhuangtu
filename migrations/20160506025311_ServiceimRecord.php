<?php

use Phpmig\Migration\Migration;

class ServiceimRecord extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_serviceim_record` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                  `uid` int(11) NOT NULL COMMENT '用户ID',
                  `shopid` int(11) NOT NULL COMMENT '店铺ID',
                  `updatetime` int(11) NOT NULL COMMENT '最近聊天时间',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='咨询客服记录表'; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `zt_serviceim_record`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
