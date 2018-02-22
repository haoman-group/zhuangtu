<?php

use Phpmig\Migration\Migration;

class AddColumnToShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shop ADD COLUMN headpic varchar(255) DEFAULT '',ADD COLUMN introduce varchar(2550) DEFAULT '';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shop drop COLUMN headpic,introduce;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
