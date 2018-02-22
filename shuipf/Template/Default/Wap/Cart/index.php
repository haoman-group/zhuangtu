<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>购物车-装途网</title>
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
    <div class="page page-current" id="cartlist">
        <header class="bar bar-nav">
            <a class="button button-link button-nav pull-left back"  data-transition='slide-out'>
                <span class="icon icon-left"></span>
                返回
            </a>
            <h1 class="title">购物车</h1>
        </header>

        <div class="content">
            <!-- Slider -->
            <form action="/Wap/Cart/orderconfirm" method="post">
            <div class="wap_cart">
                <ul class="ulcartlist">
                    <volist name="data" id="vo">
                    <li>
                        <h4>
                            <img src="{$config_siteurl}statics/wap/images/heartbgrey.png">
                            {$vo.shopinfo.name}
                            <img class="btndel" src="{$config_siteurl}statics/wap/images/deletebgrey.png">
                        </h4>
                        <volist name="vo['cart']" id="v">
                        <table data-id="{$v.id}" data-proid="{$v.product.id}">
                            <tr>
                                <td>
                                    <em class="eminp" data-emcid="{$v.proid}"><img src="{$config_siteurl}statics/wap/images/rightbwhite.png"></em>
                                    <input type="checkbox" name="cartid[]" value="{$v.id}" class="inptem" >
                                </td>
                                <td>
                                    <img src="{$v.product.headpic}">
                                </td>
                                <td>
                                    <p>{$v.product.title}</p>
                                    <div class="num"><span class="btnopbuynum" data-span="-1">-</span><input data-num="1" class="inpnum" data-orival="{$v.num}" type="text" value="{$v.num}"><span class="btnopbuynum add" data-span="1">+</span></div>
                                </td>
                                <td>
                                    <span data-price="{$v[product][provalue][price_act]}" class="price">{$v[product][provalue][price_act]}</span>
                                    <span class="pricetot">￥<strong class="total">{$v[total]}</strong></span>
                                    <span class="amount">x<strong>{$v.num}</strong></span>
                                </td>
                            </tr>
                        </table>
                        </volist>
                        <div class="btn">
                            <span  class="btncartlistinfo" data-txt="{$vo.shopinfo.phone}">电话</span>
                            <!-- About Popup -->
                            <!--浮动内容-->
                            <!--电话-->
                           <!--  <div class="popup popupcart popup-phone" hidden>
                                <div class="fixwhitebox phone close-popup">
                                    <h5>
                                        <img class="headimg" src="{$config_siteurl}statics/wap/images/phonebred.png">
                                        拨打电话
                                    </h5>
                                    <ul>
                                        <li>{$vo.shopinfo.phone}</li>
                                    </ul>
                                </div>
                            </div> -->
                            <span  class="btncartlistinfo" data-txt="{$vo.shopinfo.addr}" >地址</span>
                            <!--地址-->
                                <div class="popup popupcart popup-address" hidden>
                                    <div class="whitehalfbox address">
                                        <h4>
                                            <img class="posiab close-popup" src="{$config_siteurl}statics/wap/images/closebgrey.png">
                                            地址列表
                                        </h4>
                                        <h5>
                                            <img src="{$config_siteurl}statics/wap/images/warnbblue.png">
                                            <span>请您选择离您最近的地址进行线下导航!</span>
                                        </h5>
                                        <ul class="open-popup" data-popup=".popup-address2">
                                            <li >{$vo.shopinfo.addr}</li>
                   <!--                          <li>山西太原市万柏林区长风街道国城长风16号15A04...</li>
                                            <li>山西太原市万柏林区长风街道国城长风16号15A04...</li>
                                            <li>山西太原市万柏林区长风街道国城长风16号15A04...</li>
                                            <li>山西太原市万柏林区长风街道国城长风16号15A04...</li>
                                            <li>山西太原市万柏林区长风街道国城长风16号15A04...</li>
                                            <li>山西太原市万柏林区长风街道国城长风16号15A04...</li>
                                            <li>山西太原市万柏林区长风街道国城长风16号15A04...</li> -->
                                        </ul>
                                        <span class="load">点击加载更多...</span>
                                    </div>
                                </div>
<!--                                <a href=""> <span>联系卖家</span></a>-->
                        </div>
                    </li>
                </volist>
                </ul>
                <table class="pay">
                    <tr>
                        <td>

<!--                            <p><em><span><img src="{$config_siteurl}statics/wap/images/rightbgrey.png"><img src="{$config_siteurl}statics/wap/images/rightbwhite.png"></span></em>全选</p>-->
<!--                            <p><em><img src="{$config_siteurl}statics/wap/images/deletebgrey.png"></em>删除</p>-->

                        </td>
                        <td>
                            <span class="totnum" style="display: none;"></span>
                            合计:<span class="price">￥<strong class="zongjia">0.00</strong></span>
                        </td>
                        <td><input type="submit" value="结算下单"></td>
                    </tr>
                </table>
            </div>
        </form>
        </div>


    </div>
</div>
<template file="Wap/common/_public.php"/>



<div class="popup popupcart popup-address2">
    <div class="fixwhitebox address">
        <h4>
            去导航？
            <img class="footerimg" src="{$config_siteurl}statics/wap/images/addressbgrey.png">
        </h4>
        <div class="btn">
            <a href="#" class="close-popup">确  定</a>
            <a href="#" class="close-popup">取  消</a>
        </div>
    </div>
</div>

<template file="Wap/common/_public.php"/>

</body>
