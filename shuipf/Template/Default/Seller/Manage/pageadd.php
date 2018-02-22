<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>页面管理</title>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/decorate.css" >
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/zt/js/decpage.js"></script>
</head>
<body>
<div class="wrap">
	<template file="Seller/common/_dectop.php"/>
    <div class="mainwrap">
<!--    	<div class="comslide greyslide" >-->
<!--			<ul class="ulpagenav">-->
<!--				<li class="on">-->
<!--					<a href="">电脑端页面</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="">手机端页面</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="">多端同步页面</a>-->
<!--				</li>-->
<!--			</ul>-->
<!--        </div>-->
		<div class="commain ">
			<h2 class="pageaddh">新建页面</h2>
			<form id="form" action="{:U('pageadd')}" method="post">
				<dl class="dlpageform clearfix">
					<dt>页面名称:</dt>
					<dd><input type="text" name="title" maxlength="10"></dd>
					<!-- <dt>页面地址:</dt>
					<dd>http://shop125546945.taobao.com/p/rd072881.htm
						<input type="button" value="复制" class="btn">
					</dd> -->
					<dt>页面布局:</dt>
					<dd>
						<input type="radio" id="zuoyou" checked name="type" value="slmr"><label for="zuoyou">左右分栏</label>
						<input type="radio" id="tonglan" name="type" value="mall"><label for="tonglan">通栏</label>
					</dd>
					<dd class="btns">
						<a href="javascript:$('#form').submit();" class="btn btnblack">保存</a> <a href="javascript:void(0)" class="btn">取消</a>
					</dd>
				</dl>
			</form>
		</div>

    </div>
</div>




<script type="text/javascript" language="javascript">

</script>
</body>
</html>
