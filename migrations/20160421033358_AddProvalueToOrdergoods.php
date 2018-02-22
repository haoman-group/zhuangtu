<?php

use Phpmig\Migration\Migration;

class AddProvalueToOrdergoods extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_order_goods add  COLUMN provalue varchar(255) default '' COMMENT '商品属性'";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_order_goods drop  COLUMN provalue;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
