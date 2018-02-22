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
          <a href="{:U('Member/Account/secure')}" class="icon-ajx">安全设置 </a>
          <a href="#" class="icon-ajx"> </a>
        </div>
      <div class="baseinfo">
<!--        <h3><img src="{:getavatar($userinfo['userid'])}">{$userinfo['username']}</h3>-->
        <h4>您的基础信息</h4>
        <p>上次登陆时间：{$userinfo['lastdate']|date="Y-m-d H:i:s",###}</p>
        <!-- <eq name="$userinfo['email']" value=" ">
          <p >
            登录邮箱：  您尚未设置登录邮箱
            <a href = "" > 绑定邮箱</a >
          </p >
          <else/>
          <p >
            登录邮箱：  {$userinfo['email']}
            <a href = "" > 解绑邮箱</a >
          </p >
        </eq> -->
        <p>
          手机号码：  {$userinfo['mobile']}
          <a href="{:U('Account/chmobile')}">修改手机</a>
        </p>
      </div>
      <div class="safebox">
        <h4>您的安全服务</h4>
        <h5>安全等级</h5>
        <dl class="dlsafeline">
          <dt>
            <div></div>
          </dt>
          <dd class="low">低</dd>
          <dd class="mid">中</dd>
          <dd class="high">高</dd>
        </dl>
        <a href="" class="btnsafereload">重新检测</a>
        <div class="clear"></div>

        <ul class="ulsafed">
          <li>
            <div class="status">
              <i></i>
              已完成
            </div>
            <div class="name">身份认证</div>
            <div class="txt">用于提升账号的安全性和信任级别。认证后的有卖家记录的账号不能修改认证信息。</div>
            <a href="{:U('Account/realnamedone')}">查看</a>
          </li>
          <li>
            <div class="status">
              <i></i>
              已完成
            </div>
            <div class="name">登录密码</div>
            <div class="txt">
              安全性密码高的密码可以使账号更安全。建议您定期更换密码，且设置一个包含数字和字母，并长度
超过6位以上的密码。
            </div>
            <a href="{:U('Account/chpwd')}">修改</a>
          </li>
          <li>
            <div class="status">
              <i></i>
              已完成
            </div>
            <div class="name">手机绑定</div>
            <div class="txt">用于提升账号的安全性和信任级别。认证后的有卖家记录的账号不能修改认证信息。</div>
            <a href="{:U('Account/chmobile')}">修改</a>
          </li>
          <li>
            <div class="status">
              <eq name="$userinfo['email']" value=" ">
                <i class="wrong"></i>
                未完成
              </div>
              <div class="name">绑定邮箱</div>
              <div class="txt">绑定邮箱后，您即可享受装途网丰富的邮箱服务，如邮箱登陆、邮箱找回密码等。</div>
              <a href="{:U('Account/post')}">绑定</a>
                <else/>
               <i></i>
                已完成
               </div>
              <div class="name">邮箱绑定</div>
              <div class="txt">绑定邮箱后，您即可享受装途网丰富的邮箱服务，如邮箱登陆、邮箱找回密码等。</div>
              <a href="{:U('Account/chpost')}">修改</a>
              </eq>
          </li>
        </ul>
      </div>

    </div>
    <div class="clear"></div>
  </div>
<template file="common/_promise.php"/>
  <template file="Seller/common/_footer.php"/>
</body>
</html>