<?php

use Phpmig\Migration\Migration;

class AddTimeToShopincategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shopin_category ADD  COLUMN ( addtime int(10)  DEFAULT 0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shopin_category drop COLUMN addtime;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
