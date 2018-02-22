<?php

use Phpmig\Migration\Migration;

class InsertOrderToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES
                    (233, '交易', 0, 'Admin', 'Order', 'index', '', 0, 1, '', 0),
                    (234, '订单管理', 233, 'Admin', 'Order', 'index', '', 1, 1, '', 0),
                    (235, '订单列表', 234, 'Admin', 'Order', 'index', '', 1, 1, '', 0);
                ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id in (223,224,225)";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
