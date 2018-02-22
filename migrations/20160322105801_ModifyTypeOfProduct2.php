<?php

use Phpmig\Migration\Migration;

class ModifyTypeOfProduct2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter table zt_product change service_promise service_promise varchar(400);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table zt_product change service_promise service_promise varchar(64);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
