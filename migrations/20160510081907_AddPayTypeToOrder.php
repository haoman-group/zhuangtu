<?php

use Phpmig\Migration\Migration;

class AddPayTypeToOrder extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_order` ADD `pay_type` INT(1) default 0 COMMENT ''";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_order` DROP `pay_type`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
