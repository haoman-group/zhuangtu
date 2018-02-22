<?php

use Phpmig\Migration\Migration;

class CreateRefundTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="CREATE TABLE `zhuangtu`.`zt_order_refund` (
              `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `received` INT(1) DEFAULT NULL COMMENT '是否收到货物：０－已经收到，１－没有收到',
              `addtime` INT(11) DEFAULT NULL  COMMENT '退款时间',
              `explain` VARCHAR(450) DEFAULT NULL  DEFAULT '退款说明',
              `reason` VARCHAR(45) DEFAULT NULL  COMMENT '退款原因',
              PRIMARY KEY (`order_id`)
              )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql='DROP TABLE zt_order_refund;';
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
