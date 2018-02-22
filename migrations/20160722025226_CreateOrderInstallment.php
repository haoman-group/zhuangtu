<?php

use Phpmig\Migration\Migration;

class CreateOrderInstallment extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zhuangtu`.`zt_order_installment` (
                                      `ins_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                                      `order_id` INT(11) NULL,
                                      `precent` VARCHAR(45) NULL,
                                      `ins_amount` DECIMAL(10,2) NULL,
                                      `ins_desc` VARCHAR(45) NULL,
                                      `ins_status` INT(2) NULL,
                                      `create_time` INT(10) NULL,
                                      `update_time` INT(10) NULL,
                                      `is_delete` INT(10) NULL,
                                      PRIMARY KEY (`ins_id`))ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT '分期付款';";

       $container = $this->getContainer();
       $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="drop table `zt_order_installment`;";
       $container = $this->getContainer();
       $container['db']->query($sql);
    }
}
