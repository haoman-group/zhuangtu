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
    <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/proshow.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/parabola.js"></script>
</head>
<body>
<!--背景容器-->
<template file="common/_shopHeader.php"/>
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
                      <div class="operate" name="iscollected" data-prodid="{$_GET['id']}">
                         <a class="share" href="">分享</a>
                         <a class="<?php if ($iscollected == '0' ) { echo 'collected' ;} else {echo 'collect';} ?> needlogin clickcollect"  data-delete="{$iscollected}" data-type="1" ><?php if ($iscollected == '0' ) { echo '已收藏' ;} else {echo '收藏宝贝';} ?></a>
                         <span><a href="">举报</a></span>
                      </div>
                  </div>

                  <div class="proshowparas proshowse">
                      <h5>{$data.title}</h5>

                      <h6>{$data.idea}</h6>
                      <div class="price">
                          <a href="">装途专享服务承诺</a>
                          <div class="txtdt">
                              价格
                          </div>
                          <div class="txtdd zt_oriprice" >
                              <s>￥{$data.min_price_ori|sprintf='%.2f',###}<if condition="$data['min_price_ori'] neq $data['max_price_ori']"> - {$data.max_price_ori|sprintf='%.2f',###}</if></s>
                          </div>
                          <div class="txtdt zt_pricedt">
                              专享价格
                          </div>
                          <div class="txtdd zt_price">
                              <strong>￥{$data.min_price|sprintf='%.2f',###}<if condition="$data['min_price'] neq $data['max_price']"> - {$data.max_price|sprintf='%.2f',###}</if></strong>
                              <span class="tip">{$data.activity}</span>
                          </div>
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
                          <p>提醒：此商品为服务性质，付款前请与商家签署服务合同。</p>
                          <volist name="productAddr" id="addr">
                            <a class="address" href="">{$addr.address}</a>
                            <a class="phone" href="">{$addr.phone}</a><br>
                          </volist>
                      </div>
                      <div class="dataline">
                         <b>月销量 <strong>{$data.count_sold}</strong></b><i></i>
                          <b>累计评价 <strong>{$comments}</strong></b><i></i>
                          <b>装途点赞 <strong class="stgree" name="commentcount">{$commentcount}</strong></b>
                      </div>
                      <dl class="dlprot" data-index="" data-vidindex="" data-id="{$id}"></dl>

                      <div class="num">
                          <div class="txtdt">购买数量</div>
                          <div class="txtdd">
                              <a href="javascript:void(0)" class="btnopbuynum dec">-</a>
                              <input type="text" class="buynum" value="1">
                              <a href="javascript:void(0)" class="btnopbuynum add">+</a>
                              <span>库存<span class="spstock">{$number}</span>件</span>
                          </div>
                      </div>

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
                          <a href="javascript:void(0)" class="btnproshowbuynow needlogin ">立即购买</a>
                          <a class="trolley btnproshowtocart needlogin btnCart"  href="javascript:void(0)"><img src="{$config_siteurl}statics/zt/images/buyercenter/trolley.png">加入购物车</a>
                          <div id="flyItem" class="fly_item">
                                <img src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" width="30" height="30"/>
                          </div>
                      </div>
                  </div>

              </div>





              <div class="col-sub">


                  <div class="skin-box shopillustrate">
                      <h5>
                          <span class="hdname"><a href="http://www.zhuangtu.net/s/{$shopInfo.domain}"><strong>{$shopInfo.name}</strong></a><i data-imurl="{:U('Member/Chat/index',array('shopid'=>$shopInfo['id'],'productid'=>$id))}" class="btnopenserviceim needlogin"  ><!--class="offline"--></i></span>
                      </h5>

                      <div class="identification">
                          <div><img src="<eq name='shopInfo.certification' value='1'>{$config_siteurl}statics/zt/images/buyercenter/identificationicon.png<else/>{$config_siteurl}statics/zt/images/buyercenter/no_identificationicon.png</eq>">装途设计认证</div>
                          <div><span class="shopage">{$shopyear}</span>{$shopyear}年设计保证</div>
<!--                          <span class="degree"><em style="width:80%;"></em></span>-->
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



					  <div class="storecollection" name="isshop"  data-shopid="{$shopInfo['id']}">
              <a href="http://www.zhuangtu.net/s/{$shopInfo.domain}"  class="stgugu">进店逛逛</a>
              <a class="<?php if ($isshop == '0') { echo 'collectshopid' ;} else {echo 'collectshop';} ?> needlogin clickcollectshop"  data-shopdelete="{$isshop}" data-type="2" ><?php if ($isshop == '0' ) { echo '已收藏' ;} else {echo '收藏店铺';} ?></a>
            </div>

				  </div>
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
								  <h4 class="cat-hd fst-cat-hd cat-wutop"> <i class="cat-icon fst-cat-icon acrd-trigger active-trigger">-</i>
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
												  <p class="desc"><a title="{$hc['title']}" href="/Shop/Product/show/id/{$hc.id}" target="_blank">{$hc['title']}</a></p>
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
<!--                                  <a class="show-more border-radius disappear hotkeep_desc" target="_blank" href="//shop125546945.taobao.com/search.htm?orderType=hotkeep_desc">查看更多宝贝</a>-->
<!--                                  <a class="show-more border-radius hotsell_desc" target="_blank" href="//shop125546945.taobao.com/search.htm?orderType=hotsell_desc">查看更多宝贝</a>-->
								  <a class="show-more border-radius hotsell_desc" target="_blank" href="{:U('Shop/Product/index',array('cateID'=>'','dom'=>$domain))}">查看更多宝贝</a>
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
						  <li class="on chconli ">
							  <div class="txtbox itemdetails designtxt">
								<!-- 设计产品信息 -->

								<p><if condition="empty($data['case_name'] eq true)"><else/>案例名称：</if><span>{$data.case_name}</span></p>

								<p>设计风格：<span><?php echo implode("/",array_filter(unserialize($data['attr_style']))); ?></span></p>
								<p>户　　型：<span>{$data.attr_huxing}</span></p>
								<p>案 例 面 积：<span>{$data.attr_area}</span></p>

								<p>设计公司：<span>{$data.design_company}</span></p>
								<p>主立空间：<span>{$data.attr_kongjian}</span></p>
								<p>案例设计费：<span>{$data.case_price}</span></p>

								<p>设计理念：<span>{$data.idea}</span></p>
								<!-- 设计师属性 -->
								<p>案例设计师：<span>{$designer.name}</span></p>

								<p>级　　别：<span>{$designer.qualification}</span></p>
								<p>从业年限：<span>{$designer.work_time}年</span></p>
								<p>毕业院校：<span>{$designer.school}</span></p>

								<p>擅长风格：<span>{$designer.style}</span></p>
								<p>所获奖项：<span>{$designer.credential}</span></p>

								<p>个人简介：<span>{$designer.introduce}</span></p>

								<!-- 服务信息属性 -->
							   <p>收费服务内容分类:<if condition="(empty($data['single_effect'])) AND (empty(unserialize($data['pictype_cad'])) )  AND(empty(unserialize($data['pictype_cad'])) )"><span></span><else/><span>全套设计方案每平米报价</span></if><if condition="empty($data['single_effect'])"><span></span><else/><span>/单空间效果图</span></if><if condition="empty(unserialize($data['solution']))"><span> </span><else/><span>/全 屋 软 装　解 决 方 案</span></if></p>
								<!-- 这地方 还要改 -->
							   <if condition="!empty($data['single_effect'])AND (!empty(unserialize($data['pictype_cad']))  )  AND(!empty(unserialize($data['pictype_cad'])) )"><p>全套设计方案每平米报价：<span>效果图{$data.single_effect}张/<?php echo implode("/",array_filter(unserialize($data['pictype_cad']))); ?><?php echo implode("/",array_filter(unserialize($data['service_added']))); ?></span></p><else/><p></p></if>

							   <if condition="empty($data['single_effect'])"><p></p><else/><p>单　空　间　效　果　图：<span>效果图{$data.single_effect}张，收费方式与设计师沟通</span></p></if>

							   <if condition="empty(unserialize($data['solution'])) "><p></p><else/> <p>全 屋 软 装　解 决 方 案：<span><?php echo implode("/",array_filter(unserialize($data['solution']))); ?></span></p></if>
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
                                        <if condition="$comments neq 0">
                                          <div class="diarylist" style="display:none">
                                              <img class="listimg" src="{$config_siteurl}statics/zt/images/buyercenter/listimg2.jpg">
                                          </div>
                                        <else/>
                                         <div class="diarylist" >
                                              <img class="listimg" src="{$config_siteurl}statics/zt/images/buyercenter/listimg2.jpg">
                                          </div>
                                        </if>
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
                                <!-- <div class="diary">
                                    <img class="chtitliimg" src="{$config_siteurl}statics/zt/images/buyercenter/chtitliimg.jpg"> -->
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
                               <div class="diary">
                                <if condition="$studioinfo eq '' ">
                                <img class="chtitliimg" src="{$config_siteurl}statics/zt/images/buyercenter/chtitliimg.jpg"><else/>
                                   <volist name="studioinfo" id="vo">
                                   <div class="person">
                                       <img src="{$vo.userpic}">
                                       <p>
                                            <span class="name">{$vo.name}-{$vo.sellername}</span>
                                            <span>{$vo.about}</span>
                                        </p>
                                    </div>
                                   <ul class="content">
                                       <li>工作内容</li>
                                       <volist name="vo.struction_content" id="data">
                                        <li>{$data}</li>
                                       </volist>
                                        
                                    </ul>
                                    <ul class="img">
                                      <volist name="vo.picture" id="picture">
                                       <li><img src="{$picture}"></li>
                                     </volist>
                                       <!--  <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg12.png"></li>
                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg13.png"></li>
                                        <li><img src="{$config_siteurl}statics/zt/images/buyercenter/diaryimg14.png"></li> -->
                                   </ul>
                                    <p class="status">{$vo.comm_release}。</p>
                                   <ul class="opeartion">
                                    <if condition="$vo.seller_like eq 1">
                                        <li class="on"><span>{$vo.sellername}</span></li></if>
                                        <if condition="$vo.customer_like eq 1">
                                        <li class="on"><span>{$vo.customername}</span></li></if>

                                        <!-- <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span>评论</span></li>
                                        <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li> -->
                                   </ul>

                                   <ul class="content">
                                        <volist name="vo.studiocomment" id="comment">
                                       <li>{$i}.{$comment.content}</li>
                                     
                                     </volist>
                                    </ul>
                                 </volist>
                                 </if>

								</div>
							</div>
						  </li>
					  </ul>
					 <!-- <ul>
						  <li>ddd</li>
					  </ul>-->
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
								<a target="_blank" href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img src="{$vo.headpic}"></a>
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




<script>

    var price_json = <empty name ="data['price_json']">""<else/>{:json_encode($data['price_json'])}</empty>;


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
<script>
function poplogin(fnback){
	layer.open({
		type:2,
		title: false,
		closeBtn: 0,
		scrollbar: false,
		area: ['360px','380px'],
		shadeClose: true,
		content: "/Member/Buyer/loginpop"
	});
}


$(function(){
	$(".btnopenserviceim").click(function(){

		if(!!$.cookie("gs1_spf_userid")){
			var imurl = $(this).attr("data-imurl");

			layer.open({
				type:2,
				title: false,
				closeBtn: 0,
				scrollbar: false,
				area: ['902px','607px'],
				shadeClose: false,
				content: [imurl ,'no']
			});
		}
		else{
			poplogin();
		}


	})
})
</script>

<template file="Shop/Product/_show_common.php"/>
</html>