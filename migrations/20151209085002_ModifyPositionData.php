<?php

use Phpmig\Migration\Migration;

class ModifyPositionData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="alter table zt_position_data change id id int not null auto_increment primary key;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="alter table zt_position_data change id id int not null;alter table zt_position_data drop primary key;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
