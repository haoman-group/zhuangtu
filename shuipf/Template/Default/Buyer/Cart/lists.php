<!doctype html>
<html>
<head>
     <meta charset="utf-8">
     <title>购物车</title>
     <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
     <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
     <!--[if lt IE 9]>
     <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
     <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
     <![endif]-->
     <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
     <script src="{$config_siteurl}statics/zt/js/base.js"></script>
     <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
     <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
     <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>

</head>

<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>

<!--购物车-->
<div class="container shoppingcart">

     <ul class="col" name="countall">
          <li <empty name="_GET['type']">class="on"</empty> name="cart"><a href="{:U('lists')}">全部商品</a><span>{$countall}</span></li>
          <li >降价商品<span></span></li>
          <li >库存紧张<span></span></li>
          <li data-type="1" <if condition="$_GET['type'] eq 1">class="on" </if> name="cart"><a href="{:U('lists',array('type'=>1))}">设计类</a><if condition="$cat['1'] eq ''"><span></span><else/><span ></span></if></li>
          <li data-type="2" <if condition="$_GET['type'] eq 2">class="on" </if> name="cart"><a href="{:U('lists',array('type'=>2))}">工人类</a><if condition="$cat['2'] eq ''"><span></span><else/><span ></span></if></li>
          <li data-type="3" <if condition="$_GET['type'] eq 3">class="on" </if> name="cart"><a href="{:U('lists',array('type'=>3))}">主材类</a><if condition="$cat['3'] eq ''"><span></span><else/><span ></span></if></li>
          <li data-type="4" <if condition="$_GET['type'] eq 4">class="on" </if> name="cart"><a href="{:U('lists',array('type'=>4))}">家具类</a><if condition="$cat['4'] eq ''"><span></span><else/><span ></span></if></li>
          <li data-type="5" <if condition="$_GET['type'] eq 5">class="on" </if> name="cart"><a href="{:U('lists',array('type'=>5))}">电器类</a><if condition="$cat['5'] eq ''"><span></span><else/><span ></span></if></li>
          <li>软装类<span></span></li>
     </ul>
     <form id="form" action="{:U('orderconfirm')}" method="post">
          <div class="details">
               <ul class="title">
                    <li><em class="chkallshop"><img src="{$config_siteurl}statics/zt/images/buyercenter/greychoose.png"></em><input type="checkbox" class="inptem ">全选</li>
                    <li>商品信息</li>
                    <li>单价（元）</li>
                    <li>数量</li>
                    <li>金额（元）</li>
                    <li>操作</li>
               </ul>

               <volist name="data" id="vo">
               <div class="product">
                    <h6>
                         <em class="chkallinshop"><img src="{$config_siteurl}statics/zt/images/buyercenter/greychoose.png"></em><input type="checkbox" class="inptem ">
                         <a class="shop" href="">店铺：{$vo.shop.name}</a>
                         <a class="btnopenserviceim needlogin"  data-imurl="{:U('Member/Chat/index',array('shopid'=>$vo['shop']['id'],'productid'=>$vo['proid']))}">联系卖家</a>
                        <!-- <i data-imurl="{:U('Member/Chat/index',array('shopid'=>$shopInfo['id'],'productid'=>$id))}" class="btnopenserviceim " ></i>-->
                         <a class="address" href="">{$vo.shop.addr}</a>
                         <a class="phone" href="">{$vo.shop.phone}</a>
                    </h6>
                    <volist name="vo[cart]" id="cart">
                      <ul data-id="{$cart['id']}" data-proid="{$cart[product][id]}">
                           <li><em><img src="{$config_siteurl}statics/zt/images/buyercenter/greychoose.png"></em><input type="checkbox" name="cartid[]" value="{$cart['id']}" class="inptem" data-cartid="{$cart['id']}"><img class="img" src="{$cart['product']['headpic']}"></li>
                           <li>
                          <span class="inline">
                              <p><a href="{:U('Shop/Product/show',array('id'=>$cart['product']['id']))}" target="_blank">{$cart['product']['title']}</a></p>
                              <div class="ensure">
                                   <a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/ensure1.png"></a>
                                   <a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/ensure2.png"></a>
                                   <a href=""><img src="{$config_siteurl}statics/zt/images/buyercenter/ensure3.png"></a>
                              </div>
                          </span>
                          <span class="inline">
                            <volist name="cart[product][provalue]" id="provalue">
                              <?php if($key=='price'|| $key=='price_act') break; ?>
                              {$key}：{$provalue['txt']}<br/>
                            </volist>
                          </span>
                           </li>
                           <li>
                                <del><?php echo number_format((float)($cart[product][provalue]['price']),2); ?></del>
                                <span class="price" data-price="<?php echo (float)($cart[product][provalue]['price_act']); ?>"><?php echo number_format((float)($cart[product][provalue]['price_act']),2); ?></span>
                                <select>
                                     <option>卖家促销</option>
                                </select>
                           </li>
                           <li>
                                <div class="num">
                                     <a href="javascript:void(0)" class="btnopbuynum">-</a>
                                     <input type="text" class="inptxt inpnum" maxlength="3" data-orival="{$cart['num']}" value="{$cart['num']}">
                                     <a href="javascript:void(0)" class="btnopbuynum add">+</a>
                                </div>
                           </li>
                           <li class="total">{$cart[total]}</li>
                           <li>
                              <p><if condition="$cart['collected'] eq 0"><a class="btntofav" href="javascript:void(0)">加入收藏夹</a><else/><a class="btntofav on" href="javascript:void(0)">取消收藏</a></if></p>
                              <p><a class="btntoaddr" href="javascript:void(0)">我要去实体店</a></p>
                              <p><a class="btndel" href="javascript:void(0)">删除</a></p>
                           </li>
                      </ul>
                    </volist>

               </div>
               </volist>

          </div>
          <div class="paycontainer">
            <dl class="pay">
                 <dt>
                      <em class="chkallshop"><img src="{$config_siteurl}statics/zt/images/buyercenter/greychoose.png"></em><input type="checkbox" class="inptem"><label>全选</label>
                      <a href="javascript:void(0)" class="delall">删除</a>
                      <a href="javascript:void(0)" class="tofavall">加入收藏夹</a>
                 </dt>
                 <dd>
                      <span>已选商品 <strong class="totnum">0</strong> 件</span>
                      <span>合计（不含运费）: <strong class="zongjia">￥0 </strong></span>

                      <input type="submit"  class="btntoconfirm" value="结算">
                 </dd>
            </dl>
          </div>
     </form>

</div>

<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>


<!--浮框-->
<div class="zt_fixed popstoreaddr">
     <span class="close"></span>
     <div class="content center">
          <h6>商家的实体店地址和联系方式已发送至您的装途<p>网手机app，可通过手机导航去实体店</p></h6>
          <p class="tip">店铺地址：山西省太原市迎泽西大街100号居然之家河西馆3楼201A</p>
     </div>
</div>

<script>

$(function(){
     $(".btntoaddr").click(function(){
          $(".popstoreaddr .tip").html("店铺地址:"+$(this).closest(".product").find(".address").html());
          layer.open({
               type: 1,
               title: false,
               closeBtn: 0,
               skin: 'layui-layer-nobg', //没有背景色
               shadeClose: true,
               content: $('.popstoreaddr')
          });
     });
     $(".popstoreaddr .close").click(function(){
          layer.closeAll();
     });


     $(".chkallshop").click(function(){
          var hason = $(this).hasClass("on");
          if(hason){
               $(".chkallshop").removeClass("on");
               $(".chkallinshop.on").removeClass("on");
               $(".product li em.on").trigger("click");
          }
          else{
               $(".chkallshop").addClass("on");
               $(".chkallinshop:not('.on')").addClass("on");
               $(".product li em:not('.on')").trigger("click");
          }
     })

     $(".chkallinshop").click(function(){
          var hason = $(this).hasClass("on");
          var $proems = $(this).closest(".product").find("li em");
          if(hason){
               $(this).removeClass("on");
               $proems.filter(".on").trigger("click");
          }
          else{
               $(this).addClass("on");
               $proems.not(".on").trigger("click");
          }
     })

     $(".product li em").click(function(){
          var hason = $(this).hasClass("on");
          $(this).toggleClass("on");
          $(this).siblings(".inptem").prop("checked",!hason);
//          var adddec = hason? -1 :1;
//
//          var emnumd = ($(this).closest("ul").find(".total").html());
//          var pronum = $(this).closest("ul").find(".inpnum").val();
//          var zongjia =($(".zongjia").html());
//          emnumd = emnumd * adddec;
//
//          $(".zongjia").html( (parseFloat(emnumd)+parseFloat(zongjia)).toFixed(2));
//          $(".totnum").html(parseInt(adddec)+ parseInt($(".totnum").html()));

          freshcartall();

     })



     $(".btntoconfirm").click(function(){
          if($(".shoppingcart .product li .inptem:checked").length === 0){
               layer.msg("请选择需要加入订单的商品!");
               return false;
          }
     });


     $(".inpnum").change(function(){
          var id = $(this).closest("ul").attr("data-id");
          var nowval = $(this).val();
          if(!/^(\d)+$/.test(nowval)  || parseInt(nowval)<1 ){$(this).val($(this).attr("data-orival"));return false;}
          nowval = parseInt(nowval);

          freshcartone(id);
          freshcartall();

     })

     $(".btnopbuynum").click(function(){
          var id = $(this).closest("ul").attr("data-id");
          var $inpbuynum = $(this).siblings("input[type='text']");
          var buynum = $inpbuynum.val();
          if(isNaN(buynum)) return false;
          buynum = parseInt(buynum);
          var addnum = $(this).hasClass("add")? 1 : -1;
          buynum += addnum;
          if(buynum<1) {buynum=1;addnum=0;}
          if(addnum === 0){return false;}
          $inpbuynum.val(buynum);

          $.ajax({
               type:"POST",
               url: "/Buyer/Cart/api",
               dataType:"json",
               data: {"act":"num","num":buynum,"id":id},
               timeout:5000,
               success: function(result){
                    if(result.status==1){
                         freshcartone(id);
                         freshcartall();
                    }
                    else{
                         alert("失败"+result.msg);
                    }
               }
               ,error:function(xXHR, xtextStatus, xerrorThrown){
                    console.log(xtextStatus+"\n"+xerrorThrown);
               }
          });

          return false;
     });


     function cartdelone(btnobj,triggerflag){
         var $btndel = $(btnobj);
         var $ul = $btndel.closest("ul");
         var $product = $ul.closest(".product");

         $.ajax({
             type:"POST",
             url: "/Buyer/Cart/api",
             dataType:"json",
             data: {"act":"del","id":$ul.attr("data-id")},
             timeout:5000,
             success: function(result){
                 if(result.status==1){
                     if(!triggerflag){
                         layer.msg("删除成功!");
                     }

                     if( $product.find("ul").length === 1 ){
                         $product.remove();
                     }
                     else {
                         $ul.remove();
                     }
                     freshcartall();
                     freshpubcart();
                 }
                 else{
                     layer.msg("删除失败!");
                 }
             }
             ,error:function(XHR, xtextStatus, xerrorThrown){
                 layer.msg("删除失败!");
                 console.log(xtextStatus+"\n"+xerrorThrown);
             }
         });

     }

     $(".delall").click(function(){
         layer.confirm("是否从购物车删除?",{
                 btn:['确认','取消']},
             function(){
                 layer.closeAll();
                 $(".product li .inptem:checked").closest("ul").find(".btndel").trigger("click",true);
             },
             function(){

             });
     })

     $(".btndel").click(function(e,triggerflag){
         var btnobj = this;
         if(!triggerflag){
             layer.confirm("是否从购物车删除?",{
                 btn:['确认','取消']},
                 function(){
                     cartdelone(btnobj,triggerflag);
                 },
                 function(){

                 })
         }
         else{
             cartdelone(btnobj,triggerflag);
         }

     });

     if(!!$.cookie("cartproid")){
          var arproid = $.cookie("cartproid").split(",");
          $.each(arproid,function(i,v){
               var $ul = $("[data-proid='"+v+"']");
               if($ul.length>0){
                    $ul.each(function(ii,vv){
                         var $vv = $(vv);
                         $vv.find("em:not('.on')").trigger("click");
                    })
               }
          })
     }
});

function freshcartone(id){
     $ul= $("ul[data-id='"+id+"']");
     $perprice = $ul.find(".price");
     $pertot = $ul.find(".total");
     $pernum = $ul.find(".inpnum");

     $pernum.attr("data-orival", $pernum.val() );
     $pertot.html( ( parseFloat($perprice.attr("data-price")) * parseInt($pernum.val()) ).toFixed(2) );

}


function freshcartall(){
     var totnum = 0;
     var totprice =0;
     var $ems = $(".product li em.on");

     $ems.each(function(i,v){
          $v = $(v);
          $ul = $v.closest("ul");
          //totnum += parseInt($ul.find("inpnum").val());
          totnum += 1;
          totprice +=   parseFloat( $ul.find(".total").html());
     })

     $(".totnum").html(totnum);
     $(".zongjia").html( '￥' + totprice.toFixed(2) );
}
// 单个移入收藏夹
$('.btntofav').click(function(){
    var $that = $(this);
    var cartid =$(this).parents('ul').attr('data-id');

     if($(this).hasClass("on")){
        layer.confirm("是否取消关注?",{
                btn:['确认','取消']
            },
            function(){
              layer.closeAll();
              $.ajax({
                   type: "POST",
                   url: '{:U("delecatid")}',
                   dataType: "json",
                   data: {"cartid": cartid},
                   success: function (data) {
                        if (data.status == 1) {
                             layer.msg('取消成功');
                             $that.removeClass("on").html("加入收藏夹");

                        } else {
                             layer.msg('取消失败');
                        }
                   }
              });
            },
            function(){

            }
        );
     }else{
        $.ajax({
             type: "POST",
             url: '{:U("hiddencartid")}',
             dataType: "json",
             data: {"cartid": cartid},
             success: function (data) {
                  if (data.status == 1) {
                       layer.msg('加入成功');
                       $that.html("取消收藏").addClass("on");
                  } else {
                       layer.msg('不能重复加入');
                  }
             }

        });
     }
});

// 批量移入收藏夹
$(".tofavall").click(function(){
  var checkedul = $(".product li .inptem:checked").closest('ul');
  var artemp =[];
  $.each(checkedul,function(i,v){
      artemp.push($(v).attr("data-id"));
  });
  var cartid = artemp.toString();
  if(cartid == ''){
      layer.msg('请选择需要加入商品');
  }else{
    $.ajax({
         type: "POST",
         url: '{:U("batchcollection")}',
         dataType: "json",
         data: {"cartid": cartid},
         success: function (data) {
              if (data.status == 1) {

                   layer.msg('加入成功');
                   checkedul.find(".btntofav").addClass("on").html("取消收藏");

              } else {
                   layer.msg('不能重复加入');
              }
         }

    });
  }
});

// 结算栏悬浮按钮
$(document).scroll(function(){
  if($(document).scrollTop() <= $(".paycontainer").offset().top - $(window).height()){
      $(".pay").addClass("fixpay");
  }else{
    $(".pay").removeClass("fixpay");
  }
})

</script>

</body>
</html>
