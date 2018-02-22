
  //左侧楼层跳转
$(document).ready(function(){
	$(document).scroll(function(){

	    $(".home_ltfix").css("background-color","#ffffff");
     if($(document).scrollTop()<1054){
	    $(".home_ltfix_con").css("display","block");
	    $(".home_ltfixcon").hide();
        $(".home_ltfix1").css("background-color","#c8000b").find(".home_ltfixcon").show();
     }
     else if($(document).scrollTop()<1670){
		$(".home_ltfixcon").hide();
        $(".home_ltfix2").css("background-color","#c8000b").find(".home_ltfixcon").show();
     }
     else if($(document).scrollTop()<2100){
        $(".home_ltfixcon").hide();
        $(".home_ltfix3").css("background-color","#c8000b").find(".home_ltfixcon").show();
     }
     else if($(document).scrollTop()<2550){
        $(".home_ltfixcon").hide();
        $(".home_ltfix4").css("background-color","#c8000b").find(".home_ltfixcon").show();
     }
     else if($(document).scrollTop()<2990){
        $(".home_ltfixcon").hide();
        $(".home_ltfix5").css("background-color","#c8000b").find(".home_ltfixcon").show();
     }
     else if($(document).scrollTop()<3540){
        $(".home_ltfixcon").hide();
        $(".home_ltfix6").css("background-color","#c8000b").find(".home_ltfixcon").show();
     }
     else if($(document).scrollTop()<3980){
        $(".home_ltfixcon").hide();
        $(".home_ltfix7").css("background-color","#c8000b").find(".home_ltfixcon").show();
     }
   })

    $(".home_ltfix").mousemove(function(){
	   $(this).css("background-color","#c8000b").find(".home_ltfixcon").css("background-color","#c8000b");
       $(this).find(".home_ltfixcon").show();
	})
	$(".home_ltfix").mouseleave(function(){
	 $(this).css("background-color","#ffffff").find(".home_ltfixcon").css("background-color","#c8000b");
	 $(this).find(".home_ltfixcon").hide();
	})
})



$(document).ready(function(){
  $(document).scroll(function(){
	   if($(document).scrollTop()>50)
	    {$(".fix_nav").show();}


   })

   $(document).scroll(function(){
	if($(document).scrollTop()>700)
	      {$(".hidden_searchBg").show();
		   $(".home_ltfix_con2").css({"opacity":"1","transform":"scale(1.0)"});
		  }
	   else
	      {$(".hidden_searchBg").hide();
		   $(".home_ltfix_con2").css({"opacity":"0","transform":"scale(1.2)"});
			}
	})

	$(".fix_navcona").mouseenter(function(){
		$(this).find(".fix_navatit").show();

		$(this).find(".fix_navatit").animate({
			right:'35px',
			opacity:'1',
			});
		})
	$(".fix_navcona").mouseleave(function(){

		$(this).find(".fix_navatit").animate({
			right:'70px',
			opacity:'0',
			});
		$(this).find(".fix_navatit").hide();
		})

   $(".fix_nav").delay(2000).show(0);

})








// 家装必读特效
  $(function(){
  	$('.hd_wrap_content ul').find('li').mouseenter(function(){
  		$('.hd_wrap_content ul').find('li').find('h2').css({'top':'0'}).stop();
  		$('.hd_wrap_content ul').find('li').find('p').show();
  		$('.hd_wrap_content ul').find('li').find('.show').show().end().find('.hide').css({'top':'1000px'}).stop();
  		$(this).find('h2').animate({'top':'120px'});
  		$(this).find('p').hide();
  		$(this).find('.show').hide().end();
  		$(this).find('.hide').animate({'top':'25px'});

  	})
  	$('.hd_wrap_content ul').find('li').mouseleave(function(){
  		$(this).find('h2').css({'top':'0'}).stop();
  		$(this).find('p').show();
  		$(this).find('.show').show();
  		$(this).find('.hide').css({'top':'1000px'}).stop();
  	})

  	$('.hd_wrap_content .house').find('img').addClass('on');

  	setInterval(function(){
  		if($('.hd_down2').css('top') == 10+'px'){
  			$('.hd_down2').animate({'top':'0px'});
  		}else{
  			$('.hd_down2').animate({'top':'10px'});
  		}
  		if($('.hd_down1').css('top') == 10+'px'){
  			$('.hd_down1').animate({'top':'0px'});
  		}else{
  			$('.hd_down1').animate({'top':'10px'});
  		}
  	},600);

  	// if($(document).scrollTop() == $('.hd_first').offset().top)
  	// $(window).scroll(function(){

   //     if($(document).scrollTop() == $('.hd_first').offset().top){
   //     	console.log(1)
   //     	$('.hd_first .circle_left').addClass('on');
   //     	$('.hd_first .circle_right').addClass('on');
   //     }else{
   //     	$('.hd_first .circle_left').removeClass('on');
   //     	$('.hd_first .circle_right').removeClass('on');
   //     }
  	// })
    $('.hd_circle').hover(function(){
    	$(this).find('.circle_left').addClass('on').end().find('.circle_right').addClass('on');
    },function(){
    	$(this).find('.circle_left').removeClass('on').end().find('.circle_right').removeClass('on');
    })

    $('.hd_fourth ul').hover(function(){
    	$('.hd_fourth ol li').addClass('on');
    },function(){
    	// $('.hd_fourth ol li').removeClass('on');
    })





  })
