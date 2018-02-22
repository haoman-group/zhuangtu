<?php

use Phpmig\Migration\Migration;

class UpdateMenu2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
            VALUES (203,'查看',171,'Admin','Auditqualification','show','',1,0,'',0),(204,'审核',171,'Admin','Auditqualification','status','',1,0,'',0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id in (203,204);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
