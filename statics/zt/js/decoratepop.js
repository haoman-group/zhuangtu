(function($){
	$.fn.formdynvali = function(options){
		var settings={
			
		};
		
		var opts=$.extend(settings, $.fn.formdynvali.defaults , options);
		
		return this.each(function(){	
			var nowform= this;
			
			$(this).on("blur" , "[type='text']",function(ev){
				valiformele(this);	
			});
			
			$(this).on("click", opts.submbtn? opts.submbtn: "[type='submit']",function(ev){
				console.log(valiformall(nowform));
				if(valiformall(nowform)){
					if(opts.fnsubmit){
						opts.fnsubmit(nowform);
					}
				}

				return false;
			});		
		
		});
		
		
		function valiformele(ele){
			chkfortipid(ele);
			chkerrortip(ele);			
			var $tip=$("[data-tipto = '"+$(ele).attr("data-fortipid")+"' ]");
			postip($tip[0],ele);
			var val = $(ele).val();
			var valtrimed = val.replace(/^\s$/gi,"");
			
			if( !!$(ele).prop("required") && valtrimed.length===0){
				$tip.html($(ele).attr("data-requiretxt")? $(ele).attr("data-requiretxt"):"请填写内容").show();
				return false;
			}
					
			if(!!$(ele).attr("data-minlen") && !isNaN($(ele).attr("data-minlen")) && valtrimed.length<$(ele).attr("data-minlen")  ){
				//console.log("最小长度不符");
				$tip.html("格式不正确").show();
				return false;	
			}
			
			if(!!$(ele).attr("parttern") && !eval($(ele).attr("parttern")).test(valtrimed) ){
				$tip.html("格式不正确").show();
				return false;
			}		
			
			$tip.html("").hide();
			return true;
		}
		
		function postip(tip,ele){
			var pos = GetPosition(ele);
			$(tip).css({"left":pos.left,"top":pos.top-24});
		}
		
		function valiformall(form){
			if($(".formerrortip:visible").length>0){
				console.log("继续改啊!");return false;	
			}
			var need= true;
			$(form).find("[type='text']").each(function(i, e) {
                if(need){
					need = need && valiformele(e);
				}
            });
			if(need){
				console.log("都验证通过了");
				return true;
			}
			else{
				console.log("有错啊");
				return false;
			}
		}
		
		function chkerrortip(ele){
			chkfortipid(ele);
			var fortipid= $(ele).attr("data-fortipid");
			if($("[data-tipto = '"+fortipid+"' ]").length === 0){
				$("body").append("<div class=\"formerrortip\" data-tipto=\""+fortipid+"\"></div>");
			}
		}
		
		function chkfortipid(ele){
			if(!$(ele).attr("data-fortipid")){
				$(ele).attr("data-fortipid", (new Date()).valueOf()+ Math.random());
			}
		}
		
		
		function GetPosition(obj)
		{
			var left = 0;
			var top   = 0;
		
			while(obj !== document.body )
			{
				left +=	obj.offsetLeft;
				top  += obj.offsetTop;
				if(!obj.offsetParent )
				{ obj = document.body;}
				else
				{obj = obj.offsetParent;}	
			}
			return {"left":left,"top":top};
		}
		
		
		$.fn.formdynvali.defaults={};
		
		
				
	};
}(jQuery));


$(function(){
	ifmjusty();

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
		ifmjusty();
	});
	
	$(".focustb").on("click",".btntoupload",function(ev){
		console.log(ev);
	});
	
	$(".focustb").on("click",".btns .del",function(ev){
		var $li= $(this).closest("li");
		$li.remove();
		$(".formerrortip").hide();
	});
	
	$(".focustb").on("click",".btns .up",function(ev){
		var $li= $(this).closest("li");
		if($li.index()===1){console.log("first");return false;}
		$(".formerrortip").hide();
		$li.prev("li").before($li.clone()).end().remove();
	});
	
	$(".focustb").on("click",".btns .down",function(ev){
		var $li= $(this).closest("li");
		if($li.index()===$(".focustb li").length-1){console.log("last");return false;}
		$(".formerrortip").hide();
		$li.next("li").after($li.clone()).end().remove();
	});
	
	$(".btnaddapic .btn").click(function(){
		if($(".focustb li").length>5){
			alert("最多只能添加5张图片");	
		}
		else{
			var strli="<li>"+
"                	<div class=\"td td1\"><input name=\"pic[]\" parttern=\"/^\\d+$/\"  type=\"text\" required  data-requiretxt=\"请上传或选择图片\"> <a href=\"javascript:void(0)\" class=\"btntoupload\"></a></div>"+
"                    <div class=\"td td2\"><input name=\"url[]\" type=\"text\" required></div>"+
"                    <div class=\"td td3 btns\">"+
"                    	<a href=\"javascript:void(0)\" class=\"up\" title=\"上移\"></a>"+
"                        <a href=\"javascript:void(0)\" class=\"down\" title=\"下移\"></a>"+
"                        <a href=\"javascript:void(0)\" class=\"del\" title=\"删除\"></a>"+
"                    </div>"+
"                </li>";
			$(".focustb").append(strli);
		}
	})
	
	$("#focusform").formdynvali({
		"submbtn":".btnok",
		"fnsubmit":function(form){
			var $form= $(form);
			$form.ajaxSubmit({
				"success":function(res){
					if(parseInt(res.status) === 1){

						if(parent){
							parent.cb_moduleedit(1,$form.serializeJson());
						}
					}

				},
				"error":function(res){

				}
			});
		}
	});


	$("#focusform .btncancle").click(function(){
		if(parent){
			parent.cb_moduleedit(0,$("#focusform").serializeJson());
		}
	});

	$(".tabtit li").click(function(){
		if($(this).index()>0){
			$(".formerrortip").hide();
		}
	})

	$(".inpshowtit").click(function(){
		$("[data-byradioid='fochidetit']").show();
	});

	$(".moniradiobox .radio").click(function(){
		if(!$(this).hasClass("on")){
			$(this).addClass("on").siblings(".radio").removeClass("on");
			var $box =$(this).closest(".moniradiobox");
			$box.find("[name='"+$box.attr("data-inpname")+"']").val($(this).attr("data-v"));
		}
	})

	
});

function ifmjusty(){
	$(parent.document.body).find(".popwrap:visible").css("height",(document.body.scrollHeight+29)+"px").find("iframe").css("height",document.body.scrollHeight+"px");
}