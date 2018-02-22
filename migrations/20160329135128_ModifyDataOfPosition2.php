<?php

use Phpmig\Migration\Migration;

class ModifyDataOfPosition2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `zt_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`, `model`, `field`, `primarykey`, `pageid`) VALUES
        (29, '', '', '大牌推荐', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 4),
(45, '', '', '厨房卫浴05', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 4),
(46, '', '', '厨房卫浴06', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 4),
(41, '', '', '厨房卫浴01', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 4),
(42, '', '', '厨房卫浴02', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 4),
(43, '', '', '厨房卫浴03', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', '', 4),
(44, '', '', '厨房卫浴04', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 4),
(40, '', '', '家装爆款', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 4);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="delete from `zt_position` where posid in ('29','40','41','42','43','44','45','46','47');";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
