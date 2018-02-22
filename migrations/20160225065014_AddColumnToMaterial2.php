<?php

use Phpmig\Migration\Migration;

class AddColumnToMaterial2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_material ADD  COLUMN ( activity varchar(32) DEFAULT '' COMMENT '价格活动',
                                                      inventory int(1) DEFAULT '1' COMMENT '库存状体',
                                                      service_promise varchar(64) DEFAULT '' COMMENT '服务状态');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_material drop COLUMN activity;
                ALTER TABLE zt_material drop COLUMN inventory;
                ALTER TABLE zt_material drop COLUMN service_promise;";
        $container = $this->getContainer();
        $container['db']->query($sql); 

    }
}
