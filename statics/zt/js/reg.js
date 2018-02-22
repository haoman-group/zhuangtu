var ajaxdomain="/";

$(function(){
	

	$("#form_bank").validate({
		errorElement : "i",
		onkeyup : false,
		submitHandler : function(form){
			form.submit()
		},
		rules : {
			truename : {
				required : true,
				minlength : 2,
				maxlength : 12
				
			},
			idcard : {
				required : true,
				minlength : 6,
				maxlength : 30,
				chkidcardnew : true
			},
			bank_card_number : {
				required : true,	
				chkbankcard : true
			}
		},
		messages : {
			truename : {
				required : "请填写姓名",
				minlength : "至少2位",
				maxlength : "最多12位"
			},
			idcard : {
				required : "请输入身份证号",
				minlength : "至少6位",
				maxlength : "最多30位",
				chkidcardnew : "请输入正确的身份证号码"
			},
			bank_card_number : {
				required : "请输入银行卡号",	
				chkbankcard : "请输入银行卡号"
			}
		},
		success :function(label){
			
			$(label).siblings(".inptverify").removeClass("inptverify");
			$form=$(label).closest("form");			
			if($form.find(".inptverify").length===0){
				$(".btn_sellerreg_bank").css({"cursor":"pointer","background-color":"#C8000B"});
			}
		}
	})
	
	
	$("#addrform").validate({
		errorElement : "i",
		onkeyup : false,
		submitHandler : function(form){

			$btnlogin=$(form).find("[type='submit']");
			$btnlogin.val("正在提交").attr("disabled");
			if($(form).find("select").length!=3){alert('请选择完整省市区!');$btnlogin.val("保存").removeAttr("disabled"); return false;}
			var id=$(form).find("[name='id']").val();
			var a= id=="0"?"add":"edit";
			var name=$(form).find("[name='name']").val().replace(/\s+/g,"");
			var phone=$(form).find("[name='phone']").val().replace(/\s+/g,"");
			var address=$(form).find("[name='address']").val();
			var postcode=$(form).find("[name='postcode']").val();
			var province=$(form).find("select").eq(0).find("option:selected").text();
			var city=$(form).find("select").eq(1).find("option:selected").text();
			var country=$(form).find("select").eq(2).find("option:selected").text();
			
			$.ajax({
				type : "GET",
				url : ajaxdomain + 'index.php/Member/Public/address_'+a+'?'+$(form).serialize(),
				dataType:"json",
				async : false,
				timeout : 5000,
				success : function(result) {
					if(result.status=="1"){
						id==0 && (id=result.msg);
						parent.readdrlist(id,a,name,phone,address,postcode,province,city,country);
						parent.layer.msg('提交成功！', {shade: 0.1,time:1000});
						$btnlogin.val("保存").removeAttr("disabled");
						$(".close").trigger("click");
						
					}
					else{
						parent.layer.msg(result.info, {shade: 0.1,time:1000});
						$btnlogin.val("保存").removeAttr("disabled");
					}
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest.status + "|"
							+ XMLHttpRequest.readyState + "|" + textStatus);
					parent.layer.msg('提交失败！', {shade: 0.1,time:1000});
					$btnlogin.val("保存").attr("disabled");
				}
			});	
		},
		rules : {
			name:{
				required : true
			},
			phone:{
				required : true,
				chkmobile : true
			},
			address:{
				required : true
			}
		},
		messages : {
			name:{
				required : "请填写收件人"
			},
			phone:{
				required : "请填写收件人手机号",
				chkmobile : "手机号不正确"
			},
			address:{
				required : "请填写收货地址"
			}
		}
	})
	

	//======注册==============
	$('#regForm').validate({
		errorElement : "i",
		onkeyup : false,
		submitHandler : function(form){form.submit()},
		//errorPlacement: function(error, element) {  
			//element.parent().after(error);  
			//error.appendTo(element.parent());
		//},
		//wrapper: "dd",
		//validClass: "right",
		success:"right",
		rules : {
			mobile : {
				required : true,
				chkmobile : true
				//chkmobileed : true
			},
			valicode : {
				required : true,
				chkcodepre : true,
				chkvalicode : true
			},
			inviteid : {
				required : true,
				chkinvpre : true
				,chkinviteid : true
			},
			shopname : {
				required : true
			},
			contactor : {
				required : true
			},
			phone : {
				required : true,
				chkphone : true
			},
			address : {
				required : true
			},
			password : {
				required : true,
				minlength : 6,
				maxlength : 30
			},
			password2 : {
				required : true,
				equalTo : "#password"
			}
		},
		messages : {
			mobile : {
				required : "请填写手机号码",
				chkmobile : "手机号码格式不正确"
				//chkmobileed : "手机号码已注册过"
			},
			valicode : {
				required : "请输入收到的手机验证码",
				chkcodepre : "验证码不正确",
				chkvalicode : "验证码不正确"
			},
			inviteid : {
				required : "请输入邀请ID",
				chkinvpre : "邀请ID不正确"
				,chkinviteid : "邀请ID不存在"
			},
			shopname : {
				required : "请输入店铺名称"
			},
			contactor : {
				required : "请输入店铺联系人"
			},
			phone : {
				required : "请输入店铺联系人手机",
				chkphone : "手机号码不正确"
			},
			address : {
				required : "请输入详细地址"
			},
			password : {
				required : "请输入密码",
				minlength : "至少6位",
				maxlength : "最多30位"
			},
			password2 : {
				required : "请确认密码",
				equalTo : "两次密码不一致"
			}
		}
	
	});
	
	jQuery.validator.addMethod("chkmobile", function(value, element) {
		return /^1[3|4|5|8|7|9][0-9]\d{8}$/.test(value);	
	});
	
	jQuery.validator.addMethod("chkmobileed", function(value, element) {
		var flag = false;
		$.ajax({
			type : "GET",
			url : ajaxdomain + 'index.php/Member/Public/checkMobile?mobile=' + value,
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
	
	jQuery.validator.addMethod("chkphone", function(value, element) {
		return /^1[3|4|5|8|7|9][0-9]\d{8}$/.test(value);	
	})


	jQuery.validator.addMethod("chkidcardnew",function(idcard, element){
		console.log(idcard);
		var vcity={ 11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",
			21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",
			33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",
			42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",
			51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",
			63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"
		};

		//检查号码是否符合规范，包括长度，类型
		var isCardNo = function(idcard)
		{
			//身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X
			var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/;
			if(reg.test(idcard) === false)
			{
				return false;
			}

			return true;
		};
		//取身份证前两位,校验省份
		var checkProvince = function(idcard)
		{
			var province = idcard.substr(0,2);
			if(vcity[province] == undefined)
			{
				return false;
			}
			return true;
		};

		//检查生日是否正确
		var checkBirthday = function(idcard)
		{
			var len = idcard.length;
			//身份证15位时，次序为省（3位）市（3位）年（2位）月（2位）日（2位）校验位（3位），皆为数字
			if(len == '15')
			{
				var re_fifteen = /^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/;
				var arr_data = idcard.match(re_fifteen);
				var year = arr_data[2];
				var month = arr_data[3];
				var day = arr_data[4];
				var birthday = new Date('19'+year+'/'+month+'/'+day);
				return verifyBirthday('19'+year,month,day,birthday);
			}
			//身份证18位时，次序为省（3位）市（3位）年（4位）月（2位）日（2位）校验位（4位），校验位末尾可能为X
			if(len == '18')
			{
				var re_eighteen = /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/;
				var arr_data = idcard.match(re_eighteen);
				var year = arr_data[2];
				var month = arr_data[3];
				var day = arr_data[4];
				var birthday = new Date(year+'/'+month+'/'+day);
				return verifyBirthday(year,month,day,birthday);
			}
			return false;
		};

		//校验日期
		var verifyBirthday = function(year,month,day,birthday)
		{
			var now = new Date();
			var now_year = now.getFullYear();
			//年月日是否合理
			if(birthday.getFullYear() == year && (birthday.getMonth() + 1) == month && birthday.getDate() == day)
			{
				//判断年份的范围（3岁到100岁之间)
				var time = now_year - year;
				if(time >= 3 && time <= 100)
				{
					return true;
				}
				return false;
			}
			return false;
		};

		//校验位的检测
		var checkParity = function(idcard)
		{
			//15位转18位
			idcard = changeFivteenToEighteen(idcard);
			var len = idcard.length;
			if(len == '18')
			{
				var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
				var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
				var cardTemp = 0, i, valnum;
				for(i = 0; i < 17; i ++)
				{
					cardTemp += idcard.substr(i, 1) * arrInt[i];
				}
				valnum = arrCh[cardTemp % 11];
				if (valnum == idcard.substr(17, 1))
				{
					return true;
				}
				return false;
			}
			return false;
		};

		//15位转18位身份证号
		var changeFivteenToEighteen = function(idcard)
		{
			if(idcard.length == '15')
			{
				var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
				var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
				var cardTemp = 0, i;
				idcard = idcard.substr(0, 6) + '19' + idcard.substr(6, idcard.length - 6);
				for(i = 0; i < 17; i ++)
				{
					cardTemp += idcard.substr(i, 1) * arrInt[i];
				}
				idcard += arrCh[cardTemp % 11];
				return idcard;
			}
			return idcard;
		};


		//是否为空
		if(idcard === '')
		{
			console.log('请输入身份证号，身份证号不能为空');
			return false;
		}
		idcard = idcard.toUpperCase();
		//校验长度，类型
		if(isCardNo(idcard) === false)
		{
			console.log('您输入的身份证号码不正确，请重新输入');
			return false;
		}
		//检查省份
		if(checkProvince(idcard) === false)
		{
			console.log('您输入的身份证号码不正确,请重新输入');
			return false;
		}
		//校验生日
		if(checkBirthday(idcard) === false)
		{
			console.log('您输入的身份证号码生日不正确,请重新输入');
			return false;
		}
		//检验位的检测
		if(checkParity(idcard) === false)
		{
			console.log('您的身份证校验位不正确,请重新输入');
			return false;
		}
		return true;




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
	
	jQuery.validator.addMethod("chkvalicode", function(value, element) {
		var flag = false;
			$.ajax({
				type : "GET",
				url : ajaxdomain + 'index.php/Member/Public/checkMobile?mobile=' + value,
				async : false,
				timeout : 5000,
				success : function(result) {
					flag = result == "true";
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest.status + "|"
							+ XMLHttpRequest.readyState + "|" + textStatus);
				}
			});
		flag=true;
		return flag;
	}, "");
	
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
