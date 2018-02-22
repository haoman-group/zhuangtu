<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>

    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
</head>
<body>
  <template file="common/_header.php"/>
  <!--中部-->
  <div class="seller_reg_process_ul">
    <ul>
      <li class="on">
        <em></em>
        <span>1.商家注册</span>
      </li>
      <li>
        <em></em>
        <span>2.申请开店</span>
      </li>
      <li >
        <em></em>
        <span>3.绑定银行卡</span>
      </li>
      <li>
        <em></em>
        <span>4.资质审核</span>
      </li>
      <li>
        <em></em>
        <span>5.创建店铺</span>
      </li>
      <li>
        <em></em>
        <span>6.店铺上线</span>
      </li>
    </ul>
  </div>
  <!--下部-->
  <!--保护容器-->
  <div class="seller_reg_info_ul">
    <div class="seller_reg_info_li finish"> <b></b>
      免费注册
    </div>
    <div class="seller_reg_info_li finish"> <b></b>
      设置登录名
    </div>
    <div class="seller_reg_info_li finish">
      <b></b>
      填写账户信息
    </div>
    <div class="seller_reg_info_li finish">
      <b></b>
      注册成功
    </div>
  </div>
</div>
<!--内容-->
<!--保护容器-->
<div class="seller_main">
  <dl class="dlform sellerregform">
    <div class="sellerregfrom_success">
      <dt class="titj">
        <img src="{$config_siteurl}statics/zt/images/sellerdologin/Seller_registerRight.png" />

      </dt>
      <dd class="tit">恭喜您注册成功！</dd>

      <dd class="txt regtxt">
        您注册的用户名为<span>{$userinfo['username']}</span>
      </br>
      该账号可同时用于
      <span>客服</span>
      登录，密码同
      <span>装途网登录密码</span>
    </dd>
    <dt></dt>
    <dd>
      <a class="btn_sellerreg_next btn_sellerreg_nexton" href="{:U('shop_cate')}">创建店铺</a>
    </dd>
  </div>
</dl>
</div>
<!--保证栏-->
<template file="common/_footer.php"/>
</body>
</html>