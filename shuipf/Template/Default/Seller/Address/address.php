<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/seller_address.css" type="text/css"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <!--控制图片上传：-->
    <template file="common/_global_js.php"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</head>
<body>
 <template file="Seller/common/_header.php"/>
 <div class="container sellercenter_wrap scindex clearfix">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
      <div class="scenterstatus">
        <if condition="date('H') lt 12"><div class="timetip">上午好！愿你度过这美好的一天！</div></if>
        <if condition="date('H') egt 12"><div class="timetip noon">下午好！喝杯咖啡放松一下吧！</div></if>
      </div>
        <div class="wraprt">
        <div class="address_top">
          <a href="">地址管理</a>
        </div>
        <div class="address_main">
         <div class="new_address "><a href="#"  class="addbtn"  data-addrid=""  >新增宝贝所在地址</a></div>
          <volist name="info" id="vo">
          <h3>{$vo.name}</h3>
          <dl class="address_list set">

            <dt>所在地区:</dt><dd>{$vo.area}</dd>
            <dt>详细地址:</dt><dd>{$vo.address}</dd>
         
            <dt>联系电话:</dt><dd>{$vo.phone}</dd>
            <dd class="address_edit"> <if condition="$vo.default === '1'"><a class="btndefault">默认地址</a><else/><a href="{:U('setDefault',array('id'=>$vo['id']))}" data-addrid="{$vo['id']}" class="setdefault">设置默认</a></if>
            <!-- <dd class="address_edit"> --> <a href="{:U('editAddr',array('id'=>$vo['id']))}" data-addrid="{$vo['id']}" class="btnaddredit addbtn">编辑</a>
           <a href="#" class="btndelete" data-id="{$vo['id']}">删除</a></dd>
          </dl>
          </volist>
         <if condition=" $num lt 10 "> <div><a href="#" class="add_address_btn addbtn"  hidden><img src="{$config_siteurl}statics/zt/images/personalinformation/add_address.png" alt=""></a></div></if>
        </div>
      </div>
    </div>
  </div>
<template file="common/_promise.php"/>
<template file="Seller/common/_footer.php"/>
<script type="text/javascript">
    $(".addbtn").click(function() {
        var addrid= $(this).attr("data-addrid");

        layer.open({
            type:2,
            title: false,
            closeBtn: 0,
            scrollbar: false,
            area: ['700px','460px'],
            shadeClose: true,
            content: "/Seller/Address/addAddr?id="+addrid,

        });
        return false;
    });
    $(function(){
        $(".setdefault").click(function(){
            var dataid= $(this).attr("data-addrid");
            $.ajax({
                type : "POST",
                url: '/Api/Selleraddr/setDefault',
                async : false,
                dataType : "json",
                timeout : 5000,
                data : {"id": dataid },
                success : function(result) {
                    if(result.status===1){
                        console.log("zheshitishiyu"+result.msg);
                        window.location.reload();
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

        $(".btndelete").click(function(){
            var dataid= $(this).attr("data-id");
            var $addresslist = $(this).parents(".address_list");
            $.ajax({
                type : "POST",
                url : '{:U("Api/Selleraddr/delete")} ',
                async : false,
                dataType : "json",
                timeout : 5000,
                data : {"id": dataid },
                success : function(result) {
                    console.log("zheshitishiyu"+result.msg);
                    $addresslist.prev("h3").remove().end().remove();

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