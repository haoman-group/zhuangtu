<?php

use Phpmig\Migration\Migration;

class AddUrl extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="
     CREATE TABLE `zt_url` (
        `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
        `uid` int(15) NOT NULL COMMENT '用户id',
         `urlid` int(20) NOT NULL COMMENT '产品id',
          `addtime` int(20) NOT NULL COMMENT '添加时间',
           PRIMARY KEY (`id`)
        ) DEFAULT CHARSET=utf8;";
      $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql = "drop table zt_url";
       $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
