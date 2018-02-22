$(document).ready(function() {

	/*点击切换的滑动门   chtitli为切换按钮  chtitul为切换按钮的容器
	 chconli为切换内容    chconul为切换内容的容器
	 data-tag属性标记对应关系*/
	$(".chtitli").click(function () {
		var $chtitul = $(this).closest(".chtitul");
		var tag = $chtitul.attr("data-tag");
		var $chconul = $(".chconul[data-tag='" + tag + "']").eq(0);

		var index = $chtitul.find(".chtitli").index(this);
		$(this).addClass("on").siblings(".chtitli.on").removeClass("on");
		$chconul.find(".chconli").eq(index).show().siblings(".chconli").hide();
	});


	$(document).on("click",".optopcart .del",function(){
		var dataid = $(this).closest("li").attr("data-id");
		var $lidel = $(this).closest("li");
		console.log(dataid);
		$.ajax({
			type:"POST",
			url:"/Buyer/Cart/api",
			dataType:"json",
			data:{"act":"del","id":dataid},
			timeout:5000,
			success:function(data,status){
				$lidel.remove();
				layer.msg("删除成功!");

			}
		});
	});

	$(".top .topshipping .topcarta").mouseover(function(){
		if($(".topcartul").hasClass("topcartnotload") ){
			$.ajax({
				type: "POST",
				url: "/api/cart/lists",
				dataType: "json",
				data: {},
				timeout: 5000,
				success: function (data, status) {
					if (data.status === 1) {
						var data = data["data"];
						var $topcartli = $(".topcartul li").eq(0).clone();
						$(".spcartframe").find(".topcartul").html("");
						var len= 0;
						var needlen =4;

						$.each(data,function(i,v){
							var objprods= v["products"];
							$.each(objprods,function(ii,vv){
								len++;
								if(len<needlen+1){
									$topcartli.find("img").attr("src",vv["headpic"]);
									$topcartli.find(".titlep").html(vv['title']);
									$topcartli.find(".gray").html(vv["price"]['hidden_value']);
									$topcartli.find(".jiage").html(vv["price"]['price_act']);
									$topcartli.find("a").attr("href","/Shop/Product/show/id/"+vv["id"]);
									$topcartli.attr("data-id",vv["catid"]);
									$(".topcartul").append($topcartli.prop("outerHTML"));
								}
							})

						});

						if(len<needlen+1){
							$(".leftnump").hide();
						}
						else{
							$(".leftnump").show();
							$(".topcartfoot .leftnum").html(len-needlen);
						}
						$(".topcartul").removeClass("topcartnotload");

					}
					else {
						console.log("失败" + data.msg);
					}
				}
				, error: function (XHR, textStatus, errorThrown) {
					console.log(textStatus + "\n" + errorThrown);
				}
			});
		}

	})

	//----------------------------------
	$(".needlogin").click(function(e){
		if($.cookie ){
			if (!!$.cookie("gs1_spf_userid")){
				return true;
			}
			else{
				if(typeof(layer)!="undefined"){
					layer.open({
						type:2,
						title: false,
						closeBtn: 1,
						scrollbar: false,
						area: ['360px','380px'],
						shadeClose: true,
						content: ["/Member/Buyer/loginpop","no"],
						end: function(){
							if(!!$.cookie("gs1_spf_userid")){
								e.target.click();
							}
						}
					});
					e.stopImmediatePropagation();
					return false;
				}
				else{
					window.location = "/member/buyer/login";
					return false;
				}
			}
		}
		else{
			return true;
		}
	});


	$(".singleim").click(function(){
		var imurl= $(this).attr("data-imurl");
		imurl = imurl || "/Member/chat/index/shopid/442";
		if(  typeof(layer)!="undefined" ){
			layer.open({
				type:2,
				title: false,
				closeBtn: 0,
				scrollbar: false,
				//title:"装途网在线客服系统",
				area: ['902px','607px'],
				shadeClose: false,
				content: [imurl ,'no']
			});
		}
		else{

		}
		return false;
	})



	/*动态添加图片
	 data-jsaddimg标记图片格式 data-jsaddimgname图片名
	 jsaddimgbox图片父级 jsaddimgli图片
	 */

	$(".jsaddimgbox").each(function () {
		var jsaddimg = "." + $(this).attr("data-jsaddimg");
		var jsaddimgname = $(this).attr("data-jsaddimgname");
		var $jsaddimgli = $(this).find(".jsaddimgli");
		$jsaddimgli.each(function (i, v) {
			var $self = $(this);
			var name = jsaddimgname + (i + 1) + jsaddimg;
			$self.attr("src", name);
		});
	});


	/*轮播   turnbg背景
	 turntabli为切换按钮  turntabtul为切换按钮的容器
	 turnimgli为切换内容    turnimgul为切换内容的容器
	 data-tag属性标记对应关系*/
	$(".turntabli").mouseenter(function () {
		var $turntabul = $(this).closest(".turntabul");
		var tag = $turntabul.attr("data-tag");
		var $turnimgul = $("[data-tag='" + tag + "'].turnimgul");


		//console.log($turnimgul);
		var $bg = $(this).closest(".turnbg");
		var color = "#" + $(this).attr("data-color");

		$bg.css("background-color", color);
		var index = $turntabul.find(".turntabli").index(this);
		$(this).addClass("on").siblings(".turntabli").removeClass("on");
		$turnimgul.find(".turnimgli").eq(index).show().siblings(".turnimgli").hide();

	});
	$(".turnbg").mouseenter(function () {
		imgturn();
	});

	$(".turnbg").mouseleave(function () {
		$self = $(this);
		num = "";
		$tab = $self.find(".turntabli");
		$tab.each(function (i, v) {
			$selfli = $(this);
			if ($selfli.hasClass("on")) {
				num = i;
			}
		});

		imgturntime(num);

	});
	$(".turnbg").attr("data-num", $(".turnbg").find(".turntabli").length);
	imgturntime = function imgturntime(n) {

		$bg = $(".turnbg");
		num = $bg.attr("data-num");
		n = n % num;
		$turntab = $bg.find(".turntabli");
		$turnimg = $bg.find(".turnimgli");
		for (i = 0; i < num; i++) {
			if (n == i) {
				$turntabli = $turntab.eq(n);
				$turnimgli = $turnimg.eq(n);
				color = "#" + $turntabli.attr("data-color");
				$bg.css("background-color", color);
				$turntabli.addClass("on").siblings(".turntabli").removeClass("on");
				$turnimgli.show().siblings(".turnimgli").hide();
			}
		}
		n++;
		tabimgturn = setTimeout("imgturntime(" + n + ")", 4000);
	};
	imgturntime(0);

	imgturn = function imgturn() {
		clearTimeout(tabimgturn);
		return;
	};




	//chkbox框
	$(".bindchk").click(function (e, t) {
		var $chkinp = $("[data-chkname='" + $(this).data("forchkname") + "']");
		$(this).toggleClass("on") && $(this).hasClass("on") ? $chkinp.prop("checked", true) : $chkinp.removeAttr("checked");
		$(this).hasClass("on") ? $("[data-showname='" + $(this).data("bindshow") + "']").show() : $("[data-showname='" + $(this).data("bindshow") + "']").hide();


		if (!t && $(this).hasClass("chklist")) {
			if ($(this).hasClass("chkall")) {
				$(this).hasClass("on") ? $("[data-chklistname='" + $(this).data("chklistname") + "']:not('.on')").trigger("click", true) : $("[data-chklistname='" + $(this).data("chklistname") + "'].on").trigger("click", true);
			}
			else {
				$(this).hasClass("on") || $("[data-chklistname='" + $(this).data("chklistname") + "'].on.chkall").trigger("click", true);
			}
		}
	});

	$(".refreshchk").each(function (index, element) {
		$element = $(element);
		$element.data("default-v") ? $element.prop("checked", true) : $element.removeAttr("checked");
	});

	$(".bindinput").click(function () {
		$("[data-inpname='" + $(this).data("toinpname") + "']").val($(this).data("v"));
	});
	$(".refreshclear").val(function () {
		return $(this).data("default-v")
	});
	$(".radiogroup").click(function () {
		$(this).hasClass("on") || ($(this).addClass("on nowact") && $("[data-group='" + $(this).data("group") + "']:not('.nowact')").removeClass("on") && $(this).removeClass("nowact"))
	});
	$(".forradio").click(function () {
		$("[data-radioname='" + $(this).data("forradio") + "']").trigger("click");
	});



	/*弹框和遮罩层*/
	$(".btnshowfix").click(function () {
		$(".fix").show();
		var tar = $(this).attr("data-tarfix");
		$("#" + tar).show();
	});
	$(".position .close").click(function () {
		$(".fix").hide();
		$(".position").hide();
	});

	//below edit by f
	$(".btnshowfixlock").click(function () {
		$.ajax({
			type: "GET",
			url: "/api/user/verifybank?money=",
			dataType: "json",
			timeout: 5000,
			success: function (data, status) {
				if (data != null) {
					var ostatus = data["status"];
					var msg = data["msg"];
					if (ostatus == 5) {
						alert(msg);
					}
					else {
						//弹出弹出框
						$(".fix").show();
						$(".position").show();
					}
				}
			}
			, error: function (XHR, textStatus, errorThrown) {
				console.log(textStatus + "\n" + errorThrown);
			}

		})

	});
	//above edit by f


	/*银行卡验证填写金额框*/
	$("#fix_fillbankmoney .btn").click(function () {
		$btn = $(this);
		if ($(this).hasClass("dis")) {
			return false;
		}
		else {
			var money = $(this).siblings("input").val().replace(/(^\s+)|(\s+$)/g, "");
			if (money.length === 0 || isNaN(money)) {
				alert("请填写正确金额");
			}
			else {
				money = parseFloat(money);
				$btn.attr("disabled", "disabled").addClass("dis");
				$.ajax({
					type: "GET",
					url: "/api/user/verifybank?money=" + money,
					dataType: "json",
					timeout: 5000,
					success: function (data, status) {
						if (data != null) {
							var ostatus = data["status"];
							var msg = data["msg"];
							if (ostatus == 1) {
								//alert('验证成功');
								window.location.href = "/Member/Seller/shop_bank_step3";
							}
							else if (ostatus == 5) {
								//锁定操作
								alert('已经被锁定');
							}
							else {
								//alert(msg);
								$btn.siblings(".error").show().siblings("p").hide();
								$btn.removeAttr("disabled").removeClass("dis");
							}

						}
					}
					, error: function (XHR, textStatus, errorThrown) {
						console.log(textStatus + "\n" + errorThrown);
						$btn.removeAttr("disabled").removeClass("dis");
					}

				})
			}
		}
	});
	$("#fix_fillbankmoney [type='text']").change(function () {
		if ($(this).siblings(".error").is(":visible")) {
			$(this).siblings(".blank").show().siblings("p").hide();
		}
	});




	$("body").click(function(){
		var $fixs = $(".fixedslider");
		if(!$fixs.hasClass("fixsfold")){
			$fixs.addClass("fixsfold");
		}
	})
	$(".fixedslider").click(function(e){
		e.stopPropagation();
	})

	$(".navs a:not('.totop')").click(function(e){
		$(this).find("cite").animate({right:"70px",opacity:0},300,function(){$(this).hide()});
	});

	$(".navs .emim").click(function(e){
		var $fixs = $(".fixedslider");
		$fixs.toggleClass("fixsfold");
		if(!$fixs.hasClass("fixsfold")){
			slideserviceimmsg();
		}
		e.preventDefault();
	});

	//显示提示的文字
	$(".fixedslider .navs a").hover(function(){
		$(this).find("cite").show().animate({right:"35px",opacity:1},300,function(){});
	},function(){
		$(this).find("cite").animate({right:"70px",opacity:0},300,function(){$(this).hide()});
	})




	//
	function slideserviceimmsg(){
		slide_loading_start();

		if(!!$.cookie("gs1_spf_userid")){
			$.ajax({
				type: "POST",
				url: "/api/rongcloud/latestrecord" ,
				dataType: "json",
				timeout: 5000,
				success: function (result, status) {
					console.log(result);
					if(result!=null && result.status ===1 ){
						var $ul = $(".zb_bot");
						var $li = $ul.find("li").eq(0).clone();
						$(".zb_bot li").remove();
						var data = result["data"];
						var $domtemp = $("<div></div>");

						$.each(data, function(i,v){
							if(v["shopid"] !== "442"){
								$li.attr("data-imurl","/member/chat/index/shopid/"+v["shopid"]).find("img").attr("src",v["shop"]["headpic"]?v["shop"]["headpic"]:"/statics/zt/images/hema_blueround_92_92.png").siblings(".name").html(v["shop"]["name"]).siblings(".date").html(v["updatetime"]);
								$domtemp.append($li.prop("outerHTML"));
							}
						});

						$ul.html($domtemp.html());


					}
					slide_loading_end();
				}
				, error: function (XHR, textStatus, errorThrown) {
					console.log(textStatus + "\n" + errorThrown);
					slide_loading_end();
				}

			});
		}
		else{
			var $li = $(".zb_bot li").eq(0).clone();
			$li.attr("data-imurl","/member/chat/index/").find("img").attr("src","/statics/zt/images/hema_blueround_92_92.png").siblings(".name").html("装途网客服").siblings(".date").html(new Date().Format("MM-dd"));
			$(".zb_bot").find("li").remove().end().append($li);
			slide_loading_end();
		}

	}

	function slide_loading_start(){
		$(".fixszhe").show();
	}

	function slide_loading_end(){
		$(".fixszhe").hide();
	}

	$(".zb_bot").on("click","li",function(){
		var imurl= $(this).attr("data-imurl");
		if(  typeof(layer)!="undefined" ){
			layer.open({
				type:2,
				title: false,
				closeBtn: 0,
				scrollbar: false,
				//title:"装途网在线客服系统",
				area: ['902px','607px'],
				shadeClose: false,
				content: [imurl ,'no'],
				end : function(){
					$(".emim").trigger("click");
				}
			});
		}
		else{

		}
		return false;

	})

	//侧边栏客服按钮点击事件
	//$(".navs .emim").click(function(){
	//	layer.open({
	//		type:2,
	//		title: false,
	//		closeBtn: 0,
	//		scrollbar: false,
	//		//title:"装途网在线客服系统",
	//		area: ['902px','607px'],
	//		shadeClose: false,
	//		content: ["/Member/chat/index" ,'no']
	//	});
	//});



	/*固定图标*/
	$(document).scroll(function(){
		if($(document).scrollTop()<300)
		{

			$(".navmsg_con2").css({"opacity":"0","transform":"scale(1.2)"});
		}
		else
		{$(".navmsg_con").css("display","block");
			$(".navmsg_con2").css({"opacity":"1","transform":"scale(1.0)"});
		}
	});

	$(".search .searform").submit(function() {
		if($(".search .searform input[name='searchkey']").val() == '') {
			alert('请输入您要查询的关键字');
			return false;
		}
		return true;
	});

	$(".hidden_searchbox .searform").submit(function() {
		if($(".hidden_searchbox .searform input[name='searchkey']").val() == '') {
			alert('请输入您要查询的关键字');
			return false;
		}
		return true;
	});


	if($.fn.scrollLoading){
		$(".scrollimgbox img").scrollLoading();
		$(".scrollimg").scrollLoading();
	}


	$(".hidden").mouseenter(function(){
		$(this).find(".show").show();

	})
	$(".hidden").mouseleave(function(){
		$(this).find(".show").hide();
	})
});



function freshpubcart(){
	$.ajax({
		type:"POST",
		url: "/Buyer/Cart/api",
		dataType:"json",
		data: {"act":"getnum"},
		timeout:5000,
		success: function(result){
			if(result.status==1){
				$(".topcartnum").html(result.data);
			}
			else{
				alert("失败"+result.msg);
			}
		}
		,error:function(xXHR, xtextStatus, xerrorThrown){
			console.log(xtextStatus+"\n"+xerrorThrown);
		}
	});
}


