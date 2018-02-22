<?php

use Phpmig\Migration\Migration;

class AddUrlToPositionData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_position_data ADD COLUMN url varchar(255) default '';";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_position_data DROP COLUMN url;";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }
}
