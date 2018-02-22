<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyerreg.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyer_reg.js"></script>
</head>
<body class="bodyureg">
<div class="container">
    <div class="ureghead clearfix">
        <a href=""><img src="{$config_siteurl}statics/zt/images/userreg/ureglogo.png" class="logo"></a>
        <a href="" class="title">用户注册</a>
    </div>
    <div class="headtoreg">
        我已经注册了,马上<a href="">登录</a>
    </div>
    <div class="uregbox">
        <ul class="ulstep">
            <li class="b"><span>1</span>填写手机号</li>
            <li class="b"><span>2</span>填写验证码</li>
            <li class="b"><span>3</span>设置密码用户名</li>
            <li class="on"><span>4</span>注册成功</li>
        </ul>
        <ul class="uluregsuc">
            <li>恭喜您注册成功!</li>
            <li>您的注册手机号为：{$mobile}</li>
            <li>您的装途网账号为：{$username}</li>
            <li>
                <a href="{:U('/Buyer/Index/index')}" class="toucenter">进入装途网</a>
            </li>
        </ul>
    </div>
</div>
<script>
    $(window).keydown(function(event){
        if(event.keyCode == 13){
            $("#form_reg").submit();
        }
    });
</script>
</body>
</html>