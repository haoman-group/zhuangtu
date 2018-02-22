<?php

use Phpmig\Migration\Migration;

class InsertTestdataToShopDesign extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
INSERT INTO `zt_shop_design` (`id`, `uid`, `data`, `shopid`, `addtime`, `updatetime`, `status`)
VALUES
    (12, 2, 'a:3:{s:2:\"hd\";a:1:{i:0;a:4:{s:7:\"blockid\";i:343253256;s:9:\"classname\";s:4:\"mall\";s:6:\"subcol\";a:0:{}s:7:\"maincol\";a:0:{}}}s:2:\"bd\";a:3:{i:0;a:4:{s:7:\"blockid\";i:3432434435;s:9:\"classname\";s:4:\"srml\";s:7:\"maincol\";a:2:{i:0;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8806;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:12:\"图片轮播\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:1;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8805;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:18:\"自定义内容区\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}}s:6:\"subcol\";a:4:{i:0;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8802;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:15:\"宝贝排行榜\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:1;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8803;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:24:\"宝贝分类（竖向）\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:2;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8802;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:15:\"宝贝排行榜\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:3;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8803;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:24:\"宝贝分类（横向）\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}}}i:1;a:4:{s:7:\"blockid\";i:3432434435;s:9:\"classname\";s:4:\"slmr\";s:6:\"subcol\";a:4:{i:0;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8802;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:15:\"宝贝排行榜\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:1;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8803;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:24:\"宝贝分类（竖向）\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:2;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8802;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:15:\"宝贝排行榜\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:3;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8803;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:24:\"宝贝分类（横向）\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}}s:7:\"maincol\";a:2:{i:0;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8806;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:12:\"图片轮播\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}i:1;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8805;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:18:\"自定义内容区\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}}}i:2;a:4:{s:7:\"blockid\";i:3432434435;s:9:\"classname\";s:4:\"mall\";s:6:\"subcol\";a:0:{}s:7:\"maincol\";a:1:{i:0;a:8:{s:8:\"widgetid\";i:98049832;s:6:\"compid\";i:8806;s:7:\"towtype\";s:4:\"b190\";s:5:\"title\";s:12:\"图片轮播\";s:11:\"data-ismove\";i:1;s:10:\"data-isdel\";i:1;s:10:\"data-isadd\";i:1;s:11:\"data-isedit\";i:1;}}}}s:2:\"ft\";a:1:{i:0;a:4:{s:7:\"blockid\";i:343253256;s:9:\"classname\";s:4:\"mall\";s:6:\"subcol\";a:0:{}s:7:\"maincol\";a:0:{}}}}', 0, 0, 0, 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from `zt_shop_design` where id=12";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
