<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>支付页面</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/base.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/pay_page.css">
<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
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
<template file="common/_top.php"/>
<div class="pay_page_topbg">
    <!-- 保护容器 -->
    <div class="pay_page_top">
        <a href="" class="ppt_img"><img src="{$config_siteurl}statics/zt/images/findpsw/ureglogo.png" alt=""></a>
        <a href="" class="ppt_text"><span class="iphone">400-003-3030</span><span>客服热线</span></a>
    </div>
</div>

<form action="{:U('pay')}" method="post">

    <div class="submit_success">
        <div class="clearfix">
            <div class="sub_suc_left">
                <h5>订单已提交！去付款~</h5>

                <p>请在下单后<span class="lefttime">6</span>小时内完成支付，超时后将取消订单</p>

                <p>收货信息：{$order_common['reciver_info']['zone']}&nbsp;{$order_common['reciver_info']['address']}&nbsp;{$order_common['reciver_info']['name']}(收)</p>



            </div>
            <div class="sub_suc_right">
                <p>订单总额：<span>{$total_fee}元</span></p>
            </div>
        </div>

        <div class="merge">合并 <span>{$order|sizeof=###}笔订单</span></div>

        <volist name="order" id="vo">
            <dl class="dlpaygoods">
                <dt><strong>订单号:</strong><span>{$vo.order_sn}</span>    <strong>小计:</strong><span>{$vo['order_amount']}</span>元</dt>
                <volist name="vo[order_goods]" id="voo">
                    <dd>
                        <span><a href="{:U('Shop/Product/show',array('id'=>$voo['goods_id']))}" target="_blank">{$voo.goods_name}</a> </span>
                        <span>{$voo.goods_num}</span>
                        <span>{$voo.goods_pay_price}</span>
                    </dd>
                </volist>
                <dd>买家留言: {$vo.order_common.order_message}</dd>
            </dl>
        </volist>
<!--         <div class="install_count">
            <p class="on"><span>首付付款</span><span>金额：<strong>12.20</strong>元<i></i></span><span>此次付款</span></p>
            <p><span>尾款付款</span><span>金额：<strong>12.20</strong>元<i></i></span><span>下次付款</span></p>
        </div> -->
    </div>

    <div class="pay_method">
        <h5>请选择支付方式</h5>
        <h6>支付平台</h6>
        <div data-code="ALI_WEB" class="btntopay">
            <img src="/statics/zt/images/pay_page/zhi.jpg" alt=""><a href="javascript:void(0)">选择支付宝付款</a>
        </div>
        <div data-code="WX_NATIVE" class="btntopay">
            <img src="/statics/zt/images/pay_page/wei.jpg" alt=""><a href="javascript:void(0)">微信支付</a>
        </div>
        <div data-code="UN_WEB" class="btntopay">
            <img src="/statics/zt/images/pay_page/unionpay.png" alt=""><a href="javascript:void(0)">银联支付</a>
        </div>

        <input type="hidden" name="payment_code" value="ALI_WEB">
        <!-- <span>请输入支付密码</span> <input type="password" value=""> -->
        <input type="hidden" name="pay_sn" value="{$pay_sn}">
        <!-- 支付类型，线下支付 -->
        <input type="text" name="pay_type" value="0" hidden>

    </div>

</form>

<template file="common/_promise.php"/>
<template file="common/_footer.php"/>


<script>
    $(function(){
        $(".btntopay").click(function(){
            $("[name='payment_code']").val($(this).attr("data-code"));
            $("form").submit();
        })
    })
</script>
</body>
</html>
