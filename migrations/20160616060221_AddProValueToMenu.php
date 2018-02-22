<?php

use Phpmig\Migration\Migration;

class AddProValueToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
(249, '批量属性添加', 181, 'Admin', 'Property', 'addprovalue', '', 1, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id=249;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
