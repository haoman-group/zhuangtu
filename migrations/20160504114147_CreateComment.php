<?php

use Phpmig\Migration\Migration;

class CreateComment extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `zt_comments` (
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
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '产品评论表';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP table zt_comments;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
