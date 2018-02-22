<?php

use Phpmig\Migration\Migration;

class ModifySellerAddrPhoneLength extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter table zt_seller_addr change phone phone  varchar(14) DEFAULT '' COMMENT '联系电话';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table zt_seller_addr change phone phone  varchar(12) DEFAULT '' COMMENT '联系电话';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
