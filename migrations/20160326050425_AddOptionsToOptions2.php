<?php

use Phpmig\Migration\Migration;

class AddOptionsToOptions2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql= " INSERT INTO `zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES(115, 'activity_Worker', '工厂直供', '工厂直供', 0, 1),
        (116, 'activity_Worker', '新店开业', '新店开业', 0, 1),
        (117, 'activity_Worker', '五一特惠', '五一特惠', 0, 1),
        (118, 'activity_Worker', '套餐专享', '套餐专享', 0, 1),
        (119, 'activity_Worker', '团购价', '团购价', 0, 1),
        (120, 'activity_Worker', '三八优惠', '三八优惠', 0, 1),
        (121, 'activity_Worker', '装途补贴', '装途补贴', 0, 1),
        (122, 'activity_Worker', '双十一', '双十一', 0, 1),
        (123, 'activity_Worker', '装途专享', '装途专享', 0, 1),
        (124, 'activity_Worker', '秒杀抢购', '秒杀抢购', 0, 1),
        (125, 'activity_Worker', '劲爆价', '劲爆价', 0, 1),
        (126, 'activity_Worker', '清仓价', '清仓价', 0, 1),
        (127, 'activity_Worker', '今日特价', '今日特价', 0, 1),
        (128, 'activity_Worker', '国庆特惠', '国庆特惠', 0, 1),
        (129, 'activity_Worker', '单门洞拆卸参考价', '单门洞拆卸参考价', 0, 1),
        (130, 'activity_Worker', '按建筑面积每平米参考价', '按建筑面积每平米参考价', 0, 1),
        (131, 'activity_Worker', '铺800*800地砖每平米参考价', '铺800*800地砖每平米参考价', 0, 1),
        (132, 'activity_Worker', '地面找平每平米参考价', '地面找平每平米参考价', 0, 1),
        (133, 'activity_Worker', '施工顶面面积每平米参考价', '施工顶面面积每平米参考价', 0, 1),
        (134, 'activity_Worker', '按工程量日佣金参考价', '按工程量日佣金参考价', 0, 1),
        (135, 'activity_Worker', '基层处理每平米参考价', '基层处理每平米参考价', 0, 1),
        (136, 'activity_Worker', '刷乳胶漆每平米参考价', '刷乳胶漆每平米参考价', 0, 1);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
        
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql= "DELETE FROM `zt_option_field` where id >=115 and id <=136";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
