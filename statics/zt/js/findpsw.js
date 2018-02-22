$(function(){
	// var time = $('.time')[0];
	var num = 60;
	var t = setInterval(function(){
			num--;
			$('.time').html(function(){
				return num + "秒后，重新获取验证码";
			});
			if(num == 0){
				$('.time').css('display','none');
				$('.success').css('display','none');
				$('.tips').css('display','block');

				clearInterval(t);
			}


		},1000)
	$('.tips').click(function(){
		num = 60;
		$('.time').css('display','block');
		$('.success').css('display','block');
		$('.tips').css('display','none');
		setInterval(function(){
				num--;
				$('.time').html(function(){
				return num + "秒后，重新获取验证码";
			    });
				if(num == 0){
				$('.time').css('display','none');
				$('.success').css('display','none');
				$('.tips').css('display','block');
				}

			},1000)
	})

    /*$('.form_pasw .new_pasw').bind('focus',function(){
    	$('.findpsw_main .safe').css('display','block'));
    }*/
    //新登录密码验证
    $('.form_change .new_pasw').focus(function(){
    	$('.safe').css('display','block');
    }).blur(function(){
    	if($.trim($(this).val()) == ''){
    		$('.safe').css('display','none');
    		$('.findpsw_main .dlverify .findsucc_pass').css('display','none');
    		$('.findpsw_main .dlverify .finderror_pass').css('display','none');
    	}else{
    		if(check_pass(this)){
    			$('.findpsw_main .dlverify .findsucc_pass').css('display','inline-block');
    			$('.findpsw_main .dlverify .finderror_pass').css('display','none');
    			$('.safe').css('display','none');

    		}else{
    			$('.findpsw_main .dlverify .findsucc_pass').css('display','none');
    			$('.findpsw_main .dlverify .finderror_pass').css('display','inline-block');
    			$('.safe').css('display','none');
    		}
    	}

    })

    //变量声明
    var flag;
    var value;
    var value_length;
    var code_length;
	//密码强度验证
	$('.form_change .new_pasw').bind('keyup',function(){
		check_pass(this);
	})
	function check_pass(_this){
		flag = false;
		// console.log(1);
		value = $.trim($(_this).val());

		// var value = $(this).val();
		// alert(value);
		value_length = value.length;
		// var value_length = 9;

		code_length = 0;
		//第一个必须条件的验证0-20位之间
		if(value_length >= 6 && value_length <= 20){
			$('.safe .ts1').css('background','url(/statics/zt/images/findpsw/success.png) no-repeat left center');
		}else{
			$('.safe .ts1').css('background','url(/statics/zt/images/findpsw/xx.png) no-repeat left center');
		}
		//第二个必须条件
		if(value_length > 0 && !/\s/.test(value)){
			$('.safe .ts2').css('background','url(/statics/zt/images/findpsw/success.png) no-repeat left center');
		}else{
			$('.safe .ts2').css('background','url(/statics/zt/images/findpsw/xx.png) no-repeat left center');
		}
		//第三个必须条件
		if(/[0-9]/.test(value)){
			code_length++;
		}
		if(/[a-z]/.test(value)){
			code_length++;
		}
		if(/[A-Z]/.test(value)){
			code_length++;
		}
		if(/[^0-9a-zA-Z]/.test(value)){
			code_length++;
		}
		if(code_length >= 2){
			$('.safe .ts3').css('background','url(/statics/zt/images/findpsw/success.png) no-repeat left center');
		}else{
			$('.safe .ts3').css('background','url(/statics/zt/images/findpsw/xx.png) no-repeat left center');
		}
		//安全级别
		//高   大于等于10个字符并且3种不同类型的字符混拼
		//中   大于等于8个字符并且2种不同类型的字符混拼
		//低   大于等于1个字符
		//无   没有字符
		if(value_length >= 10 && code_length >= 3){
			$('.safe .dj1').css('background-color','#ce2329');
			$('.safe .dj2').css('background-color','#ce2329');
			$('.safe .dj3').css('background-color','#ce2329');
			$('.safe .dj4').html('高').css('color','#ce2329');
		}else if(value_length >= 8 && code_length >= 2){
			$('.safe .dj1').css('background-color','#f60');
			$('.safe .dj2').css('background-color','#f60');
			$('.safe .dj3').css('background-color','#c9c9c9');
			$('.safe .dj4').html('中').css('color','#f60');
		}else if(value_length >= 1){
			$('.safe .dj1').css('background-color','maroon');
			$('.safe .dj2').css('background-color','#c9c9c9');
			$('.safe .dj3').css('background-color','#c9c9c9');
			$('.safe .dj4').html('低').css('color','maroon');
		}else{
			$('.safe .dj1').css('background-color','#c9c9c9');
			$('.safe .dj2').css('background-color','#c9c9c9');
			$('.safe .dj3').css('background-color','#c9c9c9');
			$('.safe .dj4').html('');
		}
		if(value_length>=6&&value_length<=20&&code_length>=2){
			flag = true;
			return flag;
		}

	}
	//重新确认密码
	$('.confirm_pasw').focus(function(){
	    $('.findinfo_notpass').css('display','inline-block');
	    $('.findsucc_notpass').css('display','none');
		$('.finderror_notpass').css('display','none');
	}).blur(function(){
		if($.trim($(this).val()) == ''){
			$('.findinfo_notpass').css('display','inline-block');

		}else if($.trim($(this).val()) == $.trim($('.form_pasw .new_pasw').val())){
			$('.findinfo_notpass').css('display','none');
			$('.findsucc_notpass').css('display','inline-block');
			$('.finderror_notpass').css('display','none');
		}else{
			$('.findinfo_notpass').css('display','none');
			$('.findsucc_notpass').css('display','none');
			$('.finderror_notpass').css('display','inline-block');
		}
	})
	//确定按钮判断
	$('.reset').click(function(){
		if(value_length >= 6 && value_length <= 20&&code_length >= 2 && $.trim($('.confirm_pasw').val()) == $.trim($('.form_pasw .new_pasw').val())){
			// alert(1);

		}else{
			$('.findinfo_pass').css('display','inline-block');
			$('.findinfo_notpass').css('display','inline-block');

		}
	})

	//手机号码判断
	$('#findinfo_iphone').focus(function(){
		$('.findinfo_iphone').css('display','none');
	}).blur(function(){
		if(($(this).val().length != 11 ) || isNaN($(this).val())){
			$('.findinfo_iphone').css('display','inline-block');
		}
	})


})
