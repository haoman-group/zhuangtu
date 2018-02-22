<?php

use Phpmig\Migration\Migration;

class CreateMbSpecial2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "DROP TABLE IF EXISTS `zt_mb_special`;
                CREATE TABLE `zt_mb_special` (
              `special_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '专题编号',
              `title` varchar(255) NOT NULL COMMENT '专题标题',
              `description` varchar(255) NOT NULL COMMENT '专题描述',
              PRIMARY KEY (`special_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='手机专题表';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_mb_special;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
