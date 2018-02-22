<?php

use Phpmig\Migration\Migration;

class AddYanshouCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_product_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`, `id`) VALUES
                    (114, 0, '分步式验收', '0', 0, '1464657784', 0, 0, '');";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="delete from zt_product_category where cid=114; ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
