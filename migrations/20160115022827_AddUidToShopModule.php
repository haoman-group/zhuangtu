<?php

use Phpmig\Migration\Migration;

class AddUidToShopModule extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shop_module ADD COLUMN uid int(11)   DEFAULT 0 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shop_module drop COLUMN uid;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
