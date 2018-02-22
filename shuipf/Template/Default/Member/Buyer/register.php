<!doctype html>
<html>
<head>
    <title>装途网－注册</title>
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
        我已经注册了,马上<a href="{:U('login')}">登录</a>
    </div>

    <div class="uregbox">
        <ul class="ulstep">
            <li class="on"><span>1</span>填写手机号</li>
            <li><span>2</span>填写验证码</li>
            <li><span>3</span>设置密码用户名</li>
            <li><span>4</span>注册成功</li>
        </ul>

        <form id="form_sendsms" action="{:U('register')}" method="post">
        <dl class="dluregform">
            <dt>手机号码:</dt>
            <dd>
                <input type="text" placeholder="请输入你的手机号" name="mobile" ><i class="error" id='tips'></i>
            </dd>
            <dt></dt>
            <dd>
                <input class="verify_input" type="text" name="vcode" placeholder="验证码" />
                <img align="absmiddle" src="{:U("Api/Checkcode/index","type=sendsms&code_len=4&font_size=14&width=100&height=39&font_color=&background=")}" onclick="changeAuthCode()" title="看不清？点击更换" id="authCode" />
            </dd>
            <dd class="ddagreement">
                <input id="chkuregagree" type="checkbox" name="chkuregagree"> <label for="chkuregagree">同意《装途网用户协议》《法律协议及隐私政策》</label>
            </dd>
            <dd>
                <a href="javascript:$('#form_sendsms').submit()" class="submbtn">下一步</a>
                <!--<input href="javascript:void(0)" type="submit" class="submbtn" value="下一步">-->
            </dd>
        </dl>
        </form>
    </div>
</div>


<script type="text/javascript">
function changeAuthCode () {
    var num = new Date().getTime();
    var rand = Math.round(Math.random() * 10000);
    var num = num + rand;
    $("#authCode").attr('src', $("#authCode").attr('src') + "&refresh=1&t=" + num);
}
</script>

</body>
</html>