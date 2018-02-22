<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/main-material.js"> </script>
</head>
<body>
<template file="Content/common/_header.php"/>
<!--导航-->
<!--导航头-->

<!--<div class="searchgoods_nav">-->
<!--	<div class="container">-->
<!--        <ul class="all">-->
<!--            <li>全部商品分类<span>v</span></li>-->
<!--            <li>全部商品分类</li>-->
<!--            <li>全部商品分类</li>-->
<!--        </ul>-->
<!--        <ul class="class">-->
<!--            <li>首页</li>-->
<!--            <volist name='cate' id='vo'>-->
<!--                <li>{$vo.name}</li>-->
<!--            </volist>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<div class="searchgoods_class">
	<span><a href="{:U(index)}">首页</a></span>&gt;<span>{$catename}</span>&gt;
	<!--<span><select>-->
	    <!--<volist name='catelist' id='vo'>-->
	    <!--    <option>{$vo.name}</option>-->
	    <!--</volist>-->
	<!--</select></span>&gt;-->
    <form>
          <input  type="text"  class="search1" placeholder="在当前条件下搜索">
          <input type="image" class="search2 right" src="{$config_siteurl}statics/zt/images/magnifier.png">
    </form>
</div>
<div class="searchshop_classbox searchshop_class searchshop_top">
    <div class="ul">
        <p class="more morechoose">更多选项</p>
        <div class="li">
        
        </div>
        <div class="li">
             <div class="class">
                  所有分类 
             </div>
             <ul>
                  <volist name="cate" id="ca">
                      <li><a href="{:U('productlist',array('catid'=>$key))}">{$ca}</a></li>
                  </volist>
             </ul>
             <p class="more">更多</p> 
        </div>
        <!--<div class="li">-->
             <!--<div class="class">-->
             <!--     服务类型-->
             <!--</div>-->
             <!--<ul>-->
             <!--     <li><a href="">住宅装修设计</a></li>-->
             <!--     <li><a href="">商业空间设计</a></li>-->
             <!--</ul>-->
             <!--<p class="more">更多</p>  -->
        <!--</div>-->
        <!--<div class="li">-->
             <!--<div class="class">-->
             <!--     房屋类型-->
             <!--</div> -->
             <!--<ul>-->
             <!--     <li><a href="">公寓</a></li>-->
             <!--     <li><a href="">联排</a></li>-->
             <!--     <li><a href="">别墅</a></li>-->
             <!--     <li><a href="">复式</a></li>-->
             <!--     <li><a href="">办公</a></li>-->
             <!--     <li><a href="">商业</a></li>-->
             <!--     <li><a href="">一居室</a></li>-->
             <!--     <li><a href="">四居室</a></li>-->
             <!--     <li><a href="">独栋</a></li>-->
             <!--</ul>-->
             <!--<p class="more">更多</p> -->
        <!--</div>-->
        <!--<div class="li">-->
             <!--<div class="class">-->
             <!--     风格-->
             <!--</div> -->
             <!--<ul>-->
             <!--    <volist name="searchOpts['style']" id="vo">-->
             <!--     <li><a href="">{$vo.value}</a></li>-->
             <!--    </volist>-->
             <!--</ul>-->
             <!--<p class="more">更多</p> -->
        <!--</div>-->
    <!--</div>-->
    <div class="line">
        <ul>
            <li><a href="">综合排序<img src="{$config_siteurl}statics/zt/images/arrow_up.png"></a></li>
            <li><a href="">人气<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></a></li>
            <li><a href="">新品<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></a></li>
            <li><a href="">销量<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></a></li>
            <li><a href="">价格<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></a></li>
            <li><input type="text" placeholder="¥">-<input type="text" placeholder="¥"> <input class="sure" type="button" value="确定"></li>
        </ul>
        <div class="page">
            <!--<a href=""><</a><span class="on">1</span>/<span>100</span><a href="">></a>-->
             {$page}
        </div>
    </div>
    <div class="produce_ul">
        <volist name='list' id='vo'>
    	<div class="produce_li">
        	<a href="{:U('Shop/Product/worker',array('id'=>$vo['id']))}"><img src="{$vo.headpic}"></a>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥<if condition="$vo['min_price'] == $vo['max_price']" >{$vo.min_price}<else/>{$vo.min_price} - {$vo.max_price}</if></span></li>
                <li>{$vo.title}</li>
                <li>{$vo.sell_points}</li>
                <li><span class="textr">月成交：20笔</span>{$vo.shopname}</li>
            </ul>
        </div>
        </volist>
    </div>
</div>  
<div class='end'>
    {$page}
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