<?php

use Phpmig\Migration\Migration;

class CreateShopCart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
CREATE TABLE IF NOT EXISTS `zt_shop_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `product_id` int(11)  COMMENT '产品ID',
  `cate` int(11) COMMENT '产品类型',
  `count` int(11)  COMMENT '产品数量',
  `shop_id` int(11)  COMMENT '店铺ID',
  `color_type` int(11)  COMMENT '颜色分类',
  `type` int(11)  COMMENT '分类',
  `add_time` varchar(16)  COMMENT '添加时间',
  `price` varchar(12)  COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table zt_shop_cart;";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }
}
