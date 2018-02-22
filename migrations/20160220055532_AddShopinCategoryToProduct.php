<?php

use Phpmig\Migration\Migration;

class AddShopinCategoryToProduct extends Migration
{
    public function up()
    {
        $sql = "ALTER TABLE zt_product ADD COLUMN shopin_category int(11)   DEFAULT 0 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product drop COLUMN shopin_category;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
