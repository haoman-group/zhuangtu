var i;
var main_con16321=0;
var main_con16321b=new Array();
for(i=0;i<1000;i++){
	main_con16321b[i]=1;
	}
$(document).ready(function(){
	/*商品*/
	$(".main_con1631a").click(function(){
		i=$(this).index(".main_con1631a");
		$(".main_con163").stop();
		$(".main_con163").hide();
		$(".main_con163:eq("+i+")").stop();
		$(".main_con163:eq("+i+")").slideDown("slow");
		})
	$(".main_con1630b1").click(function(){
		if(main_con16321>0){
			main_con16321=main_con16321-1;
			$(".main_con16321").stop();
			$(".main_con16321").animate({left:main_con16321*-760+'px'});
			}
		})
	$(".main_con1630b2").click(function(){
		if(main_con16321<1){
			main_con16321=main_con16321+1;
			$(".main_con16321").stop();
			$(".main_con16321").animate({left:main_con16321*-760+'px'});
			}
		})
	})