<?php

use Phpmig\Migration\Migration;

class InsertAccessoryIntoMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
VALUES (220, '辅材', 183, 'Admin', 'Accessory', 'index', '', 1, 1, '', 0);
INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
VALUES (221, '辅材类型', 220, 'Admin', 'Accessory', 'type_index', '', 1, 1, '', 0);
INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
VALUES (222, '添加辅材', 220, 'Admin', 'Accessory', 'add', '', 1, 1, '', 0);
INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
VALUES (223, '添加辅材类型', 220, 'Admin', 'Accessory', 'add_type', '', 1, 1, '', 0);
";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id in (220,221,222,223)";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
