<?php

use Phpmig\Migration\Migration;

class AddBuyerToMember extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_member ADD COLUMN isbuyer tinyint(1)   DEFAULT 0 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_member drop COLUMN isbuyer;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
