<?php

use Phpmig\Migration\Migration;

class ShopBlock extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
CREATE TABLE `zt_shop_block` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `shopid` int(11) DEFAULT '0',
  `type` enum('mall','slmr','srml') DEFAULT NULL,
  `setting` tinytext,
  `addtime` int(11) DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  `pageid` int(11) DEFAULT '0',
  `position` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_shop_block";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
