var i=0;
var j=0;
var q=0;
var cont5=0;
var cont51;
timedCount=function timedCount(){
	j=j%3;
	$(".design_comlogo_index ul").find("li").css("background-color","#ffffff");
	// $(".design_comlogoul").animate({left:j*-1190+'px'});
	$(".design_comlogo_index li:eq("+j+")").css("background-color","#c05251");
	j=j+1;
	tab=setTimeout("timedCount()",3000);
}
function stopCount()
{
	clearTimeout(tab);
	return;
}
timed=function timed(){
	q=q%3;
	$(".design_com_indexin ul").find("li").css("background-color","#999");
	$(".design_com_li").animate({left:q*-1190+'px'});
	$(".design_com_indexin li:eq("+q+")").css("background-color","#df4a43");
	q=q+1;
	tab1=setTimeout("timed()",3000);
}
function stop()
{
	clearTimeout(tab1);
	return;
}
$(document).ready(function(){
	/*设计库*/
	/*$(".design_ku .kutxt").mouseenter(function(){
		i=$(this).index(".kutxt");
		$(this).stop();
		$(".design_ku .zhe:eq("+i+")").stop();
		$(".design_ku .zhe:eq("+i+")").animate({right:'0'});
		$(this).animate({right:'0'});
	})
	$(".design_ku .kutxt").mouseleave(function(){
		$(this).stop();
		$(".design_ku .zhe:eq("+i+")").stop();
		$(".design_ku .zhe:eq("+i+")").animate({right:'-178px'});
		$(this).animate({right:'-178px'});
	})*/
	$(".design_ku .kuli").mouseenter(function(){		
		$(this).find(".kutxts").stop();
		$(this).find(".kutxts").animate({top:0});
		
	})
	$(".design_ku .kuli").mouseleave(function(){
		$(this).find(".kutxts").stop();
		$(this).find(".kutxts").animate({top:"260px"});
		
	})
	/*设计师*/
	$(".design_erli").mouseenter(function(){
		$(this).find(".design_erli_up").stop();
		// $(this).find(".design_erli_down").stop();
		$(this).find(".design_erli_up").animate({top:'0'});
		// $(this).find(".design_erli_down").animate({bottom:'0'});
	})
	$(".design_erli").mouseleave(function(){
		$(this).find(".design_erli_up").stop();
		// $(this).find(".design_erli_down").stop();
		$(this).find(".design_erli_up").animate({top:'488px'});
		// $(this).find(".design_erli_down").animate({bottom:'130px'});
	})
// /*设计公司logo*/

$(".design_comlogoul li").mouseenter(function(){
	$(".design_comlogoul li").find("a").removeClass("on");
	$(this).find("a").addClass("on");
	var logobox = $(".design_comlogoul li").find(".on");
    $(".design_company_special").find("a").attr("href",logobox.attr("href")).html("<img src='"+logobox.find('img').attr('src')+"'><h5>"+logobox.find('h5').html()+"</h5><p>"+logobox.find('p').html()+"</p><input type='button' value='立即预约'>");

}).eq(0).trigger("mouseenter");
$(".design_comlogoul li").mouseleave(function(){
	$(this).find("a").removeClass("on");
})



timedCount();
$(".design_comlogobox").mouseenter(function(){
		stopCount();
		})
$(".design_comlogobox").mouseleave(function(){
		tab=setTimeout("timedCount()",1000);
		})
$(".design_comlogo_index li:eq(0)").css("background-color","#c05251");
$(".design_comlogo_index li").click(function(){
	   j=$(this).index(".design_comlogo_index li");
	   $(".design_comlogo_index ul").find("li").css("background-color","#ffffff");
	   $(".design_comlogoul").animate({left:j*-1190+'px'});
	   $(this).css("background-color","#c05251");
	})
// /*设计公司*/
	timed();
	$(".design_com_index").mouseenter(function(){
		stop();
	})
	$(".design_com_index").mouseleave(function(){
		tab1=setTimeout("timed()",1000);
	})
	$(".design_com_box").mouseenter(function(){
		stop();
	})
	$(".design_com_box").mouseleave(function(){
		tab1=setTimeout("timed()",1000);
	})
	$(".design_com_indexin li:eq(0)").css("background-color","#df4a43");
	$(".design_com_indexin li").click(function(){
		q=$(this).index(".design_com_indexin li");
		$(".design_com_indexin ul").find("li").css("background-color","#999");
		$(".design_com_li").animate({left:q*-1190+'px'});
		$(this).css("background-color","#df4a43");
	})
	/*每日低价*/
	$(".design_spe_cell").mouseenter(function(){
		$(this).find(".design_spe_cellup").stop();
		$(this).find(".design_spe_cellzhe").stop();
		$(this).find(".design_spe_cellup").animate({top:'0'});
		$(this).find(".design_spe_cellzhe").animate({top:'0'});
	})
	$(".design_spe_cell").mouseleave(function(){
		$(this).find(".design_spe_cellup").stop();
		$(this).find(".design_spe_cellzhe").stop();
		$(this).find(".design_spe_cellup").animate({top:'415px'});
		$(this).find(".design_spe_cellzhe").animate({top:'415px'});
	})

	$(window).resize(function(){if($(window).width()<1190){
		$(".design_speleft1").hide();
		$(".design_speleft2").hide();
		$(".design_speright1").hide();
		$(".design_speright2").hide();
		$(".conwhole").css("width","1190");
	}
	else if($(window).width()<1500){
		$(".design_speleft1").show();
		$(".design_speleft2").show();
		$(".design_speright1").hide();
		$(".design_speright2").hide();
		$(".conwhole").css("width","100%");
	}
	else {
		$(".design_speleft1").show();
		$(".design_speleft2").show();
		$(".design_speright1").show();
		$(".design_speright2").show();
		$(".conwhole").css("width","100%");
	}
	})
	$(".design_spe_indexin li").click(function(){
		cont5=$(this).index(".design_spe_indexin li");
		if(cont5==1){
			if($(".design_spe_ul").css("left")!=-2380+'px')
			{
				cont51=parseInt($(".design_spe_ul").css("left"))-1190;
				$(".design_spe_ul").animate({left:'-=1190px'});
			}
			else{alert("none");}
		}
		else if(cont5==0){
			if($(".design_spe_ul").css("left")!=0+'px')
			{
				cont51=parseInt($(".design_spe_ul").css("left"))+1190;
				$(".design_spe_ul").animate({left:'+=1190px'});
			}
			else{alert("none");}
		}
	})
})
$(document).ready(function(){
	/*隐藏搜索*/
	$(document).scroll(function(){
		if($(document).scrollTop()>100)
		{$(".hidden_searchBg").show();
		}
		else
		{$(".hidden_searchBg").hide();
		}
	})
	if($(window).width()<1190){
		$(".design_speleft1").hide();
		$(".design_speleft2").hide();
		$(".design_speright1").hide();
		$(".design_speright2").hide();
		$(".conwhole").css("width","1190");
	}
	else if($(window).width()<1500){
		$(".design_speleft1").show();
		$(".design_speleft2").show();
		$(".design_speright1").hide();
		$(".design_speright2").hide();
		$(".conwhole").css("width","100%");
	}
	else {
		$(".design_speleft1").show();
		$(".design_speleft2").show();
		$(".design_speright1").show();
		$(".design_speright2").show();
		$(".conwhole").css("width","100%");
	}
})