<?php

use Phpmig\Migration\Migration;

class AddInstallmentToOrder extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter TABLE zt_order add column `installment` int(1) NULL DEFAULT 0 COMMENT '分期付款标志';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table `zhuangtu`.`zt_order` drop column `installment`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
