var main_con2261b=0;
var main_con1123=0;
var main_con11=3;
var main_con1122;
var container20top;
var container20left;
var container2022i=0;
$(document).ready(function(){
	/*选择收货地址*/	
	$(".main_con11:eq(0)").css("border-color","transparent");
	$(".main_con11:eq(0)").find(".main_con11img").show();
	$(".main_con11:eq(0)").find(".main_con1120").show();
	$(".main_con11:eq(0)").find(".main_con1123").show();
	$(".main_con11:eq(0)").find(".main_con1123").css({"background-color":"#888","color":"#ffffff"});
	$(".main_con11").mouseenter(function(){
		$(".main_con11").css("border-color","#bebebf");
		$(".main_con11").find(".main_con11img").hide();
		$(this).css("border-color","transparent");
		$(this).find(".main_con11img").show();
		})
	$(".main_con11").click(function(){
		$(".main_con11").find(".main_con1120").hide();
		$(".main_con11").find(".main_con1123").hide();
		$(this).find(".main_con1120").show();
		$(this).find(".main_con1123").show();
		$(".main_con11:eq("+main_con1123+")").find(".main_con1123").show();
		})
	$(".main_con1123").click(function(){
		$(".main_con1123").css({"background-color":"transparent","color":"#888"});
		$(this).css({"background-color":"#888","color":"#ffffff"});
		main_con1123=$(this).index(".main_con1123");
		})
	/*添加新的收货地址*/
	$(".main_con12 img").click(function(){
		$(".container2").show();
		$(".container22").show();
		})
	/*修改新的收货地址*/
	$(".main_con1121").click(function(){
		$(".container2").show();
		$(".container21").show();
		})
	/*删除*/
	$(".main_con1122").click(function(){
		main_con1122=$(this).index(".main_con1122");
		$(".main_con11:eq("+main_con1122+")").remove();
		main_con11=main_con11-1;
		$(".main_con12").show();
		})
	/*地址变动*/
	container20top=($(window).height()-530)/2;
	container20left=($(window).width()-870)/2;
	$(".container20").css({"top":container20top,"left":container20left});
	$(window).resize(function(){
		container20top=($(window).height()-530)/2;
	    container20left=($(window).width()-870)/2;
		$(".container20").css({"top":container20top,"left":container20left});
		})
	$(".container2022 i").click(function(){
		if(container2022i!=1){
			$(this).find("img").show();
			container2022i=1;
			}
		else{
			$(this).find("img").hide();
			container2022i=0;
			}
		})
	$(".container2011").click(function(){
		$(".container2").hide();
		$(".container21").hide();
		$(".container22").hide();
		})
	$(".container20").css({"top":container20top,"left":container20left});
	/*退货险*/
	$(".main_con2261 b").click(function(){
		if(main_con2261b!=1){
			$(this).find("img").show();
			main_con2261b=1;
			}
		else{
			$(this).find("img").hide();
			main_con2261b=0;
			}
		})
	})