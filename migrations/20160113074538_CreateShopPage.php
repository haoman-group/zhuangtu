<?php

use Phpmig\Migration\Migration;

class CreateShopPage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
CREATE TABLE `zt_shop_page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `type` enum('home','lists','show') DEFAULT NULL,
  `setting` tinytext,
  `addtime` int(11) DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  `shopid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert into 
zt_shop_page(uid,shopid,`type`,addtime,updatetime)
select uid,id as shopid,'home',unix_timestamp(now()),unix_timestamp(now()) 
from zt_shop;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_shop_page";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
