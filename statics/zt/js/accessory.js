/**
 * Created by yfzhang on 5/18/16.
 */
$(function(){
    $(".submartclassli .chconli").each(function(){
        var num = $(this).find(".floor").length;
        var str = "<ul class='msg'>";
        for(i = 0; i < num; i++){
            str = str + "<a><span>"+(i+1)+"F</span><em>"+$(this).find(".floor").eq(i).find("strong").html()+"</em></a>";
        }
        str =  str + "</ul>";
        $(this).append(str);
    })

    $(document).scroll(function(){
        $(".submartclassli .msg").each(function(i,v){
            var height = -$(this).height()/2;
            $(this).css("margin-top",height);
        })
        var top = $(".submartclassli").offset().top + 20;
        var bottom = top + $(".submartclassli").height();

        if( $(document).scrollTop() > top && $(document).scrollTop() < bottom){
            $(".submartclassli .msg").show();
        }
        else {
            $(".submartclassli .msg").hide();
        }
        var num = $(".submartclassli .floor").length;
        for(i = 0; i < num ;i++){
            var height = $(".submartclassli .floor").eq(i).offset().top - 10;
            var j = (i+1);
            var heightnext;
            if(i < num-1){
                heightnext = $(".submartclassli .floor").eq(j).offset().top - 10;
            }
            else {
                heightnext = height + $(".submartclassli .floor").eq(i).height() - 10;
            }
            var $a = $(".submartclassli .msg a").eq(i);
            if(height<$(document).scrollTop()){
                $a.addClass("on").siblings().removeClass("on");
            }else{
                $a.removeClass("on");
            }
        }

    });
    $(".submartclassli .floor").each(function(i,v){
        var id = "floor"+i;
        $(this).attr("id",id);
    });
    $(".submartclassli .msg a").each(function(i,v){
        var href = "#"+"floor"+i;
        $(this).attr("href",href);
    });
    $(".submartclassli .title a").each(function(i,v){
        var href = "#"+"floor"+i;
        var $self = $(this);
        $(this).attr("href",href);
    });

    $("table em").click(function(){
        $(this).toggleClass("on").siblings().removeClass("on");
        var $tr = $(this).closest("tr");
        var num = $tr.index(".submartclassli table tbody tr");
        tabletron(num);
    });
    $("table tr td:nth-of-type(4) span a").click(function(){
        var $spana = $(this).closest("span").find("a");
        var $input = $(this).parent().siblings("input");
        var $tr = $(this).closest("tr");
        var $td_price = $tr.find("td").eq(2).find('.price');
        var $td_amount = $tr.find("td").eq(4).find('.price');
        var judge = $spana.index(this)==0;
        var num = $input.val();
        if(judge){
            num--;
            if (num >= 0) {
                changeSubMart(-1, $td_price.html());
            }
            if(num < 0){ num = 0;}
        }
        else{
            if ($tr.hasClass("on")) {
                changeSubMart(1, $td_price.html());
            }
            num++;
        }
        if($tr.hasClass("on")){
            $input.val(num);
            $td_amount.html(totalPricePerItem(+num, $td_price.html()));
        }
    });

    jQuery.focusblur = function(focusid) {
        var focusblurid = $(focusid);
        var count_val;
        focusblurid.focus(function(){
            count_val = $(this).val();
        });
        //focusblurid.blur(function(){
        //    var modified_val = $(this).val();
        //    changeSubMart(+modified_val-count_val, $(this).closest("tr").find("td").eq(2).find(".price").html());
        //});
        focusblurid.keyup(function(){
            var modified_val = $(this).val();
            $tr= $(this).closest("tr");
            if ($tr.hasClass("on")) {
                $td_price = $tr.find("td").eq(2).find(".price");
                changeSubMart(+modified_val-count_val, $td_price.html());
                $tr.find("td").eq(4).find(".price").html(totalPricePerItem(+modified_val, $td_price.html()));
            }
            count_val = modified_val;
        });
    }
    $.focusblur("table tr td:nth-of-type(4) input");

    $(".btnaccessorycart").click(function() {
        addAccessoryToCart();
    } );
    $(".btnaccessorybuy").click(function() {
        addAccessoryToCart(locationtolists());
    });

    function addAccessoryToCart(fnback) {
        $pro_tr = $(".submartclassli table tbody").find("tr.on");
        var products = [];
        $pro_tr.each(function() {
            var num = +$(this).find("td").eq(3).find(".count").val();
            if (num <= 0) {
                products.length = 0;
                return false;
            }

            var proid = $(this).attr('data-product-id');
            var proindex = $(this).attr('data-product-index');
            var price = accessory_details[proid]['brand'][proindex]['price'];
            products.push({"id":proid,"price":price,"num":num,"proindex":proindex});
        });
        if (products.length <= 0) {
            alert("请选择你所需要辅材的数量");
        } else {
            addcart(products, fnback);
            $pro_tr.each(function() {
                $(this).find("td").eq(3).find(".count").val(0);
                $(this).find("td").eq(1).find(".on").each(function(){
                    $(this).removeClass("on");
                });
                $(this).removeClass("on");
                var $submart = $(".submartpay tbody tr");
                var amount = 0;
                $submart.find('#order_count').html(0);
                $submart.find('#order_amount').html(amount.toFixed(2));
            });
        }
    }

    function addcart(objpro,fnback){
        $.ajax({
            type:"POST",
            url: "/Buyer/Cart/api",
            dataType:"json",
            data: {"act":"add","objpro":objpro},
            timeout:5000,
            success: function(data,status){
                if(data.status==1){
                    if(!!$.cookie("cartproid")){
                        $.cookie("cartproid", $.cookie("cartproid")+","+objpro.id,{path:"/"});
                    }
                    else{
                        $.cookie("cartproid",objpro.id,{path:"/"});
                    }
                    if(fnback){
                        fnback();
                    }
                    else{
                        layer.msg("添加成功!");
                        freshpubcart();
                    }
                }
                else{
                    console.log(data.msg);
                    alert("失败"+data.msg);
                }
            }
            ,error:function(XHR, textStatus, errorThrown){
                console.log(textStatus+"\n"+errorThrown);
            }
        });
    }

    function locationtolists(){
        window.location="/buyer/cart/lists";
    }
    function totalPricePerItem(count, unit_price) {
        var price = +unit_price.replace("￥", "");
        var orig_value = 0;
        return "￥" + (count * price >= 0 ? (count * price).toFixed(2) : orig_value.toFixed(2));
    }
    function changeSubMart(count, unit_price) {
        var $submart = $(".submartpay tbody tr");
        if ($submart) {
            //处理unit price, 原始unit_price 包含￥符号，由于只有选中品牌和规格之后，才可以变化数量，所以肯定不会有-符号
            var price = +unit_price.replace("￥", "");
            var orig_count = $submart.find("#order_count").html();
            var orig_price = $submart.find("#order_amount").html();
            if (!isNaN(orig_count) && !isNaN(orig_price)) {
                var amount = 0;
                $submart.find('#order_count').html((+orig_count + count > 0) ? (+orig_count + count) : 0);
                $submart.find('#order_amount').html((+orig_price + count * price > 0) ? (+orig_price + count * price).toFixed(2) : amount.toFixed(2));
            }
        }
    }
    function tabletron(i){
        var $tr = $(".submartclassli table tbody tr").eq(i);
        var $td_brand = $tr.find("td").eq(1).find(".on");
        var $td_price = $tr.find("td").eq(2).find(".price");
        var $td_count = $tr.find("td").eq(3).find(".count");
        var $td_amount = $tr.find("td").eq(4).find(".price");
        var judge_brand = $td_brand.length;
        var product_id = $tr.attr('data-product-id');
        if(judge_brand){
            // 品牌和规格都选中，显示确定价格, 并添加辅材id到tr上
            var product_index = $td_brand.attr('data-brand-id');
            var accessory = accessory_details[product_id]['brand'][product_index];
            if (accessory['price']) {
                // 如果之前就选中辅材则改变总价
                if (+$td_count.val() > 0) {
                    changeSubMart(-$td_count.val(), $td_price.html());
                } else {
                    $td_count.val(1);
                }
                $td_price.html('￥' + parseFloat(accessory['price']).toFixed(2));
                changeSubMart(+$td_count.val(), $td_price.html());
                $td_amount.html(totalPricePerItem(+$td_count.val(), $td_price.html()));
                $tr.addClass("on");
                $tr.attr('data-product-index', product_index);
            }
            $td_count.removeAttr("readonly");
        }
        else {
            $tr.removeClass("on");
            // 品牌和规格没有同时选中，价格显示为一个范围
            if (+$td_count.val() > 0) {
                changeSubMart(-$td_count.val(), $td_price.html());
            }
            var min_price = parseFloat(accessory_details[product_id]['min_price']);
            var max_price = parseFloat(accessory_details[product_id]['max_price']);
            $td_price.html('￥' + (min_price == max_price ? min_price.toFixed(2) : min_price.toFixed(2) + " - ￥" + max_price.toFixed(2)));
            $td_count.val(0);
            $td_count.attr("readonly", "readonly");
            $td_amount.html(totalPricePerItem(+$td_count.val(), $td_price.html()));
        }
    }

    $(window).scroll(function(){
        if($(this).scrollTop()<= $(".bot_pro_content")[0].offsetTop-$(this).height()
        && $(this).scrollTop()>= $(".submartclassli")[0].offsetTop) {
            // if(!$(".submartpay").hasClass("fixedsubmartbtn")) {
                $(".submartpay").addClass("fixedsubmartbtn");
            // }
        }else {
            // if($(".submartpay").hasClass("fixedsubmartbtn")) {
                $(".submartpay").removeClass("fixedsubmartbtn");
            // }
        }
        if($(this).scrollTop()<= $(".bot_pro_content")[0].offsetTop-$(this).height()
            && $(this).scrollTop()>= $(".submartclassli")[0].offsetTop){
            $(".submartclassul").addClass("fixedsubmartclassul").slideDown();
        }
        else{
            $(".submartclassul").removeClass("fixedsubmartclassul");
        }
    })

})
