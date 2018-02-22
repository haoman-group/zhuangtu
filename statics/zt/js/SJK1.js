/*内容*/
var content2=0;
var content2_con1;
var content2_con1_top1=0;
var content2_con1_top2=0;
var content2_con1_top3=0;
var content2_con1_top4=0;
var content2_con1_top5=0;
var con2;
var content2_conimg=0;
var content2_conimg1=0;
var content2_conimg2=0;
var height_1;
con2=function() { 
    content2_con1=$(".content2_con1:eq(-1)").index()+1;
	for(i=0;i<content2_con1;i++){
		if(i%5==0){
			$(".content2_con1:eq("+i+")").css({top:content2_con1_top1,left:0});		
			content2_con1_top1=content2_con1_top1+$(".content2_con1:eq("+i+")").height()+10;
			content2=content2_con1_top1;
			}
		if(i%5==1){
			$(".content2_con1:eq("+i+")").css({top:content2_con1_top2,left:240});				
			content2_con1_top2=content2_con1_top2+$(".content2_con1:eq("+i+")").height()+10;
			if(content2<content2_con1_top2) content2=content2_con1_top2;
			}
		if(i%5==2){
			$(".content2_con1:eq("+i+")").css({top:content2_con1_top3,left:480});
			content2_con1_top3=content2_con1_top3+$(".content2_con1:eq("+i+")").height()+10;
            if(content2<content2_con1_top3) content2=content2_con1_top3;
			}
		if(i%5==3){
			$(".content2_con1:eq("+i+")").css({top:content2_con1_top4,left:720});
			content2_con1_top4=content2_con1_top4+$(".content2_con1:eq("+i+")").height()+10;
			if(content2<content2_con1_top4) content2=content2_con1_top4;
			}
		if(i%5==4){
			$(".content2_con1:eq("+i+")").css({top:content2_con1_top5,left:960});
			content2_con1_top5=content2_con1_top5+$(".content2_con1:eq("+i+")").height()+10;
			if(content2<content2_con1_top5) content2=content2_con1_top5;
			}
		}		
		$(".content2").height(content2);
}
$(document).ready(function() {
   if($(".content2_con1:eq("+0+") img").height()!=0)
   con2();
   else {
	   window.onload = function() { 
   
       con2();
	   }
	   }
    $(".content2_con132 p").mouseenter(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img01.png");
	})
	$(".content2_con132 p").mouseleave(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img1.png");
	})
	$(".content2_con121").mouseenter(function(){
	  var i=$(this).index(".content2_con121");
	  if(i%2==0)
	 $(this).find("img").attr("src","image/SJK1_con2img01.png");
	 else
	 $(this).find("img").attr("src","image/SJK1_con2img02.png");
	})
	$(".content2_con121").mouseleave(function(){
	  var i=$(this).index(".content2_con121");
	  if(i%2==0)
	 $(this).find("img").attr("src","image/SJK1_con2img1.png");
	 else
	 $(this).find("img").attr("src","image/SJK1_con2img2.png");
	})
	/*隐藏导航*/
	$(document).scroll(function(){
	   if($(document).scrollTop()>200)
	      {$(".content3").show();
		  }
	   else
	      {$(".content3").hide();
		  }
		  })
		  
		  
		  
	/*隐藏页面*/
	 $(".content6_con3 p").mouseenter(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img01.png");
	})
	$(".content6_con3 p").mouseleave(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img1.png");
	})
	$(".content5_con12").mouseenter(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img01.png");
	})
	$(".content5_con12").mouseleave(function(){
	 $(this).find("img").attr("src","image/SJK1_con2img1.png");
	})
	 $(".content4img").mouseenter(function(){
	 $(this).attr("src","image/test_msg2.png");
	})
	$(".content4img").mouseleave(function(){
	 $(this).attr("src","image/test_msg1.png");
	})
	$(".content4img").click(function(){
		$(".container_show").css("position","relative");
        $(".container_show").css({top:0});
		$(".fix_nav").css("z-index","1");	
        $(".content4").hide();
		$(".content4_con1").hide();$(document).scrollTop(height_1);
	})
	$(".content2_conimg").click(function(){
		content2_conimg=0;
		content2_conimg1=(($(this).index(".content2_conimg")-$(this).index(".content2_conimg")%5)/5)+1;
		content2_conimg2=$(this).index(".content2_conimg")%5;
		$(".container_show").css("position","fixed");
		for(i=0;i<content2_conimg1;i++)
		{			
			content2_conimg=content2_conimg+$(".content2_con1:eq("+content2_conimg2+")").height()+10;
			content2_conimg2=content2_conimg2+5;
			}
		 height_1=content2_conimg+280-$(window).height();
		if(height_1>0)
		$(".container_show").animate({top:-height_1});
		$(".content4").show();
		$(".content4_con1").show();
		$(".fix_nav").css("z-index","-1");	
		})
})

