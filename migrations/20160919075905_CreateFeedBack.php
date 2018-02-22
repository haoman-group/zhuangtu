<?php

use Phpmig\Migration\Migration;

class CreateFeedBack extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "DROP TABLE IF EXISTS `zt_feedback`;
                CREATE TABLE `zt_feedback` (
              `feedback_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '问题编号',
              `types` varchar(255) NOT NULL COMMENT '问题类型',
              `content` varchar(255) NOT NULL COMMENT '问题描述',
              `userid` int(11) unsigned COMMENT '用户ID',
              `app_version` varchar(36) COMMENT 'APP版本号',
              `client_request_info` varchar(255) COMMENT '客户端信息',
              `addtime` VARCHAR(45) NULL COMMENT '反馈时间',
              PRIMARY KEY (`feedback_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='问题反馈表';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE IF EXISTS `zt_feedback`;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
