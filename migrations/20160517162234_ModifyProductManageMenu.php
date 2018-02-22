<?php

use Phpmig\Migration\Migration;

class ModifyProductManageMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
			(243, '产品', 183, 'Admin', 'Product', 'product', '', 1, 1, '', 0);
		UPDATE `zt_menu` set status = 0 where id in (188, 189, 190, 191, 201);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "update zt_menu set status = 1 where id in (188, 189, 190, 191, 201); delete from zt_menu where id = 243;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
