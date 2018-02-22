<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
</head>
<body>
<template file="common/_header.php"/>
<div class="container sellercenter_wrap scaccount">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
        <div class="crumbs">
            <a href="{:U('Seller/Index/index')}" class="cat-ajx">卖家中心</a>
            <a href="#" class="icon-ajx"> > </a>
            <a href="{:U('Seller/Index/index')}" class="icon-ajx">账号管理 </a>
            <a href="{:U('Member/Account/secure')}" class="icon-ajx"> > </a>
            <a href="###" class="icon-ajx">银行卡 </a>
            <a href="#" class="icon-ajx"> </a>
        </div>
        <!-- <if condition="$result['bank_card_number'] neq ''">
        <div class="messgae" style="width:800px;heigth:200px;margin-top:20px;">
               <img src="">
            <span>{$result['bank']}</span>
            <a href="{:U('cart')}" style="color:blue;margin-left:600px;">换卡</a>
        </div>
        <hr>
        <div>
            <span name="numb" class="cartid">{$numb}</span>
            <input type="hidden" id="result" value="{$result['bank_card_number']}"><button id="numb">显示</button>
            </br>
            <span>{$amount}</span>

        </div><else/>
            <div>
                <h4> <a href="{:U('shop_bank_step0')}">您还没有绑卡,请您绑卡</a></h4>
            </div></if> -->
        <if condition="$result['bank_card_number'] neq ''">
        <div class="message">
            <div class="message_top clearfix">
                <p><img src="{$config_siteurl}statics/zt/images/sellercenter/jbk.jpg" alt="银行卡"><span>{$result['bank']}  （已认证）</span></p>
                <a href="{:U('cart')}">换卡</a>
            </div>
            <div class="message_bottom clearfix">
                <p name="numb" class="cartid">{$numb}<input type="hidden" id="result" value="{$result['bank_card_number']}"><input type="button" id="numb" value="显示"></p>
                <p>累计收入：<strong>{$amount}元</strong></p>
            </div>
        </div>
        <else/>
        <h5 class="bank_tips"><a href="{:U('shop_bank_step0')}">您还没有绑卡,请您绑卡</a></h5>
        </if>
       <!-- <if condition="$result['bank_card_number'] neq ''  ">
        <div>
            <p>银行卡号:<span name="result">{$result['bank_card_number']}</span></p>
            <p>发卡银行:<span>{$result['bank']}</span></p>
            <p>累计收入:<span name="amount">{$amount}</span></p>
        </div>

        <div>
           <a href="{:U('cart')}">解卡</a>
            <a href="{:U('edit')}">换卡</a>
        </div><else/>
            <div>
               <h4> <a href="{:U('shop_bank_step0')}">您还没有绑卡,请您绑卡</a></h4>
            </div></if>-->
    </div>
</div>
</body>
<script>
    $("#numb").click(function(){
        $(".cartid").html($("#result").val());

    });

</script>
</html>