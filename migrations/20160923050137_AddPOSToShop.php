<?php

use Phpmig\Migration\Migration;

class AddPOSToShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_shop` ADD `POS` int(11) DEFAULT 0 COMMENT '商铺POS机情况' AFTER `friendship`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_shop` DROP `POS`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
