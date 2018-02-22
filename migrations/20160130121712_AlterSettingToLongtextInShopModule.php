<?php

use Phpmig\Migration\Migration;

class AlterSettingToLongtextInShopModule extends Migration
{
    public function up()
    {
        $sql = "alter table zt_shop_module modify column setting LONGTEXT;";
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
