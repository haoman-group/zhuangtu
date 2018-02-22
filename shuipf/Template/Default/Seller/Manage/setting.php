<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>店铺设置</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <template file="common/_global_js.php"/>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</head>
<body>
  <template file="common/_header.php"/>
  
  <div class="container sellercenter_wrap scindex">

    <template file="Seller/common/_left.php"/>

    <div class="wraprt">
<!--      <div class="scenterstatus">-->
<!--        <if condition="date('H') lt 12"><div class="timetip">上午好！愿你度过这美好的一天！</div></if>-->
<!--        <if condition="date('H') egt 12"><div class="timetip noon">下午好！喝杯咖啡放松一下吧！</div></if>-->
<!--      </div>-->
        <div class="crumbs">
            <a href="{:U('Seller/Index/index')}" class="cat-ajx">卖家中心</a>
            <a href="#" class="icon-ajx"> > </a>
            <a href="{:U('Seller/Index/index')}" class="icon-ajx">店铺管理 </a>
            <a href="#" class="icon-ajx"> > </a>
            <a href="{:U('Seller/Manage/setting')}" class="icon-ajx">店铺设置 </a>


        </div>
      <div class="designerupload_main">
            <h4>填写设计信息</h4>
            <div class="margin">
              <form id="form_upload" action="{:U('setting')}" method="post">
                <h6>基本信息</h6>
                <dl class="information">
                    <dt>
                        店铺名称 ：
                        <em></em>
                    </dt>
                    <dd>
                        <input type="text" name="shopname" class="name" value="{$info['name']}" readonly>
                        
                    </dd>
                    <dt>
                        店铺标志：
                        <em></em>
                    </dt>
                    <dd class="img_upload">
                        <a onclick="upfile('logo_picture')"><img src="{$config_siteurl}statics/zt/images/sellerdologin/Seller_register04img_upload2.jpg" >上传图片</a>

                 <ul class="img" id="logo_picture">
          <?php
           if($info['logo'] != ''){
              echo "<li id='image_logo'><input type='hidden' name='logo' value='".$info['logo']."'><img src='";
              echo $info['logo'];
              echo "'><br><a href=\"javascript:remove_div('image_logo";
              echo "')\" class='tupian' >删除</a></li>";
            }
            ?>
          </ul>
                        <!--<if condition="empty($info['picture'])">-->
                        <!--  <if condition="empty(session('designer_preview')['picture'])">-->
                        <!--    <div id="designer_picture_div"></div>-->
                        <!--    <else />-->
                        <!--    <div id="designer_picture_div">-->
                        <!--        <div id="designer_pictureimage9126">-->
                        <!--            <input type="hidden" name="designer_picture" value="{:session('designer_preview')['picture']}">-->
                        <!--            <img src="{:session('designer_preview')['picture']}"><br>-->
                        <!--            <a href="javascript:remove_div('designer_pictureimage9126')" class="tupian">删除</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--  </if>-->
                        <!--<else/>-->
                        <!--    <div id="designer_picture_div">-->
                        <!--        <div id="designer_pictureimage9126">-->
                        <!--            <input type="hidden" name="designer_picture" value="{$info['picture']}">-->
                        <!--            <img src="{$info['picture']}"><br>-->
                        <!--            <a href="javascript:remove_div('designer_pictureimage9126')" class="tupian">删除</a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</if>-->
                    </dd>

                    <dt>
                        店铺形象 ：
                        <em></em>
                    </dt>
                    <dd class="img_upload">
                        <a onclick="upfile('head_pic')"><img src="{$config_siteurl}statics/zt/images/sellerdologin/Seller_register04img_upload2.jpg" >上传图片</a>
           <ul class="img" id="head_pic">
          <?php
            if($info['headpic'] !=''){
              echo "<li id='imageheadpic'><input type='hidden' name='headpic' value='".$info['headpic']."'><img src='";
              echo $info['headpic'];
              echo "'><br><a href=\"javascript:remove_div('imageheadpic";
              echo "')\" class='tupian' >删除</a></li>";
            }
            ?>
          </ul>
                    <!--<dd class="img_upload">-->
                    <!--    <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('designer_picture')">-->

                    <!--    <if condition="empty($info['picture'])">-->
                    <!--      <if condition="empty(session('designer_preview')['picture'])">-->
                    <!--        <div id="designer_picture_div"></div>-->
                    <!--        <else />-->
                    <!--        <div id="designer_picture_div">-->
                    <!--            <div id="designer_pictureimage9126">-->
                    <!--                <input type="hidden" name="designer_picture" value="{:session('designer_preview')['picture']}">-->
                    <!--                <img src="{:session('designer_preview')['picture']}"><br>-->
                    <!--                <a href="javascript:remove_div('designer_pictureimage9126')" class="tupian">删除</a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--      </if>-->
                    <!--    <else/>-->
                    <!--        <div id="designer_picture_div">-->
                    <!--            <div id="designer_pictureimage9126">-->
                    <!--                <input type="hidden" name="designer_picture" value="{$info['picture']}">-->
                    <!--                <img src="{$info['picture']}"><br>-->
                    <!--                <a href="javascript:remove_div('designer_pictureimage9126')" class="tupian">删除</a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </if>-->
                    <!--</dd>-->
                    <dt>
                        <if condition="$shoup_category eq 1">工作室简介：
                        <elseif condition="$shop_category eq 2"/>个人简介：
                        <else/>店铺简介：
                        </if>
                        <em></em>
                    </dt>
                    <dd>
                        <textarea name="introduce" style="resize: none">{$info['introduce']}</textarea>
                    </dd>
                    <dt>
                        联系地址 ：
                        <em></em>
                    </dt>

                    <dd>
                        <input type="text" name="addr" value="{$info['addr']}">
                    </dd>
                    <dt>
                        联系电话 ：
                        <em></em>
                    </dt>

                    <dd>
                        <input type="text" name="phone" value="{$info['phone']}">
                    </dd>
                    <dt>
                      从业年限：
                      <em></em>
                    </dt>
                    <dd >
                      <input type="text" name="years" value="{$info['years']}" >
                    </dd>
                    <dt>
                        主要货源 ：
                        <em></em>
                    </dt>
                    <dd>
                        <input type="hidden" name="goodsfrom" class="refreshclear" data-default-v="<?php  echo  ($info['goodsfrom'] =="")?1:$info['goodsfrom']; ?>" data-inpname="inpgoodsfrom" value="{$info['goodsfrom']}">
          <em data-v="1" data-radioname="goodsfrom_1" data-toinpname="inpgoodsfrom" data-group="goodsfrom_group" class="<?php echo ($info['goodsfrom'] ==1)?"bindinput radiogroup radiogrey on":"bindinput radiogroup radiogrey" ?>"></em> 
          <label data-forradio="goodsfrom_1" class="forradio">自己生产</label>
          <em data-v="2" data-radioname="goodsfrom_2" data-toinpname="inpgoodsfrom" data-group="goodsfrom_group" class="<?php echo ($info['goodsfrom'] ==2)?"bindinput radiogroup radiogrey on":"bindinput radiogroup radiogrey" ?>"></em>
          <label data-forradio="goodsfrom_2" class="forradio">分销代销</label>
          <em data-v="3" data-radioname="goodsfrom_3" data-toinpname="inpgoodsfrom" data-group="goodsfrom_group" class="<?php echo ($info['goodsfrom'] ==3)?"bindinput radiogroup radiogrey on":"bindinput radiogroup radiogrey" ?>"></em>
          <label data-forradio="goodsfrom_3" class="forradio">代理</label>
          <em data-v="4" data-radioname="goodsfrom_4" data-toinpname="inpgoodsfrom" data-group="goodsfrom_group" class="<?php echo ($info['goodsfrom'] ==4)?"bindinput radiogroup radiogrey on":"bindinput radiogroup radiogrey" ?>"></em>
          <label data-forradio="goodsfrom_4" class="forradio">线下批发市场</label>
          <em data-v="5" data-radioname="goodsfrom_5" data-toinpname="inpgoodsfrom" data-group="goodsfrom_group" class="<?php echo ($info['goodsfrom'] ==5)?"bindinput radiogroup radiogrey on":"bindinput radiogroup radiogrey" ?>"></em>
          <label data-forradio="goodsfrom_5" class="forradio">自由公司渠道</label>
                    </dd>
                    <dt>
                        详细介绍：
                        <em></em>
                    </dt>
                     <dd>
                        <textarea name="detail" style="resize:none">{$info['detail']}</textarea>
                    </dd>

                    
                </dl>
                
                
                <div class="btn">
                    <a href="javascript:$('#form_upload').submit()">提交</a>
                    
                </div>
              </form>
            </div>
         
        </div>

    </div>
    <div class="clear"></div>
  </div>
  <template file="common/_promise.php"/>
  <template file="Seller/common/_footer.php"/>

<script type="text/javascript">
    //全局变量
    var GV = {
      DIMAUB: "{$config_siteurl}",
      JS_ROOT: "{$config_siteurl}statics/js/"
    };
    </script>
<script src="{$config_siteurl}statics/js/wind.js"></script>
<script src="{$config_siteurl}statics/js/common.js"></script>

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
</body>
</html>