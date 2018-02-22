<?php

use Phpmig\Migration\Migration;

class InsertTemplateIntoMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
VALUES
    (215, '店铺管理', 0, 'Admin', 'Shop', 'index', '', 0, 1, '', 0),
    (216, '店铺模版管理', 215, 'Admin', 'Shoptemplate', 'index', '', 0, 1, '', 0),
    (217, '模版列表', 216, 'Admin', 'Shoptemplate', 'index', '', 1, 1, '', 0),
    (218, '添加模版', 216, 'Admin', 'Shoptemplate', 'add', '', 1, 1, '', 0),
    (219, '添加模版', 217, 'Admin', 'Shoptemplate', 'add', '', 1, 1, '', 0);
";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id in (215,216,217,218,219)";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
