<?php

use Phpmig\Migration\Migration;

class ModifyProductColumn extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_product ADD  COLUMN (expiry_date tinyint(1) default 0,
                                                    starttime_type tinyint(1) default 1,
                                                    starttime varchar(16),
                                                    is_home varchar(36),
                                                    min_price decimal(10,2),
                                                    max_price decimal(10,2),
                                                    designtype tinyint(1),
                                                    deletetime int(11),
                                                    auditstatus tinyint(1) default 0,
                                                    ill_reason varchar(255) default NULL,
                                                    audittime int(11));";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_product drop COLUMN expiry_date;
                ALTER TABLE zt_product drop COLUMN starttime_type;
                ALTER TABLE zt_product drop COLUMN starttime;
                ALTER TABLE zt_product drop COLUMN is_home;
                ALTER TABLE zt_product drop COLUMN min_price;
                ALTER TABLE zt_product drop COLUMN max_price;
                ALTER TABLE zt_product drop COLUMN designtype;
                ALTER TABLE zt_product drop COLUMN deletetime;
                ALTER TABLE zt_product drop COLUMN auditstatus;
                ALTER TABLE zt_product drop COLUMN audittime;
                ALTER TABLE zt_product drop COLUMN ill_reason;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
