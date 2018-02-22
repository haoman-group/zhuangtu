<?php

use Phpmig\Migration\Migration;

class AddTypeToCommentProduct extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {

        $sql="ALTER TABLE `zt_comment_product` CHANGE `type1` `type` INT(1) NOT NULL COMMENT '0为评价，1为追加评价'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {

        $sql="ALTER TABLE `zt_comment_product` CHANGE `type` `type1` INT(1) NOT NULL COMMENT '0为评价，1为追加评价'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
