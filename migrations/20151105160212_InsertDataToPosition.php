<?php

use Phpmig\Migration\Migration;

class InsertDataToPosition extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`, `model`, `field`, `primarykey`)
            VALUES
            (1, '0', '0', '网购设计－设计库', 10, '', 0, 'DesignLibrary', 'id,picture,shopid,proid,uid', 'id'),
            (2, '0', '0', '网购设计－设计师', 4, '', 0, 'Designer', 'id,name,school,picture,qualification,idea,introduce,style', 'id'),
            (3, '0', '0', '网购设计－设计公司', 45, '', 0, 'Shop', 'id,uid,catid', 'id'),
            (4, '0', '0', '网购设计－工作室', 15, '', 0, 'Shop', 'id,uid,catid', 'id'),
            (5, '0', '0', '网购设计－每日低价', 11, '', 0, 'Product', 'id,title,headpic,price', 'id');
        ";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete form zt_position where id in (1,2,3,4,5)";
        $container = $this->getContainer();
        $container['db']->query($sql);

    }
}
