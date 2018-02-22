<?php

use Phpmig\Migration\Migration;

class AddPriceToMaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_material ADD  COLUMN  (price_json  text, 
                                                    min_price decimal(10,2),
                                                    max_price decimal(10,2));";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_material drop  COLUMN  price_json;
                ALTER TABLE zt_material drop  COLUMN  min_price;
                ALTER TABLE zt_material drop  COLUMN  max_price;";
        $container = $this->getContainer();
        $container['db']->query($sql); 

    }
}
