<?php

use Phpmig\Migration\Migration;

class AddShowWayToMaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_material ADD  COLUMN ( showway int(1) DEFAULT '0' COMMENT '详情页编辑方式');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_material drop COLUMN showway";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
