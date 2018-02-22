<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>选择设计师模版</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/templates.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"> </script>
</head>

<body>
<!--背景容器-->

<template file="common/_top.php"/>

<!--logo-->
<!--保护容器-->
<div class="container sear">
    <img class="left" src="{$config_siteurl}statics/zt/images/index/logo_01.png">
    <!--搜索-->
    <div id="search" class="search">
        <form class="searform">
            <input  type="text" class="inpsear" placeholder="搜索你喜欢的">
            <input type="submit" class="btnsear" value="搜索" >
        </form>

        <h2><a class="noborder" href="#">真皮沙发</a>
            <a href="#">装修队</a>
            <a href="#">现代化设计</a>
            <a href="#">电磁炉</a>
            <a href="#">壁纸</a>
            <a href="#">乳胶漆</a>
            <a href="#">挂架打磨</a>
            <a href="#">窗帘</a>
            <a class="hidden_1024" href="#">沙发床</a>
            <a class="hidden_1024" href="#">电视柜</a>
            <a class="hidden_1024" href="#">防盗窗</a>

        </h2>
    </div>
</div>
<div class="designerstencil3_banner"></div>
<div class="designerstencil3_main">
    <div class="box">
        <div class="person">
            <h5>没有军队可以阻止一个想法，他们的时间已经到来。</h5>
            <h5>“No army can stop an idea whose time has come.”</h5>
            <div class="main">
                <div class="explain">
                    <div class="title"><p>关于我</p><p>ABOUT ME</p></div>
                    <div class="explain_box">
                        <img class="photo" src={:session('designer_preview')['picture']}>
                        <p class="name">{:session('designer_preview')['name']}</p>
                        <p>{:session('designer_preview')['introduce']}</p>
                        <p><span>从业时间：</span>{:session('designer_preview')['work_time']}<span>设计擅长：</span><a href="">公寓</a><a href="">别墅</a></p>
                        <p>{:session('designer_preview')['idea']}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="production">
            <div class="title">作品集</div>
            <div class="production_box">
                <ul>
                    <li>
                        <img class="li" src="{$config_siteurl}statics/zt/images/designerstencil3_mainproductionli1.png">
                        <div class="bottom">
                            <div class="text_left"><p class="style">现代简约风</p><p class="hide">96㎡两室一厅</p></div>
                            <div class="text_right"><p class="collect"><img src="{$config_siteurl}statics/zt/images/yellow_heart.png">收藏</p><p class="hide">¥200</p></div>
                            <p class="hide introduce">恋上地中海的夏日转角</p>
                        </div>
                    </li>
                    <li class="on">
                        <img class="li" src="{$config_siteurl}statics/zt/images/designerstencil3_mainproductionli1.png">
                        <div class="bottom">
                            <div class="text_left"><p class="style">现代简约风</p><p class="hide">96㎡两室一厅</p></div>
                            <div class="text_right"><p class="collect"><img src="{$config_siteurl}statics/zt/images/yellow_heart.png">收藏</p><p class="hide">¥200</p></div>
                            <p class="hide introduce">恋上地中海的夏日转角</p>
                        </div>
                    </li>
                    <li>
                        <img class="li" src="{$config_siteurl}statics/zt/images/designerstencil3_mainproductionli1.png">
                        <div class="bottom">
                            <div class="text_left"><p class="style">现代简约风</p><p class="hide">96㎡两室一厅</p></div>
                            <div class="text_right"><p class="collect"><img src="{$config_siteurl}statics/zt/images/yellow_heart.png">收藏</p><p class="hide">¥200</p></div>
                            <p class="hide introduce">恋上地中海的夏日转角</p>
                        </div>
                    </li>
                    <li>
                        <img class="li" src="{$config_siteurl}statics/zt/images/designerstencil3_mainproductionli1.png">
                        <div class="bottom">
                            <div class="text_left"><p class="style">现代简约风</p><p class="hide">96㎡两室一厅</p></div>
                            <div class="text_right"><p class="collect"><img src="{$config_siteurl}statics/zt/images/yellow_heart.png">收藏</p><p class="hide">¥200</p></div>
                            <p class="hide introduce">恋上地中海的夏日转角</p>
                        </div>
                    </li>
                    <li>
                        <img class="li" src="{$config_siteurl}statics/zt/images/designerstencil3_mainproductionli1.png">
                        <div class="bottom">
                            <div class="text_left"><p class="style">现代简约风</p><p class="hide">96㎡两室一厅</p></div>
                            <div class="text_right"><p class="collect"><img src="{$config_siteurl}statics/zt/images/yellow_heart.png">收藏</p><p class="hide">¥200</p></div>
                            <p class="hide introduce">恋上地中海的夏日转角</p>
                        </div>
                    </li>
                </ul>
                <div class="arrow arrow_left"><</div><div class="arrow arrow_right">></div>
            </div>
            <ul class="btn_ul"><li></li><li class="on"></li><li></li><li></li><li></li></ul>
        </div>
        <div class="case">
            <div class="title">成功案例<p>successful case</p></div>
            <ul>
                <li>
                    <img src="{$config_siteurl}statics/zt/images/designerstencil3_maincaseli4.png">
                    <a href="">立即购买</a>
                    <p class="style">现代简约风</p>
                    <p class="area">96㎡两室一厅</p>
                    <p class="introduce">恋上地中海的夏日转角</p>
                    <p class="collect"><img src="{$config_siteurl}statics/zt/images/yellow_heart.png">收藏<span class="money">¥200</span></p>
                </li>
                <li>
                    <img src="{$config_siteurl}statics/zt/images/designerstencil3_maincaseli2.png">
                    <a href="">立即购买</a>
                    <p class="style">现代简约风</p>
                    <p class="area">96㎡两室一厅</p>
                    <p class="introduce">恋上地中海的夏日转角</p>
                    <p class="collect"><img src="{$config_siteurl}statics/zt/images/blackb_heart.png">收藏<span class="money">¥200</span></p>
                </li>
                <li>
                    <img src="{$config_siteurl}statics/zt/images/designerstencil3_maincaseli3.png">
                    <a href="">立即购买</a>
                    <p class="style">现代简约风</p>
                    <p class="area">96㎡两室一厅</p>
                    <p class="introduce">恋上地中海的夏日转角</p>
                    <p class="collect"><img src="{$config_siteurl}statics/zt/images/blackb_heart.png">收藏<span class="money">¥200</span></p>
                </li>
                <li>
                    <img src="{$config_siteurl}statics/zt/images/designerstencil3_maincaseli1.png">
                    <a href="">立即购买</a>
                    <p class="style">现代简约风</p>
                    <p class="area">96㎡两室一厅</p>
                    <p class="introduce">恋上地中海的夏日转角</p>
                    <p class="collect"><img src="{$config_siteurl}statics/zt/images/blackb_heart.png">收藏<span class="money">¥200</span></p>
                </li>
                <li>
                    <img src="{$config_siteurl}statics/zt/images/designerstencil3_maincaseli2.png">
                    <a href="">立即购买</a>
                    <p class="style">现代简约风</p>
                    <p class="area">96㎡两室一厅</p>
                    <p class="introduce">恋上地中海的夏日转角</p>
                    <p class="collect"><img src="{$config_siteurl}statics/zt/images/blackb_heart.png">收藏<span class="money">¥200</span></p>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="designerstencil_footer">
    <div class="bodybg">
        <div class="box">
            <!--保证栏-->
            <div class="bot_promiss clearfix">
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
                <a href="#"></a>
            </div>
            <img class="logo" src="{$config_siteurl}statics/zt/images/logo_02b.png">
        </div>
        <div class="footer_links">
            <a href="#">关于装途装修</a>
            <a href="#">帮助中心</a>
            <a href="#">网站地图</a>
            <a href="#">诚聘英才</a>
            <a href="#">联系我们</a>
            <a href="#">网站合作</a>
            <a href="#">版权说明</a>
        </div>
    </div>
</div>



</body>
</html>
