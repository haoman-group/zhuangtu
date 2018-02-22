<?php

use Phpmig\Migration\Migration;

class ModifyBrandInProductPropertyValue extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "UPDATE zt_product_property_value SET name = \"平米磁砖\", name_alias = \"平米磁砖\" WHERE vid = 1027447833 AND cid=50022272 AND pid=20000;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "UPDATE zt_product_property_value SET name = \"平米瓷砖\", name_alias = \"平米瓷砖\" WHERE vid = 1027447833 AND cid=50022272 AND pid=20000;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
