<?php

use Phpmig\Migration\Migration;

class AddRegistrationidToMember extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_member ADD COLUMN (`registration_id` varchar(50) DEFAULT '' COMMENT 'jpush的');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER table zt_member drop column registration_id;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
