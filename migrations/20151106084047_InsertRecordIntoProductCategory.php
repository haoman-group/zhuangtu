<?php

use Phpmig\Migration\Migration;

class InsertRecordIntoProductCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_product_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`)
            VALUES
                (101, 0, '家装设计', '0', 0, '', 0, 0),
                (102, 0, '软装设计', '0', 0, '', 0, 0),
                (103, 0, '电工', '0', 0, '', 0, 0),
                (104, 0, '水暖工', '0', 0, '', 0, 0),
                (105, 0, '瓦工', '0', 0, '', 0, 0),
                (106, 0, '木工', '0', 0, '', 0, 0),
                (107, 0, '油漆工', '0', 0, '', 0, 0),
                (108, 0, '小工', '0', 0, '', 0, 0),
                (109, 0, '家电', '0', 0, '', 0, 0),
                (110, 0, '家装主材', '0', 0, '', 0, 0),
                (111, 0, '软装', '0', 0, '', 0, 0);
            ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "delete from zt_product_category where cid>=101 and cid cid<=111";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
