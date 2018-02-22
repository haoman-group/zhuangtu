<?php

use Phpmig\Migration\Migration;

class CreateShopDesignModule extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql  = "CREATE TABLE `zt_shop_design_module` (
          `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
          `icon` varchar(255) DEFAULT '',
          `name` varchar(255) DEFAULT '',
          `description` varchar(255) DEFAULT '',
          `listorder` int(11) DEFAULT '0',
          `status` tinyint(1) DEFAULT '0',
          PRIMARY KEY (`id`)
        ) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

        INSERT INTO `zt_shop_design_module` (`id`, `icon`, `name`, `description`, `listorder`, `status`)
            VALUES
                (1, '', 'recommend', '宝贝推荐', 0, 1),
                (2, '', 'rank', '宝贝排行', 0, 1),
                (3, '', 'category', '默认分类', 0, 1),
                (4, '', 'diycate', '个性分类', 0, 1),
                (5, '', 'diyblock', '自定义区', 0, 1),
                (6, '', 'slider', '图片轮播', 0, 1),
                (7, '', 'friendlink', '友情链接', 0, 1),
                (8, '', 'service', '客服中心', 0, 1),
                (9, '', 'adviser', '生意参谋', 0, 1),
                (10, '', 'qrcode', '无线二维', 0, 1),
                (11, '', 'recharge', '充值中心', 0, 1),
                (12, '', 'search', '宝贝搜索', 0, 1),
                (13, '', 'notice', '店铺公告', 0, 1),
                (14, '', 'isv', 'ISV互动', 0, 1),
                (15, '', 'public_service_ad', '公益广告', 0, 1),
                (16, '', 'guess', '猜你喜欢', 0, 1),
                (17, '', 'shopsign', '店铺招牌', 0, 1);
        ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql  = "DROP TABLE zt_shop_design_module";
        $container = $this->getContainer();
        $container['db']->query($sql); 

    }
}
