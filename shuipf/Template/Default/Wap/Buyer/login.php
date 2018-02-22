<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>未登录提示登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/mobileclient.css" >
</head>
<body>


<div class="log_con lotos">
    <form class="logininput">
        <div class="logininpbox">
            <input type="text" name="loginname" placeholder="邮箱/手机号/用户名"/>
            <input type="password" name="password" class="passw" placeholder="密码"/>
            <!-- <i class="error">登录失败：账号或密码错误！</i> -->
        </div>
    </form>
    <i class="error">登录失败：账号或密码错误！</i>
    <button class="btnlogin">登录</button>
    <div class="accounts">
        <a href="reg">还没有账号?<span  class="dianreg">点击注册</span></a>
        <a href="#">忘记密码?</a>
    </div>
</div>

<script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
<script>
    $(document).ready(function() {
        $(document).on('click','.btnlogin',function(){
            $.ajax({
               type : "POST",
               url : '/Api/Member/login',
               async : false,
               dataType : "json",
               timeout : 5000,
               data : $("form").serialize(),
               success : function(result) {
                   // console.log(result);
                   if(result.status === 1){
                      window.location.href = '/wap/index/index';
                   }
                   else{
                      $(".error").show();
                      console.log(result.msg);
                   }
               },
               error : function(XMLHttpRequest, textStatus, errorThrown) {
                   
               }
             });
        })
        
    })
</script>
</body>
</html>