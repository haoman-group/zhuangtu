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
    <script src="{$config_siteurl}statics/js/zClip/jquery.zeroclipboard.min.js"></script>
    <script src="{$config_siteurl}statics/zt/js/ztvali.js"></script>
</head>
<body>
<div class="wrap">
	<template file="Seller/common/_dectop.php"/>
    <div class="mainwrap">
		<div class="comslide greyslide" >
			<ul class="ulpagenav">
				<li class="on">
					<a href="shopcategorylist">分类管理</a>
				</li>
				<li>
					<a href="shopcatemanage">宝贝管理</a>
				</li>
			</ul>
		</div>

		<div class="wrapright">
			<div class="head popmain">
				<a class="button addnewclass" >添加自定义分类</a>
				<!--<a class="button" >添加自动分类</a>
				<a class="help">使用帮助</a>-->
				<input type="button" class="btnok" value="保存更改">
			</div>
			<div class="select">
				<input type="checkbox" id="achk"><label for="achk">全选</label>
				<input type="button" class="aremove" value="批量删除">
				<a class="chadd">收起</a>
				<span>|</span>
				<a class="chreduce on">展开</a>
			</div>
			<form id="focusform" class="classifybox">
				<div class="classify">
					<ul>
						<li>
							<i></i>
							<i>分类名称</i>
							<!--<i>分类图片</i>-->
							<i>移动子分类</i>
							<i>默认展开</i>
							<i>创建时间</i>
							<i>分类类型</i>
							<i>操作</i>
						</li>
					</ul>
					<volist name="category" id="vo">
							<ul>
								<li data-id="{$vo.id}">
									<i><input type="checkbox"></i>
									<i><em></em><input type="text" name="classname" required value="{$vo.name}"></i>
									<!--<i><a class="addimg">添加图片</a></i>-->
									<i><s></s><s></s><s></s><s></s></i>
									<i><span class="switch <eq name='vo[isunfolder]' value='0'>off</eq>"></span></i>
									<i>{$vo.addtime|date="y-m-d",###}</i>
									<i>{$type[$vo[type]]}</i>
									<i class="operate"><a class="remove">删除</a><a>查看</a><a class="acopy" data-url="{:U('Shop/Product/index',array('cateID'=>$vo['id'],'dom'=>$domain))}">复制链接</a></i>
								</li>
								<volist name="vo[son]" id="v">
										<li data-id="{$v['id']}">
											<i><input type="checkbox"></i>
											<i><input type="text" required name="classname" value="{$v.name}"></i>
											<!--<i><a class="addimg">添加图片</a></i>-->
											<i><s></s><s></s><s></s><s></s></i>
											<i><span class="switch <eq name='v[isunfolder]' value='0'>off</eq>"></span></i>
											<i>{$vo.addtime|date="y-m-d",###}</i>
											<i>{$type[$v[type]]}</i>
											<i class="operate"><a class="remove">删除</a><a>查看</a><a class="acopy" data-url="{:U('Shop/Product/index',array('cateID'=>$v['id'],'dom'=>$domain))}">复制链接</a></i>
										</li>
								</volist>
							</ul>


					</volist>


				</div>
			</form>
		</div>

    </div>
</div>




<script type="text/javascript" language="javascript">
	var addli="<span class='addli'><input type='text' value='添加子分类'></span>";
	var newli="<li data-id='0'><i><input type='checkbox'></i><i><input type='text' name='classname' required ></i><i><s></s><s></s><s></s><s></s></i><i><span class='switch'></span></i><i>16-1-1</i><i>手动分类</i><i class='operate'><a class='remove'>删除</a><a>查看</a></i></li>";
	var newliem="<li data-id='0'><i><input type='checkbox'></i><i><em></em><input type='text' name='classname' required ></i><i><s></s><s></s><s></s><s></s></i><i><span class='switch'></span></i><i>16-1-1</i><i>手动分类</i><i class='operate'><a class='remove'>删除</a><a>查看</a></i></li>";
	$(".classify ul:not(:first)").addClass("add").append(addli);
	$(".classify").on("click","ul .addli input",function(){
		var $addli=$(this).closest(".addli");
		$addli.before(newli);
	});

	$(".acopy").on("copy",function(e){
		var url = $(this).attr("data-url");
		e.clipboardData.clearData();
		e.clipboardData.setData("text/plain", url);
		e.preventDefault();
		$("<div class='msgtip'><div class='mbody'>复制成功</div></div>").appendTo("body").addClass("msgtipon").delay(600).fadeOut(function(){
			$(this).remove();
		});
	});

	$(".mainwrap .classify").on("click","ul li:first-child i:nth-of-type(2) em",function(){
		var $ul=$(this).closest("ul");
		if($ul.hasClass("reduce")){
			$ul.removeClass("reduce").addClass("add");
		}
		else{
			$ul.removeClass("add").addClass("reduce");
		}
	})
	$(".classify").on("click","ul .switch",function(){
		$(this).toggleClass("off")
	});
	$(".head").on("click",".addnewclass",function(){
		var $newul=$("<ul></ul>");
		$newul.append(newliem).addClass("add").append(addli);;
		$(".mainwrap .classify").append($newul);
	})
	$(".classify").on("click","li s",function(){
		var $self=$(this);
		var $ul=$(this).closest("ul");
		var $li=$(this).closest("li");
		var num=$self.index("li i s")%4;
		var numsort=$li.index();
		var lilen=$ul.find("li").length;
		var ulnum=$ul.index(".classify ul");
		var ullen=$(".classify").find("ul").length;
//		console.log(ullen);
//		console.log(ulnum);
//		console.log(num);
//		console.log(numsort);
		var ul;
		var li;
		if(numsort>0){
			if(num==2 && numsort<lilen-1){
				li=$li.clone();
				$li.next().after(li);
				$li.remove();
			}
		}
		if(numsort>1){
			if(num==1){
				li=$li.clone();
				$li.prev().before(li);
				$li.remove();
			}
		}
		if(numsort==0 && ulnum>0 && ulnum<ullen){
			switch(num){
				case 0:
					ul=$ul.clone();
					$(".classify ul:eq(0)").after(ul);
					$ul.remove();
					break;
				case 1:
					if(ulnum>1){
						ul=$ul.clone();
						$ul.prev().before(ul);
						$ul.remove();
					}
					break;
				case 2:
					if(ulnum<ullen-1){
						ul=$ul.clone();
						$ul.next().after(ul);
						$ul.remove();
					}
					break;
				case 3:
					if(ulnum)
						ul=$ul.clone();
					$(".classify").append(ul);
					$ul.remove();
					break;
			}
		}
	})
	$(".classify").on("click","li .operate .remove",function(){
		if(confirm("删除分类后，该分类下的所有产品会丢失分类，是否确认删除分类？")){
			var $li=$(this).closest("li");
			if($li.is(":first-child")){
				$li.closest("ul").remove();
			}
			else{
				$li.remove();
			}
		}
	})
	$(".select .aremove").click(function(){
		var $ulchk=$(".classify ul li:first-child input[type='checkbox']:checked");
		var $lichk=$(".classify ul li:not(:first-child) input[type='checkbox']:checked");

		for(var i=0;i<$ulchk.length;i++){
			$ulchk[i].closest("ul").remove();
		}
		for(var i=0;i<$lichk.length;i++){
			$lichk[i].closest("li").remove();
		}

	})
	$(".select #achk").click(function(){
		$achk=$(".classify input[type='checkbox']");
		$self=$(this);
		if($self.is(':checked')){
			$achk.attr("checked",'true');
		}
		else{
			$achk.removeAttr("checked");
		}
	})
	$(".select .chadd").click(function(){
		$(".mainwrap .classify ul").addClass("add").removeClass("reduce");
	})
	$(".select .chreduce").click(function(){
		$(".mainwrap .classify ul").addClass("reduce").removeClass("add");
	})

	$("#focusform").formdynvali({
		"submbtn": ".btnok",
		"tiptag": "b",
		"isshowtip" : false,
		"fnerror" : function(inp){
			var $li=inp.closest("li");
			if($li.parent().hasClass("add") && $li.index()>0){
				$li.parent().removeClass("add").addClass("reduce");
			}
		},
		"fnsubmit":function(form){
			var $uls = $(".classify ul:gt(0)");
			var artot=[];
			$uls.each(function(i,v){
				var objfirst= {};
				var $firstli= $(v).find("li").eq(0);
				objfirst.id= $firstli.attr("data-id");
				objfirst.name= $firstli.find("[name='classname']").val();
				objfirst.isunfolder= $firstli.find(".switch").hasClass("off")?0:1;
				objfirst.son=[];
				var $lis=$(v).find("li:gt(0)");
				$lis.each(function(ii,vv){
					$li= $(vv);
					var objnowson={};
					objnowson.id= $li.attr("data-id");
					objnowson.name= $li.find("[name='classname']").val();
					objnowson.isunfolder= $li.find(".switch").hasClass("off")?0:1;
					objfirst.son.push(objnowson);
				});
				artot.push(objfirst);
			});
            console.log(artot);
			$.ajax({
				type:"POST",
				url: "/Seller/Api/category?act=save",
				dataType:"json",
				data: {"d":artot},
				timeout:5000,
				success: function(data,status){
					if(data.status==1){
						console.log("操作成功!");
						alert("操作成功!");
					}
					else{
						console.log("操作失败!");
					}
				},
				error:function(XHR, textStatus, errorThrown){
					console.log(textStatus+"\n"+errorThrown);
				}
			});
		}
	});
</script>
</body>
</html>
