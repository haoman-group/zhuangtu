<?php

use Phpmig\Migration\Migration;

class ModifyShopFriendship extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_shop` MODIFY column `friendship` int(11) DEFAULT 0 COMMENT '商铺活动配合度'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_shop` MODIFY column `friendship` varchar(100) default '' COMMENT '商铺POS机情况,活动配合度';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
