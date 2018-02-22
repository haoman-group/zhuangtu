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
<div class="designerstencil1">
    <div class="banner">
        <dl class="container">
            <dt>
                <div class="name">{:session('designer_preview')['name']}</div>
<!--                <img src="{$config_siteurl}statics/zt/images/designerstencil1_bannersign.png">-->
            <p>{:session('designer_preview')['qualification']}</p>
<!--           {$Think.get.name}-->
            <p>{:session('designer_preview')['introduce']}</p>
            </dt>
            <dd>
                <img class="photo" src={:session('designer_preview')['picture']}><br>
                <a href="">关注Ta</a><a href="">预约Ta</a><a href="">投诉0</a>
            </dd>
        </dl>
    </div>
    <div class="introduce">
        <p><span>从业时间：</span>{:session('designer_preview')['work_time']}<span>设计擅长：</span><a href="">公寓</a><a href="">别墅</a></p>
        <p><span>设计风格：</span><a href="">{:session('designer_preview')['style']}</a></p>
        <p><span>设计心语：</span>{:session('designer_preview')['idea']}</p>
    </div>
    <div class="ul">
        <div class="li">
            <img src="{$config_siteurl}statics/zt/images/designerstencil1libg1.png">
            <div class="bottom">
                <strong>怀旧复古风</strong><span class="money">￥2000</span><span class="time">作于2014年12月</span>
                <p><a href="">收藏作品</a><a href="">立即购买</a></p>
            </div>
        </div>
        <div class="li">
            <div class="titright">
                <h4>作品集</h4>
                <h5>This is the list of</h5>
                <h5>the recent</h5>
            </div>
            <ul class="img italic">
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg1.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg2.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg3.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg4.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg2.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg1.png"></li>
            </ul>
        </div>
        <div class="li"><div class="titleft">
                <h4>作品集</h4>
                <h5>This is the list of</h5>
                <h5>the recent</h5>
            </div>
            <ul class="img straight">
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg1.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg2.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg3.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg4.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg4.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg3.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg2.png"></li>
                <li><img src="{$config_siteurl}statics/zt/images/designerstencil1liimg1.png"></li>
            </ul>
        </div>
        <div class="li">
            <img src="{$config_siteurl}statics/zt/images/designerstencil1libg1.png">
            <div class="bottom">
                <strong>怀旧复古风</strong><span class="money">￥2000</span><span class="time">作于2014年12月</span>
                <p><a href="">收藏作品</a><a href="">立即购买</a></p>
            </div>
        </div>
        <div class="li">
            <img src="{$config_siteurl}statics/zt/images/designerstencil1libg1.png">
            <div class="comment">
                <dl>
                    <dt>
                        孟***8：
                    </dt>
                    <dd>
                        服务很耐心，设计师专业能力不错，给我一些很专业的建议，而且材料购买方面也提了一些中肯的建议，非常满意。
                    </dd>
                    <dt>
                        孟***8：
                    </dt>
                    <dd>
                        服务很耐心，设计师专业能力不错，给我一些很专业的建议，而且材料购买方面也提了一些中肯的建议，非常满意。
                    </dd>
                    <dt>
                        孟***8：
                    </dt>
                    <dd>
                        服务很耐心，设计师专业能力不错，给我一些很专业的建议，而且材料购买方面也提了一些中肯的建议，非常满意。
                    </dd>
                    <dt>
                        孟***8：
                    </dt>
                    <dd>
                        服务很耐心，设计师专业能力不错，给我一些很专业的建议，而且材料购买方面也提了一些中肯的建议，非常满意。
                    </dd>
                    <dt>
                        孟***8：
                    </dt>
                    <dd>
                        服务很耐心，设计师专业能力不错，给我一些很专业的建议，而且材料购买方面也提了一些中肯的建议，非常满意。
                    </dd>
                </dl>
            </div>
        </div>
        <div class="li">
            <div class="titright">
                <h4>累计评价</h4>
                <h5>This is the list of</h5>
                <h5>the recent</h5>
            </div>
        </div>
    </div>
    <div class="introduce">
        <p>我们致力于室内设计以及装修顾问服务、精拓实业，</p>
        <p>并不断追求宽广的业务，</p>
        <p>只求精益求精。数年来曾为改变！</p>
        <p>我们不与同行业“拼”价格，只“拼”设计质量、专业水平、服务品质。</p>
    </div>
    <div class="designerstencil_footer">
        <div class="head"></div>
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
</div>


</body>
</html>
