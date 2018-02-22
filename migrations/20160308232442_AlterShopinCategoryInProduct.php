<?php

use Phpmig\Migration\Migration;

class AlterShopinCategoryInProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_product modify  COLUMN  `shopin_category` varchar(255) default '';";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product modify  COLUMN  `shopin_category` int(11);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
