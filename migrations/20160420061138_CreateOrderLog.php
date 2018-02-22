<?php

use Phpmig\Migration\Migration;

class CreateOrderLog extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
            CREATE TABLE `zt_order_log` (
              `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
              `order_id` int(11) NOT NULL COMMENT '订单id',
              `log_msg` varchar(150) DEFAULT '' COMMENT '文字描述',
              `log_time` int(10) unsigned NOT NULL COMMENT '处理时间',
              `log_role` char(2) NOT NULL COMMENT '操作角色',
              `log_user` varchar(30) DEFAULT '' COMMENT '操作人',
              `log_orderstate` enum('0','10','20','30','40') DEFAULT NULL COMMENT '订单状态：0(已取消)10:未付款;20:已付款;30:已发货;40:已收货;',
              PRIMARY KEY (`log_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单处理历史表';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_order_log";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
