<?php

use Phpmig\Migration\Migration;

class ModifyTypeOfProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter table zt_product change type type varchar(400);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table zt_product change type type varchar(255);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
