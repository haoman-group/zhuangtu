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
<div class="designerstencil2_banner"></div>
<div class="designerstencil2_person">
    <h4>HELLO EVERYBODY</h4>
    <dl>
        <dt>
            <img src="{$config_siteurl}statics/zt/images/designerstencil2_persondt.png">
        </dt>
        <dd>
            <h5>{:session('designer_preview')['name']}</h5>
            <ul>
                <li>{:session('designer_preview')['qualification']},{:session('designer_preview')['introduce']}</li>
                <li>从业时间：{:session('designer_preview')['work_time']}</li>
                <li>设计擅长：<a href="">公寓</a><a href="">别墅</a></li>
                <li>设计风格：<a href="">{:session('designer_preview')['style']}</a></li>
                <li>{:session('designer_preview')['idea']}</li>
                <a href="" class="btn">关注TA</a><a href="" class="btn">预约此设计师</a>
            </ul>
        </dd>
    </dl>
    <img class="person" src={:session('designer_preview')['picture']}>
</div>
<div class="designerstencil2_title">
    <strong>P</strong><p>作品集<span>roducts</span></p>
</div>
<div class="designerstencil2_production">
    <div class="li">
        <img src="{$config_siteurl}statics/zt/images/designerstencil2_productionli1.png">
        <div class="explain">
            <div class="style">现代简约风<p>96㎡两室两厅</p></div>
            <a href="">收藏作品</a><a href="">立即购买</a>
            <div class="more"><p>MORE</p>+</div>
        </div>
        <div class="bottomb"><p></p></div>
    </div>
    <div class="li">
        <img src="{$config_siteurl}statics/zt/images/designerstencil2_productionli1.png">
        <div class="explain">
            <div class="style">现代简约风<p>96㎡两室两厅</p></div>
            <a href="">收藏作品</a><a href="">立即购买</a>
            <div class="more"><p>MORE</p>+</div>
        </div>
        <div class="bottomb"><p></p></div>
    </div>
    <div class="li">
        <img src="{$config_siteurl}statics/zt/images/designerstencil2_productionli1.png">
        <div class="explain">
            <div class="style">现代简约风<p>96㎡两室两厅</p></div>
            <a href="">收藏作品</a><a href="">立即购买</a>
            <div class="more"><p>MORE</p>+</div>
        </div>
        <div class="bottomb"><p></p></div>
    </div>
    <div class="li">
        <img src="{$config_siteurl}statics/zt/images/designerstencil2_productionli1.png">
        <div class="explain">
            <div class="style">现代简约风<p>96㎡两室两厅</p></div>
            <a href="">收藏作品</a><a href="">立即购买</a>
            <div class="more"><p>MORE</p>+</div>
        </div>
        <div class="bottomb"><p></p></div>
    </div>
    <ul>
        <li class="btn"><</li>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li class="btn">></li>
    </ul>
</div>
<div class="designerstencil2_transition"></div>
<div class="designerstencil2_case">
    <div class="designerstencil2_title">
        <strong>S</strong><p>成功案例<span>uccessful case</span></p>
    </div>
    <ul>
        <li><img src="{$config_siteurl}statics/zt/images/designerstencil2_case1.png"></li>
        <li class="explain">
            <p><span class="style">现代简约风</span>96㎡两室两厅</p>
            <a href="">收藏作品</a><a href="">立即购买</a>
        </li>
        <li><img src="{$config_siteurl}statics/zt/images/designerstencil2_case2.png"></li>
        <li><img src="{$config_siteurl}statics/zt/images/designerstencil2_case2.png"></li>
        <li><img src="{$config_siteurl}statics/zt/images/designerstencil2_case2.png"></li>
        <li><img src="{$config_siteurl}statics/zt/images/designerstencil2_case2.png"></li>
        <li><img src="{$config_siteurl}statics/zt/images/designerstencil2_case2.png"></li>
        <li><img src="{$config_siteurl}statics/zt/images/designerstencil2_case2.png"></li>
    </ul>
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
