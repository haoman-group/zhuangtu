<?php

use Phpmig\Migration\Migration;

class AddPrictActToProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_product add  COLUMN(min_price_ori decimal(10,2) DEFAULT NULL COMMENT '活动最低价',max_price_ori decimal(10,2) DEFAULT NULL COMMENT '活动最高价')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_product drop  COLUMN  `min_price_ori`;ALTER TABLE zt_product drop  COLUMN  `max_price_ori`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
