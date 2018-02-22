<?php

use Phpmig\Migration\Migration;

class AddCountToProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_product add  COLUMN(count_sold int(10) default 0 COMMENT '销售量',count_collected int(10) default 0 COMMENT '收藏量',count_comment int(10) default 0 COMMENT '评价数')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_product drop  COLUMN count_sold,count_collected,count_comment;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
