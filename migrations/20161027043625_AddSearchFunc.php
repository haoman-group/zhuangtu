<?php

use Phpmig\Migration\Migration;

class AddSearchFunc extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (270,'搜索',195,'Admin','Position','search','',1,1,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {   
        $sql = "delete from zt_menu where id=270;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
