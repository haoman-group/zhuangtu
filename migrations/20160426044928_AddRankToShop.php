<?php

use Phpmig\Migration\Migration;

class AddRankToShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_shop add  COLUMN (rank int(11) default '0' COMMENT '搜索排名权重',phone varchar(32) default '' COMMENT '联系电话');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_shop drop  COLUMN rank;ALTER TABLE zt_shop drop  COLUMN phone;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
