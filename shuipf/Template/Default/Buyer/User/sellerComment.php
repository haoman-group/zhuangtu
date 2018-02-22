<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
    <meta charset="utf-8">
    <title>买家中心－我的收藏</title>
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
        <div class="myComment_wrap right">
           <div class="myComment_title clearfix">
                <a href="{:U('myComment')}" class="left">我的评价</a>
                <a href="{:U('sellerComment')}" class="on left">来自卖家的评价</a>
            </div>
            <table>
                <tr>
                    <th>
                       <select name="" id="">
                            <option value="">评价</option>
                        </select> 
                    </th>
                    <th>                        
                        <select name="" id="">
                            <option value="">评价内容</option>
                        </select>
                    </th>
                    <th>被评价人</th>
                    <th>宝贝信息</th>
                    <th>操作</th>
                </tr>
                <tr>
                    <td><img src="{$config_siteurl}statics/zt/images/buyercenter/comment1.png" alt="" /></td>
                    <td><h4>好评！</h4><span>[2016-04-08  17:10:20]</span></td>
                    <td><h4>卖家：意风家具</h4><img src="{$config_siteurl}statics/zt/images/buyercenter/comment4.png" alt="" /></td>
                    <td><a href="" class="description">欧式实木纯手工座椅 电脑椅 办 公椅咖啡椅咖啡椅子...</a href=""><p><strong>135</strong>元</p></td>
                    <td><a href="">回复</a></td>
                </tr>
                <tr>
                    <td><img src="{$config_siteurl}statics/zt/images/buyercenter/comment2.png" alt="" /></td>
                    <td><h4>中评！</h4><span>[2016-04-08  17:10:20]</span></td>
                    <td><h4>卖家：意风家具</h4><img src="{$config_siteurl}statics/zt/images/buyercenter/comment4.png" alt="" /></td>
                    <td><a href="" class="description">欧式实木纯手工座椅 电脑椅 办 公椅咖啡椅咖啡椅子...</a href=""><p><strong>135</strong>元</p></td>
                    <td><a href="">回复</a></td>
                </tr>
                <tr>
                    <td><img src="{$config_siteurl}statics/zt/images/buyercenter/comment3.png" alt="" /></td>
                    <td><h4>差评！</h4><span>[2016-04-08  17:10:20]</span></td>
                    <td><h4>卖家：意风家具</h4><img src="{$config_siteurl}statics/zt/images/buyercenter/comment4.png" alt="" /></td>
                    <td><a href="" class="description">欧式实木纯手工座椅 电脑椅 办 公椅咖啡椅咖啡椅子...</a href=""><p><strong>135</strong>元</p></td>
                    <td><a href="">回复</a></td>
                </tr>
            </table>
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

$(function(){
    $(".description").html($(".description").html().substring(0,25) + "...");
})

</script>
</body>
</html>
