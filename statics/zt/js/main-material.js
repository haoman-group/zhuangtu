var i=0;
var j=-1;
$(document).ready(function(){
	$(".mmartfurproduct .product .classlist").mouseenter(function(){
		$(this).addClass("onlist").siblings().removeClass("onlist");
		})
		
	$(document).scroll(function(){		        
	$(".navmsg_con2 a").css({"background-color":"#ffffff","color":"#666"});    			   
     if($(document).scrollTop()<1084){ 
	    $(".navmsg_con2 a:eq(0)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<1688){
	    $(".navmsg_con2 a:eq(1)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2282){
	    $(".navmsg_con2 a:eq(2)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2873){
	    $(".navmsg_con2 a:eq(3)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3468){
	    $(".navmsg_con2 a:eq(4)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else if($(document).scrollTop()<4064){
	    $(".navmsg_con2 a:eq(5)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else if($(document).scrollTop()<4658){
	    $(".navmsg_con2 a:eq(6)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else {
	    $(".navmsg_con2 a:eq(7)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
   })
	$(".navmsg_con2 a").mouseenter(function(){
	    $(this).css({"background-color":"#c8000b","color":"#ffffff"});
		})
	$(".navmsg_con2 a").mouseleave(function(){
	    $(this).css({"background-color":"#ffffff","color":"#666"});
	if($(document).scrollTop()<1084){ 
	    $(".navmsg_con2 a:eq(0)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<1688){
	    $(".navmsg_con2 a:eq(1)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2282){
	    $(".navmsg_con2 a:eq(2)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<2873){
	    $(".navmsg_con2 a:eq(3)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
     else if($(document).scrollTop()<3468){
	    $(".navmsg_con2 a:eq(4)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else if($(document).scrollTop()<4064){
	    $(".navmsg_con2 a:eq(5)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else if($(document).scrollTop()<4658){
	    $(".navmsg_con2 a:eq(6)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
	 else {
	    $(".navmsg_con2 a:eq(7)").css({"background-color":"#c8000b","color":"#ffffff"});    
     }
		})
})