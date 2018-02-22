<?php

use Phpmig\Migration\Migration;

class ServiceimMessage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_serviceim_message` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `recordid` int(11) NOT NULL COMMENT 'recordID',
              `productid` int(11) DEFAULT NULL COMMENT '产品ID',
              `direction` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1为从用户到客服，反之是2',
              `msgtype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是正常聊天',
              `content` varchar(2550) DEFAULT NULL COMMENT '内容',
              `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '时间',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='咨询客服内容表'; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE `zt_serviceim_message`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
