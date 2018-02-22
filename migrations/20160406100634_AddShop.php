<?php

use Phpmig\Migration\Migration;

class AddShop extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
      $sql="ALTER TABLE zt_shop add  COLUMN(`star` varchar(3) DEFAULT NULL COMMENT '星级',`certification` int(1) DEFAULT NULL COMMENT '认证')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
    /**
     * Undo the migration
     */
    public function down()
    {
       $sql="ALTER TABLE zt_shop drop  COLUMN  `star`, `certification`";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
