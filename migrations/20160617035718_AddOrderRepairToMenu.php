<?php

use Phpmig\Migration\Migration;

class AddOrderRepairToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
                (250, '状态修复', 234, 'Admin', 'Order', 'repair', '', 1, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id=250;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
