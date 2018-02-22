<?php

use Phpmig\Migration\Migration;

class ChangeStarttime extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="update zt_product set starttime= unix_timestamp(str_to_date(`starttime`,'%Y-%m-%d %H:%i:%s')); ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="update zt_product set starttime= FROM_UNIXTIME(`starttime`); ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
