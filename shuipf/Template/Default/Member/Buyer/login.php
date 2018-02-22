<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8">
    <title>装途网－登录</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!-- <link rel="stylesheet" href="/statics/zt/css/base.css" type="text/css"/> -->
    <link rel="stylesheet" href="/statics/zt/css/login.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="/statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="/statics/zt/js/login.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="/statics/zt/js/base.js"> </script>
    <script type="text/javascript" src="/statics/zt/js/jquery.validate.js"> </script>
    <script type="text/javascript" src="/statics/zt/js/seller_reg.js"> </script>
</head>
<body class="body">
<template file="common/_top.php"/>
<!--导航-->
<div class="conwhole conwholeLogo"> 
     <!--保护容器--> 
     <div class="container">
          <img src="/statics/zt/images/userreg/ureglogo.png" class="logo" />
          <img src="/statics/zt/images/userreg/uloginslogan.png" />
     </div>
</div>  
<!--主体-->
<div class="conwhole"> 
     <!--保护容器--> 
     <div class="container main">
         <div class="con_main">
          <!--左部-->
          <div class="mainLeft">
               <img src="/statics/zt/images/userreg/denglu.jpg" /> 
          </div>
          <!--右部-->
          <div class="mainRight">
               <h5 class="mainRight_con1">
                    欢迎来到装途网
                    <!--<a href="{:U('Member/Buyer/register')}"><b>免费注册</b></a>-->
               </h5>
               <div class="mainRight_con2">
               <form id='buyer_login' action="{:U('doLogin')}" method="post">
                     <input type="text"     name="loginName" class="login_search login_search1" placeholder="用户名/手机号">
                     <!--<i class="error" id="tips"></i>-->
                     <span style="display:none;color:#c30000" class="empty_username">用户名不能为空</span>
                     
                     <input type="password" name="password" class="login_search login_search2" placeholder="密码">
                     <span style="display:none;color:#c30000" class="empty_userpass">密码不能为空</span>
                        <i class="error" id='tips' >{$errMsg}</i>
              
              </div> 
              <div class="mainRight_con2bottom">
                  还没有账号？<a href="{:U('Member/Buyer/register')}" class="mainRight_con3">点击注册</a>
<!--              <input type="checkbox" id="chkuregagree" name="RememberMe" /><label for="chkuregagree">记住密码</label>-->
                <a href="{:U('findpsw')}" class="mainRight_con3 aright">
              忘记密码？</a></div>
              <!--<div class="mainRight_con4">
              <b><i></i></b>一周免登陆
              </div>-->
              </form>
              <a href="javascript:$('#buyer_login').submit();" class="mainRight_con5">
              立即登陆
              </a>
<!--              <div>还没有账号？<a href="{:U('Member/Buyer/register')}" class="mainRight_con3">点击注册</a></div>-->
              <!--<div class="mainRight_con6">
              <p>合作账户登录:</p>
              <a href=""><img src="/statics/zt/images/login_mianRightImg1.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg2.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg3.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg4.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg5.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg6.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg7.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg8.png" /></a>
              <a href=""><img src="/statics/zt/images/login_mianRightImg9.png" /></a>
              </div>-->
          </div>
         </div>
       
     </div>   
</div>
<!--尾部-->
<!--背景容器-->
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>