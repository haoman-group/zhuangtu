<?php

use Phpmig\Migration\Migration;

class AddBirthdayToMember extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_member ADD  COLUMN ( birthday varchar(32)  DEFAULT '' COMMENT '生日',
                                                    truename varchar(255) DEFAULT '' COMMENT '真实姓名',
                                                    locality varchar(255) DEFAULT '' COMMENT '所在地');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {

        $sql = "ALTER TABLE zt_member drop COLUMN birthday;
                ALTER TABLE zt_member drop COLUMN truename;
                ALTER TABLE zt_member drop COLUMN locality;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
