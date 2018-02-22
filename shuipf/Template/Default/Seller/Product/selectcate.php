<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js//base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
</head>
<body>
  <!--背景容器-->
  <template file="Seller/common/_header.php"/>
<div class="productupload_nav">
	<ul>
    	<li <eq name="cateType" value="1">class='on'</eq> >设计<span></span></li>
		<li <eq name="cateType" value="2">class='on'</eq>>工人<span></span></li>
		<li <in  name="cateType" value="3,4,5">class='on'</in>>产品<span></span></li>
		<li <eq  name="cateType" value="21">class='on'</eq>>辅材<span></span></li>
    </ul>
</div>

<div class="productupload_main">
     <form action="{:U('Seller/Product/add')}" method="get">
     <div class="productform">
     	<div class="head">
        	<strong>请您选择：</strong><span></span><span class="selprocatename"></span>
        </div>
        <div class="cateout">
        	<a href="" class="prev">&lt;</a>
            <a href="" class="next">&gt;</a>
            <div class="catezhe"><img src="../../statics/zt/images/sellercenter/loading-2.gif"></div>
            <div class="catein">
                <ul class="chose" style="left:0px;">

					<li class="catebox">
						<div class="filter">
							<input class="sear" type="text"  onkeyup="search(this)" placeholder="输入名称/拼音首字母">

						</div>
						<div class="abox">
							<volist name="category" id="vo">
								<a href="javascript:void(0)" data-v="{$vo.cid}" data-cid="{$vo.cid}" data-vid="{$vo.vid}" data-hasbrand="{$vo.hasbrand}" class="type <eq name="vo['hascate']" value="1">haschild</eq> <eq name="vo['hasbrand']" value="1">haschild</eq> <empty name='vo[hascate]'>lastcate</empty>">{$vo.name}</a>
							</volist>
						</div>
					</li>

				</ul>
            </div>
        </div>      
     </div>
     <input type="submit" class="ruletitle dis"  disabled value="我已阅读以下规则，现在发布宝贝" >
     <input type="hidden" name="inpcid">
     <input type="hidden" name="inpvid">
     </form>
     <div class="rule">
     	<div class="tit">发布须知：</div>  
        <p>装途规则</p>  
     </div>
</div>
  
<template file="common/_promise.php"/>
<template file="Seller/common/_footer.php"/>
<script type="text/javascript">
    //全局变量
    var GV = {
      DIMAUB: "{$config_siteurl}",
      JS_ROOT: "{$config_siteurl}statics/js/"
    };
    </script>
<script src="{$config_siteurl}statics/js/wind.js"></script>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>



<script>

function clickcatea($a){
	var liwidth=393;
	$li=$a.closest("li");
	$ul=$li.parent();

	
	$li.hasClass("catebox") && $a.hasClass("lastcate") && !$a.hasClass("on") && $("[name='inpcid']").val($a.data("cid")) && $("[type='submit']").prop("disabled",false).removeClass("dis");
	$li.hasClass("catebox") && !$a.hasClass("lastcate") && $("[name='inpcid']").val("") && $("[type='submit']").prop("disabled",true).addClass("dis");
		
	$("[name='inpvid']").val(  $li.hasClass("probox") ? $a.data("vid") : "" );
	
	if($a.hasClass("on")){
		var temp=$ul.find("li").length- $li.index()-1;
		temp>0 && $li.next("li").find(".on").removeClass("on");
		temp-- >0 && $li.next("li").nextAll("li").remove() && $li.index()>0 && $ul.css("left",($li.index()-1)*-1*liwidth+"px");		
	}
	else{
		if($a.hasClass("haschild")){
			$(".catezhe").show();	
			$li.nextAll("li").remove();
			$.ajax({
				type:"GET",
				url: "/Api/Product/getcat?cid="+$a.data("cid")+"&vid="+$a.data("vid")+"&hasbrand="+$a.data("hasbrand"),
				dataType:"json",
				timeout:5000,
				success: function(data,status){
					var armsg=data["content"];
					var orastr="";
					var letter="";
					var iscate = data["type"]==="cate";
					$.each(armsg,function(i,v){
						var haschild = v["hascate"] || v["hasbrand"];						
						var islastcate = iscate && !v["hascate"];
						var islastpro = !iscate && !v["hasbrand"];
						var cn="type";
						cn+= " "+ (haschild?"haschild":"") +" "+ (islastcate?"lastcate":"")+" "+ (islastpro?"lastpro":"");
						orastr+="<a href=\"javascript:void(0)\" data-spell=\""+v["spell"]+"\" data-cid=\""+v["cid"]+"\" data-vid=\""+v["vid"]+"\" data-hasbrand=\""+v["hasbrand"]+"\" data-v=\""+v["id"]+"\" class=\""+cn+"\">"+(letter!==v["spell"].substring(0,1) && (letter=v["spell"].substring(0,1)) ?"<span>"+letter+"</span>":"") +""+v["name"]+"</a>";
					});
					orastr="<li class=\""+(iscate?"catebox":"probox")+"\"><div class=\"filter\"><input class=\"sear\" onkeyup=\"search(this)\" type=\"text\" placeholder=\"输入名称/拼音首字母\"></div><div class=\"abox\">"+orastr+"</div></li>";
					$ul.append(orastr);
					$a.addClass("on").siblings().removeClass("on");
					$ul.find("li:last a").click(function(){
						clickcatea($(this));
					});
					
					$li.index()>0 && $ul.css("left",($li.index()-1)*-1*liwidth+"px");
					$(".catezhe").hide();
					
				}
				,error:function(XHR, textStatus, errorThrown){
					console.log(textStatus+"\n"+errorThrown);
					$(".catezhe").hide();
				}
							
			})		
		}
		else{
			console.log(($li.index()-1)*-1*liwidth+"px");
			$a.addClass("on").siblings().removeClass("on") && $li.next("li").length && $li.nextAll("li").remove() && $li.index()>0 && $ul.css("left",($li.index()-2<0 ? 0 : ($li.index()-2))*-1*liwidth+"px");
				
		}
		
	}
	
	
	
}

$(function(){
	$(".chose .abox a").click(function(){
		clickcatea($(this));
	});
	
})
//search
function search(obj){
	var sear = $(obj).val();
	console.log(sear);
	if($(obj).val() ===''){
		$(obj).parent().parent().find("a").each(function(i,v){
				// $(this).removeClass('on');
				$(this).show();
		})
	}else{
		$(obj).parent().parent().find("a").each(function(i,v){
			var name = $(this).html()
			// console.log(name);
			if(name.indexOf(sear) < 0 ){
				// $(this).addClass('on');
				$(this).hide();
			}else{
				$(this).show();
			}
		})
		
	}
};

</script>
</body>
</html>