var i;
$(document).ready(function() {
	/*导航*/
	$(".main_con11 a").mouseenter(function(){
		$(this).find(".main_con111").show();
		})
	$(".main_con11 a").mouseleave(function(){
		$(this).find(".main_con111").hide();
		})
		/*勾选*/
		$(".main i").click(function(){
			$(this).find("img").show();
			})

		/*推荐产品*/
		$(".main_con5 a").mouseenter(function(){
			i=$(this).index(".main_con5 a");
			i=i*-1190;
			$(".main_con61").stop();
			$(".main_con61").animate({left:i+'px'});
			})
	})