<?php

use Phpmig\Migration\Migration;

class AddShopTelphone extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql="ALTER TABLE `zt_shop` ADD `telphone` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '市场部电话';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="ALTER TABLE `zt_shop` DROP `telphone`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
