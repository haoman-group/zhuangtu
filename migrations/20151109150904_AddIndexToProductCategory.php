<?php

use Phpmig\Migration\Migration;

class AddIndexToProductCategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER  TABLE  `zt_product_property`  ADD  INDEX cid (`cid`),Add Index pid(pid),add index cvid(cid,parent_vid);
                ALTER  TABLE  `zt_product_property_value`  ADD  INDEX cpid (cid,pid),add index vid(vid);
                ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
$sql = "ALTER  TABLE  `zt_product_property`  ADD  INDEX cid (`cid`),Add Index pid(pid),add index cvid(cid,parent_vid);
                ALTER  TABLE  `zt_product_property_value`  ADD  INDEX cpid (cid,pid),add index vid(vid);
                ";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
