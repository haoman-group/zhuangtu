<?php

use Phpmig\Migration\Migration;

class Update extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="alter table zt_collection change column is_detele isdelete int(2) DEFAULT '0'";
     $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="alter table zt_collection change column isdelete  is_detele  int(2) DEFAULT '0'";
     $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
