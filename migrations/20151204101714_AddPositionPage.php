<?php

use Phpmig\Migration\Migration;

class AddPositionPage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE `zt_position_page` (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `name` varchar(255) DEFAULT '',
              `listorder` int(11) DEFAULT 0,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
            ALTER TABLE zt_position ADD  COLUMN pageid int(11) default 0; ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_position DROP COLUMN pageid;
                DROP TABLE zt_position_page;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
