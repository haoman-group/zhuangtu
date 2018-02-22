var container2=0;
var container3_c61;
var container3_c62;
var container3_c7;
var container5_c1;
var content3_W;
var content3_con;
var content3_con_H;
var scrollDelta=1;
var scrollValue=0;
var scrollvalue=2;
var i;
var j1;var j2;var j3;
var co=1;
/*±³¾°Í¼Æ¬*/
  $(document).ready(function(){if($(window).width()<1190){
                                    $(".conwhole").css("width","1190");
                                    }
                                    else{
										$(".conwhole").css("width","100%");
	                                     }
})
  
  $(window).resize(function(){if($(this).width()<1190){
                                 $(".conwhole").css("width","1190");
                                 }
                                 else{
                                      $(".conwhole").css("width","100%");
                                       }
							/*×°ÐÞÎªÊ²Ã´±ãÒË*/
	                       $(".content3Bg").height($(window).height());
						   $(".content32").height($(window).height());
	                       content3_W=$(window).height()/1000*1724;
	                       $(".content3").width(content3_W);
						   $(".content3img").height("100%");
						   content3_con=$(window).height()/1000;
						   content3_con_H=116*content3_con;
						   $(".content3_con:eq(0)").height(content3_con_H);
						   content3_con_H=262*content3_con;
						   $(".content3_con:eq(1)").height(content3_con_H);
					       content3_con_H=126*content3_con;
					   	   $(".content3_con:eq(2)").height(content3_con_H);
					   	   content3_con_H=368*content3_con;
					   	   $(".content3_con:eq(3)").height(content3_con_H);
					       content3_con_H=115*content3_con;
					   	   $(".content3_con:eq(4)").height(content3_con_H);
						   content3_con_H=70*content3_con;
	                       $(".content3_IMG").height(content3_con_H);
						   content3_con_H=content3_con_H/2;
	                       $(".content3_img2").css({top:-content3_con_H,left:-content3_con_H});
						   content3_con_H=100*content3_con;
                       	   $(".content3_img3").height(content3_con_H);
                       	   content3_W=content3_W/1724*454;
                       	   $(".content3_img3").width(content3_W);
						   
})

$(document).ready(function(){
	/*¸¨²ÄÒ»¼ü¹º*/
	$(".container2_con13").mouseenter(function(){
		container2=$(this).index(".container2_con13");
		$(".container2_con11:eq("+container2+")").show();
		$(".container2_con11").mouseenter(function(){
			$(this).show();
		})
		$(".container2_con11").mouseleave(function(){
			$(this).hide();
		})
	})
	$(".container2_con13").mouseleave(function(){		
		$(".container2_con11").hide();
	})
	/*×°ÐÞÎªÊ²Ã´±ãÒË*/
	$(".content3Bg").height($(window).height());
	$(".content32").height($(window).height());
	content3_W=$(window).height()/1000*1724;
	$(".content3").width(content3_W);
	$(".content3img").height("100%");
	content3_con=$(window).height()/1000;	
	content3_con_H=116*content3_con;
	$(".content3_con:eq(0)").height(content3_con_H);
	content3_con_H=262*content3_con;
	$(".content3_con:eq(1)").height(content3_con_H);
	content3_con_H=126*content3_con;
	$(".content3_con:eq(2)").height(content3_con_H);
	content3_con_H=368*content3_con;
	$(".content3_con:eq(3)").height(content3_con_H);
	content3_con_H=115*content3_con;
	$(".content3_con:eq(4)").height(content3_con_H);
	content3_con_H=70*content3_con;
	$(".content3_IMG").height(content3_con_H);
	content3_con_H=content3_con_H/2;
	$(".content3_img2").css({top:-content3_con_H,left:-content3_con_H});
	content3_con_H=100*content3_con;
	$(".content3_img3").height(content3_con_H);
	content3_W=content3_W/1724*454;
	$(".content3_img3").width(content3_W);
	$(".container_show").addClass("container_show2");	
	/*Î²²¿*/
	$(".container5_con1 img").click(function(){
		container5_c1=$(this).index(".container5_con1 img");
		container3_c61=container5_c1*2;
		container3_c62=container5_c1*2+1;
		$(".container3_con5").hide();
		$(".container3_con2").show();
		$(".container3_con6").hide();
		$(".container3_con5:eq("+container5_c1+")").show();
		$(".container3_con2:eq("+container5_c1+")").hide();
		$(".container3_con6:eq("+container3_c61+")").show();
		$(".container3_con6:eq("+container3_c62+")").show();	
		})
	if(co==1)
    $(document).scroll(function(){
     if($(document).scrollTop()<1332){
				j1=0;j2=1;j3=1;scrollValue=-1;	
				$(".content3_txt:eq(0)").addClass("content3_TXT");	
	 			$(".content3_IMG:eq(0)").show();
	            $(".content3_img3:eq(0)").show();
		 }
		 else if($(document).scrollTop()<($(window).height()+1332)){		
		     $(".container_show").removeClass("container_show2");		     
			 $(".container_show").addClass("container_show1");			 
		     scrollvalue==2; j1=1 ;j2=0 ; j3=1;
			 co=1;scrollValue=0; 
			 }
		 else  {
			j1=1 ;j2=1 ; j3=0;
			}	 
		 })
})

$(window).on('mousewheel DOMMouseScroll', function(e) {
	 scrollDelta=e.originalEvent.wheelDelta ||-e.originalEvent.detail;
	 scrollDelta=-scrollDelta / ( Math.abs( scrollDelta ) );
	 if(j1==0&&scrollValue>=0)
	 {scrollValue=scrollValue+scrollDelta;}
	 else{scrollValue=0}
	 if(j2==0)
	 scrollValue=0;
	 if(j3==0)
	 scrollValue=6;
	 for(i=0;i<scrollValue;)
	 {$(".content3_con:eq("+i+")").addClass("content3_con0");
	  $(".content3_txt").removeClass("content3_TXT");
	  $(".content3_IMG").hide();
	  $(".content3_img3").hide();
	  i=i+1;
	  $(".content3_txt:eq("+i+")").addClass("content3_TXT");
	  $(".content3_IMG:eq("+i+")").show();
	  $(".content3_img3:eq("+i+")").show();
	 }
	 for(i=scrollValue;i<5;)
	 {$(".content3_con:eq("+i+")").removeClass("content3_con0");
	  
	 i=i+1;
	 $(".content3_txt:eq("+i+")").removeClass("content3_TXT");
	 $(".content3_IMG:eq("+i+")").hide();
	  $(".content3_img3:eq("+i+")").hide(); 
	 }
	 if(scrollValue==0||scrollValue==-1)
	 {$(".content3_txt:eq(0)").addClass("content3_con_TXT");
	  $(".content3_IMG:eq(0)").show();
	  $(".content3_img3:eq(0)").show();
	 }
	                       if(scrollValue==0&&scrollDelta<0&&scrollvalue==2) 
						   {
						   $(".container_show").removeClass("container_show1");
						   $(".container_show").addClass("container_show2");						   
						   $(document).scrollTop(1200);
						   scrollValue=-2;
						   scrollvalue=0;
						   }
						   if(scrollValue==6)
						   {
						   $(".container_show").removeClass("container_show1");
						   $(".container_show").addClass("container_show2");
						   $(".container_show").css({top:-1332});
						   $(".container_show").animate({top:-(1333+$(window).height())},2000);
						   $(document).scrollTop(0);
						   scrollValue=8;
						   scrollvalue=-1;
						   }
						   
						   if(scrollvalue==-1&&scrollDelta<0&&$(document).scrollTop()<2)
						   { 
							     
								  
						          $(".container_show").animate({top:-1332});								 
								  $(".container_show").removeClass("container_show2");						  								 								  								  
								  $(document).scrollTop(510);
								  scrollvalue=0;
								  
							   }
						   
						   
	 })