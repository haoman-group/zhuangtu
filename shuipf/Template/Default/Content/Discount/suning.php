<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>苏宁易购</title>
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/discount_sale.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
	<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
	<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base.js"></script>
</head>
<body>
<template file="Content/common/_header.php"/>
<div class="conwhole whole_imgbox">
  <a href="{$posdata['250']['1']['url']}" target="_blank"><img src="{$posdata['250']['1']['picture']['0']}" class="whole_img" /></a>
</div>
<div class="suning_titbg" style="background:{$posdata['250']['1']['description']}">
	<ul class="suning_tit clearfix">
        <volist name="posdata['251']" id="vo">
		<li><a href="#{$vo.url}">{$vo.title}</a></li>
		<!-- <li><a href="">所有宝贝</a></li>
		<li><a href="">冰箱/空调区</a></li>
		<li><a href="">洗衣机区</a></li>
		<li><a href="">电视区</a></li>
		<li><a href="">3C数码区</a></li>
		<li><a href="">其他</a></li> -->
    </volist>
	</ul>
</div>
<div class="conwhole whole_imgbox">
  <a href="{$posdata['252']['1']['url']}" target="_blank"><img src="{$posdata['252']['1']['picture']['0']}" class="whole_img" /></a>
</div>
<div class="suning_content">
    <div class="floorbox">
    	<p class="floor" id="{$posdata['251']['3']['url']}">1F</p>
    	<dl class="title clearfix">
    		<dt>冰箱/空调</dt>
    		<dd>
    		    <a href="###" class="on" data-class="fridge">冰箱区</a>
    		    <a href="###" data-class="aircondition">空调区</a>
    		</dd>
    	</dl>
    	<dl class="content clearfix fridge">
    		<dt>
            <volist name="posdata['253']" id="Re" offset="0" length="2">
    			<a href="{$Re['url']}"><img src="{$Re['picture']['0']}"></a>
            </volist>
    		</dt>
    		<dd>
    			<ul class="clearfix">
                <volist name="posdata['253']" id="Re" offset="2" length="6">
    				<li>
    				    <a href="{:U('Shop/Product/show',array('id'=>$Re['dataid']))}"><img src="{$Re['picture']['0']}"></a>
    				    <p>【好货推荐】{$Re.title}</p>
    				    <div class="clearfix"><strong>￥<if condition="$Re['data']['min_price'] eq $Re['data']['max_price']">{$Re['data']['min_price']}<else/>{$Re['data']['min_price']}-{$Re['data']['max_price']}</if></strong><del>￥<if condition="$Re['data']['min_price_ori'] eq $Re['data']['max_price_ori']">{$Re['data']['min_price_ori']}<else/>{$Re['data']['min_price_ori']}-{$Re['data']['max_price_ori']}</if></del></div>
    				</li>
                </volist>
    			</ul>
    		</dd>
    	</dl>
    	<dl class="content clearfix aircondition">
    		<dt>
    		<volist name="posdata['254']" id="sky" offset="0" length="2">
                <a href="{$sky['url']}"><img src="{$sky['picture']['0']}"></a>
            </volist>
    		</dt>
    		<dd>
    			<ul class="clearfix">
    			<volist name="posdata['254']" id="sky" offset="2" length="6">
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$sky['dataid']))}"><img src="{$sky['picture']['0']}"></a>
                        <p>【好货推荐】{$sky.title}</p>
                        <div class="clearfix"><strong>￥<if condition="$sky['data']['min_price'] eq $sky['data']['max_price']">{$sky['data']['min_price']}<else/>{$sky['data']['min_price']}-{$sky['data']['max_price']}</if></strong><del>￥<if condition="$sky['data']['min_price_ori'] eq $sky['data']['max_price_ori']">{$sky['data']['min_price_ori']}<else/>{$sky['data']['min_price_ori']}-{$sky['data']['max_price_ori']}</if></del></div>
                    </li>
                </volist>
    			</ul>
    		</dd>
    	</dl>
    </div>
    <div class="floorbox">
    	<p class="floor" id="{$posdata['251']['4']['url']}">2F</p>
    	<dl class="title clearfix">
    		<dt>洗衣机</dt>
    		<dd>
    		    <a href="{$posdata['255']['1']['url']}">MORE</a><span>&gt;</span>
    		</dd>
    	</dl>
    	<dl class="content clearfix">
    		<dt>
    		<volist name="posdata['255']" id="washing" offset="0" length="2">
                <a href="{$washing['url']}"><img src="{$washing['picture']['0']}"></a>
            </volist>
    		</dt>
    		<dd>
    			<ul class="clearfix">
    			<volist name="posdata['255']" id="washing" offset="2" length="6">
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$washing['dataid']))}"><img src="{$washing['picture']['0']}"></a>
                        <p>【好货推荐】{$washing.title}</p>
                        <div class="clearfix"><strong>￥<if condition="$washing['data']['min_price'] eq $washing['data']['max_price']">{$washing['data']['min_price']}<else/>{$washing['data']['min_price']}-{$washing['data']['max_price']}</if></strong><del>￥<if condition="$washing['data']['min_price_ori'] eq $washing['data']['max_price_ori']">{$washing['data']['min_price_ori']}<else/>{$washing['data']['min_price_ori']}-{$washing['data']['max_price_ori']}</if></del></div>
                    </li>
                </volist>
    			</ul>
    		</dd>
    	</dl>
    </div>
    <div class="floorbox">
    	<p class="floor" id="{$posdata['251']['5']['url']}">3F</p>
    	<dl class="title clearfix">
    		<dt>电视</dt>
    		<dd>
    		    <a href="{$posdata['256']['1']['url']}">MORE</a><span>&gt;</span>
    		</dd>
    	</dl>
    	<dl class="content clearfix">
    		<dt>
    		<volist name="posdata['256']" id="tv" offset="0" length="2">
                <a href="{$tv['url']}"><img src="{$tv['picture']['0']}"></a>
            </volist>
    		</dt>
    		<dd>
    			<ul class="clearfix">
    			<volist name="posdata['256']" id="tv" offset="2" length="6">
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$tv['dataid']))}"><img src="{$tv['picture']['0']}"></a>
                        <p>【好货推荐】{$tv.title}</p>
                        <div class="clearfix"><strong>￥<if condition="$tv['data']['min_price'] eq $tv['data']['max_price']">{$tv['data']['min_price']}<else/>{$tv['data']['min_price']}-{$tv['data']['max_price']}</if></strong><del>￥<if condition="$tv['data']['min_price_ori'] eq $tv['data']['max_price_ori']">{$tv['data']['min_price_ori']}<else/>{$tv['data']['min_price_ori']}-{$tv['data']['max_price_ori']}</if></del></div>
                    </li>
                </volist>
    			</ul>
    		</dd>
    	</dl>
    </div>
    <div class="floorbox">
    	<p class="floor" id="{$posdata['251']['6']['url']}">4F</p>
    	<dl class="title clearfix">
    		<dt>3C数码区</dt>
    		<dd>
    		    <a href="{$posdata['257']['1']['url']}">MORE</a><span>&gt;</span>
    		</dd>
    	</dl>
    	<dl class="content clearfix">
    		<dt>
    		<volist name="posdata['257']" id="digital" offset="0" length="2">
                <a href="{$digital['url']}"><img src="{$digital['picture']['0']}"></a>
            </volist>
    		</dt>
    		<dd>
    			<ul class="clearfix">
    			<volist name="posdata['257']" id="digital" offset="2" length="6">
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$digital['dataid']))}"><img src="{$digital['picture']['0']}"></a>
                        <p>【好货推荐】{$digital.title}</p>
                        <div class="clearfix"><strong>￥<if condition="$digital['data']['min_price'] eq $digital['data']['max_price']">{$digital['data']['min_price']}<else/>{$digital['data']['min_price']}-{$digital['data']['max_price']}</if></strong><del>￥<if condition="$digital['data']['min_price_ori'] eq $digital['data']['max_price_ori']">{$digital['data']['min_price_ori']}<else/>{$digital['data']['min_price_ori']}-{$digital['data']['max_price_ori']}</if></del></div>
                    </li>
                </volist>
    			</ul>
    		</dd>
    	</dl>
    </div>
    <div class="floorbox">
    	<p class="floor" id="{$posdata['251']['7']['url']}">5F</p>
    	<dl class="title clearfix">
    		<dt>其他</dt>
    		<dd>
    		    <a href="{$posdata['258']['1']['url']}">MORE</a><span>&gt;</span>
    		</dd>
    	</dl>
    	<dl class="content clearfix">
    		<dt>
    		<volist name="posdata['258']" id="MO" offset="0" length="2">
                <a href="{$MO['url']}"><img src="{$MO['picture']['0']}"></a>
            </volist>
    		</dt>
    		<dd>
    			<ul class="clearfix">
    			<volist name="posdata['258']" id="MO" offset="2" length="6">
                    <li>
                        <a href="{:U('Shop/Product/show',array('id'=>$MO['dataid']))}"><img src="{$MO['picture']['0']}"></a>
                        <p>【好货推荐】{$MO.title}</p>
                        <div class="clearfix"><strong>￥<if condition="$MO['data']['min_price'] eq $MO['data']['max_price']">{$MO['data']['min_price']}<else/>{$MO['data']['min_price']}-{$MO['data']['max_price']}</if></strong><del>￥<if condition="$MO['data']['min_price_ori'] eq $MO['data']['max_price_ori']">{$MO['data']['min_price_ori']}<else/>{$MO['data']['min_price_ori']}-{$MO['data']['max_price_ori']}</if></del></div>
                    </li>
                </volist>
    			</ul>
    		</dd>
    	</dl>
    </div>
    <div class="return">
    	<img src="{$config_siteurl}statics/zt/images/suning/return.png" alt="返回顶部">
    </div>
</div>
<div class="returnbottom">
	<a href="#">
		<img src="{$config_siteurl}statics/zt/images/suning/tip.png">
		<p>返回顶部</p>
	</a>
</div>
<div class="suning_rtfix">
   <div class="suning_rtfix_con1">
     <div class="suning_rtfix_con2">
       <a class="" href="###">冰箱空调</a>
       <a class="" href="###">洗衣机</a>
       <a class="" href="###">电视</a>
       <a class="" href="###">3C数码</a>
       <a class="" href="###">其他</a>
       <a class="returntop" href="#"><span>Top</span></a>
     </div>
   </div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>
<script type="text/javascript">
	$(function(){
		// 1Ftab切换
		$(".suning_content .floorbox .title dd").find("a").on("click",function(){
			var dataClass = $(this).attr("data-class");
			$(this).addClass("on").siblings().removeClass("on");
			$(this).parents(".title").siblings(".content").hide();
			$(this).parents(".title").siblings("." + dataClass).show();
		});
		// 右侧楼层跳转
		$(window).on("scroll",function(){
            $(document).scrollTop() > $(".floorbox").eq(0).offset().top-400 && $(document).scrollTop() < $(".returnbottom").offset().top-700 ? $(".suning_rtfix").show() : $(".suning_rtfix").hide();
            // 滚动条控制按钮
            $.each($(".floorbox"),function(i,v){
            	if($(v).offset().top - 200 < $(document).scrollTop()){
            		$(".suning_rtfix a").not(".returntop").css({"background":"transparent","color":"#000"});
            		$(".suning_rtfix a").eq(i).css({"background":"#0f7cbf","color":"#fff"});
            	}
            });
            // 按钮控制滚动条
            $.each($(".suning_rtfix a").not(".returntop"),function(i,v){
            	$(v).on("click",function(){
            		$(document).scrollTop($(".floorbox").eq(i).offset().top);
            	});
            });
            // 鼠标滑上去按钮变化
            $(".suning_rtfix a").not(".returntop").hover(function(){
            	$(this).css({"background":"#0f7cbf","color":"#fff"});
            },function(){
            	$(this).css({"background":"transparent","color":"#000"});
            });
		});
	});
</script>
