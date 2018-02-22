<?php

use Phpmig\Migration\Migration;

class AddRegPlatformToMember extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_member ADD COLUMN (`reg_platform` varchar(50) DEFAULT '' COMMENT '注册平台');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER table zt_member drop column reg_platform;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
