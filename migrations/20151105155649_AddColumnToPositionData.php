<?php

use Phpmig\Migration\Migration;

class AddColumnToPositionData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_position_data ADD COLUMN starttime datetime,ADD COLUMN endtime datetime;";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_position_data drop COLUMN starttime,endtime;";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }
}
