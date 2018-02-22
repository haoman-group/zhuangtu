<?php

use Phpmig\Migration\Migration;

class AddColumnToMenu2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES (244, '导出CSV', 235, 'Admin', 'Order', 'export', '', 1, 0, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id=244;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
