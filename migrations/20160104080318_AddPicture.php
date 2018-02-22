<?php

use Phpmig\Migration\Migration;

class AddPicture extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
            CREATE TABLE `zt_picture` (
          `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '附件ID',
          `module` char(15) NOT NULL DEFAULT '' COMMENT '模块名称',
          `catid` smallint(5) NOT NULL DEFAULT '0' COMMENT '分类ID',
          `filename` char(50) NOT NULL DEFAULT '' COMMENT '上传附件名称',
          `filepath` char(200) NOT NULL DEFAULT '' COMMENT '附件路径',
          `filesize` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '附件大小',
          `fileext` char(10) NOT NULL DEFAULT '' COMMENT '附件扩展名',
          `isimage` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为图片 1为图片',
          `isthumb` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否为缩略图 1为缩略图',
          `userid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上传用户ID',
          `isadmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否后台用户上传',
          `uploadtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
          `uploadip` char(15) NOT NULL DEFAULT '' COMMENT '上传ip',
          `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '附件使用状态',
          `authcode` char(32) NOT NULL DEFAULT '' COMMENT '附件路径MD5值',
          `isdelete` tinyint(1) DEFAULT '1',
          PRIMARY KEY (`id`),
          KEY `authcode` (`authcode`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片表';
            
        CREATE TABLE `zt_picture_category` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `name` varchar(255) DEFAULT '',
          `pid` int(11) DEFAULT '0',
          `addtime` int(11) DEFAULT '0',
          `listorder` int(11) DEFAULT '0',
          `userid` int(11) DEFAULT '0',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

        INSERT INTO `zt_module` (`module`, `modulename`, `sign`, `iscore`, `disabled`, `version`, `setting`, `installtime`, `updatetime`, `listorder`)
        VALUES
        ('Picture', '图片空间', '8ae5811be1a55b9b8447ad2dbdadbf6e', 0, 1, '1.0.1', '', 1451894770, 1451894770, 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_picture;DROP TABLE zt_picture_category;delete from zt_module where module='Picture'";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
