<?php

use Phpmig\Migration\Migration;

class AddColumnToProduct4 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_product add  COLUMN(certification int(1) default 0 COMMENT '实名认证',goodworker int(1) default 0 COMMENT '装途好工人认证')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_product drop  COLUMN certification,goodworker;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
