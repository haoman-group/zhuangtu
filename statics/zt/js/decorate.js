$(function(){
	var hasiframe=$("iframe").length>0;

	$(".slideform .delbgimg").click(function(){
		$(this).parent().siblings(".pic").attr("src","/statics/zt/images/decorate/topbgimgnone.gif");
		$(this).parent().siblings("input").val("");
	})

	$(".toolbar li").click(function(){
		if($(this).index()===0 || !$(this).parent().hasClass("laytoolbar")){
			if($(this).hasClass("on")){
				$(this).removeClass("on");	
				$(".toolpanel li.on").removeClass("on");
				$(".mkmain").removeClass("mkmainexp");
				
				resizes();			
			}
			else{
				if($(this).siblings("li.on").length===0){
					$(this).addClass("on");
					$(".mkmain").addClass("mkmainexp");
					resizes();
				}
				else{
					$(this).addClass("on").siblings().removeClass("on");	
				}
				var index=$(this).index();
				$(".toolpanel li").eq(index).addClass("on").siblings().removeClass("on");				
			}	
		}
	})

	$(".selepage").click(function(){
		$(".selpagelistbox").toggle();
	})
	
	$(".toolpanel li .close").click(function(){
		$(".toolbar li.on").removeClass("on");
		$(this).parent().removeClass("on");
		$(".mkmain").removeClass("mkmainexp");
		resizes();
		
		return false;	
	})
	
	$(window).resize(function(){
		resizes();
		hasiframe && iFrameHeightcw();	
	})
	
	resizes();



})

function resizes(){
	var exped= $(".toolbar li.on").length>0;
	//console.log(document.body.clientHeight-121+"---"+document.documentElement.clientWidth);
	$(".pagein").height(document.body.clientHeight-121);
	$(".pagein").width(document.documentElement.clientWidth-80-(exped?233:0));
	if($(".layouteditmain").length>0){
		var postimer = setTimeout(initpos,600);
	}
}
