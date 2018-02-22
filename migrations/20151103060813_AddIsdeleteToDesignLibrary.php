<?php

use Phpmig\Migration\Migration;

class AddIsdeleteToDesignLibrary extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_design_library ADD COLUMN isdelete tinyint(1) default 0;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_design_library drop COLUMN isdelete;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
