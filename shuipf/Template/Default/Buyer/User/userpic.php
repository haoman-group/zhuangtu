<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>买家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/personal_photo.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="../js/html5.js "></script >
    <script src="../js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>
    <template file="Member/Public/global_js.php"/>
    <script type="text/javascript" src="{$config_siteurl}statics/extres/member/js/common.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/swfobject.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/extres/member/js/fullAvatarEditor.js"></script>
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
    <ul class="basics_top">
      <li><a href="{:U('profile')}">基本资料</a></li>
      <li class="on"><a href="{:U('userpic')}">头像照片</a></li>
    </ul>


    <div class="avatar_box">
      <div class="myAvatarUpload">
        <div id="myContent"></div>
        {$user_avatar}
      </div>
    </div>



  <!-- <form action="{:U('User/userpic')}" method="post" class="userpic">
    <div class="photo_page">
      <div class="photo_page_left">
        <a href="javascript:upfile('product_picture')" class="native_place">本地上传</a>
        <a href="" class="photo_graph">拍照上传</a>
        <div class="support">仅支持JPG、PNG图片文件，且文件小于5M</div>
        <div class="way">
          <ul class="" id="product_picture">
       
          </ul>
          <div>选择你要上传的头像方式</div>
          <div>本地照片：选择一张本地图片编辑后上传为图像</div>
          <div>拍照上传：通过摄像头拍照后上传为头像</div>
        </div>
        <a href="javascript:$('.userpic').submit()" class="sure">保存</a>
      </div>
      <div class="photo_page_right">
        <p>您上传的头像会自动生成三种尺寸，<br>请注意中小尺寸的头像是否清晰</p>
        <div class="preview_left">
          <div>没有预览可用</div>
          <p>大尺寸头像，120*1200像素</p>
        </div>
        <div class="preview_right">
          <div class="middle">没有预览可用</div>
          <p>中尺寸头像，60*60像素</p>
          <div class="small">没有预览可用</div>
          <p>小尺寸头像，30*30像素</p>
        </div>
      </div>
    </div>
  </form> -->


  </div>
</div>
<div class="clear"></div>
<template file="common/_footer.php"/>
<script type="text/javascript">
    //全局变量
    var GV = {
      DIMAUB: "{$config_siteurl}",
      JS_ROOT: "{$config_siteurl}statics/js/"
    };
    </script>
<script src="{$config_siteurl}statics/js/wind.js"></script>
<script src="{$config_siteurl}statics/js/common.js"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
      <?php 
        $alowexts = "jpg|jpeg|gif|bmp|png";
        $thumb_ext = ",";
        $watermark_setting = 0;
        $module = "Buyer";
        $catid = "0";
        $maxPicNum = "1";
        $authkey = upload_key("$maxPicNum,$alowexts,1,$thumb_ext,$watermark_setting");
      ?>
    function upfile(id){
      flashupload(id+'_images', '图片上传',id,submit_pic,'{$maxPicNum},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }
   
    function submit_pic(uploadid,returnid){
      var d = uploadid.iframe.contentWindow;
      var in_content = d.$("#att-status").html().substring(1);
      var in_filename = d.$("#att-name").html().substring(1);
      var str = "";
      var contents = in_content.split('|');
      var filenames = in_filename.split('|');
      if (contents == '') return true;
      $.each(contents, function (i, n) {
          var ids = parseInt(Math.random() * 10000 + 10 * i);
          var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
          console.log(ids);
          str += "<li id='image"+ids+"'><input type='hidden' name='"+returnid+"_url[]' value='" + n + "'><img src='"+n+"'><br><a href=\"javascript:remove_div('image" + ids + "')\" class='tupian' >删除</a></li>";
      });
      $('#' + returnid).html(str);
    }
</script> 

<script type="text/javascript" src="{$model_extresdir}js/profile.js"></script> 
<script type="text/javascript" src="{$config_siteurl}statics/js/ajaxForm.js"></script>
<script type="text/javascript">
profile.init();
//头像上传回调
function fullAvatarCallback(msg) {
    switch (msg.code) {
    case 1:
        
        break;
    case 2:
        
        break;
    case 3:
        if (msg.type == 0) {
            
        } else if (msg.type == 1) {
            alert("摄像头已准备就绪但用户未允许使用！");
        } else {
            alert("摄像头被占用！");
        }
        break;
    case 4:
        alert("图像文件过大！");
        break;
    case 5:
        if (msg.type == 0) {
        $.tipMessage("头像已经修改，刷新后可见最新头像！", 0, 3000);
        } else {
      alert(msg.content.msg);
    }
        break;
    }
}
</script>


</body>
</html>
