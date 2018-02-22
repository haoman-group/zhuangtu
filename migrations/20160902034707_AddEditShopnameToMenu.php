<?php

use Phpmig\Migration\Migration;

class AddEditShopnameToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` VALUES (267,'名称修改',187,'Admin','Shop','shopname','',1,0,'虚拟方法，用来控制是否有权限修改店铺名称。',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id=267;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
