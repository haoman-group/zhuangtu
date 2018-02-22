<?php

use Phpmig\Migration\Migration;

class ModifyServiceIMOrderID extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `zt_serviceim_message` ADD COLUMN `order_sn` BIGINT(20) DEFAULT NULL COMMENT 'order_sn';";

        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `zt_serviceim_message` DROP `order_sn`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
