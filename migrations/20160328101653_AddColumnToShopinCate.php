<?php

use Phpmig\Migration\Migration;

class AddColumnToShopinCate extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_shopin_category add  COLUMN( `products` varchar(500) COMMENT '分类所含宝贝')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_shopin_category drop  COLUMN  `products`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
