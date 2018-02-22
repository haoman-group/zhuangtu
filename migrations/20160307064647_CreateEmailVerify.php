<?php

use Phpmig\Migration\Migration;

class CreateEmailVerify extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "
CREATE TABLE IF NOT EXISTS `zt_email_verify` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT '',
  `code` varchar(10) DEFAULT '',
  `content` varchar(255) DEFAULT '',
  `url` varchar(255) DEFAULT '',
  `addtime` int(11) DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);   
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table zt_email_verify;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);      
    }
}
