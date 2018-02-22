<?php

use Phpmig\Migration\Migration;

class CreateMbSpecial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
            CREATE TABLE `zt_mb_special` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '专题编号',
              `title` varchar(255) NOT NULL COMMENT '专题标题',
              `description` varchar(255) NOT NULL COMMENT '专题描述',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='手机专题表';
            CREATE TABLE `zt_mb_special_item` (
              `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '专题项目编号',
              `special_id` int(10) unsigned NOT NULL COMMENT '专题编号',
              `item_type` varchar(50) NOT NULL COMMENT '项目类型',
              `item_data` varchar(2000) DEFAULT '' COMMENT '项目内容',
              `item_usable` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '项目是否可用 0-不可用 1-可用',
              `item_sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '项目排序',
              PRIMARY KEY (`item_id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='手机专题项目表';
        ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_mb_special;DROP TABLE zt_mb_special_item;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
