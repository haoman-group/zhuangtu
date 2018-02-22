<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>找回密码-2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/mobileclient.css" >
</head>
<body>

<div class="log_con">
    <p class="checkcode retpass"><img src="/statics/wap/images/checkcode.png">您正在使用<span>手机验证码</span>验证身份,请完成以下操作!</p>
    <form class="dlform">
        <dl>
            <dt>新的登录密码</dt>
            <dd class="">
                <input type="password" value=""/>
            </dd>
        </dl>
        <div class="degree" >

            <div class="trigonb"></div>
            <div class="trigon"></div>
            <!--安全程度：-->
            <div class="degres">
                <span class="before"></span>
                <div class="degrel">安全程度：</div>
                <div class="degrer">
                    <div class="pw-strength">
                        <div class="pw-bar"></div>
                        <div class="pw-bar-on"></div>
                    </div>
                </div>
            </div>
            <div class="pw-tips">
                <p class="enoughRegex">
                    6-20位字符</p><p  class="mediumRegex">
                    只能包含大小写字母、数字以及标点符号（除空格）</p><p class="strongRegex">
                    大写字母、小写字母、数字和标点符号至少包含2种</p>
            </div>
        </div>
        <dl>
            <dt>确认登录密码</dt>
            <dd class="ddin_y">
                <input type="text" placeholder="6位数字" />

            </dd>
        </dl>

    </form>
    <button class="stylebut">确定</button>
</div>

</body>
</html>