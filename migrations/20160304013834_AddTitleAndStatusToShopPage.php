<?php

use Phpmig\Migration\Migration;

class AddTitleAndStatusToShopPage extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_shop_page ADD  COLUMN ( title varchar(255)  DEFAULT '',status int(11) default 0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_shop_page DROP COLUMN title ;
                ALTER TABLE zt_shop_page DROP COLUMN status;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
