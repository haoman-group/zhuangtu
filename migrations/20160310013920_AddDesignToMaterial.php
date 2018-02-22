<?php

use Phpmig\Migration\Migration;

class AddDesignToMaterial extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE zt_material add  COLUMN(
  `idea` varchar(255) DEFAULT '' COMMENT '设计理念',
  `attr_style` varchar(255) DEFAULT '' COMMENT '设计风格',
  `attr_area` varchar(255) DEFAULT '' COMMENT '案例面积',
  `attr_huxing` varchar(255) DEFAULT '' COMMENT '案例户型',
  `attr_jubu` varchar(255) DEFAULT '' COMMENT '局部设计',
  `attr_kongjian` varchar(255) DEFAULT '' COMMENT '独立空间',
  `attr_code` varchar(255) DEFAULT '' COMMENT '宝贝编码',
  `designer_qualification` varchar(255) DEFAULT '' COMMENT '',
  `is_personal` tinyint(1) DEFAULT '0' COMMENT '是否为专属设计师',
  `designer_name` varchar(255) DEFAULT '' COMMENT '专属设计师名字',
  `type` varchar(400) DEFAULT NULL  COMMENT '宝贝属性',
  `service_added` varchar(255) DEFAULT '' COMMENT '增值服务',
  `service_assurance` varchar(255) DEFAULT '' COMMENT '',
  `pictype_effect` varchar(255) DEFAULT '' COMMENT '出图类型-效果图',
  `pictype_cad` varchar(255) DEFAULT '' COMMENT '出图类型-CAD',
  `is_home` varchar(36) DEFAULT NULL COMMENT '主页显示',
  `designtype` tinyint(1) DEFAULT NULL COMMENT '设计类型',
  `price` float(10,2) DEFAULT '0.00' COMMENT '',
  `is_library` tinyint(1) DEFAULT '0' COMMENT '是否设计库',
  `audit` smallint(4) DEFAULT '10' COMMENT '',
  `shopin_category` varchar(255) DEFAULT ''  COMMENT ''
);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE zt_material drop  COLUMN  `shopid`;
        ALTER TABLE zt_material drop  COLUMN  `idea`;
        ALTER TABLE zt_material drop  COLUMN  `attr_style`;
        ALTER TABLE zt_material drop  COLUMN  `attr_area`;
        ALTER TABLE zt_material drop  COLUMN  `attr_huxing`;
        ALTER TABLE zt_material drop  COLUMN  `attr_jubu`;
        ALTER TABLE zt_material drop  COLUMN  `attr_kongjian`;
        ALTER TABLE zt_material drop  COLUMN  `attr_code`;
        ALTER TABLE zt_material drop  COLUMN  `designer_qualification`;
        ALTER TABLE zt_material drop  COLUMN  `is_personal`;
        ALTER TABLE zt_material drop  COLUMN  `designer_name`;
        ALTER TABLE zt_material drop  COLUMN  `type`;
        ALTER TABLE zt_material drop  COLUMN  `service_added`;
        ALTER TABLE zt_material drop  COLUMN  `service_assurance`;
        ALTER TABLE zt_material drop  COLUMN  `pictype_effect`;
        ALTER TABLE zt_material drop  COLUMN  `pictype_cad`;
        ALTER TABLE zt_material drop  COLUMN  `is_home`;
        ALTER TABLE zt_material drop  COLUMN  `designtype`;
        ALTER TABLE zt_material drop  COLUMN  `price`;
        ALTER TABLE zt_material drop  COLUMN  `is_library`;
        ALTER TABLE zt_material drop  COLUMN  `audit`;
        ALTER TABLE zt_material drop  COLUMN  `shopin_category`;
        ";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
