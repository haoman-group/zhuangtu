<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 11/3/15
 * Time: 15:36
 */
use Phpmig\Migration\Migration;

class InsertDesignLibraryToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (192, '设计库', 45,'Admin','DesignLibrary','index','',1,1,'',0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id in(192);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
