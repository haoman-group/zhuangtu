<?php

use Phpmig\Migration\Migration;

class DeleCollection extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
          $sql="alter table zt_collection drop  column  shopid ";
     $container = $this->getContainer();
        $container['db']->query($sql); 

    }

    /**
     * Undo the migration
     */
    public function down()
    {
      $sql="alter table zt_collection add shopid INT(10)";
      $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
