<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 11/2/15
 * Time: 09:36
 */

use Phpmig\Migration\Migration;

class AddIsdeleteIntoShopTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shop ADD COLUMN isdelete tinyint(1) default 0;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shop drop COLUMN isdelete;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
