var i;
var content1_con22;
var content1_con221b;
var content1_con2221b;
var content1_con2221b1;
var content1_con2221b2;
var content1_con2221b3;
var content1_con22b=new Array();
var content1_con22B=new Array();
var content1_con2231=new Array();
$(document).ready(function(){
	/*辅材购买*/
	for(i=0;i<1000;i++){
		content1_con22b[i]=-1;
		content1_con22B[i]=-1;
		content1_con2231[i]=1;
		}
	/*分类*/
	$(".content1_con221 b").click(function(){
		content1_con221b=$(this).index(".content1_con221 b");
		content1_con2221b2=content1_con221b*3;
		$(".content1_con2221 b:eq("+content1_con2221b2+")").find("img").show();
		$(".content1_con221 b:eq("+content1_con221b+")").find("img").show();
		$(".content1_con2231 strong:eq("+content1_con221b+")").html(1);
		$(".content1_con2231 strong:eq("+content1_con221b+")").css("color","#c8000b");
		$(".content1_con22:eq("+content1_con221b+")").css("background-color","#efeeed");	
		if(content1_con22B[content1_con221b]==2){
			for(i=0;i<3;i++){
			  content1_con2221b2=content1_con221b*3+i;
			  $(".content1_con2221 b:eq("+content1_con2221b2+")").find("img").hide();
			  }
			$(".content1_con221 b:eq("+content1_con221b+")").find("img").hide();
			$(".content1_con2231 strong:eq("+content1_con221b+")").html(0);
		    $(".content1_con2231 strong:eq("+content1_con221b+")").css("color","#7d7d7d");
			content1_con2231[content1_con221b]=1;
		    $(".content1_con22:eq("+content1_con221b+")").css("background-color","transparent");
			content1_con22B[content1_con221b]=1;
			content1_con22b[content1_con221b]=-1;
			}
		else{
			content1_con22B[content1_con221b]=2;
		    content1_con22b[content1_con221b]=0;
			}		
		})
	/*品牌*/
	$(".content1_con2221 b").click(function(){
		content1_con2221b=$(this).index(".content1_con2221 b");
		content1_con2221b1=parseInt(content1_con2221b/3);
		content1_con2221b3=content1_con2221b%3;
		if(content1_con22B[content1_con2221b1]==1){
		content1_con22b[content1_con2221b1]=-1; }
		for(i=0;i<3;i++){
			content1_con2221b2=content1_con2221b1*3+i;
			$(".content1_con2221 b:eq("+content1_con2221b2+")").find("img").hide();
			}
		$(".content1_con2221 b:eq("+content1_con2221b+")").find("img").show();
		$(".content1_con221 b:eq("+content1_con2221b1+")").find("img").show();
		$(".content1_con2231 strong:eq("+content1_con2221b1+")").html(1);
		$(".content1_con2231 strong:eq("+content1_con2221b1+")").css("color","#c8000b");
	    $(".content1_con22:eq("+content1_con2221b1+")").css("background-color","#efeeed");
	    content1_con22B[content1_con2221b1]=2;
		if(content1_con2221b3==content1_con22b[content1_con2221b1]){
			$(".content1_con2221 b:eq("+content1_con2221b+")").find("img").hide();
		    $(".content1_con221 b:eq("+content1_con2221b1+")").find("img").hide();
		    $(".content1_con2231 strong:eq("+content1_con2221b1+")").html(0);
		    $(".content1_con2231 strong:eq("+content1_con2221b1+")").css("color","#7d7d7d");
		    content1_con2231[content1_con2221b1]=1;
		    $(".content1_con22:eq("+content1_con2221b1+")").css("background-color","transparent");
			content1_con22B[content1_con2221b1]=1;
			}
		content1_con22b[content1_con2221b1]=content1_con2221b%3;
		})
	/*数量*/
	$(".content1_con2232").click(function(){
		content1_con22=$(this).index(".content1_con2232");
		if(content1_con22B[content1_con22]==2){
			content1_con2231[content1_con22]=content1_con2231[content1_con22]+1;
		    $(".content1_con2231 strong:eq("+content1_con22+")").html(content1_con2231[content1_con22]);
			}
		})
		$(".content1_con2233").click(function(){
		content1_con22=$(this).index(".content1_con2233");
		if(content1_con22B[content1_con22]==2){
			if(content1_con2231[content1_con22]>1)
			content1_con2231[content1_con22]=content1_con2231[content1_con22]-1;
		    $(".content1_con2231 strong:eq("+content1_con22+")").html(content1_con2231[content1_con22]);
			}
		})
	$(".content1_con22").mouseenter(function(){
		$(this).css("background-color","#efeeed");
		})
	$(".content1_con22").mouseleave(function(){
		content1_con22=$(this).index(".content1_con22");
		if(content1_con22B[content1_con22]!=2){
		$(this).css("background-color","transparent");
		}
		})
	})