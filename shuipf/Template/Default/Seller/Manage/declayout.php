<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>布局装修</title>
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
								<dd><a href="{:U('declayout')}">首页</a> </dd>
							</dl>
							<dl>
								<dt>自定义页</dt>
								<volist name="pagelist" id="vo">
                  <dd><a href="{:U('declayout',array('pageid'=>$vo['id']))}">{$vo.title}</a> </dd>
                </volist>
							</dl>
						</div>
					</div>
				</div>
                <div class="pagemod">
                	<a href="{:U('decorate',array('pageid'=>$pageid))}" >页面编辑</a>
                    <a href="{:U('declayout',array('pageid'=>$pageid))}" class="on">布局编辑</a>
                </div>
                <div class="ops">
                	<a href="">备份</a>
                    <a href="">预览</a>
                    <a href="">发布</a>
                </div>
            </div>

            <div class="workpage">
            	<div class="pagein">
                	<div class="layout-con">
                    	<div class="layoutmain layouteditmain" data-maxlayout="5" data-maxmods="40">
                        	<div class="layout-hd">
                            	<div class="layout layout-block" data-ltype="ltop" data-widgetid="{$data[hd][0][blockid]}" data-componentid="23" data-prototypeid="23" data-id="12346745822" data-max="2">
                                	<p class="title">店铺页头</p>
                                    <div class="col-main">
                                        <div class="main-wrap J_TRegion" data-modules="main" data-width="h950" data-max="2">
                                        <volist name="data[hd][0]['maincol']" id="vo">
											<div class="J_TModule tb-module shopxxxxxxxxxxx" data-widgetid="{$vo['widgetid']}" data-componentid="{$vo.compid}" data-title="{$vo.title}" data-context="{$module[$vo[compid]]['wtype']}" data-ismove="0" data-isdel="1" data-isedit="1" data-isadd="1" data-width="">
												<span>{$vo.title}</span><a href="#del" class="act-del"></a>
											</div>
                                        </volist>
                                    	</div>	
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="layout-bd">

                                <volist name="data[bd]" id="vo">
                                	<div class="layout-block {$vo.classname} layout" data-ltype="{$vo.classname}" data-widgetid="{$vo.blockid}" data-componentid="1" data-context="bd" data-prototypeid="1" data-id="{$vo.blockid}">
                                    	<div class="layoutop">
                                        	<a  class="move" title="移动">移动</a>
                                            <a  class="edit" title="编辑">编辑</a>
                                            <a  class="del" title="删除">删除</a>
                                        </div>
                                        <div class="col-main">
                                        	<div class="main-wrap J_TRegion" data-modules="main" data-width="b750">
                                                <volist name="vo[maincol]" id="v">
                                                	<div class="J_TModule tb-module shop13162830681" data-widgetid="{$v.widgetid}" data-componentid="{$v.compid}" data-spm="'110.0.8806-13162830681'" microscope-data="'8806-13162830681'" data-title="{$v.title}" data-context="{$module[$v[compid]]['wtype']}" data-ismove="{$v.data-ismove}" data-isdel="{$v.data-isdel}" data-isedit="{$v.data-isedit}" data-isadd="{$v.data-isadd}" data-width="773" data-uri="/module/moduleForm.htm?widgetId=13162830681&amp;sid=340826219&amp;pageId=1147251295"><span>{$v.title}</span><a href="#del" class="act-del"></a></div>
                                                </volist>
                                            </div>

                                        </div>

                                        <div class="col-sub J_TRegion" data-modules="sub" data-width="b190">
                                            <volist name="vo[subcol]" id="v">
                                                <div class="J_TModule tb-module shop13162830681" data-widgetid="{$v.widgetid}" data-componentid="{$v.compid}" data-spm="'110.0.8806-13162830681'" microscope-data="'8806-13162830681'" data-title="{$v.title}" data-context="{$module[$v[compid]]['wtype']}" data-ismove="{$v.data-ismove}" data-isdel="{$v.data-isdel}" data-isedit="{$v.data-isedit}" data-isadd="{$v.data-isadd}" data-width="773" data-uri="/module/moduleForm.htm?widgetId=13162830681&amp;sid=340826219&amp;pageId=1147251295"><span>{$v.title}</span><a href="#del" class="act-del"></a></div>
                                            </volist>
    									                  </div>
                                        <empty name="vo[maincol]">
                                          <empty name="vo[subcol]">
                                            
                                            <eq name="vo[classname]" value="mall">
                                              <div class="col-main">
                                                <div class="main-wrap J_TRegion" data-modules="main" data-width="b950">
                                                  <div class="J_TEmptyBox emptyp J_TModule" data-ismove="0"><span>请拖入模块</span></div>
                                                </div>
                                              </div>
                                            </eq>

                                            <eq name="vo[classname]" value="slmr">
                                              <div class="col-main">
                                                <div class="main-wrap J_TRegion" data-modules="main" data-width="b750">
                                                  <div class="J_TEmptyBox J_TModule emptyp" data-ismove="0">
                                                    <span>请拖入模块</span>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sub J_TRegion" data-modules="sub" data-width="b190">
                                                <div class="J_TEmptyBox J_TModule emptyp" data-ismove="0">
                                                  <span>请拖入模块</span>
                                                </div>
                                              </div>
                                            </eq>

                                            <eq name="vo[classname]" value="srml">
                                              <div class="col-main">
                                                <div class="main-wrap J_TRegion" data-modules="main" data-width="b750">
                                                  <div class="J_TEmptyBox J_TModule emptyp" data-ismove="0">
                                                    <span>请拖入模块</span>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="col-sub J_TRegion" data-modules="sub" data-width="b190">
                                                <div class="J_TEmptyBox J_TModule emptyp" data-ismove="0">
                                                  <span>请拖入模块</span>
                                                </div>
                                              </div>
                                            </eq>
                                            
                                          </empty>
                                        </empty>





                                    </div>
                                </volist>

                                
                            </div>
                            
                            <div class="layout-new">
                            	<a class="J_AddLayout add-layout" href="#">添加布局单元</a>
                            </div>
                            <div class="layout-ft">    
                                <div class="layout grid-m layout-block" data-ltype="lft" data-widgetid="12346745825" data-componentid="33" data-prototypeid="33" data-id="12346745825" data-max="1">
                                	<div class="title">店铺页尾</div>
                                    <div class="col-main">
                                        <div class="main-wrap J_TRegion" data-modules="main" data-width="f950" data-max="1">
                                            
                                    		<div class="J_TEmptyBox emptyp J_TModule" data-ismove="0"><span>请拖入模块</span></div>
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
            </div>
        </div>
    </div>
</div>

<div class="pops">
	<div class="popwrap pop_layouttype layedit" >
    	<a href="javascript:void(0)" class="closepop"><span></span></a>
        <div class="popcon">
			<div class="pophead">布局管理</div>
			<div class="popbody">
				<div class="add-layout-list">
					<span class="extra">单位：像素</span>

					<div data-modules="main" data-type="mall">
						<a data-componentid="231" class="mall" href="#" data-width="b950"></a>
					</div>

					<div data-modules="main,sub" data-type="slmr,srml">
						<a data-componentid="1" class="slmr" href="#" data-width="b750"></a>
						<a data-componentid="228" class="srml" href="#" data-width="b750"></a>
					</div>

					<div data-modules="main,sub,extra" data-type="grid-s5m0e5,grid-m0s5e5,grid-s5e5m0">
						<a data-componentid="20" class="l-grid-s5m0e5" href="#" data-width="b550"></a>
						<a data-componentid="229" class="l-grid-m0s5e5" href="#" data-width="b550"></a>
						<a data-componentid="230" class="l-grid-s5e5m0" href="#" data-width="b550"></a>
					</div>

				</div>
			</div>

        </div>
    </div>
</div>


<div  data-ismove="1" data-widgetid="13239642232" class="blockhasslide blocktmp" data-ltype="slmr" data-context="bd" data-blockindex="">
	<div class="layoutop">
		<a class="move"  title="移动"></a>
		<a class="edit"  title="编辑"></a>
		<a class="del"  title="删除"></a>
	</div>

	<div class="col-main">
		<div class="main-wrap J_TRegion" data-modules="main" data-width="b750">
			<div class="J_TEmptyBox J_TModule emptyp" data-ismove="0">
				<span>请拖入模块</span>
			</div>
		</div>
	</div>
	<div class="col-sub J_TRegion" data-modules="sub" data-width="b190">
		<div class="J_TEmptyBox J_TModule emptyp" data-ismove="0">
			<span>请拖入模块</span>
		</div>
	</div>

</div>

<div class="blockmall blocktmp" data-ismove="1" data-ltype="mall" data-widgetid="13170061768" data-context="bd" data-blockindex=""  >
	<div class="layoutop">
		<a  class="move" title="移动">移动</a>
		<a  class="edit" title="编辑">编辑</a>
		<a  class="del" title="删除">删除</a>
	</div>
	<div class="col-main">
		<div class="main-wrap J_TRegion" data-modules="main" data-width="b950">

			<div class="J_TEmptyBox emptyp J_TModule" data-ismove="0"><span>请拖入模块</span></div>
		</div>
	</div>
</div>




<script type="text/javascript" language="javascript">
var pageid="{$pageid}";

document.body.onselectstart = function(){
	return false;
}

var params={
	dragflag:false,
	dragtype:0,
	dragmod:{modid:0,wtype:"",source:false,sourceid:0},
	createxu:false,
	modpos:{"left":0,"top":0},
	startX:0,
	startY:0,
	curX:0,
	curY:0,
	zmod:{index:-1,half:0},
	arregions:[],
	arblocks:[],
	blockediting:0
}

function clearmodpos(){
	params.dragflag=false;
	params.dragtype=0;
	params.dragmod={modid:0,wtype:"",source:false,sourceid:0};
	params.createxu=false;
	params.modpos={"left":0,"top":0};		
	params.startX=0;
	params.startY=0;
	params.zmod={"index":-1,"half":true}
}


var arzmodspos=[];

function initpos(){
	params.arregions=[];
	params.arblocks=[];
	arzmodspos=[];
	var objblocks=$(".layout-con .layout-block");
	objblocks.each(function(i, e) {
		$e=$(e);
        var pos= GetPosition(e);
		pblock={"x":pos.left,"y":pos.top}
		pblock.h= e.offsetHeight;
		pblock.w= e.offsetWidth;
		pblock.id= $e.attr("data-id");
		pblock.wgetid= $.attr("data-widgetid");
		pblock.blocktype= $e.attr("data-ltype");
		params.arblocks.push(pblock);
		$e.attr("data-blockindex",i);
    });
	
//	var objregio=$(".layout-con .J_TRegion");
//	oregions.each(funion(i, e) {
//		var $e= $(e);
//	var pregion= GetPosition(e);
//		pregion.blocki= $e.closest(".layout-bck").attr("data-blockindex");/		pregion.h= e.offsetHeight//		pregion.w= e.offsetWidth;
//		pregion.ype= $e.attr("data-modules");
//		pregiowtype= $e.attr("data-wih");
//		pregion.arzmods= [];
//        var ozmods= $e.find(".J_TModule");
//		ozmods.each(functioii, ee) {
//			var $ee=$(ee);
//          var pzmod= GetPosition(ee);/			pzmod.h= ee.offsetHeight//			pzmod.w= ee.offsetWidth;
//			pzmod.modid=$ee.attr("data-componentid");
//			pzmod.wged= $ee.attr("data-widgetid");
//			pzmod.towpe= $ee.attr("data-context");
//	pregion.arzds.push(pzmod);
//        });
//		rs.arregions.push(pregion);
//
//    });
	
	var objzmods= $(".layout-con .J_TModule");
	//alert($(".pagein").width());
	objzmods.each(function(i, e) {
        var $e=$(e);
		var $b=$e.closest(".layout-block");
		var maxnum= $b.attr("data-max")?$b.attr("data-max"):0;
		var pos=GetPosition(e);
		var pzmod={"x":pos.left,"y":pos.top};
		pzmod.h= e.offsetHeight;
		pzmod.w= e.offsetWidth; 
		pzmod.modinregion= $e.index();
		pzmod.isempty= $e.hasClass("emptyp");
		pzmod.maxnum= maxnum;
		pzmod.accwtype=$e.parent().attr("data-width");
		pzmod.modid= $e.attr("data-componentid");
		pzmod.wgetid= $e.attr("data-widgetid");
		pzmod.towtype= $e.attr("data-context");
		arzmodspos.push(pzmod);
    });
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
	
	initpos();
	$(".toolbar").addClass("laytoolbar");

	$(".modsbox .emwrap em").on("mousedown",function(event){
		params.dragflag=true;
		params.dragtype=1;
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
		params.dragmod={"modid":$(this).attr("data-modid"),"wtype":$(this).attr("data-wtype"),"title":$(this).attr("title"),"source":false,"sourceid":0};
		params.modpos = GetPosition(this);

	});

	$(".layouteditmain").on("mousedown",".J_TModule",function(event){
		if(parseInt($(this).attr("data-ismove"))===0){return;}
		params.dragflag=true;
		params.dragtype=2;
		if(!event){
			event=window.event;
			this.onselectstart=function(){
				return false;
			}
		}
		var e=event;
		params.startX = e.clientX;
		params.startY = e.clientY;
		params.dragmod= {"modid":$(this).attr("data-componentid"),"totindex":$(".J_TModule").index(this),"iinregion":$(this).index(),"moduleid":$(this).attr("data-widgetid"),"wtype":$(this).attr("data-context"),"lmodwidth":this.offsetWidth,"lmodhtml":this.outerHTML,"title":$(this).attr("data-title"),"rtype":$(this).parent().attr("data-modules"),"w":$("this").parent().attr("data-width"),"blockid":$(this).closest(".layout-block").attr("data-widgetid")};
		params.modpos = GetPosition(this);

	});

	$(".layouteditmain").on("mousedown",".layoutop .move",function(){
		var $nowblock= $(this).parent().parent();
		params.dragflag=true;
		params.dragtype=3;
		if(!event){
			event=window.event;
			this.onselectstart=function(){
				return false;
			}
		}
		var e=event;
		params.startX = e.clientX;
		params.startY = e.clientY;
		params.dragmod = {"widgetid":$nowblock.attr("data-widgetid"),"blockindex":$nowblock.index()+1,"w":$nowblock.width(),"h":$nowblock.height()};
		params.modpos = GetPosition($nowblock[0]);
	});

	$(".layout-new a").click(function(){
		$(".pops").show().find(".pop_layouttype").removeClass("layedit").show();

	});

	$(".layout-con").on("click",".edit",function(){
		var $objlayblock= $(this).closest(".layout-block");
		var blockid= $objlayblock.attr("data-widgetid");
		var ltype= $objlayblock.attr("data-ltype");
		$(".pops").show().find(".pop_layouttype").addClass("layedit").show().attr("data-widgetid",blockid).find("."+ltype).addClass("on");
	});

	$(".pop_layouttype .add-layout-list a").click(function(){
		if(params.blockediting === 1){return false;}
		params.blockediting=1;
		var $layouttype = $(this).closest(".pop_layouttype");
		if(!$(this).hasClass("on")){
			if($layouttype.hasClass("layedit")){
				var widgetid= $layouttype.attr("data-widgetid");
				var ltype=$(this).attr("class");
				var self= $(this);
				$.ajax({
					type:"GET",
					url: "/Seller/Api/block?act=edit&pageid="+pageid+"&blockid="+widgetid+"&type="+ltype,
					dataType:"json",
					timeout:5000,
					success: function(data,status){
						if(data.status==1){
							console.log("编辑布局成功!");
							$(".layout-con [data-widgetid='"+widgetid+"']").attr("class","layout-block layout "+ltype).attr("data-ltype",ltype);
							$(".add-layout-list .on").removeClass("on");
							self.addClass("on");
							$layouttype.find(".closepop").trigger("click");
							initpos();

						}
						else{
							console.log(""+data.msg);

						}
						params.blockediting=0;
					},
					error:function(XHR, textStatus, errorThrown){
						console.log(textStatus+"\n"+errorThrown);
						params.blockediting=0;
					}
				});
			}
			else{
				var len= $(".layout-con .layout-bd .layout-block").length;
				if(len === 5){alert("布局最多不能超过5个");return false;}
				var cssname= $(this).attr("class");
				$.ajax({
					type:"GET",
					url: "/Seller/Api/block?act=add&pageid="+pageid+"&type="+cssname,
					//url:{:'Seller/Api/block',array('act'=>'add','pageid'=>pageid,'type'=>cssname)},
					dataType:"json",
					timeout:5000,
					success: function(data,status){
						if(data.status==1){
							console.log("新增布局成功!");
							$("." + (cssname==="mall"?"blockmall":"blockhasslide")).clone().attr("class","layout-block layout "+cssname).attr("data-ltype",cssname).attr("data-widgetid",data["data"]).attr("data-blockindex",len+1).appendTo(".layout-bd");
							$layouttype.find(".closepop").trigger("click");
							initpos();
						}
						else{
							console.log(""+data.msg);

						}
						params.blockediting=0;
					},
					error:function(XHR, textStatus, errorThrown){
						console.log(textStatus+"\n"+errorThrown);
						params.blockediting=0;
					}
				});

			}
		}
	});


	$(".pops .popwrap .closepop").click(function(){
		$(".pops").find(".popwrap:visible").find(".on").removeClass("on").end().hide().end().hide();
	});
	
	$("body").on("mousemove",function(event){
		if(params.dragflag){
			if(params.dragtype===1){
				var modid= params.dragmod.modid;
				var jsonpos= params.modpos;
				if(!params.createxu){
					$("<div class='dragxu modxu'>"+params.dragmod.title+"</div>").css(jsonpos).appendTo("body");
					params.createxu=true;
				}
				else{
					event = event || window.event;
					$(".dragxu").css({left:params.modpos.left+event.clientX-params.startX,top:params.modpos.top+event.clientY-params.startY});
					$(".dragxu")[0].onselectstart=function(ev){ return false;}
				}			
				var aaa = getzmodindex({"x":event.pageX+$(".pagein").scrollLeft(),"y":event.pageY+$(".pagein").scrollTop()});		
			}
			else if(params.dragtype===2){
				var dragmod=params.dragmod;
				var modid= dragmod.modid;
				var jsonpos= params.modpos;
				if(!params.createxu){
					$("<div class='dragxu lmodxu' style='width:"+(dragmod.lmodwidth-4)+"px'></div>").css(jsonpos).appendTo("body");
					$(".layout-con .J_TModule").eq(dragmod.totindex).hide().after("<div class='zmodposxu'></div>");
					params.createxu=true;
					initpos();
				}
				else{
					event = event || window.event;
					$(".dragxu").css({left:params.modpos.left+event.clientX-params.startX-$(".pagein").scrollLeft(),top:params.modpos.top+event.clientY-params.startY-$(".pagein").scrollTop()});
					$(".dragxu")[0].onselectstart=function(ev){ return false;}
				}
				var aaa = getzmodindex({"x":event.pageX+$(".pagein").scrollLeft(),"y":event.pageY+$(".pagein").scrollTop()});	
			}
			else if(params.dragtype===3){
				var dragmod=params.dragmod;
				var blockid= params.widgetid;
				var jsonpos=params.modpos;
				if(!params.createxu){
					$("<div class='dragxu lmodxu' style='width:"+(dragmod.w+12)+"px; height:"+(dragmod.h+14)+"px '>").css(jsonpos).appendTo("body");
					$(".layout-con .layout-block").eq(dragmod.blockindex).hide().after("<div class='zmodposxu'></div>");
					params.createxu=true;
					initpos();
				}
				else{
					event = event || window.event;
					$(".dragxu").css({left:params.modpos.left+event.clientX-params.startX-$(".pagein").scrollLeft(),top:params.modpos.top+event.clientY-params.startY-$(".pagein").scrollTop()});
					$(".dragxu")[0].onselectstart=function(ev){ return false;}
				}
				var aaa = getlayindex({"x":event.pageX+$(".pagein").scrollLeft(),"y":event.pageY+$(".pagein").scrollTop()});
			}

		}
	})

	$(".layouteditmain").on("click",".act-del",function(){
		var objzmod= $(this).parent();
		var pos = objzmod.closest(".layout-block").attr("data-widgetid")+"-"+ objzmod.parent().attr("data-modules")+"-"+ objzmod.index();
		var moduleid= objzmod.attr("data-widgetid");

		$.ajax({
			type:"GET",
			url: "/Seller/Api/module?act=delete&pageid="+pageid+"&moduleid="+moduleid+"&pos="+pos,
			dataType:"json",
			timeout:5000,
			success: function(data,status){
				if(data.status==1){
					if(objzmod.siblings(".J_TModule").length){
						objzmod.remove();
					}
					else{
						objzmod.replaceWith("<div class='J_TEmptyBox emptyp J_TModule' data-ismove='0'><span>请拖入模块</span></div>");
					}
					console.log("删除成功!");
				}
				else{
					console.log("删除失败"+data.msg);
				}
			}
			,error:function(XHR, textStatus, errorThrown){
				console.log(textStatus+"\n"+errorThrown);

			}
		});
		return false;

	})

	
	$(".layouteditmain").on("click",".layout-block .layoutop .del",function(){
		if(confirm('删除布局会将布局内的模块一并删除，确定要删除吗?')){
			var $layoutblock =$(this).parent().parent();
			var blockindex= $layoutblock.index();
			var blockid= $layoutblock.attr("data-widgetid");
			$.ajax({
				type:"GET",
				url: "/Seller/Api/block?act=delete&pageid="+pageid+"&blockid="+blockid+"&blockindex="+blockindex,
				dataType:"json",
				timeout:5000,
				success: function(data,status){
					if(data.status==1){
						console.log("删除成功!");
						$layoutblock.animate({height:"0"},function(){
							$(this).remove();
							initpos();
						})
					}
					else{
						console.log("删除失败!");
					}
				},
				error:function(XHR, textStatus, errorThrown){
					console.log(textStatus+"\n"+errorThrown);
					console.log("删除失败!");
				}
			});

		}	
	})
	
	$("body").on("mouseup",function(event){
		e = event || window.event;
		
		if(params.dragflag){
			var dragtype=params.dragtype;
			var dragmod= params.dragmod;
			var zmod = params.zmod;
			var objzmods= $(".layout-con .J_TModule");
			var $objzmod = objzmods.eq(zmod.index);
			var iinregion,wtype,blockid,rtype,resmoduleid;
			iinregion = $objzmod.parent().find(".J_TModule").index($objzmod[0]);
			iinregion = zmod.half? iinregion : iinregion+1;
			wtype= $objzmod.parent().attr("data-width");
			blockid = $objzmod.closest(".layout-block").attr("data-widgetid");
			rtype = $objzmod.parent().attr("data-modules");
			
			if( (e.clientX!==params.startX) || (e.clientY !== params.startY)){
				if(dragtype===1){
					
					if(zmod.index!==-1){

						$.ajax({
							type:"GET",
							url: "/Seller/Api/module?act=add&pageid="+pageid+"&compid="+dragmod.modid+"&wtype="+wtype+"&pos="+(blockid+"-"+rtype+"-"+iinregion),
							dataType:"json",
							timeout:5000,
							success: function(data,status){
								if(data.status==1){
									resmoduleid= data.data.moduleid;
									console.log("添加成功!");
									$(".zmodposxu").siblings(".emptyp").remove().end().replaceWith("<div class=\"J_TModule tb-module\" data-widgetid=\""+resmoduleid+"\" data-componentid=\""+dragmod.modid+"\"  data-title=\""+dragmod.title+"\" data-context=\""+dragmod.wtype+"\" data-ismove=\"1\" data-isdel=\"1\" data-isedit=\"1\" data-isadd=\"1\" data-width=\""+wtype+"\" ><span>"+dragmod.title+"</span><a href=\"#del\" class=\"act-del\"></a></div>");
								}
								else{
									console.log(""+data.msg);
									$(".zmodposxu").remove();

								}
							},
							error:function(XHR, textStatus, errorThrown){
								console.log(textStatus+"\n"+errorThrown);
								$(".zmodposxu").remove();
							}
						});

					}
				}
				else if(dragtype===2){
					if(zmod.index=== -1){
						objzmods.eq(dragmod.totindex).show().siblings(".zmodposxu").remove();
					}
					else{
						console.log(zmod.index+"--"+dragmod.totindex);
						if(zmod.index=== dragmod.totindex ){
							objzmods.eq(zmod.index).siblings("div").addClass("J_TModule").show().end().remove();
							$(".zmodposxu").remove();
						}
						else{
							dragmod.blockid=== blockid && dragmod.rtype===rtype && iinregion>dragmod.iinregion && iinregion--;
							var frompos= dragmod.blockid+"-"+dragmod.rtype+"-"+dragmod.iinregion;
							var topos = blockid+"-"+rtype+"-"+iinregion;

							if(frompos ===topos){
								$(".layout-con .J_TRegion>:hidden").addClass("J_TModule").show().siblings(".emptyp").remove();
								$(".layout-con .zmodposxu").remove();
							}
							else{
								$.ajax({
									type:"GET",
									url: "/Seller/Api/module?act=move&pageid="+pageid+"&moduleid="+dragmod.moduleid+"&frompos="+frompos+"&pos="+topos,
									dataType:"json",
									timeout:5000,
									success: function(data,status){
										if(data.status==1){
											console.log("移动成功!");

											if(!arzmodspos[dragmod.totindex].isempty){
												objzmods.eq(dragmod.totindex).remove();
											}
											else{
												objzmods.eq(dragmod.totindex).siblings("div").remove();
											}

											if(arzmodspos[zmod.index].isempty){
												objzmods.eq(zmod.index).remove();
											}


											$(".zmodposxu").replaceWith(dragmod.lmodhtml);

										}
										else{
											console.log(""+data.msg);
											$(".layout-con .J_TRegion>:hidden").addClass("J_TModule").show().siblings(".emptyp").remove();
											$(".layout-con .zmodposxu").remove();
										}
									},
									error:function(XHR, textStatus, errorThrown){
										console.log(textStatus+"\n"+errorThrown);
										$(".layout-con .J_TRegion>:hidden").addClass("J_TModule").show().siblings(".emptyp").remove();
										$(".layout-con .zmodposxu").remove();
									}
								});
							}

						}
					}
				}
				else if(dragtype===3){
					console.log(dragmod);
					console.log(zmod);
					dragmod.totindex=dragmod.totindex-1;
					var objblocks= $(".layout-con .layout-block");
					if(zmod.index===-1){
						objblocks.eq(dragmod.blockindex).show().siblings(".zmodposxu").remove();
					}
					else{
						var fromi=dragmod.blockindex- 1, toi=zmod.index- 1,half=zmod.half;
						toi=half?toi:toi+1;
						toi>fromi && toi--;
						if(fromi === toi){
							$(".layout-con .layout-block:hidden").show().replaceAll(".zmodposxu");
						}
						else{

							$.ajax({
								type:"GET",
								url: "/Seller/Api/block?act=move&pageid="+pageid+"&blockid="+dragmod.widgetid+"&frompos="+fromi+"&position="+toi,
								dataType:"json",
								timeout:5000,
								success: function(data,status){
									if(data.status==1){
										console.log("移动成功!");
										$(".layout-con .layout-block:hidden").show().replaceAll(".zmodposxu");
									}
									else{
										console.log(""+data.msg);
										$(".layout-con .layout-block:hidden").show().siblings(".zmodposxu").remove();

									}
								},
								error:function(XHR, textStatus, errorThrown){
									console.log(textStatus+"\n"+errorThrown);
									$(".layout-con .layout-block:hidden").show().siblings(".zmodposxu").remove();
								}
							});
						}

					}

				}
				

				$(".dragxu").remove();
			}
			
			
			clearmodpos();
			initpos();
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
			url: "/Seller/Api/module?act=delete&pageid="+pageid+"&moduleid="+zmodid+"&pos="+(zmodparas.blockid+"-"+zmodparas.rtype+"-"+zmodparas.iinregion),
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
				
			}
		});
		return false;
	})

	
	
})

function zmodadd(){
	var dragmod= params["dragmod"];
	var zmod= params["zmod"];
	var zmodpara= arzmodspos[zmod.index];
	var accwtype=zmodpara["accwtype"];
		
	$.ajax({
		type:"GET",
		url: "modhtml/"+dragmod["modid"]+accwtype+".html?op=add&modid="+dragmod["modid"]+"&accwtype="+accwtype,
		dataType:"html",
		timeout:5000,
		success: function(data,status){
			document.getElementById("iframepage").contentWindow.zmodadd(data,params.zmod);
			console.log("添加成功!");
		}
		,error:function(XHR, textStatus, errorThrown){
			console.log(textStatus+"\n"+errorThrown);
			
		}
	});
}


function getrelpos(pos){
	var dompagein = document.querySelector(".pagein");
	var pageinpos=GetPosition(dompagein);	
	var realx= pos.x + dompagein.scrollLeft - pageinpos.left;
	var realy= pos.y + dompagein.scrollTop -pageinpos.top;
	//console.log("realx:"+realx +";realy:"+realy);	
	console.log("pos.x"+pos.x+"scroll"+dompagein.scrollLeft+"pageinposleft"+pageinpos.left+"---posy"+pos.y+"pageintop"+dompagein.scrollTop+"pageinpos"+pageinpos.top);
	
	return {"x":realx,"y":realy}
}

function getlayindex(pos){
	var arblocks= params.arblocks;
	var finded = false;
	var objres ={index:-1,half:0};
	var zmod =params.zmod;
	var objzmods=$(".layout-con .layout-block");
	$.each(arblocks,function(i,v){
		if(!finded){
			if(pos.x>v.x && pos.x< v.x+v.w && pos.y>v.y && pos.y<v.y+v.h){
				var dragmod =params.dragmod;
				var objzmod = objzmods.eq(i);
				var nowhalf = pos.y<(v.y+ v.h/2);


				console.log("zhaodaole"+i);

				if(nowhalf!== zmod.half || i!== zmod.index){
					$(".zmodposxu").remove();


					if(nowhalf){
						objzmod.before("<div class='zmodposxu'></div>");
					}
					else{
						objzmod.after("<div class='zmodposxu'></div>");
					}
					initpos();
				}

				finded = true;
				objres= {index:i, half:nowhalf}

			}
		}
	});

	if(finded){
		params.zmod = objres;
		return objres;
	}
	else{}
}

function getzmodindex(pos){

	//console.log(pos);	
	//console.log(params.zmod);
	var finded=false;
	var objres= {index:-1,half:0};
	var zmod= params.zmod;
	var objzmods=$(".layout-con .J_TModule");
	//var arregions=params.arregions;
	$.each(arzmodspos,function(i,v){
		if(!finded){
			if(pos.x>v.x && pos.x< v.x+v.w && pos.y>v.y && pos.y<v.y+v.h){
				var dragmod=params.dragmod;
				var objzmod= objzmods.eq(i);
				if(dragmod.wtype.indexOf(v.accwtype)===-1) {
					finded = true;
					objres = {index: zmod.index, half: zmod.half};
					return false;
				}
				
				var nowhalf =pos.y<(v.y+v.h/2) || v.isempty;
				if(nowhalf !== zmod.half || i!== zmod.index ){
					//console.log("i:"+i+"half:"+nowhalf);
					
					if(params.dragtype===2 || 1===1){
						
						if(i!==zmod.index && zmod.index!==-1 && arzmodspos[zmod.index].isempty){
							objzmods.eq(zmod.index).show();
						}
						if(zmod.index===-1 && objzmods.eq(params.dragmod.totindex).siblings(".J_TModule").length===0){
							$(".zmodposxu").siblings(".J_TModule").removeClass("J_TModule").after("<div class='J_TEmptyBox emptyp J_TModule' data-ismove='0'><span>请拖入模块</span></div>");						
						}
					}					

					$(".zmodposxu").remove();
					
					if(v.isempty){
						objzmod.before("<div class='zmodposxu'></div>").hide();
					}
					else{
						if(nowhalf){
							objzmod.before("<div class='zmodposxu'></div>");	
						}
						else{
							objzmod.after("<div class='zmodposxu'></div>");	
						}
					}
					initpos();
				}
					
				finded = true;			
				objres= {index:i, half:nowhalf}	
			}	
		}	
	});
	
	
	
	if(finded){
		params.zmod = objres;
		return objres;
	}
	else{
		//params.zmod = {index:-1,half:0};
		//return {index:-1,half:0};
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
