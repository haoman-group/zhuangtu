<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>大家团</title>
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/discount_sale.css">
	<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
	<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
	<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base.js"></script>
</head>
<body>
<template file="Content/common/_header.php"/>
<div id="groupBuy_logo">
	<div class="content">
		<img src="{$config_siteurl}statics/zt/images/groupBuy/logo.png" alt="大家一起团" />
	</div>
</div>
<div id="rulesGame">
	<div class="content">
		<a href="javascript:;" class="tips"></a>
		<div class="rulesimg"><img src="{$config_siteurl}statics/zt/images/groupBuy/rulesimg.png" alt="活动流程" /></div>
		<dl class="rulestxt">
			<dt>活动详细规则说明：</dt>
			<dd>1、参团商品由商家<span>每日限时</span>提供，每件商品标出<span>五档价位</span>。</dd>
			<dd>2、顾客根据需求，从<span>商品池中勾选</span>喜爱商品，添加到<span>团购篮</span>中。</dd>
			<dd>3、每<span>多添加</span>一个产品，系统自动按更新议价位计算<span>购买价位</span>。</dd>
			<dd>4、<span>同时</span>购买五件，享受最<span>优惠价格</span>。</dd>
			<dd>5、单件产品可以<span>反复</span>添加。</dd>
			<dd>6、加入购物车后，还可更改产品。</dd>
		</dl>
	</div>
</div>
<div id="buynum" class="">
	<div class="content">
		<form action="{:U('Buyer/GroupBuy/addCartByGroupBuy')}" method="post">
		<table>
			<tr>
				<th></th>
				<th></th>
				<th>便宜</th>
				<th></th>
				<th>更便宜</th>
				<th></th>
				<th>更更便宜</th>
				<th></th>
				<th>... ...</th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<td>
					<div class="shopping">
					   <img src="{$config_siteurl}statics/zt/images/groupBuy/add.png" alt="增加">
					</div>
                    <p class="price">
                    	<del>原价：￥</del>
                    	<strong>折后价：￥</strong>
                    	<input name="productIds[]" value="" hidden>
                    </p>
				</td>
				<td>+</td>
				<td>
					<div class="shopping">
					   <img src="{$config_siteurl}statics/zt/images/groupBuy/add.png" alt="增加">
					</div>
                    <p class="price">
                    	<del>原价：￥</del>
                    	<strong>折后价：￥</strong>
                    	<input name="productIds[]" value="" hidden>
                    </p>
				</td>
				<td>+</td>
				<td>
					<div class="shopping">
					   <img src="{$config_siteurl}statics/zt/images/groupBuy/add.png" alt="增加">
					</div>
                    <p class="price">
                    	<del>原价：￥</del>
                    	<strong>折后价：￥</strong>
                    	<input name="productIds[]" value="" hidden>
                    </p>
				</td>
				<td>+</td>
				<td>
					<div class="shopping">
					   <img src="{$config_siteurl}statics/zt/images/groupBuy/add.png" alt="增加">
					</div>
                    <p class="price">
                    	<del>原价：￥</del>
                    	<strong>折后价：￥</strong>
                    	<input name="productIds[]" value="" hidden>
                    </p>
				</td>
				<td>+</td><input name="productids[]" value="" hidden>
				<td>
					<div class="shopping">
					   <img src="{$config_siteurl}statics/zt/images/groupBuy/add.png" alt="增加">
					</div>
                    <p class="price">
                    	<del>原价：￥</del>
                    	<strong>折后价：￥</strong>
                    	<input name="productIds[]" value="" hidden>
                    </p>
				</td>
				<td>=</td>
				<td>
					<div class="shopping totle"><input type="submit" value="确认购买"></div>
                    <p class="price all">
                    	<del>原价：￥</del>
                    	<strong>折后价：￥</strong>
                    </p>
				</td>
			</tr>
		</table>
		<input name="act_id" value="{$Activity.id}" hidden>
		</form>
		<p><img src="{$config_siteurl}statics/zt/images/groupBuy/bntext.png" alt="勾选团购栏"></p>
	</div>
</div>
<div id="shopShow">
	<div class="content">
		<div class="title"><img src="{$config_siteurl}statics/zt/images/groupBuy/shopshow.png" alt="商品池"></div>
		<ul class="shop clearfix">
			<volist name="data" id="vo">
				<if condition="($i-1)%5 eq 0">
					</ul><ul class="shop clearfix">
				</if>

				<li>
					<a href="{:U('Shop/Product/show',array('id'=>$vo['dataid']))}" title="{$vo.title}">{$vo.title}</a>
					<a href="javascript:void(0)"><img class="shops" src="{$vo['picture']['0']}" alt="groupBuyImage"></a>
					<p class="clearfix"><i>￥</i><strong>{$vo.max_price}</strong><span></span></p>
					<em>
						<img src="{$config_siteurl}statics/zt/images/groupBuy/choose.png" alt="已选" data-id="{$vo.id}">
						<!-- <input type="hidden" "> -->
					</em>
					<label for="add">加入</label>
				</li>
			</volist>
		</ul>
	</div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
<script>
	$(function(){


    	/*团购框固定*/
    	$(document).scroll(function(){
    	   
           if($(document).scrollTop()>890){

    		   $("form").addClass("buynum_fix");
    		}else{
    		   $("form").removeClass("buynum_fix");
    		}		   
    	})


		$(".tips").click(function(){
			$(".rulestxt").show();
			$(".rulesimg").hide();
		})
		var num = -1;

		function select(selector){
			selector.toggleClass("on");

			var $li = selector.closest("li");
			var src = $li.find("img").attr("src");
			var id = selector.find("img").attr("data-id");
			var emnum = "li"+$li.index(".shop li");
			var val = $(".price").find("input[value="+id+"]");
			var tds = val.parents(".price");
			$li.attr("data-num",emnum);
			if(selector.hasClass("on")){
				if(num == 4){
					selector.removeClass("on");
					layer.msg('您已选满商品');

				}else{

					num += 1;
					var index = selector.index(".shop em");
					$(".shopping img:eq(" + num + ")").attr("src",src);
					$(".price input:eq(" + num + ")").attr("value",id);
					$(".shopping:eq(" + num + ")").attr("data-num",emnum);
				}
			}else{
				if(num !== -1){
					var nums = $li.attr("data-num");
					$shopping = $(".shopping[data-num='"+nums+"']").eq(0);
					$td = $shopping.find("img").closest(".shopping");
					var shopnum = $td.index("table .shopping");
					// console.log(shopnum);
					for(var i = shopnum;i < num;i++){
						i +=1;
						srcs = $(".shopping img:eq(" +i+ ")").attr("src");
						datanum = $(".shopping:eq(" +i+ ")").attr("data-num");
						var val = $(".price input:eq(" +i+ ")").attr("value");
						var del = $(".price del:eq(" +i+ ")").html();
						var strong = $(".price strong:eq(" +i+ ")").html();
						// console.log(i);
						i -= 1;
						$(".shopping img:eq(" +i+ ")").attr("src",srcs);
						$(".shopping:eq(" +i+ ")").attr("data-num",datanum);
						$(".price input:eq(" +i+ ")").attr("value",val);
						$(".price del:eq(" +i+ ")").html(del);
						$(".price strong:eq(" +i+ ")").html(strong);
					}
					$(".shopping img:eq(" +num+")").attr("src","{$config_siteurl}statics/zt/images/groupBuy/add.png");
					$(".shopping:eq(" +i+ ")").attr("data-num","");
					$(".price input:eq(" +i+ ")").attr("value","");
					$(".price del:eq(" +i+ ")").html("原价：￥");
					$(".price strong:eq(" +i+ ")").html("折后价：￥");
					num -= 1;
					
				}
			}
		 $.ajax({
		     type : "POST",
		     url : '{:U("Api/Activity/charge")} ',
		     async : false,
		     dataType : "json",
		     timeout : 5000,
		     data : $("form").serialize(),
		     success : function(result) {
		         var data = result.data;

		         $.each(data,function(i,v){
		         	if(!isNaN(i)){
		         		var $inp = $(".price").find("input[value='"+i+"']");
		         		$inp.siblings("del").html("原价：￥"+v.original_price.toFixed(2)).siblings("strong").html("折后价：￥"+v.current_price.toFixed(2));
		         	}
		         })

		         // console.log($(".price").find("input[value="+id+"]"));
		         //var val = $(".price").find("input[value="+id+"]");
		         //var tds = val.parents(".price");
		         // console.log(tds);

		         // if(data[id]){
		         // 	tds.find("del").html("原价：￥"+data[id]["original_price"]);
		         //    tds.find("strong").html("折后价：￥"+data[id]["current_price"]);
		         // }
		         
		         $(".all").find("del").html("原价：￥"+data["original_price_totle"])
                 $(".all").find("strong").html("折后价：￥"+data["current_price_totle"])
		         // console.log(data["current_price_totle"]);

		         			// console.log(data[id]["current_price"]);
		         			// console.log(data[id]["original_price"]);

		         
		         
		     },
		     error : function(XMLHttpRequest, textStatus, errorThrown) {
		         
		     }
		 });
		}
		$(".shop em").click(function(){
			select($(this));
								
		})
		$(".shop .shops").click(function(){
			select($(this).parents("li").find("em"));
								
		})
	})
</script>
</body>
</html>