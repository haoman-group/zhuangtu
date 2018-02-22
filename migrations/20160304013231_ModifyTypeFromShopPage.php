<?php

use Phpmig\Migration\Migration;

class ModifyTypeFromShopPage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shop_page modify  COLUMN  `type` enum('home','lists','show','diy');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shop_page modify  COLUMN  `type` enum('home','lists','show');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
