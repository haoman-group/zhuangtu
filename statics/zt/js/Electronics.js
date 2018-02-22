
$(document).ready(function(){

	/*隐藏导航显示
   $(".ele_nav_li").mouseenter(function(){
	   $(this).find("a").css("color","#000000");
	   $(this).find("strong").find("a").css("color","#3e9af0");
	})
   $(".ele_nav_li").mouseleave(function(){
	   $(this).find("a").css("color","#ffffff");
	})*/
  /*导航位置固定*/
   $(document).scroll(function(){
       if($(document).scrollTop()>150){
		   $(".ele_nav").addClass("ele_nav_fix");
		   }
	   else{
		   $(".ele_nav").removeClass("ele_nav_fix");
	   }
   })
})
$(document).ready(function(){
	/*家具空间*/
	    $(".ele_spaceright:eq(1)").show();
	    $(".ele_spaceleftclass:eq(1)").hide();
		$(".ele_spaceleftclassh:eq(1)").show().find(".ele_spaceleftclassline").show();
		$(".ele_spaceleftclassh:eq(1)").find(".ele_spaceleftclassc").show();
	
	$(".ele_spaceleftclass").click(function(){
		$(".ele_spaceleftclassc").css("background-color","#3e9af1");
		$(".ele_spaceright").hide();
		$(".ele_spaceleftclassline").hide();
		$(".ele_spaceleftclassc").hide();
		$(".ele_spaceleftclass").show();
		$(".ele_spaceleftclassh").hide();
	    $(this).hide();
		i=$(this).index(".ele_spaceleftclass");	
		$(".ele_spaceright:eq("+i+")").show();
		$(".ele_spaceleftclassh:eq("+i+")").show().find(".ele_spaceleftclassline").show();
		$(".ele_spaceleftclassh:eq("+i+")").find(".ele_spaceleftclassc").show();
		$(".ele_spaceleftclassh:eq("+i+")").find(".ele_spaceleftclassc1").css("background-color","#fe8802");
		var $imgs  = $(".ele_spaceright:eq("+i+")").find("img");
		$.each($imgs,function(i,v){
			$(v).attr("src",$(v).attr("data-ourl"));
		})

	})
    
	$(".ele_spaceleftclassc").click(function(){
		$(".ele_spaceright").hide();
		i=$(this).index(".ele_spaceleftclassc");		
		$(".ele_spaceright:eq("+i+")").show();
	    $(".ele_spaceleftclassc").css("background-color","#3e9af1");
		$(this).css("background-color","#fe8802");
	})
	$(".ele_spacerightpro").mouseenter(function(){
		$(this).find(".ele_spacerightsim").stop();
		$(this).find(".ele_spacerightsim").animate({bottom:'0'});
		})
	$(".ele_spacerightpro").mouseleave(function(){
		$(this).find(".ele_spacerightsim").stop();
		$(this).find(".ele_spacerightsim").animate({bottom:'-24px'});
		})	
	
	/*主题内容*/
/*	   for(i=0;i<6;i++){
		   $(".ele_mainrighthli:eq("+i*2+")").find("b").show();
		   $(".ele_mainrighthli:eq("+i*2+")").css("background-color","#296ecc").css("color","#ffffff");
		   }
	$(".ele_mainrighthli").click(function(){	   
	   i=$(this).index(".ele_mainrighthli");
	   j=(i-i%2)/2;
	   n=i%2;
	   $(".ele_mainrighthul:eq("+j+")").find(".ele_mainrighthli").css("background-color","#e9ecf2").css("color","#000000");
	   $(".ele_mainrighthul:eq("+j+")").find(".ele_mainrighthli").find("b").hide();
	   $(".ele_mainrightmain:eq("+j+")").animate({left:n*-241+'px'});
	   $(this).find("b").show();
	   $(this).css("background-color","#296ecc").css("color","#ffffff");
	})
*/	
	/*固定图标*/
	$(document).scroll(function(){
     if($(document).scrollTop()<1730){ 
	    $(".navmsg_con").css("display","block");
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(0)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2530){
		$(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(1)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3150){
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(2)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3750){
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(3)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<4360){
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(4)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
	 else {
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(5)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
   })
	$(".navmsg_con2 a").mouseenter(function(){
	    $(this).css({"background-color":"#356acb","color":"#ffffff"});
		})
	$(".navmsg_con2 a").mouseleave(function(){
	    $(this).css({"background-color":"#ffffff","color":"#666"});
	if($(document).scrollTop()<1730){ 
	    $(".navmsg_con2 a:eq(0)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2530){
	    $(".navmsg_con2 a:eq(1)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3150){
	    $(".navmsg_con2 a:eq(2)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3750){
	    $(".navmsg_con2 a:eq(3)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<4360){
	    $(".navmsg_con2 a:eq(4)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
	 else {
	    $(".navmsg_con2 a:eq(5)").css({"background-color":"#356acb","color":"#ffffff"});    
     }
		})
})

