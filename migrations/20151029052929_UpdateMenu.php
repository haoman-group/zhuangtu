<?php

use Phpmig\Migration\Migration;

class UpdateMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "update zt_menu set name='推荐管理' where id=164;
                update zt_menu set name='添加推荐' where id=165";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        
    }
}
