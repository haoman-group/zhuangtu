<?php

use Phpmig\Migration\Migration;

class CreateDecorationBooks extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
    $sql= "CREATE TABLE IF NOT EXISTS `zt_decoration_books` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `userid` int(15) NOT NULL COMMENT '用户者的ID',
  `description` text CHARACTER SET utf8 NOT NULL COMMENT '添加类别说明',
  `remarks` text CHARACTER SET utf8 NOT NULL COMMENT '备注',
  `picture` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '图片',
  `video` int(255) NOT NULL COMMENT '视频',
  `money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '金额',
  `type` int(2) NOT NULL COMMENT '类型',
  `addtime` int(12) NOT NULL COMMENT '添加时间',
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '装修账本';";


       $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql = "DROP table  zt_decoration_books;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
