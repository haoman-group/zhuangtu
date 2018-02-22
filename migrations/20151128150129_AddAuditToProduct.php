<?php

use Phpmig\Migration\Migration;

class AddAuditToProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_product ADD  COLUMN  audit smallint(4) default 10 ;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product drop COLUMN audit;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
