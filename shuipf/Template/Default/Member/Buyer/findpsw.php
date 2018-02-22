<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>找回密码</title>
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/findpsw.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyerreg.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
	<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
	<script src="{$config_siteurl}statics/zt/js/findpsw.js"></script>
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
		<h5 class="reg">
			您正在使用 <span>手机验证码</span> 验证身份，请完成以下操作
		</h5>
		<div class="verify">
			<form action="{:U('findpsw')}" id="form_mobile" method="post">
				<dl class="dlverify">
					<dt>您的手机号码:</dt>
					<dd>
						<input type="text" name="mobile" placeholder="请输入你的手机号" id="findinfo_iphone">
						<span class="findinfo_iphone">格式不正确</span>
					</dd>
					<dt>验证码:</dt>
					<dd>
						<input type="text" name="vcode" placeholder="请输入你的验证码">
						<img src="{:U('Api/Checkcode/index','type=resetpwd&code_len=4&font_size=14&width=100&height=39&font_color=&background=')}" title="看不清？点击更换" alt="" id="authCode" onclick="changeAuthCode()"/></dd>
					<dd class="reset"><a class="btn_verify" href="javascript:$('#form_mobile').submit()">立即重置</a></dd>
				</dl>
			</form>
		</div>
		<h5 class="reg1">
			手机号码停用或者忘记，请拨打 <span>400-003-3030</span> 电话进行人工找回
		</h5>
		<dl class="help">
			<dt>没收到短信验证码？</dt>
			<dd><span>1、</span>网络通讯异常可能会造成短信丢失，请重新获取或稍后再试。</dd>
			<dd><span>2、</span>请核实手机是否欠费停机，或者屏蔽了系统短信。</dd>
			<dd><span>3、</span>如果手机已丢失或停用，请选择其他验证方式。</dd>
		</dl>
	</div>
<script>
	function changeAuthCode () {
        var num = new Date().getTime();
        var rand = Math.round(Math.random() * 10000);
        var num = num + rand;
        $("#authCode").attr('src', $("#authCode").attr('src') + "&refresh=1&t=" + num);
    }
</script>
</body>

</html>
