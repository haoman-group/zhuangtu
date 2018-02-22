<?php

use Phpmig\Migration\Migration;

class CreateActivityData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
CREATE TABLE IF NOT EXISTS `zt_activity_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模型',
  `modelid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '模型ID',
  `thumb` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否有缩略图',
  `data` mediumtext COMMENT '数据信息',
  `listorder` mediumint(8) NOT NULL DEFAULT '0' COMMENT '排序',
  `expiration` int(10) NOT NULL,
  `extention` char(30) NOT NULL DEFAULT '',
  `synedit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否同步编辑',
  `starttime` datetime DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `picture` varchar(2550) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `place` smallint(4) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `dataid` int(11) DEFAULT '0',
  `min_price` decimal(10,2) NOT NULL COMMENT '价格最小值',
  `max_price` decimal(10,2) NOT NULL COMMENT '价格最大值',
  `act_id` int(11) NOT NULL COMMENT '活动id',
  PRIMARY KEY (`id`),
  KEY `listorder` (`listorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='活动数据表';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table zt_activity_data;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
