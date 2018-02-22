<?php

use Phpmig\Migration\Migration;

class AddCommentShopC extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_comment_shop` ADD `onlineseveri` INT(1) NOT NULL COMMENT '线上服务评价' AFTER `onlineshop`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_comment_shop` DROP `onlineseveri`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
