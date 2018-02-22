<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{$Config.sitename}</title>
<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
<!--[if lt IE 9]>
<script src="{$config_siteurl}statics/zt/js/html5.js "></script >
<script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
<![endif]-->
<script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
<script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
<script src="{$config_siteurl}statics/zt/js/base.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
<script src="{$config_siteurl}statics/zt/js/scroll.js"></script>
</head>
<body>
<!--背景容器-->
<template file="/common/_top.php"/>
<!--title-->
<!--背景容器-->
<!-- <div class="conwhole sjklisthead">
     <div class="container">
         <div class="headlt left">
             <strong>中国风设计风格</strong> <br/>
             <b>太原著名设计公司、设计师设计作品</b>
         </div>
         <div class="headrt right">
              <a href=""><img src="{$config_siteurl}statics/zt/images/SJK1_titleimg1.png"></a>
              <a href=""><img src="{$config_siteurl}statics/zt/images/SJK1_titleimg2.png"></a>
              <a href=""><img src="{$config_siteurl}statics/zt/images/SJK1_titleimg3.png"></a>
              <a href=""><img src="{$config_siteurl}statics/zt/images/SJK1_titleimg4.png"></a>
              <p><strong></strong><b>家装相关材料购买捷径</b><strong></strong></p>
         </div>
     </div>
</div> -->
<!--主体-->
<!--背景容器-->
<!-- <div class="conwhole sjklistwrap">
     <div class="container">
          <div class="sjktopsear">
               <div class="topdiv">
                    <div class="formbox left">
                      <form>
                        <input  type="text"  class="inpsear" placeholder="中式">
                        <input type="image" class="btnsear right" src="{$config_siteurl}statics/zt/images/SJK2_S.png">
                      </form>
                    </div>
                    <div class="hotkeys right">
                        <p>相关搜索：<a href="">中式元素</a><a href="">中国风</a><a href="">中式排版</a><a href="">新中式</a><a href="">中国元素</a><a href="">中国地产</a><a href="">中式花纹</a><a href="">中式家具</a><a href="">中式风格</a><a href="">中式材料</a></p>
                    </div>
               </div>
               <div class="botdiv">
                  <a class="tag">80137设计</a>
                  <a class="tag">300设计公司</a>
                  <a class="tag">1500设计师</a>
               </div>
          </div>
     </div>
</div> -->
<!-- <div class="sjkwaterloading">
</div> -->
<!--隐藏页面-->
<!-- <div class="sjkdetailbg">
</div> -->
<div class="sjkdetailbox">
   <div class="bg"><img src="{$config_siteurl}statics/zt/images/designlibrary/bg.png" /></div>
   <!-- <img class="msgclose" src="{$config_siteurl}statics/zt/images/test_msg1.png">
   <img class="msgleft" src="{$config_siteurl}statics/zt/images/test_msgleft.png">
   <img class="msgright" src="{$config_siteurl}statics/zt/images/test_msgright.png"> -->
   <div class="sjkdetailmain">
      <div class="left sjkleftbox">
         <div class="sjkdetailleftbox">
            <div class="sjkdetailleft">
               <div class="head">
                <if condition="$count eq 0">
                  <div class="collect needlogin" data-productid="{$data.id}" data-userid="{$data.userid}" data-type="1" data-isdele="1">收藏</div><else/>
                  <div class="collect needlogin" data-productid="{$data.id}" data-userid="{$data.userid}" data-type="1" data-isdele="0">已收藏</div>
                </if>
                  <div class="care"><img src="{$config_siteurl}statics/zt/images/SJK1_con2img1.png" /></div>
                  <!-- <div class="scaling ">
                     <img src="{$config_siteurl}statics/zt/images/SJK1_con2img4.png" />
                  </div> -->
               </div>
               <volist name="data['picture']" id="vo">
                  <img class="explain" src="{$vo}" />
               </volist>
               <div class="situation clearfix">
                  <div class="sale text">
                     <strong>已售</strong>&nbsp;<span>{$data['count_sold']}</span>
                  </div>
                  <div class="collect text">
                    <strong >收藏</strong>&nbsp;<span>{$data['count_collected']}</span>
                  </div>
               </div>
            </div>
         </div>
      <!--评价-->
         <div class="sjkdetailcomment">
            <div class="head">
               <div class="person">
                  <div class="box">
                    <img src=<if condition="$data.seller_userpic eq ''">{:getavatar($data['uid'])}<else/>{:getavatar($data['uid'])}</if>>
                     <p>{$data.designer}—-{$data.title}</p>
                     <p>{$data.shopname}</p>
                  </div>
               <!-- <p class="description">{$data.title}</p>                                                     -->
               </div>
               <p class="descrip">{$data.idea}</p>
            </div>
            <div class="content clearfix" data-productid="{$data.id}" data-userid="{$data.userid}" data-type="1">
               <div class="img">
                  <img src=<if condition="$data.buyer_userpic eq ''">"{$config_siteurl}statics/images/log1.png"<else/>{:getavatar($data['userid'])}</if>>
               </div>
               <textarea class="text" name="" id="" cols="30" rows="10" placeholder="你对这个作品的看法..."></textarea>
               <div class="btnsub"><input type="submit" class="needlogin" value="提交"/></div>
               <volist name="data['comment']" id="vo">
                <p>{$vo['content']}</p>
               </volist>
            </div>
         </div>
      </div>
   <!--分部-->
      <div class="right sjkrightbox">
         <div class="sjkdetailrightbox">
            <div class="sjkdetailright">
               <div class="head">
                 <img src=<if condition="$data.seller_userpic eq ''">{:getavatar($data['uid'])}<else/>{:getavatar($data['uid'])}</if>>
                  <p>{$data.designer}——</p>
                  <p>{$data.shopname}</p>
               </div>
            </div>
            <div class="shopshow">
               <div class="shopshowleft">
                <div id="dv_scroll">
                  <div id="dv_scroll_text" class="Scroller-Container">
                    <!-- <div class="newslist"> -->
                      <volist name="data['sameshopheadpic']" id="pc">
                        <a href="{:U('Shop/Product/show',array('id'=>$pc['id']))}"><img src="{$pc['headpic']}" alt=""></a>
                      </volist>
                    <!-- </div> -->
                  </div>
                </div>
                <div id="dv_scroll_bar">
                  <div id="dv_scroll_track" class="Scrollbar-Track">
                    <div class="Scrollbar-Handle"></div>
                  </div>
                </div>
               </div>
               <!-- <div class="shopshowright">
                  <a href=""><img src="" alt=""></a>
                  <a href=""><img src="" alt=""></a>
                  <a href=""><img src="" alt=""></a>
               </div> -->
            </div>
            <div class="like ">
              <if condition="$countlike eq 0">
                <p class="likeadd needlogin" data-productid={$data.id} data-userid={$data.userid} data-type="1" data-isdele="1">喜欢TA</p><else/>
                <p class="likeadded needlogin" data-productid={$data.id} data-userid={$data.userid} data-type="1" data-isdele="0">取消</p>
              </if>
            </div>
         </div>
      <!--点击购买-->
         <div class="sjkdetailbuy">
            <a href="{:U('Shop/Product/show',array('id'=>$data['id']))}" class="btn">点击购买</a>
            <div class="explain">
               <a href="javascript:void(0)">了解设计</a>
               <a href="javascript:void(0)">看报价</a>
               <a href="javascript:void(0)">看评价</a>
               <a href="javascript:void(0)">预约设计师</a>
            </div>
         </div>
      </div>
   </div>
   <template file="common/_promise.php"/>
   <template file="common/_footer.php"/>
</div>
<script type="text/javascript">
   $(function(){

     // 收藏功能
     $(".sjkdetailleft .head .collect").click(function(){
       $this=$(this);
       if($(this).attr("data-isdele") == '0'){
         layer.confirm("是否取消收藏?",{
                 btn:['确认','取消']
             },
             function(){
               layer.closeAll();
               $this.attr("data-isdele",'1');
               sjkcollect();
             },
             function(){

             }
         );
       }else{
         $(this).attr("data-isdele",'0');
         sjkcollect();
       }

     });
     function sjkcollect(){
         var itemid=$this.attr("data-productid");
         var userid=$this.attr("data-userid");
         var type=$this.attr("data-type");
         var is_delete=$this.attr("data-isdele");
         var collectnum = $(".sjkdetailleft .situation").find(".collect span").html();
         $.ajax({
             type:"POST",
             url:"/Shop/Product/collecton",
             dataType: "json",
             data: {"productid": itemid, "is_delete": is_delete, "type": type},
             success: function(data){
                 if(data.status == 1){
                    if(data['isdelete'] == '0'){
                       $this.html("已收藏");
                       collectnum ++;
                       $this.closest(".sjkdetailleft").find(".situation .collect span").html(collectnum);
                    }else{
                       $this.html("收藏");
                       collectnum --;
                       $this.closest(".sjkdetailleft").find(".situation .collect span").html(collectnum);
                    }
                 }else{

                 }
             },
             error:function(){

             }
         });
     }

     // 喜欢TA功能
     $(".sjkdetailrightbox .like p").click(function(){
       $this=$(this);
       if($(this).attr("data-isdele") == '0'){
         layer.confirm("是否取消喜欢?",{
                 btn:['确认','取消']
             },
             function(){
               layer.closeAll();
               $this.attr("data-isdele",'1');
               sjklike();
             },
             function(){

             }
         );
       }else{
         $(this).attr("data-isdele",'0');
         sjklike();
       }

     });

     function sjklike(){
         var itemid=$this.attr("data-productid");
         var userid=$this.attr("data-userid");
         var type=$this.attr("data-type");
         var isdelete=$this.attr("data-isdele");
         $.ajax({
             type:"POST",
             url:"/Api/DesignLibrary/designerlike",
             dataType: "json",
             data: {"itemid": itemid, "isdelete": isdelete, "type": type,'userid':userid},
             success: function(data){
                 if(data.status == 1){
                    if(data['isdelete'] == '0'){
                       $this.removeClass("likeadd").addClass("likeadded").html("取消");
                    }else{
                       $this.removeClass("likeadded").addClass("likeadd").html("喜欢TA");
                    }
                 }else{

                 }
             },
             error:function(){

             }
         });
     }

     // 评价功能
     $(".sjkdetailcomment .content").find("input").on("click",function(){
       var $this = $(this);
       var itemid=$(this).parents(".content").attr("data-productid");
       var userid=$(this).parents(".content").attr("data-userid");
       var type=$(this).parents(".content").attr("data-type");
       var content=$this.parents(".content").find("textarea").val();
       $.ajax({
           type:"POST",
           url:"{:U("addcommit")}",
           dataType: "json",
           data: {"itemid": itemid, "type": type,'userid':userid,'content':content},
           success: function(data){
               if(data.status == 1){
                  console.log(data);
                  $this.parents(".content").append("<p>"+$this.parents(".content").find("textarea").val()+"</p>")
               }else{

               }
           },
           error:function(){

           }
       });
     });

   })
</script>
</body>
</html>
