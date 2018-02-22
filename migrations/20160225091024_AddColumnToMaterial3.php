<?php

use Phpmig\Migration\Migration;

class AddColumnToMaterial3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_material ADD  COLUMN ( delivery varchar(32) DEFAULT '' COMMENT '送货服务',
                                                      setup varchar(32) DEFAULT '' COMMENT '安装服务');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_material drop COLUMN delivery;
                ALTER TABLE zt_material drop COLUMN setup;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
