<?php

use Phpmig\Migration\Migration;

class AlterShopPageSetSetting extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql =  "alter table zt_shop_page modify column setting text ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {

    }
}
