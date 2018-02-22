(function($){
	$.fn.formdynvali = function(options){
		var settings={
			tiptag : "i",
			isshowtip : true,
			errorcssname : "error",
			rightcssname : "ok",
			inperrorclass : "inperror",
			fnerror : $.noop
		};
		var _this=this;

		var opts=$.extend(settings, $.fn.formdynvali.defaults , options);

		return this.each(function(){
			var nowform= this;

			$(this).on("blur" , "[type='text']",function(ev){
				valiformele(this);
			});

			var $btnsubmit= opts.submbtn? $(opts.submbtn) : $(this).find("[type='submit']");
			$btnsubmit.on("click",function(ev){
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
			chkerrortip(ele);
			var $tip=$(ele).siblings(opts.tiptag);
			var val = $(ele).val();
			var valtrimed = val.replace(/^\s$/gi,"");

			if( !!$(ele).prop("required") && valtrimed.length===0){
				tiperrorshow("请填写内容",$(ele),$tip);
				return false;
			}

			if(!!$(ele).attr("data-minlen") && !isNaN($(ele).attr("data-minlen")) && valtrimed.length<$(ele).attr("data-minlen")  ){
				tiperrorshow("格式不正确",$(ele),$tip);
				return false;
			}

			if(!!$(ele).attr("parttern") && !eval($(ele).attr("parttern")).test(valtrimed) ){
				tiperrorshow("格式不正确",$(ele),$tip);
				return false;
			}

			$tip.html("").removeClass(opts.errorcssname).addClass(opts.rightcssname).hide();
			$(ele).removeClass("inperror");
			return true;
		}



		function valiformall(form){
			if($(".formerrortip:visible").length>0){
				console.log("继续改啊!");
				return false;
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
			if($(ele).siblings(opts.tiptag).length === 0){
				$("<"+opts.tiptag+">",{"class":"valitip"}).insertAfter(ele);
			}
		}

		function chkfortipid(ele){

		}

		function tiperrorshow(txt,inp,tip){
			opts.fnerror(inp);
			tip.html(opts.isshowtip? txt:"").removeClass(opts.rightcssname).addClass(opts.errorcssname).show();
			inp.addClass(opts.inperrorclass);
		}

		$.fn.formdynvali.defaults={};

	};
}(jQuery));
