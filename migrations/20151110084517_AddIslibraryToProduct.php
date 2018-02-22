<?php

use Phpmig\Migration\Migration;

class AddIslibraryToProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "alter table zt_product add column is_library tinyint(1) default 0;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "alter table zt_product drop column is_library;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
