//验证密码强度
$(function(){ 
	$('#password').keyup(function () { 
		var strongRegex = new RegExp("^(?=.{6,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g"); 
		var mediumRegex = new RegExp("^(?=.{6,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*\\W)(?=.*[0-9]))|((?=.*\\W)(?=.*[a-z]))|((?=.*\\W)(?=.*[A-Z]))).*$", "g"); 
		var enoughRegex = new RegExp("(?=.{6,}).*", "g"); 
	
		if (false == enoughRegex.test($(this).val())) { 
			$('#level').removeClass('pw-weak'); 
			$('#level').removeClass('pw-medium'); 
			$('#level').removeClass('pw-strong'); 
			$('#level').addClass(' pw-defule'); 
			$('.degree .pw-tips .enoughRegex span').removeClass('on');
			 //密码小于六位的时候，密码强度图片都为灰色 
		}else{
			// $('#level').removeClass('pw-weak'); 
			// $('#level').removeClass('pw-medium'); 
			// $('#level').removeClass('pw-strong'); 
			$('#level').addClass('pw-weak'); 
			$('.degree .pw-tips .enoughRegex span').addClass('on');
		}
	 	if (mediumRegex.test($(this).val())) { 
			$('#level').removeClass('pw-weak'); 
			$('#level').removeClass('pw-medium'); 
			$('#level').removeClass('pw-strong'); 
			$('#level').addClass(' pw-medium'); 
			$('.degree .pw-tips .mediumRegex span').addClass('on');
			 //密码为七位及以上并且字母、数字、特殊字符三项中有两项，强度是中等 
		}else{
			$('.degree .pw-tips .mediumRegex span').removeClass('on');
		}
		if (strongRegex.test($(this).val())) { 
			$('#level').removeClass('pw-weak'); 
			$('#level').removeClass('pw-medium'); 
			$('#level').removeClass('pw-strong'); 
			$('#level').addClass(' pw-strong'); 
			$('.degree .pw-tips .strongRegex span').addClass('on');
			 //密码为八位及以上并且字母数字特殊字符三项都包括,强度最强 
		}else{
			$('.degree .pw-tips .strongRegex span').removeClass('on');
		} 
		//  { 
		// 	$('#level').removeClass('pw-weak'); 
		// 	$('#level').removeClass('pw-medium'); 
		// 	$('#level').removeClass('pw-strong'); 
		// 	$('#level').addClass('pw-weak'); 
		// 	$('.degree .pw-tips .enoughRegex img').addClass('on');
		// 	//如果密码为6为及以下，就算字母、数字、特殊字符三项都包括，强度也是弱的 
		// } 
		return true; 
	}); 
	$("#form_change #password").focus(function(){
		$(".degree").show();
	});
	$("#form_change #password").blur(function(){
		$(".degree").hide();
	});
	$("#form_reg #password").focus(function(){
		$(".degree").show();
	});
	$("#form_reg #password").blur(function(){
		$(".degree").hide();
	});
}) 

