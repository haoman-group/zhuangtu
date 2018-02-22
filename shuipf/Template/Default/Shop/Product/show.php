<!doctype html>
<html>
<head> 
    <meta charset="utf-8">
    <title>{$shopInfo.name}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/templates.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/prodetail.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/ztshop.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/shopskin/<notempty name="page[setting][color]">{$page[setting][color]}<else/>dark</notempty>.css" >
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ecplaypreview.css" >
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js"></script>
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/parabola.js"></script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>
<!--导航-->
<template file="Shop/_nav.php"/>


<!--保护容器-->

     <div class="container main buyproduct" style="padding-top:20px;">
          <div class="wraplt">
              <div class="detail">
                  <div class="img">
                      <a href=""><img class="mainimg" src="{$data.headpic}"></a>
                      <ul class="listimg">
                          <volist name='data.picture' id='vo'>
                              <li><a href=""><img src="{$vo}"></a></li>
                          </volist>
                      </ul>
                       <div class="operate" name="iscollected">
                          <a class="share" href="">分享</a>
                         <!-- <a class="collect" href="{:U('collecton',array('id'=>$data['id']))}">收藏宝贝</a>-->
                            <!-- <a class="collect" onclick="changcoll()" data-product="{$data.userid}" data-delete="1">收藏宝贝</a>
                            <a class="collected" onclick="checkproduct()" data-product="{$data.userid}" data-delete="0">已收藏</a>-->
                             <if condition="$iscollected eq 0">
                            <a class="collect" onclick="changcoll()"  data-delete="1" data-type="1" >收藏宝贝</a><else/>
                             <a class="collected" onclick="checkproduct()"  data-delete="0" data-type="1">已收藏</a></if>
                          <span><a href="">举报</a></span>
                      </div>
                  </div>
                  
                  <div class="proshowparas proshowse">
                      <h5><?php echo empty($data['designtype'])?$data['title']:implode("/",array_filter(unserialize($data['title'])))?></h5>
                      <if condition="!empty($data['workername'])">
                       <h6>{$data.sell_points}</h6>
                      <div class="price">
                          <a href="">装途专享服务承诺</a>
                          <div class="txtdt zt_pricedt">
                              市场价
                          </div>
                          <div class="txtdd zt_price">

                               <strong>￥{$priceRange.price_act_min}<if condition="$data['price_act_min'] lt $data['price_act_max']"> - {$priceRange.price_act_max}</if></strong>
                              <span class="tip">{$key_Array}</span>
                          </div>
<!--                          <div class="txtdt">-->
<!--                              本店活动-->
<!--                          </div>-->
<!--                          <div class="txtdd activity">-->
<!--                              满178元减10元-->
<!--                          </div>-->
                      </div>
                      <div class="txtdt">
                          配送至
                      </div>
                          <div></div>
                      <div class="txtdd delivery">
                          <select>
                              <option>小店区</option>
                              <option>迎泽区</option>
                              <option>杏花岭区</option>
                              <option>尖草坪区</option>
                              <option>万柏林区</option>
                              <option>晋源区</option>
                              <option>清徐区</option>
                              <option>阳曲区</option>
                              <option>娄烦区</option>
                              <option>古交区</option>
                          </select>
                          <span class="stock">现货</span><span class="notes">注：付款前请先联系并现场沟通</span>
                          <!-- <p>付款成功后，具体送货时间请与商家联系</p> -->
                          <p></p>
<!--
-->
                      </div>
                      <elseif condition="!empty($data['designtype'])"/>
                      <h6>{$data.idea}</h6>
                      <div class="price">
                          <a href="">装途专享服务承诺</a>
                          <div class="txtdt">
                              价格
                          </div>
                          <div class="txtdd zt_oriprice" >
                              <s>￥{$priceRange.price_min}<if condition="$data['price_min'] neq $data['price_min']"> - {$priceRange.price_max}</if></s>
                          </div>
                          <div class="txtdt zt_pricedt">
                              专享价格
                          </div>
                          <div class="txtdd zt_price">
                              <strong>￥{$priceRange.price_act_min}<if condition="$data['price_act_min'] neq $data['price_act_max']"> - {$priceRange.price_act_max}</if></strong>
                              <span class="tip">{$data.activity}</span>
                          </div>
<!--                          <div class="txtdt">-->
<!--                              本店活动-->
<!--                          </div>-->
<!--                          <div class="txtdd activity">-->
<!--                              满178元减10元-->
<!--                          </div>-->
                      </div>
                      <div class="txtdt">
                          配送至
                      </div>
                      <div class="txtdd delivery">
                          <select>
                              <option>小店区</option>
                              <option>迎泽区</option>
                              <option>杏花岭区</option>
                              <option>尖草坪区</option>
                              <option>万柏林区</option>
                              <option>晋源区</option>
                              <option>清徐区</option>
                              <option>阳曲区</option>
                              <option>娄烦区</option>
                              <option>古交区</option>
                          </select>
                          <span class="stock">现货</span>
                          <span class="notes">注:付款前请与设计师沟通</span>
                          <p>提醒：此商品为服务性质，不支持7天无理由退货</p>
                          <volist name="productAddr" id="addr">
                            <a class="address" href="">{$addr.address}</a>
                            <a class="phone" href="">{$addr.phone}</a><br>
                          </volist>
                      </div>
                      <else/>
                     
                      <h6>{$data.sell_points}</h6>
                      <div class="price">
                          <a href="">装途专享服务承诺</a>
                          <div class="txtdt ">
                              门店价
                          </div>
                          <div class="txtdd zt_oriprice" >
                              <s>￥{$priceRange.price_min}<if condition="$data['min_price'] lt $data['max_price']"> - {$priceRange.price_max}</if></s>
                          </div>
                          <div class="txtdt zt_pricedt">
                              活动价
                          </div>
                          <div class="txtdd zt_price">
                              <strong>￥{$priceRange.price_act_min}<if condition="$data['price_act_min'] lt $data['price_act_max']"> - {$priceRange.price_act_max}</if></strong>
                              <span class="tip">{$data.activity}</span>
                          </div>
<!--                          <div class="txtdt">-->
<!--                              本店活动-->
<!--                          </div>-->
<!--                          <div class="txtdd activity">-->
<!--                              满178元减10元-->
<!--                          </div>-->
                      </div>
                      <div class="txtdt">
                          配送至
                      </div>
                      <div class="txtdd delivery">
                          <select>
                              <option>小店区</option>
                              <option>迎泽区</option>
                              <option>杏花岭区</option>
                              <option>尖草坪区</option>
                              <option>万柏林区</option>
                              <option>晋源区</option>
                              <option>清徐区</option>
                              <option>阳曲区</option>
                              <option>娄烦区</option>
                              <option>古交区</option>
                          </select>
                          <span class="stock">现货</span>
                          <span>付款成功后，具体送货时间请与商家联系</span>

                          
                      </div>

                          <div class="gpss" id="basicgp">
                              <dl class="gpss_pt">
                                  <volist name="productAddr" id="addr" offset='0' length='1'>
                                    <dt>
                                      <a href="" class="posits"></a><span class="final">{$addr.address}</span>
                                    </dt>
                                    <dd><span><a href="" class="teleps"></a>电话：{$addr.phone}</span></dd>
                                  </volist>
                              </dl>
                              <div class="gpss_in">
                                  <ul>
                                      <!-- <li class="gpss_tt">
                                          <p class="gpzi">地址：</p><div class="gpzis">太原黎氏阁长风街204号4楼美的旗舰店4F01<span class="phone">电话：13000000000</span></div>
                                      </li> -->
                                      <volist name="productAddr" id="addr" offset='1' length='10'>
                                        <li class="gpss_tt">
                                          <p class="gpzi">地址：</p><div class="gpzis">{$addr.address}<span class="phone">电话：{$addr.phone}</span></div>
                                        </li>
                                      </volist>
                                      <!-- <li class="gpss_tt">
                                          <p class="gpzi">地址：</p><div class="gpzis">黎氏阁长风街店平阳路口专卖<span class="phone">电话：13000000000</span></div>
                                      </li> -->
                                  </ul>
                              </div>
                          </div>
                      </if>
                  
                      <div class="dataline">
                          <b>月销量 <strong>{$data.count_sold}</strong></b><i></i>
                          <b>累计评价 <strong>{$comments}</strong></b><i></i>
                          <b>送装途积分 <strong class="stgree" name="commentcount">{$commentcount}</strong></b>
                      </div>
                      <dl class="dlprot" data-index="" data-vidindex="" data-id="{$id}"></dl>

                      <div class="num">
                          <div class="txtdt">购买数量</div>
                          <div class="txtdd">
                              <a href="javascript:void(0)" class="btnopbuynum dec">-</a>
                              <input type="text" class="buynum" value="1">
                              <a href="javascript:void(0)" class="btnopbuynum add">+</a>
                              <span>库存<span class="spstock">0</span>件</span>
                          </div>
                      </div>

                      <!-- <div class="shop_tips">
                        <h5>商品已成功加入购物车！</h5>
                        <p>颜色：<span></span>数量：<i></i></p>
                      </div> -->

                      <div class="txtdt">
                          服务承诺
                      </div>
                      <div class="txtdd serve">
                          <div class="texdda">
                              <if condition="in_array('1' ,$data['service_promise'])"><a href="" class="promisea1">假一赔十</a></if>
                              <if condition="in_array('2' ,$data['service_promise'])"><a href="" class="promisea2">价高返差</a></if>
                              <if condition="in_array('3' ,$data['service_promise'])"><a href="" class="promisea3">无理由换货</a></if>
                              <if condition="in_array('4' ,$data['service_promise'])"><a href="" class="promisea4">免费上门服务</a></if>
                              <if condition="in_array('5' ,$data['service_promise'])"><a href="" class="promisea5">放心环保</a></if>
                              <if condition="in_array('6' ,$data['service_promise'])"><a href="" class="promisea6">免费维修</a></if>
                              <if condition="in_array('7' ,$data['service_promise'])"><a href="" class="promisea7">免费退补</a></if>
                              <if condition="in_array('8' ,$data['service_promise'])"><a href="" class="promisea8">无忧安装</a></if>
                              <if condition="in_array('9' ,$data['service_promise'])"><a href="" class="promisea9">年质保</a></if>
                              <if condition="in_array('10' ,$data['service_promise'])"><a href="" class="promisea10">7天无理由退货</a></if>
                              <if condition="in_array('12' ,$data['service_promise'])"><a href="" class="promisea11">免费设计</a></if>
                              <if condition="in_array('13' ,$data['service_promise'])"><a href="" class="promisea12">破损全包</a></if>
                              <if condition="in_array('14' ,$data['service_promise'])"><a href="" class="promisea13">先行赔付</a></if>
                              <if condition="in_array('15' ,$data['service_promise'])"><a href="" class="promisea14">及时安装</a></if>
                              <if condition="in_array('16' ,$data['service_promise'])"><a href="" class="promisea15">材质保真</a></if>
                              <if condition="in_array('17' ,$data['service_promise'])"><a href="" class="promisea16">全国联保</a></if>
                              <if condition="in_array('18' ,$data['service_promise'])"><a href="" class="promisea17">免费量房</a></if>
                              <if condition="in_array('19' ,$data['service_promise'])"><a href="" class="promisea18">免费报价</a></if>
                              <if condition="in_array('20' ,$data['service_promise'])"><a href="" class="promisea19">陪选主材</a></if>
                              <if condition="in_array('21' ,$data['service_promise'])"><a href="" class="promisea20">装修保姆</a></if>
                              <if condition="in_array('22' ,$data['service_promise'])"><a href="" class="promisea21">随叫随到</a></if>
                              <if condition="in_array('23' ,$data['service_promise'])"><a href="" class="promisea22">垃圾下楼</a></if>
                              <if condition="in_array('24' ,$data['service_promise'])"><a href="" class="promisea23">工期0延误</a></if>
                              <if condition="in_array('25' ,$data['service_promise'])"><a href="" class="promisea24">工程无转包</a></if>
                              <if condition="in_array('26' ,$data['service_promise'])"><a href="" class="promisea25">成品保护</a></if>
                              <if condition="in_array('27' ,$data['service_promise'])"><a href="" class="promisea26">零增项</a></if>
                              <if condition="in_array('28' ,$data['service_promise'])"><a href="" class="promisea27">实名认证</a></if>
                              <if condition="in_array('29' ,$data['service_promise'])"><a href="" class="promisea28">材料推荐</a></if>
                              <if condition="in_array('30' ,$data['service_promise'])"><a href="" class="promisea29">装修预算</a></if>
                              <if condition="in_array('31' ,$data['service_promise'])"><a href="" class="promisea30">按期交稿</a></if>
                              <if condition="in_array('32' ,$data['service_promise'])"><a href="" class="promisea31">软装搭配</a></if>
                              <if condition="in_array('33' ,$data['service_promise'])"><a href="" class="promisea32">施工交底</a></if>
                              <if condition="in_array('34' ,$data['service_promise'])"><a href="" class="promisea33">分期付款</a></if>

                              <!--                           <a class="normal" href="">安心退货</a>
                                                        <a class="quick" href="">急速退货</a>
                                                        <a class="card" href="">退货保障卡</a>
                                                        <a class="time" href="">按时发货</a> -->
                          </div>


                      </div>
                      <div class="buy">
                          <a href="javascript:void(0)" class="btnproshowbuynow">立即购买</a>
                          <a class="trolley btnproshowtocart btnCart"  href="javascript:void(0)"><img src="{$config_siteurl}statics/zt/images/buyercenter/trolley.png">加入购物车</a>
                      </div>
                  </div>

              </div>


              <div id="flyItem" class="fly_item">
                    <img src="images/item-pic.jpg" width="30" height="30"/>
              </div>


              <div class="col-sub">
     
                <if condition="!empty($data['workername'])">
                  <div class="skin-box shopillustrate">

                      <h5>
                          <span class="hdname"><strong>{$shopInfo.name}</strong><i ><!--class="offline"--></i></span>
                      </h5>
                      <div class="identification">
                          <img src="{$config_siteurl}statics/zt/images/buyercenter/identificationicon.png">装途网实名认证
<!--                          <span class="degree"><em style="width:80%;"></em></span>-->
                          <span class="shopage">{$data.workyears}5</span>从业{$data.workyears}年
                      </div>
                      <ul>
                          <li>
                              服务<span>5.0</span>
                          </li>
                          <li>
                              质量<span>5.0</span>
                          </li>
                          <li>
                              综合<span>5.0</span>
<!--                              综合<span class="down">5.0</span>-->
                          </li>
                      </ul>

                      <!-- <a href="">进店逛逛</a> -->
                   

                      <div class="storecollection">
                      <!-- <a href=""   class="stgugu">进店逛逛</a> -->
                       <if condition="$isshop eq 0">
                      <a class="collectshop" onclick="changshop()" data-shopid="{$shopInfo.id}" data-shopdelete='1' data-type="2">收藏店铺</a><else />

                        <a class="collectshopid" onclick="checkshop()" data-shopid="{$shopInfo.id}"  data-shopdelete='0' data-type="2" style="color:red">已收藏</a></if>  
                      </div>

                  </div>
                  <elseif condition="!empty($data['designtype'])"/>
                  <div class="skin-box shopillustrate">
                      <h5>
                          <span class="hdname"><strong>{$shopInfo.name}</strong><i ><!--class="offline"--></i></span>
                      </h5>

                      <div class="identification">
                          <img src="{$config_siteurl}statics/zt/images/buyercenter/identificationicon.png">装途设计认证
<!--                          <span class="degree"><em style="width:80%;"></em></span>-->
                          <span class="shopage">{$designer.work_time}</span>从业年限:{$designer.work_time}年
                      </div>
                      <ul>
                          <li>
                              设计<span>5.0</span>
                          </li>
                          <li>
                              服务<span>5.0</span>
                          </li>
                          <li>
                              综合<span>5.0</span>
                          </li>
                      </ul>
                        <div class="storecollection" name="isshop">
                      <a href="http://www.zhuangtu.net/s/{$shopInfo.domain}"  class="stgugu">进店逛逛</a>
                       <if condition="$isshop eq 0">
                      <a class="collectshop" onclick="changshop()" data-shopid="{$shopInfo.id}" data-shopdelete='1'>收藏店铺</a><else />

                        <a class="collectshopid" onclick="checkshop()" data-shopid="{$shopInfo.id}"  data-shopdelete='0' style="display:none;color:red">已收藏</a></if>
                      </div>
                  </div>
                  <else/>
                  <div class="skin-box shopillustrate">

                      <h5>
                          <span class="hdname"><strong>{$shopInfo.name}</strong><i ><!--class="offline"--></i></span>
                      </h5>
                      <div class="identification">
                          <img src="{$config_siteurl}statics/zt/images/buyercenter/identificationicon.png">装途实体店认证
<!--                         <span class="degree"><em style="width:80%;"></em></span>-->
                          <span class="shopage">{$shopInfo.years}</span>线下{$shopInfo.years}年店
                      </div>
                      <ul>
                          <li>
                              线上<span>5.0</span>
                          </li>
                          <li>
                              线下<span>5.0</span>
                          </li>
                          <li>
                              综合<span> <!--class="down" --> 5.0</span>
                          </li>
                      </ul>
                      <div class="storecollection" name="isshop">
                      <a href="http://www.zhuangtu.net/s/{$shopInfo.domain}"  class="stgugu">进店逛逛</a>
                       <if condition="$isshop eq 0">
                      <a class="collectshop" onclick="changshop()" data-shopid="{$shopInfo.id}" data-shopdelete='1'>收藏店铺</a><else />

                        <a class="collectshopid" onclick="checkshop()" data-shopid="{$shopInfo.id}"  data-shopdelete='0' style="color:red">已收藏</a></if>
                      </div>
                  </div>
                  </if>
                  <div class="skin-box zts-search">
                      <h3>搜索</h3>
                      <s class="skin-box-tp"><b></b></s>
                      <div class="skin-box-hd disappear ">
                          <i class="hd-icon"></i>
                          <h3><span>宝贝搜索</span></h3>
                          <div class="skin-box-act disappear">
                              <a href="#" class="more">更多</a>
                          </div>
                      </div>
                      <div class="skin-box-bd">
                          <form name="SearchForm" action="//shop125546945.taobao.com/search.htm" method="get">
                              <ul>
                                  <input type="hidden" name="search" value="y">
                                  <li class="keyword">
                                      <label for="keyword">
                                          <span class="key">关键字</span>
                                          <input type="text" size="18" name="keyword" autocomplete="off" value="" class="keyword-input J_TKeyword prompt">
                                      </label>

                                  </li>
                                  <li class="submit">
                                      <input value="搜索" class="J_TSubmitBtn btn" type="submit">
                                  </li>
                              </ul>
                          </form>
                          <div class="hot-keys">

                              <span>热门搜索:</span>
                              <a href="//shop125546945.taobao.com/search.htm?search=y&amp;keyword=%B9%D8%BC%FC%B4%CA%D2%BB">关键词一</a>
                              <a href="//shop125546945.taobao.com/search.htm?search=y&amp;keyword=%B9%D8%BC%FC%B4%CA%B6%FE">关键词二</a>
                              <a href="//shop125546945.taobao.com/search.htm?search=y&amp;keyword=%B9%D8%BC%FC%B4%CA%C8%FD">关键词三</a>
                          </div>
                      </div>
                  </div>

                  <div class="skin-box">
                      <h3>宝贝分类</h3>
                      <div class="skin-box-bd">
                          <ul class="cats-tree">
                              <li class="cat fst-cat float">
                                  <h4 class="cat-hd fst-cat-hd"> <i class="cat-icon fst-cat-icon acrd-trigger active-trigger">-</i>
                                      <a href="{:U('Shop/Product/index',array('cateID'=>'','dom'=>$domain))}">查看所有宝贝</a>
                                  </h4>
                                  <ul class="fst-cat-bd">
                                      <a href="{:U('Shop/Product/index',array('cateID'=>'','dom'=>$domain,'order'=>'sell'))}">按销量</a>
                                      <a href="{:U('Shop/Product/index',array('cateID'=>'','dom'=>$domain,'order'=>'new'))}">按新品</a>
                                      <a href="{:U('Shop/Product/index',array('cateID'=>'','dom'=>$domain,'order'=>'price'))}">按价格</a>
                                      <a href="{:U('Shop/Product/index',array('cateID'=>'','dom'=>$domain,'order'=>'collect'))}">按收藏</a>
                                  </ul>
                              </li>

                              <volist name="category" id="vo">
                                <li class="cat fst-cat ">
                                    <h4 class="cat-hd fst-cat-hd" data-cat-id="1168684628">
                                        <i class="cat-icon fst-cat-icon acrd-trigger active-trigger">-</i>
                                        <a class="cat-name fst-cat-name" href='{:U("Shop/Product/index",array("cateID"=>$vo["id"],"dom"=>$domain))}'>{$vo.name}</a>

                                    </h4>
                                    <notempty name="vo[son]">
                                      <ul class="fst-cat-bd">
                                        <volist name="vo[son]" id="v">
                                          <li class="cat snd-cat  ">
                                              <h4 class="cat-hd snd-cat-hd" data-cat-id="1168684629">
                                                  <i class="cat-icon snd-cat-icon"></i>
                                                  <ul class="cat-nameul">
                                                      <li>
                                                          <a class="cat-name snd-cat-name" href='{:U("Shop/Product/index",array("cateID"=>$v["id"],"dom"=>$domain))}'>{$v.name}</a>
                                                      </li>
                                                  </ul>
                                              </h4>
                                          </li>
                                        </volist>
                                      </ul>
                                    </notempty>
                                </li>
                              </volist>
                          </ul>
                      </div>
                  </div>
                   

                  <div class="skin-box zts-rank">
                      <div class="skin-box-hd  ">
                          <i class="hd-icon"></i>
                          <h3><span>店内宝贝</span></h3>
                          <div class="skin-box-act disappear">
                              <a href="#" class="more">更多</a>
                          </div>
                      </div>
                      <div class="skin-box-bd">
                          <ul class="top-list-tab chtitul" data-tag="rankxxxxxx">
                              <li class="on chtitli"><span class="J_SaleTab tab1">销售量</span></li>
                              <li data-geturl="//favorite.t.taobao.com/json/shop_hot_items.htm?ownerId=1059350344&amp;limit=5" class="chtitli J_Collect"><span class="J_CollectTab tab2">收藏数</span></li>
                          </ul>
                          <div class="panels chconul" data-tag="rankxxxxxx">
                              <div class="panel sale chconli">
                                  <ul>
                                      <volist name="hotSold" id="hs">
                                          <li class="item even last">
                                              <div class="ranking">
                                                  <span>{$i}</span>
                                              </div>
                                              <div class="more">
                                                  <a href="//item.taobao.com/item.htm?id=524652636501" target="_blank"><img src="//img.alicdn.com/bao/uploaded/i3/TB1N5_KKFXXXXaVXpXXXXXXXXXX_!!2-item_pic.png_120x120.jpg" class="hover-show"></a>
                                              </div>
                                              <div class="img">
                                                  <a href="/Shop/Product/show/id/{$hs.id}" target="_blank"><img alt="商品图片" src="{$hs.headpic}" class="hover-show"></a>
                                              </div>
                                              <div class="detail">
                                                  <p class="desc"><a title="{$hs['title']}" href="/Shop/Product/show/id/{$hs.id}" target="_blank">{$hs['title']}</a></p>
                                                  <p class="price">￥<span>{$hs["min_price"]}</span></p>
                                                  <p class="sale">
                                                      已售出<span class="sale-count">{$hs["count_sold"]}</span>件
                                                  </p>
                                              </div>
                                          </li>
                                      </volist>
                                  </ul>
                              </div>
                              <div class="panel collection disappear chconli">
                                  <ul>
                                      <volist name="hotCollected" id="hc">
                                          <li class="item even last">
                                              <div class="ranking">
                                                  <span>{$i}</span>
                                              </div>
                                              <div class="more">
                                                  <a href="//item.taobao.com/item.htm?id=524652636501" target="_blank"><img src="//img.alicdn.com/bao/uploaded/i3/TB1N5_KKFXXXXaVXpXXXXXXXXXX_!!2-item_pic.png_120x120.jpg" class="hover-show"></a>
                                              </div>
                                              <div class="img">
                                                  <a href="/Shop/Product/show/id/{$hc.id}" target="_blank"><img alt="商品图片" src="{$hc.headpic}" class="hover-show"></a>
                                              </div>
                                              <div class="detail">
                                                  <p class="desc"><a title="{$hc['title']}" href="/Shop/Product/show/id/{$hc.id}"" target="_blank">{$hc['title']}</a></p>
                                                  <p class="price">￥<span>{$hc["min_price"]}</span></p>
                                                  <p class="sale">
                                                      已收藏<span class="sale-count">{$hc["count_collected"]}</span>次
                                                  </p>
                                              </div>
                                          </li>
                                      </volist>
                                  </ul>
                              </div>
                              <div class="control-group">
                                  <a class="collect-this-shop border-radius" href="//favorite.taobao.com/popup/add_collection.htm?itemid=125546945&amp;itemtype=0&amp;ownerid=1059350344&amp;scjjc=2&amp;_tb_token_=vQ91jpkwmNTkwGA" target="_blank" rel="nofollow">收藏本店</a>
                                  <span class="split">/</span>
                                  <a class="show-more border-radius disappear hotkeep_desc" target="_blank" href="//shop125546945.taobao.com/search.htm?orderType=hotkeep_desc">查看更多宝贝</a>
                                  <a class="show-more border-radius hotsell_desc" target="_blank" href="//shop125546945.taobao.com/search.htm?orderType=hotsell_desc">查看更多宝贝</a>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>

              <div class="explaindisplay">
                  <div class="head">
                      <ul class="title chtitul" data-tag="ch_prodec">
                          <li class="on chtitli">商品详情</li>
<!--                           <li class="chtitli">规格参数</li>-->
                          <li class="chtitli"><img src="{$config_siteurl}statics/zt/images/buyercenter/explaindisplaycomment.png">评价<span name="comments">({$comments})</span></li>
                          <li class="chtitli"><img src="{$config_siteurl}statics/zt/images/buyercenter/lrve.png">直播间</li>
                      </ul>
                      <ul class="content chconul" data-tag="ch_prodec">
                          <li class="on chconli">
                              <div class="txtbox itemdetails">
                                <div name="key_Array"  class="brname">{$key_Array}<!--<a href="#" class="collection">收藏</a>--></div>

                                <volist name='nokey_Array' id="vo">
                                  <p>{$vo}</p>
                                </volist>
                              </div>
                              <div class="shopdetailbox">
<?php
                                  switch($data['showway']){
                                    case 1:echo htmlspecialchars_decode($data['show']); break;
                                    case 2:echo empty($data['showecplay'])?htmlspecialchars_decode($data['show']):htmlspecialchars_decode($data['showecplay']); break;
                                    case 3:echo empty($data['showecplay'])?htmlspecialchars_decode($data['show']):htmlspecialchars_decode($data['showecplay']); break;
                                  }
                                  ?>

                              </div>
                          </li>
                          <li class="chconli">
                              <div class="txtbox onlinecomment scindex">
                                  <ul class="comment">
                                      <li>
                                          <div class="diarylist">
                                              <img class="listimg" src="{$config_siteurl}statics/zt/images/buyercenter/listimg2.jpg">
                                          </div>
                                          <div class="comment">
                                              <h6>
                                                  <input type="radio"  value="0" name="image" id="good"  data-type="0"  checked><label for="good">全部</label>
                                                  <input type="radio" value="1" name="image" id="goods"  data-type="1"><label for="goods">图片</label>
                                        <span class="right">
                                            <em class="choose on">
                                                <img src="{$config_siteurl}statics/zt/images/buyercenter/greychoose.png">
                                            </em>
                                            <label>有图片</label>
                                            <select>
                                                <option>按默认</option>
                                                <option>按图片</option>
                                                <option>按评价</option>
                                            </select>
                                         </span>
                                              </h6>
                                              <ul class="comments"></ul>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                          </li>
                          <li class="chconli">
                              <div class="txtbox onlinecomment scindex">
                                  <div class="diary">
                                    <img class="chtitliimg" src="{$config_siteurl}statics/zt/images/buyercenter/chtitliimg.jpg">
<!--                                    <div class="person">-->
<!--                                        <img src="{$config_siteurl}statics/zt/images/buyercenter/person1.png">-->
<!--                                        <p>-->
<!--                                            <span class="name">小＊＊＊柴（匿名）</span>-->
<!--                                            <span>暂无签名</span>-->
<!--                                        </p>-->
<!--                                    </div>-->
<!--                                    <ul class="content">-->
<!--                                        <li>工作内容(一小时前)</li>-->
<!--                                        <li>1.父母很喜欢，用起来放心。</li>-->
<!--                                        <li>2.物流很快</li>-->
<!--                                    </ul>-->
<!--                                    <ul class="img">-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg11.png"></li>-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg12.png"></li>-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg13.png"></li>-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg14.png"></li>-->
<!--                                    </ul>-->
<!--                                    <p class="status">父母很喜欢，用起来放心。</p>-->
<!--                                    <ul class="opeartion">-->
<!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/praise.png"><span>点赞</span></li>-->
<!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span>评论</span></li>-->
<!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                                <div class="diary">-->
<!--                                    <div class="person">-->
<!--                                        <img src="{$config_siteurl}statics/zt/images/buyercenter/person1.png">-->
<!--                                        <p>-->
<!--                                            <span class="name">刮家工-张师傅</span>-->
<!--                                            <span>踏踏实实工作，给你一个完美的家</span>-->
<!--                                        </p>-->
<!--                                    </div>-->
<!--                                    <ul class="content">-->
<!--                                        <li>工作内容(一小时前)</li>-->
<!--                                        <li>1.水电改造开槽</li>-->
<!--                                        <li>2.布管定位布管定位布管定位</li>-->
<!--                                    </ul>-->
<!--                                    <ul class="img">-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg11.png"></li>-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg12.png"></li>-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg13.png"></li>-->
<!--                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg14.png"></li>-->
<!--                                    </ul>-->
<!--                                    <p class="status">今天工作比较顺利，任务基本完成。</p>-->
<!--                                    <ul class="opeartion">-->
<!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/praise.png"><span>点赞</span></li>-->
<!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span>评论</span></li>-->
<!--                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li>-->
<!--                                    </ul>-->
                                </div>
                            </div>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>












        <div class="ald-skuRight">
<!--            <div class="wraprt">-->
<!--                <div class="title">-->
<!--                    <s></s><b>看了又看</b>-->
<!--                </div>-->
<!--                <ul class="product">-->
<!--                    <li>-->
<!--                        <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">-->
<!--                        <p>-->
<!--                            一个可以买得到的东西-->
<!--                        </p>-->
<!--                        <div class="bg"></div>-->
<!--                        <div class="pirce">¥121</div>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">-->
<!--                        <p>-->
<!--                            一个可以买得到的东西-->
<!--                        </p>-->
<!--                        <div class="bg"></div>-->
<!--                        <div class="pirce">¥121</div>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <img src="{$config_siteurl}statics/zt/images/designstencil1_product2.png">-->
<!--                        <p>-->
<!--                            一个可以买得到的东西-->
<!--                        </p>-->
<!--                        <div class="bg"></div>-->
<!--                        <div class="pirce">¥121</div>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
            <div class="wraprt">
                <div class="title">
                    <s></s><b>本店同类产品</b>
                </div>
                <ul class="product">
                    <volist name="list" id="vo">
                        <if condition="$data['id'] neq $vo['id']">
                            <li>
                                <a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}"></a>
                                <p>{$vo.title}</p>
                            </li>
                        </if>
                    </volist>

                </ul>
            </div>
        </div>

     </div>
<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>

</body>
<script>

    $(function(){

        $(".comment h6 input[type='radio']").click(function(){
            var type=$(this).val();
            $.ajax({
                type:"POST",
                url : '{:U("Api/Comment/lists",array("productid"=>$id))}',
                dataType:"json",
                data:{"type":type},
                success:function (data){
                    if(data.status == 1){
                        var oUl = $('.comment ul');
                        $('.comment ul').find('li').remove();
                        for(var i=0;i<data.data.length;i++){
                            var li = $('<li/>').appendTo(oUl);
                            var nowDate = data.data[i].addtime;
                            var date = new Date(nowDate*1000);
                            Y = date.getFullYear()+'-';
                            M = (date.getMonth()+1<10?'0'+(date.getMonth()+1):date.getMonth()+1)+'-';
                            D = date.getDate()+' ';
                            h = date.getHours()+':';
                            m = date.getMinutes()+':';
                            s = date.getSeconds();
                            var newDate = Y+M+D+h+m+s;
                            if(data.data[i].picture[0]){
                                if(data.data[i].isanonymous == 0){
                                    $('<span class=\"inline\"><p>'+data.data[i].content+'</p><div class=\"clearfix\"><img src=\"'+data.data[i].picture[0]+'\"><img src=\"'+data.data[i].picture[1]+'\"></div><span class=\"time\">'+newDate+'</span></span><div class=\"ul\"><p>'+'(匿名)</p></div>').appendTo(li);
                                }else{
                                    $('<span class=\"inline\"><p>'+data.data[i].content+'</p><div class=\"clearfix\"><img src=\"'+data.data[i].picture[0]+'\"><img src=\"'+data.data[i].picture[1]+'\"></div><span class=\"time\">'+newDate+'</span></span><div class=\"ul\"><p>'+data.data[i].username+'</p></div>').appendTo(li);
                                }
                            }else{
                                if(data.data[i].isanonymous == 0){
                                    $('<span class=\"inline\"><p>'+data.data[i].content+'</p><span class=\"time\">'+newDate+'</span></span><div class=\"ul\"><p>'+'(匿名)</p></div>').appendTo(li);
                                }else{
                                    $('<span class=\"inline\"><p>'+data.data[i].content+'</p><span class=\"time\">'+newDate+'</span></span><div class=\"ul\"><p>'+data.data[i].username+'</p></div>').appendTo(li);
                                }
                            }

                        }
                    }
                }
            })
        }).eq(0).trigger("click");


    })


</script>






<script type="text/javascript" src="{$config_siteurl}statics/zt/js/proshow.js"> </script>

<script>

    var price_json = <empty name ="data['price_json']">""<else/>{:json_encode($data['price_json'])}</empty>;

//    if(!price_json){price_json={}}
    $(function(){

        $(".listimg img").hover(function(){
            $(".mainimg").attr("src",$(this).attr("src"));
        });

        $(".gpss").mouseenter(function(){
            $(".gpss_in").css("display","block");
        });
        $(".gpss").mouseleave(function(){
            $(".gpss_in").css("display","none");
        });

    });

    function poplogin(fnback){
        layer.open({
            type:2,
            title: false,
            closeBtn: 0,
            scrollbar: false,
            area: ['700px','510px'],
            shadeClose: true,
            content: "{:U('Member/Buyer/loginpop')}"
        });
    }

    $(".btnproshowtocart").click(function(){
        if(!!$.cookie("gs1_spf_userid")){
            showprotocart();
        }
        else{
            poplogin();
        }
    })

    $(".btnproshowbuynow").click(function(){
        if(!!$.cookie("gs1_spf_userid")){
            showprotocart(locationtolists);
        }
        else{
            poplogin();
        }
    })

    function locationtolists(){
        window.location="/buyer/cart/lists";
    }


    //商品详情页添加到购物车
    function showprotocart(fnback){

        if(typeof(voidrepeat)=== "undefined" || voidrepeat=== 0 ){
            voidrepeat =1;
            var nownum= $(".buynum").val().replace(/\s+/g,"");
            if(nownum.length==0||isNaN(nownum)){alert("数量错误");return false;}

            var $proparas=$(".dlprot");
            var proid=$proparas.attr("data-id");
            var proname=$(".proshowparas h5").html();
            var price=$proparas.attr("data-price");
            if(price === "暂无"){alert("购买失败");return false;}
            var proindex= $proparas.attr("data-index");
            var protxtindex = $proparas.attr("data-txtindex");
            var providindex = $proparas.attr("data-vidindex");
            var pic=$(".detail .mainimg").attr("src");
            var nowpro={"id":proid,"name":proname,"price":price,"num":nownum,"img":pic,"proindex":proindex,"protxtindex":protxtindex,"providindex":providindex}

            addcart(nowpro,fnback);
        }
    }

    function addcart(objpro,fnback){
        $.ajax({
            type:"POST",
            url: "/Buyer/Cart/api",
            dataType:"json",
            data: {"act":"add","objpro":objpro, "opnum":opnum},
            timeout:5000,
            success: function(data,status){
                if(data.status==1){
                    if(fnback){
                        fnback();
                    }
                    else{
                        layer.msg("添加成功!");
                    }

                }
                else{
                    alert(data.msg);
                }
                voidrepeat=0;
            }
            ,error:function(XHR, textStatus, errorThrown){
                voidrepeat=0;
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    }

    function delcart(objpro){
        $.ajax({
            type:"POST",
            url: "",
            dataType:"json",
            data: {"objpro":objpro, "opnum":opnum},
            timeout:5000,
            success: function(data,status){
                if(data.status==1){

                }
                else{
                    //console.log("失败"+data.msg);
                }
                voidrepeat=0;
            }
            ,error:function(XHR, textStatus, errorThrown){
                voidrepeat=0;
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    }

    //jquerycookie操作
    jQuery.cookie = function(name, value, options) {
        if (typeof value != 'undefined') { // name and value given, set cookie
            options = options || {};
            if (value === null) {
                value = '';
                options.expires = -1;
            }
            var expires = '';
            if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
                var date;
                if (typeof options.expires == 'number') {
                    date = new Date();
                    date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
                } else {
                    date = options.expires;
                }
                expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
            }
            var path = options.path ? '; path=' + options.path : '';
            var domain = options.domain ? '; domain=' + options.domain : '';
            var secure = options.secure ? '; secure' : '';
            document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
        } else { // only name given, get cookie
            var cookieValue = null;
            if (document.cookie && document.cookie != '') {
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = jQuery.trim(cookies[i]);
                    // Does this cookie string begin with the name we want?
                    if (cookie.substring(0, name.length + 1) == (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }
    };




    //处理后台的价格json串，并显示
    $(function($) {

//         var pArray = {$data.price_json} ;
         var pArray = {} ;
         for(var item in pArray){
             $("#colors").show();
             var is = $("#colors div").find("strong:contains('"+pArray[item]['color']+"')");
             console.log(is.length);
             console.log(pArray[item]['color']);
             if(is.length == 0){
                 $("#colors div").append("<strong>"+pArray[item]['color']+"</strong>");
             }
             colors.push(is);
             if( pArray[item]['size'] !== ""){
                 $("#size").show();
                 for(var key in pArray[item]['size']){
                     $("#size b").html(key);
                     $("#size div").html("<strong>"+pArray[item]['size'][key]+"</strong>");
                 }
             }
         }


    });

    
</script>

<script>
    /*
     宝贝收藏
     */
    function changcoll() {
        var id = "<?php  echo $_GET['id'];?>";
        var is_delete = $(".collect").attr('data-delete');
        var type = $(".collect").attr("data-type");
        //var uid=$(".collect").arrt("data-uid");

        if (!!$.cookie("gs1_spf_userid")) {
            $.ajax({
                type: "POST",
                url: '{:U("Shop/Product/collectonproduct")}',
                dataType: "json",
                data: {"productid": id, "is_delete": is_delete, "type": type},
                success: function (data) {

                    if (data.status == 1) {
                        $(".collect").hide();
                        location.reload()
                        $(".collected").show();
                    } else {
                    }
                }

            }, "json");
        } else {
            poplogin();
        }
    }
    function changshop() {
        var shopid = $(".collectshop").attr('data-shopid');
        var is_delete = $(".collectshop").attr('data-shopdelete');
        var type = $('.collectshop').attr("data-type");

        if (!!$.cookie("gs1_spf_userid")) {
            $.ajax({
                type: "POST",
                url: '{:U("Shop/Product/collectonshop")}',
                dataType: "json",
                data: {"shopid": shopid, 'is_delete': is_delete, 'type': type},
                success: function (data) {
                    if (data.status == 1) {
                        $(".collectshop").hide();
                        location.reload()
                        $(".collectshopid").show();
                    } else {
                    }
                }

            }, "json");
        } else {
            poplogin();
        }
    }
    function checkproduct() {
        var id = "<?php  echo $_GET['id'];?>";
        var type = $(".collected").attr("data-type");
        $.ajax({
            type: "POST",
            url: '{:U("Shop/Product/deleproduct")}',
            dataType: "json",
            data: {"productid": id, 'type': type},
            success: function (data) {

                if (data.status == 1) {

                    $(".collect").show();
                    location.reload();
                    $(".collected").hide();
                } else {
                    alert("取消失败");
                }
            }

        }, "json");
    }

    function checkshop() {
        var shopid = $(".collectshopid").attr('data-shopid');
        var type = $(".collectshopid").attr('data-type');

        $.ajax({
            type: "POST",
            url: '{:U("Shop/Product/deleshop")}',
            dataType: "json",
            data: {"shopid": shopid, 'type': type},
            success: function (data) {
                if (data.status == 1) {

                    $(".collectshop").show();
                    location.reload();
                    $(".collectshopid").hide();
                } else {
                    alert("取消失败");
                }
            }

        }, "json");
    }




</script>
<script>

    $(function(){
//    alert('here');
        $(".comment h6 input[type='radio']").click(function(){
            var type=$(this).val();
            $.ajax({
                type:"POST",
                url : '{:U("Api/Comment/lists",array("productid"=>$id))}',
                dataType:"json",
                data:{"type":type},
                success:function (data){

                    if(data.status == 1){

                    }else{

                    }
                }

            });
        })
    })


</script>



</html>
