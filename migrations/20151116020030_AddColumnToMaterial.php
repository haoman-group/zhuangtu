<?php

use Phpmig\Migration\Migration;

class AddColumnToMaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_material ADD  COLUMN ( shopid int(11),
                                                    proptype int(11) DEFAULT '0' COMMENT '产品类目');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_material drop COLUMN shopid;
                ALTER TABLE zt_material drop COLUMN proptype;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
