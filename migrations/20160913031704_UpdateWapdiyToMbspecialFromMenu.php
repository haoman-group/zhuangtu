<?php

use Phpmig\Migration\Migration;

class UpdateWapdiyToMbspecialFromMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "update zt_menu set controller='Mbspecial' where id=268;
                update zt_menu set controller='Mbspecial' where id=269;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "update zt_menu set controller='Wapdiy' where id=268;
                update zt_menu set controller='Wapdiy' where id=269;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
