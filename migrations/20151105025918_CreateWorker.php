<?php

use Phpmig\Migration\Migration;

class CreateWorker extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE table `zt_worker`(
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `uid` int(11) DEFAULT '0',
                `title` varchar(255) DEFAULT '',
                `workername` varchar(64) DEFAULT '',
                `crafttype` int(1) DEFAULT 0 COMMENT '工种',
                `addtime` int(11) DEFAULT '0',
                `isdelete` tinyint(1) DEFAULT '0',    
                `workyears` varchar(64) DEFAULT '' COMMENT '从业年限',
                `hometown` varchar(255) DEFAULT '' COMMENT '籍贯',
                `phone` varchar(24) DEFAULT '',
                `selfevalu` varchar(255) DEFAULT '' COMMENT '自我评价',
                `case` varchar(255) DEFAULT '' COMMENT '案例',
                `pay_mode` varchar(255) DEFAULT '' COMMENT '付款模式',
                `type` varchar(255) DEFAULT '' COMMENT '宝贝规格',
                `picture` varchar(2550) DEFAULT '',
                `headpic` varchar(255) DEFAULT '',
                `show` text,
                `video` varchar(255) DEFAULT '',
                `updatetime` int(11) DEFAULT '0',
                `status` smallint(4) DEFAULT '0',
                `listorder` int(11) DEFAULT '0',
                `weight` int(11) DEFAULT '0',
                `is_member_discount` tinyint(1) DEFAULT '0',
                `stock_type` smallint(4) DEFAULT '1',
                `is_showcase` tinyint(1) DEFAULT '0',
                `expiry_date` tinyint(1) DEFAULT '0',
                `starttime_type` tinyint(1) DEFAULT '1',
                `starttime` varchar(16) DEFAULT NULL,
                `deletetime` int(11) DEFAULT NULL,
                `auditstatus` tinyint(1) DEFAULT NULL,
                `ill_reason` varchar(255) DEFAULT NULL,
                `audittime` int(11) DEFAULT NULL,
                `auditid` int(11) DEFAULT NULL,
                PRIMARY KEY (`id`)
                )ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE IF EXISTS `zt_worker`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
