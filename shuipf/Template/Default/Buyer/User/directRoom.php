<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>买家中心－直播间</title>
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
    <div class="wraprt directRoom_diary">
        <if condition="$studio eq ''">
            <h1>您还没有直播间消息哦~~</h1>
            <div class="dr_border">
                <div class="txtbox onlinecomment scindex">
                    <div class="diary">
                        <img class="chtitliimg" src="{$config_siteurl}statics/zt/images/buyercenter/chtitliimg.jpg">
                    </div>
                </div>
            </div>
        </if>
        <volist name="studio" id="vo">
        <div class="dr_diary">
            <h4>
                <!-- <img src="{$config_siteurl}statics/zt/images/directRoom/designer.png"> -->
                {$vo.step}
            </h4>
            <div class="person">
                <img src="{$vo.userppic}">
                <p>
                    <span class="name">{$vo.crafttypename}-{$vo.sellername}</span>
                    <span class="decription">{$vo.about}</span>
                </p>
                <div class="time">
                    <?php echo date("Y-m-d",$vo['addtime']); ?>
                    <img src="{$config_siteurl}statics/zt/images/buyercenter/diarytime.png">
                </div>
            </div>
            <ul class="content">
                <li>工作内容</li>
                <volist name="vo.struction_content" id="data">
                 <li>{$i}.{$data}</li>
                </volist>
                <li class="tip"><span><img src="{$config_siteurl}statics/zt/images/directRoom/tip.png"></span>提示：{$vo.alert_release}</li>
            </ul>
            <ul class="img">
                <volist name="vo.picture" id="picture">
                  <li><img src="{$picture}"></li>
                </volist>
                <!-- <li><img src="{$config_siteurl}statics/zt/images/directRoom/img2.jpg"></li>
                <li><img src="{$config_siteurl}statics/zt/images/directRoom/img3.jpg"></li>
                <li><img src="{$config_siteurl}statics/zt/images/directRoom/img4.jpg"></li>
                <li><img src="{$config_siteurl}statics/zt/images/directRoom/img5.jpg"></li> -->
            </ul>
            <p class="status">{$vo.comm_release}</p>
            <ul class="opeartion">
                <li class="on" style="cursor:pointer;"><img src="{$config_siteurl}statics/zt/images/buyercenter/praise.png"><span class="addlike" data-id="{$vo.id}" <if condition="$vo.customer_like eq 0">data-islike="1"<else/>data-islike="0" </if>><if condition="$vo.customer_like eq 0">点赞<else/>取消</if></span></li>
                <li class="on" style="cursor:pointer;"><img src="{$config_siteurl}statics/zt/images/buyercenter/comment.png"><span class="addcommit" >评论</span></li>
                <li class="on"><img src="{$config_siteurl}statics/zt/images/buyercenter/list.png"></li>
            </ul>
            <div class="like_person">
                <i></i>
                <img src="{$config_siteurl}statics/zt/images/buyercenter/xin.png" alt="点赞" />
                <em></em>
                <if condition="$vo.customer_like eq 1">
                  <span>{$vo['coustomername']}、</span>
                </if>
                <if condition="$vo.seller_like eq 1">
                  <span>{$vo['sellername']}</span>
                </if>
            </div>
            <div class="comment">
                <h5>填写评论</h5>
                <input type="hidden" name="studioid" class="studioid" value="{$vo.id}">
                <input type="hidden" name="is_buyer" value="1" class="is_buyer">
                <textarea name="comment" class="content" cols="30" rows="10"></textarea>
                <input type="submit" value="提交" class="refer"/>
            </div>
            <dl class="buy_comment">
                <volist name="vo.studiocomment" id="comment">
                    <if condition="$comment.is_buyer eq 0">
                <dt class="seller" style="cursor:pointer;">卖家：{$vo.sellername}</dt>
                <dd>
                    <p class="seller" style="cursor:pointer;">{$comment.content}</p>
                </dd>
                <else/>
                <dt>买家：{$vo.coustomername}</dt>
                <dd>
                    <p >{$comment.content}<button data-id={$comment['id']} class="delstudio">删除</button></p>
                    <!-- <div>
                        <img src="{$config_siteurl}statics/zt/images/directRoom/breviaryimg.jpg" alt="" />
                        <img src="{$config_siteurl}statics/zt/images/directRoom/breviaryimg.jpg" alt="" />
                        <img src="{$config_siteurl}statics/zt/images/directRoom/breviaryimg.jpg" alt="" />
                    </div> -->
                </dd></if>
                </volist>
            </dl>
        </div>
        </volist>
        <div class="pagebox">{$pageinfo['page']}</div>
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
 //评价
 $(".addcommit").click(function(){
    $(this).parents(".dr_diary").find(".comment").show();
 });
</script>
<script>
$(".refer").click(function(){
    $this=$(this);
    var studioid=$(this).parent().find(".studioid").val();
    var content=$(this).parent().find(".content").val();
    var is_buyer=$(this).parent().find(".is_buyer").val();
     $.ajax({
        type:"POST",
        url : '{:U("App/Studio/addstudiocomment")}',
        dataType:"json",
        data:{"studioid":studioid,'content':content,'is_buyer':is_buyer},
        success:function (data){
            if(data.status == 1){
            $this.parents(".comment").hide();
            $this.parents(".comment").next(".buy_comment").append("<dt>买家:"+data.data.username+"</dt><dd><p >"+data.data.content+"<button data-id="+data.data.studioid+" class='delstudio'>"+"删除</button></p></dd>");
            layer.msg("操作成功!");
            }else{

            }
        }
    });
})
</script>
<script>
//回复
$(".seller").click(function(){
    $(this).parents(".dr_diary").find(".comment").show();
 });
</script>
<script>
 $(".delstudio").click(function(){
    $this=$(this);
    var id=$(this).attr("data-id");
    $.ajax({
        type:"POST",
        url : '{:U("App/Studio/delstudio")}',
        dataType:"json",
        data:{"id":id,'is_buyer':1},
        success:function (data){
            if(data.status == 1){
                tmp_dd = $this.parents("dd");
               tmp_dt = tmp_dd.prev("dt");
               tmp_dd.remove();

               tmp_dt.remove();
               layer.msg("删除成功!");

            }else{

            }
        }
    });
 });
</script>
<script>
$(".addlike").click(function(){
    $this=$(this);
    var id=$(this).attr("data-id");
    var customer_like=$(this).attr("data-islike");
    if(customer_like ==1){
        $.ajax({
            type:"POST",
            url : '{:U("App/Studio/addclicklike")}',
            dataType:"json",
            data:{"id":id,'customer_like':customer_like},
            success:function (data){
                if(data.status == 1){
                  $this.attr("data-islike",'0');
                  $this.html("取消");
                  $this.parents(".opeartion").next(".like_person").append("<span>"+data.data.username+"</span>");

                }else{

                }
            }
        });
    }else{
        $.ajax({
            type:"POST",
            url : '{:U("App/Studio/addclicklike")}',
            dataType:"json",
            data:{"id":id,'customer_like':customer_like},
            success:function (data){
                if(data.status == 1){
                  $this.attr("data-islike",'1');
                  $this.html("点赞");
                  $this.parents(".opeartion").next(".like_person").find("span").eq(0).remove();
                }else{

                }
            }
        });
    }
})
</script>
</body>
</html>
