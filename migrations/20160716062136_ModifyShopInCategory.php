<?php

use Phpmig\Migration\Migration;

class ModifyShopInCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
	   $sql = "ALTER TABLE `zhuangtu`.`zt_shopin_category` CHANGE COLUMN `products` `products` VARCHAR(4096) NULL DEFAULT NULL COMMENT '分类所含宝贝' ;";
       $container = $this->getContainer();
       $container['db']->query($sql);  
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `zhuangtu`.`zt_shopin_category` CHANGE COLUMN `products` `products` VARCHAR(500) NULL DEFAULT NULL COMMENT '分类所含宝贝' ;";
        $container = $this->getContainer();
        $container['db']->query($sql);  
    }
}
