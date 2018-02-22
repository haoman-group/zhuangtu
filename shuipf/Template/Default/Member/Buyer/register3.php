<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyerreg.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/account.css" type="text/css"/>
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
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/account.js"></script>
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
            <li class="on"><span>3</span>设置密码用户名</li>
            <li><span>4</span>注册成功</li>
        </ul>
        <form id="form_reg" action="{:U('register3')}" method="post">
            <dl class="dluregform">
                <dt>手机号码:</dt>
                <dd>
                    <input value="{$mobile}" type="text" name="mobile" disabled />
                </dd>
                <dt>登录密码</dt>
                <dd class="safe">
                    <input type="password" class="inptverify"  placeholder="设置你的登录密码" name="password" id="password" />
                    <div class="degree" hidden>
                        <h5>安全程度：</h5>
                        <div class="trigonb"></div>
                        <div class="trigon"></div>
                        <!--安全程度：-->
                        <div id="level" class="pw-strength">
                            <div class="pw-bar"></div>
                            <div class="pw-bar-on"></div>
                            <!-- <div class="pw-txt">
                                <span>弱</span>
                                <span>中</span>
                                <span>强</span>
                            </div> -->
                        </div>
                        <div class="pw-tips">
                            <p class="enoughRegex">
                                <span class="" ></span>密码为6位6-30位字符</p>
                            <p  class="mediumRegex">
                                <span class="" ></span>密码为6位及以上并包含数字、字母和特殊字符中的两项</p>
                            <p class="strongRegex">
                                <span class="" ></span>密码为6位及以上并包含数字、大写字母、小写字母和特殊字符</p>
                        </div>
                    </div>
                </dd>

                <dt>再次确认</dt>
                <dd>
                    <input type="password" class="inptverify"  placeholder="再次输入你的登录密码" name="repassword" />
                </dd>


                <dt>会员名</dt>
                <dd>
                    <input type="text" class="inptverify"  placeholder="会员名一旦设置成功，无法修改" name="username" />
                </dd>
                <dd>
                    <input href="javascript:void(0)" type="submit" class="submbtn" value="下一步">
                </dd>
            </dl>
        </form>
    </div>
</div>
<script>
    $(window).keydown(function(event){
        if(event.keyCode == 13){
            $("#form_reg").submit();
        }
    });
    var APP_DEBUG = "<?php echo APP_DEBUG?"1":"0";?>" ;
    if(APP_DEBUG != '1'){
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?b43f79109f60572c7aaf815a49ae54ec";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    }
</script>
</body>
</html>