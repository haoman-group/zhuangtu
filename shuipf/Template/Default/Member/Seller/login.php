<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>商家首页－登录</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>

    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/Seller_login.js"></script>
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
    <div class="seller_reg_info_li"> <b></b>
      设置登录名
    </div>
    <div class="seller_reg_info_li">
      <b></b>
      填写账户信息
    </div>
    <div class="seller_reg_info_li">
      <b></b>
      注册成功
    </div>
  </div>
  <!--内容-->
  <!--保护容器-->
  <div class="container">
    <div class="seller_main">
      <div class="seller_main_box">
        <div class="seller_login">
          <b>装途网欢迎您登录</b>
          <form id="form_login" action="{:U('doLogin')}" method="post">
            <p>
              <img src="{$config_siteurl}statics/zt/images/Seller_loginMainConInput1.png" />
              <input placeholder="用户名/手机号/邮箱" name="loginName" />
            </p>
            <p>
              <img src="{$config_siteurl}statics/zt/images/Seller_loginMainConInput2.png" />
              <input type="password" placeholder="密码" name="password" />
            </p>
            <i class="error seller_error" id='tips' >{$errMsg}</i>
            <a href="javascript:$('#form_login').submit()" class="login">登 录</a>
          </form>
            <a href="{:U('/Member/Account/resetpwd')}" class="forgetPasswd">忘记密码</a>
        </div>
        <div class="seller_login_reg">
          <a href="{:U('reg_mobile')}">免费注册</a>
        </div>
      </div>
    </div>
  </div>
  <!--保证栏-->
<template file="common/_promise.php"/>
  <template file="common/_footer.php"/>
</body>
<script>
  $(window).keydown(function (event) {
    if(event.keyCode == 13){
      $("#form_login").submit();
    }
  });
</script>
</html>