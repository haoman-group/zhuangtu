<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
    <title>支付方式</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/zt/js/index.js"> </script>
</head>
<body>
<template file="Content/common/_header.php"/>
<div class="wrap">
    <div class="pay_titlebg">
        <div class="pay_title_content">
            <h5>装途网提供微信、支付宝及银联三种支付方式。</h5>
        </div>        
    </div>
    <div class="pay_con clearfix">
        <div class="l_payin">
            <h5>支付方式</h5>
            <dl>
                <dt>支付平台<i></i></dt>
                <dd>支付宝</dd>
                <dd>微信支付</dd>
            </dl>
            <dl>
                <dt>银联支付<i></i></dt>
            </dl>
        </div>
        <div class="r_payin">
            <h5>支付平台</h5>
            <table>
                <tr>
                    <td><img src="{$config_siteurl}statics/zt/images/index/pay1.jpg" alt=""></td>
                    <td>
                        <dl>
                            <dt>客服电话：</dt>
                            <dd>95188</dd>
                            <dt>服务时间：</dt>
                            <dd>7*24小时</dd>
                        </dl>
                    </td>
                    <td>
                        <a href="">支付宝支付帮助</a>
                    </td>
                </tr>
                <tr>
                    <td><img src="{$config_siteurl}statics/zt/images/index/pay2.jpg" alt=""></td>
                    <td>
                        <dl>
                            <dt>客服电话：</dt>
                            <dd>95017</dd>
                            <dt>服务时间：</dt>
                            <dd>周一至周五09：00-18：00</dd>
                        </dl>
                    </td>
                    <td>
                        <a href="">支付帮助</a>
                    </td>
                </tr>
            </table>
            <h5>银联支付</h5>
            <div class="unionpay">
                <p>银联在线支付，是由银联向您提供的银联卡支付交易服务，目前支持银联在线支付、无卡支付、网银支付三种方式，在使用过程中需遵循银联卡使用规则及协议<a href="">【参看银联支付协议】</a>。银联在线支付较为便捷，无需开通网银，且不受网银介质、插件等影响，单笔限额最高3万元（根据不同银行设置最高可达20万）<a href="">【查看银联在线支付限额】</a>，推荐您使用。</p>
                <h6>银联在线支付流程：</h6>
                <ol>
                    <li>银联在线支付，通过“选择银联在线支付、输入银行卡信息、验证并确认支付”等步骤即可完成。</li>
                    <li>a、在支付平台中选择“银联在线支付”</li>
                    <li>b、输入卡号</li>
                    <li>c、输入银行卡密码、银行预留手机号、短信验证码点击开通并付款</li>
                    <li>d、付款成功</li>
                </ol>
                <table>
                    <tr>
                        <td>
                            <img src="{$config_siteurl}statics/zt/images/index/pay3.jpg" alt="">
                            <strong>（无需开通网银，最高单笔限额3万）</strong>
                        </td>
                        <td>
                            <dl>
                                <dt>客服电话：</dt>
                                <dd>95516</dd>
                                <dt>服务时间：</dt>
                                <dd>7*24小时</dd>
                            </dl>
                        </td>
                        <td>
                            <a href="">支持的银行及限额</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="tips">
                <dl>
                    <dt>温馨提示：</dt>
                    <dd>1、如您需要使用网银支付订单时，需要提前到开卡行办理网上支付功能，详情可联系开卡行进行咨询。</dd>
                    <dd>2、您可以通过以下方式验证在线支付是否成功：</dd>
                    <dd>a、当您完成网上在线支付过程后，系统应提示支付成功。如果系统没有提示支付失败或成功，您可通过电话、ATM 、柜台或登录网上银行等各种方式查询银行卡余额，如果款项已被扣除，说明您已支付成功。</dd>
                    <dd>b、如出现信用卡超额透支、存折余额不足、意外断线等情况支付失败，请您登录装途网“我的订单”，找到该张未支付成功的订单，重新完成支付。</dd>
                    <dd>3、在线支付订单超时说明</dd>
                    <dd>在线支付付款等待期限为24小时。请您在订购成功后24小时内完成支付，否则系统将自动取消订单。</dd>
                    <dd>4、造成“支付被拒绝”的主要原因：</dd>
                    <dd>a、所持银行卡尚未开通网上支付功能</dd>
                    <dd>b、所持银行卡内余额不足</dd>
                    <dd>c、超过银行卡支持的支付限额</dd>
                    <dd>d、输入证件号不符</dd>
                    <dd>e、输入银行卡卡号或密码不符</dd>
                    <dd>f、所持银行卡已挂失、作废、过期</dd>
                    <dd>g、网络中断等原因</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
<script type="text/javascript">
//    $(function(){
//       $(".brief li").click(function(){
//           var eqid= ($(this).index());
//           $(".abouttit").eq(eqid).show().siblings(".abouttit").hide();
//           $(".aboutcon").eq(eqid).show().siblings(".aboutcon").hide();
//           $(this).addClass("on").siblings().removeClass("on");
//       });
//    });
//    $()
</script>
</body>
</html>