<?php

use Phpmig\Migration\Migration;

class DeleOptionsToOptions extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="DELETE FROM `zt_option_field` WHERE id in(79,80,81,82,83,84,85,86); ";

        $container = $this->getContainer(); 
        $container['db']->query($sql);
        

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="INSERT INTO `zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES( 'activity', '元旦特惠节', '元旦特惠节', 0, 1),
( 'activity', '3.8折扣日', '3.8折扣日', 0, 1),
( 'activity', '3.15放心购', '3.15放心购', 0, 1),
( 'activity', '十一特惠节', '十一特惠节', 0, 1),
( 'activity', '五一特惠节', '五一特惠节', 0, 1),
( 'activity', '11.11', '11.11', 0, 1),
( 'activity', '12.15周年庆', '12.15周年庆', 0, 1),
( 'activity', '12.12', '12.12', 0, 1);";

 $container = $this->getContainer();
        $container['db']->query($sql);


    }
}
