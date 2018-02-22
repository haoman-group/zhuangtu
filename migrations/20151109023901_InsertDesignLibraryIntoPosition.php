<?php

use Phpmig\Migration\Migration;

class InsertDesignLibraryIntoPosition extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`, `model`, `field`, `primarykey`)
                VALUES
                    (6, '', '', '设计库－大家正在关注', 14, '', 0, '', '', ''),
                    (7, '', '', '设计库－为您推荐', 15, '', 0, '', '', '');
                ";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_position where posid in (6,7)";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
