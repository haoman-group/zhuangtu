<?php

use Phpmig\Migration\Migration;

class InsertToPositionPage2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "insert into zt_position_page value(2,'网购轻工首页',0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_position_page where id=2;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
