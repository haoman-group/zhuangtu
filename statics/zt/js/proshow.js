
//    if(!price_json){price_json={}}
$(function(){

	$(".listimg img").hover(function(){
		$(".mainimg").attr("src",$(this).attr("src"));
	});

	$(".gpss").mouseenter(function(){
		$(".gpss_in").css("display","block");
	});
	$(".gpss").mouseleave(function(){
		$(".gpss_in").css("display","none");
	});


	$(".btnopenserviceim").click(function(){

		var imurl = $(this).attr("data-imurl");
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

	});


	$(".btnproshowtocart").click(function(event){
		showprotocart();


	});

	$(".btnproshowbuynow").click(function(){
		showprotocarts(locationtolists);
	})


});


function locationtolists(){
	window.location="/buyer/cart/lists";
}


//商品详情页添加到购物车
function showprotocart(fnback){

	if(typeof(voidrepeat)=== "undefined" || voidrepeat=== 0 ){
		voidrepeat =1;
		var nownum= $(".buynum").val().replace(/\s+/g,"");
		if(nownum.length==0||isNaN(nownum)){alert("数量错误");voidrepeat=0;return false;}

		var $proparas=$(".dlprot");
		var proid=$proparas.attr("data-id");
		var proname=$(".proshowparas h5").html();
		var price=$proparas.attr("data-price");
		if(price === "暂无"){alert("购买失败");voidrepeat=0;return false;}
		var proindex= $proparas.attr("data-index");
		if(!proindex){
			$(".dlprot").addClass("dlproton");
			voidrepeat=0;
			return false;
		}
		var protxtindex = $proparas.attr("data-txtindex");
		var providindex = $proparas.attr("data-vidindex");
		var pic=$(".detail .mainimg").attr("src");
		var nowpro=[{"id":proid,"name":proname,"price":price,"num":nownum,"img":pic,"proindex":proindex,"protxtindex":protxtindex,"providindex":providindex}];

		addcart(nowpro,fnback);
	}

	  // 元素以及其他一些变量
	  var eleFlyElement = document.querySelector("#flyItem");
	  var eleShopCart = document.querySelector("#shopCart");
	  // 抛物线运动
	  var myParabola = funParabola(eleFlyElement, eleShopCart, {
		  speed: 400, //抛物线速度
		  curvature: 0.0008, //控制抛物线弧度
		  complete: function() {
			  eleFlyElement.style.visibility = "hidden";
		  }
	  });
	  // 绑定点击事件
	  if (eleFlyElement && eleShopCart) {

		  // [].slice.call($(".btnCart")).forEach(function(button) {
		  //     button.addEventListener("click", function(event) {
				  var src = $(".btnCart").parents(".detail").find(".mainimg").attr("src");
				  $("#flyItem").find("img").attr("src", src);
				  // 滚动大小
				  var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft || 0,
						  scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;
				  eleFlyElement.style.left = event.clientX + scrollLeft + "px";
				  eleFlyElement.style.top = event.clientY + scrollTop + "px";
				  eleFlyElement.style.visibility = "visible";

				  // 需要重定位
				  myParabola.position().move();
		  //     });
		  // });
	  }


}

function showprotocarts(fnback){

       if(typeof(voidrepeat)=== "undefined" || voidrepeat=== 0 ){
               voidrepeat =1;
               var nownum= $(".buynum").val().replace(/\s+/g,"");
               if(nownum.length==0||isNaN(nownum)){alert("数量错误");voidrepeat=0;return false;}

               var $proparas=$(".dlprot");
               var proid=$proparas.attr("data-id");

               var proname=$(".proshowparas h5").html();
               var price=$proparas.attr("data-price");
               if(price === "暂无"){alert("购买失败");voidrepeat=0;return false;}
               var proindex= $proparas.attr("data-index");
               if(!proindex){
                       $(".dlprot").addClass("dlproton");
                       voidrepeat=0;
                       return false;
               }
               var protxtindex = $proparas.attr("data-txtindex");
               var providindex = $proparas.attr("data-vidindex");
               var pic=$(".detail .mainimg").attr("src");
               var nowpro=[{"id":proid,"name":proname,"price":price,"num":nownum,"img":pic,"proindex":proindex,"protxtindex":protxtindex,"providindex":providindex}];

               addcart(nowpro,fnback);
       }

}


function addcart(objpro,fnback){

	$.ajax({
		type:"POST",
		url: "/Buyer/Cart/api",
		dataType:"json",
		data: {"act":"add","objpro":objpro},
		timeout:5000,
		success: function(data,status){
			if(data.status==1){
				$.each(objpro,function(i,v){
					if(!!$.cookie("cartproid")){
						$.cookie("cartproid", $.cookie("cartproid")+","+v.id,{expires: 2 ,path:"/"});
					}
					else{
						$.cookie("cartproid",v.id,{expires: 2 ,path:"/"});
					}
				})

				if(fnback){

					fnback();
				}
				else{
					layer.open({
						type: 1,
						title: false,
						time:1000,
						closeBtn: 0,
						// area:['280px','100px'],
						shadeClose: true,
						content: '<div class="shop_tips"><h5>商品已成功加入购物车！</h5><p>颜色：<span></span>数量：<i></i></p></div>',
						success:function(){
							setTimeout(function(){
								$(".emcart_tips").fadeIn();
							},1500);

						}
						})

					$(".shop_tips").find("span").html($(".dlprot").find("a[class='on']").attr("data-txt")).end().find("i").html($(".num").find(".buynum").val());

					freshpubcart();
				}
			}
			else{
				console.log(data.msg);
				alert("失败"+data.msg);
			}
			voidrepeat=0;
		}
		,error:function(XHR, textStatus, errorThrown){
			voidrepeat=0;
			console.log(textStatus+"\n"+errorThrown);
		}
	});


    $.ajax({
		type:"POST",
		url: "/Api/Product/getSameProducts",
		dataType:"json",
		data: {"id":$(".dlprot").attr("data-id"),"count":16},
		timeout:5000,
		success: function(data,status){
		if(data.status==1){

		var data = data.data;
		console.log(data);
		$.each(data,function(i,v){
		//console.log(data[i].url);
		$("<li><a href='"+data[i].url+"'><img src='"+data[i].headpic+"' /></a></li>").appendTo($(".emcart_tips .centerbox .shopbox"));
		})


	// 加入购物车弹出显示
	var shopli = $(".emcart_tips .centerbox .shopbox").find("li:eq(0)").outerWidth(true)*$(".emcart_tips .centerbox .shopbox").find("li").length;
	$(".emcart_tips .centerbox .shopbox").css({'width':shopli});
		function moveleft(){
			$(".emcart_tips .centerbox .shopbox").animate({left:-$(".emcart_tips .centerbox .shopbox").find("li:eq(0)").outerWidth(true)},function(){
				var first = $(".emcart_tips .centerbox .shopbox").find("li:first");
				$(".emcart_tips .centerbox .shopbox").append(first).css({left:0});
			})
	}

		function moveright(){
			var first = $(".emcart_tips .centerbox .shopbox").find("li:first");
			var last = $(".emcart_tips .centerbox .shopbox").find("li:last");
			$(".emcart_tips .centerbox .shopbox").prepend(last).css({left:-$(".emcart_tips .centerbox .shopbox").find("li:eq(0)").outerWidth(true)}).animate({left:0});

		}
			$(".emcart_tips .btnleft").click(function(){
				if($(".emcart_tips .centerbox .shopbox").is(":animated")){return false}
				moveleft();
			})
			$(".emcart_tips .btnright").click(function(){
				if($(".emcart_tips .centerbox .shopbox").is(":animated")){return false}
				moveright();
			})

			$(".emcart_tips .close").click(function(){
				$(".emcart_tips").fadeOut();
			})
		}
		else{

		}

		}
		,error:function(XHR, textStatus, errorThrown){

		}
    });
}









function delcart(objpro){
	$.ajax({
		type:"POST",
		url: "/Buyer/Cart/api",
		dataType:"json",
		data: {"act":"del","id	":objpro, "opnum":opnum},
		timeout:5000,
		success: function(data,status){
			if(data.status==1){

			}
			else{
				//console.log("失败"+data.msg);
			}
			voidrepeat=0;
		}
		,error:function(XHR, textStatus, errorThrown){
			voidrepeat=0;
			console.log(textStatus+"\n"+errorThrown);
		}
	});
}

//处理后台的价格json串，并显示
$(function($) {

	var pArray = {} ;
	for(var item in pArray){
		$("#colors").show();
		var is = $("#colors div").find("strong:contains('"+pArray[item]['color']+"')");
		console.log(is.length);
		console.log(pArray[item]['color']);
		if(is.length == 0){
			$("#colors div").append("<strong>"+pArray[item]['color']+"</strong>");
		}
		colors.push(is);
		if( pArray[item]['size'] !== ""){
			$("#size").show();
			for(var key in pArray[item]['size']){
				$("#size b").html(key);
				$("#size div").html("<strong>"+pArray[item]['size'][key]+"</strong>");
			}
		}
	}


});

$(function(){

	price_json= (new Function("","return "+price_json))();
	jsonprice={};
	arprotyname=[];
	arproty=[];
	var $dl = $("<dl></dl>");
	aroutstock = [];

	$.each(price_json,function(i,v){

		var artempoutstock = [];
		var thisprice= {};
		thisprice[v.hidden_value] = {"price":v.price,"price_act":v.price_act,"quantity":v.quantity,"tsc":v.tsc,"barcode":v.barcode};
		var k=0;
		var strkey="";
		$.each(v,function(ii,vv){
			if(typeof(vv)==="object"  ){
				if(!arprotyname[k] ){
					arprotyname.push(ii);
					var objtemp={};
					objtemp[vv["vid"]]= vv;
					arproty.push(objtemp);
				}
				else{
					arproty[k][vv["vid"]]=vv;
				}
				strkey+= vv.txt.toString()+ vv.idx.toString();
				if(parseInt(v["quantity"]) === 0){
					artempoutstock.push(vv.vid);
				}
			}
			k++;
		});

		if(parseInt(v["quantity"]) === 0){
			aroutstock.push(artempoutstock);
		}

		jsonprice[strkey]= v;
	});


	$.each(arprotyname,function(i,v){
		$dl.append("<dt>"+arprotyname[i]+"</dt>");
		var $dd=$("<dd></dd>");
		$.each(arproty[i],function(ii,vv){
			var ishaspic = !!vv["pictures"] && !!vv["pictures"]["0"];
			$dd.append("<a href=\"javascript:void(0)\" data-idx=\""+vv["idx"]+"\" data-txt=\""+vv["txt"]+"\" data-vid=\""+vv["vid"]+"\"  class=\""+ ( ishaspic? "haspic":"" )+"\" >"+ (ishaspic ? "<img alt=\""+vv.txt+"\" src=\""+vv["pictures"]["0"]+"\">" :"") +"<span>"+vv.txt+"</span></a>")
		});
		$dl.append($dd);
		$dl.append("<s></s>");
	});


	$(".dlprot").html($dl.html());

	$(".dlprot").on("click","dd:eq(0) a",function(){
		if( !$(this).hasClass("on")  && $(this).hasClass("haspic")){
			$(".mainimg").attr("src", $(this).find("img").attr("src")).attr("data-zoomsrc",$(this).find("img").attr("src"));
		}
	});

	$(".dlprot").on("click","dd a",function(){

		var lendt = $(".dlprot dt").length;
		if($(this).hasClass("out")){return false;}

		var $dlprot = $(".dlprot");
		if(!$(this).hasClass("on")  ){
			$(this).addClass("on").siblings().removeClass("on");
			var isneedch = true;
			var indexstr= "";
			var indexvidstr="";
			var indextxtstr="";
			var needjudge = $(".dlprot dt").length -1 === $(".dlprot .on").length;
			//var $objneedjuge = "";
			//var tempindexstr = "";

			//if(!needjudge){
			//	$(".dlprot").find(".out").removeClass("out");
			//}

			$(".dlprot dd").each(function(i,v){

				//if(needjudge ){
				//	if(!$(v).find(".on").length){
				//		$objneedjuge = $(v);
				//		tempindexstr += "|=|";
				//	}
				//	else {
				//		tempindexstr += $(v).find(".on").attr("data-txt") + $(v).find(".on").attr("data-idx");
				//	}
				//}

				isneedch= isneedch && $(this).find(".on").length;
				if(isneedch){
					indexstr+= $(this).find(".on").attr("data-txt") + $(this).find(".on").attr("data-idx");
					indexvidstr+= $(this).find(".on").attr("data-vid")+"|";
					indextxtstr+= $(this).prev("dt").html()+"^"+$(this).find(".on").attr("data-txt")+"|";
				}
			})

			//if(needjudge){
			//	$objneedjuge.find("a").each(function(i,v){
			//		var tindex = tempindexstr.replace(/\|\=\|/i,$(v).attr("data-txt") + $(v).attr("data-idx"));
			//		var objt = jsonprice[tindex];
			//		var tstock = objt.quantity;
			//		if( isNaN(tstock) ||  parseInt(tstock)===0 ){
			//			$(v).addClass("out");
			//		}
			//	})
			//}

			if(isneedch){
				$(".dlprot").hasClass("dlproton") && $(".dlprot").removeClass("dlproton");
				var objpricenow= jsonprice[indexstr];
				$(".zt_price strong").html(  (!!objpricenow.price_act)? "￥"+Number(objpricenow.price_act).toFixed(2) : "暂无"  );
				$(".zt_oriprice s").html( (!!objpricenow.price)? "￥"+Number(objpricenow.price).toFixed(2) : "暂无"  );
				$(".spstock").html( (!!objpricenow.quantity)? objpricenow.quantity : "0"  );
				$(".dlprot").attr("data-price",(  (!!objpricenow.price_act)? objpricenow.price_act : "暂无"  ))
				$(".dlprot").attr("data-index",(!!objpricenow.hidden_value) ? objpricenow.hidden_value : indexstr).attr("data-vidindex",indexvidstr).attr("data-txtindex",indextxtstr);
			}
		}else{
			$(this).removeClass("on");
		}


		$(".dlprot .out").removeClass("out");
		if($(".dlprot .on").length > lendt-2 && aroutstock.length>0){
			var arteststock=[];
			$.each(aroutstock,function(i,v){
				arteststock[i]=[];
				$.each(v,function(ii,vv){
					if($(".on[data-vid='"+vv+"']").length === 0){
						arteststock[i].push(vv);
					}
				})
			})
			$.each(arteststock,function(i,v){
				if(v.length === 1){
					$("[data-vid='"+v+"']").addClass("out");
				}
			})
		}

	});

	function pickoutdecone(objs){

	}


	$(".btnopbuynum").click(function(){
		var $inpbuynum = $(this).siblings("input[type='text']");
		var buynum = $inpbuynum.val();
		if(isNaN(buynum)) return false;
		buynum = parseInt(buynum);
		$(this).hasClass("add") ? buynum++ : buynum--;
		if(buynum<1) buynum=1;
		$inpbuynum.val(buynum) ;
		return false;
	});
})



$(function(){
    //收藏宝贝
	$(".clickcollect").on("click",function(){
		var $that = $(this);
		if($(this).attr("data-delete") == '0'){
			layer.confirm("是否取消关注?",{
			        btn:['确认','取消']
			    },
			    function(){
			      layer.closeAll();
			      $that.attr("data-delete",'1');
			      getdata();
			    },
			    function(){

			    }
			);
		}else{
			$(this).attr("data-delete",'0');
			getdata();
		}
	});

	function getdata(){
		var id = $(".clickcollect").parents(".operate").attr("data-prodid");
		var is_delete = $(".clickcollect").attr('data-delete');
		var type = $(".clickcollect").attr("data-type");
		$.ajax({
			type: "POST",
			url: '/Shop/Product/collecton',
			dataType: "json",
			data: {"productid": id, "is_delete": is_delete, "type": type},
			success: function (data) {

				if (data.status == 1) {

					if(data['isdelete'] == '0'){

						$(".clickcollect").removeClass("collect").addClass("collected").html("已收藏");
					}else{

						$(".clickcollect").removeClass("collected").addClass("collect").html("收藏宝贝");
					}
				} else {

				}
			}

		}, "json");
	}

	// 收藏店铺
	$(".clickcollectshop").on("click",function(){
        var $that = $(this);
		if($(this).attr("data-shopdelete") == '0'){
			layer.confirm("是否取消关注?",{
			        btn:['确认','取消']
			    },
			    function(){
			      layer.closeAll();
			      $that.attr("data-shopdelete",'1');
			      getshopdata();
			    },
			    function(){

			    }
			);
		}else{
			$(this).attr("data-shopdelete",'0');
			getshopdata();
		}
	});

	function getshopdata(){
		var id = $(".clickcollectshop").parents(".storecollection").attr("data-shopid");
		var is_delete = $(".clickcollectshop").attr('data-shopdelete');
		var type = $(".clickcollectshop").attr("data-type");
		$.ajax({
			type: "POST",
			url: '/Shop/Product/collecton',
			dataType: "json",
			data: {"productid": id, "is_delete": is_delete, "type": type},
			success: function (data) {

				if (data.status == 1) {

					if(data['isdelete'] == '0'){

						$(".clickcollectshop").removeClass("collectshop").addClass("collectshopid").html("已收藏");
					}else{

						$(".clickcollectshop").removeClass("collectshopid").addClass("collectshop").html("收藏店铺");
					}
				} else {

				}
			}

		}, "json");
	}

})
