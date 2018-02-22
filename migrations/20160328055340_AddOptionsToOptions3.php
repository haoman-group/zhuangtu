<?php

use Phpmig\Migration\Migration;

class AddOptionsToOptions3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql= " INSERT INTO `zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES(137, 'activity_Designer', '工厂直供', '工厂直供', 0, 1),
        (138, 'activity_Designer', '新店开业', '新店开业', 0, 1),
        (139, 'activity_Designer', '五一特惠', '五一特惠', 0, 1),
        (140, 'activity_Designer', '套餐专享', '套餐专享', 0, 1),
        (141, 'activity_Designer', '团购价', '团购价', 0, 1),
        (142, 'activity_Designer', '三八优惠', '三八优惠', 0, 1),
        (143, 'activity_Designer', '装途补贴', '装途补贴', 0, 1),
        (144, 'activity_Designer', '双十一', '双十一', 0, 1),
        (145, 'activity_Designer', '装途专享', '装途专享', 0, 1),
        (146, 'activity_Designer', '秒杀抢购', '秒杀抢购', 0, 1),
        (147, 'activity_Designer', '劲爆价', '劲爆价', 0, 1),
        (148, 'activity_Designer', '清仓价', '清仓价', 0, 1),
        (149, 'activity_Designer', '今日特价', '今日特价', 0, 1),
        (150, 'activity_Designer', '国庆特惠', '国庆特惠', 0, 1),
        (151, 'activity_Designer', '答谢会', '答谢会', 0, 1),
        (152, 'activity_Designer', '周年庆', '周年庆', 0, 1);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql= "DELETE FROM `zt_option_field` where id >=137 and id <=152";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
