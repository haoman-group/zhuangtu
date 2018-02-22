<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>网购设计</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/design.js"> </script>
    <style type="text/css">
        body{ font-family: "Microsoft YaHei";}
        .scalebox{ width: 100%; min-width: 1190px; position: relative}
        .scale{ left: 0; width: 100%; position: absolute; top: 0;}
        @media screen and (max-width: 1366px) {
            .scale{
                transform: scale(1, 0.8);
                -moz-transform: scale(1, 0.8);
                -webkit-transform: scale(1, 0.8);
                -o-transform: scale(1, 0.8);
                transform-origin:50% 0%;
                -moz-transform-origin: 50% 0%;
                -webkit-transform-origin:50% 0%;
                -o-transform-origin:50% 0%;
            }
            .scale .container{
                transform: scale(0.8, 1);
                -moz-transform: scale(0.8, 1);
                -webkit-transform: scale(0.8, 1);
                -o-transform: scale(0.8, 1);
                transform-origin:50% 0%;
                -moz-transform-origin: 50% 0%;
                -webkit-transform-origin:50% 0%;
                -o-transform-origin:50% 0%;
            }
            .design_home_navbg .up{  bottom: -110px;  }
        }
    </style>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<div class="scalebox">

    <div class="scale">
        <!--导航-->
        <!--背景容器-->
        <div class="conwhole navBg design_home_navbg">
            <!--<div class="nav_conleft">
            <img src="{$config_siteurl}statics/zt/images/design/design_navleft.png" />
            </div>
            <div class="nav_conright">
            <img src="{$config_siteurl}statics/zt/images/design/design_navright.png" />
            </div> -->
            <!--保护容器-->
            <div class="container">
                <img class="txt" src="{$config_siteurl}statics/zt/images/design/design_navtext1.png" />
                <!-- <a href="#F0"><img class="up" src="{$config_siteurl}statics/zt/images/design/design_navup.png"></a> -->
                <form action="" class="design_form">
                    <input type="text" placeholder="家，从设计开始 ing.../">
                    <input type="submit" value="查看更多">
                </form>
            </div>
        </div>
        <!--背景容器-->
        <!--背景容器-->
        <div id="F0" class="conwhole design_nav">           
            <div class="container design_navin">
                <img src="{$config_siteurl}statics/zt/images/design/design_1ftitletext.png" alt="">
            </div>
        </div>
        <!--内容-->
        <!--保护容器-->
        <div id="F1" class="container">
            <div class="design_ku">
                <ul class="title clearfix">
                    <volist name='style' id='vo'>
                        <li><a href="{:(U('Designlibrary/lists',array('style'=>$vo['value'],'page'=>1)))}">{$vo.value}</a></li>
                    </volist>
                </ul>
                <div class="kuul jsaddimgbox" data-jsaddimg="png" data-jsaddimgname="{$config_siteurl}statics/zt/images/design/design_content1img">
                    <volist name="tream" id="vo" offset='0' length='6'>
                    <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                      <div class="kuli">
                        <img src={$vo.picture.0} alt="" class="img" />
                        <p class="description"><strong>{$vo.title.0} /</strong><span>{$vo.title.1}{$vo.title.2}</span></p>
                        <div class="kutxts">
                            <h5>{$vo.title.0}</h5>
                            <p class="desc">{$vo.description}</p>
                            <hr />
                            <p class="price">￥{$vo.data.min_price}/平米</p>
                            <span>查看详情 ></span>
                        </div>                           
                      </div>
                    </a>
                    </volist>
                </div>
            </div>
        </div>

        <!-- 设计库特别推荐 -->
        <div id="F0" class="conwhole despecial_nav">           
            <div class="container despecial_navin">
                <img src="{$config_siteurl}statics/zt/images/design/design_specialtitletext.png" alt="">
            </div>
        </div>
        <!--内容-->
        <!--保护容器-->
        <div class="design_spe_boxs">
            <div id="F5" class="container design_spe_sec">
                <!-- <div class="design_title">
                    <span>每日低价设计风</span>
                    低价也有好设计 便宜也会用心做
                </div> -->
                <div class="design_spe_box">
                    <div class="design_spe_ul">
                        <ul class="design_spe_li">
                            <volist name="lower" id="vo" offset='0' length='8'>
                                <li>
                                    <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                                        <div class="img">
                                            <img src={$vo.picture.0}>
                                            <div class="explain">
                                                <p>{$vo.description}</p>
                                                <div class="buy">点击购买系列产品</div>
                                            </div>
                                        </div>
                                        <span class="style">{$vo.title}</span>
                                        <span class="money">¥{$vo.data.min_price}/平米</span>
                                        <span class="moneyold">原价<del>¥{$vo.data.min_price_ori}/平米</del></span></a>
                                    <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" class="collect">收藏</a>
                                </li>
                            </volist>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="design_void"></div>
        <!--设计师-->
        <div id="F0" class="conwhole designer_nav">           
            <div class="container designer_navin">
                <img src="{$config_siteurl}statics/zt/images/design/designer_titletext.png" alt="">
            </div>
        </div>
        <div class="conwhole big_designer">
            <ul class="container">
                <li class="on">大牌设计</li>
                <li>高端设计师</li>
            </ul>
        </div>
        <!--背景容器-->
        <div class="conwhole design_er">
            <!--保护容器-->
            <div id="F2" class="container">
                <!-- <div class="design_title">
                    <span>太原知名设计师</span>
                    知名设计打造 专业家居服务
                </div> -->
                <div class="content2_con jsaddimgbox clearfix" data-jsaddimg="jpg" data-jsaddimgname="{$config_siteurl}statics/zt/images/design/design_content2imgs">
                    <a href="http://www.zhuangtu.net/s/GQWSNKJSJ" target="_blank" class="design_erlibox">
                        <div class="design_erli">
                            <div class="design_erli_main">
                                <img class="peopimg" src="{$config_siteurl}statics/zt/images/design/designer/10.jpg" />
                                <div class="design_erli_down">
                                    <strong>郭庆伟</strong><i>Guo QingWei</i>
                                    <p class="desc">擅长风格：复古怀旧风、工业风、简约时尚风等</p>
                                    <p class="year">工作年限：12年</p>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                                <div class="design_erli_up">
                                    <strong>郭庆伟</strong>
                                    <p class="introduce">中国建筑学会室内设计分会会员太原市<br/>郭庆伟室内空间装饰设计工作室设计总监</p>
                                    <p class="style">擅长风格：复古怀旧风、工业风、<br />简约时尚风等</p>
                                    <p class="year">工作年限：12年</p>
                                    <div class="design_erli_enter">
                                        <div class="buy">ENTER</div>
                                    </div>
                                    <div class="design_erli_pics">
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/11.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/12.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/13.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/14.jpg" />
                                    </div>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </a>
                    <a href="http://www.zhuangtu.net/s/HHW" target="_blank" class="design_erlibox">
                        <div class="design_erli">
                            <div class="design_erli_main">
                                <img class="peopimg" src="{$config_siteurl}statics/zt/images/design/designer/20.jpg" />
                                <div class="design_erli_down">
                                    <strong>回华伟</strong><i>Hui HuaWei</i>
                                    <p class="desc">带着一份责任去思考，让设计创造价值</p>
                                    <p class="year">工作年限：7年</p>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                                <div class="design_erli_up">
                                    <strong>回华伟</strong>
                                    <p class="introduce">九宸空间设计主创设计师</p>
                                    <p class="style">擅长风格：美式、现代、中式</p>
                                    <p class="year">工作年限：7年</p>
                                    <div class="design_erli_enter">
                                        <div class="buy">ENTER</div>
                                    </div>
                                    <div class="design_erli_pics">
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/21.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/22.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/23.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/24.jpg" />
                                    </div>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </a>
                    <a href="http://www.zhuangtu.net/s/KONESJ" target="_blank" class="design_erlibox">
                        <div class="design_erli">
                            <div class="design_erli_main">
                                <img class="peopimg" src="{$config_siteurl}statics/zt/images/design/designer/30.jpg" />
                                <div class="design_erli_down">
                                    <strong>金虹滔</strong><i>Jin HongTao</i>
                                    <p class="desc">擅长风格：后现代，工业风，新古典，混搭</p>
                                    <p class="year">工作年限：10年</p>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                                <div class="design_erli_up">
                                    <strong>金虹滔</strong>
                                    <p class="introduce">资深设计师<br/>中国室内设计协会会员<br/>现任K-one创意设计机构设计总监</p>
                                    <p class="style">擅长风格：后现代，工业风，新古典，混搭</p>
                                    <p class="year">工作年限：10年</p>
                                    <div class="design_erli_enter">
                                        <div class="buy">ENTER</div>
                                    </div>
                                    <div class="design_erli_pics">
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/31.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/32.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/33.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/34.jpg" />
                                    </div>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </a>
                    <a href="http://www.zhuangtu.net/s/DMSJ" target="_blank" class="design_erlibox">
                        <div class="design_erli">
                            <div class="design_erli_main">
                                <img class="peopimg" src="{$config_siteurl}statics/zt/images/design/designer/40.jpg" />
                                <div class="design_erli_down">
                                    <strong>张峰</strong><i>Zhang Feng</i>
                                    <p class="desc">一尘不染、素净澄明。用平静的心灵看世界，利用淡淡的家具布局把原有的空间净化，把气质和品位含蓄地表现出来……</p>
                                    <p class="year">工作年限：10多余年</p>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                                <div class="design_erli_up">
                                    <strong>张峰</strong>
                                    <p class="introduce">室内设计协会“2009年优秀室内设计师”称号<br/>室内设计协会“2015年优秀室内设计师”称号</p>
                                    <p class="style">擅长户型：公装、美式<br/>法式、新中式</p>
                                    <p class="year">工作年限：10多余年</p>
                                    <div class="design_erli_enter">
                                        <div class="buy">ENTER</div>
                                    </div>
                                    <div class="design_erli_pics">
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/41.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/42.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/43.jpg" />
                                        <img class="" src="{$config_siteurl}statics/zt/images/design/designer/44.jpg" />
                                    </div>
                                    <div class="att">
                                        <span>关注TA</span>
                                    </div>
                                    <div class="imp">
                                        <span>雇佣TA</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <!-- 高端设计师 -->
        <div class="conwhole big_designer">
            <ul class="container">
                <li>大牌设计</li>
                <li class="on">高端设计师</li>
            </ul>
        </div>
        <!--背景容器-->
        <div class="conwhole design_er">
            <!--保护容器-->
            <div id="F2" class="container">
                <!-- <div class="design_title">
                    <span>太原知名设计师</span>
                    知名设计打造 专业家居服务
                </div> -->
                <div class="content2_con jsaddimgbox" data-jsaddimg="jpg" data-jsaddimgname="{$config_siteurl}statics/zt/images/design/design_content2imgs">
                    <volist name="highdesigner" id="vo">
                    <a href="{$vo['url']}" target="_blank" class="high_end_designerbox">
                        <div class="design_erli high_end_designer">
                            <img class="backimg" src="{$vo['picture']['0']}" />
                            <p class="TA clearfix"><span>关注TA</span><strong>雇用TA</strong></p>
                            <p class="name">{$vo['title']['0']}</p>
                            <p class="year">工作年限：{$vo['title']['1']}</p>
                            <p class="desc">{$vo['description']}</p>
                            <img src="{$vo['picture']['1']}" alt="" class="pernimg">
                        </div>
                    </a>
                </volist>
                   
                </div>

            </div>
        </div>

        <!--设计公司logo-->
        <div id="F0" class="conwhole descom_nav">           
            <div class="container descom_navin">
                <img src="{$config_siteurl}statics/zt/images/design/design_companytitletext.png" alt="">
            </div>
        </div>
        <!--背景容器-->
        <div class="conwhole design_comlogo_bg">
            <!--保护容器-->
            <!--保护容器-->
            <div id="F3" class="container clearfix">
                <!-- <div class="design_title fff">
                    <span>太原知名设计公司</span>
                    最优秀的团队 最优质的服务
                </div> -->
                <ul class="design_comlogoul clearfix">
                    <volist name="run" id="vo"  offset='0' length='12'>
                        <li>
                            <a href="{$vo.url}" target="_blank">
                                <img src="{$vo.picture.0} ">
                                <h5 hidden>{$vo.title}</h5>
                                <p hidden>{$vo.description}</p>
                            </a>
                        </li>
                    </volist>
                </ul>
                <div class="design_company_special">
                    <a href="">
                        <!-- <img src="" alt="">
                        <h5>海棠红设计公司</h5>
                        <p>陕西省太原市长风桥西万国城MOMA5-2-102</p>
                        <input type="button" value="立即预约"> -->
                    </a>
                </div>
            </div>
        </div>
        <!-- 推荐灵感 -->
        <div id="F0" class="conwhole desinspiration_nav">           
            <div class="container desinspiration_navin clearfix">
                <div class="inspiration_center">
                    <h2>推荐灵感</h2>
                    <h5>
                        <p>更多灵感 点击查看</p>
                        <span>More Inspiration Click to view</span>
                    </h5>
                    <a href="">></a>
                </div>                
            </div>
        </div>
        <!--设计公司-->
        <!--背景容器-->
        <div id="F4" class="conwhole design_inspiration">
            <!--保护容器-->
            <!--保护容器-->
            <div class="container">
                <!-- <div class="design_title">
                    <span>太原知名设计工作室</span>
                    小而精致 小而专注 小而唯美
                </div> -->
                <div class="designer_top">
                    <div class="left leftimg"><a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['1']['dataid']))}"><img src="{$DesignInspiration['1']['picture']['0']}" alt=""></a></div>
                    <div class="right rightimg">
                        <img src="{$DesignInspiration['1']['picture']['1']}" alt="">
                        <img src="{$DesignInspiration['1']['picture']['2']}" alt="">
                        <h5>－ {$DesignInspiration['1']['title']} －</h5>
                        <p><span>活动价：</span><i>￥</i><strong>{$DesignInspiration['1']['data']['min_price']}</strong><a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['1']['dataid']))}">立即查看></a></p>
                    </div>
                </div>
                <ul class="designer_box clearfix">
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['2']['dataid']))}"><img src="{$DesignInspiration['2']['picture']['0']}" alt=""></a>
                        <div class="img_desc">
                            <p>{$DesignInspiration['2']['title']}</p>
                            <span>[装途价]：<strong>￥{$DesignInspiration['2']['data']['min_price']}</strong></span>
                            <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['2']['dataid']))}">立即查看></a>
                        </div>
                    </li>
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['3']['dataid']))}"><img src="{$DesignInspiration['3']['picture']['0']}" alt=""></a>
                        <div class="img_desc">
                            <p>{$DesignInspiration['3']['title']}</p>
                            <span>[装途价]：<strong>￥{$DesignInspiration['3']['data']['min_price']}</strong></span>
                            <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['3']['dataid']))}">立即查看></a>
                        </div>
                    </li>
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['4']['dataid']))}"><img src="{$DesignInspiration['4']['picture']['0']}" alt=""></a>
                        <div class="img_desc">
                            <p>{$DesignInspiration['4']['title']}</p>
                            <span>[装途价]：<strong>￥{$DesignInspiration['4']['data']['min_price']}</strong></span>
                            <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['4']['dataid']))}">立即查看></a>
                        </div>
                    </li>
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['5']['dataid']))}"><img src="{$DesignInspiration['5']['picture']['0']}" alt=""></a>
                        <div class="img_desc">
                            <p>{$DesignInspiration['5']['title']}</p>
                            <span>[装途价]：<strong>￥{$DesignInspiration['5']['data']['min_price']}</strong></span>
                            <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['5']['dataid']))}">立即查看></a>
                        </div>
                    </li>
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['6']['dataid']))}"><img src="{$DesignInspiration['6']['picture']['0']}" alt=""></a>
                        <div class="img_desc">
                            <p>{$DesignInspiration['6']['title']}</p>
                            <span>[装途价]：<strong>￥{$DesignInspiration['6']['data']['min_price']}</strong></span>
                            <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['6']['dataid']))}">立即查看></a>
                        </div>
                    </li>
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['7']['dataid']))}"><img src="{$DesignInspiration['7']['picture']['0']}" alt=""></a>
                        <div class="img_desc">
                            <p>{$DesignInspiration['7']['title']}</p>
                            <span>[装途价]：<strong>￥{$DesignInspiration['7']['data']['min_price']}</strong></span>
                            <a href="{:U('Shop/Product/show',array('id'=>$DesignInspiration['7']['dataid']))}">立即查看></a>
                        </div>
                    </li>
                </ul>
                <!-- <div class="design_com_box">
                    <div class="design_com_ul">

                        <div class="design_com_li">
                            <volist name="room" id="vo" offset="0" length='3'>
                                <a href="{$vo.url}" target="_blank"><div class="design_com_cell">
                                        <img src="{$vo.picture.0}">
                                        <h4>{$vo.title|stristr=###,',','1'}</h4>
                                        <h5><?php //echo substr($vo['title'],stripos($vo['title'],',')+1);?></h5>
                                        <p>{$vo.description}</p>
                                        <span class="design_com_more">MORE</span>
                                        <a href="" class="design_com_order">预定</a>
                                    </div></a>
                            </volist>
                        </div>
                        <div class="design_com_li">
                            <volist name="room" id="vo" offset="3" length='3'>
                                <a href="{$vo.url}" target="_blank"><div class="design_com_cell">
                                        <img src="{$vo.picture.0}">
                                        <h4>{$vo.title|stristr=###,',','1'}</h4>
                                        <h5><?php //echo substr($vo['title'],stripos($vo['title'],',')+1);?></h5>
                                        <p>{$vo.description}</p>
                                        <span class="design_com_more">MORE</span>
                                        <a href="" class="design_com_order">预定</a>
                                    </div></a>
                            </volist>
                        </div>
                        <div class="design_com_li">
                            <volist name="room" id="vo" offset="6" length='3'>
                                <a href="{$vo.url}" target="_blank"><div class="design_com_cell">
                                        <img src="{$vo.picture.0}">
                                        <h4>{$vo.title|stristr=###,',','1'}</h4>
                                        <h5><?php //echo substr($vo['title'],stripos($vo['title'],',')+1);?></h5>
                                        <p>{$vo.description}</p>
                                        <span class="design_com_more">MORE</span>
                                        <a href="" class="design_com_order">预定</a>
                                    </div></a>
                            </volist>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="design_com_index">
                    <div class="design_com_indexin">
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
        <!--每日低价-->
        <!--保护容器-->
        <template file="common/_promise.php"/>
        
        <template file="common/__footer.php"/>

        <!--固定导航-->
    </div>
</div>

<!--隐藏搜索-->
<!--背景容器-->
<div class="conwhole hidden_searchBg">
    <!--保护容器-->
    <div class="container">
        <img src="{$config_siteurl}statics/zt/images/logo_05.png" class="logo" />
        <div class="hidden_searchbox">
            <form class="searform">
                <input  type="text" class="inpsear" placeholder="搜索你喜欢的">
                <input type="submit" class="btnsear" value="搜索" >
            </form>
        </div>
    </div>
</div>
<!--固定购物车导航-->
<template file="common/_shopcart.php"/>
<script>

    $(".design_spe_li li").mouseenter(function(){
        $(this).find(".explain .buy").slideDown("fast");

    })
    $(".design_spe_li li").mouseleave(function(){
        $(this).find(".explain .buy").slideUp("fast");

    })
    var mediaw = 1366;
    var mediatimes = 0.8;
    function scalebox(){
        var mediah = mediatimes*$(".scale").height();
        $(".scalebox").height(mediah);
        $(".scalebox").css("overflow","hidden");
    }
    if($(document).width()<mediaw){
        scalebox();
    }
    $(window).resize(function(){
        if($(document).width()<mediaw){
            scalebox();
        }
    })

</script>
</body>
</html>