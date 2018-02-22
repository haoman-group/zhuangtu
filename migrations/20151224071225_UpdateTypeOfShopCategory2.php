<?php

use Phpmig\Migration\Migration;

class UpdateTypeOfShopCategory2 extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = " update zt_shop_category set type=1 where pid=2;
                update zt_shop_category set type=1 where id=7;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = " update zt_shop_category set type=2 where pid=2;
                update zt_shop_category set type=2 where id=7;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
