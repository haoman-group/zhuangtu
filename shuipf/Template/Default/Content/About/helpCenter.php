<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
    <title>帮助中心</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/zt/js/index.js"> </script>
</head>
<body>
<template file="Content/common/_header.php"/>
<div class="wrap">
    <div class="help_titlebg">
        <div class="help_title_content">
            <h5>
                <span>帮助中心</span>
                <p>如果您在购物过程中遇到问题，或者有想了解的家装相关问题，欢迎您通过以下方式联系我们，我们将竭诚为您服务。</p>
            </h5>
        </div>        
    </div>
    <table class="help_table">
            <tr>
                <th>服务类型</th>
                <th>服务范围</th>
                <th>联系方式</th>
                <th>工作时间</th>
            </tr>
            <tr>
                <td>电话客服</td>
                <td>所购商品、支付方式、辅材配送进度等查询，售后处理进度查询，投诉、
建议受理，装修知识问答、预约验收</td>
                <td>400-003-3030</td>
                <td>9:00-18:00</td>
            </tr>
            <tr>
                <td>在线IM</td>
                <td>登陆注册、购买付款、交易查询、（活动、订单、送货、安装、维修、
退换货）咨询、投诉建议、预约验收等</td>
                <td><a href="javascript:void(0)" class="needlogin singleim">点击联系在线客服</a></td>
                <td>9:00-18:00</td>
            </tr>
        </table>
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