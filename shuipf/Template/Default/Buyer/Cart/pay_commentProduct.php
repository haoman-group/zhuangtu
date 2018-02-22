<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>支付成功</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/base.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/pay_page.css">
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>

</head>
<body>

<!-- 背景容器 -->
<div class="pay_page_topbg">
    <!-- 保护容器 -->
    <div class="pay_page_top">
        <a href="" class="ppt_img"><img src="{$config_siteurl}statics/zt/images/findpsw/ureglogo.png" alt=""></a>
        <a href="" class="ppt_text"><span class="iphone">400-003-3030</span><span>客服热线</span></a>
    </div>
</div>

<div class="container">

    <div class="paycompro">
        <strong>评价宝贝</strong>
    </div>

    <volist name="order" id="vo">
        <volist name="vo[goods]" id="v" key='k'>
    <ul class="paycompro_list clearfix">
        <li>
            <dl>
                <dt><a href="{:U('Shop/Product/show',array('id'=>$v['goods_id']))}"><img src="{$v.goods_image}" alt=""></a></dt>
                <dd><a href="{:U('Shop/Product/show',array('id'=>$v['goods_id']))}">{$v.goods_name} </a></dd>
                <dd><span>￥{$v['goods_price']}</span></dd>
                <dd>购买时间：<?php echo date("Y-m-d H:s:i",$vo['addtime'])?></dd>
            </dl>
        </li>
        <li><a href="{:U('Buyer/Cart/pay_comment',array('order_sn'=>$vo['order_sn'],'id'=>$v['goods_id']))}">评价宝贝</a></li>
    </ul>
            </volist>
        </volist>

    <!--<ul class="paycompro_list clearfix">
        <li>
            <dl>
                <dt><a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/pay_comment.jpg" alt=""></a></dt>
                <dd><a href="">热销 多乐士漆致悦无添加抗污18L内墙乳胶漆 墙面漆 乳胶漆 </a></dd>
                <dd><span>￥188.90</span></dd>
                <dd>购买时间：2016-03-15</dd>
            </dl>
        </li>
        <li><input type="button" value="评价宝贝"></li>
    </ul>-->
    <!-- <div class="paysuccon">
        <p class="info">
            {$order_common['reciver_info']['zone']}&nbsp;{$order_common['reciver_info']['address']}
        </p>
        <p class="info">
            {$order_common['reciver_info']['name']} &nbsp; {$order_common['reciver_info']['phone']}
        </p>
        <p class="links">
            您可以 <a href="{:U('Buyer/Order/index')}" target="_blank">查看已买到的宝贝</a>
            <a href="">查看交易详情</a>
        </p>

        <volist name="order" id="vo">
            <dl class="dlpaygoods">>{$vo['order_amount']}元</span></dt>
                <volist name="vo[order_goods]" id="voo">
                    <dd>
                <dt><strong>订单号:</strong><span>{$vo.order_sn}</span>    <strong>小计:</strong><span
                        <span><a href="{:U('Shop/Product/show',array('id'=>$voo['goods_id']))}" target="_blank">{$voo.goods_name}</a> </span>
                        <span>{$voo.goods_num}</span>
                        <span>{$voo.goods_pay_price}</span>
                    </dd>
                </volist>
            </dl>
        </volist>
    </div> -->
</div>

<template file="common/_promise.php"/>
<template file="common/_footer.php"/>

                    
</body>
</html>