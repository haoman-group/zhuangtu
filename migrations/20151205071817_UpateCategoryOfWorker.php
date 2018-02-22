<?php

use Phpmig\Migration\Migration;

class UpateCategoryOfWorker extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    { 
        $sql = "update zt_product_category set name='装修队'  where cid=103;
                update zt_product_category set name='拆卸工'  where cid=104;
                update zt_product_category set name='水电工'  where cid=105;
                update zt_product_category set name='铺地瓦工' where cid=106;
                update zt_product_category set name='吊顶木工' where cid=107;
                update zt_product_category set name='刮家油工' where cid=108;
                INSERT INTO `zt_product_category` (`cid`, `parent_cid`, `name`, `status`, `listorder`, `addtime`, `isdelete`, `is_parent`)
                VALUES (112,0,'家政服务','0',0,'1449299119',0,1),
                (1121,112,'安装工','0',0,'',0,0),
                (1122,112,'搬运工','0',0,'',0,0),
                (1123,112,'打眼/疏通','0',0,'',0,0),
                (1124,112,'清洁工','0',0,'',0,0),
                (1125,112,'开锁','0',0,'',0,0),
                (1126,112,'家电维修','0',0,'',0,0);";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = " delete from zt_product_category where cid=112;
                update zt_product_category set name='电工'  where cid=103;
                update zt_product_category set name='水暖工' where cid=104;
                update zt_product_category set name='瓦工'  where cid=105;
                update zt_product_category set name='木工'  where cid=106;
                update zt_product_category set name='油漆工' where cid=107;
                update zt_product_category set name='小工'  where cid=108;
                delete from zt_product_category where cid>=1121 and cid<=1126;";
        $container = $this->getContainer();
        $container['db']->query($sql); 
    }
}
