<?php

use Phpmig\Migration\Migration;

class AddSearchkeystoMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
        (251, '搜索管理', 193, 'Admin', 'Searchkeys', 'index', '', 1, 1, '', 0),
	(252, '热词排名', 251, 'Admin', 'Searchkeys', 'index', '', 1, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id in (251, 252);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
