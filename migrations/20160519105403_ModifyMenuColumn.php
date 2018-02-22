<?php

use Phpmig\Migration\Migration;

class ModifyMenuColumn extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE `zhuangtu`.`zt_menu` SET `name` = '结果导入' , `action`='import' WHERE `zt_menu`.`id` = 172;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE `zhuangtu`.`zt_menu` SET `name` = '打款' , `action`='bank_status' WHERE `zt_menu`.`id` = 172;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
