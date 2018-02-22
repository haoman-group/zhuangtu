var main_con4b;
$(document).ready(function() {
	/*同意规则*/
	$(".main_con4 b").click(function(){
		if(main_con4b!=1){
		$(this).find("img").show();
		$(this).find("i").hide();
		main_con4b=1;}
		else{
		$(this).find("img").hide();
		$(this).find("i").show();
		main_con4b=0;}
		})
})