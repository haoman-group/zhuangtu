<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>上传设计师</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
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
    <!--以下三个控制图片上传：-->
    <template file="common/_global_js.php"/>
    <script type="text/javascript" src="{$config_siteurl}statics/js/wind.js"></script>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</head>
<body>
<!--背景容器-->
<template file="Seller/common/_header.php"/>

<div class="container sellercenter_wrap scindex">

    <template file="Seller/common/_left.php"/>

    <div class="wraprt">

        <div class="scenterstatus">
            <if condition="date('H') lt 12"><div class="timetip">上午好！愿你度过这美好的一天！</div></if>
            <if condition="date('H') egt 12"><div class="timetip noon">下午好！喝杯咖啡放松一下吧！</div></if>
        </div>
        <div class="designerupload_main">
            <h4>填写设计信息</h4>
            <div class="margin">
              <form id="form_upload" action="{:U('add')}" method="post">
                <h6><span>基本信息</span></h6>
                <dl class="information">
<!--                     <dt>
                        设 计 师 编 号 ：
                    </dt>
                    <dd>
                        <input type="text" name="number" class="name" value="{$info['number']}">
                    </dd> -->
                    <dt>
                        <i>*</i>案 例 设 计 师 ：
                        <!--<em></em>-->
                    </dt>
                    <dd>
                        <input type="text" name="name" class="name" value="{$info['name']}">
                    </dd>
                        <!-- 性别：
                        
          <input type="hidden" name="sex" class="refreshclear" data-default-v="1" data-inpname="inpsex" value="1">
          <em data-v="1" data-radioname="sex_1" data-toinpname="inpsex" data-group="sex_group" class="on bindinput radiogroup radiogrey"></em> 
          <label data-forradio="sex_1" class="forradio">男</label>
          <em data-v="2" data-radioname="sex_2" data-toinpname="inpsex" data-group="sex_group" class="bindinput radiogroup radiogrey"></em>
          <label data-forradio="sex_2" class="forradio">女</label>
                    </dd> -->
                    <dt>
                        级 别 ：
                      
                    </dt>
                    <dd>
                        <Form function="select" parameter="option('designer_qualification'),'',class='' name='qualification'"/>
                    </dd>

                    <dt>
                        从 业 年 限 ：
                        <em></em>
                    </dt>
                    <dd>
                        <input type="text" name="work_time" value="{$info['work_time']}">
                    </dd>
                    <dt>
                        毕 业 院 校 ：
                        <em></em>
                    </dt>
                    <dd>
                        <input type="text" name="school" value="{$info['school']}">
                    </dd>
                   <!--  <dt>
                        设 计 理 念 ：
                        <em></em>
                    </dt>
                    <dd>
                        <input type="text" name="idea" value="{$info['idea']}">
                    </dd> -->
                    <dt>
                        擅 长 风 格 ：
                        <em></em>
                    </dt>
                    <dd>
                        <input type="text" name="style" value="{$info['style']}">
                    </dd>
                     <dt>
                        所 获 奖 项 ：
                        <em></em>
                    </dt>
                    <dd>
                        <input type="text" name="credential" value="{$info['credential']}">
                    </dd>
                    <dt>
                        个 人 简 介：
                        <em></em>
                    </dt>
                     <dd>
                        <textarea name="introduce"  placeholder="最多90个字">{$info['introduce']}</textarea>
                    </dd>

                   
                    <dt>
                        上 传 头 像 ：
                        <em></em>
                    </dt>
                    <dd class="img_upload">
                        <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('designer_picture')">

                        <if condition="empty($info['picture'])">
                          <if condition="empty(session('designer_preview')['picture'])">
                            <div id="designer_picture_div"></div>
                            <else />
                            <div id="designer_picture_div">
                                <div id="designer_pictureimage9126">
                                    <input type="hidden" name="designer_picture" value="{:session('designer_preview')['picture']}">
                                    <img src="{:session('designer_preview')['picture']}"><br>
                                    <a href="javascript:remove_div('designer_pictureimage9126')" class="tupian">删除</a>
                                </div>
                            </div>
                          </if>
                        <else/>
                            <div id="designer_picture_div">
                                <div id="designer_pictureimage9126">
                                    <input type="hidden" name="designer_picture" value="{$info['picture']}">
                                    <img src="{$info['picture']}"><br>
                                    <a href="javascript:remove_div('designer_pictureimage9126')" class="tupian">删除</a>
                                </div>
                            </div>
                        </if>

                    </dd>
                </dl>
                <h6><span>选择模版</span></h6>
                  <if condition="empty($info['modeltype'])">
                    <if condition="empty(session('designer_preview')['modeltype'])">
                      <input type="hidden" class="refreshclear" data-default-v="1" data-inpname="modtype"  name="modeltype" value="1">
                      <else />
                      <input type="hidden" class="refreshclear" data-default-v="{:session('designer_preview')['modeltype']}" data-inpname="modtype"  name="modeltype" value="{:session('designer_preview')['modeltype']}">
                    </if>
                  <else/>
                      <input type="hidden" class="refreshclear" data-default-v="{$info['modeltype']}" data-inpname="modtype"  name="modeltype" value="{$info['modeltype']}">
                  </if>
                  <ul class="model">
                    <li  data-v="1" data-toinpname="modtype" data-group="designtype" class="on bindinput radiogroup">
                        <img src="{$config_siteurl}statics/zt/images/designerupload_modelli1.png">
                        <div class="grey">
                            <img src="{$config_siteurl}statics/zt/images/browse_grey.png"><span>123456</span>
                            <img src="{$config_siteurl}statics/zt/images/heart_grey.png"><span>234</span>
                            <p class="partner">
                                <img src="{$config_siteurl}statics/zt/images/sina_grey.png">
                                <img src="{$config_siteurl}statics/zt/images/qq_grey.png">
                            </p>
                        </div>
                        <p>[B335-1]棕色类型：家居行业类设计公师常用模版</p>
                    </li>
                    <li  data-v="2" data-toinpname="modtype" data-group="designtype" class="bindinput radiogroup">
                        <img src="{$config_siteurl}statics/zt/images/designerupload_modelli1.png">
                        <div class="grey">
                            <img src="{$config_siteurl}statics/zt/images/browse_grey.png"><span>123456</span>
                            <img src="{$config_siteurl}statics/zt/images/heart_grey.png"><span>234</span>
                            <p class="partner">
                                <img src="{$config_siteurl}statics/zt/images/sina_grey.png">
                                <img src="{$config_siteurl}statics/zt/images/qq_grey.png">
                            </p>
                        </div>
                        <p>[B335-1]棕色类型：家居行业类设计公师常用模版</p>
                    </li>
                    <li  data-v="3" data-toinpname="modtype" data-group="designtype" class="bindinput radiogroup">
                        <img src="{$config_siteurl}statics/zt/images/designerupload_modelli1.png">
                        <div class="grey">
                            <img src="{$config_siteurl}statics/zt/images/browse_grey.png"><span>123456</span>
                            <img src="{$config_siteurl}statics/zt/images/heart_grey.png"><span>234</span>
                            <p class="partner">
                                <img src="{$config_siteurl}statics/zt/images/sina_grey.png">
                                <img src="{$config_siteurl}statics/zt/images/qq_grey.png">
                            </p>
                        </div>
                        <p>[B335-1]棕色类型：家居行业类设计公师常用模版</p>
                    </li>
                </ul>
                <input type="hidden" name="previewstatus" value="1">
                <input type="hidden" name="id" value="{$info['id']}">
                <div class="btn">
                    <a href="javascript:void(0)">预览</a>
                    <a href="javascript:void(0)">发布</a>
                </div>
              </form>
            </div>
         
        </div>
    </div>
    <div class="clear"></div>
</div>

<script type="text/javascript">

    <?php
        $alowexts = "jpg|jpeg|gif|bmp|png";
    $thumb_ext = ",";
    $watermark_setting = 0;
    $module = "Seller";
    $catid = "0";
    $max = 1;
    $authkey = upload_key("$max,$alowexts,1,$thumb_ext,$watermark_setting");
    ?>
    function upfile(id){
        flashupload(id+'_images', '图片上传',id,submit_pic,'{$max},{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }
    function submit_pic(uploadid,returnid){
        var d = uploadid.iframe.contentWindow;
        var in_content = d.$("#att-status").html().substring(1);
        var in_filename = d.$("#att-name").html().substring(1);
        var str = $('#' + returnid+'_div').html();
        var contents = in_content.split('|');
        var filenames = in_filename.split('|');
        if (contents == '') return true;
        $.each(contents, function (i, n) {
            var ids = parseInt(Math.random() * 10000 + 10 * i);
            var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
            str += "<div id='"+returnid+"image"+ids+"'><input type='hidden' name='"+returnid+"' value='" + n + "'><img src='"+n+"'><br><a href=\"javascript:remove_div('"+returnid+"image" + ids + "')\" class='tupian' >删除</a></div>";
        });
        $('#' + returnid+'_div').html(str);
    }
	
	$(".btn a").click(function(){
		$("[name='previewstatus']").val($(this).index()+1);
        if($(this).index()==0){
            $("#form_upload").attr("target","_blank");
        }else{
            $("#form_upload").attr("target","");
        }
		$("#form_upload").submit();
	})

</script>

<!--背景容器-->
<template file="common/_promise.php"/>
<template file="Seller/common/_footer.php"/>
</body>
</html>
