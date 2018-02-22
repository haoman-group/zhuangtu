var main_leftcon231=1;
$(".main_leftcon231 strong:eq(1)").html(main_leftcon231);
$(document).ready(function(){
	$(".main_leftcon121 img").mouseenter(function(){		
		$(".main_leftcon11 img").attr("src",$(this).attr("src"));
		})
	$(".main_leftcon233:eq(0)").click(function(){
		main_leftcon231=main_leftcon231+1;
		$(".main_leftcon231 strong:eq(1)").html(main_leftcon231);
		})	
    $(".main_leftcon233:eq(1)").click(function(){
		if(main_leftcon231>0)
		main_leftcon231=main_leftcon231-1;
		$(".main_leftcon231 strong:eq(1)").html(main_leftcon231);
		})	
	})