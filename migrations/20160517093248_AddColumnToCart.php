<?php

use Phpmig\Migration\Migration;

class AddColumnToCart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_cart` ADD `act_id` INT(11) default 0 COMMENT '活动id';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_cart` DROP `act_id`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
