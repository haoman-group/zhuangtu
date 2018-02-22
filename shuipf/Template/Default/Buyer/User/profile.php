<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>买家中心－个人资料</title>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/personal_information.css" type="text/css"/>
  <!--[if lt IE 9]>
  <script src="../js/html5.js "></script >
  <script src="../js/respond.min.js "></script >
  <![endif]-->
  <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
  <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
  <script src="{$config_siteurl}statics/zt/js/base.js"></script>
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
        <ul class="basics_top">
          <li class="on"><a href="{:U('profile')}">基本资料</a></li>
          <li><a href="{:U('userpic')}">头像照片</a></li>
        </ul>
        <form action="{:U('profile')}" method="post" class="personal_forms">
          <dl>
            <dt>当前头像:</dt>
            <dd class="picture"><a href="{:U('userpic')}"><img src="{:getavatar($userinfo['userid'])}" ><span class="compile">编辑头像</span></a></dd>
            <dt><span>*</span>昵称:</dt>
            <dd><input type="text" name="nickname" value="{$userinfo.nickname}"></dd>
            <dt><span>*</span>真实姓名:</dt>
            <dd><input type="text" name="truename" value="{$userinfo.truename}"></dd>
            <dt><span>*</span>性别:</dt>
            <dd class="sex"><input type="radio" name="sex" id="men" value="1" <if condition="$userinfo['sex'] == '1'">checked</if> /><label for="men">男</label>
                            <input type="radio" name="sex" id="women" value="2"  <if condition="$userinfo['sex'] == '2'">checked</if> /><label for="women">女</label></dd>
            <dt>生日:</dt>
            <dd><input type="text" name="birthday" value="{$userinfo.birthday}"></dd>
            <dt>所在地:</dt>
            <dd><input type="text" name="locality" value="{$userinfo.locality}"></dd>
            <dd><a href="javascript:$('.personal_forms').submit()" class="sure">保存</a></dd>
          </dl>       
        </form>
      </div>
    </div>
    <div class="clear"></div>
    <template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>
