<?php

use Phpmig\Migration\Migration;

class AddIsDeleteToPicture extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_picture_category ADD COLUMN isdelete tinyint(1)   DEFAULT 0 ;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_picture_category drop COLUMN isdelete;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
