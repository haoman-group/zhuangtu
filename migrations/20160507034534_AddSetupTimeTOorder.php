<?php

use Phpmig\Migration\Migration;

class AddSetupTimeTOorder extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_order add  COLUMN(setup_time int(10) default 0 COMMENT '安装时间');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_order drop  COLUMN setup;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
