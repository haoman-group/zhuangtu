<?php

use Phpmig\Migration\Migration;

class AddThumbToShopTemplate extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_shop_template add  COLUMN( `thumb` varchar(255) default '')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_shop_template DROP COLUMN thumb";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
