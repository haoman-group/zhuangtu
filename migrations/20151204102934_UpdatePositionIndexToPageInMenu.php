<?php

use Phpmig\Migration\Migration;

class UpdatePositionIndexToPageInMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "update zt_menu set action='page' where id=195 ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "update zt_menu set action='index' where id=195 ";
        $container = $this->getContainer();
        $container['db']->query($sql); 

    }
}
