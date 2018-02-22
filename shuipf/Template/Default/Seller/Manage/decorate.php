<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>店铺装修</title>
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/decorate.css" >
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
    <script src="{$config_siteurl}statics/js/spectrum.js"></script>
    <script src="{$config_siteurl}statics/zt/js/decorate.js"></script>
	<!--控制图片上传：-->
	<template file="common/_global_js.php"/>
	<link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
	<script src="{$config_siteurl}statics/js/wind.js"></script>
	<script src="{$config_siteurl}statics/js/common.js"></script>
</head>

<body class="decbody">


<div class="wrap">

	<template file="Seller/common/_dectop.php"/>
    
    
    <div class="mainwrap">

		<template file="Seller/common/_decleft.php"/>

        <div class="mkmain">
        	<div class="mhead">
            	<div class="selebox">
                	<a class="selepage">{$page['title']|default='首页'}</a>
					<div class="selpagelistbox">
						<div class="boxtit">
							<span class="myall">我的全部页面:</span>
							<a href="{:U('pagelist')}" class="btnlist">管理页面</a>
							<a href="{:U('pageadd')}" class="btnnew">新建页面</a>
						</div>
						<div class="boxwrap">
							<dl>
								<dt>基础页</dt>
								<dd><a href="{:U('decorate')}">首页</a> </dd>
							</dl>
							<dl>
								<dt>自定义页</dt>
								<volist name="pagelist" id="vo">
									<dd><a href="{:U('decorate',array('pageid'=>$vo['id']))}">{$vo.title}</a> </dd>
								</volist>
							</dl>
						</div>
					</div>
                </div>
                <div class="pagemod">
                		<a href="{:U('decorate',array('pageid'=>$pageid))}" class="on">页面编辑</a>
                    <a href="{:U('declayout',array('pageid'=>$pageid))}">布局编辑</a>
                </div>
                <div class="ops">
                	<a href="javascript:void(0)" class="btntopagebak">备份</a>
                    <a target="_blank" href="{:U('decpreview',array('pageid'=>$pageid))}">预览</a>
                    <a href="{:U('pagepublish',array('pageid'=>$pageid))}">发布</a>
                </div>
            </div>
            
            <div class="workpage">
            	<div class="pagein">
                	<div class="wcontainer" data-url="taobaoshop.html">
                    	<iframe id="iframepage" onLoad="iFrameHeightcw()" class="framepage" src="{:U('pagedecing',array('pageid'=>$pageid))}" frameborder="0" scrolling="no"></iframe>
                    	<!-- <iframe id="iframepage" onLoad="iFrameHeightcw()" class="framepage" src="{:U('pagedecing')}" frameborder="0" scrolling="no"></iframe> -->
                    </div>
                    
                    <div class="conrefer" id="conrefer"></div>
                    
                    <div class="modtoolbox">
                    	<div class="bg"></div>
                        <div class="btns">
                            <a class="updown up" href="javascript:void(0)"></a>
                            <a class="updown down" href="javascript:void(0)"></a>
							<a class="tmp" href="javascript:void(0)">选择模板</a>
							<a class="edit" href="javascript:void(0)"></a>
                            <a class="zui" href="javascript:void(0)">高级定制</a>
                            <a class="del" href="javascript:void(0)"></a>
                            <a class="add" href="javascript:void(0)"></a>
                        </div>
                    </div>
                    
                    <div class="inserttip">
                    	<div class="bg"></div>
                        <div class="line"></div>
                    	<span class="txt">松开鼠标,模块会放到这里</span>
                        <i class="arr"></i>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pops" >
	<div class="popwrap" id="popecplaytip" style="display: none">
		<a href="javascript:void(0)" class="closepop"><span></span></a>
		<div class="popcon">
			<div class="pophead">图片轮播</div>
			<div class="popbody">
				编辑中
			</div>
		</div>
	</div>
	<div class="popwrap" id="editmod-popdecbak" style="display: none" >
		<a href="javascript:void(0)" class="closepop"><span></span></a>
		<div class="popcon">
			<div class="pophead">备份与还原</div>
			<div class="popbody">
				<iframe src="{:U('Manage/pagebak')}?widgetid=&pageid={$pageid}" scrolling="no" frameborder="0" class="popifm" style=""></iframe>
			</div>
		</div>
	</div>
</div>

<iframe id="ifmzuiaixiu" class="ifmzuiaixiu" frameborder="0" ></iframe>


<script type="text/javascript" language="javascript">
var pageid="{$pageid}";

document.body.onselectstart = function(){
	return false;
}

var d_ifmshop=document.getElementById("iframepage");
var d_refer=document.getElementById("conrefer");
var d_subWeb;

var params={
	dragflag:false,
	dragmod:{modid:0,wtype:"",source:false,sourceid:0},
	createxu:false,
	modpos:{"left":0,"top":0},
	startX:0,
	startY:0,
	curX:0,
	curY:0,
	zmod:{index:-1,half:0},
	submiting:0
}

var arzmodspos=[];

var ecparams={
	editstatus:0,
	widgetid:0
}

function clearmodpos(){
	params.startX=0;
	params.startY=0;
	params.modpos={"left":0,"top":0};
	params.createxu=false;
	params.dragmod={modid:0,wtype:"",source:false,sourceid:0};
	params.dragflag=false;
	params.zmod={index:-1,half:0};
}

function setarzmodspos(p){
	arzmodspos=p;
}

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

function iFrameHeightcw(){
	d_subWeb = document.frames? document.frames["iframepage"].document : d_ifmshop.contentDocument;
	if(d_ifmshop != null && d_subWeb !=null){
		d_ifmshop.width = document.body.scrollWidth-80;
		d_subWeb.body.style.width = d_ifmshop.width+"px";
		d_ifmshop.height = d_subWeb.body.scrollHeight;
		d_refer.style.height = d_subWeb.body.scrollHeight+"px";
	    d_refer.style.width = document.body.scrollWidth-80+"px";
		d_ifmshop.contentWindow.abc();
		d_subWeb.body.style.width = d_ifmshop.width+"px";
	}
}



$(function(){

	$(".modsbox .emwrap em").on("mousedown",function(event){
		params.dragflag=true;
		params.zmod={index:-1,half:true};
		if(!event){
			event = window.event;
			//防止IE文字选中
			this.onselectstart = function(){
				return false;
			}  
		}
		var e = event;
		params.startX = e.clientX;
		params.startY = e.clientY;
		params.dragmod={"modid":$(this).attr("data-modid"),"wtype":$(this).attr("data-wtype"),"source":false,"sourceid":0};
		params.modpos = GetPosition(this);
	})

	
	$("body").on("mousemove",function(event){
		if(params.dragflag){
			var modid= params.dragmod.modid;
			var jsonpos= params.modpos;
			if(!params.createxu){
				$("<div class='modxu'>"+$("[data-modid='"+modid+"']").attr("title")+"</div>").css(jsonpos).appendTo("body");
				params.createxu=true;
			}
			else{
				event = event || window.event;
				$(".modxu").css({left:params.modpos.left+event.clientX-params.startX,top:params.modpos.top+event.clientY-params.startY});
				$(".modxu")[0].onselectstart=function(ev){ return false;}
			}			
			var aaa = getzmodindex(getrelpos({"x":event.pageX,"y":event.pageY}));	
								
		}
	})
	
	
	$("body").on("mouseup",function(event){
		if(params.dragflag){
			if(chkcandrop() ){
				//document.getElementById("iframepage").contentWindow.zmodadd();
				zmodadd();
			}
			else{
				clearmodpos();
			}
			$(".inserttip").hide();
			$(".modxu").remove();

		}
	})
	
	
	$("#conrefer").on("mousemove",function(event){
		var x=event.pageX,y=event.pageY;
		
		if(!params.dragflag){
			getzmodindex(getrelpos({"x":event.pageX,"y":event.pageY}));
			event.stopPropagation();
		}
		
	})

	$(".modtoolbox .del").click(function(){
		var zmod= params.zmod;
		var zmodparas= arzmodspos[zmod.index];
		var zmodid= zmodparas["widgetid"];
		$.ajax({
			type:"GET",
			url: "/Seller/Api/module?act=delete&pageid="+pageid+"&moduleid="+zmodid+"&pos="+(zmodparas.blockid+"-"+zmodparas.rtype+"-"+zmodparas.indexinr),
			dataType:"json",
			timeout:5000,
			success: function(data,status){	
				if(data.status==1){
					$(".modtoolbox").animate({"height":"0px","width":"0px"},500,function(){$(this).hide()});
					d_ifmshop.contentWindow.zmodremove(zmodid);
					params.zmod= {index:-1,half:0};
					//console.log("删除成功!");
				}
				else{
					//console.log("删除失败"+data.msg);
				}	
			}
			,error:function(XHR, textStatus, errorThrown){
				//console.log(textStatus+"\n"+errorThrown);
				self.isloading=0;
			}
		});
		return false;
	})
	
	$(".modtoolbox .btns .zui").click(function(){
		var zmod=params.zmod;
		var zmodparas= arzmodspos[zmod.index];
		var zmodid= zmodparas["id"];
		var widgetid= zmodparas["widgetid"]
		var title= zmodparas["title"];
		var editurl= zmodparas["editurl"];
		var modid= zmodparas["modid"];
		var nowwtype= zmodparas["accwtype"];
		ecparams.widgetid=widgetid;
		
//		$ifmzuiaixiu= $("#ifmzuiaixiu");
//		$ifmzuiaixiu.attr("src","http://ecplay.com/z1_8.html");
//		$ifmzuiaixiu.on("load",function(){
//			$(this).show();
//			var self=$(this);
//			setTimeout(function(){self.addClass("ifmzuiaixiuon");},500);
//		})

		window.open("http://www.ecplay.com/zhuangtu/index.php?token={$token}&pageId="+pageid+"&moduleId="+widgetid,"zt_ecplay");
			
	})

	$(".modtoolbox .btns .tmp").click(function(){
		var zmod=params.zmod;
		var zmodparas= arzmodspos[zmod.index];
		var widgetid= zmodparas["widgetid"];
		window.location="{:U('Manage/templatelist')}?pageId="+pageid+"&moduleId="+widgetid
	})

	$(".btntopagebak").click(function(){
		$(".pops").show().find("#editmod-popdecbak").show();
		return false;
	})

	$(".modtoolbox .btns .edit").click(function(){
		var zmod= params.zmod;
		var zmodparas= arzmodspos[zmod.index];
		var zmodid= zmodparas["id"];
		var widgetid= zmodparas["widgetid"];
		var title= zmodparas["title"];
		var editurl= zmodparas["editurl"];
		var modid= zmodparas["modid"];
		var nowwtype= zmodparas["accwtype"];
		if(modid==="8803"){
			$(this).attr("href","shopcategorylist").attr("target","_blank");
			return true;
		}
		else{
			$(this).removeAttr("href");
		}

		
		//console.log(modid);
		if($(".pops").find("#editmod-"+widgetid).length === 0){
			var strmodedit= "<div class=\"popwrap\" id=\"editmod-"+widgetid+"\">"+
							"    	<a href=\"javascript:void(0)\" class=\"closepop\"><span></span></a>"+
							"        <div class=\"popcon\">"+
							"        	<div class=\"pophead\">"+title+"</div>"+
							"            <div class=\"popbody\">"+
							"            	<iframe src=\"{:U('Manage/module_edit')}?widgetid="+widgetid+"&pageid="+pageid+"\" scrolling=\"no\" frameborder=\"0\" class=\"popifm\" style=\"\"></iframe>"+
							"            </div>"+
							"        </div>"+
							"    </div>";
			
			$(".pops").append(strmodedit);
			var $ifmedit=$("#editmod-"+widgetid+" iframe");
			$ifmedit.load(function(){
				$ifmedit.height($ifmedit[0].contentDocument.body.scrollHeight+"px");
			})
		}
		$(".pops").show().find("#editmod-"+widgetid).show();
		
	});
	
	$(".pops").on("click" ,".closepop" ,function(ev){
		$(this).parent().hide().parent().hide();
	});

	$(".moniradiobox a").click(function(){
		if(!$(this).hasClass("on")){
			$(this).addClass("on").siblings().removeClass("on");
			var $box =$(this).closest(".moniradiobox");
			$box.find("[name='"+$box.attr("data-inpname")+"']").val($(this).attr("data-v"));
		}
	});

	$(".slidebar .colorbox a").click(function(){
		var $this= $(this);
		if(!$(this).hasClass("on")){
			d_subWeb.getElementsByTagName("link")[1].setAttribute("href","{$config_siteurl}statics/zt/css/shopskin/"+$(this).attr("data-v")+".css");
			$.get("/Seller/Api/page?pageid={$pageid}&act=color&v="+$this.attr("data-v"),function(data,status,xhr){
				if(status==="success"){
					$(this).addClass("on").siblings("a").removeClass("on");
				}
				else{
					alert("网络错误,保存失败!");
				}
			});
		}
		return false;
	});


	$(".selfullcolor").spectrum({
		allowEmpty:true,
		color: this.value,
		showInput: true,
		containerClassName: "full-spectrum",
		showInitial: true,
		showPalette: true,
		showSelectionPalette: true,
		showAlpha: true,
		maxPaletteSize: 10,
		preferredFormat: "hex",
		localStorageKey: "spectrum.demo",
		move: function (color) {
			updateBorders(color,this);
		},
		show: function () {

		},
		beforeShow: function () {

		},
		hide: function (color) {
			updateBorders(color,this);
		},

		palette: [
			["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)", /*"rgb(153, 153, 153)","rgb(183, 183, 183)",*/
				"rgb(204, 204, 204)", "rgb(217, 217, 217)", /*"rgb(239, 239, 239)", "rgb(243, 243, 243)",*/ "rgb(255, 255, 255)"],
			["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
				"rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"],
			["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)",
				"rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)",
				"rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)",
				"rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)",
				"rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)",
				"rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
				"rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
				"rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
				/*"rgb(133, 32, 12)", "rgb(153, 0, 0)", "rgb(180, 95, 6)", "rgb(191, 144, 0)", "rgb(56, 118, 29)",
				 "rgb(19, 79, 92)", "rgb(17, 85, 204)", "rgb(11, 83, 148)", "rgb(53, 28, 117)", "rgb(116, 27, 71)",*/
				"rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)",
				"rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
		]
	});

	$(".slideform .btnsavebox a").click(function(){
		if(params.submiting===1){return false;}
		params.submiting=1;
		var $form= $(this).closest("form");
		var pagetype=$(this).attr("data-page");
		if($form.find("[name='background_color']").val().length === 0){
			$form.find("[name='background_color']").val("transparent");
		}

		$form.ajaxSubmit({
			url:$form.attr("action")+"?is_all_page="+pagetype,
			success:function(res){
				console.log("提交成功!")
				if(res.status===1){
					d_ifmshop.contentWindow.styleset($form.find("[name='act']").val(),$form.serializeJson());
				}
				params.submiting=0;
			},
			error:function(){
				params.submiting=0;
			}
		});
	})

	$(".colorcaseform .btnsave a").click(function(){
		if(params.submiting===1){return false;}
		params.submiting=1;
		var $form= $(this).closest("form");

	})

})

function updateBorders(color,obj) {
	var hexColor = "transparent";
	if(color) {
		hexColor = color.toHexString();
	}
	console.log(obj.value);
	obj.value= color;
//	$("#docs-content").css("border-color", hexColor);

}

function zmodadd(){
	var dragmod= params["dragmod"];
	var zmod= params["zmod"];
	var zmodpara= arzmodspos[zmod.index];
	var accwtype=zmodpara["accwtype"];
	var iinregion,blockid,rtype;
	iinregion = zmodpara.indexinr;
	iinregion = zmod.half? iinregion : iinregion+1;
	blockid = zmodpara.blockid;
	rtype=zmodpara.rtype;

	$.ajax({
		type:"GET",
		//url: "{$config_siteurl}statics/zt/tmp/modhtml/"+dragmod["modid"]+accwtype+".html?op=add&modid="+dragmod["modid"]+"&accwtype="+accwtype,
		url: "/Seller/Api/module?act=add&pageid="+pageid+"&compid="+dragmod.modid+"&wtype="+accwtype+"&pos="+(blockid+"-"+rtype+"-"+iinregion),
		//dataType:"html",
		dataType:"json",
		timeout:5000,
		success: function(data,status){
			if(data.status===1){
				console.log(data["data"].html);
				document.getElementById("iframepage").contentWindow.zmodadd(data["data"].html,zmod);
			}
			else{
				console.log(data.msg);
			}

			clearmodpos();
			iFrameHeightcw();

		}
		,error:function(XHR, textStatus, errorThrown){
			//console.log(textStatus+"\n"+errorThrown);
			//self.isloading=0;
			clearmodpos();
		}
	});
}

function ecplaydone(res){
	if(ecparams.widgetid!==0){
		document.getElementById("iframepage").contentWindow.freshecplaymodule(ecparams.widgetid,res);
	}
}

function getrelpos(pos){
	var dompagein = document.querySelector(".pagein");
	var pageinpos=GetPosition(dompagein);	
	var realx= pos.x + dompagein.scrollLeft - pageinpos.left;
	var realy= pos.y + dompagein.scrollTop -pageinpos.top;
	//console.log("realx:"+realx +";realy:"+realy);	
	return {"x":realx,"y":realy}
}

function getzmodindex(pos){
	var finded = false;
	var objres = {index:-1,half:0};
	$.each(arzmodspos,function(i,v){
		if(!finded){
			if(pos.x>v.x && pos.x< v.x+v.w && pos.y>v.y && pos.y<v.y+v.h){
				if(i!== params.zmod.index){
					params.zmod.index = i;
					if(!params.dragflag){
						$(".modtoolbox").show().css({left:v.x,top:v.y,width:v.w,height:v.h}).attr("class","modtoolbox"+(v.isdel==="1"?" ":" undel")+(v.ismove==="1"?" ":" unmove")+ (v.isedit==="1"?" ":" unedit")+ (v.isadd==="1"?" ":" unadd")+ ( ((v.modid==="8805" && (v.accwtype==="b950" || v.accwtype==="h950" ))|| v.modid==="8820")?" haszui":"") + (v.modid==="8805"?" hastmp":"")  )  ;
					}
				}
				var nowhalf = pos.y<(v.y+ v.h/2);
				if(nowhalf !== params.zmod.half || i!==params.zmod.index ){
					if(params.dragflag){
						var candrop= chkcandrop();
						$(".inserttip").show().css({"left":v.x,"top":v.y,"width":v.w,"height":v.h}).attr("class","inserttip"+(candrop ?" ":" disdrop") + (nowhalf ? " " : " downhalf") ).find(".txt").html( candrop ?"松开鼠标,模块会放在这里": "此区域不支持放置该模块");				
					}
				}
				finded = true;			
				objres= {index:i, half:nowhalf}
			}
		}
	})
	if(finded){
		params.zmod = objres;
		return objres;
	}
	else{
		params.zmod = {index:-1,half:0};
		$(".modtoolbox").hide();
		$(".inserttip").hide();
		return {index:-1,half:0};
	}
	
}

function chkcandrop(){
	var dragmod= params.dragmod;
	var zmod = params.zmod;
	if(zmod.index===-1){
		 return false;
		}
	var zmodparas = arzmodspos[zmod.index];
	if(zmodparas.accwtype===null){
		return false
	};
	if(dragmod.wtype.indexOf(zmodparas.accwtype)===-1){
		return false;	
	}
	return true;
}

function cb_moduleedit(nowstatus,res){
	if(nowstatus){
		d_ifmshop.contentWindow.cb_moduleedit(res);
		$("#editmod-"+res.moduleid).find(".closepop").trigger("click");
	}
	else{
		$("#editmod-"+res.moduleid).find(".closepop").trigger("click");
	}
}

<?php
$alowexts = "jpg|jpeg|gif|bmp|png";
$thumb_ext = ",";
$watermark_setting = 0;
$module = "Picture";
$catid = "0";
$max = 1;
$authkey = upload_key("$max,$alowexts,1,$thumb_ext,$watermark_setting");
?>
function upfile(id){
	flashupload(id+'_images', '图片上传',id,submit_pic,'{$max},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
}
function submit_pic(uploadid,returnid){
	// console.log(uploadid+"!!"+returnid);

  var d = uploadid.iframe.contentWindow;
  var in_content = d.$("#att-status").html().substring(1);
  var in_content = in_content.split('|');
  $('#'+returnid).attr('src',in_content[0]);
  $('#'+returnid+'_hidden').attr('value',in_content[0]);
}


</script>
</body>
</html>
