<?php

use Phpmig\Migration\Migration;

class AddPlaceToPositiondata extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_position_data ADD  COLUMN place  smallint(4) default 0;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_position_data drop COLUMN place;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
