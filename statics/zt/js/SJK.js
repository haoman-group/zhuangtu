
    $(document).ready(function(){if($(window).width()<1250){
                                    $("#link").attr("href","../css/SJK_1250.css");
                                    $(".conwhole").css("width","1250");
                                    }
                                    else if($(window).width()<1500){
	                                   }
                                         else{$("#link").attr("href","../css/SJK_1.css");}
})
  
  $(window).resize(function(){if($(this).width()<1250){
                                 $("#link").attr("href","../css/SJK_1250.css");
                                 $(".conwhole").css("width","1250");
                                 }
                                 else if($(this).width()<1500){
	                                 $("#link").attr("href","../css/SJK_1250.css");
										 $(".conwhole").css("width","100%");
	                                 }
                                       else{$("#link").attr("href","../css/SJK_1.css");
                                            
                                            }
})
  $(document).ready(function(){
	/*title*/
	$(document).scroll(function(){
		 if($(document).scrollTop()>27){			 
			 var Ti=($(document).scrollTop()-27)/2;
			 $(".title").offset({top:Ti});
			 }
		else{$(".title").offset({top:0})}
		})
  })
