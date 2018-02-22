var content4_con14;
var content4_con12;
var content3_con11=-1;
var content3_con11img;
var content3_con11src;
var i;
$(document).ready(function(){
	if($(window).width()<1190)  
       $(".conwhole").css("width","1190");                                                               
   else{
	   $(".conwhole").css("width","100%");
	   }
	/*游戏规则*/
	$(".content2_con2").click(function(){
		$(".content2_con3img").hide();
		$(".content2_con41").animate({left:0});
		})
	$(".content2_con41").click(function(){		
		$(".content2_con41").animate({left:-860});
		$(".content2_con3img").delay(500).show(0);
		})
	/*团购框固定*/
	$(document).scroll(function(){
	   if($(document).scrollTop()>0){
		   
		   $(".content3_con1").removeClass("content3_con1fix");
		   $(".content3_con3").hide();
		   }
       if($(document).scrollTop()>890){
		   $(".content3_con1").addClass("content3_con1fix");
		   $(".content3_con3").show();
		   }		   
	})
	/*团购*/
	$(".content4_con14 b").click(function(){
		if(content3_con11==4){alert("你已选满物品！");}
		else{
		content3_con11=content3_con11+1;
		content4_con14=$(this).index(".content4_con14 b");
		content4_con12=$(".content4_con12 img:eq("+content4_con14+")").attr("src");
		$(".content3_con11 img:eq("+content3_con11+")").attr("src",content4_con12);
		}
		})
   /*双击取消*/
   $(".content3_con11 img").dblclick(function(){
	   if(content3_con11!=-1){	   
	   content3_con11img=$(this).index(".content3_con11 img");
	   if(content3_con11img<=content3_con11){
	   for(i=content3_con11img;i<content3_con11;i++){
		   i=i+1;
		   content3_con11src=$(".content3_con11 img:eq("+i+")").attr("src");
		   i=i-1;
	       $(".content3_con11 img:eq("+i+")").attr("src",content3_con11src);		   
		   }
	   
	   $(".content3_con11 img:eq("+content3_con11+")").attr("src","../images/JoinGroup_content3img1.png");
	   content3_con11=content3_con11-1;
	   }
	   }
	   })							
})
  
  $(window).resize(function(){if($(this).width()<1190)
                                $(".conwhole").css("width","1190");                                                               
                                         else{$(".conwhole").css("width","100%");}
})
