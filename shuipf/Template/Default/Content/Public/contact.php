<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
	<title>联系我们</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
	<script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
	<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
	<script src="{$config_siteurl}statics/zt/js/index.js"> </script>
</head>
<body>
<template file="Content/common/_header.php"/>
<div class="contactWrap">   
  <div class="container gifimg container_index">
    <!-- <div class="left nav01">首页</div> -->
  <!-- <img class="left" src="{$config_siteurl}statics/zt/images/index/nav_01.jpg" >  -->
	  <div class="nav_headcon">    
	    <ul class="nav_head gifimg clearfix">
	    	 <li><a href="{:(U('/'))}">首页</a></li>
	       <li><a href="{:(U('Discount/brandStreet'))}"><div class="nav_headimg"><img class="gifimg" src="{$config_siteurl}statics/zt/images/index/33.gif" /> </div></a></li>
	       <li><a href="{:(U('Public/home_decoration'))}">家装必读</a></li>
	       <li><a href="{:(U('Accessory/index'))}">辅材直通车</a></li>
	       <!-- <li><a href="{:(U('Designlibrary/index'))}">设计库</a></li> -->
	       <!-- <li><a href="{:(U('Accessory/index'))}">辅材直通车</a></li> -->
	       <!-- <li><a href="{:(U('Discount/sale'))}">天天特价</a></li> -->
	       <li><a href="{:(U('Discount/sale'))}">天天特价</a></li>
	       <li><a href="{:(U('Public/error_404'))}">直播间</a></li>
	       <!-- <li><a href="{:(U('Discount/discount'))}">折扣折扣</a></li> -->
	       <li><a href="{:(U('Discount/discount'))}">折扣折扣</a></li>
	      <li><a href="{:(U('Check/index'))}">预约验收</a></li>
	    </ul> 
	  </div>
  </div>
<img src="/statics/zt/images/contact/400.png" style="width:100%;display:block;">
  <div class="contactOur">
  	<h5>联系我们</h5>
  	<p>如果您在购物过程中遇到问题，或想对我们的服务提出宝贵建议</p>
  	<p>欢迎您通过以下方式联系我们，我们将竭诚为您服务。</p>
  	<img src="/statics/zt/images/contact/down.png" alt="">
  </div>
  <ul class="contactStyle"> 
  	<li>
  		<h5>微信客服</h5>
  		<dl>
  			<dt>服务范围：</dt>
  			<dd>登录注册、购买付款、交易查询、（活动、订单、送货、安装、<br>维修、退换货）咨询、投诉意见。</dd>
  			<dt>工作时间：</dt>
  			<dd>9:00-21:00</dd>
  		</dl>
  		<strong><img src="/statics/zt/images/contact/App.jpg" alt=""><i>扫码联系我们</i></strong>
  	</li>
  	<li>
  		<h5>电话客服</h5>
  		<dl>
  			<dt>服务范围：</dt>
  			<dd>家装咨询、预约验收、安装服务、售后维权、投诉建议。</dd>
  			<dt>工作时间：</dt>
  			<dd>9:00-18:00</dd>
  			<dt class="active">客服热线:</dt>
  			<dd class="active">400-003-3030</dd>
  		</dl>
  	</li>
  	<li>
  		<h5>客服传真</h5>
  		<dl>
  			<dt>服务范围：</dt>
  			<dd>接受商品因质量问题开具的质检报告、鉴定单或办理业务所需的<br>相关证件等。</dd>
  			<dt>工作时间：</dt>
  			<dd>周一至周五9:00-18:00</dd>
  			<dt class="active">传真:</dt>
  			<dd class="active">0351-6695395</dd>
  		</dl>
  	</li>
  	<li>
  		<h5>公司地址</h5>
  		<dl>
  			<dt>网址：</dt>
  			<dd class="on">www.zhuangtu.net</dd>
  			<dt>客服：</dt>
  			<dd>400-003-3030</dd>
  			<dt>地址：</dt>
  			<dd>太原市小店区高新街环能科技12层</dd>
  		</dl>
  	</li>
  </ul>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>
