var i;
$(document).ready(function(){
	/*金牌工人*/
	$(".worker_li").mouseenter(function(){
		$(this).find(".exhibition").stop();
		$(this).find(".explain").stop();
		$(this).find(".exhibition").animate({bottom:-612});
		$(this).find(".explain").animate({bottom:0});
		})
	$(".worker_li").mouseleave(function(){
		$(this).find(".exhibition").stop();
		$(this).find(".explain").stop();
		$(this).find(".exhibition").animate({bottom:0});
		$(this).find(".explain").animate({bottom:-612});
		})
	/*网友推荐*/
	$(".wk_netrec_li").mouseenter(function(){
		$(this).find(".wk_netrec_li_hide").stop();
		$(this).find(".wk_netrec_li_hide").animate({bottom:0});
		})
	$(".wk_netrec_li").mouseleave(function(){
		$(this).find(".wk_netrec_li_hide").stop();
		$(this).find(".wk_netrec_li_hide").animate({bottom:-368});
		})
	/*装途推荐*/
	$(".wk_ztrec_boxin:eq(0)").css({opacity:1});
	$(".wk_ztrec_sear b:eq(0)").css({"background-color":"#251309","color":"#ffffff"});
	$(".wk_ztrec_sear b").mouseenter(function(){
		$(".wk_ztrec_sear b").css({"background-color":"#ffffff","color":"#251309"});
		$(this).css({"background-color":"#251309","color":"#ffffff"});
		$(".wk_ztrec_boxin").stop();
		$(".wk_ztrec_boxin").animate({opacity:0},function(){$(this).hide()});
		i=$(this).index(".wk_ztrec_sear b");
		$(".wk_ztrec_boxin:eq("+i+")").stop();
		$(".wk_ztrec_boxin:eq("+i+")").show().animate({opacity:1});
		})
	})