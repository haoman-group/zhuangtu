<?php

use Phpmig\Migration\Migration;

class CreateDesignlibCommit extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `zt_designlib_commit` (
      `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
      `itemid` int(10) NOT NULL COMMENT '产品id',
      `userid` int(10) NOT NULL COMMENT '用户ID',
      `content` text CHARACTER SET utf8 NOT NULL COMMENT '评论内容',
      `addtime` int(11) NOT NULL COMMENT '添加时间',
      `is_delete` int(1) NOT NULL COMMENT '0为正常,1为伪删除',
       `type` int(1) NOT NULL COMMENT '1为产品,2为店铺',
       PRIMARY KEY (`id`)
     )ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '设计库详情评论';";
          $container = $this->getContainer();
          $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP table zt_designlib_commit;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
