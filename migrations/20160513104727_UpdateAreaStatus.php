<?php

use Phpmig\Migration\Migration;

class UpdateAreaStatus extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="update `zt_area` set status='1' where pid='1' and id !='23';update `zt_area` set status='1' where pid='23' and id !='300';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="update `zt_area` set status='0' where pid='1' and id !='23';update `zt_area` set status='0' where pid='23' and id !='300';";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
