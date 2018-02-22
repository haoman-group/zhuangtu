<?php

use Phpmig\Migration\Migration;

class AddIdcardToAuditQualification extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_audit_qualification ADD idcard varchar(20)";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_audit_qualification DROP COLUMN idcard";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
