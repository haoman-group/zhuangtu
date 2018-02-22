//弹出窗口的显现和隐藏
var seller_fix;
$(document).ready(function(){
	$(".seller_main .fix_show").click(function(){
		seller_fix=$(this).index(".fix_show");
		$(".seller_main .fix:eq("+seller_fix+")").show();
		$(".seller_main .position:eq("+seller_fix+")").show();
		});
	$(".seller_main .close").click(function(){
		$(".seller_main .fix").hide();
		$(".seller_main .position").hide();
		});
	});
