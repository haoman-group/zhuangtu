var BodyWidth=$(window).width();
var BodyHeight=$(window).height()-70;
var ScreenWidth=window.screen.width;
var ScreenHeight=window.screen.height;
var model;
var change4_input;
var navA;
var change3;
var change_delete;
var Fchange_delete;
var save;
var change4_inputval;
var change_up;
var change_down;
var Fchange_up;
var Fnav;
/*页面*/
var mainBg;
var see=0;
var tab;
var AD_absolute_32=0;
var layout;/*布局*/
var layout_model;
var timedCount=function timedCount(){
	   AD_absolute_32=AD_absolute_32%3;
	   $(".AD_absolute_32").find(".AD_absolute_321").css("background-color","#ffffff");
	   $(".AD_absolute_3").animate({left:AD_absolute_32*-1920+'px'});
	   $(".AD_absolute_32").find(".AD_absolute_321:eq("+AD_absolute_32+")").css("background-color","#000000");
	   AD_absolute_32=AD_absolute_32+1;
	tab=setTimeout("timedCount()",4000);
  }
var stopCount=function stopCount()
  {
  clearTimeout(tab);
  return;
  }
/*产品类*/
var Product;
$(document).ready(function(){
	$(".container01").width(BodyWidth-316);
	$(".container01").height(BodyHeight);
	$(".container02").height(BodyHeight);
	$(".container011").width(ScreenWidth);
	$(".kind:eq(0)").find("b").show();
	$(".kind:eq(0)").css("opacity","1");
	$(".model:eq(0)").show();
	/*改动*/
	$(".change1").mouseenter(function(){
		if(see==0){
		$(this).find(".change2").show();
		$(this).find(".change3").show();}
		})
	$(".change1").mouseleave(function(){
		$(this).find(".change2").hide();
		$(this).find(".change3").hide();
		})
	$(".change3").click(function(){
		change3=$(this).index(".change3");
		$(".change4:eq("+change3+")").show();
		navA=$(".nav a").toArray();
		$(".change4_input:gt(0)").remove();
		for(i=0; i<navA.length;i++){
			if(i>0)
			$(".save:eq("+change3+")").before($(".change4_input:eq(0)").clone());
			$(".change4").find("input:eq("+i+")").val(navA[i].innerHTML);
			}
			Fnav();
		})
	$(".kind").mouseenter(function(){
		$(".kind ").find("b").hide();
		$(".kind").css("opacity","0.7");
		$(this).find("b").show();
		$(this).css("opacity","1");
		})
	$(".kind").click(function(){
		model=$(this).index(".kind");
		$(".model").hide();
		$(".model:eq("+model+")").show();
		$(".sort").remove();
		})
	/*页头背景颜色*/
	$(".model2_Bg:eq(1)").bind("click",function(){
		$(".headBg").css("background-color",$(".model2_Bg:eq(0)").val());
		})
	/*页头背景图片*/
	$(".model2_Bg:eq(3)").bind("click",function(){
		var headBg=$(".model2_Bg:eq(2)").val();
		$(".headBg").css("background-image","url("+headBg+")");
		})
	/*页头logo图片*/
	$(".model2_Bg:eq(5)").bind("click",function(){
		$(".logo").attr("src",$(".model2_Bg:eq(4)").val());
		})
	/*页头联系方式图片*/
	$(".model2_Bg:eq(7)").bind("click",function(){
		$(".phone").attr("src",$(".model2_Bg:eq(6)").val());
		})	
	/*导航条背景颜色*/
	$(".model1_Bg:eq(1)").bind("click",function(){
		$(".navBg").css("background-color",$(".model1_Bg:eq(0)").val());
		})
	/*导航条字体颜色*/
	$(".model1_Bg:eq(3)").bind("click",function(){
		$(".navBg a").css("color",$(".model1_Bg:eq(2)").val());
		})
	/*导航模块删除*/
	function Fchange_delete(){
		$(".change4:eq("+change3+")").find(".change_delete").click(function(){
		change_delete=$(this).index(".change_delete");
		if(change_delete!=0){
			$(".change4_input:eq("+change_delete+")").remove();
			}
		})
		}
	/*导航模块保存*/
	$(".save").click(function(){
		save=$(this).index(".save");
		$(".change4:eq("+save+")").hide();
		change4_input=$(".change4:eq("+save+") .change4_input").toArray();
		$(".nav a:gt(0)").remove();
		for(i=0;i<change4_input.length;i++){
			if(i!=0)
			$(".nav ul").append($(".nav a:eq(0)").clone());	
			change4_inputval=$(".change4_input:eq("+i+")").find(".input_a").val();	
			var input_href=$(".change4_input:eq("+i+")").find(".input_href").val();	
			$(".nav").find("a:eq("+i+")").html(change4_inputval);
			$(".nav").find("a:eq("+i+")").attr("href",input_href);
			}
		})
	/*导航模块添加*/
	$(".added").click(function(){
		$(".save:eq("+change3+")").before($("<div class='change4_input'>"+"<input type='text' class='input_a' value='名称'/>"+"<input type='text' class='input_href' placeholder='链接地址'/>"+"</div>"));
		})
	/*导航模块功能*/
	function Fnav(){
			$(".change_delete").unbind("click");
			$(".change_up").unbind("click");
			$(".change_down").unbind("click");
			Fchange_delete();
			Fchange_up();
			Fchange_down();
		}
	/*导航模块向上*/
	function Fchange_up(){
		$(".change_up").click(function(){
		change_up=$(this).index(".change_up");
		if(change_up>0){
		$(".save:eq("+change3+")").before($(".change4_input:eq(0)").clone());
		$(".change4:eq("+change3+")").find("input:last").val($(".change4").find("input:eq("+(change_up-1)+")").val());
		$(".change4:eq("+change3+")").find("input:eq("+(change_up-1)+")").val($(".change4").find("input:eq("+change_up+")").val());
		$(".change4:eq("+change3+")").find("input:eq("+change_up+")").val($(".change4").find("input:last").val());
		$(".change4:eq("+change3+")").find(".change4_input:last").remove();
		}
		})
	    }
	/*导航模块向下*/
	function Fchange_down(){
		$(".change_down").click(function(){
		change_down=$(this).index(".change_down");
		var change_downlast=$(".change4 change4_input").toArray();
		$(".save:eq("+change3+")").before($(".change4_input:eq(0)").clone());
		$(".change4:eq("+change3+")").find("input:last").val($(".change4").find("input:eq("+(change_down+1)+")").val());
		$(".change4:eq("+change3+")").find("input:eq("+(change_down+1)+")").val($(".change4").find("input:eq("+change_down+")").val());
		$(".change4:eq("+change3+")").find("input:eq("+change_down+")").val($(".change4").find("input:last").val());
		$(".change4:eq("+change3+")").find(".change4_input:last").remove();
		})
	    }
	/*页头背景颜色*/
	$(".model3_Bg:eq(1)").bind("click",function(){
		$(".mainBg").css("background-color",$(".model3_Bg:eq(0)").val());
		})
	/*页头背景图片*/
	$(".model3_Bg:eq(3)").bind("click",function(){
		var mainBg=$(".model3_Bg:eq(2)").val();
		$(".mainBg").css("background-image","url("+mainBg+")");
		})
	/*页面*/
	/*大广告*/
	$(".model:eq(2) .model1_con211").click(function(){
		model1_con211=$(this).index(".model:eq(2) .model1_con211");
		switch (model1_con211)
		{
			case 0:
			$(".main_con1").find(".main_con:eq(0)").remove();
			$(".main_con1").append($(".model_hidden").find(".main_con:eq("+model1_con211+")").clone());
			stopCount();
			timedCount();
			main_hiddenB();
			break;
			case 1:
			$(".main_con1").find(".main_con:eq(0)").remove();
			$(".main_con1").append($(".model_hidden").find(".main_con:eq("+model1_con211+")").clone());
			stopCount();
			timedCount();
			main_hiddenB();
			break;
			case 2:
			$(".main_con1").find(".main_con:eq(0)").remove();
			$(".main_con1").append($(".model_hidden").find(".main_con:eq("+model1_con211+")").clone());
			stopCount();
			timedCount();
			main_hiddenB();
			break;
		    }
		})
	/*产品类*/
	$(".model:eq(6) .model1_con211").click(function(){
		model1_con211=$(this).index(".model:eq(6) .model1_con211");	
		var model1_con211Column=model1_con211%3;
		var model1_con211Row=(model1_con211-model1_con211Column)/3;
		Product(model1_con211Row,model1_con211Column);
		main_hiddenB();
		})
	function Product(b,a){
		a=a+3;b=b+1;
		if(b<7){
		$(".main_con2").append($(".model_hidden").find(".model_Product:eq(0)").clone());
		if(a==3){
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1005);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":325,"margin":5});
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img3");
			$(".main_con2 .model_Product:last").find(".Product_absolute1img").attr("src","Product_absolute1img1.jpg");
			for(i=1;i<a*b;i++){
				$(".main_con2 .model_Product:last").find(".model_Product11:last").after($(".main_con2 .model_Product:last").find(".model_Product11:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").after($(".main_con2 .model_Product:last").find(".main_hidden32:last").clone());
				}
			}
		else if(a==4){
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1000);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":240,"margin":5});
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img4");
			$(".main_con2 .model_Product:last").find(".Product_absolute1img").attr("src","Product_absolute1img2.jpg");
			for(i=1;i<a*b;i++){
				$(".main_con2 .model_Product:last").find(".model_Product11:last").after($(".main_con2 .model_Product:last").find(".model_Product11:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").after($(".main_con2 .model_Product:last").find(".main_hidden32:last").clone());
				}
			}
		else if(a==5){
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1150);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":220,"margin":5});
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img5");
			$(".main_con2 .model_Product:last").find(".Product_absolute1img").attr("src","Product_absolute1img3.jpg");
			for(i=1;i<a*b;i++){
				$(".main_con2 .model_Product:last").find(".model_Product11:last").after($(".main_con2 .model_Product:last").find(".model_Product11:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").after($(".main_con2 .model_Product:last").find(".main_hidden32:last").clone());
				}
			}
		    }
		else if(b==7){
		$(".main_con2").append($(".model_hidden").find(".model_Product:eq(1)").clone());
		if(a==3){
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1005);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":325,"margin":5});
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img03");
			$(".main_con2 .model_Product:last").find(".Product_absolute1img").attr("src","Product_absolute1img4.jpg");
			for(i=1;i<a;i++){
				$(".main_con2 .model_Product:last").find(".model_Product11:last").after($(".main_con2 .model_Product:last").find(".model_Product11:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").after($(".main_con2 .model_Product:last").find(".main_hidden32:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").before($(".main_con2 .model_Product:last").find(".main_hidden33:last").clone());
				}
			}
		else if(a==4){
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1000);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":240,"margin":5});
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img04");
			$(".main_con2 .model_Product:last").find(".Product_absolute1img").attr("src","Product_absolute1img5.jpg");
			for(i=1;i<a;i++){
				$(".main_con2 .model_Product:last").find(".model_Product11:last").after($(".main_con2 .model_Product:last").find(".model_Product11:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").after($(".main_con2 .model_Product:last").find(".main_hidden32:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").before($(".main_con2 .model_Product:last").find(".main_hidden33:last").clone());
				}
			}
		else if(a==5){
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1150);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":220,"margin":5});
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img05");
			$(".main_con2 .model_Product:last").find(".Product_absolute1img").attr("src","Product_absolute1img6.jpg");
			for(i=1;i<a;i++){
				$(".main_con2 .model_Product:last").find(".model_Product11:last").after($(".main_con2 .model_Product:last").find(".model_Product11:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").after($(".main_con2 .model_Product:last").find(".main_hidden32:last").clone());
				$(".main_con2 .model_Product:last").find(".main_hidden32:last").before($(".main_con2 .model_Product:last").find(".main_hidden33:last").clone());
				}
			}
			}
		else if(b==8){
		if(a==3){
			$(".main_con2").append($(".model_hidden").find(".model_Product:eq(2)").clone());
			$(".main_con2 .model_Product:last").find(".model_Product11").width(1920);
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img1");
			}
		else if(a==4){
			$(".main_con2").append($(".model_hidden").find(".model_Product:eq(2)").clone());
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1920);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":1920,"background-color":"#ffffff"});
			$(".main_con2 .model_Product:last").find(".model_Product11 img").addClass("Product_img01");
			}
		else if(a==5){
			$(".main_con2").append($(".model_hidden").find(".model_Product:eq(3)").clone());
			$(".main_con2 .model_Product:last").find(".model_Product1").width(1920);
			$(".main_con2 .model_Product:last").find(".model_Product11").css({"width":1920});
			}
			}
		}
	/*页面改动*/
	var  main_hiddenB;
	function main_hiddenB(){
		/*显示编辑*/
		$(".main_con").mouseenter(function(){
			if(see==0){
			$(this).find(".main_hidden1").show();
			$(this).find(".main_hidden2").show();}
			})
		$(".main_con").mouseleave(function(){
			$(this).find(".main_hidden1").hide();
			$(this).find(".main_hidden2").hide();
			})
		var main_hidden2;
		$(".main_hidden2").click(function(){
			main_hidden2=$(this).index(".main_hidden2");
			$(".main_hidden3:eq("+main_hidden2+")").show()
			})
		$(".main_hidden3").mouseleave(function(){
			$(this).hide();
			})
	    /*外框上边距*/
		var main_hiddenMT;var main_hiddenMTB;
	    $(".main_hiddenMTB").click(function(){
		    main_hiddenMTB=$(this).index(".main_hiddenMTB");
		    main_hiddenMT=parseInt($(".main_hiddenMT:eq("+main_hiddenMTB+")").val());
		    $(".main_conbox:eq("+main_hiddenMTB+")").css("margin-top",main_hiddenMT);
		    })
		/*外框下边距*/
		var main_hiddenMB;var main_hiddenMBB;
	    $(".main_hiddenMBB").click(function(){
		    main_hiddenMBB=$(this).index(".main_hiddenMBB");
		    main_hiddenMB=parseInt($(".main_hiddenMB:eq("+main_hiddenMBB+")").val());
		    $(".main_conbox:eq("+main_hiddenMBB+")").css("margin-bottom",main_hiddenMB);
		    })
		/*更换图片*/
		var main_hiddenimg;var main_hiddenimgB;
	    $(".main_hiddenimgB").click(function(){
		    main_hiddenimgB=$(this).index(".main_hiddenimgB");
		    main_hiddenimg=$(".main_hiddenimg:eq("+main_hiddenimgB+")").val();
		    $(".main_conimg:eq("+main_hiddenimgB+")").attr("src",main_hiddenimg);
		    })
		/*图片链接地址*/
		var main_hiddenimga;var main_hiddenimgaB;
	    $(".main_hiddenimgaB").click(function(){
		    main_hiddenimgaB=$(this).index(".main_hiddenimgaB");
		    main_hiddenimga=$(".main_hiddenimga:eq("+main_hiddenimgaB+")").val();
		    $(".main_conimga:eq("+main_hiddenimgaB+")").attr("href",main_hiddenimga);
		    })
		/*售出价格*/
		var main_hiddentextb;var main_hiddentextbB;
	    $(".main_hiddentextbB").click(function(){
		    main_hiddentextbB=$(this).index(".main_hiddentextbB");
		    main_hiddentextb=$(".main_hiddentextb:eq("+main_hiddentextbB+")").val();
		    $(".model_Product11b:eq("+main_hiddentextbB+")").html(main_hiddentextb);
		    })
		/*原始价格*/
		var main_hiddentexts;var main_hiddentextsB;
	    $(".main_hiddentextsB").click(function(){
		    main_hiddentextsB=$(this).index(".main_hiddentextsB");
		    main_hiddentexts='￥'+$(".main_hiddentexts:eq("+main_hiddentextsB+")").val();
		    $(".model_Product11s:eq("+main_hiddentextsB+")").html(main_hiddentexts);
		    })
		/*售出价格*/
		var main_hiddentextp;var main_hiddentextpB;
	    $(".main_hiddentextpB").click(function(){
		    main_hiddentextpB=$(this).index(".main_hiddentextpB");
		    main_hiddentextp='￥'+$(".main_hiddentextp:eq("+main_hiddentextpB+")").val();
		    $(".model_Product11p:eq("+main_hiddentextpB+")").html(main_hiddentextp);
		    })
		/*标签内容*/
		var main_hiddentext;var main_hiddentextB;
	    $(".main_hiddentextB").click(function(){
		    main_hiddentextB=$(this).index(".main_hiddentextB");
		    main_hiddentext=$(".main_hiddentext:eq("+main_hiddentextB+")").val();
		    $(".model_Product11text:eq("+main_hiddentextB+")").html(main_hiddentext);
		    })
		/*标签背景颜色*/
		var main_hiddentextbg;var main_hiddentextbgB;
	    $(".main_hiddentextbgB").click(function(){
		    main_hiddentextbgB=$(this).index(".main_hiddentextbgB");
		    main_hiddentextbg=$(".main_hiddentextbg:eq("+main_hiddentextbgB+")").val();
		    $(".model_Product11text:eq("+main_hiddentextbgB+")").css("background-color",main_hiddentextbg);
		    })
		/*标签字体大小*/
		var main_hiddentexts;var main_hiddentextsB;
	    $(".main_hiddentextsB").click(function(){
		    main_hiddentextsB=$(this).index(".main_hiddentextsB");
		    main_hiddentexts=$(".main_hiddentexts:eq("+main_hiddentextsB+")").val()+'px';
		    $(".model_Product11text:eq("+main_hiddentextsB+")").css("font-size",main_hiddentexts);
		    })
		/*标签字体颜色*/
		var main_hiddentextc;var main_hiddentextcB;
	    $(".main_hiddentextcB").click(function(){
		    main_hiddentextcB=$(this).index(".main_hiddentextcB");
		    main_hiddentextc=$(".main_hiddentextc:eq("+main_hiddentextcB+")").val();
		    $(".model_Product11text:eq("+main_hiddentextcB+")").css("color",main_hiddentextc);
		    })
			/*模块-图片滑动*/
			$(".AD_absolute_3").mouseenter(function(){
				stopCount();
				})
			$(".AD_absolute_32").mouseenter(function(){
				stopCount();
				})
			$(".AD_absolute_321").mouseenter(function(){
				stopCount();
				AD_absolute_32=$(this).index(".AD_absolute_321");
				$(".AD_absolute_32").find(".AD_absolute_321").css("background-color","#ffffff");
				$(".AD_absolute_3").animate({left:AD_absolute_32*-1920+'px'});
				$(this).css("background-color","#000000");
				})
			$(".AD_absolute_3").mouseleave(function(){
				stopCount();
				tab=setTimeout("timedCount()",1000);
				})
	    }
		/*预览*/
		$(".see").click(function(){
			$(".container01").height(BodyHeight);
			$(".container02").height(BodyHeight);
			if(see==0){
			$(".container01").width(BodyWidth);
			$(".container011").width(BodyWidth);
			$(".container02").hide();
			$(".sort").hide();
			if(BodyWidth<1190){	
			$(".container01").width(1190);
			$(".container011").width(1190);
			}
			see=1;
			$(this).html("返回");
			}
			else if(see==1){
				$(".container02").show();
				$(".container01").width(BodyWidth-316);
	            $(".container011").width(ScreenWidth);
			    $(".sort").hide();
				if(BodyWidth<1190){	
				$(".container01").width(1190);
				$(".container011").width(1190);
				}
				$(this).html("预览");
				see=0;
				}
			})	
		/*布局管理*/
		$(".container03 strong").click(function(){
			$(".model_sortable").sortable();
			$(".model").hide();
			$(".model:last").show();
			$(".model_sort .model1_con22").remove();
			layout=$(".main_con2 .main_con").toArray();
			if(layout.length==0)
			$(".model1_con22").hide();
			else{
			$(".model1_con22").show();
			for(i=0;i<layout.length;i++){
				$(".model_sortable").append($(".layout_hidden .model1_con22").clone());
				$(".model1_con22_sort:eq("+i+")").html(i+1);
				$(".main_con2 .main_con:eq("+i+")").append($("<div class='sort'>"+(i+1)+"</div>"));
				}
			}
			$(".model1_con22_delete").click(function(){
			model1_con22_delete=$(this).index(".model1_con22_delete");
			$(".model1_con22:eq("+model1_con22_delete+")").remove();
			})
			})
		var model1_con22_sort;
		$(".model1_con22_save").click(function(){
			layout_model=$(".model_sort .model1_con22").toArray();
			$(".main_con2 .main_con").remove();
			for(i=0;i<layout.length;i++){
				model1_con22_sort=parseInt($(".model_sort .model1_con22:eq("+i+")").find(".model1_con22_sort").html())-1;
				$(".main_con2").append(layout[model1_con22_sort]);
			    }
			main_hiddenB();
			})
	})
var ColorHex = new Array('00', '33', '66', '99', 'CC', 'FF');
 var SpColorHex = new Array('000000', '00FF00', '0000FF', 'FFFF00', '00FFFF', 'FF00FF');
 var current = null;
 var color;
$(document).ready(function(){
 $(".color").click(function(){
	 color=$(this).index(".color");
	 coloropen(event);
	 })
function initcolor(evt)
 {
    var colorTable = ''
    for (i = 0; i < 2; i++)
    {
        for (j = 0; j < 6; j++)
        {
            colorTable = colorTable + '<tr height=15>'
            colorTable = colorTable + '<td width=15 style="background-color:#000000">'
            if (i == 0) {
                colorTable = colorTable + '<td width=15 style="cursor:pointer;background-color:#' + ColorHex[j] + ColorHex[j] + ColorHex[j] + '" onclick="doclick(\'#' + ColorHex[j] + ColorHex[j] + ColorHex[j] +'\')">'
            }
            else {
                colorTable = colorTable + '<td width=15 style="cursor:pointer;background-color:#' + SpColorHex[j] + '" onclick="doclick(\'#' + SpColorHex[j] + '\')">'
            }
            colorTable = colorTable + '<td width=15 style="background-color:#000000">'
            for (k = 0; k < 3; k++)
            {
                for (l = 0; l < 6; l++)
                {
                    colorTable = colorTable + '<td width=15 style="cursor:pointer;background-color:#' + ColorHex[k + i * 3] + ColorHex[l] + ColorHex[j] + '" onclick="doclick(\'#' + ColorHex[k + i * 3] + ColorHex[l] + ColorHex[j] +  '\')">'
                }
            }
        }
    }
    colorTable = '<table border="1" cellspacing="0" cellpadding="0" style="text-align:center;cursor:pointer;border-collapse:collapse" bordercolor="000000" >'    +  colorTable + '</table>';
    $(".colorpane").html(colorTable);
    var current_x =0;
    var current_y = 0;
    //alert(current_x + "-" + current_y) 
    $(".colorpane:eq("+color+")").css("left",current_x);
    $(".colorpane:eq("+color+")").css("top",current_y);
}
function colorclose() {
    $(".colorpane").css("display","none");
    //alert("ok"); 
}
function coloropen() {
    $(".colorpane:eq("+color+")").css("display","block");
}
window.onload = initcolor;

	})
 
$(window).resize(function(){
	BodyWidth=$(this).width();
	BodyHeight=$(this).height()-70;
	$(".container01").height(BodyHeight);
	$(".container02").height(BodyHeight);
	if(see==0){
	$(".container01").width(BodyWidth-316);
	$(".container011").width(BodyWidth-316);
	}
	else{
	$(".container01").width(BodyWidth);
	$(".container011").width(BodyWidth);
	if(BodyWidth<1190){	
	$(".container01").width(1190);
	$(".container011:eq(0)").width(1190);
		}
	}
	})