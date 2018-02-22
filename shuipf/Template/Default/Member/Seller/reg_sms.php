<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <title>装途网-注册</title>
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
  <!--背景容器-->
  <template file='common/_header.php'/>
  <!--中部-->
  <div class="seller_reg_process_ul">
    <ul>
      <li  class="on">
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
    <div class="seller_reg_info_li">
      <b></b>
      填写账户信息
    </div>
    <div class="seller_reg_info_li">
      <b></b>
      注册成功
    </div>
  </div>
</div>
<!--内容-->
<!--保护容器-->
<div class="seller_main">
  <dl class="dlform sellerregform">
    <div class="sellerregform_verifybox">
    <form id="form_vcode" action="{:U('reg_sms')}" method="post">
      <dd class="wdd marbot10">
        <h1>填写校验码</h1>
      </dd>
      <dd class="wdd">
        <span class="icon_i">i</span>
        校验码已发送到你的手机，15分钟内输入有效，请勿泄露
      </dd>
      <dt>手机号码</dt>
<!--        <span class="refrom_num86">+86</span>-->
      <dd class="ddfont">
        <input value="{$mobile}" name="mobile"  readonly/>
      </dd>
      <dt> <strong>校验码</strong>
      </dt>
      <dd class="erdd">
        <input class="inptverify" class="sellerregfrom_verify_input" type="text" name="vcode" placeholder="请输入验证码"/>
        <input type="button" value="获取验证码" class="btnsellerregfrom_verify" />
      </dd>
      <dt></dt>
      <dd>
        <span class="icon_right">
          <img src="{$config_siteurl}statics/zt/images/public_rights.png" />
        </span>
        没有收到验证码？请拨打400-003-3030咨询客服
        <a class="btn_sellerreg_next" href="javascript:$('#form_vcode').submit()">
          <p>确 定</p>
        </a>
      </dd>
    </form>
    </div>
  </dl>
</div>
<!--保证栏-->
<template file="common/_footer.php"/>
</body>
<script>
  $(window).keydown(function(event){
    if(event.keyCode == 13){
      $("#form_vcode").submit();
    }
  });
</script>
</html>