<?php

use Phpmig\Migration\Migration;

class AddActivityMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`,`name`,`parentid`,`app`,`controller`,`action`,`parameter`,`type`,`status`,`remark`,`listorder`) VALUES (261,'微信活动',239,'Admin','Activity','wechat','',1,1,'',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id in(261);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);

    }
}
