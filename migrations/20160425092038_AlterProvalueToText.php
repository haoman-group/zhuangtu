<?php

use Phpmig\Migration\Migration;

class AlterProvalueToText extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_order_goods change  COLUMN provalue provalue text default '' ;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_order_goods change  COLUMN provalue provalue varchar(255) default '' ;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
