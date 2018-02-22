<?php

use Phpmig\Migration\Migration;

class AddStyleToOption extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_option_field` VALUES (65,'attr_style','田园','田园',0,1),(66,'attr_style','文艺复古','文艺复古',0,1),(67,'attr_style','工装','工装',0,1),(68,'attr_style','东南亚','东南亚',0,1);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_option_field where id in (65,66,67,68);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
