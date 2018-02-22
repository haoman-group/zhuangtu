<?php

use Phpmig\Migration\Migration;

class AddWorkerToProduct extends Migration
{

    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_product add  COLUMN(
        `workername` varchar(64) DEFAULT '' COMMENT '工人-姓名',
        `crafttype` int(1) DEFAULT '0' COMMENT '工人-工种',
        `workyears` varchar(64) DEFAULT '' COMMENT '工人-从业年限',
        `hometown` varchar(255) DEFAULT '' COMMENT '工人-籍贯',
        `phone` varchar(24) DEFAULT '' COMMENT '工人-联系电话',
        `selfevalu` varchar(255) DEFAULT '' COMMENT '工人-自我评价',
        `case` varchar(255) DEFAULT '' COMMENT '工人-案例'
        );";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product drop  COLUMN  `shopid`;
        ALTER TABLE zt_material drop  COLUMN  `workername`;
        ALTER TABLE zt_material drop  COLUMN  `crafttype`;
        ALTER TABLE zt_material drop  COLUMN  `workyears`;
        ALTER TABLE zt_material drop  COLUMN  `hometown`;
        ALTER TABLE zt_material drop  COLUMN  `phone`;
        ALTER TABLE zt_material drop  COLUMN  `selfevalu`;
        ALTER TABLE zt_material drop  COLUMN  `case`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
