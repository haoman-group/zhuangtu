var container2=0;
var container3_c61;
var container3_c62;
var container3_c7;
var container5_c1;
/*背景图片*/
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
})
$(document).ready(function(){
	/*辅材一键购*/
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
	/*免费送货*/	
	$(".container3_con7").mouseenter(function(){
	    container3_c7=$(this).index(".container3_con7");
		container3_c61=container3_c7*2;
		container3_c62=container3_c7*2+1;
		$(".container3_con5").hide();
		$(".container3_con7").show();
		$(".container3_con6").hide();
		$(".container3_con5:eq("+container3_c7+")").show();
		$(".container3_con7:eq("+container3_c7+")").hide();
		$(".container3_con6:eq("+container3_c61+")").show();
		$(".container3_con6:eq("+container3_c62+")").show();
		})
	/*尾部*/
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

})
