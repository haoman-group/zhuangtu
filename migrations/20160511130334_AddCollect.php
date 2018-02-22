<?php

use Phpmig\Migration\Migration;

class AddCollect extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_collection` ADD COLUMN  `type` INT(2) NOT NULL";

        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_collection` DROP `type`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
