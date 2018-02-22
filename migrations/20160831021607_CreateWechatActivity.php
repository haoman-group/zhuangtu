<?php

use Phpmig\Migration\Migration;

class CreateWechatActivity extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zhuangtu`.`zt_activity_wechat` (
              `wid` INT NOT NULL AUTO_INCREMENT,
              `mobile` VARCHAR(45) NULL,
              `name` VARCHAR(45) NULL,
              `addr` VARCHAR(45) NULL,
              `addtime` VARCHAR(45) NULL,
              `actname` VARCHAR(45) NULL COMMENT '活动名称',
              PRIMARY KEY (`wid`))ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '微信活动';";
        $container = $this->getContainer();    
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table zt_activity_wechat;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
