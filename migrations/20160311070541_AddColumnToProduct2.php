<?php

use Phpmig\Migration\Migration;

class AddColumnToProduct2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_product add  COLUMN( `agreement` int(2) NOT NULL COMMENT '合同',`details` varchar(255) NOT NULL COMMENT '地址详情')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_product drop  COLUMN  `agreement`;ALTER TABLE zt_product drop  COLUMN  `details`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
