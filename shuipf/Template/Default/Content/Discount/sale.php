<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>天天特价</title>
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/discount_sale.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
	<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
	<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base.js"></script>
</head>
<body>
<template file="Content/common/_header.php"/>
<div class="sale">
	<div class="sale_title">
		<!-- <a href="">全部商品分类</a> -->
		<a href="{:U('/')}" target="_blank">首页</a>
		<a href="#F1">今日特价</a>
		<!-- <a href="">促销活动</a> -->
		<a href="#F2">特价套餐</a>
		<!-- <a href="">品牌特卖</a> -->
		<a href="#F3">装途团购</a>
		<!-- <a href="">明日预告</a> -->
		<a href="javascript:void(0)"><img src="{$config_siteurl}statics/zt/images/sale/sale.png" alt=""></a>
	</div>
	<div class="sale_ad">
		<div class="sale_ad_content">
			<img src="{$config_siteurl}statics/zt/images/sale/sale_content.png" alt="">
		</div>
	</div>
	
	<!-- <p class="everyday"><strong></strong>每日<span>9:00</span>准时上新</p> -->
	<!-- <div class="time_title">
		<img class="tody" src="{$config_siteurl}statics/zt/images/sale/tody1.png" alt="">
		<strong>今日上新</strong>
		<img class="tomorrow" src="{$config_siteurl}statics/zt/images/sale/tomorrow1.png" alt="">
		<strong>明日预告</strong>
	</div>-->
	<!-- <div class="wramp clearfix">
		<div class="wralp left">			
			<a href="">
				<img src="{$config_siteurl}statics/zt/images/sale/1.jpg" alt="">
				<div class="description clearfix">
					<p class="left">全友家居全场<span>3</span>折起</p>
					<p class="right">明日<span>9:00</span>开售</p>
				</div>
			</a>
			<a href="">
				<img src="{$config_siteurl}statics/zt/images/sale/3.jpg" alt="">
				<div class="description dp clearfix">
					<p class="left">科沃斯清洁机器人<span>直降800</span></p>
					<p class="right">明日<span>9:00</span>开售</p>
				</div>
			</a>
			<a href="">
				<img src="{$config_siteurl}statics/zt/images/sale/5.jpg" alt="">
				<div class="description clearfix">
					<p class="left">光明家具全场<span>5</span>折起</p>
					<p class="right">明日<span>9:00</span>开售</p>
				</div>
			</a>
		</div>
		<div class="wrarp right">
			<a href="">
				<img src="{$config_siteurl}statics/zt/images/sale/2.jpg" alt="">
				<div class="description dp clearfix">
					<p class="left">海尔节能冰柜<span>￥998</span></p>
					<p class="right">明日<span>9:00</span>开售</p>
				</div>
			</a>
			<a href="">
				<img src="{$config_siteurl}statics/zt/images/sale/4.jpg" alt="">
				<div class="description dp clearfix">
					<p class="left">九牧洁具<span>满1000减50</span></p>
					<p class="right">明日<span>9:00</span>开售</p>
				</div>
			</a>
		</div>		
	</div> -->
	<div class="sales todysales">
		<div class="sales_title" id="F1">今日特价</div>
		<!-- <div class="coupon">
			<div class="coupon1">
				<ul class="clearfix">
					<li class="left"><sup>￥</sup><span>10</span></li>
					<li class="left">
						<p>1月1日~1月20日使用</p>
						<p>优惠券</p>
						<p>YUAN</p>
					</li>
				</ul>
				<a href="">立即领取</a>
				<p class="user">无门槛即领即用</p>
			</div>
			<div class="coupon2">
				<ul class="clearfix">
					<li class="left"><sup>￥</sup><span>50</span></li>
					<li class="left">
						<p>1月1日~1月20日使用</p>
						<p>优惠券</p>
						<p>YUAN</p>
					</li>
				</ul>
				<a href="">立即领取</a>
				<p class="user">订单满500元即可使用</p>
			</div>
			<div class="coupon3">
				<ul class="clearfix">
					<li class="left"><sup>￥</sup><span>100</span></li>
					<li class="left">
						<p>1月1日~1月20日使用</p>
						<p>优惠券</p>
						<p>YUAN</p>
					</li>
				</ul>
				<a href="">立即领取</a>
				<p class="user">订单满1000元即可使用</p>
			</div>
		</div> -->
		<div class="coupon_main clearfix">
			<!-- <ul class="left">
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/ad1.png" alt=""></a>
					<div class="decription">精致生活源于细节新年钜惠选帅康<p><span>6.7</span>折起</p></div>
					<div class="opcity">
						<p class="left"><span>02</span>天<span>23</span>:<span>18</span>:<span>10</span></p>
						<strong class="right">7人已购买</strong>
					</div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/ad1.png" alt=""></a>
					<div class="decription">精致生活源于细节新年钜惠选帅康<p><span>6.7</span>折起</p></div>
					<div class="opcity">
						<p class="left"><span>02</span>天<span>23</span>:<span>18</span>:<span>10</span></p>
						<strong class="right">7人已购买</strong>
					</div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/ad1.png" alt=""></a>
					<div class="decription">精致生活源于细节新年钜惠选帅康<p><span>6.7</span>折起</p></div>
					<div class="opcity">
						<p class="left"><span>02</span>天<span>23</span>:<span>18</span>:<span>10</span></p>
						<strong class="right">7人已购买</strong>
					</div>
				</li>
			</ul>
			<ul class="right">
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/ad1.png" alt=""></a>
					<div class="decription">精致生活源于细节新年钜惠选帅康<p><span>6.7</span>折起</p></div>
					<div class="opcity">
						<p class="left"><span>02</span>天<span>23</span>:<span>18</span>:<span>10</span></p>
						<strong class="right">7人已购买</strong>
					</div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/ad1.png" alt=""></a>
					<div class="decription">精致生活源于细节新年钜惠选帅康<p><span>6.7</span>折起</p></div>
					<div class="opcity">
						<p class="left"><span>02</span>天<span>23</span>:<span>18</span>:<span>10</span></p>
						<strong class="right">7人已购买</strong>
					</div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/ad1.png" alt=""></a>
					<div class="decription">精致生活源于细节新年钜惠选帅康<p><span>6.7</span>折起</p></div>
					<div class="opcity">
						<p class="left"><span>02</span>天<span>23</span>:<span>18</span>:<span>10</span></p>
						<strong class="right">7人已购买</strong>
					</div>
				</li>
			</ul> -->
			<ul class="clearfix">
				<volist name="day" id="day"> 
				<li>
					<a target="_blank" href="{:U('Shop/Product/show',array('id'=>$day['dataid']))}"><img src="{$day.picture.0}" alt=""></a>
				    <h5><a target="_blank" href="{:U('Shop/Product/show',array('id'=>$day['dataid']))}">{$day.title}</a></h5>
				    <p class="description">{$day.description}</p>
				    <del><i>￥</i>{$day.data.min_price_ori}</del>
				    <div class="clearfix">
					    <h4><span>特价</span><strong>{$day.data.min_price}</strong></h4>
					    <!--<p><i>7</i>人已购买</p>-->
                    </div>
				</li>
			</volist>
				<!--<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/15.jpg" alt=""></a>
				    <h5>布艺沙发组合</h5>
				    <p class="description">简约现代时尚沙发 大小户型客厅联邦家私特价沙发</p>
				    <del><i>￥</i>2333</del>
				    <div class="clearfix">
					    <h4><span>特价</span><strong>998</strong></h4>
					    <p><i>7</i>人已购买</p>
                    </div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/15.jpg" alt=""></a>
				    <h5>布艺沙发组合</h5>
				    <p class="description">简约现代时尚沙发 大小户型客厅联邦家私特价沙发</p>
				    <del><i>￥</i>2333</del>
				    <div class="clearfix">
					    <h4><span>特价</span><strong>998</strong></h4>
					    <p><i>7</i>人已购买</p>
                    </div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/15.jpg" alt=""></a>
				    <h5>布艺沙发组合</h5>
				    <p class="description">简约现代时尚沙发 大小户型客厅联邦家私特价沙发</p>
				    <del><i>￥</i>2333</del>
				    <div class="clearfix">
					    <h4><span>特价</span><strong>998</strong></h4>
					    <p><i>7</i>人已购买</p>
                    </div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/15.jpg" alt=""></a>
				    <h5>布艺沙发组合</h5>
				    <p class="description">简约现代时尚沙发 大小户型客厅联邦家私特价沙发</p>
				    <del><i>￥</i>2333</del>
				    <div class="clearfix">
					    <h4><span>特价</span><strong>998</strong></h4>
					    <p><i>7</i>人已购买</p>
                    </div>
				</li>
				<li>
					<a href=""><img src="{$config_siteurl}statics/zt/images/sale/15.jpg" alt=""></a>
				    <h5>布艺沙发组合</h5>
				    <p class="description">简约现代时尚沙发 大小户型客厅联邦家私特价沙发</p>
				    <del><i>￥</i>2333</del>
				    <div class="clearfix">
					    <h4><span>特价</span><strong>998</strong></h4>
					    <p><i>7</i>人已购买</p>
                    </div>
				</li>-->
			</ul>
		</div>
	</div>
	<div class="sales special_sales">
		<div class="special_title" id="F2">特价套餐</div>
		<div class="special_main">
			<volist name="package" id="package">
			<div>
				<a href="{$package.url}" target="_blank"><img src="{$package.picture.0}" alt=""></a>
				<ul>
					
					<li>{$package.description}</li>
					<li>{$package.title}</li>
					<li>价值 ¥{$package.data.min_price_ori}</li>
					<li>
						<a href="{:U('Shop/Product/show',array('id'=>$package['dataid']))}" class="left"><b>立即抢购</b><span>送百元红包</span></a>
						<div><strong>今日特价</strong><span>￥</span>{$package.data.min_price}</div>
					</li>
				
				</ul>
			</div>
		</volist>
			<!--<div>
				
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/ad3.png" alt=""></a>
				<ul>
					
					<li>寒潮来袭 温暖护您</li>
					<li>爱慕莎（EMSA）德国原装进口贝格玻璃内胆保温壶</li>
					<li>价值 ¥6660</li>
					<li>
						<a href="" class="left"><b>立即抢购</b><span>送百元红包</span></a>
						<div><strong>今日特价</strong><span>￥</span>3280</div>
					</li>
				
				</ul>
             
			</div>-->
			<!--<div>
				<img src="{$config_siteurl}statics/zt/images/sale/ad2.png" alt="">
				<ul>
					<li>寒潮来袭 温暖护您</li>
					<li>爱慕莎（EMSA）德国原装进口贝格玻璃内胆保温壶</li>
					<li>价值 ¥6660</li>
					<li>
						<a href="" class="left"><b>立即抢购</b><span>送百元红包</span></a>
						<div><strong>今日特价</strong><span>￥</span>3280</div>
					</li>
				</ul>
			</div>
			<div>
				<img src="{$config_siteurl}statics/zt/images/sale/ad3.png" alt="">
				<ul>
					<li>寒潮来袭 温暖护您</li>
					<li>爱慕莎（EMSA）德国原装进口贝格玻璃内胆保温壶</li>
					<li>价值 ¥6660</li>
					<li>
						<a href="" class="left"><b>立即抢购</b><span>送百元红包</span></a>
						<div><strong>今日特价</strong><span>￥</span>3280</div>
					</li>
				</ul>
			</div>-->
		</div>
	</div>
	<!-- <div class="sales">
		<div class="coupon_title">品牌特卖</div>
		<div class="brand_main clearfix">
			<div class="tops clearfix">
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/6.jpg" alt=""></a>
			  <a href=""><img src="{$config_siteurl}statics/zt/images/sale/7.jpg" alt=""></a>
			</div>
			<div class="bottom clearfix">
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/8.jpg" alt=""></a>
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/9.jpg" alt=""></a>
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/10.jpg" alt=""></a>
			</div>			
		</div>
	</div> -->
	<div class="sales grop">
		<div class="grop_title" id="F3">装途团购</div>
		<ul class="grop_main clearfix">
			<volist name="zhuangtu" id="zhuangtu">
			<li>
				<a target="_blank" href="{:U('Shop/Product/show',array('id'=>$zhuangtu['dataid']))}"><img src="{$zhuangtu.picture.0}" alt=""></a>
				<p class="introduce"><a target="_blank" href="{:U('Shop/Product/show',array('id'=>$zhuangtu['dataid']))}">{$zhuangtu.title}</a></p>
				<div class="description">
					<i>￥</i>
					<strong>{$zhuangtu.data.min_price}</strong>
					<div>
						<!--<p class="time">剩余时间：<span>2</span>天<span>3</span><em>小时</em><span>15</span><em>分</em></p>-->
						<s>￥{$zhuangtu.data.min_price_ori}</s>
					</div>			
					<a target="_blank" href="{:U('Shop/Product/show',array('id'=>$zhuangtu['dataid']))}">立即抢购</a>
				</div>
			</li>
		</volist>
			<!--<li>
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/12.jpg" alt=""></a>
				<p class="introduce">【华帝卫浴】淋浴花洒套装 CS00715.</p>
				<div class="description">
					<i>￥</i>
					<strong>390</strong>
					<div>
						<p class="time">剩余时间：<span>2</span>天<span>3</span><em>小时</em><span>15</span><em>分</em></p>
						<s>￥690</s>
					</div>			
					<a href="">立即抢购</a>
				</div>
			</li>
			<li>
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/13.jpg" alt=""></a>
				<p class="introduce">【荣事达（Royalstar）】HG1616L韩式电火锅</p>
				<div class="description">
					<i>￥</i>
					<strong>88</strong>
					<div>
						<p class="time">剩余时间：<span>2</span>天<span>3</span><em>小时</em><span>15</span><em>分</em></p>
						<s>￥199</s>
					</div>			
					<a href="">立即抢购</a>
				</div>
			</li>
			<li>
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/11.jpg" alt=""></a>
				<p class="introduce">【老板(Robam)】 CXW-200-8307 欧式 油烟机</p>
				<div class="description">
					<i>￥</i>
					<strong>3580</strong>
					<div>
						<p class="time">剩余时间：<span>2</span>天<span>3</span><em>小时</em><span>15</span><em>分</em></p>
						<s>￥4999</s>
					</div>			
					<a href="">立即抢购</a>
				</div>
			</li>
			<li>
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/12.jpg" alt=""></a>
				<p class="introduce">【华帝卫浴】淋浴花洒套装 CS00715.</p>
				<div class="description">
					<i>￥</i>
					<strong>390</strong>
					<div>
						<p class="time">剩余时间：<span>2</span>天<span>3</span><em>小时</em><span>15</span><em>分</em></p>
						<s>￥690</s>
					</div>			
					<a href="">立即抢购</a>
				</div>
			</li>
			<li>
				<a href=""><img src="{$config_siteurl}statics/zt/images/sale/13.jpg" alt=""></a>
				<p class="introduce">【荣事达（Royalstar）】HG1616L韩式电火锅</p>
				<div class="description">
					<i>￥</i>
					<strong>88</strong>
					<div>
						<p class="time">剩余时间：<span>2</span>天<span>3</span><em>小时</em><span>15</span><em>分</em></p>
						<s>￥199</s>
					</div>			
					<a href="">立即抢购</a>
				</div>
			</li>-->	
		</ul>
	</div>
	<!-- <div class="ad"><a href=""><img src="{$config_siteurl}statics/zt/images/sale/14.jpg" alt=""></a></div> -->
</div>
	<template file="common/_promise.php"/>
	<template file="common/_footer.php"/>
</body>
</html>