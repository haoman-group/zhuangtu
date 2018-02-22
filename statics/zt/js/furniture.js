var i=0;
var j=-1;
var tab;
timedCount=function timedCount(){
	   i=i%5;
	   $(".fur_hotindex ul").find("li").css("background-color","#999");
	   $(".fur_hotul").animate({left:i*-1190+'px'});
	   $(".fur_hotindex li:eq("+i+")").css("background-color","#000000");
	   i=i+1;
	tab=setTimeout("timedCount()",3000);
  }
function stopCount()
  {
  clearTimeout(tab);
  return;
  }
function timed(){
	   j=j+1;
	   j=j%3;
 if(j%3==0)
    {
	    
        $(".tab_nav").attr("src","../images/furniture_navcenter0.png");
		$(".tab_li").css("background-color","#000000");
		$(".tab_li1").css("background-color","#c8000b");
		$(".navBg").css("background-color","#c8000b");
		
	}
 if(j%3==1)
	 {
	   
		$(".tab_nav").attr("src","../images/furniture_navcenter1.png");
		$(".tab_li").css("background-color","#000000");
		$(".tab_li2").css("background-color","#c8000b");
		$(".navBg").css("background-color","#1b0508");
		
	}
 if(j%3==2)
	{
	    
		$(".tab_nav").attr("src","../images/furniture_navcenter2.png");
		$(".tab_li").css("background-color","#000000");
		$(".tab_li3").css("background-color","#c8000b");
		$(".navBg").css("background-color","#e73739");
		
	}
	   
	tab1=setTimeout("timed()",3000);
  }
function stopc()
  {
  clearTimeout(tab1);
  return;
  }
$(document).ready(function(){
/*导航tab*/
    timed();
	$(".tab_li").mouseenter(function(){
		$(".tab_li").css("background-color","#000000");
		$(this).css("background-color","#c8000b");
		j=$(this).index(".tab_li");
		$(".tab_nav").attr("src","../images/furniture_navcenter"+j+".png");	
		if(j==0) $(".navBg").css("background-color","#c8000b");
		else if(j==1) $(".navBg").css("background-color","#1b0508");
		else if(j==2) $(".navBg").css("background-color","#e73739");	
		})
	$(".nav_center").mouseenter(function(){
		stopc();
		})
	$(".nav_center").mouseleave(function(){
		tab1=setTimeout("timed()",1000);
		})
/*特价专区*/
$(".os_left").find("ul li:eq(0)").addClass("cur");	
$(".os_left").find("ul li:eq(0)").click(function(){
	$(".os_left").find("li").removeClass("cur");
	$(this).addClass("cur");
	$(".os_mid").find("img").attr("src","../images/furniture_content1_con31.png");
	})
$(".os_left").find("ul li:eq(1)").click(function(){
	$(".os_left").find("li").removeClass("cur");
	$(this).addClass("cur");
	$(".os_mid").find("img").attr("src","../images/furniture_content1_con32.png");
	})
$(".os_left").find("ul li:eq(2)").click(function(){
	$(".os_left").find("li").removeClass("cur");
	$(this).addClass("cur");
	$(".os_mid").find("img").attr("src","../images/furniture_content1_con33.png");
	})
/*热卖品牌*/
timedCount();
$(".content2").mouseenter(function(){
		stopCount();
		})
	$(".content2").mouseleave(function(){
		tab=setTimeout("timedCount()",1000);
		})
$(".fur_hotindex li:eq(0)").css("background-color","#000000");
$(".fur_hotindex li").click(function(){	   
	   i=$(this).index(".fur_hotindex li");
	   $(".fur_hotindex ul").find("li").css("background-color","#999");
	   $(".fur_hotul").animate({left:i*-1190+'px'});
	   $(this).css("background-color","#000000");
	})
	/*固定图标*/
	$(document).scroll(function(){			   
     if($(document).scrollTop()<1200){ 
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(0)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<1908){
		$(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(1)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2512){
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(2)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3116){
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(3)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3721){
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(4)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else if($(document).scrollTop()<4325){
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(5)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else {
        $(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    	
	    $(".navmsg_con2 a:eq(6)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
   })
	$(".navmsg_con2 a").mouseenter(function(){
	    $(this).css({"background-color":"#c8000b","color":"#ffffff"});
		})
	$(".navmsg_con2 a").mouseleave(function(){
	    $(this).css({"background-color":"#ffffff","color":"#666"});
	if($(document).scrollTop()<1200){ 
	    $(".navmsg_con2 a:eq(0)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<1908){
	    $(".navmsg_con2 a:eq(1)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2512){
	    $(".navmsg_con2 a:eq(2)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3116){
	    $(".navmsg_con2 a:eq(3)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3721){
	    $(".navmsg_con2 a:eq(4)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else if($(document).scrollTop()<4325){
	    $(".navmsg_con2 a:eq(5)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else {
	    $(".navmsg_con2 a:eq(6)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
		})
})