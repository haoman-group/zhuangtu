<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人设置 - {$Config.sitename}</title>
<template file="Member/Public/global_js.php"/>

<script type="text/javascript" src="{$config_siteurl}statics/js/swfobject.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/fullAvatarEditor.js"></script>
<link href="/favicon.ico" rel="shortcut icon">

<link type="text/css" href="{$model_extresdir}css/core.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/common.css" rel="stylesheet" />
<link type="text/css" href="{$model_extresdir}css/user.css" rel="stylesheet" media="all" />
</head>
<body>

<div class="user">
  <div class="user_center">
    <div class="user_main">
        
        <div class="minHeight500"> 
          <!--修改基本资料-->
        
          <!--修改头像-->
          <div id="modifyAvatar" class="profile" >
            <div class="title">
              <div class="name">修改头像</div>
            </div>
            <div class="avatar_box">
              <div class="myAvatarUpload" style="border: 0 solid #E7E7E7;display: inline;float: left; height:450px;margin-bottom: 10px;padding-left: 10px;width: 432px;">
              	<div id="myContent"></div>
                {$user_avatar}
              </div>
            </div>
          </div>
          <!--修改密码-->
          
        </div>

    </div>
  </div>

</div>
<script type="text/javascript" src="{$config_siteurl}statics/js/wind.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/common.js"></script>
<script type="text/javascript" src="{$model_extresdir}js/profile.js"></script> 
<script type="text/javascript" src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script type="text/javascript">
profile.init();
//头像上传回调
function fullAvatarCallback(msg) {
    switch (msg.code) {
    case 1:
        
        break;
    case 2:
        
        break;
    case 3:
        if (msg.type == 0) {
            
        } else if (msg.type == 1) {
            alert("摄像头已准备就绪但用户未允许使用！");
        } else {
            alert("摄像头被占用！");
        }
        break;
    case 4:
        alert("图像文件过大！");
        break;
    case 5:
        if (msg.type == 0) {
		    $.tipMessage("头像已经修改，刷新后可见最新头像！", 0, 3000);
        } else {
			alert(msg.content.msg);
		}
        break;
    }
}
</script>
</body>
</html>