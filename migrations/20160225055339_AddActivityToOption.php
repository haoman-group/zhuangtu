<?php

use Phpmig\Migration\Migration;

class AddActivityToOption extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO zt_option (name,title) value ('activity','价格活动');
        INSERT INTO `zt_option_field` VALUES 
        (79,'activity','元旦特惠节','元旦特惠节',0,1),
        (80,'activity','3.8折扣日','3.8折扣日',0,1),
        (81,'activity','3.15放心购','3.15放心购',0,1),
        (82,'activity','十一特惠节','十一特惠节',0,1),
        (83,'activity','五一特惠节','五一特惠节',0,1),
        (84,'activity','11.11','11.11',0,1),
        (85,'activity','12.15周年庆','12.15周年庆',0,1),
        (86,'activity','12.12','12.12',0,1);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_option where name='activity';
                delete from zt_option_field where id in (79,80,81,82,83,84,85,86);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
