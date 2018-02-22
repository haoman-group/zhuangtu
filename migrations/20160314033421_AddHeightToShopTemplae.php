<?php

use Phpmig\Migration\Migration;

class AddHeightToShopTemplae extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_shop_template add  COLUMN( `height` float(10,2) default 0)";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_shop_template DROP  COLUMN height";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
