<?php

use Phpmig\Migration\Migration;

class CreateHistory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="CREATE TABLE IF NOT EXISTS `zt_member_data_history` (
    `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(255) DEFAULT '',
  `bank_card_number` varchar(255) DEFAULT '',
  `bank` varchar(255) DEFAULT '',
  `idcard` varchar(255) DEFAULT '',
  `bank_audit` tinyint(1) DEFAULT '0',
  `company_name` varchar(255) DEFAULT '',
  `business_licence_number` varchar(255) DEFAULT '',
  `business_licence_validity` varchar(255) DEFAULT '',
  `business_scope` varchar(255) DEFAULT '',
  `agent_brand` varchar(255) DEFAULT '',
  `business_licence_picture` varchar(255) DEFAULT '',
  `corporation_picture` varchar(255) DEFAULT '',
  `corporation_idcard_picture` varchar(255) DEFAULT '',
  `corporation_phone` varchar(255) DEFAULT '',
  `agent_brand_name` varchar(255) DEFAULT '',
  `agent_level` varchar(255) DEFAULT '',
  `agent_start_date` date DEFAULT NULL,
  `agent_end_date` date DEFAULT NULL,
  `agent_authorize_picture` varchar(255) DEFAULT '',
  `has_shop` tinyint(1) DEFAULT '0',
  `shop_name` varchar(255) DEFAULT '',
  `shop_address` varchar(255) DEFAULT '',
  `shop_area` varchar(255) DEFAULT '',
  `shop_phone` varchar(255) DEFAULT '',
  `shop_picture` varchar(255) DEFAULT '',
  `sex` tinyint(1) DEFAULT '0',
  `age` smallint(4) DEFAULT '0',
  `idcard_address` varchar(255) DEFAULT '',
  `phone` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `emergency_contactor` varchar(255) DEFAULT '',
  `emergency_phone` varchar(255) DEFAULT '',
  `emergency_address` varchar(255) DEFAULT '',
  `realname_picture` varchar(2550) DEFAULT NULL,
  `addtime` int(11) DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql="DROP TABLE `zt_member_data_history`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
