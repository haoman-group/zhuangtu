<?php

use Phpmig\Migration\Migration;

class AddWeixinUnionidToMember extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_member ADD COLUMN (`weixin_unionid` varchar(50) DEFAULT '' COMMENT '微信unionid',weixin_info varchar(255) DEFAULT '' COMMENT '微信信息' );";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER table zt_member drop column weixin_unionid;
                ALTER table zt_member drop column weixin_info;";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
