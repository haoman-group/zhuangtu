<?php

use Phpmig\Migration\Migration;

class AddEmailVerifyToMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES(
                            214, '邮箱验证码', 173, 'Admin', 'Smsemail', 'email', '', 1, 1, '', 0)";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DELETE FROM `zt_menu` where id=214;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
