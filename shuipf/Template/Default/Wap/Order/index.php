<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的订单-装途网</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{$config_siteurl}statics/wap/images/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/appindex.css" >
</head>
<body>

<div class="page-group">
    <div class="page" id="orderlist" data-from = "{:I('from')}">
        <header class="bar bar-nav order-bar">
            <a class="button button-link back button-nav pull-left order-button" href="" data-transition='slide-out'>
                <span class="icon icon-left order-icon"></span>
                <span>全部订单</span>
            </a>
        </header>
        <div class="content">
            <div class="wap-order">
                <ul class="list">

                </ul>
            </div>
        </div>
    </div>

    <div class="popup popup-payway norpopup" style="top:40%;" id="popup-payway" >
        <div class="content-block payallc">
            <p class="ptop_a"><a href="#" class="popx confirm-ok"></a>付款详情</p>
            <div class="paycon">
                <div class="card-content wechat">
                    <div class="list-block media-list fangshi">
                        <ul>
                            <a class="btntoface on" data-href="/wap/order/">
                                <li class="item-content alipay">
                                    <div class="item-media">
                                        <img src="/statics/wap/images/paytoface.png" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">当面付</div>
                                        </div>
                                        <div class="item-subtitle">POS机等当面支付</div>
                                    </div>
                                </li>
                            </a>
                            <a class="btntowxpay external">
                                <li class="item-content">

                                    <div class="item-media">
                                        <img src="/statics/wap/images/wechat.png" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">微信支付</div>
                                        </div>
                                        <div class="item-subtitle">推荐安装微信5.0及以上版本的使用</div>
                                    </div>

                                </li>
                            </a>
                            <a class="btntoalipay external">
                                <li class="item-content alipay">
                                    <div class="item-media">
                                        <img src="/statics/wap/images/alipay.png" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">支付宝</div>
                                        </div>
                                        <div class="item-subtitle">推荐有支付宝账号的用户使用</div>
                                    </div>
                                </li>
                            </a>
                            <a class="btntoyinlian external" href="#" >
                                <li class="item-content alipay">
                                    <div class="item-media">
                                        <img src="/statics/wap/images/yinlian.png" width="44">
                                    </div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">银联支付</div>
                                        </div>
                                        <div class="item-subtitle">支持储蓄卡信用卡，无需开通网银</div>
                                    </div>
                                </li>
                            </a>



                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <div class="paycountbox">
            <div class="tariff">
                <strong>需付款</strong><span>￥{$total}</span>
            </div>
            <a  class="btnconfirmpay">确认付款</a>
        </div>
    </div>


</div>
<template file="Wap/common/_public.php"/>


</body>
</html>
