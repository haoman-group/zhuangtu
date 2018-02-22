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
<!-- <div class="searchgoods_class">
	<span><a href="{:U(index)}">首页</a></span>&gt;<span><a href="{:U('productlist',array('cid'=>$_GET['cid']))}">{$catename}</a></span>
	&gt; -->
	<!--<span>-->
	<!--    <select>-->
	<!--    <volist name='catelist' id='vo'>-->
	<!--        <option>{$vo.name}</option>-->
	<!--    </volist>-->
	<!--</select></span>&gt;-->
    <!-- <form>
          <input  type="text"  class="search1" placeholder="在当前条件下搜索">
          <input type="image" class="search2 right" src="{$config_siteurl}statics/zt/images/magnifier.png">
    </form>
</div>  -->


<div class="searchshop_classbox searchshop_class searchshop_top">
    <div class="ul">
        <!-- <p class="more morechoose">更多选项</p> -->
        <div class="li">
          <div class="class"><strong>所有分类</strong><i>》</i></div>
             <form class="search">
              <input  type="text"  class="search1" placeholder="在当前结果中搜索"></input>
              <input type="image" class="search2 right" src="{$config_siteurl}statics/zt/images/search.png"></input>
             </form> 
             <p class="hot">本店热搜词：<span>复古风</span><span>现代风</span><span>简约风</span></p>
        </div>    
    </div> 
        <!-- <div class="li">
             <div class="class">
                  相关分类 
             </div>
             <ul>
                 <volist name='catelist' id='vo'>
	                 <li><a href="{:U('productlist',array('cid'=>$vo['cid']))}">{$vo.name}</a></li>
	             </volist>
             </ul>
             <p class="more">更多</p> 
        </div> -->
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
            <li>综合排序<!-- <img src="../images/arrow_up.png"> --></li>
            <li>人气<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>新品<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>销量<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>价格<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>            
        </ul>
        <div class="page">
            <!-- <a href="">&lt;</a><span class="on">1</span><i>/</i><span>100</span><a href="">&gt;</a> -->
            {$page}
        </div>
        <div class="list">
            <span><img src="{$config_siteurl}statics/zt/images/listicon_big.png">大图</span>
            <span><img src="{$config_siteurl}statics/zt/images/listicon_list.png">小图</span>
        </div>
        <div class="soso"><input type="text" placeholder="¥">-<input type="text" placeholder="¥"> <input class="sure" type="button" value="确定"></div>
        <!-- <ul>
            <li>综合排序<img src="{$config_siteurl}statics/zt/images/arrow_up.png"></li>
            <li>人气<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>新品<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>销量<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li>价格<img src="{$config_siteurl}statics/zt/images/arrow_down.png"></li>
            <li><input type="text" placeholder="¥">-<input type="text" placeholder="¥"> <input class="sure" type="button" value="确定"></li>
        </ul>
        <div class="page"> -->
            <!--<a href=""><</a><span class="on">1</span>/<span>100</span><a href="">></a>-->
             
        <!-- </div> -->
    </div>
    <div class="produce_ul">
        <volist name='list' id='vo'>
    	<div class="produce_li">
        	<a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}"></a>
            <ul class="img">
                <li><img src="{$vo.picture.0}"></li>
                <li><img src="{$vo.picture.1}"></li>
                <li><img src="{$vo.picture.2}"></li>
            </ul>
            <ul class="explain">
                <li><span class="textr">18条评论</span><span class="money">￥<if condition="$vo['min_price'] == $vo['max_price']" >{$vo.min_price}<else/>{$vo.min_price} - {$vo.max_price}</if></span></li>
                <li>{$vo.title}</li>
                <li>{$vo.sell_points}</li>
                <li><span class="textr">月成交：20笔</span>{$vo.shopname}</li>
            </ul>
        </div>
        </volist>
    </div> 
    <p class="list_page">
       <!-- <a href="" class="active">上一页</a>
       <a href="" class="active">1</a>
       <a href="">2</a>
       <a href="">下一页</a>
       到第<span>1</span>页
       <a href="" class="sure">确定</a> -->
       {$page}
    </p>
</div>


<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>