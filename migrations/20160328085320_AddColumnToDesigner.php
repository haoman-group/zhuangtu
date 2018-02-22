<?php

use Phpmig\Migration\Migration;

class AddColumnToDesigner extends Migration
{
    /**
     * Do the migration
     */
     public function up()
    {
        $sql="ALTER TABLE zt_designer add  COLUMN( `work_time` varchar(12) COMMENT '从业时间')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_product drop  COLUMN  `work_time`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
