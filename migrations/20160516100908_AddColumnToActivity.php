<?php

use Phpmig\Migration\Migration;

class AddColumnToActivity extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_activity` ADD `maxnum` INT(11) default 0 COMMENT '活动最大产品数';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_activity` DROP `maxnum`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
