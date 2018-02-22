var mainRight_con4i=0;
$(document).ready(function() {
	/*一周免登陆*/
	$(".mainRight_con4 b").click(function(){
		if(mainRight_con4i==0)
		{$(this).find("i").css("background-color","#c8000b");
		mainRight_con4i=1;}
		else{
			$(this).find("i").css("background-color","#eaeaea");
			$(this).find("i").css("border","1px solid #bbbfc2");
			mainRight_con4i=0;
			}
		})
	$('.login_search1').blur(function(){
		if($.trim($(this).val()) == ''){
			$('.empty_username').css('display','inline-block');
			
		}
	}).focus(function(){
		$('.empty_username').css('display','none');
	})
	$('.login_search2').blur(function(){
		if($.trim($(this).val()) == ''){
			$('.empty_userpass').css('display','inline-block');
			
		}
	}).focus(function(){
		$('.empty_userpass').css('display','none');
	})
})