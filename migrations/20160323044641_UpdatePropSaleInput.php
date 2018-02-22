<?php

use Phpmig\Migration\Migration;

class UpdatePropSaleInput extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql= "update`zt_product_property` set is_input_prop=1 where is_color_prop=0 and is_sale_prop=1 and is_input_prop=0;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql= "update`zt_product_property` set is_input_prop=0 where is_color_prop=0 and is_sale_prop=1 and is_input_prop=1;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
