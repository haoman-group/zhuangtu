<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title>买家中心－我的收藏</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"></script>
</head>
<body>
<!--背景容器-->
<template file="common/_top.php"/>
<template file="Buyer/common/_search.php"/>
<!--内容-->
<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
  <template file="Buyer/common/_head.php"/>
        <div class="collection_wrap right">

            <div class="collection_title clearfix">
                <a href="{:U('collection')}" class="on collectionBaby left">宝贝收藏</a>
                <a href="{:U('collshop')}" class="collectionStore left">店铺收藏</a>
                <a class="manage right" href="###">批量管理</a>
                <div class="right hiddenbtn ">
                    <p class="delate right">删除</p>
                    <label for="allactive" class="allactive right"><input type="checkbox" id="allactive" />全选</label>
                </div>
            </div>
            <ul class="collection_baby clearfix">
                <volist name="product" id="vo">
                <li class="left" data-proid="{$vo.id}" data-userid = <?php echo $uid; ?> >
                    <em></em>
                    <div class="shadow"><i></i><input type="checkbox" hidden /></div>
                    <a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><img class="headpic" src={$vo['headpic']} alt="" /></a>
                    <a href="{:U('Shop/Product/show',array('id'=>$vo['id']))}"><p title="{$vo['title']}"><img src="{$config_siteurl}statics/zt/images/collection/footprint.png" alt="" />{$vo['title']}</p></a>
                    <p>￥{$vo.min_price}<del>￥{$vo.max_price}</del></p>
                </li>
                </volist>
            </ul>
            <div class="pages">
                <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="###" class="jump">确定</a></if>
            </div>
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
            $(".collection_baby li").mouseover(function(){
                $(".manage").hasClass("on") ? $(this).find("em").hide() : $(this).find("em").show()
            })
        }else{
            $(this).html("批量管理");
            $(".shadow").hide();
            $(".hiddenbtn").hide();
            $(".collection_baby li").hover(function(){
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
        var useid = $(".shadow input:checked").parents("li").attr("data-userid");
        var proidarr = [];
        $.each(proid,function(i,v){
            proidarr.push($(v).attr("data-proid"));
        });
        $.ajax({
            type:"POST",
            url:"/App/Batch/prodelete",
            dataType:"json",
            data:{'productid':proidarr.toString(),'uid':useid},
            success:function(data){
                if(data.status == 1){
                    layer.msg('删除成功');
                    $(".shadow input:checked").parents("li").remove();
                }
            },
            error:function(){

            }
        });

    });

    // 单个删除商品

    $(".collection_baby li").find("em").click(function(){
        var $that = $(this);
        var proid = $(this).parents("li").attr("data-proid");
        var useid = $(this).parents("li").attr("data-userid");
        layer.confirm("是否从收藏夹删除?",{
                btn:['确认','取消']
            },
            function(){
              layer.closeAll();
              $.ajax({
                  type:"POST",
                  url:"/App/Batch/singledel",
                  dataType:"json",
                  data:{'productid':proid,'uid':useid},
                  success:function(data){
                      if(data.status == 1){
                          layer.msg('删除成功');
                          $that.parent("li").remove();
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
