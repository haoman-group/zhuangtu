<!doctype html>
<html>
<head>
    <title>网购家具</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/furniture.js"> </script>
</head>
<body>
<!--top header-->
<template file="common/_top.php"/>
<!-- <div class="conwhole whole_imgbox">
  <a href="{$posdata['232']['1']['url']}" target="_blank"><img src="{$posdata['232']['1']['picture']['0']}" class="whole_img" /></a>
</div> -->
<template file="common/_searchindex.php"/>
<!--导航-->
<!--导航头-->
<!--保护容器-->
<div class="container">
    <span class="nav_img">商品服务分类</span>
    <div class="nav_headcon">
        <ul class="nav_head">
            <li><a href="/Content/Index/index" style="color:#c8000b">首页 </a></li>
            <li><a href="#F2">客厅家具</a></li>
            <li><a href="#F3">卧室家具</a></li>
            <li><a href="#F4">书房家具</a></li>
            <li><a href="#F5">儿童家具</a></li>
            <li><a href="#F6">家纺</a></li>
            <li><a href="#F7">家饰</a></li>
        </ul>
    </div>
</div>
<div class="furbanner">
    
    <div class="banner turnbg">
    	<div class="container">
            <div class="nav turntabul" data-tag="turn1">
             <li  class="turntabli">     
                <div class="title"><img src="{$config_siteurl}statics/zt/images/furniture/furbannertitle1.png">客厅/餐厅家具</div>
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'沙发'))}">沙发</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'茶几'))}">茶几</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'角几'))}">角几</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'电视柜'))}">电视柜</a> 
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'餐桌%20餐椅'))}">餐桌/餐椅</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'多功能柜'))}">多功能柜</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'鞋柜'))}"> 鞋柜</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'落地灯'))}">落地灯</a>
             </li>
             <li  class="turntabli">     
                <div class="title"><img src="{$config_siteurl}statics/zt/images/furniture/furbannertitle2.png">卧室家具</div>
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'床'))}">床</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'床垫'))}">床垫</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'床头柜'))}">床头柜</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'五斗柜'))}">五斗柜</a>
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'衣柜'))}">衣柜</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'梳妆台'))}">梳妆台</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'梳妆凳'))}">梳妆凳</a> 
             </li>
             <li  class="turntabli">     
                <div class="title"><img src="{$config_siteurl}statics/zt/images/furniture/furbannertitle3.png">书房家具</div>
                <a href="{:U('Content/Search/search',array('searchkey'=>'书桌%20电脑桌'))}">书桌/电脑桌</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'书椅%20电脑椅'))}">书椅/电脑椅</a>  
                <a href="{:U('Content/Search/search',array('searchkey'=>'台灯'))}">台灯</a>
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'书架%20书柜'))}">书架/书柜</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'懒人沙发'))}">懒人沙发</a> 
             </li>
             <li  class="turntabli">     
                <div class="title"><img src="{$config_siteurl}statics/zt/images/furniture/furbannertitle4.png">儿童家具</div>
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'儿童床'))}">儿童床</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'床垫'))}">床垫</a>  
                <a href="{:U('Content/Search/search',array('searchkey'=>'学习桌'))}">学习桌</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'书柜'))}">书柜</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'衣柜'))}">衣柜</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'玩具家具'))}">玩具家具</a>  
             </li><li  class="turntabli">     
                <div class="title"><img src="{$config_siteurl}statics/zt/images/furniture/furbannertitle5.png">家纺</div>
                <a href="{:U('Content/Search/search',array('searchkey'=>'抱枕'))}">抱枕</a>  
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'床单'))}">床单</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'被套'))}">被套</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'毛巾被'))}">毛巾被</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'枕套'))}">枕套</a>              
                <a href="{:U('Content/Search/search',array('searchkey'=>'毛毯'))}">毛毯</a>  
                <a href="{:U('Content/Search/search',array('searchkey'=>'地毯'))}">地毯</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'沙发垫'))}">沙发垫</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'桌布'))}">桌布</a>
             </li>
             <li  class="turntabli">     
                <div class="title"><img src="{$config_siteurl}statics/zt/images/furniture/furbannertitle6.png">家饰</div>
                <a href="{:U('Content/Search/search',array('searchkey'=>'花瓶'))}">花瓶</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'绿植'))}">绿植</a> 
                <a href="{:U('Content/Search/search',array('searchkey'=>'钟表'))}">钟表</a>
                <a href="{:U('Content/Search/search',array('searchkey'=>'画框'))}">画框</a>              
                <a class="hot" href="{:U('Content/Search/search',array('searchkey'=>'饰品'))}">饰品 </a>
             </li>
            </div>
            <div class="turnimgul" data-tag="turn1">
                <a class="turnimgli on" href="{$posdata['169']['1']['url']}"><img src="{$posdata['169']['1']['picture']['0']}"></a>
                <a class="turnimgli" href="{$posdata['169']['2']['url']}"><img src="{$posdata['169']['2']['picture']['0']}"></a>
                <a class="turnimgli" href="{$posdata['169']['3']['url']}"><img src="{$posdata['169']['3']['picture']['0']}"></a>
                <a class="turnimgli" href="{$posdata['169']['4']['url']}"><img src="{$posdata['169']['4']['picture']['0']}"></a>
                <a class="turnimgli" href="{$posdata['169']['5']['url']}"><img src="{$posdata['169']['5']['picture']['0']}"></a>
                <a class="turnimgli" href="{$posdata['169']['6']['url']}"><img src="{$posdata['169']['6']['picture']['0']}"></a>
            </div>
    	</div>
    </div>
    <div class="ensure">
        <a href=""><img src="{$config_siteurl}statics/zt/images/furniture/furbannnera1.png"><div class="txt"><strong>实体店认证</strong><span>线上购买</span><span>线下体验</span></div></a>
        <a href=""><img src="{$config_siteurl}statics/zt/images/furniture/furbannnera2.png"><div class="txt"><strong>品牌质保</strong><span>质量保证</span><span>售后无忧</span></div></a>
        <a href=""><img src="{$config_siteurl}statics/zt/images/furniture/furbannnera3.png"><div class="txt"><strong>购物无忧</strong><span>充足货源</span><span>想购就购</span></div></a>
    </div>
</div>
<div  class="furhot">
  <div class="head">
      <div class="txt"><span>TOPBRAND</span>热销品牌</div> <a href="{:U('Content/Search/search',array('searchkey'=>'家具'))}" class="more">更多 》</a>
    </div>
  <dl>
      <dt>
            <div class="img">
              <a href="{$posdata['90']['1']['url']}" target="_blank"><img src="{$posdata['90']['1']['picture']['0']}"></a>
     <!--            <table class="explain">
                  <tr>
                      <td>
                        <img src="{$config_siteurl}statics/zt/images/address.png">
                        </td>
                        <td class="txt">{$posdata['90']['1']['description']}
                        </td>
                    </tr>
                 </table> -->
            </div>
            <div class="img">
              <a href="{$posdata['90']['2']['url']}" target="_blank"><img src="{$posdata['90']['2']['picture']['0']}"></a>
                <!-- <table class="explain">
                  <tr>
                      <td>
                          <img src="{$config_siteurl}statics/zt/images/address.png">
                        </td>
                        <td class="txt">{$posdata['90']['2']['description']}
                        </td>
                    </tr>
                </table> -->
            </div>
        </dt>
        <dd>
            <div class="img">
              <a href="{$posdata['90']['3']['url']}" target="_blank"><img src="{$posdata['90']['3']['picture']['0']}"></a> 
            </div>
            <div class="dt">
              <div class="img">
              <a href="{$posdata['90']['4']['url']}" target="_blank"><img src="{$posdata['90']['4']['picture']['0']}"></a> 
            </div>
              <div class="img">
              <a href="{$posdata['90']['5']['url']}" target="_blank"><img src="{$posdata['90']['5']['picture']['0']}"></a> 
            </div>
            </div>
            <div class="dd">
              <div class="img">
              <a href="{$posdata['90']['6']['url']}" target="_blank"><img src="{$posdata['90']['6']['picture']['0']}"></a> 
            </div>
            </div>
        </dd>
    </dl>
</div>

<ul class="furrec container" hidden>
 <volist name="posdata['123']" id="vo"  key="k">
  <li>
      <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
        <div class="txt">
          <p>{$vo.data.price}</p>
            ¥{$vo.data.min_price}
            <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}">马上购买</a>
        </div>
    </li>
    </volist>
</ul>
<div class="jsaddimgbox" data-jsaddimg="png" data-jsaddimgname="{$config_siteurl}statics/zt/images/furniture/furproducthead">
    <!-- 1F -->
    <div class="furproduct furproductf" id="F2">
      <div class="head">
          <div class="txt"><strong>1F</strong><span>客厅/ 餐厅家具</span>Sitting room furniture</div>
        </div>
        <div class="nav chtitul" data-tag="navtab1">
          <div class="tit">请根据实际尺寸<br>挑选合适的家具</div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg1.png">
            <div class="class">
                <div class="main main5">
                  <div class="line"></div>
                    <div class="box chtitli on">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        沙发
                    </div>
                    
<!--                     <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        桌子
                    </div> -->
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        茶几
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        电视柜
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        餐桌
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        功能柜
                    </div>
                </div>
            </div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg2.png">
          <a href="{:U('Content/Search/search',array('searchkey'=>'客厅家具%20餐厅家具'))}" class="tit">MORE<br>更多商品 》</a>
        </div>
        <div class="ulbox chconul" data-tag="navtab1">
            <ul class="on product chconli scrollimgbox">
            <!-- 沙发 -->
             <volist name="posdata['93']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo['picture']['0']}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" ></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" >
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 茶几 -->
               <volist name="posdata['95']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 电视柜 -->
              <volist name="posdata['92']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 餐桌 -->
              <volist name="posdata['96']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 功能柜 -->
              <volist name="posdata['97']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
<!--             <ul class="product chconli">
              <volist name="posdata['97']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul> -->
        </div>
    </div>
    <div class="furproduct furproductf" id="F3">
      <div class="head">
          <div class="txt"><strong>2F</strong><span>卧室家具</span>Bedroom furniture</div>
        </div>
        <div class="nav chtitul" data-tag="navtab2">
          <div class="tit">请根据实际尺寸<br>挑选合适的家具</div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg1.png">
            <div class="class">
                <div class="main">
                  <div class="line"></div>
                    <div class="box chtitli on">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        床
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        床垫
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        床头柜
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        衣柜
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        五斗柜
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        梳妆台
                    </div>
                </div>
            </div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg2.png">
          <a href="{:U('Content/Search/search',array('searchkey'=>'卧室家具'))}" class="tit">MORE<br>更多商品 》</a>
        </div>
        <div class="ulbox chconul" data-tag="navtab2">
            <ul class="on product chconli scrollimgbox">
            <!-- 床 -->
             <volist name="posdata['98']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 床垫 -->
               <volist name="posdata['103']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 床头柜 -->
              <volist name="posdata['100']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 衣柜 -->
              <volist name="posdata['99']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 五斗柜 -->
              <volist name="posdata['101']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
            <!-- 梳妆台 -->
              <volist name="posdata['102']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
        </div>
    </div>
    <div class="furproduct furproductf" id="F4">
      <div class="head">
          <div class="txt"><strong>3F</strong><span>书房家具</span>Bedroom furniture</div>
        </div>
        <div class="nav chtitul" data-tag="navtab3">
          <div class="tit">请根据实际尺寸<br>挑选合适的家具</div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg1.png">
            <div class="class">
                <div class="main main5">
                  <div class="line"></div>
                    <div class="box chtitli on">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        书台
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        书椅
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        书柜
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        懒人沙发
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        台灯
                      
                    </div>
                </div>
            </div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg2.png">
          <a href="{:U('Content/Search/search',array('searchkey'=>'书房家具'))}" class="tit">MORE<br>更多商品 》</a>
        </div>
        <div class="ulbox chconul" data-tag="navtab3">
            <ul class="on product chconli scrollimgbox">
             <volist name="posdata['105']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
               <volist name="posdata['106']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['104']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>            
            <ul class="product chconli">
              <volist name="posdata['108']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['107']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
        </div>
    </div>
    <div class="furproduct furproductf" id="F5">
      <div class="head">
          <div class="txt"><strong>4F</strong><span>儿童家具</span>Children furniture</div>
        </div>
        <div class="nav chtitul" data-tag="navtab4">
          <div class="tit">请根据实际尺寸<br>挑选合适的家具</div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg1.png">
            <div class="class">
                <div class="main main5">
                  <div class="line"></div>
                    <div class="box chtitli on">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        儿童床
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        书桌
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        书柜
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        衣柜
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        玩家玩具
                    </div>
                </div>
            </div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg2.png">
          <a href="{:U('Content/Search/search',array('searchkey'=>'儿童家具'))}" class="tit">MORE<br>更多商品 》</a>
        </div>
        <div class="ulbox chconul" data-tag="navtab4">
            <ul class="on product chconli scrollimgbox">
              <volist name="posdata['111']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
             <volist name="posdata['109']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
               <volist name="posdata['110']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['112']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['113']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
        </div>
    </div>
    <div class="furproduct furproductf" id="F6">
      <div class="head">
          <div class="txt"><strong>5F</strong><span>家纺</span>Home textile</div>
        </div>
        <div class="nav chtitul" data-tag="navtab5">
          <div class="tit">请根据实际尺寸<br>挑选合适的家具</div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg1.png">
            <div class="class">
                <div class="main main5">
                  <div class="line"></div>
                    <div class="box chtitli on">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        床上用品
                    </div>
                    <div class="box  bak">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        客厅布艺
                    </div>
                    <div class="box  bak">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        地毯
                    </div>
                    <div class="box  bak">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        毛毯
                    </div>
                     <div class="box  bak">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        其他
                    </div>
                </div>
            </div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg2.png">
          <a href="{:U('Content/Search/search',array('searchkey'=>'家纺'))}" class="tit">MORE<br>更多商品 》</a>
        </div>
           <div class="ulbox chconul" data-tag="navtab5">
            <ul class="on product chconli scrollimgbox">
             <volist name="posdata['114']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
               <volist name="posdata['115']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['116']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['117']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['203']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
        </div>
    </div>
    <!-- 6F -->
    <div class="furproduct furproductf" id="F7">
      <div class="head">
          <div class="txt"><strong>6F</strong><span>家饰</span>Home decoration</div>
        </div>
        <div class="nav chtitul" data-tag="navtab6">
          <div class="tit">请根据实际尺寸<br>挑选合适的家具</div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg1.png">
            <div class="class">
                <div class="main main5">
                  <div class="line"></div>
                    <div class="box on chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        画框
                    </div>
                    <div class="box chtitli">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        摆件
                    </div>
                    <div class="box bak">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        花瓶
                    </div>
                    <div class="box bak">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        绿植
                    </div>
                    <div class="box bak">
                      <img class="jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11.png">
                      <img class="imgred jsaddimgli" src="{$config_siteurl}statics/zt/images/mmatproductbox11red.png"><em></em>
                        钟表
                    </div>
                </div>
            </div>
            <img class="tipimg" src="{$config_siteurl}statics/zt/images/furniture/furproducttipimg2.png">
          <a href="{:U('Content/Search/search',array('searchkey'=>'家饰'))}" class="tit">MORE<br>更多商品 》</a>
        </div>
        <div class="ulbox chconul" data-tag="navtab6">
            
            <ul class="on product chconli scrollimgbox">
              <volist name="posdata['121']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product chconli">
              <volist name="posdata['122']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <!-- <ul class="product">
             <volist name="posdata['118']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product">
               <volist name="posdata['119']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul>
            <ul class="product">
              <volist name="posdata['120']" id="vo"  key="k">
             <if condition='$k == 1'>
             <li>
                  <a href="{$vo.url}" target="_blank"><img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg=="></a>
                </li>     
             <else/>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" target="_blank">
                    <img data-ourl="{$vo.picture.0}" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">
                    <p>{$vo.title}</p>
                    <span>¥{$vo.data.min_price}</span>
                    <span class="buy">立即购买</span>
                </a></li>     
              </if>
              </volist>
            </ul> -->
        </div>
        <!-- <div class="">
          <a href="{$posdata['233']['1']['url']}" target="_blank"><img src="{$posdata['233']['1']['picture']['0']}" /></a>
        </div> -->
    </div>
    
</div>
<br><br>
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>

<!--固定图标-->
    <!--固定高度-->
 <!--  <div class="navmsg_con">
      \
      <div class="navmsg_con1">
      <div class="navmsg_con2">

      <a href="#F1">折扣活动</a> <b></b>     
      <a href="#F2">客厅家具</a> <b></b>
      <a href="#F3">卧室家具</a> <b></b>
      <a href="#F4">书房家具</a> <b></b>
      <a href="#F5">儿童家具</a> <b></b>
      <a href="#F6">家纺家具</a> <b></b>
      <a href="#F7">家饰家具</a> <b></b>
      <div class="fixlt_nav_updown"><img src="{$config_siteurl}statics/zt/images/navmsg_01.png" /></div>
      <div class="fixlt_nav_updown"><img src="{$config_siteurl}statics/zt/images/navmsg_02.png" /></div>
      </div>
      </div>
   </div>  -->

<script>
    /*轮播*/
    var bgcolorsjon = {"color1":"<?php echo empty($posdata['169'][1]['description'])?'111216':$posdata['169'][1]['description']; ?>","color2":"<?php echo empty($posdata['169'][2]['description'])?'0a0605':$posdata['169'][2]['description']; ?>","color3":"<?php echo empty($posdata['169'][3]['description'])?'eff0f2':$posdata['169'][3]['description']; ?>","color4":"<?php echo empty($posdata['169'][4]['description'])?'b7fbfe':$posdata['169'][4]['description']; ?>","color5":"<?php echo empty($posdata['169'][5]['description'])?'dbf4fb':$posdata['169'][5]['description']; ?>b","color6":"<?php echo empty($posdata['169'][6]['description'])?'d5d5d6':$posdata['169'][6]['description']; ?>"}

    //var bgcolorsjon = {"color1":"111216","color2":"0a0605","color3":"eff0f2","color4":"1fbffe","color5":"fffdf1","color6":"ffffff","color7":"c8000b","color8":"f2b328","color9":"ffcc01"}
    $(".turntabli").each(function(i,v){
        var name = "color"+(i+1);
        $(this).attr("data-color",bgcolorsjon[name]);
    })
    $(".furproduct .nav  .chtitli").click(function(){

        var index= $(this).parents(".chtitul").find(".chtitli").index(this);
        var tag= $(this).parents(".chtitul").attr("data-tag");
        var $imgs  = $(".chconul[data-tag='"+tag+"'] .chconli").eq(index).find("img");
        $.each($imgs,function(i,v){
            $(v).attr("src",$(v).attr("data-ourl"));
        })
    })

</script>
</body>
</html>