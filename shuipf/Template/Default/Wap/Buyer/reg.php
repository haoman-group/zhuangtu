<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>用户注册-1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/appindex.css" >
</head>
<body>


<div class="page-group">
    <div class="page page-reg" id="reg" data-comurl="{:$_SERVER['HTTP_REFERER']}">
        <header class="bar bar-nav address-bar">
            <a class="button button-link button-nav pull-left back address-button" href="" data-transition="slide-out">
                <span class="icon icon-left address-icon"></span>
                <span>手机快速注册</span>
            </a>

        </header>

        <div class="content">
            <div class="reg_con">
                <form id="regform">
                    <ul>
                        <li><input type="text" name="mobile" value="" class="cjinput" placeholder="请输入手机"/></li>

                        <input type="hidden" name="username" value="装途网用户" class="cjinput" placeholder="用户名"/>

                        <!--<li>请输入收到的短信验证</li>-->
                        <li>
                            <input type="text" class="cjinput verify" name="code" value="" placeholder="请输入验证码"/>
                            <input type="button" class="chongxin btnsellerregfrom_verify" value="获取验证码">
                        </li>
                        <!-- <li><p>遇到问题?您可以<strong>联系客服</strong>。</p></li> -->


                        <li><input type="password" name="password" class="cjinput" placeholder="请输入6-20位字"/></li>
                        <li>密码由6-20位字符组成，包含至少两种以上字母、数字、或者半角符号，区分大小写。</li>
                        <li class="radio"><input type="radio" checked name="bm" value="1"/>同意装途用户注册协议<a class="alert-text-title tips">联系客服</a></li>

                        <li class="bsbut"><button class="regbtnon">注册</button></li>
                    </ul>
                </form>
            </div>
        </div>

    </div>

</div>

<template file="Wap/common/_public.php"/>

</body>
</html>
