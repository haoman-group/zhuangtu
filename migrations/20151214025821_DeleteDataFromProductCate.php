<?php

use Phpmig\Migration\Migration;

class DeleteDataFromProductCate extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "update  zt_product_category set isdelete = 1  where name like '%天猫%';";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "update  zt_product_category set isdelete = 0  where name like '%天猫%';";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
