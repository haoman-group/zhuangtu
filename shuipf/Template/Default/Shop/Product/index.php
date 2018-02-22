<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>{$shopInfo.name}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/templates.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/ztshop.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/shopskin/<notempty name="page[setting][color]">{$page[setting][color]}<else/>dark</notempty>.css" >
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ecplaypreview.css" >
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/design.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="common/_shopHeader.php"/>
<!--导航-->
<template file="Shop/_nav.php"/>
<!--选择分类-->
<div class="searcon" >
    <div class="searcon_in container">
<!--        <div class="ser_intop">-->
<!--            <dl class="litop">-->
<!--                <dt class="classtop"><strong>全部>{$catepath}</strong></dt>-->
<!--                <dd>-->
<!--                    <form class="search">-->
<!--                        <input  type="text"  class="search1" placeholder="在当前结果中搜索">-->
<!--                        <input type="image" class="search2 right" src="{$config_siteurl}statics/zt/images/search.png">-->
<!--                    </form>-->
<!--                </dd>-->
<!--                <span class="rescount">共 2582 个商品 </span>-->
<!--            </dl>-->
<!--        </div>-->
<!---->
<!--        <ul class="shopcateprots shopcateprots-main">-->
<!--            <li>-->
<!--                <div class="parask">-->
<!--                    屏幕尺寸-->
<!--                </div>-->
<!--                <div class="parasv">-->
<!--                    <div class="adiv">-->
<!--                        <a href="">52-55英寸</a>-->
<!--                        <a href="">49-52英寸</a>-->
<!--                        <a href="">48-52英寸</a>-->
<!--                    </div>-->
<!---->
<!--                    <div class="btnoptions">-->
<!--                        <a href="" class="muti"><i>+</i>多选</a>-->
<!--                        <a href="" class="amore">更多<i></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->
<!--        <ul class="shopcateprots shopcateprots-else">-->
<!--            <li>-->
<!--                <div class="parask">-->
<!--                    屏幕尺寸-->
<!--                </div>-->
<!--                <div class="parasv">-->
<!--                    <div class="adiv">-->
<!--                        <a href="">52-55英寸</a>-->
<!--                        <a href="">49-52英寸</a>-->
<!--                        <a href="">48-52英寸</a>-->
<!--                    </div>-->
<!---->
<!--                    <div class="btnoptions">-->
<!--                        <a href="" class="muti"><i>+</i>多选</a>-->
<!--                        <a href="" class="amore">更多<i></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li>-->
<!--                <div class="parask">-->
<!--                    屏幕尺寸-->
<!--                </div>-->
<!--                <div class="parasv">-->
<!--                    <div class="adiv">-->
<!--                        <a href="">52-55英寸</a>-->
<!--                        <a href="">49-52英寸</a>-->
<!--                        <a href="">48-52英寸</a>-->
<!--                    </div>-->
<!---->
<!--                    <div class="btnoptions">-->
<!--                        <a href="" class="muti"><i>+</i>多选</a>-->
<!--                        <a href="" class="amore">更多<i></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--        </ul>-->



<!--        <div class="fenlei">-->
<!--            <div class="licon ocond">-->
<!--                <dl >-->
<!--                    <dt class="classdt">-->
<!--                        所有分类-->
<!--                    </dt>-->
<!--                    <dd>-->
<!--                        <div class="casea">-->
<!--                            <a href="">同城设计</a>-->
<!--                            <a href="">风格案例</a>-->
<!--                            <a href="">户型案例</a>-->
<!--                            <a hreef="">同城设计</a>-->
<!--                            <a href="">未设计先体验</a>-->
<!--                        </div>-->
<!--                        <div class="divmore">-->
<!--                            <span class="multiselect">多选 +</span>-->
<!--                            <span class="more1">更多<img src='/statics/zt/images/searchresult/down.png' /></span>-->
<!---->
<!--                        </div>-->
<!--                    </dd>-->
<!--                </dl>-->
<!--            </div>-->
<!--            <div class="moldcon">-->
<!--                <ul class="mould">-->
<!--                    <li class="typeli">-->
<!--                        <dl >-->
<!--                            <dt class="">-->
<!--                                服务类型-->
<!--                            </dt>-->
<!--                            <dd>-->
<!--                                <a href="">住宅装修设计</a>-->
<!--                                <a href="">商业空间设计</a>-->
<!--                            </dd>-->
<!--                        </dl>-->
<!---->
<!--                    </li>-->
<!--                    <li class="typeli">-->
<!--                        <dl >-->
<!--                            <dt class="">-->
<!--                                房屋类型-->
<!--                            </dt>-->
<!--                            <dd>-->
<!--                                <a href="">公寓</a>-->
<!--                                <a href="">联排</a>-->
<!--                                <a href="">别墅</a>-->
<!--                                <a href="">复式</a>-->
<!--                                <a href="">办公</a>-->
<!--                                <a href="">商业</a>-->
<!--                                <a href="">一居室</a>-->
<!--                                <a href="">四居室</a>-->
<!--                                <a href="">独栋</a>-->
<!--                            </dd>-->
<!--                        </dl>-->
<!---->
<!--                    </li>-->
<!--                    <li class="typeli">-->
<!--                        <dl >-->
<!--                            <dt class="">-->
<!--                                风格-->
<!--                            </dt>-->
<!--                            <dd>-->
<!--                                <a href="">现代</a>-->
<!--                                <a href="">地中海</a>-->
<!--                                <a href="">简约</a>-->
<!--                                <a href="">美式</a>-->
<!--                                <a href="">泰式</a>-->
<!--                                <a href="">混搭</a>-->
<!--                                <a href="">一居室</a>-->
<!--                                <a href="">四居室</a>-->
<!--                                <a href="">独栋</a>-->
<!--                            </dd>-->
<!--                        </dl>-->
<!---->
<!--                    </li>-->
<!--                </ul>-->
<!--                <a href="#" class="morebottom prodme">更多选项&nbsp;&nbsp;<img src='/statics/zt/images/searchresult/down.png' /></a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</div>

<div class="searchshop_classbox searchshop_class">

    <div class="line">
        <ul>
           
            <li><a href="{:U('Shop/Product/navsearch', array_merge($_REQUEST, array('order' => 'rank')))}">综合</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_up.png"> --></li>
            <li ><a href="{:U('Shop/Product/navsearch', array_merge($_REQUEST, array('order' => 'count_collected')))}">人气</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_down.png"> --></li>
            <li><a href="{:U('Shop/Product/navsearch', array_merge($_REQUEST, array('order' => 'addtime')))}">新品</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_down.png"> --></li>
            <li><a href="{:U('Shop/Product/navsearch', array_merge($_REQUEST, array('order' => 'count_sold')))}">销量</a><!-- <img src="{$config_siteurl}statics/zt/images/arrow_down.png"> --></li>
            <li><a href="{:U('Shop/Product/navsearch', array_merge($_REQUEST, array('order' => 'min_price')))}">价格</a>
                 <!--<img src="{$config_siteurl}statics/zt/images/arrow_down.png">-->
             </li>
         
            <li>
                <form action="{:U('Shop/Product/datasearch')}" method="post">
                     <input type="text" value="{$shopInfo['id']}" style="display:none" name="shopid">
                    <input type="text" name="min" placeholder="¥" value="">-
                    <input type="text"  name="max" placeholder="¥" value="">
                    <input class="sure" type="submit" value="确定">
                </form>
            </li>
               
        </ul>   
        <div class="page">
            <a href=""><</a><span class="on">1</span>/<span>100</span><a href="">></a>

        </div>
        <div class="list">
            <span><!-- <img src="{$config_siteurl}statics/zt/images/listicon_big.png"> -->大图</span>
            <span><!-- <img src="{$config_siteurl}statics/zt/images/listicon_list.png"> -->小图</span>
        </div>
    </div>
    <div class="produce_ul">
    <volist name="productList" id="vo">
      <div class="produce_li">
          <div class="proin">
          <a href="/Shop/Product/show/id/{$vo.id}" class="proina" target="_blank"><img src="{$vo.headpic}"></a>
            <ul class="img">
              <?php $pics = explode(",",$vo['picture']);
              for($i = 0 ; $i<3;$i++) {
                if(!empty($pics[$i])){
                  echo "<li><img src='".$pics[$i]."'></li>";
                }
              }
              ?>
              <!-- <li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li>
              <li><img src="{$config_siteurl}statics/zt/images/searchshop_produceimg.png"></li> -->
            </ul>
            <ul class="explain">
               
                <li><span class="textr"><i>{$vo.count_comment}</i>条评论</span><span class="money">￥{$vo.min_price}</span></li>
                <li><a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}" target="_blank">{$vo.title}</a></li>
                <li class="brand">{$vo.sell_points}</li>
                <li><span class="textr">月成交：<i>{$vo.count_sold}</i>笔</span><!-- 新锐设计师 --></li>
            </ul>
          </div>
        </div>
        </volist>

    </div>
     <div class="pagebox">
      {$pageinfo.page}
    </div>
</div>  

<!--保证栏-->
<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>


</body>
<script>
    $(function(){
        var onoff = true;
        $('.more1').click(function(){
            if(onoff){
                $('.ocond').animate({height:"100%"});
                $(this).html("收起&nbsp;&nbsp;<img src='/statics/zt/images/searchresult/down.png' />");
            }else{
                $('.ocond').animate({height:"40px"});
                $(this).html("更多&nbsp;&nbsp;<img src='/statics/zt/images/searchresult/up.png' />");
            }
            onoff = !onoff;
        });

        $('.prodme').click(function(){
            if(onoff){
                $('.mould').animate({height:"100%"});
                $(this).html("收起&nbsp;&nbsp;<img src='/statics/zt/images/searchresult/up.png' />");
            }else{
                $('.mould').animate({height:"50px"});
                $(this).html("更多&nbsp;&nbsp;<img src='/statics/zt/images/searchresult/down.png' />");
            }
            onoff = !onoff;
        });
    })
</script>
</html>