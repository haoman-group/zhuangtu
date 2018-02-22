<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<title>买家中心－账户管理</title>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<template file="Buyer/common/_search.php"/>
<!--内容-->
<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
  <template file="Buyer/common/_head.php"/>
    <div class="wraprt">
      <div class="baseinfo">
        <h3>
          <img src="{:getavatar($userinfo['userid'])}">{$userinfo['username']}</h3>
        <h4>您的基础信息</h4>
        <p>上次登录时间：{$userinfo['lastdate']|date="Y-m-d H:i:s",###}</p>
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
          <a href="{:U('Member/Account/chmobile')}">修改手机</a>
        </p>
      </div>
      <div class="safebox">
        <img src="{$config_siteurl}statics/zt/images/buyercenter/lefttips.png" alt="" class="tips" />
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
          <!--<li>-->
          <!--  <div class="status">-->
          <!--    <i></i>-->
          <!--    已完成-->
          <!--  </div>-->
          <!--  <div class="name">身份认证</div>-->
          <!--  <div class="txt">用于提升账号的安全性和信任级别。认证后的有卖家记录的账号不能修改认证信息。</div>-->
          <!--  <a href="">查看</a>-->
          <!--</li>-->
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
            <a href="{:U('Member/Account/chpwd')}">修改</a>
          </li>
          <li>
            <div class="status">
              <i></i>
              已完成
            </div>
            <div class="name">手机绑定</div>
            <div class="txt">用于提升账号的安全性和信任级别。认证后的有卖家记录的账号不能修改认证信息。</div>
            <a href="{:U('Member/Account/chmobile')}">修改</a>
          </li>
          <li>
            <div class="status">
              <if condition="empty($userinfo['email'])">
                <i class="wrong"></i>
                未完成
              </div>
              <div class="name">绑定邮箱</div>
              <div class="txt">绑定邮箱后，您即可享受装途网丰富的邮箱服务，如邮箱登陆、邮箱找回密码等。</div>
              <a href="{:U('Member/Account/post')}">绑定</a>
                <else/>
               <i></i>
                已完成
               </div>
              <div class="name">邮箱绑定</div>
              <div class="txt">绑定邮箱后，您即可享受装途网丰富的邮箱服务，如邮箱登陆、邮箱找回密码等。</div>
              <a href="{:U('Member/Account/chpost')}">修改</a>
              </if>
          </li>
        </ul>
      </div>

        
        
    </div>
    <div class="clear"></div>
</div>
 <template file="common/_promise.php"/>
<template file="common/_footer.php"/>                  
</body>
</html>