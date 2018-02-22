<?php

use Phpmig\Migration\Migration;

class MOdifyDataOfPosition extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "truncate table zt_position;INSERT INTO `zt_position` (`posid`, `modelid`, `catid`, `name`, `maxnum`, `extention`, `listorder`, `model`, `field`, `primarykey`, `pageid`) VALUES
(1, '0', '0', '网购设计－设计库', 10, '', 0, 'DesignLibrary', 'id,picture,shopid,proid,uid', 'id', 1),
(2, '0', '0', '网购设计－设计师', 4, '', 0, 'Designer', 'id,name,school,picture,qualification,idea,introduce,style', 'id', 1),
(3, '0', '0', '网购设计－设计公司', 24, '', 0, 'Shop', 'id,uid,catid,headpic,introduce,domain,logo', 'id', 1),
(4, '0', '0', '网购设计－工作室', 9, '', 0, 'Shop', 'id,uid,catid,headpic,introduce,name,logo,username', 'id', 1),
(5, '0', '0', '网购设计－每日低价', 48, '', 0, 'Product', 'id,title,idea,headpic,min_price,attr_style', 'id', 1),
(23, '', '', '06F-网购电器', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 7),
(22, '', '', '05F-网购家具', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 7),
(18, '', '', '01F-网购设计', 7, '', 0, 'Product', 'id,title,idea,min_price,max_price,headpic', 'id', 7),
(19, '', '', '02F-网购轻工', 7, '', 0, 'Product', 'id,title,workername,workyears,hometown,phone,selfevalu,headpic', 'id', 7),
(20, '', '', '03F-网购辅材', 7, '', 0, '', '', '', 7),
(21, '', '', '04F-网购主材', 7, '', 0, 'Product', 'id,uid,title,sell_points,min_price,max_price,number,headpic', 'id', 7);
";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "truncate table zt_position;INSERT INTO `zt_position` VALUES (1,'0','0','网购设计－设计库',10,'',0,'DesignLibrary','id,picture,shopid,proid,uid','id',0),(2,'0','0','网购设计－设计师',4,'',0,'Designer','id,name,school,picture,qualification,idea,introduce,style','id',1),(3,'0','0','网购设计－设计公司',24,'',0,'Shop','id,uid,catid,headpic,introduce,domain,logo','id',1),(4,'0','0','网购设计－工作室',9,'',0,'Shop','id,uid,catid,headpic,introduce,name,logo,username','id',1),(5,'0','0','网购设计－每日低价',48,'',0,'Product','id,title,idea,headpic,min_price,attr_style','id',1),(6,'','0','设计库－大家正在关注',14,'',0,'','','',0),(7,'','0','设计库－为您推荐',15,'',0,'','','',0),(9,'','0','网购轻工-装修队',4,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),(16,'','','网购轻工-装途推荐-家政服务',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),(15,'','','网购轻工-装途推荐-刮家油工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),(14,'','','网购轻工-装途推荐-吊顶木工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),(13,'','','网购轻工-装途推荐-铺地瓦工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),(12,'','','网购轻工-装途推荐-水电工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),(11,'','','网购轻工-装途推荐-拆卸工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),(10,'','','网购轻工-装途推荐-装修队',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
