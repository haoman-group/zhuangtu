<?php

use Phpmig\Migration\Migration;

class AddTermidToOrder extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_order` ADD `termid` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'POS机终端号' ;";

        $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {

        $sql="ALTER TABLE `zt_order` DROP `termid`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}