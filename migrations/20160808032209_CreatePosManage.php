<?php

use Phpmig\Migration\Migration;

class CreatePosManage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {   
        $sql="CREATE TABLE `zt_pos_manage` (
  `pos_id` INT NOT NULL AUTO_INCREMENT,
  `addtime` INT(11) NULL ,
  `legal_person` VARCHAR(45) NULL,
  `uid` INT(11) NULL,
  `pmobile` VARCHAR(45) NULL,
  `paddr` VARCHAR(45) NULL,
  `ptype` VARCHAR(45) NULL,
  `pos_sn` VARCHAR(45) NULL ,
  `ppayment` VARCHAR(45) NULL ,
  `manager` VARCHAR(45) NULL ,
  PRIMARY KEY (`pos_id`))ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT 'pos机终端信息表';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "drop table zt_pos_manage;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
