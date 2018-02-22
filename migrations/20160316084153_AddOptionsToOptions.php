<?php

use Phpmig\Migration\Migration;

class AddOptionsToOptions extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql= " INSERT INTO `zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES(88, 'activity', '工厂直供', '工厂直供', 0, 1),
(89, 'activity', '新店开业', '新店开业', 0, 1),
(90, 'activity', '五一特惠', '五一特惠', 0, 1),
(93, 'activity', '套餐专享', '套餐专享', 0, 1),
(94, 'activity', '团购价', '团购价', 0, 1),
(97, 'activity', '三八优惠', '三八优惠', 0, 1),
(99, 'activity', '装途补贴', '装途补贴', 0, 1),
(101, 'activity', '双十一', '双十一', 0, 1),
(103, 'activity', '装途专享', '装途专享', 0, 1),
(106, 'activity', '秒杀抢购', '秒杀抢购', 0, 1),
(107, 'activity', '劲爆价', '劲爆价', 0, 1),
(109, 'activity', '清仓价', '清仓价', 0, 1),
(110, 'activity', '今日特价', '今日特价', 0, 1),
(113, 'activity', '国庆特惠', '国庆特惠', 0, 1),
(114, 'activity', '尾货价', '尾货价', 0, 1);";

     $container = $this->getContainer(); 
        $container['db']->query($sql);
        
    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql= "DELETE FROM `zt_option_field` where id in(89,90,93,94,97,99,101,103,106,107,109,110,113,114);";

 $container = $this->getContainer();
        $container['db']->query($sql);

    }
}
