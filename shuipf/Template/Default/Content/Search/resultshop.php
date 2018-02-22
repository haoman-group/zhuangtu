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

<div class="searcon">
    <div class="searcon_in">
        <div class="ser_intop">
            <dl class="litop">
                <dt class="classtop"><strong>全部&gt;{$catepath}</strong></dt>
                <dd>
                    <form class="search" method="get">
                        <input  type="text"  name="searchkey" class="search1" placeholder="在当前结果中搜索" value="{$Think.get.searchkey}">
                        <input type="image" class="search2 right" src="{$config_siteurl}statics/zt/images/search.png">
                    </form>
                </dd>
                <span class="rescount">共 {$count} 个店铺 </span>
            </dl>
        </div>
        <!-- <ul class="shopcateprots shopcateprots-else">
            <li>
                <div class="parask">
                    所有分类
                </div>
                <div class="parasv">
                    <div class="adiv">
                        <a href="">同城设计</a>
                        <a href="">风格案例</a>
                        <a href="">户型案例</a>
                        <a href="">未设计先体验</a>
                    </div>

                    <div class="btnoptions">
                        <a href="" class="muti"><i>+</i>多选</a>
                        <a href="" class="amore">更多<i></i></a>
                    </div>
                </div>
            </li>
            <li>
                <div class="parask">
                    服务类型
                </div>
                <div class="parasv">
                    <div class="adiv">
                        <a href="">住宅装修设计</a>
                        <a href="">商业空间设计</a>
                    </div>

                    <div class="btnoptions">
                        <a href="" class="muti"><i>+</i>多选</a>
                        <a href="" class="amore">更多<i></i></a>
                    </div>
                </div>
            </li>
            <li>
                <div class="parask">
                    房屋类型
                </div>
                <div class="parasv">
                    <div class="adiv">
                        <a href="">公寓</a>
                        <a href="">联排</a>
                        <a href="">别墅</a>
                        <a href="">复试</a>
                        <a href="">办公</a>
                        <a href="">商业</a>
                        <a href="">一居室</a>
                        <a href="">四居室</a>
                        <a href="">独栋</a>
                    </div>

                    <div class="btnoptions">
                        <a href="" class="muti"><i>+</i>多选</a>
                        <a href="" class="amore">更多<i></i></a>
                    </div>
                </div>
            </li>
            <li>
                <div class="parask">
                    风格
                </div>
                <div class="parasv">
                    <div class="adiv">
                        <a href="">现代</a>
                        <a href="">地中海</a>
                        <a href="">简约</a>
                        <a href="">美式</a>
                        <a href="">泰式</a>
                        <a href="">混搭</a>
                    </div>

                    <div class="btnoptions">
                        <a href="" class="muti"><i>+</i>多选</a>
                        <a href="" class="amore">更多<i></i></a>
                    </div>
                </div>
            </li>
        </ul> -->
    </div>
</div>

<div class="searchshop_classbox searchshop_class searchshop_top">
    <div class="ul">
        <div class="li"></div>
    </div>
    <!-- <div class="line">
       <ul>
         <li><a  href="">综合</a></li>
         <li><a  href="">人气</a></li>
         <li><a  href="">新品</a></li>
         <li><a  href="">销量</a></li>
         <li><a  href="">价格</a></li>
         <li></li>
       </ul>
       <div class="list clearfix">
         <span>网格</span>
         <span>列表</span>
       </div>
    </div> -->
    <div class="produce_ul produce_shop_ul">
        <volist name="data" id="vo">
        <div class="searchgoods_shop">
            <if condition="$vo.logo eq '' "><a href="http://www.zhuangtu.net/s/{$vo.domain}" target="_blank"><img src="{$config_siteurl}statics/zt/images/hema_blueround_92_92.png" alt="{$vo.name}"></a><else/><a href="http://www.zhuangtu.net/s/{$vo.domain}" target="_blank"><img src="{$vo.logo}" alt="{$vo.name}"></a></if>
            <ul class="introduce">
                <li><a href="http://www.zhuangtu.net/s/{$vo.domain}" target="_blank"><strong>{$vo.name}</strong></a></li>
                <li><span>主营品牌：</span><if condition="$vo.num">{$vo.agent_brand}</li>
                <li><span>主营类目：</span>{$vo.business_scope}</li>
            </ul>
            <ul class="comment">
                <li><strong>店铺动态评分</strong></li>
                <li><span>描述相符：</span><if condition="$vo.num eq 0">5.0<else/>{$vo.num}</if></li>
                <li><span>服务态度：</span><if condition="$vo.num eq 0">5.0<else/>{$vo.num}</if></li>
                <li><span>物流服务：</span><if condition="$vo.num eq 0">5.0<else/>{$vo.num}</if></li>
            </ul>
            <!-- <ul class="result">
                <li><strong>与同行业相比</strong></li>
                <li><span>持平</span>······</li>
                <li><span>持平</span>······</li>
                <li><span>持平</span>10.74%</li>
            </ul> -->
            <div class="into">
                <a href="http://www.zhuangtu.net/s/{$vo.domain}" target="_blank">进入店铺<span>&gt;&gt;</span></a>
                <p class="into_shop"><span>{$vo.countnum}</span>件相关商品<span class="right">V</span></p>
            </div>
            <div class="produce">
                <volist name="vo.productinfo" id="data">
                <div class="produce_li">
                    <a href="{:U('Shop/Product/show',array('id'=>$data['id']))}" target="_blank"><img src="{$data.headpic}"></a>
                    <ul class="explain">
                        <li><!-- <span class="textr">{$data.count_comment}条评论</span> --><span class="money">￥{$data.min_price}</span></li>
                        <li><a href="{:U('Shop/Product/show',array('id'=>$data['id']))}" target="_blank">{$data.title}</a></li>
                        <li>{$data.sell_points}</li>
                        <!-- <li><span class="textr">月成交：{$data.count_sold}笔</span></li> -->
                    </ul>
                </div>
            </volist>
                <p><a href="{:U('Shop/Product/index',array('dom'=>$vo['domain']))}" target="_blank">更多相关商品&gt;&gt;</a></p>
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
    $(".into_shop").on("click",function(){
        $(this).parents(".searchgoods_shop").toggleClass("on");
    });
});
</script>
</html>
