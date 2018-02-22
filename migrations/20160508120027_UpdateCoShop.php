<?php

use Phpmig\Migration\Migration;

class UpdateCoShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_comment_shop` CHANGE `desccredit` `lineshop` TINYINT(1) UNSIGNED NOT NULL DEFAULT '5' COMMENT '线下店铺评论'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="zt_comment_shop` CHANGE `lineshop` `desccredit` TINYINT(1) UNSIGNED NOT NULL DEFAULT '5' COMMENT '描述相符评分'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
