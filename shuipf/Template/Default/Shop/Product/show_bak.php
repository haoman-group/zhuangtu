<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>{$data.title}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/templates.css" type="text/css"/>
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
<template file="common/_top.php"/>
<!--导航-->
<template file="Shop/_nav.php"/>
<!--保护容器-->
     <div class="container main" style="padding-top:20px;">



         
          <!--左部-->
          <div class="designbuy_left">
               <div class="designbuy_img">
                    <div class="designbuy_show">
                         <img src="{$data.headpic}" />
                    </div>
                    <div class="designbuy_exhibition">
                         <volist name='data.picture' id='vo'>
                         <div class="designbuy_eximg">
                              <img src="{$vo}" />
                         </div>
                         </volist>
                         <!--<div class="designbuy_eximg">-->
                         <!--     <img src="{$config_siteurl}statics/zt/images/design_buy_main_leftcon121img2.jpg" />-->
                         <!--</div>-->
                         <!--<div class="designbuy_eximg">-->
                         <!--     <img src="{$config_siteurl}statics/zt/images/design_buy_main_leftcon121img3.jpg" />-->
                         <!--</div>-->
                         <!--<div class="designbuy_eximg">-->
                         <!--     <img src="{$config_siteurl}statics/zt/images/design_buy_main_leftcon121img4.jpg" />-->
                         <!--</div>-->
                         <!--<div class="designbuy_eximg">-->
                         <!--     <img src="{$config_siteurl}statics/zt/images/design_buy_main_leftcon121img5.jpg" />-->
                         <!--</div>-->
                    </div>
                    <div class="designbuy_operate">
                         <a href=""><b><img src="{$config_siteurl}statics/zt/images/public_praise.png" /> 12</b></a>
                         <a href=""><b><img src="{$config_siteurl}statics/zt/images/public_collect .png" /> 收藏夹</b></a>
                         <a href=""><strong>举报</strong></a>
                    </div>
               </div>
               <div class="designbuy_instruction">
                    <h1>{$data.title}</h1>
                    <p>{$data.sell_points}</p>
                    <div class="designbuy_price">
                         <p><b>促销价</b> <strong>￥{$data.min_price}<if condition="$data['min_price'] lt $data['max_price']"> - {$data.max_price}</if></strong></p>
                         <p><b>价格</b><s>￥{$data.min_price}<if condition="$data['min_price'] lt $data['max_price']"> - {$data.max_price}</if></s></p> 
                    </div>
                    <div class="designbuy_dataline">
                    <b>月销量 <strong>0</strong></b><i></i>
                    <b>累计评价 <strong>0</strong></b><i></i>
                    <b>送装途积分 <strong>22</strong></b>
                    </div>
                    <div class="designbuy_datadetail">
                         <div class="designbuy_datatitle" id="colors" hidden><b>颜色</b>
                            <div class="designbuy_dataunit">
                             </div>
                         </div>
                         <div class="designbuy_datatitle" id="size" hidden><b>分类</b>
                            <div class="designbuy_dataunit">
                             </div>
                         </div>
                         <div class="designbuy_datatitle" id="num"><b>数量</b>    
                            <div class="designbuy_dataunit"> 
                                 <strong><input class="product_num" value="1"></strong>

                                 <div class="designbuy_datanumberbox">
                                      <div class="designbuy_datanumber"><img src="{$config_siteurl}statics/zt/images/up1.png" /></div>
                                      <div class="designbuy_datanumber"><img src="{$config_siteurl}statics/zt/images/down1.png" /></div> 
                                 </div><b>件</b> <b>库存{$data.number}件</b>
                            </div>
                         </div> 
                    </div>
                    <div class="designbuy_button">
                         <a class="designbuy_buttona">
                              立即购买
                         </a>
                         <a class="designbuy_buttonb" href="{:U('/Buyer/ShopCart/add',array('id'=>$_GET['id'],'count'=>1,cate=>1))}">
                              加入购物车
                         </a>
                    </div>
                    <div class="designbuy_servebox">
                         <div class="designbuy_serve">
                              服务承诺
                              <ul>
                                  <li><a href="">按时发货</a></li>
                                  <li><a href="">安心退货</a></li>
                                  <li><a href="">极速退货</a></li>
                                  <li><a href="">退货保障卡</a></li>
                                  <li><a href="">七天无理由退换</a></li>
                              </ul>
                         </div>
                         <div class="designbuy_servepay">
                              支付方式
                         </div>
                    </div>
               </div>
               <div class="designbuy_product">
                    <div class="searchshop_classleft searchshop_choose"> 
                        <div class="ul class">
                            <h5>所有分类</h5>
                            <div class="li">
                                <h6><i>+</i>查看所有宝贝</h6>
                                <a href="">按销量</a>
                                <a href="">按收藏</a>
                                <a href="">按价格</a>
                            </div>
                            <div class="li">
                                <h6><i>+</i>田园风</h6>
                                <a href="">按销量</a>
                                <a href="">按收藏</a>
                                <a href="">按价格</a>
                                <a href="">按销量</a>
                                <a href="">按收藏</a>
                                <a href="">按价格</a>
                            </div>
                            <div class="li">
                                <h6><i>+</i>田园风</h6>
                            </div>
                        </div>
                        <div class="ul produce">
                            <h5>宝贝排行榜</h5>
                            <div class="li">
                                <p class="btn">
                                    <a href="">销量</a>
                                    <a href="">收藏</a>
                                </p>
                                <img src="{$config_siteurl}statics/zt/images/sellercenter/product.png">
                                <ul>
                                    <li>圣象强化复合木地板</li>
                                    <li>GT7196夏威夷樱</li>
                                    <li>￥158.00</li>
                                    <li>月成交：<span>20笔</span></li>
                                </ul>
                            </div>
                            <div class="li">
                                <p class="btn">
                                    <a href="">销量</a>
                                    <a href="">收藏</a>
                                </p>
                                <img src="{$config_siteurl}statics/zt/images/sellercenter/product.png">
                                <ul>
                                    <li>圣象强化复合木地板</li>
                                    <li>GT7196夏威夷樱</li>
                                    <li>￥158.00</li>
                                    <li>月成交：<span>20笔</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <ul>
                            <li>店铺详情</li>
                            <li>累计评价<span>3</span></li>
                            <li>月成交记录<span>4</span></li>
                            <li>本店同类商品</li>
                        </ul>
                    </div>
                    <div><?php echo htmlspecialchars_decode($data['show']); ?></div>
               </div>
          </div>
          <!--右部-->
            <div class="designbuy_right">
                <div class="designbuy_righttitle">
                  <s></s><b>看了又看</b>
                </div>
                <ul class="product">
                  <li>
                      <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">
                        <p>
                          一个可以买得到的东西
                        </p>
                        <div class="bg"></div>
                        <div class="pirce">¥121</div>
                    </li>
                  <li>
                      <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">
                        <p>
                          一个可以买得到的东西
                        </p>
                        <div class="bg"></div>
                        <div class="pirce">¥121</div>
                    </li>
                  <li>
                      <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">
                        <p>
                          一个可以买得到的东西
                        </p>
                        <div class="bg"></div>
                        <div class="pirce">¥121</div>
                    </li>
                </ul>
                <div class="designbuy_righttitle">
                  <s></s><b>本店同类产品</b>
                </div>
                <ul class="product">
                  <li>
                      <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">
                        <p>
                          一个可以买得到的东西
                        </p>
                        <div class="bg"></div>
                        <div class="pirce">¥121</div>
                    </li>
                  <li>
                      <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">
                        <p>
                          一个可以买得到的东西
                        </p>
                        <div class="bg"></div>
                        <div class="pirce">¥121</div>
                    </li>
                  <li>
                      <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">
                        <p>
                          一个可以买得到的东西
                        </p>
                        <div class="bg"></div>
                        <div class="pirce">¥121</div>
                    </li>
                </ul>
            </div>
     </div>

<!--保证栏-->
<!--背景容器-->
<div class="conwhole seller_promise_bor">
     <!--保护容器-->
     <div class="container">      <div class="bot_promiss clearfix">
       <a href="#"></a>
       <a href="#"></a>
       <a href="#"></a>
       <a href="#"></a>
      </div>
    </div>
</div>

<!--尾部-->

<!--背景容器-->
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>

</body>

<script>
    //处理后台的价格json串，并显示
    $(function($) {
        // var pArray = {$data.price_json};
        // for(var item in pArray){
        //     $("#colors").show();
        //     var is = $("#colors div").find("strong:contains('"+pArray[item]['color']+"')");
        //     console.log(is.length);
        //     console.log(pArray[item]['color']);
        //     if(is.length == 0){
        //         $("#colors div").append("<strong>"+pArray[item]['color']+"</strong>");
        //     }
            // colors.push(is);
            // if( pArray[item]['size'] !== ""){
            //     $("#size").show();
            //     for(var key in pArray[item]['size']){
            //         $("#size b").html(key);
            //         $("#size div").html("<strong>"+pArray[item]['size'][key]+"</strong>");
            //     }
            // }
        // }
    });
</script>
</html>