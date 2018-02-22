<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>今日爆款</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{$config_siteurl}statics/wap/images/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/appindex.css" >

</head>
<body>
<a name="top" id="top"></a>
<div class="page-group">
    <div class="page page-current" id="keyprods">
        <div class="opcheader nofixdhead">
            <span class="icon icon-left"></span>
            <div class="center">
                <div class="searbox">
                    <input type="text" class="inptxt inpsear" placeholder="家，从装途网开始ing..." >
                    <a class="btnsear icon icon-search" ></a>
                </div>
            </div>
            <span class="icon icon-user needlogin openpop"  data-popup=".popup-dh">
            </span>
        </div>
        <div class="content keycontent">
            <div class="swiper-container swiperztcom" data-space-between='10'>
                <div class="swiper-wrapper">

                    <div class="swiper-slide"><a href="{:U('Wap/Product/show',array('id'=>$posdata['237']['1']['dataid']))}"><img src="<?php if(!empty($posdata['237']['1']['wap_picture'])){ echo $posdata['237']['1']['wap_picture']; }else{ echo  $posdata['237']['1']['picture']['0']; }  ?>" alt=""></a></div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="allkeyprods">
                <div class="newpattern">
                    <h2><span>新款上架  多种爆款任您选购</span></h2>
                </div>
                <ul>
                    <volist name="productweixin" id="vo">
                        <if condition="$vo[dataid] neq ''">
                         
                       
                    <li>
                        <a href="{:U('Wap/Product/show',array('id'=>$vo['dataid']))}" class="prodsa">
                            <!-- <img src="{$vo['wap_picture']}"> -->
                            <img src="<?php if(!empty($vo['wap_picture'])){ echo $vo['wap_picture']; }else{echo $vo['picture']['0']; } ?>">
                            <span class="fervent">火热开抢</span>
                        </a>
                        <div class="prname">
                             
                            <a href="{:U('Wap/Product/show',array('id'=>$vo['dataid']))}"> {$vo.title} </a>
                            <div class="zt_price">
                              

                                <p>{$vo['description']}</p>
                                <span class="tip">装途专享</span>
                                <strong>￥<span><if condition="$vo['data']['min_price'] eq $vo['data']['max_price']">{$vo['data']['min_price']}<else/>{$vo['data']['min_price']}-{$vo['data']['max_price']}</if></span></strong>
                                <span class="original">原价：<if condition="$vo['data']['min_price_ori'] eq $vo['data']['max_price_ori']">{$vo['data']['min_price_ori']}<else/>{$vo['data']['min_price_ori']}-{$vo['data']['max_price_ori']}</if></span>
                                <!-- <span class="original">原价：{$vo.data.price_min|sprintf='%.2f',###}<if condition="$vo['data']['min_price'] neq $vo['data']['max_price']"> - {$vo.data.price_max|sprintf='%.2f',###}</if></span> -->
                            </div>
                        </div>
                    </li>
                </if>

                </volist>
                   <!-- <li>
                        <a href="#" class="prodsa">
                            <img src="{$config_siteurl}statics/wap/images/index/pords-2.jpg">
                            <span class="fervent">火热开抢</span>
                        </a>
                        <div class="prname">
                            <a href="">【 Supor/苏泊尔  618特惠 】</a>
                            <div class="zt_price">
                                <p>CYSB50YC89-100智能电压力锅全网价最低</p>
                                <strong>￥<span>279</span>.00</strong>
                                <span class="tip">五一特惠</span>
                                <span class="original">原价：359</span>
                            </div>
                        </div>
                    </li>-->
                </ul>
                <div class="xianshi">已显示全部内容</div>
                <a  class="totop"><img src="{$config_siteurl}statics/wap/images/returntop.png"></a>
            </div>
        </div>
    </div>
</div>


<template file="Wap/common/_public.php"/>

</body>
</html>