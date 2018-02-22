<?php

use Phpmig\Migration\Migration;

class AddType extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_connect` ADD `type` INT(2) NOT NULL COMMENT '类型'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
    
    public function down()
    {
     $sql="ALTER TABLE `zt_access` DROP `type`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
