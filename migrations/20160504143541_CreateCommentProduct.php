<?php

use Phpmig\Migration\Migration;

class CreateCommentProduct extends Migration
{
    public function up()
    {
        $sql = "DROP TABLE zt_comments;
                CREATE TABLE `zt_comment_product` (
              `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价ID',
              `order_id` int(11) NOT NULL COMMENT '订单表自增ID',
              `order_sn` bigint(20) unsigned NOT NULL COMMENT '订单编号',
              `ordergoods_id` int(11) NOT NULL COMMENT '订单商品表编号',
              `product_id` int(11) NOT NULL COMMENT '商品表编号',
              `product_name` varchar(100) NOT NULL COMMENT '商品名称',
              `product_price` decimal(10,2) DEFAULT NULL COMMENT '商品价格',
              `product_image` varchar(255) DEFAULT NULL COMMENT '商品图片',
              `scores` tinyint(1) NOT NULL COMMENT '1-5分',
              `content` varchar(255) DEFAULT NULL COMMENT '信誉评价内容',
              `isanonymous` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0表示不是 1表示是匿名评价',
              `addtime` int(11) NOT NULL COMMENT '评价时间',
              `shop_id` int(11) NOT NULL COMMENT '店铺编号',
              `shop_name` varchar(100) NOT NULL COMMENT '店铺名称',
              `userid` int(11) NOT NULL COMMENT '评价人编号',
              `username` varchar(100) NOT NULL COMMENT '评价人名称',
              `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '评价信息的状态 0为正常 1为禁止显示',
              `remark` varchar(255) DEFAULT NULL COMMENT '管理员对评价的处理备注',
              `explain` varchar(255) DEFAULT NULL COMMENT '解释内容',
              `image` varchar(255) DEFAULT NULL COMMENT '晒单图片',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='信誉评价表';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "CREATE TABLE `zt_comments` (
              `id` bigint(20) NOT NULL COMMENT '评论ID',
              `userid` mediumint(8) NOT NULL COMMENT '评论作者',
              `productId` int(11) NOT NULL COMMENT '产品ID',
              `content` text NOT NULL COMMENT '评论内容',
              `addtime` datetime NOT NULL COMMENT '创建时间',
              `updatetime` datetime NOT NULL COMMENT '更新时间',
              `deletetime` datetime NOT NULL COMMENT '删除时间',
              `isdelete` int(1) NOT NULL COMMENT '是否删除',
              `ref_comment_id` bigint(20) NOT NULL COMMENT '引用评论的ID',
              `pictures` varchar(255) NOT NULL COMMENT '评论图片',
              `type` int(1) NOT NULL COMMENT '评论类型'
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品评论表';
            DROP TABLE zt_comment_product;
            ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
