<?php

use Phpmig\Migration\Migration;

class InsertShopcategoryToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES 
                (175,'店铺分类管理',45,'Admin','Shopcategory','index','',0,1,'',0),
                (176,'添加店铺分类',175,'Admin','Shopcategory','add','',0,1,'',0),
                (177,'修改',175,'Admin','Shopcategory','edit','',1,0,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id  in (175,176,177);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
