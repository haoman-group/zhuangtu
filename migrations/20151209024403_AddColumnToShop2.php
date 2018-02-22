<?php

use Phpmig\Migration\Migration;

class AddColumnToShop2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shop ADD COLUMN logo varchar(255) DEFAULT '',
                                    ADD COLUMN addr varchar(255) DEFAULT '',
                                    ADD COLUMN goodsfrom varchar(12) DEFAULT '' COMMENT '主要货源',
                                    ADD COLUMN detail text DEFAULT '' COMMENT '详细介绍';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shop drop COLUMN logo;
                ALTER TABLE zt_shop drop COLUMN addr;
                ALTER TABLE zt_shop drop COLUMN goodsfrom;
                ALTER TABLE zt_shop drop COLUMN detail;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
