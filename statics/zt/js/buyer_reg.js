var ajaxdomain="/";

$(function() {

	
	if($(".btnsellerregfrom_verify").length>0){
		var thisbtn=$(".btnsellerregfrom_verify");
		nowvercount=60;
		//nowvercount=6;
		vercodetime(thisbtn);
		
	
		thisbtn.click(function(){		
			var $btngetcode=$(this);
			$btngetcode.attr("disabled","disabled");
			var mobile=$("[name='mobile']").val().replace(/\s+/g,"");
			sendsms(mobile,$btngetcode);
			
		});
	}



	$("#form_sendsms").validate({
		errorElement : "i",
		onkeyup : false,
		submitHandler : function(form){
			form.submit();
		},
		rules : {
			mobile:{
				required : true,
				chkmobile : true,
				chkmobileed : true
			},
			chkuregagree:{
				required : true
			},
			vcode :{
				required : true,
				chkvcode : true
			}
		},
		messages : {
			mobile:{
				required : "请填写手机号",
				chkmobile : "手机号码不正确",
				chkmobileed : "手机号已注册"
			},
			chkuregagree:{
				required : "需要同意协议"
			},
			vcode :{
				required : "请填写验证码",
				chkvcode : "验证码错误"
			}
		}
	})


	$("#form_vcode").validate({
		errorElement : "i",
		onkeyup : false,
		submitHandler : function(form){
			form.submit();
		},
		rules : {
			vcode :{
				required : true,
				chksmscode : true,
				//chkvcode :true
			}
		},
		messages : {
			vcode :{
				required : "请填写验证码",
				chksmscode : "验证码错误",
				///chkvcode : "验证码错误"
			}
		},
		success :function(label){

			$(label).siblings(".inptverify").removeClass("inptverify");
			$form=$(label).closest("form");
			if($form.find(".inptverify").length===0){
				$(".btn_sellerreg_next").addClass("btn_sellerreg_nexton");
			}
		}
	})

	$("#form_reg").validate({
		errorElement : "i",
		onkeyup : false,
		submitHandler : function(form){
			form.submit();
		},
		rules : {
			password :{
				required : true,
				chkpassword : true,
				minlength : 6,
				maxlength : 30
			},
			repassword :{
				equalTo : "#password"
			},
			username : {
				required : true
			}
		},
		messages : {
			password :{
				required : "请输入密码",
				chkpassword : "密码不能包含空格",
				minlength : "密码不少于6位数",
				maxlength : "密码不大于30位数"
			},
			repassword :{
				equalTo : "两次输入的密码不相同"
			},
			username : {
				required : "请填写会员名"
			}
		},
		success :function(label){

			$(label).siblings(".inptverify").removeClass("inptverify");
			$form=$(label).closest("form");
			if($form.find(".inptverify").length===0){
				$(".btn_sellerreg_next").addClass("btn_sellerreg_nexton");
			}
		}
	})

	
	jQuery.validator.addMethod("chkvcode", function(value, element) {
		return /^[a-zA-Z0-9]{4}$/.test(value);	
	});
	jQuery.validator.addMethod("chksmscode", function(value, element) {
		return /^[a-zA-Z0-9]{6}$/.test(value);	
	});
	jQuery.validator.addMethod("chkpassword", function(value, element) {
		return !hasspace(element.value);
	});
	
	jQuery.validator.addMethod("chkmobile", function(value, element) {
		return /^1[3|4|5|8|7|9][0-9]\d{8}$/.test(value);	
	});
	jQuery.validator.addMethod("postcode", function(value, element){
		return /^[1-9]\d{5}(?!\d)$/.test(value);
	});
	jQuery.validator.addMethod("chkemails",function(value,element){
		return /^[\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?$/.test(value);
	});
	
	jQuery.validator.addMethod("chkmobileed", function(value, element) {
		var flag = false;
		$.ajax({
			type : "GET",
			url : ajaxdomain + 'Api/User/checkMobile?mobile=' + value,
			dataType:"json",
			async : false,
			timeout : 5000,
			success : function(result) {
				flag = result.status=="1";
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.status + "|"
						+ XMLHttpRequest.readyState + "|" + textStatus);
			}
		});
		return flag;
	})
	
	jQuery.validator.addMethod("chkmobileis", function(value, element) {
		var flag = false;
		$.ajax({
			type : "GET",
			url : ajaxdomain + 'index.php/Member/Public/checkLoginMobile?mobile=' + value,
			dataType:"json",
			async : false,
			timeout : 5000,
			success : function(result) {
				flag = result.status=="1";
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.status + "|"
						+ XMLHttpRequest.readyState + "|" + textStatus);
			}
		});
		return flag;
	})

	// jQuery.validator.addMethod("chkvcode", function(value, element) {
	// 	var flag = false;
	// 	$.ajax({
	// 		type : "GET",
	// 		url : ajaxdomain + 'index.php/Member/Public/checkMobile?mobile=' + value,
	// 		async : false,
	// 		timeout : 5000,
	// 		success : function(result) {
	// 			flag = result == "true";
	// 		},
	// 		error : function(XMLHttpRequest, textStatus, errorThrown) {
	// 			console.log(XMLHttpRequest.status + "|"
	// 				+ XMLHttpRequest.readyState + "|" + textStatus);
	// 		}
	// 	});
	// 	flag=true;
	// 	return flag;
	// }, "");
	
	jQuery.validator.addMethod("chkphone", function(value, element) {
		return /^1[3|4|5|8|7|9][0-9]\d{8}$/.test(value);	
	})
	
	
	//验证身份证号
	jQuery.validator.addMethod("chkidcard", function(code, element) {
		//return /^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(value);	
		var city={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江 ",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北 ",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏 ",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外 "};
		var tip = "";
		var pass= true;
		
		if(!code || !/^\d{6}(18|19|20)?\d{2}(0[1-9]|1[12])(0[1-9]|[12]\d|3[01])\d{3}(\d|X)$/i.test(code)){
			tip = "身份证号格式错误";
			pass = false;
		}
		
	   else if(!city[code.substr(0,2)]){
			tip = "地址编码错误";
			pass = false;
		}
		else{
			//18位身份证需要验证最后一位校验位
			if(code.length == 18){
				code = code.split('');
				//∑(ai×Wi)(mod 11)
				//加权因子
				var factor = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2 ];
				//校验位
				var parity = [ 1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2 ];
				var sum = 0;
				var ai = 0;
				var wi = 0;
				for (var i = 0; i < 17; i++)
				{
					ai = code[i];
					wi = factor[i];
					sum += ai * wi;
				}
				var last = parity[sum % 11];
				if(parity[sum % 11] != code[17]){
					tip = "校验位错误";
					pass =false;
				}
			}
		}
		return pass;
	})
	
	
	
	//验证银行卡号
	jQuery.validator.addMethod("chkbankcard", function(bankno, element) {
		
		//bankno为银行卡号 banknoInfo为显示提示信息的DIV或其他控件
		var lastNum=bankno.substr(bankno.length-1,1);//取出最后一位（与luhm进行比较）
	 
		var first15Num=bankno.substr(0,bankno.length-1);//前15或18位
		var newArr=new Array();
		for(var i=first15Num.length-1;i>-1;i--){    //前15或18位倒序存进数组
			newArr.push(first15Num.substr(i,1));
		}
		var arrJiShu=new Array();  //奇数位*2的积 <9
		var arrJiShu2=new Array(); //奇数位*2的积 >9
		 
		var arrOuShu=new Array();  //偶数位数组
		for(var j=0;j<newArr.length;j++){
			if((j+1)%2==1){//奇数位
				if(parseInt(newArr[j])*2<9)
				arrJiShu.push(parseInt(newArr[j])*2);
				else
				arrJiShu2.push(parseInt(newArr[j])*2);
			}
			else //偶数位
			arrOuShu.push(newArr[j]);
		}
		 
		var jishu_child1=new Array();//奇数位*2 >9 的分割之后的数组个位数
		var jishu_child2=new Array();//奇数位*2 >9 的分割之后的数组十位数
		for(var h=0;h<arrJiShu2.length;h++){
			jishu_child1.push(parseInt(arrJiShu2[h])%10);
			jishu_child2.push(parseInt(arrJiShu2[h])/10);
		}        
		 
		var sumJiShu=0; //奇数位*2 < 9 的数组之和
		var sumOuShu=0; //偶数位数组之和
		var sumJiShuChild1=0; //奇数位*2 >9 的分割之后的数组个位数之和
		var sumJiShuChild2=0; //奇数位*2 >9 的分割之后的数组十位数之和
		var sumTotal=0;
		for(var m=0;m<arrJiShu.length;m++){
			sumJiShu=sumJiShu+parseInt(arrJiShu[m]);
		}
		 
		for(var n=0;n<arrOuShu.length;n++){
			sumOuShu=sumOuShu+parseInt(arrOuShu[n]);
		}
		 
		for(var p=0;p<jishu_child1.length;p++){
			sumJiShuChild1=sumJiShuChild1+parseInt(jishu_child1[p]);
			sumJiShuChild2=sumJiShuChild2+parseInt(jishu_child2[p]);
		}      
		//计算总和
		sumTotal=parseInt(sumJiShu)+parseInt(sumOuShu)+parseInt(sumJiShuChild1)+parseInt(sumJiShuChild2);
		 
		//计算Luhm值
		var k= parseInt(sumTotal)%10==0?10:parseInt(sumTotal)%10;        
		var luhm= 10-k;
		 
		return lastNum==luhm;
		     

	})
	
	jQuery.validator.addMethod("chkcodepre", function(value, element) {
		var flag = false;
		$.ajax({
			type : "GET",
			url : ajaxdomain + 'index.php/Api/Sms/validate?mobile='+$("#regForm [name='mobile']").val()+'&code=' + value,
			dataType:"json",
			async : false,
			timeout : 5000,
			success : function(result) {
				flag = result.status=="1";
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.status + "|"
						+ XMLHttpRequest.readyState + "|" + textStatus);
			}
		});
		return flag;
	})
	
	// jQuery.validator.addMethod("chkvcode", function(value, element) {
	// 	var flag = false;
	// 		$.ajax({
	// 			type : "GET",
	// 			url : ajaxdomain + 'index.php/Member/Public/checkMobile?mobile=' + value,
	// 			async : false,
	// 			timeout : 5000,
	// 			success : function(result) {
	// 				flag = result == "true";
	// 			},
	// 			error : function(XMLHttpRequest, textStatus, errorThrown) {
	// 				console.log(XMLHttpRequest.status + "|"
	// 						+ XMLHttpRequest.readyState + "|" + textStatus);
	// 			}
	// 		});
	// 	flag=true;
	// 	return flag;
	// }, "");
	
	jQuery.validator.addMethod("chkinvpre", function(value, element) {
		return /^\d{6,9}$/.test(value);
	})
	
	jQuery.validator.addMethod("chkinviteid", function(value, element) {
		var flag = false;
		$.ajax({
			type : "GET",
			url : ajaxdomain + 'index.php/Member/Public/checkInviteid?inviteid=' + value,
			dataType:"json",
			async : false,
			timeout : 5000,
			success : function(result) {
				flag = result.status=="1";
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.status + "|"
						+ XMLHttpRequest.readyState + "|" + textStatus);
			}
		});
		return flag;
	})
	
	
	$("#regForm .getcode").click(function(){

		
		var $btngetcode=$(this);
		$btngetcode.attr("disabled","disabled");
		var mobile=$("#regForm [name='mobile']").val().replace(/\s+/g,"");
		if (!(/^1[3|4|5|8|7|9][0-9]\d{8}$/.test(mobile))) {			
			$btngetcode.removeAttr("disabled");
			return false;
		}
		$.ajax({
			type : "GET",
			url : ajaxdomain + 'index.php/Member/Public/checkMobile?mobile=' + mobile,
			dataType:"json",
			async : false,
			timeout : 5000,
			success : function(result) {
				if(result.status=="1"){
					
					sendsms(mobile,$btngetcode);
				}
				else{
					$btngetcode.siblings("i").html("手机号码已注册过,请更换").removeClass("right");
					$btngetcode.removeAttr("disabled");
					return false;
				}
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.status + "|"
						+ XMLHttpRequest.readyState + "|" + textStatus);
				$btngetcode.removeAttr("disabled");
				return false;
			}
		});
		
		
	})
	
	
})

function hasspace(v){
	return v.indexOf(" ")>0;
}


function sendsms(mobile,btn){
	$.ajax({
		type:"GET",
		url: "/api/user/send_reg_sms?mobile="+mobile,
		dataType:"json",
		timeout:5000,
		success: function(data,status){
			if(data!=null){
				var ostatus=data["status"];
				var msg=data["msg"];
				if(ostatus==1){
					vercodetime(btn);
					}
				else{
					alert(msg);
					btn.removeAttr("disabled");
					}
				
				}
			}
		,error:function(XHR, textStatus, errorThrown){
			   console.log(textStatus+"\n"+errorThrown);
			   $btngetcode.removeAttr("disabled");
			}	
	})	
		
}

function vercodetime(btn){
	if(typeof(nowvercount)!="undefined" && nowvercount==1){
		btn.removeAttr("disabled").val("获取验证码").removeClass("btndis");
		nowvercount=60;
		//nowvercount=6;
		return;
	}
	
	if(btn.val()=="获取验证码"){
		btn.attr("disabled","disabled").addClass("btndis");
		nowvercount=60;
		//nowvercount=6;
	}
	else{
		nowvercount--;
	}
	
	btn.val(nowvercount+"秒后可重新发送");
	setTimeout(_vercodetime(btn),1000);
	
}

function _vercodetime(btn){
	return function(){
		vercodetime(btn);
	}	
}

