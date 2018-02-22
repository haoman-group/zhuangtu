<?php

use Phpmig\Migration\Migration;

class AddWapToPositionData extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql="ALTER TABLE `zt_position_data` ADD `wap_picture` VARCHAR(2550) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机端上传图片'";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql="ALTER TABLE `zt_position_data` DROP `wap_picture`;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
