<?php

use Phpmig\Migration\Migration;

class UpdataLunBo extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     $sql ="INSERT INTO `zt_position` (`posid`, `modelid`, `catid`,`name`,`maxnum`,`extention`,`listorder`,`model`,`field`,`primarykey`,`pageid`) VALUES
                
                ('204','','', '首页轮播2', '16','','0','Product','id','id','7')";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
     $sql = "delete from `zt_position` where `posid`= '204'";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
