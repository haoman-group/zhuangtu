<?php

use Phpmig\Migration\Migration;

class AddRefundReason extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `zhuangtu`.`zt_option` (`id`, `name`, `title`) VALUES ('22', 'refund_reason', '退款原因');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="DELETE FROM `zhuangtu`.`zt_option` WHERE id='22';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
