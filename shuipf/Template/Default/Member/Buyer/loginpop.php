<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/base.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/login.css" type="text/css"/>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"> </script>
    <script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
</head>
<body class="body">
<!--主体-->
<div class="conwhole">
    <!--保护容器-->
    <div class="loginpophd">
        <img src="{$config_siteurl}statics/zt/images/logologinpop.png" class="logo">
    </div>
    <div class="con_loginpop">
         <div class="formtit">用户登录</div>
         <form id="buyer_login" action="/Api/Member/login" method="post">
             <dl>
                 <dd>
                     <input type="text" name="loginname" class="login_search login_search1" placeholder="用户名/手机号">
                     <!--<i class="error" id="tips"></i>-->
                     <span style="display:none;color:#c30000" class="empty_username">用户名不能为空</span>
                 </dd>
                 <dd>
                     <input type="password" name="password" class="login_search login_search2" placeholder="密码">
                     <span style="display:none;color:#c30000" class="empty_userpass">密码不能为空</span>
                     <i class="error" id="tips"></i>
                 </dd>
                 <dd class="ddfindpwdtip">
                     还没有账号？<a href="{:U('Member/Buyer/register')}" class="mainRight_con3" target="_blank">点击注册</a>
    <!--                 <input type="checkbox" id="chkuregagree" name="RememberMe" /><label for="chkuregagree">记住密码</label>-->
                     <a href="{:U('findpsw')}" class="mainRight_con3 aright" target="_blank">
                         忘记密码？</a>
                 </dd>
                 <dd>
                     <input type="submit"  value="立即登录" class="mainRight_con5">
                 </dd>
<!--             <dd>-->
<!--                 还没有账号？<a href="{:U('Member/Buyer/register')}" class="mainRight_con3" target="_blank">点击注册</a>-->
<!--             </dd>-->
             </dl>
         </form>
    </div>
</div>
<!--尾部-->
<!--背景容器-->
<script type="text/javascript">
$(function(){
    $("#buyer_login").validate({
        errorElement : "i",
        onkeyup : false,
        submitHandler : function(form){
            $(form).ajaxSubmit({
                "dataType": "json",
                "success":function(res){
                    if(res.status === 1){
                        if(top!=self){
                            parent.layer.msg("登录成功!");
                            setTimeout(function(){parent.layer.closeAll()},1500);
                        }
                        else {
                            alert("登录成功!");
                        }
                    }
                    else{
                        alert(res.msg);
                    }
                },
                "error":function(res){
                    alert(res.msg);
                }
            });
        },
        rules : {
            loginName :{
                required : true
            },
            password :{
                required : true
            }
        },
        messages : {
            loginName :{
                required : "请填写验证码"
            },
            password :{
                required : "请填写密码"
            }
        }
    });
});
</script>
</body>
</html>