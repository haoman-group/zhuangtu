<?php

use Phpmig\Migration\Migration;

class InsertNavigationToShopDesignModule extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql =  "
INSERT INTO `zt_shop_design_module` (`id`, `icon`, `name`, `description`, `listorder`, `status`, `wtype`, `ismove`, `isdel`, `isadd`, `isedit`)
VALUES
    (8821, '', 'navigation', '导航', 0, 0, '', 0, 0, 0, 0);

        ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql =  "delete from zt_shop_design_module where id=8821";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
