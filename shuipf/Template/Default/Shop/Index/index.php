<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>装途网</title>
  <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/index.css" >
  <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ztshop.css" >
  <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/shopskin/<notempty name="page[setting][color]">{$page[setting][color]}<else/>dark</notempty>.css" >
  <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ecplaypreview.css" >
  <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
  <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
  <script src="{$config_siteurl}statics/zt/js/base.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
  <script src="http://g.alicdn.com/kissy/k/1.4.8/seed-min.js"></script>
  <script src="http://a.tbcdn.cn/p/snsdk/core.js"></script>
  <script src="{$config_siteurl}statics/js/ks/easycountdown.js"></script>
</head>
<body >
<!--背景容器-->
<template file="common/_shopHeader.php"/>
<?php
// $pid = M('ShopCategory')->where(array('id'=>$shopInfo['catid']))->getField('pid');
if(isset($pid) && ($pid == 1) && ($tw > 0)){
  echo '<div class="suspend"><a href="'.U('Shop/Product/teamworker',array('domain'=>$shopInfo['domain'])).'"><img src="'.$config_siteurl.'statics/zt/images/teamwork.png" alt="合作工长"></a></div>';
}
?>
<div class="page" style="background-image: url({$page['setting']['container']['background_image']}); background-color:{$page['setting']['container']['background_color']};background-repeat:{$page['setting']['container']['background_repeat']};background-position:{$page['setting']['container']['background_align']} 0; " >
  <div class="ztshopcon">
    <div class="layoutmain" data-maxlayout="5" data-maxmods="40">
      <div class="layout-hd <eq name="page[setting][header][isshownav]" value="0">hdhidenav</eq> " style="margin-bottom: <eq name="page[setting][header][margin_bottom_10]" value="0">0px <else/>10px</eq>; <eq name="page[setting][header][isshowhead]" value="0">display:none;</eq>    <notempty name="page[setting][header][background_image]">background-image: url({$page['setting']['header']['background_image']});background-repeat:{$page['setting']['header']['background_repeat']}; background-position:{$page['setting']['header']['background_align']} 0;</notempty> <notempty name="page[setting][header][background_color]">background-color:{$page['setting']['header']['background_color']};</notempty>   ">
      <div class="layout layout-block" data-ltype="ltop" data-widgetid="12346745822" data-componentid="23" data-prototypeid="23" data-id="12346745822" data-max="2">
        <div class="col-main">
          <div class="main-wrap J_TRegion" data-modules="main" data-width="h950" data-max="2">
            <volist name="layout[hd][0][maincol]" id="v">
              {$v['widgetid']|getDesignHtml}
            </volist>
          </div>

        </div>

      </div>

    </div>

      <div class="layout-bd">
        <volist name="layout[bd]" id="vo">
          <div class="layout-block {$vo.classname} layout" data-ltype="{$vo.classname}" data-widgetid="{$vo.blockid}" data-componentid="0" data-context="bd" data-prototypeid="0" data-id="{$vo.blockid}">
            <div class="col-main">
              <div class="main-wrap J_TRegion" data-modules="main" data-width="b950">
                <volist name="vo[maincol]" id="v">
                  {$v['widgetid']|getDesignHtml}
                </volist>
              </div>
            </div>
            <div class="col-sub J_TRegion" data-modules="sub" data-width="b190">
              <volist name="vo[subcol]" id="v">
                {$v['widgetid']|getDesignHtml}
              </volist>
            </div>
          </div>

        </volist>

      </div>


  </div>

    <div class="layout-ft">
        <!-- <div class="hdfttip">以下为页尾区域</div> -->

        <div class="layout grid-m layout-block" data-ltype="lft" data-widgetid="12346745825" data-componentid="33" data-prototypeid="33" data-id="12346745825" data-max="1">

            <div class="col-main">
                <div class="main-wrap J_TRegion" data-modules="main" data-width="f950" data-max="1">


                </div>
            </div>
        </div>
    </div>


</div>
</div>


<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>

<script>
$(function(){
  /*点击切换的滑动门   chtitli为切换按钮  chtitul为切换按钮的容器
   chconli为切换内容    chconul为切换内容的容器
   data-tag属性标记对应关系*/
  $(".chtitli").click(function(){
    var $chtitul= $(this).closest(".chtitul");
    var tag=$chtitul.attr("data-tag");
    var $chconul= $("[data-tag='"+tag+"']").eq(1);

    var index = $chtitul.find(".chtitli").index(this);
    $(this).addClass("on").siblings(".chtitli").removeClass("on");
    $chconul.find(".chconli").eq(index).show().siblings(".chconli").hide();
  })



  if("snyg618ztd"=="{$shopInfo.domain}" && !$.cookie("snyg618ztd")   ){
    $.cookie("snyg618ztd",1,{path:"/"});
    $("body").append("<div class='temppro_pop'><div class='imgbox imgbox870753'><img src='{$config_siteurl}statics/zt/images/showshop/tmp_pagezhe_suning.png'><a href='javascript:void(0)' class='btnclose'></a> </div> </div>");
    setTimeout(function(){$(".temppro_pop").hide();},3000);
  }

  if("snyg618ztd"=="{$shopInfo.domain}"){
    $(".whole_img").attr("src","/d/file/content/2016/06/57593fa20a003.jpg").parent().attr("href","http://www.zhuangtu.net/s/QWZDJ");
  }

  if("QWZDJ"=="{$shopInfo.domain}" && !$.cookie("QWZDJ") ){
    $.cookie("QWZDJ",1,{path:"/"});
    $("body").append("<div class='temppro_pop'><div class='imgbox imgbox630534'><img src='{$config_siteurl}statics/zt/images/showshop/tmp_pagezhe_168.png'><a href='javascript:void(0)' class='btnclose'></a> </div> </div>");
    setTimeout(function(){$(".temppro_pop").hide();},3000);
  }

  $(document).on("click",".temppro_pop",function(){
    $(".temppro_pop").hide();
  })


})
</script>

<script src="{$config_siteurl}statics/js/ks/ks142.js?t="></script>

<script language=javascript>
var vt = new Date().getTime();
var lt = new Date().getTime();
var sid = {$shopInfo['id']};
var pid = 0;
var scid = {$shopInfo['catid']};
var ispv = 0;
var int=self.setInterval(function(){
  vt = lt;
  lt = new Date().getTime();
  $.get("/Shop/Index/ajax_flowstat_record?key={'sid':"+sid+",'pid':"+pid+",'vt':"+vt+",'lt':"+lt+",'scid':"+scid+",'type':'vt'}");
  if(ispv==0){
    $.get("/Shop/Index/ajax_flowstat_record?key={'sid':"+sid+",'pid':"+pid+",'vt':"+vt+",'lt':"+lt+",'scid':"+scid+",'type':'pv'}");
    ispv = 1;
  }
},3000);

</script>



</body>
</html>
