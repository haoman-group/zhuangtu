<?php

use Phpmig\Migration\Migration;

class AddColumnToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
(239, '活动管理', 193, 'Admin', 'Activity', 'index', '', 1, 1, '', 0),
(240, '类型管理', 239, 'Admin', 'Activity', 'index', '', 1, 1, '', 0),
(241, '产品管理', 239, 'Admin', 'Activity', 'products', '', 1, 1, '', 0),
(242, '添加类型', 240, 'Admin', 'Activity', 'add', '', 1, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id>='239' and id<='242';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
