<?php

use Phpmig\Migration\Migration;

class ReCreateShopDesignModule extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "DROP table zt_shop_design_module;
        CREATE TABLE `zt_shop_design_module` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `description` varchar(255) DEFAULT '',
  `listorder` int(11) DEFAULT '0',
  `status` tinyint(1) DEFAULT '0',
  `wtype` varchar(255) DEFAULT '',
  `ismove` tinyint(1) DEFAULT '1',
  `isdel` tinyint(1) DEFAULT '1',
  `isadd` tinyint(1) DEFAULT '1',
  `isedit` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8821 DEFAULT CHARSET=utf8;

INSERT INTO `zt_shop_design_module` (`id`, `icon`, `name`, `description`, `listorder`, `status`, `wtype`, `ismove`, `isdel`, `isadd`, `isedit`)
VALUES
    (8801, '', 'recommend', '宝贝推荐', 99, 1, 'b950-b190-b750-b550', 1, 1, 1, 1),
    (8802, '', 'rank', '宝贝排行', 90, 1, 'b190', 1, 1, 1, 1),
    (8803, '', 'category', '默认分类', 80, 1, 'b190', 1, 1, 1, 1),
    (8804, '', 'diycate', '个性分类', 0, 0, 'b190', 1, 1, 1, 1),
    (8805, '', 'diyblock', '自定义区', 70, 1, 'b950-f950-b190-b750-b550', 1, 1, 1, 1),
    (8806, '', 'slider', '图片轮播', 60, 1, 'b950-b190-b750-b550', 1, 1, 1, 1),
    (8807, '', 'friendlink', '友情链接', 50, 1, 'b950-b190', 1, 1, 1, 1),
    (8808, '', 'service', '客服中心', 40, 1, 'b190', 1, 1, 1, 1),
    (8809, '', 'adviser', '生意参谋', 0, 0, 'b190', 1, 1, 1, 1),
    (8810, '', 'qrcode', '无线二维', 0, 0, 'b190', 1, 1, 1, 1),
    (8811, '', 'recharge', '充值中心', 0, 0, 'b190', 1, 1, 1, 1),
    (8812, '', 'search', '宝贝搜索', 0, 0, 'b950-b190-b750-b550', 1, 1, 1, 1),
    (8814, '', 'flash', 'flash模版', 0, 0, 'b190', 1, 1, 1, 1),
    (8813, '', 'isv', 'ISV游戏', 0, 0, 'b190', 1, 1, 1, 1),
    (8815, '', 'public_service_ad', '公益广告', 0, 0, 'b190', 1, 1, 1, 1),
    (8816, '', 'guess', '猜你喜欢', 0, 0, 'b190', 1, 1, 1, 1),
    (8820, '', 'shopsign', '店铺招牌', 30, 1, 'h950', 1, 1, 1, 1);

    
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
