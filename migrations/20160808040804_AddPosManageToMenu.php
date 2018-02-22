<?php

use Phpmig\Migration\Migration;

class AddPosManageToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (259,'Pos机管理',257,'Admin','PosManage','lists','',1,1,'',0);
              INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (258,'添加POS机信息',257,'Admin','PosManage','addlist','',1,1,'',0);
            INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (257,'POS机管理',134,'Admin','PosManage','index','',1,1,'',0);";
            $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="delete from zt_menu where id in ('257','258','259');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
