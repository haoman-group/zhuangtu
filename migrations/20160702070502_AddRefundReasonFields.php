<?php

use Phpmig\Migration\Migration;

class AddRefundReasonFields extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql =" INSERT INTO `zhuangtu`.`zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('203', 'refund_reason', '质量问题', '质量问题', '0', '1');
                INSERT INTO `zhuangtu`.`zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('204', 'refund_reason', '尺寸不符', '尺寸不符', '0', '1');
                INSERT INTO `zhuangtu`.`zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('205', 'refund_reason', '尺码拍错/不喜欢/效果不好', '尺码拍错/不喜欢/效果不好', '0', '1');
                INSERT INTO `zhuangtu`.`zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('206', 'refund_reason', '商品破损/变形/生锈/掉漆', '商品破损/变形/生锈/掉漆', '0', '1');
                INSERT INTO `zhuangtu`.`zt_option_field` (`id`, `name`, `key`, `value`, `pid`, `status`) VALUES ('207', 'refund_reason', '其他原因', '其他原因', '0', '1');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_option_field where id >=203 and id<=207;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
