<?php

use Phpmig\Migration\Migration;

class InsertAppToModule extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="INSERT INTO `zt_module` (`module`, `modulename`, `sign`, `iscore`, `disabled`, `version`, `setting`, `installtime`, `updatetime`, `listorder`)
VALUES
    ('App', 'APP', '8ae5811be1a55b9b8447ad2dbdadbf61', 0, 1, '1.0.0', '', 1455420417, 1455420417, 0);
";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_module where module='App'";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
