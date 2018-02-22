<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>折扣就是折扣</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/discount_sale.css">
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/discount_sale.js"></script>
</head>
<body>
<template file="common/_top.php"/>
    <div class="discount_header">
      <div class="content">
        <img class="font_bg" src="{$config_siteurl}statics/zt/images/discount/text.png" alt="">
        <img class="font_imgs" src="{$config_siteurl}statics/zt/images/discount/font.png" alt="" />
        <img class="jiadian" src="{$config_siteurl}statics/zt/images/discount/jiadian.png" alt="">
        <div class="title">
          <a href="#F1">
            <div class="title_box">
              <img class="imgs" src="{$config_siteurl}statics/zt/images/discount/three.png" alt="">
              <h5>三折区</h5>
              <p>最高直降<span>2000</span></p>
              <!-- <a class="links" target="_blank"  href="">点击进入&nbsp;》</a> -->
            </div>
          </a>
          <a href="#F2">
            <div class="title_box tb">
              <img class="imgs" src="{$config_siteurl}statics/zt/images/discount/four.png" alt="">
              <h5>四折区</h5>
              <p>5折<span>起购</span></p>
              <!-- <a class="links" target="_blank"  href="">点击进入&nbsp;》</a> -->
            </div>
          </a>
          <a href="#F3">
            <div class="title_box tb">
              <img class="imgs" src="{$config_siteurl}statics/zt/images/discount/five.png" alt="">
              <h5>五折区</h5>
              <p>让利1000<span>降到底</span></p>
              <!-- <a class="links last" target="_blank"  href="">点击进入&nbsp;》</a> -->
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="three_discount" id="F1">
      <div class="content">
        <img class="content_top_imgs" src="{$config_siteurl}statics/zt/images/discount/three_discount_top.png" alt="" />
        <h3>三折区</h3>
        <p class="new">2016新品上市，价格低的任性，别说你不知道</p>
        <ul class="clearfix">
          <volist name="three" id="three_item" offset="0" length="2">
          <li>
            <p class="times"></p>
            <div class="content_img">
              <a class="img" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$three_item['dataid']))}"><img src="{$three_item.picture.0}" alt="" /></a>
              <p class="new_price">￥<span>{$three_item.data.min_price}</span></p>
              <p class="old_price">参考价:<span>{$three_item.data.min_price_ori}</span></p>
              <a href="{:U('Shop/Product/show',array('id'=>$three_item['dataid']))}" target="_blank" class="brand">{$three_item.title}</a>
              <p class="attrbute">{$three_item.data.sell_points}</p>
              <a class="text" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$three_item['dataid']))}">加入购物车</a>
            </div>
          </li>
        </volist>
         <!-- <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop2.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>-->
        <volist name="three" id="three_item" offset="2" length="8">
          <li>
         
            <p class="times"></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$three_item['dataid']))}"><img src="{$three_item.picture.0}" alt="" /></a>
              <p class="new_price">￥<span>{$three_item.data.min_price}</span></p>
              <p class="old_price">参考价:<span>￥{$three_item.data.min_price_ori}</span></p>
              <a href="{:U('Shop/Product/show',array('id'=>$three_item['dataid']))}" target="_blank" class="brand">{$three_item.title}</a>
              <p class="attrbute">{$three_item.data.sell_points}</p>
              <a class="text" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$three_item['dataid']))}">加入购物车</a>
            </div>
          </li>
        </volist>
         <!-- <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop3.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>
          <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop3.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>
          <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop3.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>
          <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop3.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>
          <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop3.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>
          <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop3.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>
          <li>
            <p class="times"><span>19</span>:<span>49</span>:<span>40</span></p>
            <div class="content_img1">
              <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop3.jpg" alt="" /></a>
              <p class="new_price">￥<span>1799.00</span></p>
              <p class="old_price">参考价:<span>￥2199.00</span></p>
              <p class="brand">苏泊尔电热水壶</p>
              <p class="attrbute">不锈钢，2L大容量，分体式设计</p>
              <a class="text" target="_blank"  href="#">加入购物车</a>
            </div>
          </li>-->
        </ul>
      </div>
      <img class="polygon" src="{$config_siteurl}statics/zt/images/discount/discount_bottom.png" alt="" />
    </div>

    <div class="area" id="F2">
      <div class="area_four_title">
        <div class="a_f_t_content">
          <img src="{$config_siteurl}statics/zt/images/discount/four.jpg" alt="" />
          <p><span>四折区</span>2016新品上市，价格低的任性，别说你不知道</p>
        </div>
      </div>
      <ul class="area_four_content clearfix">
        <volist name="four" id="four">
          <li>
            <a class="imgs" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$four['dataid']))}"><img src="{$four.picture.0}" alt="" /></a>
            <a class="brand" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$four['dataid']))}">{$four.title}</a>
            <p>抢购价:<span>￥{$four.data.min_price}</span><a class="buy" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$four['dataid']))}">立即购买</a></p>
          </li>
        </volist>
          <!--<li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <a class="imgs" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/shop4.jpg" alt="" /></a>
            <a class="brand" target="_blank"  href="#">苏泊尔电热水壶</a>
            <p>抢购价:<span>￥99.00</span><a class="buy" target="_blank"  href="#">立即购买</a></p>
          </li>-->
      </ul>
    </div>

    <div class="area_five area" id="F3">
      <hr class="hr1" />
      <hr class="hr2" />
      <hr class="hr3" />
      <hr class="hr4" />
      <hr class="hr5" />
      <div class="area_five_title">
        <div class="a_five_t_content">
          <div class="slide">
            <img src="{$config_siteurl}statics/zt/images/discount/slid.png" alt="" />
          </div>
          <div class="fiveArea">
            <strong>五折区</strong>
            <em>50%off</em>
          </div>
          <p>2016新品上市，价格低的任性，别说你不知道</p>
        </div>
      </div>
      <ul class="area_five_content clearfix">
        <volist name="five" id="five" >
          <li>
            <a class="img" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$five['dataid']))}"><img src="{$five.picture.0}" alt="" /></a>
            <a href="{:U('Shop/Product/show',array('id'=>$five['dataid']))}" target="_blank" class="name">{$five.title}</a>
            <p class="price">折后价<span>{$five.data.min_price}</span></p>
            <a class="shop" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$five['dataid']))}">立即抢购</a>
          </li>
        </volist>
          <!--<li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/2.jpg" alt="" /></a>
            <p class="name">奥克斯（AUX）AK-15C 无缝全不锈钢优质温控2L/2升 电热水</p>
            <p class="price">折后价<span>38</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/3.jpg" alt="" /></a>
            <p class="name">九阳（JOYOUNG）JYZ-D51 营养专业榨汁机 金属色果汁机</p>
            <p class="price">折后价<span>188</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/4.jpg" alt="" /></a>
            <p class="name">索尼(SONY) KDL-40R550C 40英寸 高清网络LED液晶电视4</p>
            <p class="price">折后价<span>2499</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/5.jpg" alt="" /></a>
            <p class="name">格兰仕（Galanz） P70F23P-G5(B0) 机械旋钮平板式微波炉</p>
            <p class="price">折后价<span>1499</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/6.jpg" alt="" /></a>
            <p class="name">先锋(Pioneer) LED-39B350 39英寸 高清 蓝光 DTMB LED电视</p>
            <p class="price">折后价<span>1419</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/7.jpg" alt="" /></a>
            <p class="name">先锋(Pioneer) LED-39B350 39英寸 高清 蓝光 DTMB LED电视</p>
            <p class="price">折后价<span>2499</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/8.jpg" alt="" /></a>
            <p class="name">先锋(Pioneer) LED-39B350 39英寸 高清 蓝光 DTMB LED电视</p>
            <p class="price">折后价<span>2809</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/9.jpg" alt="" /></a>
            <p class="name">先锋(Pioneer) LED-39B350 39英寸 高清 蓝光 DTMB LED电视</p>
            <p class="price">折后价<span>899</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/10.jpg" alt="" /></a>
            <p class="name">先锋(Pioneer) LED-39B350 39英寸 高清 蓝光 DTMB LED电视</p>
            <p class="price">折后价<span>149</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/1.jpg" alt="" /></a>
            <p class="name">圣罗莎连体马桶  超薄智能坐便盖板</p>
            <p class="price">折后价<span>1499</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/2.jpg" alt="" /></a>
            <p class="name">奥克斯（AUX）AK-15C 无缝全不锈钢优质温控2L/2升 电热水</p>
            <p class="price">折后价<span>38</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/3.jpg" alt="" /></a>
            <p class="name">九阳（JOYOUNG）JYZ-D51 营养专业榨汁机 金属色果汁机</p>
            <p class="price">折后价<span>188</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/4.jpg" alt="" /></a>
            <p class="name">索尼(SONY) KDL-40R550C 40英寸 高清网络LED液晶电视4</p>
            <p class="price">折后价<span>2499</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>
          <li>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/five/5.jpg" alt="" /></a>
            <p class="name">格兰仕（Galanz） P70F23P-G5(B0) 机械旋钮平板式微波炉</p>
            <p class="price">折后价<span>1499</span></p>
            <a class="shop" target="_blank"  href="#">立即抢购</a>
          </li>-->
      </ul>
      <img src="{$config_siteurl}statics/zt/images/discount/five_discount_bottom.png" alt="" class="five_bottom"/>
    </div>

    <div class="area area_bottom">
      <div class="area_bottom_title clearfix">
        <div class="abt_content clearfix">
           <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom.png" alt="" /></a>
           <div class="text">
             <h5>折扣就是折扣<strong>50%~90%</strong></h5>
             <p>2016新品上市，价格低的任性，别说你不知道</p>
           </div>
        </div>
      </div>
      <ul class="area_bottom_content clearfix">
         <volist name="between" id="between">
          <li>
            <img class="brand" src="{$between.picture.1}" alt="" />
            <a class="img" target="_blank"  href="{:U('Shop/Product/show',array('id'=>$between['dataid']))}"><img src="{$between.picture.0}" alt="" /></a>
            <h5><a href="{:U('Shop/Product/show',array('id'=>$between['dataid']))}" target="_blank">{$between.title}</a></h5>
            <p class="describe">{$between.data.sell_points}</p>
            <p class="price">活动价：<span>￥{$between.data.min_price}</span><a target="_blank"  href="{:U('Shop/Product/show',array('id'=>$between['dataid']))}">立即购买</a></p>
          </li>
         </volist>
          <!--<li>
           <img class="brand" src="images/bottom/brand.png" alt="" />
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/1.jpg" alt="" /></a>
          </li>
          <li>
             <img class="brand" src="images/bottom/brand.png" alt="" /> 
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/3.jpg" alt="" /></a>
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
            <!-- <img class="brand" src="images/bottom/brand.png" alt="" />
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/4.jpg" alt="" /></a>
          </li>
          <li>
            <img class="brand" src="images/bottom/brand.png" alt="" /> 
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/3.jpg" alt="" /></a>
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
          </li>
          <li>
             <img class="brand" src="images/bottom/brand.png" alt="" /> 
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/1.jpg" alt="" /></a>
          </li>
          <li>
             <img class="brand" src="images/bottom/brand.png" alt="" /> 
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/3.jpg" alt="" /></a>
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
          </li>
      <li>
             <img class="brand" src="images/bottom/brand.png" alt="" /> 
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
            <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/1.jpg" alt="" /></a>
          </li>
          <li>-->
            <!-- <img class="brand" src="images/bottom/brand.png" alt="" /> -->
           <!-- <a class="img" target="_blank"  href="#"><img src="{$config_siteurl}statics/zt/images/discount/bottom/3.jpg" alt="" /></a>
            <h5>苏泊尔电热水壶</h5>
            <p class="describe">不锈钢，2L大容量，分体式设计</p>
            <p class="price">活动价：<span>￥99.00</span><a target="_blank"  href="#">立即购买</a></p>
          </li>-->
      </ul>
    </div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
  </body>
</html>
