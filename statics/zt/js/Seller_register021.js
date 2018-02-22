var seller_setshop_ul=new Array();
    seller_setshop_ul[0]="url(../images/Seller_MainCon2li11.png)";
    seller_setshop_ul[1]="url(../images/Seller_MainCon2li12.png)";
    seller_setshop_ul[2]="url(../images/Seller_MainCon2li13.png)";
    seller_setshop_ul[3]="url(../images/Seller_MainCon2li14.png)";
    seller_setshop_ul[4]="url(../images/Seller_MainCon2li15.png)";
$(document).ready(function(){
	/*店铺类型*/
	$(".seller_setshop .content_li").mouseenter(function(){
		$(this).css("background-color","#ffffff");
		$(this).find(".explain").height("auto");
		})
	$(".seller_setshop .content_li").mouseleave(function(){
		$(this).css("background-color","#f4f4f4");
		$(this).find(".explain").height(108);
		})
	/*店铺选择*/
	$(".seller_setshop ul li:eq(0)").css("background-image",seller_setshop_ul[0]);
	$(".seller_setshop ul li").click(function(){
		var seller_setshop_ul_li=$(this).index(".seller_setshop ul li");
		$(".seller_setshop ul li:eq(0)").css("background-image","url(../images/Seller_register02MainCon2li01.png)");
		$(".seller_setshop ul li:eq(1)").css("background-image","url(../images/Seller_register02MainCon2li02.png)");
		$(".seller_setshop ul li:eq(2)").css("background-image","url(../images/Seller_register02MainCon2li03.png)");
		$(".seller_setshop ul li:eq(3)").css("background-image","url(../images/Seller_register02MainCon2li04.png)");
		$(".seller_setshop ul li:eq(4)").css("background-image","url(../images/Seller_register02MainCon2li05.png)");
	    $(".seller_setshop ul li:eq("+seller_setshop_ul_li+")").css("background-image",seller_setshop_ul[seller_setshop_ul_li]);
		})
	$(".seller_setshop .content_li .type:eq(0)").css("background-color","#c8000b");
	$(".seller_setshop .content_li .type").click(function(){
		$(".seller_setshop .content_li .type").css("background-color","#888");
		$(this).css("background-color","#c8000b");
		})
})