<?php

use Phpmig\Migration\Migration;

class AddNewBrandFuncToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (213,'添加品牌',181,'Admin','Property','addBrand','',1,1,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id=213;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
