<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>装途网-首页</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/index.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<!-- <div class="conwhole whole_imgbox">
  <a href="{$posdata['227']['1']['url']}" target="_blank"><img src="{$posdata['227']['1']['picture']['0']}" class="whole_img" /></a>
</div> -->
<template file="common/_searchindex.php"/>
<!--导航-->
<!--导航头-->
<!--保护容器-->
<div class="container gifimg container_index">
  <div class="left nav01">商品服务分类</div>
  <!-- <img class="left" src="{$config_siteurl}statics/zt/images/index/nav_01.jpg" >  -->
  <div class="nav_headcon">
    <ul class="nav_head gifimg clearfix">
       <li><a href="{:(U('Discount/brandStreet'))}" target="_blank"><div class="nav_headimg"><img class="gifimg" src="{$config_siteurl}statics/zt/images/index/33.gif" /> </div></a></li>
       <li><a href="{:(U('Public/home_decoration'))}" target="_blank">家装必读</a></li>
       <li><a href="{:(U('Accessory/index'))}" target="_blank">辅材直通车</a></li>
       <!-- <li><a href="{:(U('Designlibrary/index'))}">设计库</a></li> -->
       <!-- <li><a href="{:(U('Accessory/index'))}">辅材直通车</a></li> -->
       <!-- <li><a href="{:(U('Discount/sale'))}">天天特价</a></li> -->
       <li><a href="{:(U('Designlibrary/index'))}" target="_blank">设计库</a></li>
       <!-- <li><a href="{:(U('Discount/sale'))}" target="_blank">天天特价</a></li> -->
       <!-- <li><a href="{:(U('Public/error_404'))}">直播间</a></li> -->
      <!--  <li><a href="{:(U('Discount/groupBuy'))}">大家一起团</a></li> -->
         <li><a href="{:(U('Discount/suning'))}" target="_blank">苏宁易购专场</a></li>
         <li><a href="{:(U('Discount/spikepool'))}" target="_blank">秒杀专场</a></li>
       <!-- <li><a href="{:(U('Discount/discount'))}">折扣折扣</a></li> -->
       <!-- <li><a href="{:(U('Discount/discount'))}" target="_blank">折扣折扣</a></li> -->
      <li><a href="{:(U('Check/index'))}" target="_blank">预约验收</a></li>
      <!-- <li><a href="{:(U('Discount/spikepool'))}" target="_blank">秒杀专场</a></li> -->
      <li class="zs"><a href="http://95555.cmbchina.com/cmbO2O/LoanApply.aspx?loantype=13&citycode=ZTW&fromweb=01101040021000030003">招行家装贷款</a></li>

      <!--<li class="pk"><a href="/discount/autumnfestival" target="_blank"><img src="{$config_siteurl}statics/zt/images/autumnfestival/hemasmall.png" alt=""></a></li>-->
    </ul>
  </div>
</div>
<!--导航内容-->
<!--背景容器-->

<div class="conwhole navBg">
    <!--<div class="bgimg">
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg1_1.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg2.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg3.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg4.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg5.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg6.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg7.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg8.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg9.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg10.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg11.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg12.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg13.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg14.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg15.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg16.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg1_2.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg1_3.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg1_4.jpg"></a>
      <a href=""><img src="{$config_siteurl}statics/zt/images/index/navBg1_5.jpg"></a>
    </div>-->
<!--保护容器-->
    <!--保护容器-->

    <div class="container container_index conban clearfix">
         <!--左导航-->
        <div class="nav_left left ">
            <ul>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder1 nav_leftw">
                      <i></i>
                      <a  href="">家装流程</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder2 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Design/index')}">家装设计</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder3 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Worker/index')}">轻工</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'装修队'))}">装修队</a><!-- /<a href="">家政</a> -->
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder4 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Accessory/index')}">辅材</a><!-- /<a href="">铺地</a> -->
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder5 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'厨房卫浴'))}">厨房卫浴</a><!-- /<a href="">刮家</a> -->
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder6 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'瓷砖'))}"> 瓷砖</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'石材'))}">石材</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'木地板'))}">木地板</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder7 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'定制橱柜'))}"> 定制橱柜</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'衣柜'))}">衣柜</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'门'))}">门</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder8 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'乳胶漆'))}">乳胶漆</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'壁纸'))}">壁纸</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'硅藻泥'))}">硅藻泥</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder9 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'灯具'))}">灯具</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'开关'))}">开关</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'五金'))}">五金</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'门锁'))}">门锁</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder10 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'窗帘'))}"> 窗帘</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'软装'))}">软装</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder11 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'定制家具'))}">定制家具</a><!-- /<a href="">开关</a> -->
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder12 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Furniture/index')}">成品家具</a><!-- /<a href="">窗帘</a> -->
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder13 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'床'))}">床</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'家纺'))}">家纺</a>/<a target="_blank" href="{:U('Content/Search/search', array('searchkey'=>'家饰'))}">家饰</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder14 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Appliance/index')}">大家电</a><!-- /<a href="">生活小家电</a> -->
                  </div>
                  <b class="arrow"></b>
               </li>
              <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder15 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Appliance/index')}">厨房家电</a>
                  </div>
                  <b class="arrow"></b>
               </li>
               <li class="nav_lefttab">
                  <div  class="js_RLremove nav_hidder16 nav_leftw">
                      <i></i>
                      <a target="_blank" href="{:U('Content/Appliance/index')}">生活电器</a><!-- /<a href="">特殊材料</a> -->
                  </div>
                  <b class="arrow"></b>
               </li>

           </ul>
            <div class="nav_left04"><div class="nav_left03"></div><div class="nav_left05"></div></div>
        </div>
        <div class="nav_leftsub"><!--隐藏左导航定位-->
            <div class="nav_sub_narrow_box on left navleft_1">
                <p>
                    <a href="">家装必读</a>
                    <a href="">网购设计</a>
                    <a href="">网购轻工</a>
                    <a href="">网购辅材</a>
                    <a href="">网购主材</a>
                    <a href="">网购家具</a>
                    <a href="">网购家电</a>
                </p>
            </div>
            <div class="nav_sub_wide_box nav_sub_wide left navleft_2">
            <div class="nav_sub_wide">
                <strong>欧式：</strong>
                <p>
                    <a href="">简欧</a>
                    <a href="">英伦</a>
                    <a href="">法式复古</a>
                    <a href="">新古典</a>
                    <a href="">北欧风格</a>
                    <a href="">意大利风格</a>
                    <a href="">西班牙风格</a>
                    <a href="">地中海风格</a>
                </p>
                <strong>中式：</strong>
                <p>
                    <a href="">新中式</a>
                    <a href="">古典中式</a>
                    <a href="">现代中式</a>
                </p>
                <strong>现代:</strong>
                <p>
                    <a href="">现代简约</a>
                    <a href="">后现代</a>
                    <a href="">包豪斯风格</a>
                </p>
                <strong>田园：</strong>
                <p>
                    <a href="">小清新田园</a>
                    <a href="">英式田园</a>
                    <a href="">美式乡村</a>
                    <a href="">法式田园</a>
                    <a href="">中式田园</a>
                    <a href="">南亚田园</a>
                </p>
                <strong>地域设计：</strong>
                <p>
                    <a href="">港式设计</a>
                    <a href="">台湾</a>
                    <a href="">东南亚</a>
                    <a href="">日本</a>
                    <a href="">美式</a>
                </p>
                <strong>文艺复古：</strong>
                <p>
                    <a href="">loft</a>
                    <a href="">法式复古</a>
                    <a href="">美式复古</a>
                    <a href="">中式旧家具</a>
                </p>
                <strong>文艺复古：</strong>
                <p>
                    <a href="">loft</a>
                    <a href="">法式复古</a>
                    <a href="">美式复古</a>
                    <a href="">中式旧家具</a>
                </p>
                <strong>免费设计库</strong>
                <p>
                    <a href="">设计公司</a>
                    <a href="">南方设计</a>
                    <a href="">立方设计</a>
                </p>
            </div>
        </div>
            <div class="nav_sub_wide_box left navleft_3">
                <div class="nav_sub_wide">
                    <strong>装修队：</strong>
                    <p>
                        <a href="">资深工长</a>
                        <a href="">装修队伍</a>
                    </p>
                    <strong>轻工：</strong>
                    <p>
                        <a href="">水电工</a>
                        <a href="">铺地瓦工</a>
                        <a href="">吊顶木工</a>
                        <a href="">刮家油工</a>
                        <a href="">安装工人</a>
                    </p>
                    <strong>家政服务类：</strong>
                    <p>
                        <a href="">家政</a>
                        <a href="">打眼</a>
                        <a href="">拆除工</a>
                        <a href="">搬运工</a>
                        <a href="">装卸工</a>
                        <a href="">管道疏通</a>
                        <a href="">开锁</a>
                        <a href="">家电维修</a>
                        <a href="">电脑维修</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_4">
                <div class="nav_sub_wide">
                    <strong>走电材料：</strong>
                    <p>
                        <a href="">电线</a>
                        <a href="">网线</a>
                        <a href="">闭路线</a>
                        <a href="">空开</a>
                    </p>
                    <strong>走水材料：</strong>
                    <p>
                        <a href="">PPR水管</a>
                        <a href="">PVC下水管</a>
                        <a href="">管件阀门</a>
                        <a href="">地暖</a>
                        <a href="">暖气片
                        </a>
                    </p>
                    <strong>铺地材料：</strong>
                    <p>
                        <a href="">铺地防水</a>
                        <a href="">压边条</a>
                        <a href="">水不漏</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_5">
                <div class="nav_sub_wide">
                    <strong>吊顶木工材料：
                    </strong>
                    <p>
                        <a href="">木工板</a>
                        <a href="">石膏板</a>
                        <a href="">木龙骨</a>
                        <a href="">轻钢龙骨</a>
                    </p>
                    <strong>刮家材料：</strong>
                    <p>
                        <a href="">逆子</a>
                        <a href="">石膏粉</a>
                        <a href="">108胶</a>
                        <a href="">玻璃胶</a>
                        <a href="">石膏线</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_6">
                <div class="nav_sub_wide">
                    <strong>瓷砖：</strong>
                    <p>
                        <a href="">800*800地砖</a>
                        <a href="">600*600地砖</a>
                        <a href="">1000*1000地砖</a>
                        <a href="">300*300地砖</a>
                        <a href="">厨房墙砖</a>
                        <a href="">阳台墙砖</a>
                        <a href="">卫生间墙砖</a>
                        <a href="">抛光砖</a>
                        <a href="">玻化砖</a>
                        <a href="">釉面砖</a>
                        <a href="">仿古砖</a>
                        <a href="">微金石</a>
                        <a href="">马赛克</a>
                    </p>
                    <strong>石材：</strong>
                    <p>
                        <a href="">花岗岩</a>
                        <a href="">大理石</a>
                        <a href="">石英石</a>
                        <a href="">石灰石</a>
                        <a href="">砂岩</a>
                        <a href="">人造石</a>
                    </p>
                    <strong>木地板：</strong>
                    <p>
                        <a href="">实木地板</a>
                        <a href="">三层实木</a>
                        <a href="">多层实木</a>
                        <a href="">复合地板</a>
                        <a href="">竹地板</a>
                        <a href="">软木地板</a>
                        <a href="">进口木地板</a>
                    </p>
                    <strong>
                        瓷砖品牌：
                    </strong>
                    <p>
                        <a href="">诺贝尔瓷砖</a>
                        <a href="">蒙娜丽莎瓷砖</a>
                        <a href="">东鹏瓷砖</a>
                        <a href="">法恩莎瓷砖</a>
                    </p>
                    <strong>石材品牌：</strong>
                    <p>
                        <a href="">亚冠石材</a>
                        <a href="">利民石材</a>
                    </p>
                    <strong>木地板品牌：</strong>
                    <p>
                        <a href="">圣象</a>
                        <a href="">长颈鹿</a>
                        <a href="">德尔</a>
                        <a href="">大自然</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_7">
                <div class="nav_sub_wide">
                    <strong>洁具卫浴：</strong>
                    <p>
                        <a href="">面池</a>
                        <a href="">洗面台</a>
                        <a href="">洗面柜</a>
                        <a href="">台上盆</a>
                        <a href="">台下盆</a>
                        <a href="">浴缸</a>
                        <a href="">三角浴缸</a>
                        <a href="">全自动浴缸</a>
                        <a href="">坐便</a>
                        <a href="">一体式坐便</a>
                        <a href="">分体式坐便</a>
                        <a href="">蹲便池</a>
                        <a href="">小便池</a>
                        <a href="">花洒</a>
                        <a href="">恒温花洒</a>
                        <a href="">分体式花洒</a>
                        <a href="">面盆龙头</a>
                        <a href="">菜盆龙头</a>
                        <a href="">墩布龙头</a>
                        <a href="">洗衣机龙头</a>
                        <a href="">淋浴房</a>
                        <a href="">桑拿房</a>
                        <a href="">淋浴房玻璃隔断</a>
                        <a href="">毛巾架</a>
                        <a href="">镜柜</a>
                        <a href="">浴巾架</a>
                        <a href="">卫生间储物架</a>
                        <a href="">卫生纸架子</a>
                        <a href="">卫生间挂件</a>
                    </p>
                    <strong>换气浴霸：</strong>
                    <p>
                        <a href="">换气扇</a>
                        <a href="">浴霸</a>
                        <a href="">风暖浴霸</a>
                        <a href="">加热管浴霸</a>
                        <a href="">多功能浴霸</a>
                    </p>
                    <strong>洁具品牌：</strong>
                    <p>
                        <a href="">科勒</a>
                        <a href="">TOTO</a>
                        <a href="">九牧</a>
                        <a href="">雕牌</a>
                        <a href="">箭牌</a>
                    </p>
                    <strong>浴霸换气品牌：</strong>
                    <p>
                        <a href="">奥普浴霸</a>
                        <a href="">多普浴霸</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_8">
                <div class="nav_sub_wide">
                    <strong>橱柜：</strong>
                    <p>
                        <a href="">欧式橱柜</a>
                        <a href="">实木橱柜</a>
                        <a href="">现代橱柜</a>
                        <a href="">烤漆橱柜</a>
                    </p>
                    <strong>衣柜：</strong>
                    <p>
                        <a href="">实木衣柜</a>
                        <a href="">板式衣柜</a>
                        <a href="">柜门</a>
                    </p>
                    <strong>
                        门：
                    </strong>
                    <p>
                        <a href="">贴皮套装门</a>
                        <a href="">烤漆套装门</a>
                        <a href="">开放漆套装门</a>
                        <a href="">实木套装门</a>
                    </p>
                    <strong>橱柜品牌：</strong>
                    <p>
                        <a href="">欧派橱柜</a>
                        <a href="">海尔橱柜</a>
                        <a href="">科宝博洛尼橱柜</a>
                    </p>
                    <strong>衣柜品牌：</strong>
                    <p>
                        <a href="">索菲亚衣柜</a>
                        <a href="">好莱客衣柜</a>
                        <a href="">德维尔衣柜</a>
                    </p>
                    <strong>门品牌：</strong>
                    <p>
                        <a href="">3D木门</a>
                        <a href="">万宝木门</a>
                        <a href="">奥蒂斯木门</a>
                        <a href="">正丽门业</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_9">
                <div class="nav_sub_wide">
                    <strong>五金门锁：</strong>
                    <p>
                        <a href="">拉手</a>
                        <a href="">门锁</a>
                        <a href="">荷叶</a>
                        <a href="">挂件</a>
                        <a href="">大把手</a>
                    </p>
                    <strong>晾衣架：</strong>
                    <p>
                        <a href="">晾衣架</a>
                        <a href="">电动晾衣架</a>
                    </p>
                    <strong>五金门锁品牌：</strong>
                    <p>
                        <a href="">顶固门锁</a>
                        <a href="">樱花锁业</a>
                        <a href="">美易五金</a>
                    </p>
                    <strong>晾衣架品牌：</strong>
                    <p>
                        <a href="">好太太晾衣架</a>
                        <a href="">盼盼晾衣架</a>
                        <a href="">荣事达晾衣架</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_10">
                <div class="nav_sub_wide">
                    <strong>乳胶漆，油漆：</strong>
                    <p>
                        <a href="">环保乳胶漆</a>
                        <a href="">彩色乳胶漆</a>
                        <a href="">油漆</a>
                        <a href="">底漆</a>
                        <a href="">面漆</a>
                        <a href="">竹炭乳胶漆</a>
                        <a href="">海藻泥</a>
                    </p>
                    <strong>壁纸：</strong>
                    <p>
                        <a href="">壁纸</a>
                        <a href="">无纺布壁纸</a>
                        <a href="">pvc壁纸</a>
                        <a href="">纸浆壁纸</a>
                    </p>
                    <strong>乳胶漆品牌：</strong>
                    <p>
                        <a href="">多乐士</a>
                        <a href="">立邦漆</a>
                        <a href="">嘉宝莉漆</a>
                        <a href="">华润漆</a>
                    </p>
                    <strong>壁纸品牌：</strong>
                    <p>
                        <a href="">爱仕壁纸</a>
                        <a href="">嘉力丰</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_11">
                <div class="nav_sub_wide">
                    <strong>灯具：</strong>
                    <p>
                        <a href="">欧式吊灯</a>
                        <a href="">水晶灯</a>
                        <a href="">简约现代</a>
                        <a href="">吸顶灯</a>
                        <a href="">美式风格</a>
                        <a href="">工业设计灯</a>
                        <a href="">射灯</a>
                        <a href="">led灯</a>
                        <a href="">灯带</a>
                        <a href="">灯管</a>
                    </p>
                    <strong>开关：</strong>
                    <p>
                        <a href="">五孔插座</a>
                        <a href="">双控开关</a>
                        <a href="">usb五孔</a>
                        <a href="">闭路插座</a>
                        <a href="">网页插座</a>
                        <a href="">工业设计灯</a>
                        <a href="">射灯</a>
                        <a href="">led灯</a>
                        <a href="">灯带</a>
                        <a href="">灯管</a>
                    </p>
                    <strong>灯具品牌：</strong>
                    <p>
                        <a href="">欧普照明</a>
                        <a href="">雷士照明</a>
                        <a href="">飞利浦照明</a>
                        <a href="">三亚灯饰</a>
                    </p>
                    <strong>开关品牌：</strong>
                    <p>
                        <a href="">西门子开关</a>
                        <a href="">壁虎开关</a>
                        <a href="">德力西开关</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_12">
                <div class="nav_sub_wide">
                    <strong>窗帘：</strong>
                    <p>
                        <a href="">纱帘</a>
                        <a href="">百叶</a>
                        <a href="">呢绒</a>
                        <a href="">大欧式</a>
                    </p>
                    <strong>窗帘软装品牌</strong>
                    <p>
                        <a href="">名匠软装</a>
                        <a href="">大洋窗帘</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_13">
                <div class="nav_sub_wide">
                    <strong>客厅：</strong>
                    <p>
                        <a href="">沙发</a>
                        <a href="">茶几</a>
                        <a href="">电视柜</a>
                        <a href="">鞋柜</a>
                        <a href="">餐桌</a>
                    </p>
                    <strong>卧室：</strong>
                    <p>
                        <a href="">床</a>
                        <a href="">五斗柜</a>
                        <a href="">衣柜</a>
                        <a href="">贵妃榻</a>
                    </p>
                    <strong>书房：</strong>
                    <p>
                        <a href="">书柜</a>
                        <a href="">书桌</a>
                        <a href="">单人休闲沙发</a>
                    </p>
                    <strong>儿童房：</strong>
                    <p>
                        <a href="">滑梯床</a>
                        <a href="">卡通书桌</a>
                        <a href="">地垫</a>
                    </p>
                    <strong>床品：</strong>
                    <p>
                        <a href="">五件套</a>
                        <a href="">儿童套件</a>
                        <a href="">枕芯</a>
                        <a href="">靠垫</a>
                    </p>
                    <strong>摆件：</strong>
                    <p>
                        <a href="">花瓶</a>
                        <a href="">干枝</a>
                        <a href="">鱼缸</a>
                        <a href="">景观花</a>
                        <a href="">装饰画</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_14">
                <div class="nav_sub_wide">
                    <strong>电视，影音：</strong>
                    <p>
                        <a href="">平板</a>
                        <a href="">4k</a>
                        <a href="">3D</a>
                        <a href="">高清</a>
                        <a href="">网络电视</a>
                        <a href="">家庭音响</a>
                    </p>
                    <strong>厨卫家电：</strong>
                    <p>
                        <a href="">抽油烟机</a>
                        <a href="">煤气灶</a>
                        <a href="">热水器</a>
                        <a href="">净水器</a>
                        <a href="">小厨宝</a>
                    </p>
                    <strong>冰箱，洗衣机：</strong>
                    <p>
                        <a href="">双开门冰箱</a>
                        <a href="">对开门冰箱</a>
                        <a href="">酒柜</a>
                        <a href="">三门冰箱</a>
                        <a href="">零度保鲜冰箱</a>
                        <a href="">柜桶洗衣机</a>
                        <a href="">大容量洗衣机</a>
                        <a href="">小洗衣机</a>
                    </p>
                    <strong>生活家电：</strong>
                    <p>
                        <a href="">电饭锅</a>
                        <a href="">电磁炉</a>
                        <a href="">加湿器</a>
                        <a href="">电热水壶</a>
                        <a href="">高压锅</a>
                        <a href="">空气净化机</a>
                        <a href="">吸尘器</a>
                        <a href="">扫地机器人</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_15">
                <div class="nav_sub_wide">
                    <strong>异形定制，特殊材料：</strong>
                    <p>
                        <a href="">欧式脚线</a>
                        <a href="">罗马柱</a>
                        <a href="">中式格栅</a>
                        <a href="">机器扣花</a>
                        <a href="">开放漆木料</a>
                        <a href="">雕花楼梯</a>
                    </p>
                </div>
            </div>
            <div class="nav_sub_wide_box left navleft_16">
                <div class="nav_sub_wide">
                    <strong>智能家居：</strong>
                    <p>
                        <a href="">智能门锁</a>
                        <a href="">智能开关</a>
                        <a href="">智能窗帘</a>
                        <a href="">电子眼</a>
                        <a href="">远程监控</a>
                    </p>
                </div>
            </div>
        </div>
           <!--导航中部-->
        <div  class="nav_center left">
            <div class="nav_licon">
         <!-- <div class="nav_centertext"> -->
             <volist name="lunbo1" id="vo" key='k'>
              <a href="{$vo.url}">
                <img class="tab_nav" src="{$vo['picture']['0']}" title="{$vo.title}"/>
              </a>
              <a href="{$vo.url}">
                <img class="tab_img" src="{$vo['picture']['1']}" alt="">
              </a>
             </volist>
             <!-- </div>                -->
             <div class="nav_li">
               <ul>
                 <li value="1" class="tab_li1 tab_li"></li>
                 <li value="2" class="tab_li2 tab_li"></li>
                 <li value="3" class="tab_li3 tab_li"></li>
                 <li value="4" class="tab_li4 tab_li"></li>
                 <li value="5" class="tab_li5 tab_li"></li>
                 <li value="6" class="tab_li6 tab_li"></li>
               </ul>
             </div>
         <!-- <div class="nav_centertext">
           <img src="{$config_siteurl}statics/zt/images/index/2.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/2.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/3.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/4.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/5.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/6.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/7.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/8.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/9.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/10.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/11.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/12.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/13.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/14.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/15.png" alt="">
           <img src="{$config_siteurl}statics/zt/images/index/16.png" alt="">
         </div> -->
            <div class="nav_centertext">
            <volist name="lunbo2" id="vo">
            <a href="{$vo.url}" title="{$vo.title}"><img src="{$vo['picture']['1']}" alt=""></a>
            </volist>
            </div>
            <div class="nav_centerImg">
            <volist name="lunbo2" id="vo">
             <a href="{$vo.url}" title="{$vo.title}"><img class="js_imgBS nav_centerimg" src="{$vo['picture']['0']}" /></a>
            </volist>
            </div>
         <!-- <div class="nav_centerImg">
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg2.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg2.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg3.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg4.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg5.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg6.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg7.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg8.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg9.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg10.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg11.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg12.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg13.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg14.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg15.jpg" />
           <img class="js_imgBS nav_centerimg" src="{$config_siteurl}statics/zt/images/index/navBg16.jpg" />
         </div> -->
        </div>
        </div>
           <!--导航右端-->
           <div class="nav_right00con">
            <div class="nav_right00">
             <div class="nav_rightimg1">
              <a target="_blank" href="{:U('Furniture/index')}" class="js_LRremove">
                <h5><empty name="posdata['208'][1]['title']">楠木桌椅<else/>{$posdata.208.1.title}</empty></h5>
                <p><empty name="posdata['208'][1]['description']">要的不只是感觉，是品质<else/>{$posdata.208.1.description}</empty></p>
                <img src="<?php echo empty($posdata['208']['1']['picture']['0'])? $config_siteurl.'statics/zt/images/index/nav_rightImg1.png':$posdata['208']['1']['picture']['0'];?>" />
              </a>
              <!-- <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga2.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga3.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga4.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga5.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga6.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga7.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga8.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga9.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga10.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga11.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga12.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga13.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga14.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga15.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imga16.png" /></a> -->
             </div>
             <b></b>
             <div class="nav_rightimg1">
              <a target="_blank" href="{:U('Appliance/index')}" class="js_LRremove">
                 <h5><empty name="posdata['208'][2]['title']">全球家电<else/>{$posdata.208.2.title}</empty></h5>
                <p><empty name="posdata['208'][2]['description']">是品质让生活更美好<else/>{$posdata.208.2.description}</empty></p>
                <img src="<?php echo empty($posdata['208']['2']['picture']['0'])? $config_siteurl.'statics/zt/images/index/nav_rightImg2.png':$posdata['208']['2']['picture']['0'];?>" />
              </a>
              <!-- <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb2.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb3.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb4.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb5.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb6.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb7.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb8.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb9.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb10.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb11.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb12.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb13.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb14.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb15.png" /></a>
              <a href="#"><img class="js_LRremove" src="{$config_siteurl}statics/zt/images/index/nav_right-imgb16.png" /></a> -->
             </div>
           </div>
          </div>
     </div>
</div>
<!--背景-->
<div class="home_bgf5f5f5">

    <div class="container container_index">
         <!--网购家装全流程-->
         <div id="navImg">
              <h3><span>网购家装全流程</span><img src="{$config_siteurl}statics/zt/images/index/font-flow.png"></h3>
          <div class="navImg" id="F1">
             <div class="home_process">
              <a href="{:U('Design/index')}" target="_blank"><div class="home_process_1 js_LRremove"><img src="{$config_siteurl}statics/zt/images/index/six_icon/1.png" /></div></a>
              <a href="{:U('Worker/index')}" target="_blank"><div class="home_process_2 js_LRremove"><img src="{$config_siteurl}statics/zt/images/index/six_icon/2.png" /></div></a>
              <a href="{:(U('Accessory/index'))}" target="_blank"><div class="home_process_3 js_LRremove"><img src="{$config_siteurl}statics/zt/images/index/six_icon/3.png" /></div></a>
              <a href="{:U('Material/index')}" target="_blank"><div class="home_process_4 js_LRremove"><img src="{$config_siteurl}statics/zt/images/index/six_icon/4.png" /></div></a>
              <a href="{:U('Furniture/index')}" target="_blank"><div class="home_process_5 js_LRremove"><img src="{$config_siteurl}statics/zt/images/index/six_icon/5.png" /></div></a>
              <a class="hidden_1024" href="{:U('Appliance/index')}" target="_blank"><div class="home_process_6 js_LRremove"><img src="{$config_siteurl}statics/zt/images/index/six_icon/6.png" /></div></a>
             </div>
          </div>
         </div>
    </div>
</div>
<div class="container container_index">
     <!--商品展示-->
     <!-- <div class="home_gallery_nav" id="content2_con">
       <img src="{$config_siteurl}statics/zt/images/index/01.png" alt="618pk" class="title">
       <ul class="up clearfix">
         <li><a href="http://www.zhuangtu.net/s/QWZDJ" target="_blank"><img src="{$config_siteurl}statics/zt/images/index/06.png" alt=""></a></li>
         <li><a href="http://www.zhuangtu.net/s/snyg618ztd" target="_blank"><img src="{$config_siteurl}statics/zt/images/index/07.png" alt=""></a></li>
       </ul>
       <ul class="down clearfix">
         <li><a href="{:(U('Discount/sale'))}" target="_blank"><img src="{$config_siteurl}statics/zt/images/index/02.png" alt="天天特价"></a></li>
         <li><a href="{:(U('Discount/spikepool'))}" target="_blank"><img src="{$config_siteurl}statics/zt/images/index/03.png" alt="秒杀池"></a></li>
         <li><a href="{:(U('Discount/groupBuy'))}" target="_blank"><img src="{$config_siteurl}statics/zt/images/index/04.png" alt="大家一起团"></a></li>
         <li><a href="{:(U('Discount/discount'))}" target="_blank"><img src="{$config_siteurl}statics/zt/images/index/05.png" alt="折扣就是折扣"></a></li>
       </ul>
     </div> -->
     <ul class="home_gallery_nav" id="content2_con">
              <a href="{:(U('Public/home_decoration'))}" target="_blank">
                <li class="content2_con1 Content2_01 ">
                  <div class="img_area">
                      <img class="js_LRremove" src=<?php echo empty($posdata['205']['1']['picture']['0'])? $config_siteurl.'statics/zt/images/index/Content2_001.jpg':$posdata['205']['1']['picture']['0'];?> />
                  </div>
                  <div class="img">
                      <h4>家装必读</h4>
                      <h3>HOME READING</h3>
                      <p>无需成为专家&nbsp;&nbsp;&nbsp;&nbsp;但要了解过程</p>
                      <!-- <img src="{$config_siteurl}statics/zt/images/index/trangle.png" alt=""> -->
                  </div>
                </li>
              </a>
              <a href="{:(U('Discount/sale'))}" target="_blank" class="n2">
                  <li class="content2_con1 Content2_02 ">
                      <div class="img_area">
                        <img class="js_LRremove" src=<?php echo empty($posdata['205']['2']['picture']['0'])? $config_siteurl.'statics/zt/images/index/Content2_002.jpg':$posdata['205']['2']['picture']['0'];?> />
                      </div>
                      <div class="img">
                        <h4>天天特价</h4>
                        <h3>EVERY DAY SPECIAL</h3>
                        <p>特价秒杀爆款&nbsp;&nbsp;&nbsp;&nbsp;省钱在这里找</p>
                        <!-- <img src="{$config_siteurl}statics/zt/images/index/trangle.png" alt=""> -->
                      </div>
                  </li>
              </a>
              <a href="{:(U('Check/index'))}" target="_blank">
                  <li class="content2_con1 Content2_03  hidden_1024">
                      <div class="img_area">
                         <img class="js_LRremove" src=<?php echo empty($posdata['205']['3']['picture']['0'])? $config_siteurl.'statics/zt/images/index/Content2_003.jpg':$posdata['205']['3']['picture']['0'];?> />
                      </div>
                      <div class="img">
                         <h4>预约验收</h4>
                         <h3>DEAL AND CHECK</h3>
                         <p>专业验收流程&nbsp;&nbsp;&nbsp;&nbsp;分布式有保证</p>
                        <!-- <img src="{$config_siteurl}statics/zt/images/index/trangle.png" alt=""> -->
                      </div>
                  </li>
              </a>
              <!-- <a class="show_1024 left" href="{:(U('Check/index'))}" target="_blank">
                <li>
                  <div class="img">
                      <h4>预约验收</h4>
                        <p>专业验收流程&nbsp;&nbsp;&nbsp;&nbsp;分布式有保证</p>
                    </div>
                </li>
              </a> -->

              <a href="{:(U('Discount/discount'))}" target="_blank" class="n2">
                <li class="content2_con1 Content2_04 ">
                  <div class="img_area">
                      <img class="js_LRremove" src=<?php echo empty($posdata['205']['4']['picture']['0'])? $config_siteurl.'statics/zt/images/index/Content2_004.jpg':$posdata['205']['4']['picture']['0'];?> />
                  </div>
                  <div class="img">
                      <h4>折扣折扣</h4>
                      <h3>SALE SALE</h3>
                      <p>折扣是一种态度&nbsp;&nbsp;&nbsp;&nbsp;打折是一种方式</p>
                      <!-- <img src="{$config_siteurl}statics/zt/images/index/trangle.png" alt=""> -->
                  </div>
                </li>
              </a>
              <a href="{:(U('Discount/brandStreet'))}" target="_blank">
                <li class="content2_con1 Content2_05 ">
                  <div class="img_area">
                      <img class="js_LRremove" src=<?php echo empty($posdata['205']['5']['picture']['0'])? $config_siteurl.'statics/zt/images/index/Content2_005.jpg':$posdata['205']['5']['picture']['0'];?> />
                  </div>
                  <div class="img">
                      <h4>品牌街</h4>
                      <h3>BRAND STREET</h3>
                      <p>只有你想不到的&nbsp;&nbsp;&nbsp;&nbsp;没有你找不到的</p>
                        <!-- <img src="{$config_siteurl}statics/zt/images/index/trangle.png" alt=""> -->
                  </div>
                </li>
              </a>
              <a href="{:(U('Store/zking'))}" target="_blank" class="n2">
                <li class="content2_con1 Content2_06  hidden_1024">
                    <div class="img_area">
                      <img class="js_LRremove" src=<?php echo empty($posdata['205']['6']['picture']['0'])? $config_siteurl.'statics/zt/images/index/Content2_006.jpg':$posdata['205']['6']['picture']['0'];?> />
                    </div>
                    <div class="img">
                      <h4>家装保险</h4>
                      <h3>HOME INSURANCE</h3>
                      <p>给自己的家&nbsp;&nbsp;&nbsp;&nbsp;买份保险</p>
                      <!-- <img src="{$config_siteurl}statics/zt/images/index/trangle.png" alt=""> -->
                    </div>
              </li>
              </a>
              <!-- <a class="show_1024 left" href="" target="_blank" class="n2">
                <li>
                  <div class="img">
                      <h4>直播厅</h4>
                        <p>看得见的进度&nbsp;&nbsp;&nbsp;&nbsp;心里才有底</p>
                    </div>
                </li>
              </a>   -->
     </ul>
     <!--主体内容-->
</div>
<div class="home_bgf5f5f5">
    <div class="container container_index">

         <!--广告位-->
         <a href="{$posdata['177']['1']['url']}" target="_blank"><img src="{$posdata['177']['1']['picture']['0']}" /></a>
         <ul class="home_gallery">

            <!--1F-->
            <li id="F2" class="bgfff">
              <a href="{:U('Design/index')}" target="_blank">
                <img class="floor" src="{$config_siteurl}statics/zt/images/index/floor/Content_01.png" style="width:190px;"/>
              </a>
              <volist name="posdata['18']" id="vo"  key="k">
                <if condition='$k == 1'>
                  <a href="{$vo.url}" target="_blank">
                    <img class="big"  src="{$vo.picture.0}">
                  </a>
                  <div class="ul">
                <else/>
                  <switch name="k" >
                    <case value="4"><div class="li hidden_1024"></case>
                    <case value="5"><div class="li line_down"></case>
                    <case value="6"><div class="li line_down"></case>
                    <case value="7"><div class="li line_down hidden_1024"></case>
                    <default /><div class="li">
                  </switch>
                      <!-- <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank"> -->
                      <a href="{$vo.url}" target="_blank">
                          <div class="person">
                            <div class="personDsc">
                              <span class="name">{$vo.title|stristr=###,',','1'}</span>
                              <span class="year"><?php echo substr($vo['title'],stripos($vo['title'],',')+1);?></span>
                              <p class="style">{$vo.description}</p>
                            </div>
                          </div>
                            <img  src="{$vo.picture.0}" >
                        </a>
                    </div>
                  </if>
                </volist>
                <empty name="posdata['18']['1']"> <div class="ul"></div><else/></div></empty>
                <div class="rightBorder"></div>
              </li>
               <!--2F-->
              <li id="F3" class="bgfff">
                <a href="{:U('Worker/index')}" target="_blank">
                     <img class="floor" src="{$config_siteurl}statics/zt/images/index/floor/Content_02.png"/>
                </a>
                <volist name="posdata['19']" id="vo"  key="k">
                  <if condition='$k == 1'>
                    <a href="{$vo.url}">
                      <img class="big"  src="{$vo.picture.0}">
                    </a>
                    <div class="ul">
                  <else/>
                    <switch name="k" >
                      <case value="4"><div class="li hidden_1024"></case>
                      <case value="5"><div class="li line_down"></case>
                      <case value="6"><div class="li line_down"></case>
                      <case value="7"><div class="li line_down hidden_1024"></case>
                      <default /><div class="li">
                    </switch>
                        <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                            <div class="person">
                              <div class="personDsc">
                                 <span class="name">{$vo.title|stristr=###,',','1'}</span>
                              <span class="year"><?php echo substr($vo['title'],stripos($vo['title'],',')+1);?></span>
                                <p class="style">{$vo.description}</p>
                                <!-- <span class="price">¥<strong>{$vo.data.min_price|getIntOfPrice=###}</strong><i>{$vo.data.min_price|getFloatOfPrice=###}</i></span> -->
                              </div>
                            </div>
                            <img  src="{$vo.picture.0}" >
                        </a>
                    </div>
                  </if>
                </volist>
                <empty name="posdata['19']['1']"> <div class="ul"></div><else/></div></empty>
                <div class="rightBorder"></div>
              </li>
               <!--3F-->
              <li id="F4">

                <a href="{:(U('Accessory/index'))}" target="_blank">
                     <img class="floor" src="{$config_siteurl}statics/zt/images/index/floor/Content_03.png"/>
                </a>
                    <a href="{$posdata['20']['1']['url']}" target="_blank">
                      <img class="big"  src="{$posdata['20']['1']['picture']['0']}">
                    </a>
                    <div class="ul">
                  <div class="li">
                        <a href="{$posdata['20']['2']['url']}" target="_blank">
                            <div class="product">
                                <span class="name">净味美得丽  5L/桶</span>
                                <!-- <p class="explain">{$vo.description}</p>-->
                                <span class="price">¥<strong>189</strong><i>.00</i></span>
                            </div>
                            <img  src="{$posdata['20']['2']['picture']['0']}" >
                        </a>
                    </div>
                    <div class="li">
                        <a href="{$posdata['20']['3']['url']}" target="_blank">
                            <div class="product">
                                <span class="name">德力西电线100米/卷4平方</span>
                                <!-- <p class="explain">{$vo.description}</p>-->
                                <span class="price">¥<strong>129</strong><i>.60</i> </span>
                            </div>
                            <img  src="{$posdata['20']['3']['picture']['0']}" >
                        </a>
                    </div>
                <div class="li hidden_1024">
                        <a href="{$posdata['20']['4']['url']}" target="_blank">
                            <div class="product">
                                <span class="name">腾飞EO木工板</span>
                                 <!--<p class="explain">{$vo.description}</p> -->
                                <span class="price">¥<strong>159</strong><i>.90</i> </span>
                            </div>
                            <img  src="{$posdata['20']['4']['picture']['0']}" >
                        </a>
                    </div>
                    <div class="li line_down">
                        <a href="{$posdata['20']['5']['url']}" target="_blank">
                            <div class="product">
                                <span class="name">雨虹吉士涂100 18kg/桶</span>
                                 <!--<p class="explain">{$vo.description}</p>-->
                                <span class="price">¥<strong>149</strong><i>.90</i> </span>
                            </div>
                            <img  src="{$posdata['20']['5']['picture']['0']}" >
                        </a>
                    </div>
                    <div class="li line_down">
                        <a href="{$posdata['20']['6']['url']}" target="_blank">
                            <div class="product">
                                <span class="name">易呱平800JJ(耐水腻子)</span>
                                <!-- <p class="explain">{$vo.description}</p> -->
                                <span class="price">¥<strong>45</strong><i>.50</i> </span>
                            </div>
                            <img  src="{$posdata['20']['6']['picture']['0']}" >
                        </a>
                    </div>
                    <div class="li line_down hidden_1024">
                        <a href="{$posdata['20']['7']['url']}" target="_blank">
                            <div class="product">
                                <span class="name">伟星冷热水管  2.2*3.4</span>
                                <!-- <p class="explain">{$vo.description}</p> -->
                                <span class="price">¥<strong>30</strong><i>.70</i> </span>
                            </div>
                            <img  src="{$posdata['20']['7']['picture']['0']}" >
                        </a>
                    </div>
                </div>
                <div class="rightBorder"></div>
              </li>
               <!--4F-->
              <li  id="F5">
                <a href="{:U('Material/index')}" target="_blank">
                     <img class="floor" src="{$config_siteurl}statics/zt/images/index/floor/Content_04.png"/>
                </a>
                <volist name="posdata['21']" id="vo"  key="k">
                  <if condition='$k == 1'>
                    <a href="{$vo.url}" target="_blank">
                      <img class="big"  src="{$vo.picture.0}">
                    </a>
                    <div class="ul">
                  <else/>
                    <switch name="k" >
                      <case value="4"><div class="li hidden_1024"></case>
                      <case value="5"><div class="li line_down"></case>
                      <case value="6"><div class="li line_down"></case>
                      <case value="7"><div class="li line_down hidden_1024"></case>
                      <default /><div class="li">
                    </switch>
                        <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                            <div class="product">
                                <span class="name">{$vo.title}</span>
                                <!-- <p class="explain">{$vo.description}</p> -->
                                <span class="price">¥<strong>{$vo.data.min_price|getIntOfPrice=###}</strong><i>{$vo.data.min_price|getFloatOfPrice=###}</i></span>
                            </div>
                            <img  src="{$vo.picture.0}" >
                        </a>
                    </div>
                  </if>
                </volist>
                <empty name="posdata['21']['1']"> <div class="ul"></div><else/></div></empty>
                <div class="rightBorder"></div>
              </li>
               <!--广告位-->
               <!-- <a href="" target="_blank"><img src="{$config_siteurl}statics/zt/images/index/Content4_AD.png" class="home_cross_ad" /></a> -->
               <a href="{$posdata['209']['1']['url']}" target="_blank"><img src="{$posdata['209']['1']['picture']['0']}" class="home_cross_ad" /></a>
               <!--5F-->
              <li  id="F6">

                <a href="{:U('Furniture/index')}" target="_blank">
                     <img class="floor" src="{$config_siteurl}statics/zt/images/index/floor/Content_05.png"/>
                </a>
                <volist name="posdata['22']" id="vo"  key="k">
                  <if condition='$k == 1'>
                    <a href="{$vo.url}" target="_blank">
                      <img class="big"  src="{$vo.picture.0}">
                    </a>
                    <div class="ul">
                  <else/>
                    <switch name="k" >
                      <case value="4"><div class="li hidden_1024"></case>
                      <case value="5"><div class="li line_down"></case>
                      <case value="6"><div class="li line_down"></case>
                      <case value="7"><div class="li line_down hidden_1024"></case>
                      <default /><div class="li">
                    </switch>
                        <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                            <div class="product">
                                <span class="name">{$vo.title}</span>
                                <!-- <p class="explain">{$vo.description}</p> -->
                                <span class="price">¥<strong>{$vo.data.min_price|getIntOfPrice=###}</strong><i>{$vo.data.min_price|getFloatOfPrice=###}</i></span>
                            </div>
                            <img  src="{$vo.picture.0}" >
                        </a>
                    </div>
                  </if>
                </volist>
                <empty name="posdata['22']['1']"> <div class="ul"></div><else/></div></empty>
                <div class="rightBorder"></div>
              </li>
               <!--6F-->
              <li  id="F7">

                <a href="{:U('Appliance/index')}" target="_blank">
                     <img class="floor" src="{$config_siteurl}statics/zt/images/index/floor/Content_06.png"/>
                </a>
                                <volist name="posdata['23']" id="vo"  key="k">
                  <if condition='$k == 1'>
                    <a href="{$vo.url}" target="_blank">
                      <img class="big"  src="{$vo.picture.0}">
                    </a>
                    <div class="ul">
                  <else/>
                    <switch name="k" >
                      <case value="4"><div class="li hidden_1024"></case>
                      <case value="5"><div class="li line_down"></case>
                      <case value="6"><div class="li line_down"></case>
                      <case value="7"><div class="li line_down hidden_1024"></case>
                      <default /><div class="li">
                    </switch>
                        <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                            <div class="product">
                                <span class="name">{$vo.title}</span>
                                <!-- <p class="explain">{$vo.description}</p> -->
                                <span class="price">¥<strong>{$vo.data.min_price|getIntOfPrice=###}</strong><i>{$vo.data.min_price|getFloatOfPrice=###}</i></span>
                            </div>
                            <img  src="{$vo.picture.0}" >
                        </a>
                    </div>
                  </if>
                </volist>
                <empty name="posdata['23']['1']"> <div class="ul"></div><else/></div></empty>
                <div class="rightBorder"></div>
              </li>
         </ul>
        <!-- <div class="">
          <a href="{$posdata['228']['1']['url']}" target="_blank"><img src="{$posdata['228']['1']['picture']['0']}" style="width:100%"/></a>
        </div>
        <div class="">
          <a href="{$posdata['228']['2']['url']}" target="_blank"><img src="{$posdata['228']['2']['picture']['0']}" style="width:100%"/></a>
        </div> -->
    </div>

</div>

<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>
<!--隐藏搜索-->
<!--背景容器-->
<div class="conwhole hidden_searchBg">
<!--保护容器-->
     <div class="container container_index">
     <img src="{$config_siteurl}statics/zt/images/logo_05.png" class="logo" />
      <div class="hidden_searchbox" >
        <form class="searform" action="{:U('Content/Search/search')}" method="get">
              <input type="text" class="inpsear" placeholder="搜索你喜欢的" name="searchkey">
              <input type="submit" class="btnsear" value="搜索" >
        </form>
       </div>
     </div>
</div>

<!--固定图标-->
    <!--固定高度-->
   <!-- <div class="home_ltfix_con">
      <div class="home_ltfix_con1">
      <div class="home_ltfix_con2">

      <a class="home_ltfix1 home_ltfix" href="#F1"><div class="home_ltfixcon">橱窗</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-07.png" /></a>
      <a class="home_ltfix2 home_ltfix" href="#F2"><div class="home_ltfixcon">设计</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-08.png" /></a>
      <a class="home_ltfix3 home_ltfix" href="#F3"><div class="home_ltfixcon">轻工</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-09.png" /></a>
      <a class="home_ltfix4 home_ltfix" href="#F4"><div class="home_ltfixcon">辅材</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-10.png" /></a>
      <a class="home_ltfix5 home_ltfix" href="#F5"><div class="home_ltfixcon">主材</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-11.png" /></a>
      <a class="home_ltfix6 home_ltfix" href="#F6"><div class="home_ltfixcon">家具</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-12.png" /></a>
      <a class="home_ltfix7 home_ltfix" href="#F7"><div class="home_ltfixcon">电器</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-14.png" /></a>
      </div>
      </div>
   </div> -->


   <div class="home_ltfix_con">
      <!--定位左右-->
      <div class="home_ltfix_con1">
        <div class="home_ltfix_con2">
          <a class="home_ltfix1 home_ltfix" href="#F1"><div class="home_ltfixcon">橱窗</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-07.png" /></a>
          <a class="home_ltfix2 home_ltfix" href="#F2"><div class="home_ltfixcon">设计</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-08.png" /></a>
          <a class="home_ltfix3 home_ltfix" href="#F3"><div class="home_ltfixcon">轻工</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-09.png" /></a>
          <a class="home_ltfix4 home_ltfix" href="#F4"><div class="home_ltfixcon">辅材</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-10.png" /></a>
          <a class="home_ltfix5 home_ltfix" href="#F5"><div class="home_ltfixcon">主材</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-11.png" /></a>
          <a class="home_ltfix6 home_ltfix" href="#F6"><div class="home_ltfixcon">家具</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-12.png" /></a>
          <a class="home_ltfix7 home_ltfix" href="#F7"><div class="home_ltfixcon">家电</div><img class="home_ltfiximg" src="{$config_siteurl}statics/zt/images/index/fixleft/36_36-14.png" /></a>
        </div>
      </div>
   </div>
<script>
$(function(){
  var floorjson = {"floor1":"ea1b33","floor2":"f4641c","floor3":"f7a619","floor4":"9fc551","floor5":"4ab2e3","floor6":"18b5bc"}

  $(".home_gallery li").each(function(i, v) {
    $self = $(this);
    $explain = $self.find(".product .explain");
    name = "floor"+(i+1);
    color = floorjson[name];
    $self.attr("data-color",color);
    $self.css("border-top-color","#"+color);
    $explain.css("color","#"+color);
    });
})

// 首页欢迎来到装途首页
$(function(){
  $('#zt_index').html('欢迎来到装途首页');
})

var j=0;
var i=0;
var tab;
var navleft=0;

//初始化
$(document).ready(function(){
  $(".tab_nav:eq(0)").show();
  $(".tab_img:eq(0)").animate({opacity:1},1000).css({'z-index':'3'});
})
timedCount=function timedCount(i){

  if(i%6==0){
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_nav").hide().css({'z-index':'-1'});
      $(".tab_nav:eq(0)").show().css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[1]['description'])?'#a34bfb':$lunbo1[1]['description'];?>");
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(".tab_li1").css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
      $(".tab_img:eq(0)").animate({opacity:1},1000).css({'z-index':'3'});
  }
 if(i%6==1){
    $(".tab_img").css({opacity:0,'z-index':'0'});
    $(".tab_nav").hide().css({'z-index':'-1'});
    $(".tab_nav:eq(1)").show().css({'z-index':'3'});
    $(".navBg").css("background-color","<?=empty($lunbo1[2]['description'])?'#fffdc4':$lunbo1[2]['description'];?>");
    $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
    $(".tab_li2").css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    $(".tab_img:eq(1)").animate({opacity:1},1000).css({'z-index':'3'});
  }
 if(i%6==2){
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_nav").hide().css({'z-index':'-1'});
    $(".tab_nav:eq(2)").show().css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[3]['description'])?'#211d1a':$lunbo1[3]['description'];?>");
    $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
    $(".tab_li3").css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    $(".tab_img:eq(2)").animate({opacity:1},1000).css({'z-index':'3'});
  }
  if(i%6==3){
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_nav").hide().css({'z-index':'-1'});
    $(".tab_nav:eq(3)").show().css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[4]['description'])?'#eff0f2':$lunbo1[4]['description'];?>");
    $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
    $(".tab_li4").css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    $(".tab_img:eq(3)").animate({opacity:1},1000).css({'z-index':'3'});
  }
  if(i%6==4){
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_nav").hide().css({'z-index':'-1'});
    $(".tab_nav:eq(4)").show().css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[5]['description'])?'#b7fbfe':$lunbo1[5]['description'];?>");
    $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
    $(".tab_li5").css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    $(".tab_img:eq(4)").animate({opacity:1},1000).css({'z-index':'3'});
  }
  if(i%6==5){
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_nav").hide().css({'z-index':'-1'});
    $(".tab_nav:eq(5)").show().css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[6]['description'])?'#014dab':$lunbo1[6]['description'];?>");
    $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
    $(".tab_li6").css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    $(".tab_img:eq(5)").animate({opacity:1},1000).css({'z-index':'3'});
  }
  i=i+1;
  $('.nav_li').css("z-index","4");
   tab=setTimeout("timedCount("+i+")",4000);
  }

// 停止轮播函数
function stopCount(){
  clearTimeout(tab);
  return;
}
// 鼠标划上小圆点
$(document).ready(function(){
  timedCount(6);
  $(".tab_li1").mouseenter(function(){
        stopCount();
      $(".nav_centertext").removeClass("nav_centertt");
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
      $(".tab_nav").hide();
      $(".tab_nav:eq(0)").show().css({'z-index':'3'});
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_img").stop();
      $(".tab_img:eq(0)").animate({opacity:1},1000).css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[1]['description'])?'#a34bfb':$lunbo1[1]['description'];?>");
      })
          $(".tab_li1").mouseleave(function(){
          // timedCount(6);
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    })
  $(".tab_li2").mouseenter(function(){
        stopCount();
        $(".nav_centertext").removeClass("nav_centertt");
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
      $(".tab_nav").hide();
      $(".tab_nav:eq(1)").show().css({'z-index':'3'});
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_img").stop();
      $(".tab_img:eq(1)").animate({opacity:1},1000).css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[2]['description'])?'#fffdc4':$lunbo1[2]['description'];?>");
    })
      $(".tab_li2").mouseleave(function(){
      // timedCount(6);
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    })
  $(".tab_li3").mouseenter(function(){
        stopCount();
        $(".nav_centertext").removeClass("nav_centertt");
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
      $(".tab_nav").hide();
      $(".tab_nav:eq(2)").show().css({'z-index':'3'});
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_img").stop();
      $(".tab_img:eq(2)").animate({opacity:1},1000).css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[3]['description'])?'#211d1a':$lunbo1[3]['description'];?>");
    })
      $(".tab_li3").mouseleave(function(){
      // timedCount(6);
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    })
  $(".tab_li4").mouseenter(function(){
        stopCount();
        $(".nav_centertext").removeClass("nav_centertt");
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
      $(".tab_nav").hide();
      $(".tab_nav:eq(3)").show().css({'z-index':'3'});
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_img").stop();
      $(".tab_img:eq(3)").animate({opacity:1},1000).css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[4]['description'])?'#eff0f2':$lunbo1[4]['description'];?>");
    })
      $(".tab_li4").mouseleave(function(){
      // timedCount(6);
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    })
  $(".tab_li5").mouseenter(function(){
        stopCount();
        $(".nav_centertext").removeClass("nav_centertt");
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
      $(".tab_nav").hide();
      $(".tab_nav:eq(4)").show().css({'z-index':'3'});
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_img").stop();
      $(".tab_img:eq(4)").animate({opacity:1},1000).css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[5]['description'])?'#b7fbfe':$lunbo1[5]['description'];?>");
    })
      $(".tab_li5").mouseleave(function(){
      // timedCount(6);
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    })
  $(".tab_li6").mouseenter(function(){
        stopCount();
        $(".nav_centertext").removeClass("nav_centertt");
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
      $(".tab_nav").hide();
      $(".tab_nav:eq(5)").show().css({'z-index':'3'});
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_img").stop();
      $(".tab_img:eq(5)").animate({opacity:1},1000).css({'z-index':'3'});
      $(".navBg").css("background-color","<?=empty($lunbo1[6]['description'])?'#014dab':$lunbo1[6]['description'];?>");
    })
      $(".tab_li6").mouseleave(function(){
      // timedCount(6);
      $(".tab_li").css({"background-color":"rgba(0,0,0,0.4)","border":"1px solid transparent"});
      $(this).css({"background-color":"rgba(255,255,255,0.8)","border":"1px solid #999"});
    })

})


$(function(){
    $('.nav_leftw').mouseenter(function(){
      stopCount();
      $(".tab_img").css({opacity:0,'z-index':'0'});
      $(".tab_nav").hide().css({'z-index':'-1'});
    })
    $('.nav_leftw').mouseleave(function(){
       tab=setTimeout("timedCount("+i+")",4000);

    })
  $(".nav_hidder1").mouseenter(function(){
    $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(0)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(0)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[1]['description'])?'#e1e1e1':$lunbo2[1]['description'];?>");
    $(".nav_rightimg1").attr("src","/statics/zt/images/index/nav_right-img1.png");
        $(".nav_rightimg2").attr("src","/statics/zt/images/index/nav_right-img2.png");
    })
    $(".nav_hidder1").mouseleave(function(){

    })

    $(".nav_lefttab").mouseenter(function(){
       $(".nav_centerImg").css("z-index","0");
           $(".nav_li").css("z-index","-1");
       //stopCount();

      })
  $(".nav_hidder2").mouseenter(function(){
    $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(1)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(1)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[2]['description'])?'#fdfdfa':$lunbo2[2]['description'];?>");
     $(".nav_rightimg1").attr("src","/statics/zt/images/index/nav_right-img2.png");
     $(".nav_rightimg2").attr("src","/statics/zt/images/index/nav_right-img1.png");

    })
    $(".nav_hidder2").mouseleave(function(){

    })
  $(".nav_hidder3").mouseenter(function(){
    $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(2)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(2)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[3]['description'])?'#fde3b0':$lunbo2[3]['description'];?>");
     $(".nav_rightimg1").attr("src","/statics/zt/images/index/nav_right-img2.png");
     $(".nav_rightimg2").attr("src","/statics/zt/images/index/nav_right-img1.png");
    })
    $(".nav_hidder3").mouseleave(function(){


    })
  $(".nav_hidder4").mouseenter(function(){
    $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(3)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(3)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[4]['description'])?'#020611':$lunbo2[4]['description'];?>");
    })
    $(".nav_hidder4").mouseleave(function(){

    })
    $(".nav_hidder5").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(4)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(4)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[5]['description'])?'#ced4d7':$lunbo2[5]['description'];?>");
    })
    $(".nav_hidder5").mouseleave(function(){

    })
    $(".nav_hidder6").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(5)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(5)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[6]['description'])?'#9B1E2C':$lunbo2[6]['description'];?>");
    })
    $(".nav_hidder6").mouseleave(function(){

    })
    $(".nav_hidder7").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(6)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(6)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[7]['description'])?'#0d5a88':$lunbo2[7]['description'];?>");
    })
    $(".nav_hidder7").mouseleave(function(){

    })
    $(".nav_hidder8").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(7)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(7)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[8]['description'])?'#eae5eb':$lunbo2[8]['description'];?>");
    })
    $(".nav_hidder8").mouseleave(function(){

    })
    $(".nav_hidder9").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(8)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(8)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[9]['description'])?'#010608':$lunbo2[9]['description'];?>");
    })
    $(".nav_hidder9").mouseleave(function(){

    })
    $(".nav_hidder10").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(9)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(9)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[10]['description'])?'#f3f1e4':$lunbo2[10]['description'];?>");
    })
    $(".nav_hidder10").mouseleave(function(){

    })
    $(".nav_hidder11").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(10)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(10)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[11]['description'])?'#f5f5f3':$lunbo2[11]['description'];?>");
    })
    $(".nav_hidder11").mouseleave(function(){

    })
    $(".nav_hidder12").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(11)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(11)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[12]['description'])?'#fed403':$lunbo2[12]['description'];?>");
    })
    $(".nav_hidder12").mouseleave(function(){

    })
    $(".nav_hidder13").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(12)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(12)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[13]['description'])?'#000000':$lunbo2[13]['description'];?>");
    })
    $(".nav_hidder13").mouseleave(function(){

    })
    $(".nav_hidder14").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(13)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(13)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[14]['description'])?'#f6f7fb':$lunbo2[14]['description'];?>");
    })
    $(".nav_hidder14").mouseleave(function(){

    })
    $(".nav_hidder15").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(14)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(14)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[15]['description'])?'#f7f7f7':$lunbo2[15]['description'];?>");
    })
    $(".nav_hidder15").mouseleave(function(){

    })
    $(".nav_hidder16").mouseenter(function(){
      $(".nav_centerImg img").hide();
        $(".nav_centertext img").css({"opacity":"0","z-index":"0"});
        $(".nav_centerImg img:eq(15)").show();
        $(".nav_centertext img").stop();
        $(".nav_centertext img:eq(15)").animate({opacity:1},1000).css({"z-index":"2"});

      $(".navBg").css("background-color","<?=empty($lunbo2[16]['description'])?'#000512':$lunbo2[16]['description'];?>");
    })
    $(".nav_hidder16").mouseleave(function(){

    })


   // 左侧导航三角显示
        $(".nav_lefttab").mouseenter(function(){
        $(this).css("background-color","#000");
        $(this).find('.arrow').css('display','inline-block');
        })
      $(".nav_lefttab").mouseleave(function(){
        $(this).css("background-color","transparent");
        $('.arrow').css('display','none');
        })

      $(".nav_left04").mousemove(function(){
        $(".nav_sub_wide_box").hide();
        $(".nav_sub_narrow_box").hide();
      })

});

</script>
<!--<a href="/discount/autumnfestival" target="_blank" id="tong" style="display:none;background:transparent;">
  <img src="{$config_siteurl}statics/zt/images/autumnfestival/hema.png" alt="河马" />
</a>-->
<!-- <div class="qixibg" id="qixibg">
    <a href="javascript:void(0)" class="btnclose"></a>
  <a href="/discount/tanabata" target="_blank" class="asec">
      <img src=""  alt="地毯" class="footcloth" />
      <div class="hemadiv  hemascale">
          <div class="heartbox">

          </div>
          <img src="{$config_siteurl}statics/zt/images/tanabata/hema.png" class="hema"  alt="河马"  />
      </div>
  </a>
</div>
<div class="smallzt">
  <a href="/discount/tanabata" target="_blank"><img src="{$config_siteurl}statics/zt/images/tanabata/all.png" alt="装途仔"  /></a>
</div> -->

<!-- <audio id="adsy" src="" autoplay style="width: 0px; height: 0px; opacity: 0;"></audio> -->

<script>
// $(function(){
//     if( !$.cookie("autumnfestival")){
//         layer.open({
//           type: 1,
//           title: false,
//           closeBtn: 1,
//           offset:'center',
//           area: '850px',
//           skin: 'hebg', //没有背景色
//           shade: 0,
//           shadeClose: true,
//           content: $('#tong'),
//           success:function(){
//             $.cookie("autumnfestival",1,{path:"/",expire:7});
//           },
//           end:function(){
//             $(".pk").show();
//           }
//         });
//     }else{
//         $(".pk").show();
//     }
// });

/*(function($){
    $.fn.heartcell = function(element , options){
        var defaults ={
                bagCount : 8,
                minSpeed : 12,
                maxSpeed : 36,
                btype : 0,
                maxv : 1000,
                minv : 100,
                norv : 200,
                maxtop : 200
            },
            options = $.extend(defaults, options),
            random = function random(min, max){
                return Math.round(min + Math.random()*(max-min));
            };

        element =".heartbox";

        function Bag(_x,_y,_speed,_btype,_bv,_id){
            this.id = _id;
            this.x  = _x;
            this.y  = _y;
            this.id = _id;
            this.speed  = _speed;
            this.btype  = _btype;
            this.bv = _bv;

            var bagE = $("<img src='{$config_siteurl}statics/zt/images/tanabata/heartver.png'>").attr("id","bag_"+this.id).attr("data-btype",this.btype).css({"top":this.y+"px","left":this.x+"px","z-index":99-this.id});


            if($(element).get(0).tagName === $(document).get(0).tagName){
                $('body').append(bagE);
                element = $('body');
            }else{
                $(element).append(bagE);
            }

            $(element).append(bagE);


            this.element = $("#bag_"+this.id)[0];
            this.jelement = $("#bag_"+this.id);

            this.update = function(){

                this.x += this.speed;
                if(this.x > 200){
                    this.reset();
                }


                this.jelement.css("left",this.x+"px");
            }

            this.reset = function(){
                this.x = -25;
                this.y = random(40,options.maxtop);
                this.speed = random(options.minSpeed, options.maxSpeed)*10/100;
                //this.btype = random(0,4);
                $("#bag_"+this.id).attr("data-btype",this.btype).css({"top":this.y+"px","left":this.x+"px"}).find("dd");

            }

        }


        var bags = [],
            bagid = 0,
            i = 0,
            elHeight = $(element).height(),
            elWidth = $(element).width();

        for(i = 0; i < options.bagCount; i+=1){
            var bagId = bags.length;

            bags.push(new Bag(random(-70,-4), random(40,options.maxtop), random(options.minSpeed, options.maxSpeed)*10/100, i, 200, bagId));
        }

        function bagsmove(){
            for( i = 0; i < bags.length; i += 1){
                bags[i].update();
            }

            snowTimeout = setTimeout(function(){bagsmove()}, 60);
        }

        bagsmove();

        this.clear = function(){
            $(element).find(".bag").remove();
            bags =[];
            clearTimeout(snowTimeout);
        }




    }
})(jQuery)*/

  // 七夕专题弹框
/*$(function(){

    if( !$.cookie("qixib")){
        var imgditan = new Image();
        imgditan.src= "{$config_siteurl}statics/zt/images/tanabata/ditan.png";
        imgditan.onload=function(){
            $(".footcloth").attr("src",imgditan.src);
            $(".qixibg").show().find(".btnclose").css("opacity",1);
            setTimeout(function(){$(".footcloth").addClass("footclothopen")},200);
            $(".heartbox").heartcell();
            setTimeout(function(){$(".hemadiv").removeClass("hemascale")},2400);

            $.cookie("qixib",1,{path:"/",expire:7});
            $("audio").attr("src","{$config_siteurl}statics/zt/images/tanabata/marryu.mp3");
        }


    }
    else{
        $(".smallzt").show();
    }

    $(".qixibg .btnclose").click(function(){
        $(".qixibg").remove();
        $(".smallzt").show();
        $("#adsy").remove();
    })

    $(".qixibg .asec").click(function(){
        $(this).siblings(".btnclose").trigger("click");
    });

});*/
</script>
</body>
</html>
