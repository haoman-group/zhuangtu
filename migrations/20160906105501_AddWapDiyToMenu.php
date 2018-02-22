<?php

use Phpmig\Migration\Migration;

class AddWapDiyToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (268,'手机专题管理',45,'Admin','Wapdiy','index','',1,1,'手机专题页管理 ',0);
               INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (269,'添加专题页',268,'Admin','Wapdiy','add','',1,1,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="delete from zt_menu where id in (268,269);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
