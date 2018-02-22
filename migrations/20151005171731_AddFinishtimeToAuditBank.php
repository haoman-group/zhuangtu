<?php

use Phpmig\Migration\Migration;

class AddFinishtimeToAuditBank extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_audit_bank ADD finishtime int default 0";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_audit_bank DROP COLUMN finishtime";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
