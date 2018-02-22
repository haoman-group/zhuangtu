<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>模板选择</title>
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

		<div class="commain">
			<div class="mkmain ">
				<div class="mhead">
					<div class="pagemod">
						<a href="{:U('templatelist',array('pageid'=>$pageid,'moduleid'=>$moduleid))}" class="on">选择模板</a>
						<a href="{:U('templatehis',array('pageid'=>$pageid,'moduleid'=>$moduleid))}">历史记录</a>
					</div>
					<a href="{:U('decorate',array('pageid'=>$pageid))}" class="back">返回页面装修</a>
				</div>
			</div>


			<ul class="ultemplatelist">
				<volist name="data" id="vo">
					<li class="on" data-id="">
						<img src="{$vo.thumb}">
						<p>价格:免费</p>
						<p>模版类型:官方模版</p>
						<div class="btnbox">
							<a href="{:U('templateuse',array('pageid'=>$pageid,'moduleid'=>$moduleid,'templateid'=>$vo['id'],'type'=>$type,'id'=>$_GET['id']))}" class="on">立即使用</a>
						</div>
					</li>
				</volist>
			</ul>
		</div>

    </div>
</div>




<script type="text/javascript" language="javascript">

</script>
</body>
</html>
