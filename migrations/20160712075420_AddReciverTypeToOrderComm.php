<?php

use Phpmig\Migration\Migration;

class AddReciverTypeToOrderComm extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `zhuangtu`.`zt_order_common` ADD COLUMN `reciver_type` INT(1) NULL DEFAULT 0 COMMENT '收货类型:0-商家发货,1-买家自提' AFTER `promotion_info`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "alter table `zhuangtu`.`zt_order_common` drop column `reciver_type`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
