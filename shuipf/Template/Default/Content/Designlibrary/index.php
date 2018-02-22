<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{$Config.sitename}</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
</head>
<body class="designebody">
<!--背景容器-->
<template file="common/_top.php"/>
<!--title-->
<!--背景容器-->
<div class="conwhole sjklisthead"></div>
<div class="scale">
  <p class="navtop"></p><p class="navbott"></p>
  <div class="sjk_nav">
      <ul>
        <volist name="style" id="vo">
           <li><a  href="{$config_siteurl}Designlibrary/lists/style/{$vo}">{$vo}</a></li>
        </volist>
      </ul>
  </div>
  <!--主体-->
  <!--背景容器-->
  <div class="conwhole sjklistwrap">
       <!--保护容器-->
       <div class="container">
            <!--导航-->
            <div class="sjktopsear">
                 <div class="topdiv">
                      <div class="formbox left">
                         <form>
                            <input  type="text"  class="inpsear" placeholder="中式">
                            <!-- <input type="image" class="btnsear right" src="/statics/zt/images/SJK2_S.png"> -->
                         </form>
                      </div>
                      <div class="hotkeys">
                           <p>相关搜索：<a href="">中式元素</a><a href="">中国风</a><a href="">中式排版</a><a href="">新中式</a><a href="">中国元素</a><a href="">中国地产</a><a href="">中式花纹</a><a href="">中式家具</a><a href="">中式风格</a><a href="">中式材料</a></p>
                      </div>
                 </div>
                 <div class="botdiv">
                      <a class="tag">80137设计</a>
                      <a class="tag">300设计公司</a>
                      <a class="tag">1500设计师</a>
                 </div>
            </div>
            <!--内容-->
            <div class="sjkcontent" id="watercon">
              <ul class="sjkproduct clearfix">
                <volist name="data" id="data">
                <li>
                  <a href="{:U('Designlibrary/show',array('proid'=>$data['proid']))}">
                    <img class="img" src="{$data['picture']}" alt=""></a>
                    <p class="tit"><strong>【{$data['style']}】</strong><span <if condition='$data["likecount"] neq 0'>class="likecount"</if>>{$data['likecount']}</span>
                      <if condition="$data['collectnum'] eq 0"><i class="collect needlogin" data-proid={$data['proid']} data-userid={$data['userid']} data-isdelete='1' data-type="1">收藏夹</i><else/>
                      <i class="collected needlogin" data-proid={$data['proid']} data-userid={$data['userid']} data-isdelete='0' data-type="1">已收藏</i></if>
                      </p>
                    <p class="description">{$data['title']}</p>
                    <div class="company">
                      <img src="{:getavatar($data['uid'])}" alt="">
                      <p>{$data['designer_name']}—— ——</p>
                      <p>{$data['shopname']}</p>
                      <if condition="$data['likecount'] eq 0">
                      <strong class="like needlogin" data-proid="{$data['proid']}" data-userid="{$data['userid']}" data-type="1" data-isdelete="1">喜欢TA</strong>
                      <else/>
                       <strong class="liked needlogin" data-proid="{$data['proid']}" data-userid="{$data['userid']}" data-type="1" data-isdelete="0">取消</strong>
                     </if>
                    </div>

                </li>
                </volist>
              </ul>
            </div>
             <div class="pagebox">
              {$pageinfo['page']}
             </div>
       </div>
  </div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>

<script>
$(function(){

  // 描述文字字符串截取
  var sjkstr = $(".sjkproduct").find(".description").html();
  $(".sjkproduct").find(".description").html(sjkstr.substr(0,34) + "...");

  // 收藏功能
  $(".sjkcontent .sjkproduct li .tit i").click(function(){
    $this=$(this);
    if($(this).attr("data-isdelete") == '0'){
      layer.confirm("是否取消收藏?",{
              btn:['确认','取消']
          },
          function(){
            layer.closeAll();
            $this.attr("data-isdelete",'1');
            sjkcollect();
          },
          function(){

          }
      );
    }else{
      $(this).attr("data-isdelete",'0');
      sjkcollect();
    }

  });
  function sjkcollect(){
      var itemid=$this.attr("data-proid");
      var userid=$this.attr("data-userid");
      var type=$this.attr("data-type");
      var is_delete=$this.attr("data-isdelete");
      $.ajax({
          type:"POST",
          url:"/Shop/Product/collecton",
          dataType: "json",
          data: {"productid": itemid, "is_delete": is_delete, "type": type},
          success: function(data){
              if(data.status == 1){
                 if(data['isdelete'] == '0'){
                    $this.removeClass("collect").addClass("collected").html("已收藏");
                 }else{
                    $this.removeClass("collected").addClass("collect").html("收藏夹");
                 }
              }else{

              }
          },
          error:function(){

          }
      });
  }

  // 喜欢TA功能
  $(".sjkcontent .sjkproduct li .company strong").click(function(){
    $this=$(this);
    if($(this).attr("data-isdelete") == '0'){
      layer.confirm("是否取消喜欢?",{
              btn:['确认','取消']
          },
          function(){
            layer.closeAll();
            $this.attr("data-isdelete",'1');
            sjklike();
          },
          function(){

          }
      );
    }else{
      $(this).attr("data-isdelete",'0');
      sjklike();
    }

  });

  function sjklike(){
      var itemid=$this.attr("data-proid");
      var userid=$this.attr("data-userid");
      var type=$this.attr("data-type");
      var isdelete=$this.attr("data-isdelete");
      var likenum = $this.closest("li").find(".tit span").html();
      $.ajax({
          type:"POST",
          url:"/Api/DesignLibrary/designerlike",
          dataType: "json",
          data: {"itemid": itemid, "isdelete": isdelete, "type": type,'userid':userid},
          success: function(data){
              if(data.status == 1){
                 if(data['isdelete'] == '0'){
                    $this.removeClass("like").addClass("liked").html("取消");
                    likenum ++;
                    $this.closest("li").find(".tit span").html(likenum);
                 }else{
                    $this.removeClass("liked").addClass("like").html("喜欢TA");
                    likenum --;
                    $this.closest("li").find(".tit span").html(likenum);
                 }
                 if($this.closest("li").find(".tit span").html() == 0){
                   $this.closest("li").find(".tit span").removeClass("likecount");
                 }else{
                   $this.closest("li").find(".tit span").addClass("likecount");
                 }
              }else{

              }
          },
          error:function(){

          }
      });
  }
})

</script>

<script>

$(function(){

   var  stylemodel={
       "东南亚":'Southeast Asia style',
       "中式":"Chinese style",
       "公装":"Frock style",
       "地中海":"Mediterranean Sea style",
       '文艺复古':'Literature and art style',
       '新中式':'Neo-Chinese style',
       '欧式':'European style',
       '法式':'French style',
       '混搭':'Mix style',
       '现代':'Modern style',
       '田园':'Countryside style',
       '美式':'American style'
      };
   var num = 0;
   $.each(stylemodel,function(i,v){
      $(".sjk_nav ul li").eq(num).prepend("<span>"+v+"</span>");
      num ++;
   });

})
</script>

</body>

</html>
