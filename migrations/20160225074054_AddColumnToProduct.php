<?php

use Phpmig\Migration\Migration;

class AddColumnToProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_product ADD  COLUMN ( activity varchar(32) DEFAULT '' COMMENT '价格活动');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product drop COLUMN activity;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
