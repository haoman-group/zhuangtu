<?php

use Phpmig\Migration\Migration;

class CreateztDesignlibLike extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `zt_designlib_like` (
            `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
            `itemid` int(10) NOT NULL COMMENT '产品ID',
            `userid` int(10) NOT NULL COMMENT '用户ID',
            `addtime` int(11) NOT NULL COMMENT '添加时间',
            `type` int(1) NOT NULL COMMENT '1代表产品,2表示店铺',
             PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '喜欢他的数据库';";

       $container = $this->getContainer();
       $container['db']->query($sql);
      }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP table zt_designlib_like;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
