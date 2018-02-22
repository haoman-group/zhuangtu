<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>秒杀池</title>
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
  <img src="{$config_siteurl}statics/zt/images/seckill/change_img.png" class="whole_img" />
</div>
<div class="limit_skillbg">
	<h5 class="time"><img src="{$config_siteurl}statics/zt/images/seckill/time.png" /></h5>
	<div class="title"><img src="{$config_siteurl}statics/zt/images/seckill/limit.png" alt=""></div>
	<div class="container">
		<ul class="recom_shop clearfix">
			<if condition="$pool['219']['2']['data']['number'] gt $pool['219']['2']['count']">
			<li>
				<h2>NO.1 <img src="{$config_siteurl}statics/zt/images/seckill/one.png" alt=""></h2>
				<h5>{$pool['219']['2']['title']}{$pool['219']['2']['description']}</h5>
				<div class="img">
					<img src="{$pool['219']['2']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['2']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['2']['data']['number']-$pool['219']['2']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['2']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['2']['count']/$pool['219']['2']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['2']['count']/$pool['219']['2']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="{:U('Shop/Product/show',array('id'=>$pool['219']['2']['dataid']))}" class="btn">立即抢购</a>
				</div>
			</li><else/>
			<li class="sellout">
				<h2>NO.1 <img src="{$config_siteurl}statics/zt/images/seckill/one.png" alt=""></h2>
				<h5>{$pool['219']['2']['title']}{$pool['219']['2']['description']}</h5>
				<div class="img">
					<div class="shadow"><span>已售完</span></div>
					<img src="{$pool['219']['2']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['2']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['2']['data']['number']-$pool['219']['2']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['2']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['2']['count']/$pool['219']['2']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['2']['count']/$pool['219']['2']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="javascript:void(0)" class="btn">立即抢购</a>
				</div>
			</li>
		    </if>
		    <if condition="$pool['219']['3']['data']['number'] gt $pool['219']['3']['count']">
			<li>
				<h2>NO.2</h2>
				<h5>{$pool['219']['3']['title']}{$pool['219']['3']['description']}</h5>
				<div class="img">
					<img src="{$pool['219']['3']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['3']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['3']['data']['number']-$pool['219']['3']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['3']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['3']['count']/$pool['219']['3']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['3']['count']/$pool['219']['3']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="{:U('Shop/Product/show',array('id'=>$pool['219']['3']['dataid']))}" class="btn">立即抢购</a>
				</div>
			</li><else/>
			<li class="sellout">
				<h2>NO.2</h2>
				<h5>{$pool['219']['3']['title']}{$pool['219']['3']['description']}</h5>
				<div class="img">
					<div class="shadow"><span>已售完</span></div>
					<img src="{$pool['219']['3']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['3']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['3']['data']['number']-$pool['219']['3']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['3']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['3']['count']/$pool['219']['3']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['3']['count']/$pool['219']['3']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="javascript:void(0)" class="btn">立即抢购</a>
				</div>
			</li>
		    </if>
		    <if condition="$pool['219']['1']['data']['number'] gt $pool['219']['1']['count']">
			<li>
				<h2>NO.3</h2>
				<h5>{$pool['219']['1']['title']}{$pool['219']['1']['description']}</h5>
				<div class="img">
					<img src="{$pool['219']['1']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['1']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['1']['data']['number']-$pool['219']['1']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['1']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['1']['count']/$pool['219']['1']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['1']['count']/$pool['219']['1']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="{:U('Shop/Product/show',array('id'=>$pool['219']['1']['dataid']))}" class="btn">立即抢购</a>
				</div>
			</li><else/>
			<li class="sellout">
				<h2>NO.3</h2>
				<h5>{$pool['219']['1']['title']}{$pool['219']['1']['description']}</h5>
				<div class="img">
					<div class="shadow"><span>已售完</span></div>
					<img src="{$pool['219']['1']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['1']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['1']['data']['number']-$pool['219']['1']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['1']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['1']['count']/$pool['219']['1']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['1']['count']/$pool['219']['1']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="javascript:void(0)" class="btn">立即抢购</a>
				</div>
			</li>
		    </if>
		    <if condition="$pool['219']['4']['data']['number'] gt $pool['219']['4']['count']">
			<li>
				<h2>NO.4</h2>
				<h5>{$pool['219']['4']['title']}{$pool['219']['4']['description']}</h5>
				<div class="img">
					<img src="{$pool['219']['4']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['4']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['4']['data']['number']-$pool['219']['4']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['4']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['4']['count']/$pool['219']['4']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['4']['count']/$pool['219']['4']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="{:U('Shop/Product/show',array('id'=>$pool['219']['4']['dataid']))}" class="btn">立即抢购</a>
				</div>
			</li><else/>
			<li class="sellout">
				<h2>NO.4</h2>
				<h5>{$pool['219']['4']['title']}{$pool['219']['4']['description']}</h5>
				<div class="img">
					<div class="shadow"><span>已售完</span></div>
					<img src="{$pool['219']['4']['picture']['0']}" alt="">
				</div>
				<div class="price_box left">
					<p class="old"><del>RMB{$pool['219']['4']['data']['max_price_ori']}</del> <span>限量<i>{$pool['219']['4']['data']['number']-$pool['219']['4']['count']}</i>件</span></p>
					<p class="now"><span>秒杀价：</span><strong>{$pool['219']['4']['data']['min_price']}</strong></p>
					<div class="sold">已售  
                    	<p><span style="width:<?php echo (int) (($pool['219']['4']['count']/$pool['219']['4']['data']['number']) * 100); ?>%"></span></p>
                    	<i><?php echo (int) (($pool['219']['4']['count']/$pool['219']['4']['data']['number']) * 100); ?>%</i>
                    </div>
				</div>
				<div class="btn_box right">
					<a href="javascript:void(0)" class="btn">立即抢购</a>
				</div>
			</li>
		    </if>
		</ul>
		<ul class="new_shop clearfix">
			<volist name="pool['219']" id ="vo"  >
				<?php   if(in_array($vo['place'],array(1,2,3,4))){continue;}?>
				<if condition="$vo['count'] egt $vo['data']['number']">
			<li class="sell_out">
				<img src="{$config_siteurl}statics/zt/images/seckill/new.png" alt="" class="new">
				<div class="shade">
					<span>已售罄</span>
				</div>
				<a class="img" href=""><img src="{$vo['picture']['0']}" alt=""></a>
				<div class="bottom">
					<div class="desc_price">
						<p class="description">{$vo['title']}</p>
						<p class="price"><del>￥{$vo['data']['max_price_ori']}</del>秒杀价：<strong>{$vo['data']['min_price']}</strong> </p>
					</div>
					<div class="btn_num">
						<a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" class="btn">立即抢购</a>
						<!-- <p>限量81件</p> -->
					</div>  
				</div>
				<div class="info">
					<div class="sold">已售 
						<p><span style="width:<?php  echo (int) ( ($vo['count']/$vo['data']['number']) * 100 ) ?>%"></span></p>
						<i><?php  echo (int) ( ($vo['count']/$vo['data']['number']) * 100 ) ?>%</i>
					</div>
					<span class="num">限量<i>{$vo['data']['number']-$vo['count']}</i>件</span>
				</div>
			</li><else/>
			<li>
				<img src="{$config_siteurl}statics/zt/images/seckill/new.png" alt="" class="new">
				<a class="img" href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}"><img src="{$vo['picture']['0']}" alt=""></a>
				<div class="bottom">
					<div class="desc_price">
						<p class="description">{$vo['title']}</p>
						<p class="price"><del>￥{$vo['data']['max_price_ori']}</del>秒杀价：<strong>{$vo['data']['min_price']}</strong> </p>
					</div>
					<div class="btn_num">
						<a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" class="btn">立即抢购</a>
						<!-- <p>限量81件</p> -->
					</div>  
				</div>
				<div class="info">
					<div class="sold">已售 
						<p><span style="width:<?php  echo (int) ( ($vo['count']/$vo['data']['number']) * 100 ) ?>%"></span></p>
						<i><?php  echo (int) ( ($vo['count']/$vo['data']['number']) * 100 ) ?>%</i>
					</div>
					<span class="num">限量<i>{$vo['data']['number']-$vo['count']}</i>件</span>
				</div>
			</li>
		</if>
			</volist>
		</ul>
	</div>
</div>
<div class="next_skillbg">
	<h5 class="time"><img src="{$config_siteurl}statics/zt/images/seckill/next.png" /></h5>
	<div class="title"><img src="{$config_siteurl}statics/zt/images/seckill/nextshop.png" alt=""></div>
	<div class="container">
		<div class="box clearfix">
		    <div class="btnleft"></div>
		    <div class="centerbox">
		        <ul class="shopbox">
    				<volist name="pool['222']" id="vo" offset='0' length='9'>
	    				<li>
	    					<!-- <img src="{$config_siteurl}statics/zt/images/seckill/new.png" alt="" class="new"> -->
	    					<a class="img" href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}"><img src="{$vo['picture']['0']}" alt=""></a>
	    					<div class="future">
	    						<p>{$vo.title}</p>
	                            <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" class="btn">准备开启</a>
	    					</div>
	    				</li>
    			    </volist>
		        </ul>
		    </div>
		    <div class="btnright"></div>
		</div>
		<div class="box clearfix">
		    <div class="btnleft"></div>
		    <div class="centerbox down">
		        <ul class="shopbox">
    				<volist name="pool['222']" id="vo" offset="8" length="4">
	    				<li>
	    					<!-- <img src="{$config_siteurl}statics/zt/images/seckill/new.png" alt="" class="new"> -->
	    					<a class="img" href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}"><img src="{$vo['picture']['0']}" alt=""></a>
	    					<div class="future">
	    						<p>{$vo.title}</p>
	                            <a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" class="btn">准备开启</a>
	    					</div>
	    				</li>
    			    </volist>
		        </ul>		        
		    </div>
		    <div class="wait">
		    	<img src="{$config_siteurl}statics/zt/images/seckill/wait.png" />
		    </div>
		    <div class="btnright waitbtn"></div>
		</div>
	</div>
</div>
<div class="conwhole whole_imgbox">
  <img src="{$config_siteurl}statics/zt/images/seckill/footer.png" class="whole_img" />
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>
<script>
	$(function(){
			var shopli = $(".next_skillbg .centerbox .shopbox").find("li:eq(0)").outerWidth(true)*$(".next_skillbg .centerbox .shopbox").find("li").length;
			$(".next_skillbg .centerbox .shopbox").css({'width':shopli});
			function moveleft($this){
				$this.siblings(".centerbox").find(".shopbox").animate({left:-$this.siblings(".centerbox").find(".shopbox").find("li:eq(0)").outerWidth(true)},function(){
					var first = $this.siblings(".centerbox").find(".shopbox").find("li:first");
					$this.siblings(".centerbox").find(".shopbox").append(first).css({left:0});
				})
			}

			function moveright($this){
				var first = $this.siblings(".centerbox").find(".shopbox").find("li:first");
				var last = $this.siblings(".centerbox").find(".shopbox").find("li:last");
				$this.siblings(".centerbox").find(".shopbox").prepend(last).css({left:-$this.siblings(".centerbox").find(".shopbox").find("li:eq(0)").outerWidth(true)}).animate({left:0});
				
			}
			$(".next_skillbg .btnleft").click(function(){
				if($(".next_skillbg .centerbox .shopbox").is(":animated")){return false}
				moveleft($(this));
			})
			$(".next_skillbg .btnright").click(function(){
				if($(".next_skillbg .centerbox .shopbox").is(":animated")){return false}
				moveright($(this));
			})

			// 背景颜色
			$(".limit_skillbg").css({"background-color":"#ffd800"}).find(".title").css({"background":"#f1ad33"});
			$(".next_skillbg").css({"background":"#6b149c"}).find(".title").css({"background":"#892ba5"});
	})
</script>