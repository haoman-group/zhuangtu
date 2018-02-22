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
</head>
<body>
<div class="wrap tempwrap">
	<template file="Seller/common/_dectop.php"/>
    <div class="mainwrap connormal">
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
			<div class="mkmain mkmainh2">
				<div class="mhead">
					<div class="pagemod">
						<a href="{:U('templatelist',array('pageid'=>$pageid,'moduleid'=>$moduleid))}" >选择模板</a>
						<a href="{:U('templatehis',array('pageid'=>$pageid,'moduleid'=>$moduleid))}"  class="on">历史记录</a>
					</div>
					<a href="http://zhuangtu.local/Seller/Manage/declayout/pageid/5.html" class="back">返回页面装修</a>
				</div>
			</div>


			<dl class="dltemplatehis">
				<dt>
					<em>使用方式</em>
					<em>使用时间</em>
					<em>结束时间</em>
					<em>操作</em>
				</dt>
				<dd>
					<em>高级编辑</em>
					<em>2016-03-01</em>
					<em>2016-03-10</em>
					<em><a href="">预览</a> <a href="">使用</a> </em>
				</dd>
			</dl>
		</div>

    </div>
</div>




<script type="text/javascript" language="javascript">

</script>
</body>
</html>
