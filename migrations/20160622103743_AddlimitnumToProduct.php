<?php

use Phpmig\Migration\Migration;

class AddlimitnumToProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      
     $sql="ALTER TABLE `zt_product` ADD `limitnum` INT(5) NOT NULL DEFAULT '-1' COMMENT '-1为不限制，大于0的为限量个数'";

       $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
    
       $sql="ALTER TABLE `zt_product` DROP `limitnum";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
