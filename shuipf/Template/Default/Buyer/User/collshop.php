<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
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
  <div class="collection_wrap right">
      <div class="collection_title clearfix">
          <a href="{:U('collection')}" class="collectionBaby left">宝贝收藏</a>
          <a href="{:U('collshop')}" class="on collectionStore left">店铺收藏</a>
          <a class="manage right" href="###">批量管理</a>
          <div class="right hiddenbtn ">
              <p class="delate right">删除</p>
              <label for="allactive" class="allactive right"><input type="checkbox" id="allactive" />全选</label>
          </div>
      </div>
      <div class="collection_store clearfix">
        <volist name="shops" id="data">
          <div class="store_content clearfix" data-shopid="{$data.shopinfo.id}" data-userid = <?php echo $uid; ?>>
            <em></em>
            <div class="shadow"><i></i><input type="checkbox" hidden /></div>
            <div class="left storeLogo">
                <img class="store_logo" src="{$data.shopinfo.logo}" alt="" />
                <h5 title="{$data.shopinfo.name}"><span>{$data.shopinfo.name}</span><img src="{$config_siteurl}statics/zt/images/collection/store.png" alt="" /></h5>
                <p title="{$data.shopinfo.addr}"><span>{$data.shopinfo.addr}</span><img src="{$config_siteurl}statics/zt/images/collection/chat.png" alt="" /></p>
                <input type="button" id="focus" class="focusbtn" value="取消关注" data-shopid="{$data.shopinfo.id}"/>
            </div>
            <div class="right storeImg">
                <p><a class="more"  href="{:U('Shop/Product/shopmore',array('shopid'=>$data['shopinfo']['id']))}">查看更多</a></p>
                <ul>
                    <volist name="data['product']" id="wo">
                      <li>
                          <a href="{:U('Shop/Product/show',array('id'=>$wo['id']))}"><img src="{$wo.headpic}" alt="" /></a>
                          <strong>￥{$wo.min_price}</strong>
                      </li>
                    </volist>
                </ul>
            </div>
          </div>
        </volist>
      </div>
  </div>
  <div class="pages">
     <ul>
        <li>
          <if condition="$pageinfo.page !=''">{$pageinfo.page}<a href="#" class="jump">确定</a></if>
        </li>
      </ul>
  </div>
  <div class="clear"></div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
 <script>
$(function(){

  // 取消关注

  $(".focusbtn").click(function(){
      var $this =($(this));
      var shopid=$(this).attr('data-shopid');
      layer.confirm("是否取消关注?",{
              btn:['确认','取消']
          },
          function(){
            layer.closeAll();
            $.ajax({
              type:"POST",
              url:'{:U("Buyer/User/unattention")}',
              dataType:'json',
              data:{'shopid':shopid},
              success:function(data){
                if(data.status == 1){
                   $this.parents(".store_content").hide();
                }else{

                }
              }

            },'json');
          },
          function(){

          }
      );
  });

  // 批量删除店铺

  $(".manage").click(function(){
      $(this).toggleClass("on");
      if($(this).hasClass("on")){
          $(this).html("取消管理");
          $(".shadow").show();
          $(".hiddenbtn").show();
          $("store_content").mouseover(function(){
              $(this).find("em").hide();
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
      var shopid = $(".shadow input:checked").parents(".store_content");
      var useid = $(".shadow input:checked").parents(".store_content").attr("data-userid");
      var shopidarr = [];
      $.each(shopid,function(i,v){
          shopidarr.push($(v).attr("data-shopid"));
      });
      $.ajax({
          type:"POST",
          url:"/App/Batch/shopdele",
          dataType:"json",
          data:{'shopid':shopidarr.toString(),'uid':useid},
          success:function(data){
              if(data.status == 1){
                  layer.msg('删除成功');
                  $(".shadow input:checked").parents(".store_content").remove();
              }
          },
          error:function(){

          }
      });

  });

});
 </script>

