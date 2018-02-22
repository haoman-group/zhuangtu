<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8">
    <title>买家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<template file="Buyer/common/_search.php"/>
<!--内容-->
<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
  <template file="Buyer/common/_head.php"/>
    <div class="BuyingShop_wrap right">
        <div class="BuyingShop_title"><h5>购买过的店铺</h5></div>
        <volist name="shops" id="data">
        <div class="BuyingShop_content clearfix">
            <div class="contentLeft left">
                <img class="store_logo" src="{$data.shopinfo.logo}" alt="" />
                <h4><span>{$data.shopinfo.name}</span><img src="{$config_siteurl}statics/zt/images/BuyingShop/store.png" alt="" /></h4>
                <p>{$data.shopinfo.addr}</p>
                <div><a href=""><img class="chat" src="{$config_siteurl}statics/zt/images/BuyingShop/chat.png" alt="" /></a>
                    <a href="javascript:void(0);" class="coller"  data-shop="{$data.shopinfo.id}">
                        <strong  >收藏店铺</strong></a><input type="button" value="删除"  class="deleshop" data-shop="{$data.shopinfo.id}" />
                </div>
            </div>
            <div class="contentRight right">
               <volist name="data['product']" id="wo">
                <a href="{:U('Shop/Product/show',array('id'=>$wo['id']))}"><img src="{$wo.headpic}" alt="" /></a>
                <!--<img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />-->
              </volist>
            </div>
        </div>
        </volist>
       <!-- <div class="BuyingShop_content clearfix">
            <div class="contentLeft left">
                <img class="store_logo" src="{$config_siteurl}statics/zt/images/BuyingShop/store.jpg" alt="" />
                <h4><span>科勒马桶河西居然店asftgredyhrtyuy</span><img src="{$config_siteurl}statics/zt/images/BuyingShop/store.png" alt="" /></h4>
                <p>太原市居然之家河西店</p>
                <div><img class="chat" src="{$config_siteurl}statics/zt/images/BuyingShop/chat.png" alt="" /><strong>已收藏</strong><input type="button" value="删除"/></div>
            </div>
            <div class="contentRight right">
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
            </div>
        </div>
        <div class="BuyingShop_content clearfix">
            <div class="contentLeft left">
                <img class="store_logo" src="{$config_siteurl}statics/zt/images/BuyingShop/store.jpg" alt="" />
                <h4><span>科勒马桶河西居然店asftgredyhrtyuy</span><img src="{$config_siteurl}statics/zt/images/BuyingShop/store.png" alt="" /></h4>
                <p>太原市居然之家河西店</p>
                <div><img class="chat" src="{$config_siteurl}statics/zt/images/BuyingShop/chat.png" alt="" /><strong>取消收藏</strong><input type="button" value="删除"/></div>
            </div>
            <div class="contentRight right">
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
                <img src="{$config_siteurl}statics/zt/images/BuyingShop/store1.jpg" alt="" />
            </div>
        </div>-->
    </div>
    <div class="clear"></div>
</div>
<!--尾部-->
  <template file="common/_promise.php"/>
  <template file="common/_footer.php"/>
<script type="text/javascript">

    $(".addbtn").click(function() {
        layer.open({
            type:2,
            title: false,
            closeBtn: 0,
            scrollbar: false,
            area: ['700px','460px'],
            shadeClose: true,
            content: "{:U('addAddr')}",
        });
    });
    $(function(){
        $(".btndelete").click(function(){
            var dataid= $(this).attr("data-id");
            $.ajax({
                type : "POST",
                url : '{:U("Api/Selleraddr/delete")} ',
                async : false,
                dataType : "json",
                timeout : 5000,
                data : {"id": dataid },
                success : function(result) {
                    console.log("zheshitishiyu"+result.msg);
                    $(this).parents(".address_list").remove();
                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    console.log(XMLHttpRequest.status + "|"
                        + XMLHttpRequest.readyState + "|" + textStatus);
                }
            });

            return false;
        });


  

    });

</script>
<script>
 $(function(){
 $(".deleshop").click(function(){
     var $this =($(this));
//     console.log($this.parents(".BuyingShop_content"));
     var shopid=$(this).attr('data-shop');
     $.ajax({
         type:"POST",
         url:'{:U("Buyer/User/delebuyshop")}',
         dataType:'json',
         data:{'shopid':shopid},

         success:function(data){
             if(data.status == 1){

                 $this.parents(".BuyingShop_content").remove();

             }else{

             }
         }

     },'json');

 });

 });
</script>
<script>
    $(function(){
        $(".coller").click(function(){
            $this = $(this);
            var shopid=$(this).attr("data-shop");
            $.ajax({
                type:"POST",
                url:'{:U("Buyer/User/collbuyshop")}',
                dataType:'json',
                data:{'shopid':shopid},

                success:function(data){
                    if(data.status == 1){

                        $this.parents(".BuyingShop_content").remove();

                    }else{

                    }
                }

            });
        })
    });




</script>
</body>
</html>
