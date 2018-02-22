<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情页</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm-extend.min.css">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/appindex.css" >
</head>
<body>

<div class="page-group">
    <div class="page page-current pageproshow" id="prodshow" data-proid="{:I('id')}" >
        <div class="shownav_t">
            <div class="buttons-tab bibi">
                <a class="category back"></a>
                <a class="tab-link active" href="#tab_pro">商品</a>
                <a class="tab-link" href="#tab_decs">详情</a>
                <a class="tab-link" href="#tab_comment">评价</a>
<!--                <a class="tab-link" href="#tab_living">直播间</a>-->
                <a class="needlogin openpop" data-popup=".popup-dh"></a>
            </div>
        </div>
        <div class="cart-concern-btm-fixed five-column four-column" >
            <div class="concern-cart">
                <a href="/wap/index/" class="cart-car-icn dong-dong-icn">
                    <em class="btm-act-icn emicn"></em>
                    <span class="focus-info">首页</span>
                </a>
                <a   class="cart-car-icn  cust-car-icn btnservice">
                    <em class="btm-act-icn"></em>
                    <span class="focus-info">联系客服</span>
                </a>
                <a class="cart-car-icn toshop">
                    <em class="btm-act-icn"></em>
                    <span class="focus-info">店铺</span>
                </a>
            </div>
            <div class="action-list">
                <a class="yellow-color btnbuy needlogin"> 加入购物车 </a>
                <a class="red-color btnbuy needlogin">立即购买</a>
                <a class="yellow-color " style="display: none;">查看相似</a>
                <a class="red-color">到货通知</a>
            </div>
        </div>

        <div class="content  infinite-scroll proshowcontent infinite-scroll-bottom">
            <div class="tabs">
                <div class="tab active " id="tab_pro">
                    <!-- Slider -->
                    <div class="swiper-container swiperztcom" data-space-between='10'>
                        <div class="swiper-shade"></div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                            <a href="#"><img src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" alt=""></a>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-page"></div>
                    </div>

                    <div class="prod_title">
                        <div class="prod_titlein">
                            <div class="title_text">
                                <h4>联邦家具 简约现代北欧实木餐桌 户型可伸缩原木组装餐桌</h4>
                                <div class="share">
                                    <a href="#" class="share_bot">分享</a>
                                    <a class="collectionprod textcoll needlogin">收藏</a>
                                </div>
                            </div>
                            <div class="jiage">
                                <div class="zt_price">
                                    <strong><i>￥</i>1099</strong>
                                    <span class="tip">五一特惠</span>
                                </div>
                                <div class="storeprice">门店价：<del>￥7199</del></div>
                            </div>
                        </div>
                        <div class="showserves">
                            <div class="serve">
                                <a href="" class="promisea1"><img src="/statics/wap/images/show/serve-1.png">正品保障</a>
                                <a href="" class="promisea2"><img src="/statics/wap/images/show/serve-2.png">免费维修</a>
                                <a href="" class="promisea3"><img src="/statics/wap/images/show/serve-3.png">破损全包</a>
                                <a href="" class="promisea4"><img src="/statics/wap/images/show/serve-4.png">及时安装</a>
                            </div>

                            <ul class="pingjia">
                                <li>评价：<span>5</span>个</li>
                                <li>月销量：<span>100</span>个</li>
                                <li>装途点赞：<span>5</span>个</li>
                            </ul>
                        </div>

                    </div>
                    <div class="fenlei open-popup color_cification" data-popup=".pop-proparamsel">
                        <span class="promotion_left ">请选择  颜色分类</span>
                        <span class="icon icon-right"></span>
                    </div>
                    <div class="fenlei fenleinobor open-popup " data-popup=".pop-proparams">
                        <div class="color_cification">
                            <span class="promotion_left">产品参数</span>
                            <span class="icon icon-right"></span>
                        </div>
                    </div>

                    <div class="shopinshow">

                        <a class="toshop shoplogo" class=""><img src="/statics/wap/images/show/pagination.jpg" ></a>

                        <div class="nameout">
                            <a class="toshop name">装途旗舰店</a>
                            <div class="marks">
                                <span class="renzheng ">装途实体店认证</span>
                                <span class="shopage">线下<em class="shopageem">6</em>年店</span>
                            </div>
                        </div>
                        <div class="btns">
                            <a class="toshop">进店逛逛</a>
                            <a class="favshop needlogin bookmark">收藏店铺</a>
                        </div>

                        <div class="final">
                            <span>0351-7535035</span>
                            <span>居然之家春天店一层</span>
                        </div>
                    </div>


<!--                    <div class="shop_part">-->
<!--                        <dl class="shop_name">-->
<!--                            <dt><img src="/statics/wap/images/show/logoname.jpg"></dt>-->
<!--                            <dd>-->
<!--                                <p>联邦家居装途旗舰店</p>-->
<!--                                <div class="identification">-->
<!--                                    <span class="renzheng "><img src="/statics/wap/images/show/identificationicon.png">装途实体店认证</span>-->
<!--                                    <span class="shopage"><i>12</i>线下12年店</span>-->
<!--                                </div>-->
<!--                            </dd>-->
<!--                        </dl>-->
<!--                        <div class="shop-tab">-->
<!--                            <span class="tabs">-->
<!--                                <div class="xianshang"><span>线上</span> 10 | 高</div>-->
<!--                                <div class="num">888</div>-->
<!--                                <div class="text">关注人数</div>-->
<!--                                <div class="vertical-line"></div>-->
<!--                            </span>-->
<!--                            <span class="tabs">-->
<!--                                <div class="xianshang"><span>线下</span> 10 | 高</div>-->
<!--                                <div class="num">162</div>-->
<!--                                <div class="text">全部商品</div>-->
<!--                                <div class="vertical-line"></div>-->
<!--                            </span>-->
<!--                            <span class="tabs">-->
<!--                                <div class="xianshang"><span>综合</span> 10 | 高</div>-->
<!--                                <div class="num">62</div>-->
<!--                                <div class="text">店铺动态</div>-->
<!--                            </span>-->
<!--                        </div>-->
<!--                        <div class="storecollection">-->
<!--                            <a  class="stgugu toshop"><img src="/statics/wap/images/show/Stroll.png" />进店逛逛</a>-->
<!--                            <a href="#" class="collectshop"><img src="/statics/wap/images/show/collect.png" />收藏店铺</a>-->
<!--                        </div>-->
<!--                        <div class="final">-->
<!--                            <span>居然之家春天店一层</span>-->
<!--                            <span>电话：7535035</span>-->
<!--                        </div>-->
<!--                    </div>-->


                </div>

                <div class="tab" id="tab_decs">
                    <div class="prodescbox">

                    </div>
                </div>

                <div class="tab" id="tab_comment">
                    <ul class="appraise">
                        <li class="on">
                            <span>全部评价</span>
                            <span class="num numall">0</span>
                        </li>
                        <li>
                            <span>追加</span>
                            <span class="num numadd">0</span>
                        </li>
                        <li>
                            <span>晒图</span>
                            <span class="num numpic">0</span>
                        </li>
                    </ul>
                    <div class="allevalcon">
                        <ul class="allevaltmp">
                            <li>
                                <div class="prod_appraise">
                                    <div class="appraiselist">
                                        <div class="userinfo">
                                            <div class="allstar_l"><div class="star" style="width:80%"></div></div>
                                            <div class="allstar_r"><span class="username">优雅**男子</span><img src="/statics/wap/images/show/no_identificationicon.png"><span class="times">2016-03-16</span></div>
                                        </div>
                                        <div class="evalcon">床垫收到了，质量很好，客服态度也特别好，响应很及时。送的床笠质量也很好。一次满意的购物。感谢017和003的热情服务。</div>
                                        <ul class="pics">
                                            <li><img src="/statics/wap/images/show/pagination.jpg"></li>
                                        </ul>
                                    </div>
                                    <div class="sku">
                                        <p class="pay-date">颜色分类：标准001</p>
                                        <p class="product-type">规格：900mm*1900mm</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="allevaluation ">

                        </ul>


                    </div>
                </div>

                <div class="tab" id="tab_living">
                    zhibojian
                </div>
            </div>




        </div>

    </div>


    <div class="popup norpopup pop-proparamsel" id="pop-proparamsel">
        <div class="mui-cover show" id="s-decision-wrapper" >
            <div class="body" style="overflow: hidden;">
                <div class="sku-control">
                    <dl class="dlprot"></dl>
                </div>
                <div class="pickup-control" style="display:block"></div>

                <div class="number">
                    <h2>
                        购买数量
                    </h2>
                    <div class="number-control">
                        <div class="mui-number btnopbuynum">
                            <input type="button" class="decrease" value="-">
                            <input type="number" class="num buynum" value="1" min="1" max="99999" step="" name="quantity">
                            <input type="button" class="add increase" value="+">
                        </div>
                    </div>
                </div>
            </div>
            <div class="summary">
                <div class="img">
                    <img src="/statics/wap/images/show/pagination3.jpg">
                </div>
                <div class="main">
                    <div class="priceContainer">
                        <span class="price">￥2780.00</span>
                    </div>
                    <div class="stock-control">
                        <span class="stockout">库存<label class="stock">662</label>件</span>
                        <!--                        <span class="limitTip">（每人限购10件）</span>-->
                    </div>
                    <div class="sku-dtips">
                        已选择:
                        <span class="seledtxt"></span>
                    </div>
                </div><a class="sback close-popup">x</a>
            </div>
            <div class="option mui-flex">
                <button class="cart cell needlogin" style="">加入购物车</button> <button class="buy cell needlogin btnbuynow">立即购买</button>
            </div>
        </div>
    </div>

    <div class="popup norpopup pop-proparams pop-proshow " id="pop-proparams">
        <span class="icon icon-down close-popup"></span>
        <div class="parameterscon">
            <ul>

            </ul>
        </div>
    </div>

</div>

<template file="Wap/common/_public.php"/>



</body>
</html>