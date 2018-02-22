<?php

use Phpmig\Migration\Migration;

class AddYear extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE zt_shop add  COLUMN( `years` int(15) COMMENT '从业年限')";
         $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    
    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE zt_shop drop  COLUMN  `years`;";
        $container = $this->getContainer();
        $container['db']->query($sql); 

    }
}
