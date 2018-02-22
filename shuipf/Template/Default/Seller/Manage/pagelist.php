<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>模板管理</title>
	<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/decorate.css" >
	<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
	<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base.js"></script>
	<script src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
	<script src="{$config_siteurl}statics/zt/js/decpage.js"></script>
</head>
<title></title>
<body>

<div class="wrap">

	<template file="Seller/common/_dectop.php"/>
    
    
    <div class="mainwrap">
<!--    	<div class="comslide greyslide" >-->
<!--			<ul class="ulpagenav">-->
<!--				<li class="on">-->
<!--					<a href="">电脑端页面</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="">手机端页面</a>-->
<!--				</li>-->
<!--				<li>-->
<!--					<a href="">多端同步页面</a>-->
<!--				</li>-->
<!--			</ul>-->
<!--        </div>-->
		<div class="commain ">
			<div class="pagelistwrap">
				<div class="topbtns">
					<a href="pageadd">新建页面</a>
					<p class="btnstip">可对页面进行添加，编辑，删除等操作</p>
				</div>
				<div class="pagelisttab">
					<ul class="chtitul clearfix" data-tag="chpagetb">
						<li class="chtitli on">基础页</li>
<!--						<li class="chtitli">宝贝详情页</li>-->
<!--						<li class="chtitli">宝贝列表页</li>-->
						<li class="chtitli">自定义页</li>
					</ul>
				</div>
				<div class="pagelistcon chconul" data-tag="chpagetb">
					<table class="chconli" style="display: table">
						<thead>
							<tr>
								<th>页面名称</th>
								<th>页面地址</th>
								<th>当前状态</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>首页</td>
								<td><!-- <a class="copy" href="javascript:void(0)">复制</a> -->{:shopurl($shop[domain])}</td>
								<td>已发布</td>
								<td><a href="{:U('decorate')}" class="btndecorate">页面装修</a></td>
							</tr>

						</tbody>
					</table>
					<table class="chconli" >
						<thead>
						<tr>
							<th>页面名称</th>
							<th>页面地址</th>
							<th>当前状态</th>
							<th>操作</th>
						</tr>
						</thead>
						<tbody>
							<notempty name="pagelist">
								<volist name="pagelist" id="vo">
									<tr>
										<td><span class="pagename">{$vo.title}</span> <a href="javascript:void(0)" data-pageid="{$vo.id}" class="btn btnedit edit">编辑</a> </td>
										<td><!-- <a class="copy" href="javascript:void(0)">复制</a>  -->{:diypageurl($vo[id],$shop['domain'])}</td>
										<td>{$status[$vo['status']]}</td>
										<td><a href="{:U('decorate',array('pageid'=>$vo['id']))}" class="btndecorate">页面装修</a><a href="{:U('pagedel',array('pageid'=>$vo['id']))}" class="btn recovery">删除</a> </td>
									</tr>
								</volist>
							<else/>
								<tr><td>暂无页面</td></tr>
							</notempty>
						</tbody>

					</table>
				</div>

			</div>
		</div>

    </div>
</div>

<div class="pops" style="display: none;" >
	<div class="popwrap custom" id="poppagename" style="display: ">
		<a href="javascript:void(0)" class="closepop"><span></span></a>
		<div class="popcon">
			<div class="pophead">自定义名称</div>
			<div class="popbody">
				<form action="">
					<input type="text" class="page-name-input" id="changename">
					<input type="hidden" value="" name="pageid">
					<div class="btndiv preservation">
						<a href="javascript:void(0)" class="btn btnok">保存</a>
						<a href="javascript:void(0)" class="btn btncancle">取消</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>


<script type="text/javascript" language="javascript">
	$(function(){
		$(".edit").click(function(){
			var editna=($(this).siblings("span").html());
			$(".pops").show().find("#poppagename").show().find("#changename").val(editna).siblings("[name='pageid']").val($(this).attr("data-pageid"));
			return false;

		});

		$(".btncancle").click(function(){
			$(".pops").hide().find("#poppagename").hide();
			return false;
		});

		$("#poppagename .btnok").click(function(){
			var $form= $(this).closest("form");
			var pageid= $form.find("[name='pageid']").val();
			var valpagename=$(".page-name-input").val();
			if(valpagename.replace(/\s/gi,"").length===0){

				console.log("请填写页面名称");
				return false;
			}

			$.ajax({
				type:"GET",
				url: "{:U('Seller/Manage/pagechangename')}?pageid="+pageid+"&v="+valpagename,
				dataType:"json",
				timeout:5000,
				success: function(data,status){
					if(data.status==1){
						$("[data-pageid='"+pageid+"']").siblings("span").html(valpagename);
						$(".pops").hide().find("#poppagename").hide();
					}
					else{

//					console.log("修改失败"+data.msg);
					}
				}
				,error:function(XHR, textStatus, errorThrown){
					console.log(textStatus+"\n"+errorThrown);
				}
			});

		});
	});
</script>
</body>
</html>
