<?php

use Phpmig\Migration\Migration;

class AddTokenToMember extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_member ADD COLUMN token varchar(255)   DEFAULT '' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_member drop COLUMN token;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
