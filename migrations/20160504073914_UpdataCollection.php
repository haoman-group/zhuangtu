<?php

use Phpmig\Migration\Migration;

class UpdataCollection extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
         $sql="alter table zt_collection change column productid itemid int(10) DEFAULT '0'";
     $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="alter table zt_collection change column itemid productid int(10) DEFAULT '0'";    
   $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
