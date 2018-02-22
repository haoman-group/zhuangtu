<?php

use Phpmig\Migration\Migration;

class AddTitleToPositionData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_position_data ADD COLUMN title varchar(255) default '', ADD COLUMN description varchar(255) default '', ADD COLUMN picture varchar(2550) default '';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_position_data drop COLUMN title,description,picture;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
