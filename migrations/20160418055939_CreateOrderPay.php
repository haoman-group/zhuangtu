<?php

use Phpmig\Migration\Migration;

class CreateOrderPay extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_order_pay` (
              `pay_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `pay_sn` bigint(20) unsigned NOT NULL COMMENT '支付单号',
              `buyer_id` int(10) unsigned NOT NULL COMMENT '买家ID',
              `api_pay_state` enum('0','1') DEFAULT '0' COMMENT '0默认未支付1已支付(只有第三方支付接口通知到时才会更改此状态)',
              PRIMARY KEY (`pay_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单支付表';";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_order_pay";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
