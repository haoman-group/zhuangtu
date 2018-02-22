<?php

use Phpmig\Migration\Migration;

class CreateShopModule extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
CREATE TABLE `zt_shop_module` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pageid` int(11) DEFAULT '0',
  `blockid` int(11) DEFAULT '0',
  `compid` int(11) DEFAULT '0',
  `wtype` varchar(255) DEFAULT '',
  `side` enum('sub','main') DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `addtime` int(11) DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  `setting` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_shop_module";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
