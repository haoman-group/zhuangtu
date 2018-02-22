<?php

use Phpmig\Migration\Migration;

class AddFunctionToMenu extends Migration
{
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (205,'删除',179,'Admin','Productcategory','delete','',1,0,'',0),
                       (206,'修改',179,'Admin','Productcategory','edit','',1,0,'',0),
                       (211, '子菜单', 179, 'Admin', 'Productcategory', 'child', '', 1, 0, '', 0),
                       (207,'修改',181,'Admin','Property','edit','',1,0,'',0),
                       (208,'删除',181,'Admin','Property','delete','',1,0,'',0),
                       (209, '删除属性', 181, 'Admin', 'Property', 'deletevalue', '', 1, 0, '', 0),
                       (210, '显示', 181, 'Admin', 'Property', 'show', '', 1, 0, '', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id>204 and id<212;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
