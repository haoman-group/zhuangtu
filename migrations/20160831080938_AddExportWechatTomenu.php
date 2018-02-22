<?php

use Phpmig\Migration\Migration;

class AddExportWechatTomenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (266,'导出CSV',261,'Admin','Activity','exportWechat','',1,0,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="delete from zt_menu where id=266;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
