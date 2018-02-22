var scrollDelta;
var dir;

$(document).ready(function() {
    $(".content2_con3 p").mouseenter(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img01.png");
	})
	$(".content2_con3 p").mouseleave(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img1.png");
	})
	$(".content1_con12").mouseenter(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img01.png");
	})
	$(".content1_con12").mouseleave(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img1.png");
	})
	
	
})

