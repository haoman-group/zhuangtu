<?php

use Phpmig\Migration\Migration;

class AddFunctionToMenu2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (212,'搜索',179,'Admin','Productcategory','search','',1,1,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id=212;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
