<?php

use Phpmig\Migration\Migration;

class AddSmsToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`)
            VALUES (202, '验证码', 173, 'Admin', 'Smsverify', 'index', '', 0, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_menu where id=202;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
