<?php

use Phpmig\Migration\Migration;

class ModifyWorkerColumn extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_worker ADD  COLUMN ( min_price decimal(10,2),
                                                    max_price decimal(10,2));";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product drop COLUMN min_price;
                ALTER TABLE zt_product drop COLUMN max_price;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
