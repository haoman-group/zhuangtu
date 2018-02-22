<?php

use Phpmig\Migration\Migration;

class ModifyOrderLogRole extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `zhuangtu`.`zt_order_log` CHANGE COLUMN `log_role` `log_role` CHAR(6) NOT NULL COMMENT '操作角色' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `zhuangtu`.`zt_order_log` CHANGE COLUMN `log_role` `log_role` CHAR(2) NOT NULL COMMENT '操作角色' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
