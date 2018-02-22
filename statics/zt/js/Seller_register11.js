$(document).ready(function() {
	/*同意规则*/ 
	$(".chkredin").click(function(){
		$(this).toggleClass("on");	
		if($(this).hasClass("on")){
			$(".btn_sellerreg_next1").css("background-color","#c8000b");
			$(".btn_sellerreg_next1").attr("href","seller_register12.html");
			}		
		else{
			$(".btn_sellerreg_next1").css("background-color","#888");
			$(".btn_sellerreg_next1").removeAttr("href");
			}	
	})
})