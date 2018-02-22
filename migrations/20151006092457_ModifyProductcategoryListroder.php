<?php

use Phpmig\Migration\Migration;

class ModifyProductcategoryListroder extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_product_category change column listroder listorder int default 0";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product_category change column listorder listroder int default 0";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
