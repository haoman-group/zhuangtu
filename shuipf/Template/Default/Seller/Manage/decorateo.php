<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>店铺装修</title>
<link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/zt/css/decorate.css" >
<script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
<script src="{$config_siteurl}statics/zt/js/decorate.js"></script>
</head>

<body class="decbody">


<div class="wrap">

	<template file="Seller/common/_dectop.php"/>
    
    
    <div class="mainwrap">

		<template file="Seller/common/_decleft.php"/>

        <div class="mkmain">
        	<div class="mhead">
            	<div class="selebox">
                	
                </div>
                <div class="pagemod">
                	<a href="decorate" class="on">页面编辑</a>
                    <a href="declayout">布局编辑</a>
                </div>
                <div class="ops">
                	<a href="">备份</a>
                    <a href="">预览</a>
                    <a href="">发布</a>
                </div>
            </div>
            
            <div class="workpage">
            	<div class="pagein">
                	<div class="wcontainer" data-url="taobaoshop.html">
                    	<iframe id="iframepage" onLoad="iFrameHeightcw()" class="framepage" src="{$config_siteurl}statics/zt/tmp/taobaoshop.html?sid=340826219&pageId=1147251295" frameborder="0" scrolling="no"></iframe>
                    </div>
                    
                    <div class="conrefer" id="conrefer"></div>
                    
                    <div class="modtoolbox">
                    	<div class="bg"></div>
                        <div class="btns">
                            <a class="updown up" href="javascript:void(0)"></a>
                            <a class="updown down" href="javascript:void(0)"></a>
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

<div class="pops">
<!--	<div class="popwrap" id="editmod-13025178478">
    	<a href="javascript:void(0)" class="closepop"><span></span></a>
        <div class="popcon">
        	<div class="pophead">图片轮播</div>
            <div class="popbody">
            	<iframe src="pop_focus.html?widgetid=13025178478&sid=340826219&pageid=1147251295" scrolling="no" frameborder="0" class="popifm" style=""></iframe>
            </div>
        </div>
    </div>-->
</div>

<iframe id="ifmzuiaixiu" class="ifmzuiaixiu" frameborder="0" ></iframe>

<script type="text/javascript" language="javascript">

document.body.onselectstart = function(){
	return false;
}

var params={
	dragflag:false,
	dragmod:{modid:0,wtype:"",source:false,sourceid:0},
	createxu:false,
	modpos:{"left":0,"top":0},
	startX:0,
	startY:0,
	curX:0,
	curY:0,
	zmod:{index:-1,half:0}
}


var arzmodspos=[];

function clearmodpos(){
	params.startX=0;
	params.startY=0;
	params.modpos={"left":0,"top":0};
	params.createxu=false;
	params.dragmod={modid:0,wtype:"",source:false,sourceid:0};
	params.dragflag=false;
}

function setarzmodspos(p){
	arzmodspos=p;
	console.log(arzmodspos);
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
	var ifm=document.getElementById("iframepage");
	var refer=document.querySelector(".conrefer");
	var subWeb = document.frames? document.frames["iframepage"].document : ifm.contentDocument;
	if(ifm != null && subWeb !=null){
		ifm.width = document.body.scrollWidth-80;
		subWeb.body.style.width = ifm.width+"px";
		ifm.height = subWeb.body.scrollHeight;
		refer.style.height=subWeb.body.scrollHeight+"px";
	    refer.style.width = document.body.scrollWidth-80+"px";
		ifm.contentWindow.abc();
		subWeb.body.style.width = ifm.width+"px";
		
	}
}

function iFrameHeightt(){
	var ifm= document.getElementById("iframepage");
	if(ifm != null ) {
		ifm.width = document.body.scrollWidth-80;
		ifm.src="taobaoshop.html";
		var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;  
		
	    ifm.height = subWeb.body.scrollHeight;
	   
	    refer.style.height=subWeb.body.scrollHeight+"px";
	    refer.style.width = document.body.scrollWidth-80+"px";
	} 
}
   
function iFrameHeight() {   
var ifm= document.getElementById("iframepage");   
var refer=document.querySelector(".conrefer");
var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;   
	if(ifm != null && subWeb != null) {
	   ifm.height = subWeb.body.scrollHeight;
	   ifm.width = document.body.scrollWidth-80;
	   refer.style.height=subWeb.body.scrollHeight+"px";
	   refer.style.width = document.body.scrollWidth-80+"px";
	}   
}   



$(function(){

	
	$(".modsbox .emwrap em").on("mousedown",function(event){
		params.dragflag=true;	
		
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
			$(".modxu").remove();
			clearmodpos();
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
		var zmodid= zmodparas["id"];
		$.ajax({
			type:"GET",
			url: "{$config_siteurl}statics/zt/tmp/modop.json?op=del&id="+zmodid+"",
			dataType:"json",
			timeout:5000,
			success: function(data,status){	
				if(data.status==1){
					$(".modtoolbox").animate({"height":"0px","width":"0px"},500,function(){$(this).hide()});
					document.getElementById("iframepage").contentWindow.zmodremove(zmodid);
					params.zmod= {index:-1,half:0};
					console.log("删除成功!");
				}
				else{
					console.log("删除失败"+data.msg);
				}	
			}
			,error:function(XHR, textStatus, errorThrown){
				console.log(textStatus+"\n"+errorThrown);
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
		
		$ifmzuiaixiu= $("#ifmzuiaixiu");
		$ifmzuiaixiu.attr("src","http://ecplay.com/z1_8.html");
		$ifmzuiaixiu.on("load",function(){
			//$(this).show().addClass("ifmzuiaixiuon");
			$(this).show();
			var self=$(this);
			setTimeout(function(){self.addClass("ifmzuiaixiuon");},500);
		})
			
	})
	
	$(".modtoolbox .btns .edit").click(function(){
		var zmod= params.zmod;
		var zmodparas= arzmodspos[zmod.index];
		var zmodid= zmodparas["id"];
		var widgetid= zmodparas["widgetid"]
		var title= zmodparas["title"];
		var editurl= zmodparas["editurl"];
		var modid= zmodparas["modid"];
		var nowwtype= zmodparas["accwtype"];
		
		console.log(modid);
		if($(".pops").find("#editmod-"+widgetid).length === 0){
			var strmodedit= "<div class=\"popwrap\" id=\"editmod-"+widgetid+"\">"+
							"    	<a href=\"javascript:void(0)\" class=\"closepop\"><span></span></a>"+
							"        <div class=\"popcon\">"+
							"        	<div class=\"pophead\">图片轮播</div>"+
							"            <div class=\"popbody\">"+
							"            	<iframe src=\"{$config_siteurl}statics/zt/tmp/parashtml/"+modid+nowwtype+".html?widgetid="+widgetid+"&sid=340826219&pageid=1147251295\" scrolling=\"no\" frameborder=\"0\" class=\"popifm\" style=\"\"></iframe>"+
							"            </div>"+
							"        </div>"+
							"    </div>";
			
			$(".pops").append(strmodedit);
		}
		$(".pops").show().find("#editmod-"+widgetid).show();
		
	})
	
	$(".pops").on("click" ,".closepop" ,function(ev){
		$(this).parent().hide().parent().hide();	
	})
	
})

function zmodadd(){
	var dragmod= params["dragmod"];
	var zmod= params["zmod"];
	var zmodpara= arzmodspos[zmod.index];
	var accwtype=zmodpara["accwtype"];
		
	$.ajax({
		type:"GET",
		url: "{$config_siteurl}statics/zt/tmp/modhtml/"+dragmod["modid"]+accwtype+".html?op=add&modid="+dragmod["modid"]+"&accwtype="+accwtype,
		dataType:"html",
		timeout:5000,
		success: function(data,status){
			document.getElementById("iframepage").contentWindow.zmodadd(data,params.zmod);
			console.log("添加成功!");
			iFrameHeightcw();
		}
		,error:function(XHR, textStatus, errorThrown){
			console.log(textStatus+"\n"+errorThrown);
			self.isloading=0;
		}
	});
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
	var finded=false;
	var objres= {index:-1,half:0};
	$.each(arzmodspos,function(i,v){
		if(!finded){
			if(pos.x>v.x && pos.x< v.x+v.w && pos.y>v.y && pos.y<v.y+v.h){
				if(i!== params.zmod.index){	
					params.zmod.index = i;
					if(!params.dragflag){
						console.log(v.modid);
						$(".modtoolbox").show().css({left:v.x,top:v.y,width:v.w,height:v.h}).attr("class","modtoolbox"+(v.isdel==="1"?" ":" undel")+(v.ismove==="1"?" ":" unmove")+ (v.isadd==="1"?" ":" unadd")+ (v.modid==="8805"?" haszui":""));
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
	if(zmod.index===-1){console.log("zmodindex-1"); return false; }
	var zmodparas = arzmodspos[zmod.index];
	if(zmodparas.accwtype===null){console.log("accwtype-null"); return false};	
	if(dragmod.wtype.indexOf(zmodparas.accwtype)===-1){
		console.log("not this width");
		return false;	
	}
	return true;
}





</script>
</body>
</html>
