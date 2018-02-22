<?php

use Phpmig\Migration\Migration;

class UpadteMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "update zt_menu set action='material',  parameter='type=3' where id=190;
                update zt_menu set action='material' , parameter='type=5' where id=191;
                INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
            VALUES (201, '家具', 183, 'Admin', 'Product', 'material', 'type=4', 0, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "update zt_menu set action='index' , parameter='' where id in (190,191);
                delete from zt_menu where id=201;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
