<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 10/29/15
 * Time: 16:58
 */
use Phpmig\Migration\Migration;

class InsertShopManagementToMenu extends Migration
{
    /**
     * Do the migration
     * (186, '店铺管理',134,'Admin','Shop','create','',0,1,'',0),
     * (187, '店铺管理',183,'Admin','Shop','index','',1,1,'',0),
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (186, '店铺管理',134,'Admin','Shop','create','',0,1,'',0),
                       (187, '店铺管理',186,'Admin','Shop','index','',1,1,'',0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id in(186, 187);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
