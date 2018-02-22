<?php

use Phpmig\Migration\Migration;

class ModifySellerAddr2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_seller_addr add  COLUMN zone varchar(255) default '' COMMENT '收货地区(汉字)';
              ALTER TABLE zt_seller_addr add  COLUMN area1 varchar(12) default '' COMMENT '收货地区省份';
              ALTER TABLE zt_seller_addr add  COLUMN area2 varchar(12) default '' COMMENT '收货地区市区';
              ALTER TABLE zt_seller_addr add  COLUMN area3 varchar(12) default '' COMMENT '收货地区区县';";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_seller_addr drop  COLUMN zone;
              ALTER TABLE zt_seller_addr drop  COLUMN area1;
              ALTER TABLE zt_seller_addr drop  COLUMN area2;
              ALTER TABLE zt_seller_addr drop  COLUMN area3;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
