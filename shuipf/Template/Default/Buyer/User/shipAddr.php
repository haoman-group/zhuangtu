<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8">
    <title>买家中心－收货地址</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/shipping_address.css" type="text/css"/>
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
        <div class="wraprt">
        <div class="address_top">
          <a href="">收货地址</a>
        </div>
        <div class="address_main">
         <if condition=" $num lt 10 "> <div class="new_address"><a href="#" data-addrid="" class="btnaddaddr addbtn"  >新增收货地址</a></div></if>
        
          <p class="address_num">已保存<font color="#FF0000"><?php echo $num ?></font>条地址信息，还能保存<font color="#FF0000"><?php echo 10 -$num ?></font>条</p>
          <volist name="info" id="vo">
        <if condition="$vo.default == '1'">
            <dl class="address_list ">
            <else/>
            <dl class="address_list ">
        </if>
          
            <dt>收货人:</dt><dd>{$vo.name}</dd>
              <dt>所在地区:</dt><dd>{$vo.area}</dd>
            <dt>详细地址:</dt><dd>{$vo.address}</dd>
            <dt>邮政编码:</dt><dd>{$vo.postcode}</dd>
            <dt>联系电话:</dt><dd>{$vo.phone}</dd>
            <dd class="address_edit"> <if condition="$vo.default === '1'"><a class="btndefault">默认地址</a><else/><a href="{:U('setDefault',array('id'=>$vo['id']))}" id="nobtndef" class="setdefault" data-addrid="{$vo['id']}">设置默认</a></if>
                <a href="{:U('editAddr',array('id'=>$vo['id']))}" data-addrid="{$vo['id']}" class="btnaddredit addbtn">编辑</a>
                <a href="#" class="btndelete" data-id="{$vo['id']}">删除</a></dd>
          </dl>
          </volist>
         <if condition=" $num lt 10 "> <div><a href="#"  data-addrid="" class="add_address_btn btnaddaddr addbtn" ><img src="{$config_siteurl}statics/zt/images/personalinformation/add_address.png" alt=""></a></div></if>
        </div>
      </div>
    <div class="clear"></div>
</div>
<!--尾部-->
 <template file="common/_promise.php"/>
  <template file="common/_footer.php"/>
<script type="text/javascript">


$(function(){
    $(".addbtn").click(function() {
        var addrid= $(this).attr("data-addrid");

        layer.open({
            type:2,
            title: false,
            closeBtn: 0,
            scrollbar: false,
            area: ['700px','460px'],
            shadeClose: true,
            content: "/Buyer/User/addAddr?id="+addrid,
        });
        return false;
    });

    $(".setdefault").click(function(){
        var dataid= $(this).attr("data-addrid");
        $.ajax({
            type : "POST",
            url: '/Api/Buyeraddr/setDefault',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : {"id": dataid },
            success : function(result) {
                console.log("zheshitishiyu"+result.msg);
                if(result.status===1){
                    window.location.reload();
                }
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status + "|"
                    + XMLHttpRequest.readyState + "|" + textStatus);
            }
        });

        return false;
    });

    $(".btndelete").click(function(){
        var dataid= $(this).attr("data-id");
        $.ajax({
            type : "POST",
            url : '{:U("Api/Buyeraddr/delete")} ',
            async : false,
            dataType : "json",
            timeout : 5000,
            data : {"id": dataid },
            success : function(result) {
                if(result.status===1){
                    console.log("zheshitishiyu"+result.msg);
                    $("[data-id='"+dataid+"']").parents(".address_list").remove();
                }
                else{
                    alert(result.msg);
                }

            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.status + "|"
                    + XMLHttpRequest.readyState + "|" + textStatus);
            }
        });

        return false;
    });
//        $(".btndefault").click(function(){
//           $(this).parents(".address_list").addClass("address_default");
//        });

});


</script>
</body>
</html>
