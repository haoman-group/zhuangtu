<?php

use Phpmig\Migration\Migration;

class AddDomainToShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shop ADD COLUMN domain varchar(255);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shop drop COLUMN domain;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
