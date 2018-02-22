<?php

use Phpmig\Migration\Migration;

class CreateProductAduitLog extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_product_audit_log` (
                    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                    `productid` int(11) DEFAULT '0',
                    `shopid` varchar(255) DEFAULT '',
                    `snapshot` text,
                    `reason` varchar(255) DEFAULT '',
                    `addtime` int(11) DEFAULT '0',
                    `adminid` int(11) DEFAULT '0',
                    `status` int(11) DEFAULT '0',
                     PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table zt_product_audit_log;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
