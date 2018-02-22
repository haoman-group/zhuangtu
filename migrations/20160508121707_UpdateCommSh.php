<?php

use Phpmig\Migration\Migration;

class UpdateCommSh extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_comment_shop` CHANGE `deliverycredit` `onlineshop` TINYINT(1) UNSIGNED NOT NULL DEFAULT '5' COMMENT '线上店铺评论'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_comment_shop` CHANGE `onlineshop` `deliverycredit` TINYINT(1) UNSIGNED NOT NULL DEFAULT '5' COMMENT '发货速度评分'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
