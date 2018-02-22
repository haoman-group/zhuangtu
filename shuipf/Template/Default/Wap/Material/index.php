<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>网购主材-装途网</title>
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
    <div class="page page-current" id="materials">
        <div class="opcheader">
            <a href="#" class="icon icon-left back"></a>
            <div class="center">
                <div class="searbox">
                    <input type="text" class="inptxt inpsear" placeholder="家，从装途网开始ing..." >
                    <a class="btnsear icon icon-search" ></a>
                </div>
            </div>
            <span class="icon icon-user needlogin openpop"  data-popup=".popup-dh"></span>
        </div>
        <div class="content materialcon">
            <div class="swiper-container swiperztcom" data-space-between='10'>
                <ul class="swiper-wrapper carousel">
                    <li class="swiper-slide">
                        <a href=""><img class="lbimg" src="{$config_siteurl}statics/wap/images/material/Material.jpg"></a>
                    </li>
                </ul>
                <div class="swiper-pagination"></div>
            </div>
            <h3 class="oneh3"><img src="{$config_siteurl}statics/wap/images/material/materialimgh-1.jpg"></h3>
            <div class=" swiper-container swiper-container-keyprods fun_keyprods">
                <ul class="swiper-wrapper selling" data-zc="90">
                    <li class="swiper-slide row materialkey">
                        <a href="#" class="col-50 explosion exphref">
                            <div class="allimgs">
                                <img class="funimg" src="{$config_siteurl}statics/wap/images/furniture/pao1.jpg">
                                <span  class="pictimg"><img src="{$config_siteurl}statics/wap/images/material/picturetitle1.png"></span>
                            </div>
                            <div class="instruction">
                                <p class="ptitle">马可波罗磁砖</p>
                                <span class="into">进入店铺</span>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="swiper-button-next furnnext"></div>
                <div class="swiper-button-prev furnprev"></div>
            </div>
            <h3><img src="{$config_siteurl}statics/wap/images/material/materialimgh-2.jpg"></h3>
            <ul class="row materialkey matekeycon" id="matkeys" data-domain="{:I('id')}">
                <li class="col-50">
                    <a href="#">
                        <div class="square">
                            <img src="{$config_siteurl}statics/wap/images/material/keys1.jpg">
                        </div>
                    </a>
                </li>
            </ul>
            <h3><img src="{$config_siteurl}statics/wap/images/material/materialimgh-3.jpg"></h3>
            <ul class="row materialkey tuijian">
                <li class="col-50 product ">
                    <a href="#"class="toprod square"><img src="{$config_siteurl}statics/wap/images/material/product1.jpg"></a>
                    <a href="#" class="introduce toprod">【TOTO】厨房五金挂件太空铝厨房置物架壁挂刀架厨房挂件</a>
                    <div class="pricefur price">￥<span>499</span></div>
                </li>
            </ul>
            <h3><img src="{$config_siteurl}statics/wap/images/material/materialimgh-4.jpg"></h3>
            <ul class="row materialkey tuijian""></ul>
            <h3><img src="{$config_siteurl}statics/wap/images/material/materialimgh-5.jpg"></h3>
            <ul class="row materialkey tuijian""></ul>
            <h3><img src="{$config_siteurl}statics/wap/images/material/materialimgh-6.jpg"></h3>
            <ul class="row materialkey tuijian""></ul>
            <h3><img src="{$config_siteurl}statics/wap/images/material/materialimgh-7.jpg"></h3>
            <ul class="row materialkey tuijian""></ul>
            <h3><img src="{$config_siteurl}statics/wap/images/material/materialimgh-8.jpg"></h3>
            <ul class="row materialkey tuijian""></ul>
<!--            <div class="foot_sert">-->
<!--                <div class="opj"></div>-->
<!--                <a href="#" class="cart">购物车</a>-->
<!--                <a href="#" class="service">在线客服</a>-->
<!--            </div>-->

        </div>
    </div>

</div>


<template file="Wap/common/_public.php"/>

</body>
</html>
