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
    <div class="paysuctit">
        <strong>您已成功付款！</strong>
        <span>共计支付金额：</span>
        <span class="red">￥{$total_fee}</span>
    </div>
    <div class="paysuccon">
        <p class="info">
            <span>收货信息:</span>{$order_common['reciver_info']['zone']}&nbsp;{$order_common['reciver_info']['address']}
        </p>
        <p class="info">
            <span>收 货 人 :</span>{$order_common['reciver_info']['name']} &nbsp; {$order_common['reciver_info']['phone']}
        </p>
        <p class="links">
            您可以 <a href="{:U('Buyer/Order/index')}" target="_blank">查看已买到的宝贝</a>
<!--            <a href="">查看交易详情</a>-->
        </p>

       <!--  <volist name="order" id="vo">
            <dl class="dlpaygoods">
                <dt><strong>订单号:</strong><span>{$vo.order_sn}</span>    <strong>小计:</strong><span>{$vo['order_amount']}元</span></dt>
                <volist name="vo[order_goods]" id="voo">
                    <dd>
                        <span><a href="{:U('Shop/Product/show',array('id'=>$voo['goods_id']))}" target="_blank">{$voo.goods_name}</a> </span>
                        <span>{$voo.goods_num}</span>
                        <span>{$voo.goods_pay_price}</span>
                    </dd>
                </volist>
            </dl>
        </volist> -->
    </div>
 <volist name="order" id="vo">
    <table class="paysuc_table">
        <caption>
            合并 <span>2笔订单</span>
        </caption>
       
        <tr>
            <th>订单号：<span>{$vo.order_sn}</span> 小计：<span>{$vo['order_amount']}</span>元</th>
            <th>状态</th>
            <th>数量</th>
            <th>优惠信息</th>
            <th>服务</th>
        </tr>
        <volist name="vo[order_goods]" id="voo">
        <tr>
            <td>
                <a class="img" href="{:U('Shop/Product/show',array('id'=>$voo['goods_id']))}"><img src="{$voo.goods_image}" alt=""></a>
                <p>{$voo.goods_name}</p>
                <p>￥ {$voo.goods_pay_price}</p>
            </td>
            <td>已支付</td>
            <td>{$voo.goods_num}</td>
            <td></td>
            <td>
                <a href="">送货</a>
                <a href="">安装</a>
            </td>
        </tr>
         </volist>
    </table>
    </volist> 
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>

                    
</body>
</html>