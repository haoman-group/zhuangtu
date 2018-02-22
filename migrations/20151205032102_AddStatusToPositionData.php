<?php

use Phpmig\Migration\Migration;

class AddStatusToPositionData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_position_data ADD COLUMN status  tinyint(1) default 1,ADD COLUMN dataid int(11) default 0;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_position_data DROP COLUMN status,DROP COLUMN dataid;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
