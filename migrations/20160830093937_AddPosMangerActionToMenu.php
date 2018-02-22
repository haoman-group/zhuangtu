<?php

use Phpmig\Migration\Migration;

class AddPosMangerActionToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (262,'修改',259,'Admin','PosManage','edit','',1,0,'',0);
INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (263,'删除',259,'Admin','PosManage','delete','',1,0,'',0);
INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (264,'添加',258,'Admin','PosManage','add','',1,0,'',0);
INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (265,'查看',258,'Admin','PosManage','show','',1,0,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="delete from zt_menu where id in(262,263,264,265);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
