$(document).ready(function(){
	$(".content2_con1 b").mouseenter(function(){
		$(this).find("dl").show();
		})
	$(".content2_con1 b").mouseleave(function(){
		$(this).find("dl").hide();
		})
	$(".content6_con1 dl").mouseenter(function(){
		$(this).find("i").css("border-color","#f39700 transparent transparent");
		})
	$(".content6_con1 dl").mouseleave(function(){
		$(this).find("i").css("border-color","#c9c9ca transparent transparent");
		})
	
})
