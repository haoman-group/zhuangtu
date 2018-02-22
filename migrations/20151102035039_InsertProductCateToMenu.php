<?php

use Phpmig\Migration\Migration;

class InsertProductCateToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
                VALUES (188, '设计',183,'Admin','Product','design','',1,1,'',0),
                       (189, '工人',183,'Admin','Product','worker','',1,1,'',0),
                       (190, '主材',183,'Admin','Product','index','',1,1,'',0),
                       (191, '家电',183,'Admin','Product','index','',1,1,'',0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id in(188,189,190,191);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
