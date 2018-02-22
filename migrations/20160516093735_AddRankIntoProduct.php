<?php

use Phpmig\Migration\Migration;

class AddRankIntoProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter table zt_product add column rank smallint default 0;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table zt_product drop column rank;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
