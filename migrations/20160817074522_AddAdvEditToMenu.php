<?php

use Phpmig\Migration\Migration;

class AddAdvEditToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (260,'高级修改',138,'Member','Member','advancededit','',1,0,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id=260;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
