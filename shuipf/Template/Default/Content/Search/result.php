<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>装途网</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
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


<div class="searcon">
    <div class="searcon_in">
        <div class="ser_intop">
            <dl class="litop">
                <dt class="classtop"><strong>全部>{$catepath}</strong></dt>
                <dd>
                    <form class="search" method="get">
                        <input  type="text"  name="searchkey" class="search1" placeholder="在当前结果中搜索" value="{$Think.get.searchkey}">
                        <input type="image" class="search2 right" src="{$config_siteurl}statics/zt/images/search.png">
                    </form>
                </dd>
                <span class="rescount">共 {$total} 个商品 </span>
            </dl>
        </div>

        <ul class="shopcateprots shopcateprots-main">
            <if condition="array_key_exists('20000', $recommends)">
            <li>
                <div class="parask">
                    品牌
                </div>
                <div class="parasv">
                    <div class="adiv">
                        <volist name="recommends['20000']" id="brand_item">
                            <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('pid'=>'20000', 'vid'=>$key)))}"><div>{$brand_item}</div></a>
                        </volist>
                    </div>

                    <div class="btnoptions">
                        <a href="" class="muti"><i>+</i>多选</a>
                        <a href="" class="amore">更多<i></i></a>
                    </div>
                </div>
            </li>
            </if>
        </ul>
        <ul class="shopcateprots shopcateprots-else">
            <li>
                <div class="parask">
                    价格
                </div>
                <div class="parasv">
                    <div class="adiv">
                        <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>0, 'max'=>1000)))}">0-1000</a>
                        <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>1000, 'max'=>2000)))}">1000-2000</a>
                        <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>2000, 'max'=>5000)))}">2000-5000</a>
                        <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>5000, 'max'=>10000)))}">5000-10000</a>
                        <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>10000, 'max'=>1000000)))}">10000以上</a>
<!--                        <input type="text" id="min_price">&nbsp;-&nbsp;<input type="text" id="max_price"> <input type="submit" value="确定" id="price_filter">-->
                    </div>

                    <div class="btnoptions">
                        <a href="" class="muti"><i>+</i>多选</a>
                        <a href="" class="amore">更多<i></i></a>
                    </div>
                </div>
            </li>

            <volist name="recommends" id="recommend">
            <if condition="$key neq '20000'">
            <li>
                <div class="parask">
                    <?php echo $recommendPidMap[$key]['name']?>
                </div>
                <div class="parasv">
                    <div class="adiv">
                        <assign name="pid" value="$key"/>
                        <volist name="recommend" id="recommend_item">
                            <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('pid'=>$pid, 'vid'=>$key)))}">{$recommend_item}</a>
                        </volist>
                    </div>

                    <div class="btnoptions">
                        <a href="" class="muti"><i>+</i>多选</a>
                        <a href="" class="amore">更多<i></i></a>
                    </div>
                </div>
            </li>
            </if>
            </volist>
        </ul>

    </div>
</div>

<!--<div class="searchgoods_classBox">-->
<!--<div class="searchgoods_class">-->
<!--    <div class="searchAll">全部<span>&gt;</span>-->
<!--        <form action="" method="get">-->
<!--            <input type="text" name="keyvalue" value="{$Think.get.searchkey}"><img src="{$config_siteurl}statics/zt/images/searchresult/searchicon.png" alt="">-->
<!--        </form>-->
<!--    </div>-->
<!--    -->
<!--    <div class="searchBox">-->
<!--        <div class="title"><span>{$Think.get.searchkey}</span><span>搜索到<i> {$total} </i>件相关商品</span></div>-->
<!--        <if condition="array_key_exists('20000', $recommends)">-->
<!--            <dl class="brand">-->
<!--                <dt>品牌：</dt>-->
<!--                <dd class="brandlogo">-->
<!--                    <volist name="recommends['20000']" id="brand_item">-->
<!--                        <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('pid'=>'20000', 'vid'=>$key)))}"><div>{$brand_item}</div></a>-->
<!--                    </volist>-->
<!--                </dd>-->
<!--                <dd class="more"><span>多选&nbsp;+</span><span class="moredown">更多&nbsp;<img src="{$config_siteurl}statics/zt/images/searchresult/down.png" alt=""></span></dd>-->
<!--            </dl>-->
<!--        </if>-->
<!--        <dl class="price">-->
<!--            <dt>价格：</dt>-->
<!--            <dd>-->
<!--                <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>0, 'max'=>1000)))}">0-1000</a>-->
<!--                <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>1000, 'max'=>2000)))}"">1000-2000</a>-->
<!--                <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>2000, 'max'=>5000)))}"">2000-5000</a>-->
<!--                <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>5000, 'max'=>10000)))}"">5000-10000</a>-->
<!--                <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('min'=>10000, 'max'=>1000000)))}"">10000以上</a>-->
<!--                <input type="text" id="min_price">&nbsp;-&nbsp;<input type="text" id="max_price"> <input type="submit" value="确定" id="price_filter">-->
<!--            </dd>-->
<!--        </dl>-->
<!---->
<!--        <volist name="recommends" id="recommend">-->
<!--            <if condition="$key neq '20000'">-->
<!--                <dl class="clas">-->
<!--                    <dd>-->
<!--                        <assign name="pid" value="$key"/>-->
<!--                            <volist name="recommend" id="recommend_item">-->
<!--                                <a href="{:U('Content/Search/search', array_merge($_REQUEST, array('pid'=>$pid, 'vid'=>$key)))}">{$recommend_item}</a>-->
<!--                            </volist>-->
<!--                    </dd>-->
<!--                </dl>-->
<!--            </if>-->
<!--        </volist>-->
<!--        <div class="bottomShadow"></div>-->
<!--    </div>-->
<!---->
<!--</div>-->
<!--<div class="morebottom">更多选项&nbsp;&nbsp;<img src="{$config_siteurl}statics/zt/images/searchresult/down.png" alt=""></div>-->
<!--</div>-->




<div class="searchshop_classbox searchshop_class searchshop_top">
    <div class="ul">
        <!-- <p class="more morechoose">更多选项</p> -->
        <div class="li">

        </div>
    </div>
    <div class="line">
       <ul>
       <li><a <if condition='$_GET["order"] eq "rank"'>class="on"</if> href="{:U('Content/Search/search', array_merge($_REQUEST, array('order' => 'rank')))}">综合</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_up.png"> --></li>
         <li><a <if condition='$_GET["order"] eq "_collect"'>class="on"</if> href="{:U('Content/Search/search', array_merge($_REQUEST, array('order' => '_collect')))}">人气</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_down.png"> --></li>
         <li><a <if condition='$_GET["order"] eq "_new"'>class="on"</if> href="{:U('Content/Search/search', array_merge($_REQUEST, array('order' => '_new')))}">新品</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_down.png"> --></li>
         <li><a <if condition='$_GET["order"] eq "_sell"'>class="on"</if> href="{:U('Content/Search/search', array_merge($_REQUEST, array('order' => '_sell')))}">销量</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_down.png"> --></li>
         <li><a <if condition='$_GET["order"] eq "price"'>class="on"</if> href="{:U('Content/Search/search', array_merge($_REQUEST, array('order' => 'price')))}">价格</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_down.png"> --></li>
         <li></li>
       </ul>
       <div class="list clearfix">
         <!-- <span>网格</span> -->
         <!-- <span>列表</span> -->
       </div>
    </div>
    <div class="produce_ul produce_all">
       <volist name='list' id='vo'>
           <div class="produce_li">
                <div class="produce_border">
                   <a target="_blank" href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}"></a>
                   <ul class="explain">
                       <li><span class="textr">成交:{$vo.count_sold}笔</span><span class="money"><i>￥</i>{$vo.min_price}</span></li>
                       <li><a target="_blank" href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"  title="{$vo.title}">{$vo.hl_title}</a></li>

                       <li class="shopname"><!-- <span class="textr">月成交：{$vo.count_sold}笔</span> --><a target="_blank" href="/s/{$vo.shopdomain}">{$vo.shopname}</a></li>

                       <li class="address" title="{$vo.shopaddr}"><empty name="vo['shopaddr']">&nbsp;&nbsp;<else/>{$vo.shopaddr}</empty></li>
                   </ul>
               </div>
          </div>
       </volist>
    </div>
    <div class="pagebox">
       {$page}
    </div>
</div>
    <template file="common/_promise.php"/>
    <template file="common/_footer.php"/>
</body>
<script>
$(function(){
    var onoff = true;
    $('.moredown').click(function(){
        if(onoff){
            $('.brandlogo').animate({height:"100%"});
            $(this).html("收起&nbsp;<img src='/statics/zt/images/searchresult/up.png' />");
        }else{
            $('.brandlogo').animate({height:"110px"});
            $(this).html("更多&nbsp;<img src='/statics/zt/images/searchresult/down.png' />");
        }
        onoff = !onoff;
    })
    $('.morebottom').click(function(){
        if(onoff){
            $('.searchBox').animate({height:"100%"});
            $(this).html("收起&nbsp;&nbsp;<img src='/statics/zt/images/searchresult/up.png' />");
        }else{
            $('.searchBox').animate({height:"306px"});
            $(this).html("更多选项&nbsp;&nbsp;<img src='/statics/zt/images/searchresult/up.png' />");
        }
        onoff = !onoff;
    })
    $('.brandlogo a').mouseover(function(){
        $('.brandlogo a div').css("border-color","#d3d3d3");
        $(this).find("div").css("border-color","#c8161d");
    }).mouseout(function(){
        $(this).find("div").css("border-color","#d3d3d3");
    })

    $('#price_filter').click(function() {
        if ($('#min_price').value() == '' || $('#max_price').value()){

        }
        //window.location.href="{:U('Content/Search/search')}" +
          //  "?searchkey=" + "{$Think.get.searchkey}" + "&min_price=" + $('#min_price').value() + "&max_price=" + $('#max_price').value();
    })
})
</script>
</html>
