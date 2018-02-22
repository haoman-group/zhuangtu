<?php

use Phpmig\Migration\Migration;

class ModifyTableName extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter table zt_product rename zt_product_delete;alter table zt_material rename zt_product;";
        // $sql = "DROP table zt_product;DROP table zt_worker;"
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table zt_product rename zt_material;alter table zt_product_delete rename zt_product;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
