<?php

use Phpmig\Migration\Migration;

class InsertNewFunctionToMenu extends Migration
{
    /**
     * Do the migration
     * (178,'添加资质',171,'Admin','Auditqualification','add','',0,1,'',0),
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (179,'宝贝分类管理',45,'Admin','Productcategory','index','',0,1,'',0),
                       (180,'添加分类',179,'Admin','Productcategory','add','',0,1,'',0),
                       (181,'宝贝属性管理',45,'Admin','Property','index','',0,1,'',0),
                       (182,'添加属性',181,'Admin','Property','add','',0,1,'',0),
                       (183, '宝贝管理', 44, 'Admin', 'Product', 'index', '', 0, 1, '', 0),
                       (185, '修改', 183, 'Admin', 'Product', 'edit', '', 1, 0, '', 0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id in(179,180,181,182,183,185);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
