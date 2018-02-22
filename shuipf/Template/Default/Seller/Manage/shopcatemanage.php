<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>页面管理</title>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/decorate.css" >
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
</head>
<body>
	<div class="wrap">
		<template file="Seller/common/_dectop.php"/>
		<div class="mainwrap">
			<div class="comslide greyslide" >
				<ul class="ulpagenav">
					<li>
						<a href="shopcategorylist">分类管理</a>
					</li>
					<li class="on">
						<a href="shopcatemanage">宝贝管理</a>
					</li>
				</ul>
			</div>

			<div class="wrapright">
				<div class="head popmain">
					<form name="search_product" action="" >
						<input type="hidden" value="1" name="search">
						<input type="text" placeholder="请输入宝贝名称" name="product_name">
						<label class="label">价格:</label>
						<input type="text" class="price" name="min_price">
						<label>-</label>
						<input type="text" class="price" name="max_price">
						<label class="label">状态:</label>
						<select name="status">
							<option value="all">全部</option>
							<option value="inhouse">仓库中</option>
							<option value="selling">出售中</option>
						</select>
						<span></span>
						<a href="javascript:document.search_product.submit();" class="btn">搜索</a>

						<span class="tip">温馨提示：删除宝贝请在卖家中心操作。</span>
					</form>
				</div>
				<div class="select">
					<input type="checkbox" id="achk" class="achk">
					<label for="achk">全选</label>
					<span class="abtnclass">
						批量分类
						<div class="ulbox mutiop">
							<volist name="category" id="cate">
								<ul>
									<h6><empty name='cate[son]'><input type="checkbox" id="chk{$cate[id]}" value="{$cate[id]}"></empty><label for="chk{$cate[id]}">{$cate[name]}</label></h6>
									<volist name="cate[son]" id="c">
										<li>
											<input type="checkbox" id="chk{$c[id]}" value="{$c[id]}">
											<label for="chk{$c[id]}">{$c['name']}</label>
										</li>
									</volist>
								</ul>
							</volist>
							<div class="btndiv">
								<a href="javascript:void(0)" class="btnsave">应用</a>
							</div>
						</div>
					</span>
					<div class="right pagebox">
						{$page}
					</div>
				</div>
				<table class="tbprocate">
					<thead>
						<tr>
							<td></td>
							<td>宝贝名称</td>
							<td>价格</td>
							<td>所属分类</td>
							<td>编辑分类</td>
							<td>创建时间</td>
							<td>状态</td>
							<td>操作</td>
						</tr>
					</thead>
					<tbody>
						<volist name='data' id='vo'>
							<tr>
								<td>
									<input data-proid="{$vo['id']}" type="checkbox">
									<img src="{$vo['headpic']}"></td>
								<td>
									<a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}" target="_blank">
									<?php 
									// $title = empty($vo['designtype'])?$:implode("/",array_filter(unserialize($vo['title'])));
									echo str_cut($vo['title'],35);
									?>
									</a>
								</td>
								<td>
									<span>¥</span> <strong>{$vo.price}</strong>
								</td>
								<td>
									<a>分类</a>
									<a class="more">
										更多(
										<span>{:count($vo[shopin_category])}</span>
										)
										<ul>
											<volist name="vo[shopin_category]" id="v">
												<li>{$v}</li>
											</volist>
										</ul>
									</a>
								</td>
								<td>
									<span class="abtnclass">
										编辑分类
										<div class="ulbox" data-proid="{$vo.id}">
											<volist name="category" id="cate">
												<ul>
													<h6><empty name='cate[son]'><input type="checkbox" id="chk{$cate[id]}_pro{$vo.id}" data-name="{$cate[name]}" value="{$cate[id]}" <?php if($vo['shopin_category'][$cate[id]]) echo 'checked';?> ></empty> <label for="chk{$cate[id]}_pro{$vo.id}">{$cate[name]}</label></h6>
													<volist name="cate[son]" id="c">
														<li>
															<input type="checkbox" id="chk_{$c[id]}_pro{$vo.id}" data-name="{$c['name']}" value="{$c[id]}" <?php if($vo['shopin_category'][$c['id']]) echo 'checked'; ?>>
															<label for="chk_{$c[id]}_pro{$vo.id}">{$c['name']}</label>
														</li>
													</volist>
												</ul>
											</volist>
											<div class="btndiv">
												<a href="javascript:void(0)" class="btnsave">应用</a>
											</div>

										</div>
									</span>
								</td>
								<td>{$vo.addtime|date='Y-m-d',###}</td>
								<td>{$status[$vo[status]]}</td>
								<td>
									<a class="btn" target="_blank" href="{:U('Seller/Product/edit',array('id'=>$vo[id]))}">编辑</a>
									<!--<a href="">下架</a>-->
								</td>
							</tr>
						</volist>
					</tbody>
				</table>
			</div>

		</div>
	</div>

<script type="text/javascript" language="javascript">
$(function(){

	$(".ulbox .btnsave").click(function(){
		var $ulbox= $(this).closest(".ulbox");
		var archkval=[];
		var arproname=[];
		$ulbox.find("[type='checkbox']:checked").each(function(i,v){
			archkval.push($(this).val());
			arproname.push($(this).attr("data-name"));
		});
		var arproid =[];
		
		if(($ulbox).hasClass("mutiop")){
			$(".tbprocate tr td:first-child [type='checkbox']:checked").each(function(i,v){
				arproid.push($(this).attr("data-proid"));
			});
		}
		else{
			arproid.push($ulbox.attr("data-proid"));
		}

		if(arproid.length===0){alert("请先选择产品");return false;}
		$.ajax({
			type:"POST",
			url: "{:U('Seller/Api/category',array('act'=>'product'))}",
			dataType:"json",
			data: {"proid":arproid.toString(),"strcate":archkval.toString(),"name":arproname.toString()},
			timeout:5000,
			success: function(data,status){
				if(data.status==1){
					alert("操作成功!");
					if(($ulbox).hasClass("mutiop")){
						window.location.reload();
					}
					else{
						$(".tbprocate .more").each(function(i,v){
							$self = $(this);
							$tr = $(".tbprocate tr").eq(i+1);
							$ulbox = $tr.find(".ulbox");
							$chkinpt = $ulbox.find("[type='checkbox']:checked");
							var chkinptnum =$chkinpt.length;
							$self.find("span").empty();
							$self.find("span").html(chkinptnum);
							console.log(chkinptnum);
							$self.find("ul").empty();
							if(chkinptnum!=0){
								var str = "<li>";
								for(var j = 0;j < chkinptnum; j++){
									var name = $chkinpt.eq(j).attr("data-name");
									str+=name+"</li>";
								}
								$self.find("ul").html(str);
							}
						});
					}


				}
				else{
					alert("操作失败:"+data.msg);
				}
			},
			error:function(XHR, textStatus, errorThrown){
				console.log(textStatus+"\n"+errorThrown);
			}
		});
		return false;
	});

	$(".achk").click(function(){
		$(".tbprocate tr td:first-child [type='checkbox']").prop("checked",$(this).prop("checked"));
	});

	$(".tbprocate tr td:first-child [type='checkbox']").click(function(){
		$(".achk").prop("checked") && (!$(this).prop("checked")) && $(".achk").prop("checked",false);
	})
})
</script>
</body>
</html>
