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
            <li class="on"><span>2</span>填写验证码</li>
            <li><span>3</span>设置密码用户名</li>
            <li><span>4</span>注册成功</li>
        </ul>

        <form id="form_vcode" action="{:U('register2')}" method="post">
            <dl class="dluregform">

                <dd class="wdd">
                    <span class="icon_i">i</span>
                    校验码已发送到你的手机，15分钟内输入有效，请勿泄露
                </dd>
                <dt>手机号码:</dt>
                <dd>
                    <input value="{$mobile}" type="text" name="mobile" disabled />
                </dd>
                <dt>校验码:</dt>
                <dd>
                    <input class="verify_input" type="text" name="vcode" />
                    <input type="button" value="获取验证码" class="btnsellerregfrom_verify" />
                </dd>
                <dt></dt>
                <dd>
                    <input href="javascript:void(0)" type="submit" class="submbtn" value="下一步">
                </dd>

            </dl>
        </form>
    </div>
</div>
</body>
</html>