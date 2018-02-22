<?php

use Phpmig\Migration\Migration;

class AddPageIdToOptions extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
    $SQL="INSERT INTO `zt_menu` ( `id`,`name`, `parentid`, `app`, `controller`, `action`,`parameter`,`type`,`status`,`remark`,`listorder`) 
    VALUES(224,'所属页面',194,'Admin','Position','pageadd','',1,1,'',0);";
    $container = $this->getContainer(); 
        $container['db']->query($SQL);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
       $sql= "DELETE FROM `zt_menu` where id=224 ;";

      $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
