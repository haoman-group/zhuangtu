<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>确认订单-装途网</title>
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
    <div class="page page-current" id="pageorderqr">
        <div class="opcheader headblackbg">
            <h1>扫码购买</h1>
            <span class="icon icon-user needlogin openpop"  data-popup=".popup-dh">
               <!--登录-->
            </span>
        </div>

        <div class="content content-address conbttomar">
            <form class="QR-orderConfirm">
            <div class="wap-address confirmaddr">
                <a  class="needlogin ">
                    <div class="card card-address select-address " data-addrid="">
                        <div class="linktoaddaddr ">选择收货地址</div>
                    </div>
                </a>
            </div>
            <ul class="ulorderconfirm" id="listorderconfirm">
                <li class="itemli">
                    <dl>
                        <dt><img src="/statics/wap/images/heart.png"/>{$shop.name}</dt>
                        <dd data-cartid="">
                            <a href="javascript:void(0)" class="dda">
                                <div class="ltbox">
                                    <div class="square">
                                        <img src="{$product.headpic}">
                                    </div>
                                </div>
                                <div class="rtbox">
                                    <div class="price">￥{$product.provalue.totel}</div>
                                    <div class="num">x{$Think.get.num|default=1}</div>
                                </div>
                                <div class="cenbox">
                                    <div class="tit">{$product.title}</div>
                                    <div class="proty">
                                        <volist name="product[provalue]" id="provalue">
                                            <?php if($key=='price'|| $key=='price_act') break; ?>
                                            {$key}：{$provalue['txt']}<br/>
                                        </volist>
                                    </div>
                                    <div class="promise">
                                        <!--<span>七天退换</span>-->
                                    </div>

                                </div>

                            </a>
                        </dd>
                    </dl>

                    <ul class="addons list-block fangshi">
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">标准合同</div>-->
<!--                                <div class="item-after">已签订</div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">配送方式</div>-->
<!--                                <div class="item-after">-->
<!--                                    <label class="label-checkbox item-content select">-->
<!--                                        <input type="radio" name="my-radio">-->
<!--                                        <div class="item-media  itmdi"><i class="icon icon-form-checkbox icon-color"></i></div>-->
<!--                                    </label>-->
<!--                                    买家自提-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">安装</div>-->
<!--                                <div class="item-after">-->
<!--                                    <label class="label-checkbox item-content select">-->
<!--                                        <input type="radio" name="my-radio">-->
<!--                                        <div class="item-media  itmdi"><i class="icon icon-form-checkbox icon-color"></i></div>-->
<!--                                    </label>-->
<!--                                    卖家安装</div>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="item-content">-->
<!--                            <div class="item-inner fangshib">-->
<!--                                <div class="item-title">工人保险</div>-->
<!--                                <div class="item-after">￥0.00</div>-->
<!--                            </div>-->
<!--                        </li>-->
                        <li class="item-content">
                            <p class="words"><input type="text" name="msg" placeholder="买家留言：选填，可填写您与卖家达成一致的要求"></p>
                        </li>
                    </ul>
                </li>
                <ul class="addons list-block fangshi">
                    <li class="item-amountto">
                        <div class="amount_div">
                            <span class="aleft">合计：￥{$product.provalue.totel}</span>
                            <span class="aright">实付款：￥{$product.provalue.totel}</span>
                        </div>
                    </li>
                </ul>
            </ul>
        </div>





        <div class="add-address content-block dingdana">
            <input name="num" id ='num' value="{$Think.get.num}" hidden>
            <input name="proid" id ='proid' value="{$Think.get.proid}" hidden>
            <input name="proindex" id ='proindex' value="{$Think.get.proindex}" hidden>
            <a   class="create-dingdanQR needlogin" >提交订单</a>
        </form>
        </div>


    </div>




</div>
<template file="Wap/common/_public.php"/>


</body>

