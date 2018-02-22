<?php

use Phpmig\Migration\Migration;

class AddColumnToWorker2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_worker ADD  COLUMN ( activity varchar(32) DEFAULT '' COMMENT '价格活动',
                                                      service_promise varchar(64) DEFAULT '' COMMENT '服务状态');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_worker drop COLUMN activity;
                ALTER TABLE zt_worker drop COLUMN service_promise;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
