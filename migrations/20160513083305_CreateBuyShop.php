<?php

use Phpmig\Migration\Migration;

class CreateBuyShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `zt_buyshop` (
   `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'id',
   `uid` int(5) NOT NULL COMMENT '用户',
   `shopid` int(11) NOT NULL COMMENT '店铺id',
   `addtime` int(25) NOT NULL COMMENT '添加时间',
   `isdetele` int(2) NOT NULL COMMENT '是否删除',
    PRIMARY KEY (`id`))
     ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='购买过的店铺' AUTO_INCREMENT=17 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="DROP TABLE `zt_buyshop`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
