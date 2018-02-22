<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>装途网</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/discount_sale.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
</head>
<body>
<template file="Content/common/_header.php"/>
<div class="conwhole whole_imgbox tanabata">
  <img src="{$config_siteurl}statics/zt/images/bigbrand/banner.jpg" class="whole_img" />
</div>
<div class="bigqu">
  <div class="container">
    <ul class="clearfix hots">
      <volist name="posdata['266']" id="vo" offset="0" length="2">
      <li><a href="{$vo.url}"><img src="{$vo.picture.0}" alt=""></a></li>
     </volist>
    </ul>
    <div class="fixbox">
      <div class="logobox">
        <ul class="clearfix logo">
          <volist name="posdata['266']" id="vo" offset="2" length="ceil((count($posdata['266'])-2)/3)" key='k'>
          <li>
            <a href="{$posdata['266'][3*$k]['url']}"><img src="{$posdata['266'][3*$k]['picture']['0']}" alt=""></a>
            <a href="{$posdata['266'][3*$k+1]['url']}"><img src="{$posdata['266'][3*$k+1]['picture']['0']}" alt=""></a>
            <a href="{$posdata['266'][3*$k+2]['url']}"><img src="{$posdata['266'][3*$k+2]['picture']['0']}" alt=""></a>
          </li>
         </volist>
        </ul>
        <ul class="logo2"></ul>
      </div>
    </div>
  </div>
</div>
<div class="homequ">
  <div class="container">
    <dl class="radio">
      <dt class="left">
        <?php echo htmlspecialchars_decode($posdata['268']['1']['void']);  ?>
      </dt>
      <dd class="right">
        <a href="{$posdata['268']['1']['url']}"><img src="{$posdata['268']['1']['picture']['0']}" alt=""></a>
      </dd>
    </dl>
    <ul class="clearfix">
      <volist name="posdata['268']" id="fix" offset="1" length="4">
      <li>
         <a href="{:U('Shop/Product/show',array('id'=>$fix['dataid']))}">
           <img src="{$fix.picture.0}" alt="">
           <div>
             <strong>{$fix.title}</strong>
             <span>￥:{$fix.min_price}</span>
           </div>
         </a>
      </li>
    </volist>
      <!-- <li>
         <a href="">
           <img src="" alt="">
           <div>
             <strong></strong>
             <span></span>
           </div>
         </a>
      </li>
      <li>
         <a href="">
           <img src="" alt="">
           <div>
             <strong></strong>
             <span></span>
           </div>
         </a>
      </li>
      <li>
         <a href="">
           <img src="" alt="">
           <div>
             <strong></strong>
             <span></span>
           </div>
         </a>
      </li> -->
    </ul>
  </div>
</div>
<div class="hotqu">
    <ul>
      <volist name="posdata['267']" id="wo">
      <li>
        <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}"><img src="{$wo.picture.0}" alt=""></a>
        <p class="desc">{$wo.title}</p>
        <div class="price">
          <span>装途价：<strong>{$wo.data.min_price}</strong>元</span>
          <del>市场价:￥{$wo.data.min_price_ori}</del>
          <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" class="btn">点击购买&gt;</a>
        </div>
      </li>
    </volist>
    </ul>
    <div class="bottom"></div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
<script type="text/javascript">

$(function(){
  $(".radio").find("iframe").css({"width":"842px","height":"491px"});
  //js无缝滚动代码
  var width = (($(".logobox .logo li").width() + 34 ) * $(".logobox .logo li").length) *2;
  $(".logobox").css({"width":width});
  function marquee(){
      if ($(".logo2").width() - $(".fixbox").scrollLeft() <= 0){
        $(".fixbox").scrollLeft($(".fixbox").scrollLeft() - $(".logo").width());
      }else{
        $(".fixbox").scrollLeft($(".fixbox").scrollLeft() + 1);
      }
  }

  function marqueeStart(){
    $(".logo2").html($(".logo").html());
    var marqueeVar = window.setInterval(function(){marquee();}, 20);
    $(".fixbox").hover(function(){window.clearInterval(marqueeVar);},function(){marqueeVar = window.setInterval(function(){marquee();}, 20);});
  }

  marqueeStart();
});
</script>
</body>
</html>
