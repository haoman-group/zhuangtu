<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{$shopInfo.name}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js"></script>
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>
<div id="teamWorker">
    <div class="container">
        <img src="{$shop.logo}" alt="" class="img">
        <dl class="name">
            <dt title="{$shop.name}">{$shop.name}</dt>
            <!-- <dd>zhang dali</dd> -->
        </dl>
        <dl class="style">
            <dt>{$shop.years}年设计保证</dt>
            <dd>{$shop.introduce}</dd>
        </dl>
        <p class="idea"><if condition ="$shop['detail'] neq '' ">设计理念：{$shop.detail}</if></p>
        <a href="" class="btn"></a>
    </div>
</div>
<div class="teamWorker">
    <div class="container">
        <div class="title">
            <span>1F</span>
            <strong>合作工长</strong>
            <em> / Cooperation foreman</em>
        </div>
        <ul class="clearfix">
            <li><img src="{$config_siteurl}statics/zt/images/teamworker/teamworker.jpg" alt="合作工长"></li>
            <volist name='teamworker' id='vo'>
                <if condition="$vo['cid'] eq '103'">
                    <li>
                        <a class="img" href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}" alt=""></a>
                        <p class="desc"><strong>{$vo.workername}</strong><span>装修队/从业年限：{$vo.workyears}年</span></p>
                        <p class="price"><span>￥{$vo..min_price|sprintf='%.2f',###}/m<sup>2</sup></span><if condition="$vo['min_price'] neq $vo['max_price']">&nbsp;&nbsp;-&nbsp;&nbsp;<span>￥{$vo.max_price|sprintf='%.2f',###}/m<sup>2</sup></span></if></p>
                        <a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}" class="btn">立即查看</a>
                    </li>
                </if>
            </volist>

        </ul>
    </div>
</div>
<div class="material">
    <div class="container">
        <div class="title">
            <span>2F</span>
            <strong>主材包</strong>
            <em> / Material combination</em>
        </div>
        <ul class="clearfix">
            <volist name='teamworker' id='vo'>
                <if condition="$vo['cid'] eq '124886059'">
                    <li>
                        <a class="img" href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}" alt=""></a>
                        <p class="price clearfix"><strong>￥{$vo.min_price|sprintf='%.2f',###}<if condition="$vo['min_price'] neq $vo['max_price']"> - {$vo.max_price|sprintf='%.2f',###}</if></strong><span>成交：{$vo.count_sold}笔</span></p>
                        <p class="desc">{$vo.title}</p>
                        <a class="shop" href="/s/{$shop.domain}">{$shop.name}</a>
                    </li>
                </if>
            </volist>
        </ul>
    </div>
</div>
<div class="auxiliary">
    <div class="container">
        <div class="title">
            <span>3F</span>
            <strong>辅材包</strong>
            <em> / Auxiliary combination</em>
        </div>
        <ul class="clearfix">
            <volist name='teamworker' id='vo'>
                <if condition="$vo['cid'] eq '124886060'">
                    <li>
                        <a class="img" href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}" alt=""></a>
                        <p class="price clearfix"><strong>￥{$vo.min_price|sprintf='%.2f',###}<if condition="$vo['min_price'] neq $vo['max_price']"> - {$vo.max_price|sprintf='%.2f',###}</if></strong><span>成交：{$vo.count_sold}笔</span></p>
                        <p class="desc">{$vo.title}</p>
                        <a class="shop" href="/s/{$shop.domain}">{$shop.name}</a>
                    </li>
                </if>
            </volist>
        </ul>
    </div>
</div>
<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>

</body>
</html>
<script>
    $(function(){
        var str = $("#teamWorker .name").find("dt").html();
        if(str > 10){
            $("#teamWorker .name").find("dt").html(str.substring(0,10)+'...');
        }else{
            $("#teamWorker .name").find("dt").html(str);
        }

    })
</script>
