<?php

use Phpmig\Migration\Migration;

class AddMenu extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
             $sql="INSERT INTO `zt_menu` (`id`, `name`, `parentid`, `app`, `controller`, `action`, `parameter`, `type`, `status`, `remark`, `listorder`) VALUES
                    (255, '设计库宝贝详情评论', 183, 'Admin', 'DesignLibraryComment', 'index', '', 1, 1, '', 0),
                    (256, '产品的评论', 183, 'Admin', 'ProductComment', 'index', '', 1, 1, '', 0);";
        $container = $this->getContainer();
        $container['db']->query($sql);  
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql = "delete from zt_menu where id=>'255' and id<='256';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
