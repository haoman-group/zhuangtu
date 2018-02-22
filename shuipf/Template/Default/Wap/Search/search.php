<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>搜索-装途网</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{$config_siteurl}statics/wap/images/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/appindex.css" >
</head>
<body>
<div class="page-group pg-search">
    <div id="pagesearch" class="page" data-key="{:I('searchkey')}" data-catid="{:I('shop_catid')}">
      <form action="">
        <div class="bar bar-header-secondary bar-search">
            <div class="searchbar">
                <a href="#" class="icon icon-left back"></a>
                <div class="search-inputs">
                    <label for="search" class="icon icon-search"></label>
                    <input type="search" id="inpsearchall" placeholder="输入关键词" name="searchkey" value="{:I('searchkey')}" />
                </div>
                <a href="" class="searchbar-cancel">筛选</a>
            </div>
        </div>
      </form>

        <div class="content content-search infinite-scroll infinite-scroll-bottom" data-distance="100">
            <!-- <div class="buttons-tab">
                <a href="" class="tab-link active button">综合</a>
                <a href="" class="tab-link button">销量</a>
                <a href="" class="tab-link button">价格</a>
                <a href="" class="tab-link button">店铺</a>
                <a href="" class="tab-link button"><img src="{$config_siteurl}statics/wap/images/search/icon.png" alt=""></a>
            </div> -->
          <div class="list-block list-block-search">
            <div class="row row-search list-container">
                <!-- <div class="col-50">
                    <div class="col-li">
                        <img src="{$config_siteurl}statics/wap/images/search/show.png" alt="意风家具" />
                        <p class="description">意风家具 现代时尚 布艺沙发...</p>
                        <p class="price">￥<strong>3999.00</strong></p>
                        <p class="address clearfix"><span>意风家具装途店</span><span>好评<i>100%</i></span></p>
                    </div>
                </div>
                <div class="col-50">
                    <div class="col-li">
                        <img src="{$config_siteurl}statics/wap/images/search/show.png" alt="意风家具" />
                        <p class="description">意风家具 现代时尚 布艺沙发...</p>
                        <p class="price">￥<strong>3999.00</strong></p>
                        <p class="address clearfix"><span>意风家具装途店</span><span>好评<i>100%</i></span></p>
                    </div>
                </div>
                 <div class="col-50">
                    <div class="col-li">
                        <img src="{$config_siteurl}statics/wap/images/search/show.png" alt="意风家具" />
                        <p class="description">意风家具 现代时尚 布艺沙发...</p>
                        <p class="price">￥<strong>3999.00</strong></p>
                        <p class="address clearfix"><span>意风家具装途店</span><span>好评<i>100%</i></span></p>
                    </div>
                </div>
                <div class="col-50">
                    <div class="col-li">
                        <img src="{$config_siteurl}statics/wap/images/search/show.png" alt="意风家具" />
                        <p class="description">意风家具 现代时尚 布艺沙发...</p>
                        <p class="price">￥<strong>3999.00</strong></p>
                        <p class="address clearfix"><span>意风家具装途店</span><span>好评<i>100%</i></span></p>
                    </div>
                </div>
                <div class="col-50">
                    <div class="col-li">
                        <img src="{$config_siteurl}statics/wap/images/search/show.png" alt="意风家具" />
                        <p class="description">意风家具 现代时尚 布艺沙发...</p>
                        <p class="price">￥<strong>3999.00</strong></p>
                        <p class="address clearfix"><span>意风家具装途店</span><span>好评<i>100%</i></span></p>
                    </div>
                </div>
               <div class="col-50">
                    <div class="col-li">
                        <img src="{$config_siteurl}statics/wap/images/search/show.png" alt="意风家具" />
                        <p class="description">意风家具 现代时尚 布艺沙发...</p>
                        <p class="price">￥<strong>3999.00</strong></p>
                        <p class="address clearfix"><span>意风家具装途店</span><span>好评<i>100%</i></span></p>
                    </div>
                </div>  -->
            </div>
        </div>
        <div class="infinite-scroll-preloader">
            <div class="preloader"></div>
        </div>
     </div>
    </div>
</div>
<template file="Wap/common/_public.php"/>




</body>
</html>