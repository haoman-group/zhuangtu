<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
    <title>买家中心－我的足迹</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>
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
    <div class="footprint_wrap right">
        <div class="footprint_title" >
            <h5 class="left">我的足迹</h5>
            <!-- <p class="delate right">批量删除</p> -->
            <a class="manage right" href="###">批量管理</a>
            <div class="right hiddenbtn ">
                <p class="delate right">删除</p>
                <label for="allactive" class="allactive right"><input type="checkbox" id="allactive" />全选</label>
            </div>
        </div>
        <ul class="footprint_baby clearfix">
          <volist name="products" id="vo">
           <volist name="{vo}"  id="date">
            <li data-proid="{$date.id}">
              <if condition ="$i == 1 ">
                <h5><span>{$date.time}</span>浏览过<?php echo count($vo);?>件宝贝</h5>
              </if>
                <em></em>
                <div class="shadow"><i></i><input type="checkbox" hidden /></div>
                <a href="{:U('Shop/Product/show',array('id'=>$date['id']))}">
                <img src="{$date.headpic}" alt="" />
                <p>￥{$date.min_price}<del>￥{$date.max_price}</del></p>
                <p>{$date.title}</p>
                </a>
            </li>
           </volist>
          </volist>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<!--尾部-->
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
<script type="text/javascript">
$(function(){

    // 批量删除商品

    $(".manage").click(function(){
        $(this).toggleClass("on");
        if($(this).hasClass("on")){
            $(this).html("取消管理");
            $(".shadow").show();
            $(".hiddenbtn").show();
            $(".footprint_baby li").mouseover(function(){
                $(".manage").hasClass("on") ? $(this).find("em").hide() : $(this).find("em").show()
            })
        }else{
            $(this).html("批量管理");
            $(".shadow").hide();
            $(".hiddenbtn").hide();
            $(".footprint_baby li").hover(function(){
                $(this).find("em").show();
            },function(){
                $(this).find("em").hide();
            });
            $(".shadow").removeClass("on");
        }
    });

    $(".shadow").click(function(){
        var hason = $(this).hasClass("on");
        $(this).toggleClass("on");
        $(this).find("input").prop("checked",!hason);

    });

    $(".allactive").find("input").click(function(){
        var hason = $(this).hasClass("on");
        $(this).toggleClass("on");
        !hason ? $(".shadow").addClass("on").find("input").prop("checked",true) : $(".shadow").removeClass("on").find("input").removeProp("checked",false);
    });

    $(".delate").click(function(){
        var proid = $(".shadow input:checked").parents("li");
        var proidarr = [];
        $.each(proid,function(i,v){
            proidarr.push($(v).attr("data-proid"));
        });
        $.ajax({
            type:"POST",
            url:"/api/Foot/delfoot",
            dataType:"json",
            data:{'productid':proidarr.toString()},
            success:function(data){
                if(data.status == 1){
                    layer.msg('删除成功');
                    $(".shadow input:checked").parents("li").remove();
                    window.location.reload();
                }
            },
            error:function(){

            }
        });

    });

    // 单个删除商品

    $(".footprint_baby li").find("em").click(function(){
        var $that = $(this);
        var proid = $(this).parents("li").attr("data-proid");
        layer.confirm("是否从收藏夹删除?",{
                btn:['确认','取消']
            },
            function(){
              layer.closeAll();
              $.ajax({
                  type:"POST",
                  url:"/api/Foot/delfoot",
                  dataType:"json",
                  data:{'productid':proid},
                  success:function(data){
                      if(data.status == 1){
                          layer.msg('删除成功');
                          $that.parent("li").remove();
                          window.location.reload();
                      }
                  },
                  error:function(){

                  }
              });
            },
            function(){

            }
        );
    });


})

</script>

</body>
</html>
