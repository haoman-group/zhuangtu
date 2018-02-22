<?php

use Phpmig\Migration\Migration;

class AddColumnToWorker extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_worker ADD  COLUMN ( shopid int(11));";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_worker drop COLUMN shopid;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
