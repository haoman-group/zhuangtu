<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8">
    <title>买家中心－我的消息</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<template file="Buyer/common/_search.php"/>
<!--内容-->
<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
  <template file="Buyer/common/_head.php"/>
        <div class="message_wrap right">
            <h5>我的消息<span>[共<i> 31 </i>条]</span></h5>
            <div class="message_details clearfix">
                <div class="message_line"></div><p class="date">[2016-04-12]</p>
                <div class="message_logistics clearfix">
                    <h4>装途物流：<span>你购买的宝贝有新的动态</span><div class="message_delete">删除此条消息</div></h4>
                    <a href="">
                        <img src="{$config_siteurl}statics/zt/images/message/shop.jpg" alt="" />
                        <p>订单号：170843728****002</p>
                        <p>卖家已发货</p>
                        <p>去看看</p>
                    </a>                    
                </div>
                <div class="message_logistics clearfix">
                    <h4>装途物流：<span>你购买的宝贝有新的动态</span><div class="message_delete">删除此条消息</div></h4>
                    <a href="">
                        <img src="{$config_siteurl}statics/zt/images/message/shop.jpg" alt="" />
                        <p>订单号：170843728****002</p>
                        <p>卖家已发货</p>
                        <p>去看看</p>
                    </a>                    
                </div>
            </div>

            <div class="message_details clearfix">
                <div class="message_line"></div><p class="date">[2016-04-12]</p>
                <div class="message_logistics clearfix">
                    <h4>装途物流：<span>你购买的宝贝有新的动态</span><div class="message_delete">删除此条消息</div></h4>
                    <a href="">
                        <img src="{$config_siteurl}statics/zt/images/message/shop.jpg" alt="" />
                        <p>订单号：170843728****002</p>
                        <p>卖家已发货</p>
                        <p>去看看</p>
                    </a>                    
                </div>
            </div>
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
</body>
</html>
