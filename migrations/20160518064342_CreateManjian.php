<?php

use Phpmig\Migration\Migration;

class CreateManjian extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
            CREATE TABLE `zt_p_manjian` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `title` varchar(255) DEFAULT '',
              `starttime` int(11) DEFAULT '0',
              `endtime` int(11) DEFAULT '0',
              `status` smallint(4) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            CREATE TABLE `zt_p_manjian_goods` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `manjian_id` int(11) DEFAULT '0',
              `goods_id` int(11) DEFAULT '0',
              `goods_title` varchar(255) DEFAULT '',
              `goods_image` varchar(255) DEFAULT '',
              `goods_price` float(10,2) DEFAULT '0.00',
              `addtime` int(11) DEFAULT '0',
              `orderlist` int(11) DEFAULT '0',
              `status` smallint(4) DEFAULT '1',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            CREATE TABLE `zt_p_manjian_rule` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `manjian_id` int(11) DEFAULT '0',
              `price` float(10,2) DEFAULT '0.00',
              `number` int(11) DEFAULT '0',
              `discount` float(10,2) DEFAULT '0.00',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_p_manjian;DROP TABLE zt_p_manjian_goods;DROP TABLE zt_p_manjian_rule;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
