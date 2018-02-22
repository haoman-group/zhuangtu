<?php

use Phpmig\Migration\Migration;

class AddColumnToPosition extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_position ADD COLUMN model varchar(255) DEFAULT '',ADD COLUMN field varchar(255) DEFAULT '',ADD COLUMN primarykey varchar(255) DEFAULT '';";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_position drop COLUMN model,field,primarykey;";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }
}
