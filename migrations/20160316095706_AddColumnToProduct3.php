<?php

use Phpmig\Migration\Migration;

class AddColumnToProduct3 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_product add  COLUMN( `showecplay` text COMMENT '高级编辑')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_product drop  COLUMN  `showecplay`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
