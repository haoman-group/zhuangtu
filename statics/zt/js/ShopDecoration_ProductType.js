var SDPT_navOneb=0;
var SDPT_navTwob=0;
var SDPT_display;
$(document).ready(function(){
	/*展示*/
	$(".SDPT_display:eq(0)").show();
	$(".SDPT_navOne b:eq(0)").css("color","#ffffff");
	$(".SDPT_navTwo b:eq(0)").css("border-bottom-color","#ededed");
	/*选择行*/
	$(".SDPT_navOne b").click(function(){
		$(".SDPT_navOne b").css("color","#9ca2ae");
		$(this).css("color","#ffffff");
		SDPT_navOneb=$(this).index(".SDPT_navOne b");
		SDPT_display=4*SDPT_navOneb+SDPT_navTwob;
		$(".SDPT_display").hide();
		$(".SDPT_display:eq("+SDPT_display+")").show();
		})
	/*选择类型*/
	$(".SDPT_navTwo b").click(function(){
		$(".SDPT_navTwo b").css("border-bottom-color","#d3d3d1");
		$(this).css("border-bottom-color","#ededed");
		SDPT_navTwob=$(this).index(".SDPT_navTwo b");
		SDPT_display=4*SDPT_navOneb+SDPT_navTwob;
		$(".SDPT_display").hide();
		$(".SDPT_display:eq("+SDPT_display+")").show();
		})
	})