<?php

use Phpmig\Migration\Migration;

class AddDataToPositionPage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `zt_position_page` (`id`, `name`, `listorder`) VALUES
                (3, '网购辅材首页', 0),
                (4, '网购主材首页', 0),
                (5, '网购家具首页', 0),
                (6, '网购电器首页', 0),
                (7, '装途网首页', 0),
                (9, '天天特价', 0),
                (10, '品牌街', 0);
                ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_position_page where id >=3 and id<=10;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
