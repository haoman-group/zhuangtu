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
	<script src="{$config_siteurl}statics/zt/js/findpsw.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
</head>
<body>
	<template file="common/_top.php"/>
	<!-- 背景容器 -->
	<div class="findpsw_topbg">
		<!-- 保护容器 -->
		<div class="findpsw_top">
			<img src="{$config_siteurl}statics/zt/images/findpsw/ureglogo.png" alt="">
			<span>找回密码</span>
		</div>
	</div>
	<div class="findpsw_main">
		<div class="verify">
			<form action="{:U('findpsw3')}" id="form_change" class="form_change" method="post">
				<dl class="dlverify">
					<dt>新的登录密码:</dt>
          <dd>
          	<input type="password" name="password" class="inptverify new_pasw" id="password" > 
          	<!--<span class="findinfo_pass">请输入密码</span> -->
          	<!--<span class="finderror_pass">输入不合法，请重新输入！</span>-->
          	<!--<span class="findsucc_pass">可用</span>-->
          </dd>

					<dt>确认新的登录密码:</dt>
          <dd>
          	<input type="password" name="repassword" class="inptverify"> 
          	<!--<span class="findinfo_notpass">请再次输入密码</span> -->
          	<!--<span class="finderror_notpass">密码不一致，请重新输入</span> -->
          	<!--<span class="findsucc_notpass">可用</span> -->
          </dd>
					<a href="javascript:$('#form_change').submit()" class="reset btn_sellerreg_next">确定</a>
				</dl>
			</form>		
		</div>
		<div class="safe">
				安全程度: 
				<span class="dengji dj1"></span>
				<span class="dengji dj2"></span>
				<span class="dengji dj3"></span>
        <span class="dj4"></span>
				<div class="ts1">6-20位字符</div>
				<div class="ts2">只能包含大小写字母、数字以及标点符号（除空格）</div>
				<div class="ts3">大写字母、小写字母、数字和标点符号至少包含2种</div>				
			</div>
			
			
	</div>
</body>
</html>