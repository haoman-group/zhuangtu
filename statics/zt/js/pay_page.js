$(function(){
	//评价星星
	// (function(){
	// 	$('.star').each(function(){
	// 		var that = $(this);  //保存遍历出来的star元素，以便后面使用
	// 		$(this).find('li').each(function(){
	// 			$(this).click(function(){
    //
	// 				that.find("input").value($(this).index());
    //
	// 				if($(this).index() == 1){
	// 					that.find("input").value('1');
	// 				}
	// 				if($(this).index() == 2){
	// 					that.find("input").value('2');
	// 				}
	// 				if($(this).index() == 3){
	// 					that.find("input").value('3');
	// 				}
	// 				if($(this).index() == 4){
	// 					that.find("input").value('80%');
	// 				}
	// 				if($(this).index() == 5){
	// 					that.find("input").value('100%');
	// 				}
	// 			})
	// 		})
	// 	})
    //
    //
    //
	// })();

	// $(".star li").click(function () {
	// 	alert(1);
	// })

	$('.star li').click(function(){
		var index= $(this).index()-1;
		$(this).siblings('p').css("width",20*index+"%").siblings("input").val(index);
	});


	// (function(){
	// 	$('#pay_page_submit').click(function(){
	// 		$('#pay_order_bg3_t').removeClass('on');
	// 		$('.pay_order_container .pay_order_bg4_t').css({'background-position':'0 -194px','color':'#fff'});
	// 		var leftW = ($(document).width()-$('.pm4').outerWidth())/2;
	// 		$('.pm4').css({'left':leftW,'display':'block'});
	// 	})
	// })();

})