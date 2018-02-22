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
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<!--logo-->
<!--保护容器-->
<div class="container sear sellercenter_sear">  
     <a href=""><img src="{$config_siteurl}statics/zt/images/sellercenter/sellercenterlogo.png" class="left" /></a>
     <div class="search" id="search">
      <div class="seartype">
          <a href="javascript:void(0)" class="on">服务<i></i></a>
            <a href="javascript:void(0)">货源<i></i></a>
            <a href="javascript:void(0)">宝贝<i></i></a>
            <a href="javascript:void(0)">店铺<i></i></a>
<!--            <a href="javascript:void(0)">帮助<i></i></a>-->
        </div>
        <form class="searform">
              <input type="text" placeholder="搜索你喜欢的" class="inpsear">
              <input type="submit" value="搜索" class="btnsear">
        </form>        
    </div>
</div>
<!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
<div class="container sellercenter_wrap scindex">
  <div class="wraplt">
      <div class="menulogo"></div>
        <div class="scentermenu">
          <dl>
              <dt><a href="javascript:void(0)">交易统计</a></dt>
            </dl>
            <dl class="on">
              <dt><a href="javascript:void(0)">账号管理</a></dt>
                <dd><a href="">安全设置</a></dd>
                <dd><a href="">个人资料</a></dd>
            </dl>
            <dl>
              <dt><a href="">交易管理</a></dt>
            </dl>
            <dl>
              <dt><a href="">宝贝管理</a></dt>
            </dl>
            <dl>
              <dt><a href="">上传设计师</a></dt>
            </dl>
            <dl>
              <dt><a href="">设计库图片管理</a></dt>
            </dl>
            <dl>
              <dt><a href="">店铺管理</a></dt>
            </dl>
            <dl>
              <dt><a href="">营销中心</a></dt>
            </dl>
            <dl>
              <dt><a href="">客户服务</a></dt>
            </dl>
            <dl>
              <dt><a href="">消息中心</a></dt>
            </dl>
            <dl>
              <dt><a href="">卖家地图</a></dt>
            </dl>
        </div>
    </div>
    <div class="wraprt">
      <div class="scenterstatus">
          <div class="timetip">上午好！愿你度过这美好的一天！</div>
            <div class="timetip noon">下午好！喝杯咖啡放松一下吧！</div>
        </div>
        <div class="sellerinfo">
          <div class="zticon"></div>
            <div class="infos">
              <h3>mlink1</h3>
                <p>账户安全：<a href="">普通</a></p>
                <p>店铺名称：山西旗舰店</p>
                <p><a href="">修改个人信息 &gt;</a></p>
            </div>
            <a href="" class="agonglve">新卖家攻略</a>
            <ul class="judge">
              <li><strong>店铺动态评价</strong>与同行业相比</li>
                <li>描述相符：暂无评分</li>
                <li>服务质量：暂无评分</li>
                <li>发货速度：暂无评分</li>
            </ul>
            <ul class="cycles">
              <li><p>支付金额<br>5.03%</p><i class="up"></i></li>
                <li><p>浏览量<br>5.03%</p><i class="down"></i></li>
                <li><p>支付买家数<br>5.03%</p><i class="up"></i></li>
                <li><p>访客数<br>5.03%</p><i class="up"></i></li>
                <li><p>支付转化率<br>5.03%</p><i class="up"></i></li>
            </ul>
        </div>
        <h5>生意参谋</h5>
    </div>
    <div class="clear"></div>
</div>



<!--背景容器-->
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>
