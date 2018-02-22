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
<div class="conwhole whole_imgbox autumnfestival">
  <img src="{$config_siteurl}statics/zt/images/autumnfestival/top.png" class="whole_img" />
  <div class="full-min">
    <div class="container">

      <a href="{:U('Shop/Product/show',array('id'=>$posdata['272']['1']['dataid']))}"><img src="{$config_siteurl}statics/zt/images/autumnfestival/0.1.png" alt="" class="check-entry"></a>
      <div class="more-low">
        <ul class="clearfix">
          <volist name="posdata['269']" id="vo">
          <li>
            <i class="hot"><img src="{$config_siteurl}statics/zt/images/autumnfestival/hot.png" alt=""></i>
            <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" class="img"><img src="{$vo.picture.0}" alt=""></a>
            <p class="desc">{$vo.title}</p>
            <p class="price"><span>￥<strong>{$vo.data.min_price}</strong></span><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}">点击购买</a></p>
          </li>
        </volist>
          <!-- <li>
            <i class="hot"><img src="{$config_siteurl}statics/zt/images/autumnfestival/hot.png" alt=""></i>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <p class="price"><span>￥<strong>584.0</strong></span><a href="">点击购买</a></p>
          </li>
          <li>
            <i class="hot"><img src="{$config_siteurl}statics/zt/images/autumnfestival/hot.png" alt=""></i>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <p class="price"><span>￥<strong>584.0</strong></span><a href="">点击购买</a></p>
          </li>
          <li>
            <i class="hot"><img src="{$config_siteurl}statics/zt/images/autumnfestival/hot.png" alt=""></i>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <p class="price"><span>￥<strong>584.0</strong></span><a href="">点击购买</a></p>
          </li>
          <li>
            <i class="hot"><img src="{$config_siteurl}statics/zt/images/autumnfestival/hot.png" alt=""></i>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <p class="price"><span>￥<strong>584.0</strong></span><a href="">点击购买</a></p>
          </li>
          <li>
            <i class="hot"><img src="{$config_siteurl}statics/zt/images/autumnfestival/hot.png" alt=""></i>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <p class="price"><span>￥<strong>584.0</strong></span><a href="">点击购买</a></p>
          </li> -->
        </ul>
      </div>
    </div>
  </div>
  <img src="{$config_siteurl}statics/zt/images/autumnfestival/shop-area.jpg" class="whole_img" />
  <div class="activity-qu">
    <div class="shop-qu clearfix">
      <div class="mid-autumn">
        <ul>
          <volist name="posdata['270']" id="autumn">
          <li>
            <a href="{:U('Shop/Product/show',array('id'=>$autumn['dataid']))}" class="img"><img src="{$autumn.picture.0}" alt=""></a>
            <p class="desc">{$autumn.title}</p>
            <a href="{:U('Shop/Product/show',array('id'=>$autumn['dataid']))}" class="btn"><i>￥</i>{$autumn.data.min_price}</a>
          </li>
        </volist>
          <!-- <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li>
          <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li>
          <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li>
          <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li>
          <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn"><i>￥</i>168.0</a>
          </li> -->
        </ul>
      </div>
      <div class="nation">
        <ul>
          <volist name="posdata['271']" id="national">
          <li>
            <a href="{:U('Shop/Product/show',array('id'=>$national['dataid']))}" class="img"><img src="{$national.picture.0}" alt=""></a>
            <p class="desc">{$national.title}</p>
            <a href="{:U('Shop/Product/show',array('id'=>$national['dataid']))}" class="btn">国庆价 <i>￥</i><strong>{$national.data.min_price}</strong></a>
          </li>
        </volist>
       <!--    <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li>
          <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li>
          <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li>
          <li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li><li>
            <a href="" class="img"><img src="" alt=""></a>
            <p class="desc">ARROW箭牌 瓷砖全抛釉客厅地砖墙砖加勒比ACS625080P</p>
            <a href="" class="btn">国庆价 <i>￥</i><strong>168.0</strong></a>
          </li> -->
        </ul>
      </div>
    </div>
    <div class="return-container">
      <a href="#" class="return">返回顶部</a>
    </div>
  </div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
<!-- <audio src="{$config_siteurl}statics/zt/images/tanabata/marryu.mp3" autoplay style="width: 0px; height: 0px; opacity: 0;"></audio> -->
</body>
</html>
