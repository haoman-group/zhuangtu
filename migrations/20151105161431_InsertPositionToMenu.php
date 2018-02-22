<?php

use Phpmig\Migration\Migration;

class InsertPositionToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
            VALUES
            (194, '推荐管理', 193, 'Admin', 'Position', 'index', '', 0, 1, '', 0),
            (193, '页面管理', 0, 'Admin', 'Page', 'index', '', 0, 1, '', 0),
            (195, '推荐位管理', 194, 'Admin', 'Position', 'index', '', 1, 1, '', 0),
            (196, '添加推荐位', 194, 'Admin', 'Position', 'add', '', 1, 1, '', 0),
            (197, '信息管理', 195, 'Admin', 'Position', 'item', '', 1, 0, '', 0),
            (198, '修改', 195, 'Admin', 'Position', 'edit', '', 1, 0, '', 0),
            (199, '添加信息', 197, 'Admin', 'Position', 'item_add', '', 1, 0, '', 0),
            (200, '删除', 197, 'Admin', 'Position', 'item_delete', '', 1, 0, '', 0);
            ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id in (193,194,195,196,197,198,199,200)";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
