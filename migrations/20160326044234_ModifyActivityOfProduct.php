<?php

use Phpmig\Migration\Migration;

class ModifyActivityOfProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter table zt_product change activity activity varchar(128);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table zt_product change activity activity varchar(32);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
