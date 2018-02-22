<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>页面管理</title>
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ztshop.css" >
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/shopskin/<notempty name="page[setting][color]">{$page[setting][color]}<else/>dark</notempty>.css" >
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/ecplaypreview.css" >
<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>

</head>

<body style="background-image: url({$page['setting']['container']['background_image']}); background-color:{$page['setting']['container']['background_color']};background-repeat:{$page['setting']['container']['background_repeat']};background-position:{$page['setting']['container']['background_align']} 0;  ">

<div class="page">
	<div class="ztshopcon">
		<div class="layoutmain" data-maxlayout="5" data-maxmods="40">
			<div class="layout-hd <eq name="page[setting][header][isshownav]" value="0">hdhidenav</eq> " style="margin-bottom: <eq name="page[setting][header][margin_bottom_10]" value="0">0px <else/>10px</eq>; <eq name="page[setting][header][isshowhead]" value="0">display:none;</eq>    <notempty name="page[setting][header][background_image]">background-image: url({$page['setting']['header']['background_image']});background-repeat:{$page['setting']['header']['background_repeat']}; background-position:{$page['setting']['header']['background_align']} 0;</notempty> <notempty name="page[setting][header][background_color]">background-color:{$page['setting']['header']['background_color']};</notempty>   ">
				<div class="layout layout-block" data-ltype="ltop" data-widgetid="12346745822" data-componentid="23" data-prototypeid="23" data-id="12346745822" data-max="2">
					<div class="col-main">
						<div class="main-wrap J_TRegion" data-modules="main" data-width="h950" data-max="2">
							<volist name="layout[hd][0][maincol]" id="v">
								{$v['widgetid']|getDesignHtml}
							</volist>
						</div>

					</div>

				</div>

				<div class="hdfttip">以上为页头区域</div>
			</div>

			<div class="layout-bd">
				<volist name="layout[bd]" id="vo">
					<div class="layout-block {$vo.classname} layout" data-ltype="{$vo.classname}" data-widgetid="{$vo.blockid}" data-componentid="0" data-context="bd" data-prototypeid="0" data-id="{$vo.blockid}">
						<div class="col-main">
							<div class="main-wrap J_TRegion" data-modules="main" data-width="<eq name='vo[classname]' value='mall'>b950<else/>b750</eq>">
								<volist name="vo[maincol]" id="v">
									{$v['widgetid']|getDesignHtml}
								</volist>
							</div>
						</div>
						<div class="col-sub J_TRegion" data-modules="sub" data-width="b190">
							<volist name="vo[subcol]" id="v">
								{$v['widgetid']|getDesignHtml}
							</volist>
						</div>
					</div>
					
				</volist>

				</div>


			</div>

			<div class="layout-ft">
				<div class="hdfttip">以下为页尾区域</div>

				<div class="layout grid-m layout-block" data-ltype="lft" data-widgetid="12346745825" data-componentid="33" data-prototypeid="33" data-id="12346745825" data-max="1">

					<div class="col-main">
						<div class="main-wrap J_TRegion" data-modules="main" data-width="f950" data-max="1">


						</div>
					</div>
				</div>
			</div>

			<div class="system-ft">
				<p>2015 &copy; 装途网 版权所有</p>
			</div>
		</div>
	</div>
</div>


<script>
var armodpos=[];

function GetPosition(obj)
{
	var left = 0;
	var top   = 0;

	while(obj != document.body )
	{
		left +=	obj.offsetLeft;
		top  += obj.offsetTop;
		if(!obj.offsetParent )
		{obj=document.body}
		else
		{obj = obj.offsetParent;}

	}
	return {"left":left,"top":top};
}

function abc(){
	//$("#bdpos").html( $("#bd")[0].offsetWidth+"--content"+$("#content").width()+"--page"+$("#page").width()+"--body"+$("body").width()+"-"+$("body")[0].scrollHeight+document.body.scrollWidth);

	arzmodspos=[];
	$(".J_TModule").each(function(i, e) {
		//$(e).append("<div class='thismodpos'>"+i+"x"+GetPosition(e).left+"y"+GetPosition(e).top+"w"+e.offsetWidth+"h"+e.offsetHeight+";offsetTop"+e.offsetTop+"--offsetLeft"+e.offsetLeft+"--offsetHeight"+e.offsetHeight+"--offsetWidth"+e.offsetWidth+"reltop"+(GetPosition(e).top-$(window).scrollTop())+"--relleft"+(GetPosition(e).left-$(window).scrollLeft())+"</div>");
		arzmodspos.push({"x":GetPosition(e).left,"y":GetPosition(e).top,"w":e.offsetWidth,"h":e.offsetHeight,"modid":e.getAttribute("data-componentid"),"indexinr":$(e).index(),"blockid": $(e).closest(".layout").attr("data-widgetid"),"rtype":$(e).parent().attr("data-modules"),"widgetid":e.getAttribute("data-widgetid"),"id":e.getAttribute("id"),"isdel":e.getAttribute("data-isdel"),"isedit": e.getAttribute("data-isedit"),"ismove":e.getAttribute("data-ismove"),"isadd":e.getAttribute("data-isadd"),"istarget":e.getAttribute("data-istarget"),"wtype":e.getAttribute("data-context"),"accwtype":e.parentNode.getAttribute("data-width"),"title":e.getAttribute("data-title"),"editurl":e.getAttribute("data-uri"),"i":i});
	});
	if(top){
		top.setarzmodspos(arzmodspos);
	}
}

function zmodremove(id){
	var $zmod= $("[data-widgetid='"+id+"']");
	$("[data-widgetid='"+id+"']").animate({"height":"0px","width":"0px"},500,function(){
		$(this).remove();
		abc();
	})
}

function zmodadd(strzmodhtml, jsonzmod){
	var zmodindex = jsonzmod.index;
	var zmodhalf = jsonzmod.half;
	if( zmodhalf ){
		$(".J_TModule").eq(zmodindex).before(strzmodhtml);
	}
	else{
		$(".J_TModule").eq(zmodindex).after(strzmodhtml);
	}
	abc();
}

function freshecplaymodule(widgetid,res){
	var $nowmodule= $("[data-widgetid='"+widgetid+"']");
	var isshopsign= $nowmodule.parent().attr("data-width")==="h950";

	var $dom=$("<div class=\"ecplaycuswrap\"><div class=\"ecplaycuswrapin\"></div></div>");
	$dom.find(".ecplaycuswrapin").html(res);
	console.log($dom);
	if($dom.find(".zfh").length>0){
		var abs=$dom.find(".zfh").eq(0);
		var h=abs.height();
		$dom.css({"height":( (isshopsign && h>150)? 150: h )+"px"});
		$nowmodule.find(".customcon").css({"height":h+"px"}).html("").append($dom).parent().addClass("hascustoming");
	}
	else{
		$nowmodule.find(".customcon").html(res);
	}

	//$("[data-widgetid='"+widgetid+"']").find(".customcon").html(res);
	setTimeout(abc,500);
}

function styleset(act,css){
	if(act==="header"){
		console.log(111);
		console.log(css);
		$(".layout-hd").css({"background-color":css.background_color,"background-image":css.background_image,"background-repeat":css.background_repeat,"background-position":css.background_position+" 0"});
		$(".layout-hd").css("display",css.isshowhead==="1"?"block":"none");
		$(".layout-hd").css("margin-bottom",css.margin_bottom_10==="1"?"10px":"0px");
		css.isshownav === "0" ? $(".layout-hd").addClass("hdhidenav") : $(".layout-hd").removeClass("hdhidenav");
		parent.iFrameHeightcw();
		setTimeout(abc,500);
	}
	if(act==="container"){
		console.log(css);
		$("body").css({"background-color":css.background_color,"background-image":css.background_image,"background-repeat":css.background_repeat,"background-position":css.background_position+" 0"});
		setTimeout(abc,500);
	}
}


function cb_moduleedit(res){
	var $nowmodule= $("[data-widgetid='"+res.moduleid+"']");
	if(res.compid === "8805"){
//		console.log(222);
//		console.log(res);
//		var $nowmodule= $("[data-widgetid='"+res.moduleid+"']");
		res.isshowtit === "1" ? $nowmodule.find(".skin-box-hd").show().find("h3").html(res.title) : $nowmodule.find(".skin-box-hd").hide();
//		var $dom=$("<div class=\"ecplaycuswrap\"></div>");
//		$dom.html(res.content);
//		console.log($dom);
//		if($dom.find(".zfh").length>0){
//			console.log(333);
//			var abs=$dom.find(".zfh").eq(0)[0];
//			$dom.css({"height":abs.style.height});
//			$nowmodule.find(".customcon").html("").append($dom);
//		}
//		else{
//			console.log(444)
//			$nowmodule.find(".customcon").html(res.content);
//		}
		$nowmodule.find(".customcon").html(res.content);
	}
	if(res.compid!== "8805"  && res.compid!=="8803")
	{
		res.isshowtit === "1" ? $nowmodule.find(".skin-box-hd").show().find("h3").html(res.title) : $nowmodule.find(".skin-box-hd").hide();

	}
	if(res.compid === "8820"){
		var $nowmodule= $("[data-widgetid='"+res.moduleid+"']");
		var h= res.height;
		$nowmodule.find(".banbox").css({"height":h+"px"}).find(".ecplaycuswrap").css({"height":h+"px"});

	}
	setTimeout(abc,500);
}

</script>


</body>
</html>
