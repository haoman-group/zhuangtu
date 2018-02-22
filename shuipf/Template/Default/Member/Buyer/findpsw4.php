<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>错误提示</title>
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/findpsw.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyerreg.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
	<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
	<script src="js/findpsw.js"></script>
	
</head>
<body>
	<template file="common/_top.php"/>
	<!-- 头部 -->
	<div class="findpsw_topbg">
		<div class="findpsw_top"><img src="{$config_siteurl}statics/zt/images/findpsw/ureglogo.png" alt="">找回密码</div>
	</div>
	<!-- 内容部分 -->
	<div class="findpsw_main">
		<div class="verify">
			<div class="complete">
				<ul>
					<li class="find_success">密码找回，请牢记</li>
				  <li><a href="{:U('/Member/Buyer/login')}">重新登陆</a></li>
			  </ul>
			</div>	
		</div>
	</div>
</body>
</html>