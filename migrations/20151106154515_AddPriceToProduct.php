<?php

use Phpmig\Migration\Migration;

class AddPriceToProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_worker ADD  COLUMN price float(10,2) default 0";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    { 
        $sql = "ALTER TABLE zt_worker drop  COLUMN price";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
