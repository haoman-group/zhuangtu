var main_con11b=0; 
$(document).ready(function(){
	/*绑定银行卡实名认证*/
	$(".chkredout").click(function(){
		$(this).toggleClass("on");	
		if($(this).hasClass("on")){
			$(".btn_sellerreg_bank1").css("background-color","#c8000b");
			$(".btn_sellerreg_bank1").attr("href","seller_register032.html");
			}		
		else{
			$(".btn_sellerreg_bank1").css("background-color","#888");
			$(".btn_sellerreg_bank1").removeAttr("href");
			}	
	})
	})