<?php

use Phpmig\Migration\Migration;

class UpdatePosition extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql ="truncate table zt_position;
               INSERT INTO `zt_position` VALUES 
               (1,'0','0','网购设计－设计库',10,'',0,'DesignLibrary','id,picture,shopid,proid,uid','id',0),
               (2,'0','0','网购设计－设计师',4,'',0,'Designer','id,name,school,picture,qualification,idea,introduce,style','id',1),
               (3,'0','0','网购设计－设计公司',24,'',0,'Shop','id,uid,catid,headpic,introduce,domain,logo','id',1),
               (4,'0','0','网购设计－工作室',9,'',0,'Shop','id,uid,catid,headpic,introduce,name,logo,username','id',1),
               (5,'0','0','网购设计－每日低价',48,'',0,'Product','id,title,idea,headpic,min_price,attr_style','id',1),
               (6,'','0','设计库－大家正在关注',14,'',0,'','','',0),(7,'','0','设计库－为您推荐',15,'',0,'','','',0),
               (9,'','0','网购轻工-装修队',4,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),
               (16,'','','网购轻工-装途推荐-家政服务',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),
               (15,'','','网购轻工-装途推荐-刮家油工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),
               (14,'','','网购轻工-装途推荐-吊顶木工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),
               (13,'','','网购轻工-装途推荐-铺地瓦工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),
               (12,'','','网购轻工-装途推荐-水电工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),
               (11,'','','网购轻工-装途推荐-拆卸工',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2),
               (10,'','','网购轻工-装途推荐-装修队',8,'',0,'Worker','id,title,workername,headpic,workyears,crafttype,shopid','id',2);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql ="truncate table zt_position;
               INSERT INTO `zt_position` VALUES (1,'0','0','网购设计－设计库',10,'',0,'DesignLibrary','id,picture,shopid,proid,uid','id',0),
               (2,'0','0','网购设计－设计师',4,'',0,'Designer','id,name,school,picture,qualification,idea,introduce,style','id',1),
               (3,'0','0','网购设计－设计公司',45,'',0,'Shop','id,uid,catid','id',0),(4,'0','0','网购设计－工作室',15,'',0,'Shop','id,uid,catid','id',0),
               (5,'0','0','网购设计－每日低价',11,'',0,'Product','id,title,headpic,price','id',0),(6,'','','设计库－大家正在关注',14,'',0,'','','',0),
               (7,'','','设计库－为您推荐',15,'',0,'','','',0);";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
