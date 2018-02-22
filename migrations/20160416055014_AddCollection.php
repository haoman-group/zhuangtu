<?php

use Phpmig\Migration\Migration;

class AddCollection extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
     
      $sql = "CREATE TABLE `zt_collection` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `productid` int(10) DEFAULT '0',
             
              `shopid` int(10) DEFAULT '0',
              `uid` int(11) DEFAULT '0',
              `addtime` varchar(20) DEFAULT '0',
              `isdelete` int(2) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE zt_collection";
        $container = $this->getContainer();
        $container['db']->query($sql); 

    }
}
