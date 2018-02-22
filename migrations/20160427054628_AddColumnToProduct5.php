<?php

use Phpmig\Migration\Migration;

class AddColumnToProduct5 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_product add  COLUMN(case_price decimal(10,2) default 0 COMMENT '案例设计费',
                                                 case_name varchar(255)   default '' COMMENT '案例名称',
                                                 design_company varchar(255) default '' COMMENT '设计公司',
                                                 single_effect varchar(255) default '' COMMENT '单空间效果图',
                                                 solution varchar(255) default '' COMMENT '全屋软装解决方案',
                                                 age varchar(12) default '' COMMENT '工人年龄',
                                                 experience varchar(255) default '' COMMENT '工人经验',
                                                 price_sys varchar(255) default '' COMMENT '工人价格体系'
                                                 );";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_product drop  COLUMN case_price,case_name,design_company,single_effect,solution,age,experience,price_sys;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
