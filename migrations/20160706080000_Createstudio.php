<?php

use Phpmig\Migration\Migration;

class Createstudio extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
       $sql="CREATE TABLE IF NOT EXISTS `zt_studio` (
                  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
                  `step` int(5) NOT NULL COMMENT '阶段标志',
                  `userid` int(5) NOT NULL COMMENT '用户ID',
                  `publishid` int(5) NOT NULL COMMENT '发布者ID',
                  `struction_content` text NOT NULL COMMENT '施工内容',
                  `alert_release` text NOT NULL COMMENT '提醒发布',
                  `comm_release` text NOT NULL COMMENT '普通发布',
                  `picture` varchar(255) NOT NULL COMMENT '发布图片',
                  `customer_like` int(1) NOT NULL COMMENT '消费者是否点赞',
                  `seller_like` int(1) NOT NULL COMMENT '卖家是否点赞',
                  `addtime` int(11) NOT NULL COMMENT '添加时间',
                   `order_sn` int(32) NOT NULL COMMENT '订单号',
                   PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '直播间';";
         $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP table zt_studio;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
