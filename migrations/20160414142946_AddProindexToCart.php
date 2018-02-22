<?php

use Phpmig\Migration\Migration;

class AddProindexToCart extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE zt_cart add  COLUMN(`proindex` varchar(255) DEFAULT '' COMMENT '产品属性')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="ALTER TABLE zt_cart drop  COLUMN  `proindex`";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
