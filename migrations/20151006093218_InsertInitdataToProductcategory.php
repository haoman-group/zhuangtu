<?php

use Phpmig\Migration\Migration;

class InsertInitdataToProductcategory extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "INSERT INTO `zt_product_category` VALUES (1,0,'全屋定制','1',0,'0',0),(1407,0,'居家布艺','1',0,'0',0),(5710,0,'装修设计/施工/监理','1',0,'0',0),(5735,0,'床上用品','1',0,'0',0),(20547,0,'电子/电工','1',0,'0',0),(30001,0,'五金/工具','1',0,'0',0),(44610,0,'商业/办公家具','1',0,'0',0),(49967,0,'家装主材','1',0,'0',0),(86527,0,'特色手工艺','1',0,'0',0),(86947,0,'家居饰品','1',0,'0',0),(92993,0,'住宅家具','1',0,'0',0),(148706,0,'﻿大家电','1',0,'0',0),(169373,0,'影音电器','1',0,'0',0),(193090,0,'个人护理/保健/按摩器材','1',0,'0',0),(137,1,'定制柜类','1',0,'0',0),(156,1,'定制淋浴房','1',0,'0',0),(240,1,'地暖/暖气片/散热器','1',0,'0',0),(433,1,'定制背景墙','1',0,'0',0),(434,1,'定制护墙板','1',0,'0',0),(437,1,'楼梯','1',0,'0',0),(928,1,'榻榻米空间','1',0,'0',0),(1084,1,'整体厨柜及配件','1',0,'0',0),(1260,1,'整体衣柜','1',0,'0',0),(1398,1,'整体吊顶定制','1',0,'0',0),(1399,1,'整木定制','1',0,'0',0),(1408,1407,'布料/面料/手工diy布料面料','1',0,'0',0),(1570,1407,'刺绣套件','1',0,'0',0),(1576,1407,'窗帘门帘及配件','1',0,'0',0),(1586,1407,'餐桌布艺','1',0,'0',0),(1594,1407,'地垫','1',0,'0',0),(1969,1407,'地毯','1',0,'0',0),(2359,1407,'防尘保护罩','1',0,'0',0),(3518,1407,'缝纫DIY材料、工具及成品','1',0,'0',0),(3685,1407,'挂毯/壁毯','1',0,'0',0),(3700,1407,'靠垫/抱枕','1',0,'0',0),(4318,1407,'毛巾/浴巾/浴袍','1',0,'0',0),(4319,1407,'十字绣及工具配件','1',0,'0',0),(5115,1407,'坐垫/椅垫/沙发垫','1',0,'0',0),(5711,5710,'监理','1',0,'0',0),(5717,5710,'局部装修','1',0,'0',0),(5720,5710,'清包施工','1',0,'0',0),(5721,5710,'设计','1',0,'0',0),(5723,5710,'施工','1',0,'0',0),(5727,5710,'装修验房/量房服务','1',0,'0',0),(5728,5710,'装修检测服务','1',0,'0',0),(5729,5710,'装修检测治理（新）','1',0,'0',0),(5736,5735,'被子/蚕丝被/羽绒被/棉被','1',0,'0',0),(8130,5735,'被套','1',0,'0',0),(9120,5735,'床品定制/定做(新)','1',0,'0',0),(9130,5735,'床单','1',0,'0',0),(9459,5735,'床罩','1',0,'0',0),(10074,5735,'床品套件/四件套/多件套','1',0,'0',0),(13079,5735,'床笠','1',0,'0',0),(13502,5735,'床幔','1',0,'0',0),(13654,5735,'床品配件','1',0,'0',0),(13774,5735,'床裙','1',0,'0',0),(14100,5735,'床垫/床褥/床护垫/榻榻米床垫','1',0,'0',0),(14772,5735,'床盖','1',0,'0',0),(14946,5735,'电热毯','1',0,'0',0),(14977,5735,'儿童床品','1',0,'0',0),(15784,5735,'凉席/竹席/藤席/草席/牛皮席','1',0,'0',0),(16216,5735,'其它','1',0,'0',0),(16571,5735,'睡袋','1',0,'0',0),(16649,5735,'蚊帐','1',0,'0',0),(17462,5735,'休闲毯/毛毯/绒毯','1',0,'0',0),(18812,5735,'枕套','1',0,'0',0),(19346,5735,'枕头/枕芯/保健枕/颈椎枕','1',0,'0',0),(20317,5735,'枕巾','1',0,'0',0),(20548,20547,'布线箱','1',0,'0',0),(20762,20547,'插座','1',0,'0',0),(23059,20547,'底盒','1',0,'0',0),(23231,20547,'电工配件','1',0,'0',0),(23380,20547,'断路器','1',0,'0',0),(23667,20547,'电线','1',0,'0',0),(24451,20547,'电工套管','1',0,'0',0),(24485,20547,'防盗报警器材及系统','1',0,'0',0),(25125,20547,'监控器材及系统','1',0,'0',0),(26234,20547,'接线板/插头','1',0,'0',0),(26923,20547,'交换器','1',0,'0',0),(26930,20547,'开关','1',0,'0',0),(28928,20547,'O2O专用（天猫专用）','1',0,'0',0),(28929,20547,'消防报警设备','1',0,'0',0),(29073,20547,'转换器','1',0,'0',0),(29283,20547,'智能家居系统','1',0,'0',0),(30002,30001,'安全检查设备','1',0,'0',0),(30036,30001,'变压器','1',0,'0',0),(30330,30001,'电动工具','1',0,'0',0),(31768,30001,'钢材','1',0,'0',0),(31810,30001,'机械五金','1',0,'0',0),(32733,30001,'机电五金','1',0,'0',0),(33606,30001,'紧固件','1',0,'0',0),(34091,30001,'节电器','1',0,'0',0),(34227,30001,'继电器','1',0,'0',0),(34594,30001,'LED设备','1',0,'0',0),(34753,30001,'铝型材','1',0,'0',0),(34799,30001,'气动工具','1',0,'0',0),(35386,30001,'刃具','1',0,'0',0),(36217,30001,'手动工具','1',0,'0',0),(42037,30001,'施工保护','1',0,'0',0),(42400,30001,'太阳能电池','1',0,'0',0),(42480,30001,'蓄电池','1',0,'0',0),(42584,30001,'仪器仪表','1',0,'0',0),(44379,30001,'液压/起重工具','1',0,'0',0),(44611,44610,'办公家具','1',0,'0',0),(48048,44610,'殡葬业家具','1',0,'0',0),(48064,44610,'超市家具','1',0,'0',0),(48286,44610,'城市家具','1',0,'0',0),(48486,44610,'餐饮/烘焙家具','1',0,'0',0),(48658,44610,'服装店家具','1',0,'0',0),(48850,44610,'发廊/美容家具','1',0,'0',0),(48945,44610,'货架/展柜','1',0,'0',0),(49390,44610,'酒店家具','1',0,'0',0),(49536,44610,'O2O专用（天猫专用）','1',0,'0',0),(49537,44610,'桑拿/足浴/健身家具','1',0,'0',0),(49584,44610,'校园教学家具','1',0,'0',0),(49660,44610,'娱乐/酒吧/KTV家具','1',0,'0',0),(49917,44610,'医疗家具','1',0,'0',0),(49968,49967,'背景墙软包/床头套/工艺软包','1',0,'0',0),(50013,49967,'厨房','1',0,'0',0),(51925,49967,'瓷砖','1',0,'0',0),(52972,49967,'灯具灯饰','1',0,'0',0),(69653,49967,'地板','1',0,'0',0),(70509,49967,'二手/闲置专区','1',0,'0',0),(70510,49967,'光源','1',0,'0',0),(72794,49967,'环保/除味/保养','1',0,'0',0),(73001,49967,'集成吊顶','1',0,'0',0),(73118,49967,'晾衣架/晾衣杆','1',0,'0',0),(73254,49967,'O2O专用（天猫专用）','1',0,'0',0),(73255,49967,'墙纸','1',0,'0',0),(74550,49967,'其它','1',0,'0',0),(74579,49967,'卫浴用品','1',0,'0',0),(86209,49967,'油漆','1',0,'0',0),(86211,49967,'浴霸','1',0,'0',0),(86528,86527,'地区民间特色手工艺','1',0,'0',0),(86727,86527,'海外工艺品','1',0,'0',0),(86748,86527,'其他特色工艺品','1',0,'0',0),(86749,86527,'少数民族特色工艺品','1',0,'0',0),(86884,86527,'宗教工艺品','1',0,'0',0),(86948,86947,'摆件','1',0,'0',0),(88362,86947,'壁饰','1',0,'0',0),(88590,86947,'创意饰品','1',0,'0',0),(88669,86947,'雕刻工艺','1',0,'0',0),(89067,86947,'风铃及配件','1',0,'0',0),(89100,86947,'工艺伞','1',0,'0',0),(89103,86947,'工艺船','1',0,'0',0),(89147,86947,'工艺扇','1',0,'0',0),(89175,86947,'花瓶/花器/仿真花/仿真饰','1',0,'0',0),(89915,86947,'家居钟饰/闹','1',0,'0',0),(90363,86947,'蜡烛/烛台','1',0,'0',0),(90492,86947,'其他工艺饰品','1',0,'0',0),(90536,86947,'贴饰','1',0,'0',0),(90910,86947,'相框/画框','1',0,'0',0),(91196,86947,'香薰炉','1',0,'0',0),(91320,86947,'装饰画','1',0,'0',0),(92273,86947,'照片/照片墙','1',0,'0',0),(92465,86947,'装饰器皿','1',0,'0',0),(92933,86947,'装饰架/装饰搁板','1',0,'0',0),(92963,86947,'装饰挂钩','1',0,'0',0),(92986,86947,'装饰挂牌','1',0,'0',0),(92994,92993,'案/台类','1',0,'0',0),(93571,92993,'床类','1',0,'0',0),(98285,92993,'床垫类','1',0,'0',0),(106377,92993,'成套家具','1',0,'0',0),(109095,92993,'二手/闲置专区','1',0,'0',0),(109096,92993,'根雕类','1',0,'0',0),(109260,92993,'户外/庭院家具','1',0,'0',0),(110003,92993,'柜类','1',0,'0',0),(125212,92993,'几类','1',0,'0',0),(128054,92993,'架类','1',0,'0',0),(131945,92993,'镜子类','1',0,'0',0),(132320,92993,'家具辅料','1',0,'0',0),(132375,92993,'家具服务（仅供集市服务商）','1',0,'0',0),(132376,92993,'O2O专用（天猫专用）','1',0,'0',0),(132377,92993,'屏风/花窗','1',0,'0',0),(132683,92993,'情趣家具','1',0,'0',0),(132726,92993,'沙发类','1',0,'0',0),(137501,92993,'设计师家具（NEW）','1',0,'0',0),(137735,92993,'箱类','1',0,'0',0),(137862,92993,'坐具类','1',0,'0',0),(137990,92993,'坐具类','1',0,'0',0),(143465,92993,'桌类','1',0,'0',0),(148707,148706,'冰箱','1',0,'0',0),(154068,148706,'厨房大电','1',0,'0',0),(158028,148706,'大家电配件','1',0,'0',0),(158042,148706,'烘干机','1',0,'0',0),(158090,148706,'酒柜','1',0,'0',0),(159416,148706,'空调','1',0,'0',0),(166256,148706,'冰柜/便携冷热箱','1',0,'0',0),(166530,148706,'平板电视','1',0,'0',0),(166699,148706,'其他电视机','1',0,'0',0),(166700,148706,'热水器','1',0,'0',0),(169321,148706,'洗衣机','1',0,'0',0),(169374,169373,'CD播放机','1',0,'0',0),(169462,169373,'电脑多媒体音箱','1',0,'0',0),(171496,169373,'耳机/耳麦','1',0,'0',0),(173014,169373,'耳机(麦)','1',0,'0',0),(173633,169373,'工程解决方案','1',0,'0',0),(174739,169373,'Hifi音箱/功放/器材','1',0,'0',0),(175992,169373,'黑胶唱片机','1',0,'0',0),(176175,169373,'回音壁音响','1',0,'0',0),(176249,169373,'家庭影院','1',0,'0',0),(176552,169373,'家庭影院配件','1',0,'0',0),(176553,169373,'扩音器/录像机','1',0,'0',0),(193091,193090,'家用保健器材','1',0,'0',0),(193097,193090,'家用护理辅助器材','1',0,'0',0),(193100,193090,'经络保健器材','1',0,'0',0),(193104,193090,'口腔护理','1',0,'0',0),(193110,193090,'美发工具','1',0,'0',0),(193116,193090,'美体瘦身','1',0,'0',0),(193128,193090,'美容美体辅助工具','1',0,'0',0),(193138,193090,'清洁美容工具','1',0,'0',0),(193145,193090,'其它个人护理','1',0,'0',0);";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "truncate table zt_product_category;";
        $container = $this->getContainer(); 
        $container['db']->query($sql);
    }
}
