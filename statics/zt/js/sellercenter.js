$(function(){
	$(".seartype a").click(function(){
		$(this).addClass("on").siblings().removeClass("on");
	})

	/*左侧目录*/
	$(".scentermenu dt").click(function(){
		$(this).next("dd").length && $(this).parent().toggleClass("on").siblings().removeClass("on");
	})
	$(".scentermenu dl a:not([href='javascript:void(0)'])").click(function(){
		var index=$(this).closest("dl").index();
		$.cookie("memtopnavon",index,{expires:30,path:"/"});
	})
	if(!!$.cookie("memtopnavon")){
		// console.log($.cookie("memnavon"));
		$(".scentermenu dl").eq($.cookie("memtopnavon")).addClass("on");
	}
	$(".scentermenu dl dd").find("[href='"+window.location.href+"']").parent("dd").addClass("on");
	// $(".scentermenu dl:has([class='on']) dd").click(function(){
	// 	$(this).addClass("on").siblings().removeClass("on");
	// })
	// $(".scentermenu dl:has([class='on']) dd a:not([href='javascript:void(0)'])").click(function(){
	// 	var index=$(this).parent("dd").index();

	// 	$.cookie("memddon",index,{expires:30,path:"/"});
	// })
	// if(!!$.cookie("memddon")){
	// 	console.log($.cookie("memddon"));
	// 	$(".scentermenu dl:has([class='on']) dd").eq($.cookie("memddon")).addClass("on");
	// }
	/*上传宝贝时选择类别*/
	$(".selprocate").click(function(){
		$(".ruletitle").removeClass("dis").removeAttr("disabled");
		$(".selprocatename").html($(this).html());
	})
	/*绑定"清除条件"的事件*/
	$("#searchoptions .reset").click(function(){
		$('#searchoptions :text').each(function(){$(this).attr('value','')});
	});
	/*页面跳转“确定”事件：模拟回车的keydown事件*/
	$(".end .jump").click(function(){
		var e = jQuery.Event("keydown");//模拟一个键盘事件
        e.keyCode = 13;//keyCode=13是回车
        $(".end :text").trigger(e);
        return false;
	});

	/*宝贝规格*/

	$(".acopy").on("copy",function(e){
		var url = $(this).attr("data-prolink");
		e.clipboardData.clearData();
		e.clipboardData.setData("text/plain",   url);
		e.preventDefault();
		$("<div class='msgtip'><div class='mbody'>复制成功</div></div>").appendTo("body").addClass("msgtipon").delay(600).fadeOut(function(){
			$(this).remove();
		});
	})

	  	/*图片移动*/

	$(".jsaddimgul").on("click","li span",function(){
		var $ul1=$(this).parent().parent();
		if($(this).hasClass("sl")){
			var $ul2=$(this).parent().parent().prev("li");
		}
		else {
			var $ul2=$(this).parent().parent().next("li");
		}
		var ulhtml1=$ul1.html();
		var ulhtml2=$ul2.html();
		$ul1.html(ulhtml2);
		$ul2.html(ulhtml1);
		if($ul2.hasClass("noimg")){
			$ul2.removeClass("noimg");
			$ul1.addClass("noimg");
		}


	})
	$(".jsaddimgul").on("click","li a",function(){
		var $li=$(this).parent().parent();
		$li.addClass("noimg");
		$li.empty();
	})


	$(function(){

		var colorclasstable = new Array();
		$(".productdetail_box .colorclass li input[type='checkbox']").click(function(){
			var act= $(this).prop("checked");
			var num=$(this).parent().index(".productdetail_box .colorclass li");
			var hasonechked= $(".colorclass :checked").length;
			if(act){
				$(".productdetail_box .colorclasstable tbody tr").eq(num).show();

			}
			else{
				$(".productdetail_box .colorclasstable tbody tr").eq(num).hide();
			}
			hasonechked ? $(".productdetail_box .colorclasstable").show() :$(".productdetail_box .colorclasstable").hide();
		})
		$(".productdetail_box .rightbox dl .ulchk li").each(function(j, e){
			var $num=$(".productdetail_box .rightbox dl .ulchk li").eq(j);
			var $tr=$(".productdetail_box .colorclasstable tbody tr").eq(j);
			var $chk=$num.find("input[type='checkbox']");
			var $show=$num.find(".color_show");
			var $name=$num.find(".color_name");
			var $input=$num.find(".color_input");
			var id=$num.data("name").toString()+ j.toString();
			var vid=$num.data("vid");
			var txt=$num.data("name");
			var color=colorjson[txt];
			$chk.attr("value",id);
			$chk.attr("data-txt",txt);
			$chk.attr("data-idx",j);
			$chk.attr("data-vid",vid);
			$chk.attr("id",id);
			$show.attr("for",id);
			$name.attr("for",id);
			$show.css("background-color",color);
			$name.html(txt);
			$input.val(txt);
			$tr.find("i").css("background-color",color);
			$tr.find("span").html(txt);
		})

		$(".productdetail_box .rightbox dl .ulchk li [type='text']").change(function(){
			var name=$(this).val();
			var parent=$(this).parent();
			var oldname= parent.attr("data-name");
			$(this).siblings(".color_name").html(name);
			var $sibchk= $(this).siblings("[type='checkbox']");
			parent.attr("data-name",name);
			$("[data-v='"+$(this).siblings("[type='checkbox']")[0].value+"']").html(name);

			var num=$(this).parent().index(".productdetail_box .colorclass li");
			var colortabletr=$(".productdetail_box .colorclasstable tbody tr").eq(num);
			colortabletr.attr("data-name", name);
			colortabletr.children("td").children("span").html(name);
			$(".typesizeclasstable input[type='hidden']").each(function(i,v){
				$(this).val($(this).val().replace(oldname,name));
			});
			$sibchk.val($sibchk.val().replace(oldname,name)).attr("data-txt",name);
		})
		$(".productdetail_box .rightbox dl .ulchk li [type='checkbox']").click(function(){
			var allchk=1;
			var $ulchks=$(".ulchk");
			var act= $(this).prop("checked");
			if(act){
				$(this).parent().addClass("on");
			}
			else{
				$(this).parent().removeClass("on");
			}
			$ulchks.each(function(index, element) {
				allchk = allchk && $(element).find(":checked").length;
			});

			// console.log(allchk);
			if (allchk){
				tbjs.totb();
				$(".productdetail_box .rightbox dl .sizeclatabbox table").show();
				$(".productdetail_box .rightbox dl .sizeclatabbox .propertytip").hide();
			}
			else{
				$(".productdetail_box .rightbox dl .sizeclatabbox table").hide();
				$(".productdetail_box .rightbox dl .sizeclatabbox .propertytip").show();
			}
		})
	})





})
/*宝贝列表操作 针对不同按钮，提交到不同的action去*/
function submitaction(obj){
  $("#listItems").attr('action',$(obj).attr('data-action')).submit();
}
/*填写scenterstatus的问候语*/
$(document).ready(function(){
	var now = new Date(),hour = now.getHours()
	if(hour < 6){$(".scenterstatus").html("凌晨好！")}
	else if (hour < 9){$(".scenterstatus").html("<div class='timetip'>早上好！愿你度过这美好的一天！</div>")}
	else if (hour < 12){$(".scenterstatus").html("<div class='timetip'>上午好！愿你度过这美好的一天！</div>")}
	else if (hour < 14){$(".scenterstatus").html("<div class='timetip'>上午好！愿你度过这美好的一天！</div>")}
	else if (hour < 17){$(".scenterstatus").html("<div class='timetip noon'>下午好！喝杯咖啡放松一下吧！</div>")}
	else if (hour < 19){$(".scenterstatus").html("<div class='timetip noon'>晚上好！喝杯咖啡放松一下吧！</div>")}
	else if (hour < 22){$(".scenterstatus").html("<div class='timetip noon'>晚上好！喝杯咖啡放松一下吧！</div>")}
	else {$(".scenterstatus").html("<div class='timetip noon'>深夜里！喝杯咖啡休息一下吧！</div>")}
})

//根据table内容生成 json数据
function TableToJson(){
	var priceArray = new Array;
	var title = new Array;
	$(".typesizeclasstable thead tr th").each(function(){
		title.push($(this).html());
	});
	//获取val个数
	var valNum = $(".typesizeclasstable thead tr .val").length;
	var temp = new Array;
	var idx_color = '';
	$(".typesizeclasstable tbody tr").each(function(){
		var row = {};
		for(var i = 0; i<valNum ;i++){
			var pval = $(this).children(".val"+i).html();
			if(pval == undefined){
				row[title[i]] = temp[i];
			}else{
				var idx = $(this).children(".val"+i).attr("data-idx");
				if(i === 0){idx_color = idx;}
				var vid = $(this).children(".val"+i).attr("data-vid");
				var txt = $(this).children(".val"+i).html();
				temp[i] = {"idx":idx,"vid":vid,"txt":txt, "listno":i};
				if (title[i] == "颜色分类") {
					var pictures = getPicUrl(idx_color);
					temp[i]["pictures"] = pictures;
				}
				row[title[i]] = temp[i];
			}
		}
		row['price'] = $(this).find(".price").val();
		row['price_act'] = $(this).find(".price_act").val();
		row['quantity'] = $(this).find(".quantity").val();
		row['tsc'] = $(this).find(".tsc").val();
		row['barcode'] = $(this).find(".barcode").val();
		row['hidden_value'] = $(this).find("input[type='hidden']").val();
		// var idx_color = $(this).children(".val0").attr("data-idx");
		priceArray.push(row);
	})
	var json = {};
	for(var i=0;i<priceArray.length;i++)
	{
    	json[i]=priceArray[i];
	}
	// console.log(JSON.stringify(json));
	 $(".priceArray").val(JSON.stringify(json));
	// return JSON.stringify(json);
	return true;
}
//获取颜色图片地址
function getPicUrl(indexOfPic){
	var pics={};
	var index = $(".productdetail_box .colorclasstable tbody tr:eq("+indexOfPic+")").find("img").each(function(i,n){
		pics[i]=$(this).attr("src");
	})
	return pics;
}
