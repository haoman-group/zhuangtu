<?php

use Phpmig\Migration\Migration;

class CreateSearchkeys extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `zt_searchkeys` (
  `event_time` datetime DEFAULT NULL,
  `search_key` varchar(100) DEFAULT NULL,
  `log_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE IF EXISTS zt_searchkeys;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
