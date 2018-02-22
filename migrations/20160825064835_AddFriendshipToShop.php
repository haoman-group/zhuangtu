<?php

use Phpmig\Migration\Migration;

class AddFriendshipToShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_shop` ADD `friendship` VARCHAR(100) DEFAULT '' COMMENT '商铺POS机情况,活动配合度' AFTER `rank`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_shop` DROP `friendship`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
