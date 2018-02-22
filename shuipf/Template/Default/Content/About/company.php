<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<!doctype html>
<html>
<head>
    <title>关于装途</title>
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
    <div class="aboutbg"><img src="{$config_siteurl}statics/zt/images/company/about_bg.jpg"/></div>
    <div class="about_con">
        <div class="l_aboutin">
            <h3>
                <strong>ABOUT</strong>
                <p>关于装途网</p>
            </h3>
            <ul class="brief">
                <li class="on"><a href="#1f">公司简介</a></li>
                <li><a href="#2f">为商家提供</a></li>
            </ul>
            <div class="wwp">
                <p class="wzp"><img src="{$config_siteurl}statics/zt/images/company/wz.png"/>www.zhuangtu.net</p>
                <p><img src="{$config_siteurl}statics/zt/images/company/dz.png"/> 山西省太原市小店区高新开发区高新街环能科技12F装途网</p>
                <i>400-003-3030</i>
            </div>
        </div>
        <div class="r_aboutin"><a name="1f"></a>
            <div class="crumbs">
                <a  href="http://www.zhuangtu.net/Seller/Index/index.html">您当前位置</a>
                <a  href="#"> &gt; </a>
                <a class="briefs abouttit"  href="http://www.zhuangtu.net/Seller/Index/index.html">公司简介</a>
                <a class="provide abouttit"  href="http://www.zhuangtu.net/Seller/Index/index.html" style="display: none">为商家提供</a>
                <a  href="#"></a>
            </div>
            <div class="r_abogcon1 aboutcon" >
                <b></b>

                <h4><strong>WHO </strong>WE ARE?</h4>
                <p>装途网，创立于2014年，为山西窝牛信息技术有限公司旗下互联网家装平台项目。</p>
                <p>装途网成立的初衷是让所有人用互联网自己装家。因为传统的装修公司和游击队以其粗放、黑暗、无底线的经营方式，彻底失去了
                    消费者的信任。家装，作为一个拥有四万亿规模的超级市场，需要一种新模式的出现。</p>
                <p>2015年3月15日，李克强总理在政府工作报告中首次提出 “互联网+”计划，装途网正是站在“互联网+”的风口，顺势而为，立
                    足太原，放眼全国，力图打造O2O家装类垂直电商服务平台。</p>
                <p>装途网作为本土化装修行业的O2O电子商务平台，将电子商务理念，手机APP和云计算技术融入到装修行业中，为顾客提供网购家
                    装产品、装修流程的提醒资讯、装修效果的验收保障、装修基础材料的免费配送等系统化服务。帮助消费者更简单、更透明、更实惠地
                    网购到设计、工人、辅材、主材、家具、家电等家装的一切，最终完成我们的使命：让消费者花最少的钱装最满意的家，让设计师、工
                    人等手工艺人获得尊严，让家装这一古老的传统行业插上“互联网+”的高效翅膀。</p>
            </div>
            <div class="r_abogcon2 aboutcon" >
                <b class="xib"></b>
                <p><a name="2f"> 装途网为商家提供：</a></p>
                <p>1、免费开店服务，包括集中为传统线下商户免费进行互联网思维、网店运营及开店技能培训；</p>
                <p>2、帮助商家实现互联网引流，让商家拥有与自己实体店对应的网店，以全新的互联网渠道、更低的营销成本、高效的联合营销、精准的
                    客户锁定拥抱互联网家装的红利。</p>
                <img src="{$config_siteurl}statics/zt/images/company/aboutbg.jpg"/>
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