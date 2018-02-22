<?php

use Phpmig\Migration\Migration;

class AddCommentShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="
            CREATE TABLE `zt_comment_shop` (
          `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价ID',
          `order_id` int(11) unsigned NOT NULL COMMENT '订单ID',
          `order_sn` varchar(100) NOT NULL COMMENT '订单编号',
          `addtime` int(11) unsigned NOT NULL COMMENT '评价时间',
          `shop_id` int(11) unsigned NOT NULL COMMENT '店铺编号',
          `shop_name` varchar(100) NOT NULL COMMENT '店铺名称',
          `userid` int(11) unsigned NOT NULL COMMENT '买家编号',
          `username` varchar(100) NOT NULL COMMENT '买家名称',
          `desccredit` tinyint(1) unsigned NOT NULL DEFAULT '5' COMMENT '描述相符评分',
          `servicecredit` tinyint(1) unsigned NOT NULL DEFAULT '5' COMMENT '服务态度评分',
          `deliverycredit` tinyint(1) unsigned NOT NULL DEFAULT '5' COMMENT '发货速度评分',
          PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店铺评分表';
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="DROP TABLE zt_comment_shop";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
