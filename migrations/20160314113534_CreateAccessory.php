<?php

use Phpmig\Migration\Migration;

class CreateAccessory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {   
            $sql ="
CREATE TABLE IF NOT EXISTS `zt_accessory_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT '' COMMENT '辅材品类名称',
  `category` varchar(128) DEFAULT '' COMMENT '辅材分类',
  `addtime` INT(11) DEFAULT 0,
  `updatetime` INT(11) DEFAULT 0,
  `isdelete` TINYINT(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
CREATE TABLE IF NOT EXISTS `zt_accessory_brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(512) DEFAULT '' COMMENT '辅材品牌名称',
  `accessory_type` INT(11) unsigned NOT NULL,
  `addtime` INT(11) DEFAULT 0,
  `updatetime` INT(11) DEFAULT 0,
  `isdelete` TINYINT(1) DEFAULT 0,
   PRIMARY KEY (`id`),
   CONSTRAINT brand_accessory_type FOREIGN KEY (accessory_type) REFERENCES zt_accessory_type(`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
CREATE TABLE IF NOT EXISTS `zt_accessory_norm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(512) DEFAULT '' COMMENT '辅材规格名称',
  `accessory_type` INT(11) unsigned NOT NULL,
  `addtime` INT(11) DEFAULT 0,
  `updatetime` INT(11) DEFAULT 0,
  `isdelete` TINYINT(1) DEFAULT 0,
   PRIMARY KEY (`id`),
   CONSTRAINT norm_accessory_type FOREIGN KEY (accessory_type) REFERENCES zt_accessory_type(`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
CREATE TABLE IF NOT EXISTS `zt_accessory` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(1024) NOT NULL COMMENT '辅材名称',
  `brand_id` INT(11) unsigned NOT NULL,
  `norm_id` INT(11) unsigned NOT NULL,
  `accessory_type` INT(11) unsigned NOT NULL,
  `unit_name` VARCHAR(64) DEFAULT '' COMMENT '辅材价钱单位',
  `unit_price` DECIMAL(10, 2) DEFAULT 0.0 COMMENT '辅材单价',
  `addtime` INT(11) DEFAULT 0,
  `updatetime` INT(11) DEFAULT 0,
  `remark` VARCHAR(1024) DEFAULT '' COMMENT '备注',
  `picture` VARCHAR(2550) DEFAULT '' COMMENT '图片地址',
  `isdelete` TINYINT(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `accessory_norm_brand` (`norm_id`, `brand_id`),
  CONSTRAINT  `accessory_norm_id` FOREIGN KEY (`norm_id`) REFERENCES zt_accessory_norm(`id`),
  CONSTRAINT  `accessory_brand_id` FOREIGN KEY (`brand_id`) REFERENCES zt_accessory_brand(`id`),
  CONSTRAINT  `accessory_type_id` FOREIGN KEY (`accessory_type`) REFERENCES zt_accessory_type(`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
CREATE TABLE IF NOT EXISTS `zt_accessory_category` (
  `category_name` VARCHAR(64)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;
INSERT INTO `zt_accessory_category` VALUES
('水电工'),
('木工'),
('瓦工'),
('油工'),
('辅料工具');
";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "DROP TABLE IF EXISTS `zt_accessory`;
                DROP TABLE IF EXISTS `zt_accessory_brand`;
                DROP TABLE IF EXISTS `zt_accessory_norm`;
                DROP TABLE IF EXISTS `zt_accessory_type`;
                DROP TABLE IF EXISTS `zt_accessory_category`";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
