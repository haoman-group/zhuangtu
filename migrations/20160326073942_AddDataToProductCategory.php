<?php

use Phpmig\Migration\Migration;

class AddDataToProductCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_product_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`)
                VALUES (113,0,'美缝工','0',0,'',0,0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_product_category where cid=113;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
