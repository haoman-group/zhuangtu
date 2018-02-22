<?php

use Phpmig\Migration\Migration;

class AddVoidPostion extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_position_data` ADD `void` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '视频' AFTER `wap_picture`;";

         $container = $this->getContainer();
        $container['db']->query($sql);

    }

    /**
     * Undo the migration
     */
    public function down()
    {
     
        $sql="ALTER TABLE `zt_position_data` DROP `void`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
