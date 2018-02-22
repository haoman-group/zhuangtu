<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>辅材购买</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/accessory.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>
<!--导航-->

<div class="submarttop">
    <div class="content">
        <img src="{$config_siteurl}statics/zt/images/sub-material/title.png">
        <h2>帮助顾客解决购物繁琐等问题</h2>
        <p class="chinese">提供了消费者自己买材料，自己找工人的辅材购买解决方案，让消费者做到干什么花什么钱，明明白白装家每一步</p>
        <p class="contentUs">联系我们：400-003-3030</p>
        <!-- <p class="english">Provide the consumers to buy their own materials, to find their own auxiliary workers buy solutions, so that consumers do what to spend any money, clearly arranged home every step</p> -->
    </div>
</div>
<!--保护容器-->
<div class="container">
    <div class="submartclassulcontainer">
        <ul class="submartclassul chtitul" data-tag="class">
            <div class="img"><img src="{$config_siteurl}statics/zt/images/sub-material/shopcart.png"></div>
            <span>辅材购物表</span>
            <li class="first"><h5>辅材购物表</h5></li>
            <volist name="hierarchy" id="vo">
                <li class="chtitli<?php if($vo['cid'] == $current_category) echo " on"?>">{$i}. {$vo.name}</li>
            </volist>
        </ul>
    </div>
    <ul class="submartclassli chconul" data-tag="class">
        <volist name="hierarchy" id="vo_category">
            <li class="chconli<?php if($vo_category['cid'] == $current_category) echo ' on'?>">
                <div class="title">
                    <volist name="vo_category['item']" id="vo_type">
                        <a href=""><span>{$vo_type.name}</span></a>
                    </volist>
                </div>
                <volist name="vo_category['item']" id="vo_type" key="type_idx">
                    <div class="cates floor">
                        <i>{$type_idx}F</i>
                        <strong>{$vo_type.name}</strong>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <td>名称</td>
                            <td>品牌</td>
                            <td>单价</td>
                            <td>数量</td>
                            <td>总价</td>
                            <td>单位</td>
                        </tr>
                        </thead>
                        <tbody>
                            <volist name="vo_type['item']" id="vo_accessory" >
                                <nonempty name="details[vo_accessory]">
                                    <tr data-product-id="{$vo_accessory}">
                                        <td>
                                            <img src="{$details[$vo_accessory]['headpic']}">
                                            <span class="name">{$details[$vo_accessory].title}</span>
                                        </td>
                                        <td>
                                            <foreach name="details[$vo_accessory]['brand']" item="vo_brand">
                                                <em data-brand-id="{$vo_brand.hidden_value}"><img src="{$config_siteurl}statics/zt/images/sub-material/choose.png"></em>
                                                <label title="{$vo_brand.hidden_value}">{$vo_brand.name}</label>
                                            </foreach>
                                        </td>
                                        <td>
                                            <span class="price"><if condition="$details[$vo_accessory]['min_price'] eq $details[$vo_accessory]['max_price']">￥{$details[$vo_accessory].min_price} <else /> ￥{$details[$vo_accessory].min_price} - ￥{$details[$vo_accessory].max_price}</if></span>
                                        </td>
                                        <td>
                                            <input type="text" class="count" value="0" readonly >
                                            <span>
                                                <a href="javascript:void(0)">-</a>
                                                <a href="javascript:void(0)">+</a>
                                            </span>
                                        </td>
                                        <td><span class="price">￥0.00</span></td>
                                        <td>
                                            <span>{$details[$vo_accessory].unit_name}</span>
                                        </td>
                                    </tr>
                                </nonempty>
                            </volist>
                        </tbody>
                    </table>
                </volist>
            </li>

        </volist>
    </ul>
    <div class="submartpaycontainer">
        <table class="submartpay">
            <tbody>
                <tr>
                    <td>共<span id="order_count">0</span>件商品</td>
                    <td>合计（不含运费）：<span id="order_amount">0.00</span>元</td>
                    <td><a class="btnaccessorycart needlogin"><img src="{$config_siteurl}statics/zt/images/sub-material/shopred.png">加入购物车</a></td>
                    <td><a class="btnaccessorybuy needlogin">结算</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    var accessory_details = <empty name="details">""<else/>{:json_encode($details)}</empty>;
</script>
<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>


</body>
</html>
