var i=0;
var j=0;
var tab;
var q=0;
var n=0;
var m=1;
timedCount=function timedCount(q){
	  // n=i%5;
	   m=m%5;
	   w=5*q+m;
	   $(".content23 ul:eq("+q+")").find("li").css("background-color","#999");
	   $(".g_midin:eq("+q+")").animate({left:m*-656+'px'});
	   $(".content23 li:eq("+w+")").css("background-color","#000000");
	   m=m+1;
	tab=setTimeout("timedCount(q)",3000);
  }
function stopCount()
  {
  clearTimeout(tab);
  return;
  }
$(document).ready(function(){
	/*主题内容*/
	   for(i=0;i<8;i++){
		   $(".content23 li:eq("+i*5+")").css("background-color","#000000");
		   }
		i=0;
	$(".content23 li").click(function(){	   
	   i=$(this).index(".content23 li");
	   j=(i-i%5)/5;
	   n=i%5;
	   $(".content23 ul:eq("+j+")").find("li").css("background-color","#999");
	   $(".g_midin:eq("+j+")").animate({left:n*-656+'px'});
	   $(this).css("background-color","#000000");
	})

    $(".brand_gallery .g_mid").mouseenter(function(){
		stopCount();
		})
	$(".brand_gallery .g_mid").mouseleave(function(){
		q=$(this).index(".g_mid");
		m=1;
		tab=setTimeout("timedCount(q)",1000);
		})
  /*随高度变化
  $(document).scroll(function(){
     if($(document).scrollTop()<200){
	   $(".content1_img:eq(0)").attr("src","../images/BrandStreet_main11.png");
     }
     else if($(document).scrollTop()<900){
		$(".hidden_searchBg").hide();
		$(".content1_img:eq(0)").attr("src","../images/BrandStreet_main21.png");
		$(".content1_img:eq(1)").attr("src","../images/BrandStreet_main12.png");
     }
     else if($(document).scrollTop()<1440){
		 
		
		$(".hidden_searchBg").show();
        $(".content1_img:eq(0)").attr("src","../images/BrandStreet_main11.png");
		$(".content1_img:eq(1)").attr("src","../images/BrandStreet_main22.png");
		$(".content1_img:eq(2)").attr("src","../images/BrandStreet_main13.png");
     }
     else if($(document).scrollTop()<1960){
		 
		
        $(".content1_img:eq(1)").attr("src","../images/BrandStreet_main12.png");
		$(".content1_img:eq(2)").attr("src","../images/BrandStreet_main23.png");
		$(".content1_img:eq(3)").attr("src","../images/BrandStreet_main14.png");
     }
     else if($(document).scrollTop()<2510){
		 
        $(".content1_img:eq(2)").attr("src","../images/BrandStreet_main13.png");
		$(".content1_img:eq(3)").attr("src","../images/BrandStreet_main24.png");
		$(".content1_img:eq(4)").attr("src","../images/BrandStreet_main15.png");
     }
     else if($(document).scrollTop()<3040){
	
		$(".content1_img:eq(3)").attr("src","../images/BrandStreet_main14.png");
		$(".content1_img:eq(4)").attr("src","../images/BrandStreet_main25.png");
		$(".content1_img:eq(5)").attr("src","../images/BrandStreet_main16.png");
     }
     else if($(document).scrollTop()<3580){
		 
		$(".content1_img:eq(4)").attr("src","../images/BrandStreet_main15.png");
		$(".content1_img:eq(5)").attr("src","../images/BrandStreet_main26.png");
		$(".content1_img:eq(6)").attr("src","../images/BrandStreet_main17.png");
     }
	 else if($(document).scrollTop()<4120){
		
		$(".content1_img:eq(5)").attr("src","../images/BrandStreet_main16.png");
		$(".content1_img:eq(6)").attr("src","../images/BrandStreet_main27.png");
		$(".content1_img:eq(7)").attr("src","../images/BrandStreet_main18.png");
     }
	 else{
		 
		$(".content1_img:eq(6)").attr("src","../images/BrandStreet_main17.png");
	    $(".content1_img:eq(7)").attr("src","../images/BrandStreet_main28.png");

		 }
   })
   */
    $(window).resize(function() {
        if($(this).width()<1190){
			$(".searchBg").css("width","1190px");
			$(".mainBg").css("width","1190px");
			
			}
		else{
			$(".searchBg").css("width","100%");
			$(".mainBg").css("width","100%");
			}
    });
})
