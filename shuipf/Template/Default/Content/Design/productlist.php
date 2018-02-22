<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
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
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/design.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<!--导航-->
<div class="designstencil_nav">
	<ul class="container">
    	<li><a href="{:U('productlist')}">所有商品</a></li><li><a href="{:U('shop')}">首页</a></li><li><a href="">热销产品</a></li><li><a href="{:U('designers')}">设计团队</a></li><li><a href="">公司简介</a></li>
    </ul>    
</div>
<!--选择分类-->
<div class="searchshop_classbox searchshop_class">
    <div class="ul">
        <p class="more morechoose">更多选项</p>
        <div class="li">
             <div class="class">
             <strong>所有分类</strong><i>></i>
             </div>
             <ul>
                  <form class="search">
                  <input  type="text"  class="search1" placeholder="在当前结果中搜索"></input>
                  <input type="image" class="search2 right" src="{$config_siteurl}statics/zt/images/search.png"></input>
                  </form>
                  
             </ul>
        </div>
        <div class="li">
             <div class="class">
                  所有分类 
             </div>
             <ul>
                  <li><a href="">同城设计</a></li>
                  <li><a href="">风格案例</a></li>
                  <li><a href="">户型案例</a></li>
                  <li><a href="">未设计先体验</a></li>
             </ul>
             <p class="more">更多</p> 
        </div>
        <div class="li">
             <div class="class">
                  服务类型
             </div>
             <ul>
                  <li><a href="">住宅装修设计</a></li>
                  <li><a href="">商业空间设计</a></li>
             </ul>
             <p class="more">更多</p>  
        </div>
        <div class="li">
             <div class="class">
                  房屋类型
             </div> 
             <ul>
                  <li><a href="">公寓</a></li>
                  <li><a href="">联排</a></li>
                  <li><a href="">别墅</a></li>
                  <li><a href="">复式</a></li>
                  <li><a href="">办公</a></li>
                  <li><a href="">商业</a></li>
                  <li><a href="">一居室</a></li>
                  <li><a href="">四居室</a></li>
                  <li><a href="">独栋</a></li>
             </ul>
             <p class="more">更多</p> 
        </div>
        <div class="li">
             <div class="class">
                  风格
             </div> 
             <ul>
                  <li><a href="">现代</a></li>
                  <li><a href="">地中海</a></li>
                  <li><a href="">简约</a></li>
                  <li><a href="">美式</a></li>
                  <li><a href="">泰式</a></li>
                  <li><a href="">混搭</a></li>
             </ul>
             <p class="more">更多</p> 
        </div>
    </div>
    <div class="line">
        <ul>
            <li>综合排序<img src="{$config_siteurl}statics/zt/images/arrow_up.png"></li>
            <li>人气<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>新品<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>销量<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>价格<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li><input type="text" placeholder="¥">-<input type="text" placeholder="¥"> <input class="sure" type="button" value="确定"></li>
        </ul>
        <div class="page">
            <a href=""><</a><span class="on">1</span>/<span>100</span><a href="">></a>
        </div>
        <div class="list">
            <span><img src="{$config_siteurl}statics/zt/images/listicon_big.png">大图</span>
            <span><img src="{$config_siteurl}statics/zt/images/listicon_list.png">小图</span>
        </div>
    </div>
    <div class="produce_ul">
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    	<div class="produce_li">
        	<img src="{$config_siteurl}statics/zt/images/searchshop_produce.jpg">
            <ul class="img">
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            	<li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥158.00</span></li>
                <li>圣象强化复合木地板</li>
                <li>GT7196夏威夷樱</li>
                <li><span class="textr">月成交：20笔</span>新锐设计师</li>
            </ul>
        </div>
    </div>
</div>  

<!--保证栏-->
<!--背景容器-->
<div class="conwhole seller_promise_bor">
     <!--保护容器-->
     <div class="container">      <div class="bot_promiss clearfix">
       <a href="#"></a>
       <a href="#"></a>
       <a href="#"></a>
       <a href="#"></a>
      </div>
    </div>
</div>

<!--尾部-->

<template file="common/_promise.php"/>
<template file="common/_footer.php"/>

</body>
</html>