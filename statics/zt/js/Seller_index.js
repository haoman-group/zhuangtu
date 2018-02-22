$(document).ready(function(){
	/*搜索*/
	$(".search_con1:eq(0)").css({"background-color":"#498cd0","color":"#ffffff"}).find("b").show();
	$(".search_con1").click(function(){
		$(".search_con1").css({"background-color":"transparent","color":"#000000"}).find("b").hide();
	    $(this).css({"background-color":"#498cd0","color":"#ffffff"}).find("b").show();
		})
	})