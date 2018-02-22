<?php

use Phpmig\Migration\Migration;

class UpdateCommShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_comment_shop` CHANGE `servicecredit` `lineservice` TINYINT(1) UNSIGNED NOT NULL DEFAULT '5' COMMENT '线下服务评论'";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_comment_shop` CHANGE `lineservice` `servicecredit` TINYINT(1) UNSIGNED NOT NULL DEFAULT '5' COMMENT '服务态度评分'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
