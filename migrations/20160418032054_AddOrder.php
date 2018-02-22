<?php

use Phpmig\Migration\Migration;

class AddOrder extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
            DROP table zt_order;
            CREATE TABLE `zt_order` (
              `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单索引id',
              `order_sn` bigint(20) unsigned NOT NULL COMMENT '订单编号',
              `pay_sn` bigint(20) unsigned NOT NULL COMMENT '支付单号',
              `shop_id` int(11) unsigned NOT NULL COMMENT '卖家店铺id',
              `shop_name` varchar(50) NOT NULL DEFAULT '' COMMENT '卖家店铺名称',
              `buyer_id` int(11) unsigned NOT NULL COMMENT '买家id',
              `buyer_name` varchar(50) NOT NULL COMMENT '买家姓名',
              `buyer_email` varchar(80) NOT NULL COMMENT '买家电子邮箱',
              `addtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单生成时间',
              `payment_code` char(10) NOT NULL DEFAULT '' COMMENT '支付方式名称代码',
              `payment_time` int(10) unsigned DEFAULT '0' COMMENT '支付(付款)时间',
              `finnshed_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单完成时间',
              `goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '商品总价格',
              `order_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '订单总价格',
              `shipping_fee` decimal(10,2) unsigned DEFAULT '0.00' COMMENT '运费',
              `evaluation_state` tinyint(4) DEFAULT '0' COMMENT '评价状态 0未评价，1已评价，2已过期未评价',
              `order_state` tinyint(4) NOT NULL DEFAULT '10' COMMENT '订单状态：0(已取消)10(默认):未付款;20:已付款;30:已发货;40:已收货;',
              `refund_state` tinyint(1) unsigned DEFAULT '0' COMMENT '退款状态:0是无退款,1是部分退款,2是全部退款',
              `lock_state` tinyint(1) unsigned DEFAULT '0' COMMENT '锁定状态:0是正常,大于0是锁定,默认是0',
              `delete_state` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除状态0未删除1放入回收站2彻底删除',
              `refund_amount` decimal(10,2) DEFAULT '0.00' COMMENT '退款金额',
              `delay_time` int(10) unsigned DEFAULT '0' COMMENT '延迟时间,默认为0',
              `order_from` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1WEB2mobile',
              `shipping_code` varchar(50) DEFAULT '' COMMENT '物流单号',
              PRIMARY KEY (`order_id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';
        CREATE TABLE `zt_order_common` (
          `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单索引id',
          `shop_id` int(10) unsigned NOT NULL COMMENT '店铺ID',
          `shipping_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配送时间',
          `shipping_express_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '配送公司ID',
          `evaluation_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评价时间',
          `evalseller_state` enum('0','1') NOT NULL DEFAULT '0' COMMENT '卖家是否已评价买家',
          `evalseller_time` int(10) unsigned NOT NULL COMMENT '卖家评价买家的时间',
          `order_message` varchar(300) DEFAULT NULL COMMENT '订单留言',
          `order_pointscount` int(11) NOT NULL DEFAULT '0' COMMENT '订单赠送积分',
          `voucher_price` int(11) DEFAULT NULL COMMENT '代金券面额',
          `voucher_code` varchar(32) DEFAULT NULL COMMENT '代金券编码',
          `deliver_explain` text COMMENT '发货备注',
          `daddress_id` mediumint(9) NOT NULL DEFAULT '0' COMMENT '发货地址ID',
          `reciver_name` varchar(50) NOT NULL COMMENT '收货人姓名',
          `reciver_info` varchar(500) NOT NULL COMMENT '收货人其它信息',
          `reciver_province_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收货人省级ID',
          `reciver_city_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '收货人市级ID',
          `invoice_info` varchar(500) DEFAULT '' COMMENT '发票信息',
          `promotion_info` varchar(500) DEFAULT '' COMMENT '促销信息备注',
          PRIMARY KEY (`order_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单信息扩展表';
        CREATE TABLE `zt_order_goods` (
          `rec_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单商品表索引id',
          `order_id` int(11) NOT NULL COMMENT '订单id',
          `goods_id` int(11) NOT NULL COMMENT '商品id',
          `goods_name` varchar(50) NOT NULL COMMENT '商品名称',
          `goods_price` decimal(10,2) NOT NULL COMMENT '商品价格',
          `goods_num` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT '商品数量',
          `goods_image` varchar(100) DEFAULT NULL COMMENT '商品图片',
          `goods_pay_price` decimal(10,2) unsigned NOT NULL COMMENT '商品实际成交价',
          `store_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '店铺ID',
          `buyer_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '买家ID',
          `goods_type` enum('1','2','3','4','5') NOT NULL DEFAULT '1' COMMENT '1默认2团购商品3限时折扣商品4组合套装5赠品',
          `snapshot` mediumtext COMMENT '交易快照',
          PRIMARY KEY (`rec_id`),
          KEY `order_id` (`order_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单商品表';

        ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table zt_order;drop table zt_order_common;drop table zt_order_goods;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
