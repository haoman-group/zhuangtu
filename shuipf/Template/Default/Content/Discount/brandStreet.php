<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>品牌街</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>
<!--背景容器-->
<div class="conwhole brand_sear">
</div>
<!--内容-->
<!--背景容器-->
<div class="conwhole brandBg">
     <!--保护容器-->
     <div class="container">
          <!--1F-->
          <div class="brand_gallery" >
               <div class="g_left left" name="posdatag">
                  <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main11.jpg">
                    <!-- <a href={$posdatag['1']['url']}><img class="content1_img" src={$posdatag[1]['picture']['0']} ></a> -->

               </div>
               <div class="g_mid left">
                  <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdataa" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataa" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataa" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdataa" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
               <div class="g_right right">
                <volist name="posdatab" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                    	<img src={$wo['picture']['0']} />
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
          <!--2F-->
          <div class="brand_gallery">
               <div class="g_left left" name="posdatac">
                    <!-- <a href="{$posdatac['1']['url']}"><img class="content1_img" src={$posdatac[1]['picture']['0']} ></a> -->
                    <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main22.jpg">
               </div>
               <div class="g_mid left">
                  <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdatad" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatad" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatad" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdatad" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
               <div class="g_right right">
                <volist name="posdatae" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                      <img src={$wo['picture']['0']} >
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
          <!--3F-->
          <div class="brand_gallery">
               <div class="g_left left" name="posdatah">
                    <!-- <a href="{$posdataf['1']['url']}"><img class="content1_img" src={$posdataf[1]['picture']['0']} ></a> -->
                    <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main33.jpg">
               </div>
               <div class="g_mid left">
                   <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdataf" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataf" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataf" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdataf" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
               <div class="g_right right">
                <volist name="posdatai" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                      <img src={$wo['picture']['0']} >
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
          <!--4F-->
          <div class="brand_gallery">
              <div class="g_left left" name="posdatak">
                    <!-- <a href="{$posdatak['1']['url']}"><img class="content1_img" src={$posdatak[1]['picture']['0']} ></a> -->
                    <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main44.jpg">
               </div>
              <div class="g_mid left">
                   <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdataj" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataj" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataj" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdataj" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
               <div class="g_right right">
                <volist name="posdatal" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                      <img src={$wo['picture']['0']} >
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
          <!--5F-->
          <div class="brand_gallery">
              <div class="g_left left" name="posdatan">
                    <!-- <a href="{$posdatan['1']['url']}"><img class="content1_img" src={$posdatan[1]['picture']['0']} ></a> -->
                    <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main55.jpg">
               </div>
               <div class="g_mid left">
                 <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdatam" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatam" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatam" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdatam" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
              <div class="g_right right">
                <volist name="posdatao" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                      <img src={$wo['picture']['0']} >
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
          <!--6F-->
          <div class="brand_gallery">
              <div class="g_left left" name="posdataq">
                    <!-- <a href="{$posdataq['1']['url']}"><img class="content1_img" src={$posdataq[1]['picture']['0']} ></a> -->
                    <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main66.jpg">
               </div>
               <div class="g_mid left">
                 <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdatap" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatap" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatap" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdatap" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
               <div class="g_right right">
                <volist name="posdatar" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                      <img src={$wo['picture']['0']} >
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
          <!--7F-->
          <div class="brand_gallery">
              <div class="g_left left" name="posdatat">
                    <!-- <a href="{$posdatat['1']['url']}"><img class="content1_img" src={$posdatat[1]['picture']['0']} ></a> -->
                    <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main77.jpg">
               </div>
               <div class="g_mid left">
                  <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdatas" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatas" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdatas" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdatas" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
              <div class="g_right right">
                <volist name="posdatau" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                      <img src={$wo['picture']['0']} >
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
          <!--8F-->
          <div class="brand_gallery">
                <div class="g_left left" name="posdatax">
                    <!-- <a href="{$posdatax['1']['url']}"><img class="content1_img" src={$posdatax[1]['picture']['0']} ></a> -->
                    <img src="{$config_siteurl}statics/zt/images/brandstreet/BrandStreet_main88.jpg">
               </div>
               <div class="g_mid left">
                 <div class="brand_gallery_ul">
                     <div class="brand_gallery_li">
                      <volist name="posdataw" id="vo" offset="0" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataw" id="vo" offset="4" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li">
                     <volist name="posdataw" id="vo" offset="8" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                     <div class="brand_gallery_li brand_gallery_li_last">
                     <volist name="posdataw" id="vo" offset="12" length='4'>

                     <a href="{$vo.url}" target="_blank"> <img src={$vo['picture']['0']}></a>
                      </volist>
                     </div>
                  </div>
               </div>
                <div class="g_right right">
                <volist name="posdataz" id="wo">
                    <a href="{:U('Shop/Product/show',array('id'=>$wo['dataid']))}" target="_blank" ><div class="img">
                      <img src={$wo['picture']['0']} >
                        <span>家庭特惠装<strong>￥{$wo.data.min_price}</strong></span>
                        <div class="buy">立即抢购</div>
                    </div></a>
                   </volist>
               </div>
          </div>
     </div>
</div>
<!--保证栏-->
<template file="common/_footer.php"/>
<!--隐藏搜索-->
<!--背景容器-->
<div class="conwhole hidden_searchBg">
    <!--保护容器-->
    <div class="container">
        <img src="{$config_siteurl}statics/zt/images/logo_05.png" class="logo" />
        <div class="hidden_searchbox">
            <form class="searform">
                <input  type="text" class="inpsear" placeholder="搜索你喜欢的">
                <input type="submit" class="btnsear" value="搜索" >
            </form>
        </div>
    </div>
</div>
<!--固定导航-->
<div class="fix_nav">
    <div class="fix_navcon">
        <div class="fix_navcona">
            <div class="fix_navatit">我的装途</div>
            <img src="{$config_siteurl}statics/zt/images/index/fix_nav05.png"/>
        </div>
        <div class="fix_cart">
            <img src="{$config_siteurl}statics/zt/images/index/fix_nav06.png"/>
            <div class="tit">购物车</div>
            <div class="num">1</div>
        </div>
        <div class="fix_navcona"><div class="fix_navatit">家装账单</div><img src="{$config_siteurl}statics/zt/images/index/fix_nav01.png"/></div>
        <div class="fix_navcona"><div class="fix_navatit">我关注的品牌</div><img src="{$config_siteurl}statics/zt/images/index/fix_nav02.png"/></div>
        <div class="fix_navcona"><div class="fix_navatit">我的收藏</div><img src="{$config_siteurl}statics/zt/images/index/fix_nav03.png"/></div>
        <div class="fix_navcona"><div class="fix_navatit">我看过的</div><img src="{$config_siteurl}statics/zt/images/index/fix_nav04.png"/></div>
    </div>
    
    <a href="#" class="totop">top</a>
</div>
</body>
</html>