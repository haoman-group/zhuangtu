<?php

use Phpmig\Migration\Migration;

class InsertToPositionPage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "insert into zt_position_page value(1,'网购设计首页',0);
                update zt_position set pageid=1 where posid=2";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_position_page where id=1;
        update zt_position set pageid=0 where posid=2";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
