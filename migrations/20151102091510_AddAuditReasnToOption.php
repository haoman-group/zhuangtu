<?php

use Phpmig\Migration\Migration;

class AddAuditReasnToOption extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO zt_option (name,title) value ('audit_reason','违规原因');
                INSERT INTO `zt_option_field` VALUES (61,'audit_reason','图片与描述不符合','图片与描述不符合',0,1),
                (62,'audit_reason','价格错误','价格错误',0,1),
                (63,'audit_reason','标题错误','标题错误',0,1),
                (64,'audit_reason','自定义','自定义',0,1);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_option where name='audit_reason';
                delete from zt_option_field where name='audit_reason';";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
