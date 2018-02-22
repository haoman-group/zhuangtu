<?php

use Phpmig\Migration\Migration;

class Createstudiocomment extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `zt_studio_comment` (
                  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID',
                  `studioid` int(5) NOT NULL COMMENT '直播间ID',
                  `content` text NOT NULL COMMENT '评论内容',
                  `addtime` int(11) NOT NULL COMMENT '添加时间',
                  `is_buyer` text NOT NULL COMMENT '0为卖家,1为买家',
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '产品评论表';";
          $container = $this->getContainer();
          $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql = "DROP table zt_studio_comment;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
