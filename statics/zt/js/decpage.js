$(function(){

	/*点击切换的滑动门   chtitli为切换按钮  chtitul为切换按钮的容器
	 chconli为切换内容    chconul为切换内容的容器
	 data-tag属性标记对应关系*/
	$(".chtitli").click(function(){
		var $chtitul= $(this).closest(".chtitul");
		var tag=$chtitul.attr("data-tag");
		var $chconul= $("[data-tag='"+tag+"']").eq(1);

		var index = $chtitul.find(".chtitli").index(this);
		$(this).addClass("on").siblings(".chtitli").removeClass("on");
		$chconul.find(".chconli").eq(index).show().siblings(".chconli").hide();
	})



})

