var main_con23211;
var main_con2412;
$(document).ready(function(){
	/*记一笔*/
	$(".main_con23211:eq(0)").find(".main_con23212").css("background-color","#000000");
	$(".main_con23220:eq(0)").show();
	$(".main_con23211 img").click(function(){
		main_con23211=$(this).index(".main_con23211 img");
		$(".main_con23212").css("background-color","transparent");
		$(".main_con23220").hide();
		$(".main_con23212:eq("+main_con23211+")").css("background-color","#000000");
		$(".main_con23220:eq("+main_con23211+")").show();
		})
	/*事件*/
	$(".main_con2412:eq(0)").css({"background-color":"#cf000d","border-color":"#cf000d"});
	$(".main_con2413:eq(0)").hide();
	$(".main_con2414:eq(0)").show();
	$(".main_con2412").click(function(){
		main_con2412=$(this).index(".main_con2412");
		$(".main_con2412").css({"background-color":"#ffffff","border-color":"#888888"});
		$(".main_con2413").show();
		$(".main_con2414").hide();
		$(".main_con2412:eq("+main_con2412+")").css({"background-color":"#cf000d","border-color":"#cf000d"});
		$(".main_con2413:eq("+main_con2412+")").hide();
		$(".main_con2414:eq("+main_con2412+")").show();
		})
	/*全部功能*/
	$(".main_con11").mouseenter(function(){
		$(".main_con11").find(".main_con11_box").hide();
		$(this).find(".main_con11_box").show();
		})
	})