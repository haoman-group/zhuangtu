<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
  <!--[if lt IE 9]>
  <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
  <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
<![endif]-->
  <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
  <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
  <script src="{$config_siteurl}statics/zt/js/base.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
  <template file="common/_global_js.php"/>
  <script type="text/javascript" src="{$config_siteurl}statics/js/wind.js"></script>
  <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />

</head>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">添加资质</div>
		  <form name="myform" action="{:U('add')}" method="post" class="J_ajaxForm">
   <div class="container">
    <div class="seller_main">
      <div class="qualification">
        <form id="form_info" action="{:U('add')}" method="post">
          <div class="formhead">
              <strong>线上审核证</strong>
          </div>
          <h5>会员信息校验</h5>
          <dl>
            <dt>
              会 员 账 号： <em></em>
            </dt>
            <dd><strong>{$userinfo['username']}</strong>
            </dd>
            <dt>
              手 机 号 码： <em></em>
            </dt>
            <dd>
              <strong>{$userinfo['mobile']}</strong>
            </dd>
          </dl>
          <h5>店铺信息校验</h5>
          <dl>
            <dt>
              经 营 范 围：
              <em></em>
            </dt>
            <dd>
              <strong>{$shopcate.name}</strong>
            </dd>
            <dt>
              店 铺 级 别：
              <em></em>
            </dt>
            <dd>
              <strong>{$shopcate.shopname}</strong>
            </dd>
            <dt>
              持卡人姓名：
              <em></em>
            </dt>
            <dd>
              <strong>{$userData['truename']}</strong>
            </dd>
            <dt>
              开   户   行：
              <em></em>
            </dt>
            <dd>
              <strong>{$userData['bank']}</strong>
            </dd>
            <dt>
              银 行 卡 号：
              <em></em>
            </dt>
            <dd>
              <strong>{$userData['bank_card_number']}</strong>
            </dd>
          </dl>
          <h5>申请资质信息</h5>
          <input type="text" name="type" value="<eq name="userinfo[type]" value="0">2</eq>" style="display:none;"/>
          <input type="text" name="uid" value="{$userinfo.userid}" style="display:none;"/>

            <div class="form">
              <div class="head_ul chtitul" data-tag="zizhi">
                <div class="head_li <eq name="userinfo[type]" value="0">chtitli on</eq>  <eq name="userinfo[type]" value="2">on</eq>" data-v="2">
                  <p>公司资质信息</p>
                </div>
                <div class="head_li <eq name="userinfo[type]" value="0">chtitli</eq> <eq name="userinfo[type]" value="1">on</eq>" data-v="1">
                <p>个人资质信息</p>
                </div>
              </div>
              <div class="chconul" data-tag="zizhi">
              <dl class="chconli" <eq name="userinfo[type]" value="1">style="display:none;"</eq>>
                <dt>
                  公 司 名 称：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" placeholder="XXX" name="company_name" value="{$audit.company_name}"/>
                </dd>
                <dt>
                  营业执照号：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" placeholder="XXX" name="business_licence_number"  value="{$audit.business_licence_number}"/>
                </dd>
                <dt>
                  执照有效期：
                  <em></em>
                </dt>
                <dd>
                  <php>$business_licence_validity = explode('至',$audit['business_licence_validity'])</php>
                  <Form function="date" class="date" parameter="business_licence_validity[],$business_licence_validity[0],0,"/>
                  <strong>至</strong>
                  <Form function="date" class="date" parameter="business_licence_validity[],$business_licence_validity[1],0"/>
                </dd>
                <dt>
                  主 营 范 围：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" name="business_scope"  value="{$audit.business_scope}"/>
                </dd>
                <dt>
                  代 理 品 牌：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" placeholder="XXX" name="agent_brand"   value="{$audit.agent_brand}"/>
                </dd>
                <dt>
                  营 业 执 照：
                  <em></em>
                </dt>
                <dd  class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('business_licence_picture')">
                  <span class="preview btnshowfix" data-tarfix="fix_business_licence"></span>
                  <div class="pre_picbox" id="business_licence_picture_div">
                    <volist name="audit[business_licence_picture]" id="v">
                      <div id='business_licence_picture_image_{$i}'>
                        <input type='hidden' name='business_licence_picture[]' value='{$v}'>                      
                        <img src='{$v}'>                      
                        <br>                      
                        <a href=\"javascript:remove_div('business_licence_picture_image_{$i}')\" class='tupian' >删除</a>
                      </div>
                    </volist>
                  </div>
                  
                  <div class="fix"></div>
                  <div class="position" id="fix_business_licence">
                       <div class="box">
                            <h3>营业执照范例</h3>
                            <img src="{$config_siteurl}statics/zt/images/Seller_register04img_float4.png" >
                            <p>1、请上传营业执照正面照；<br>2、图片字迹清晰可见；<br>3、照片支持jpg/jpeg/bmp格式，最大不超过10M</p>
                            <div class="close">关闭</div>
                       </div>
                  </div>
                  
                </dd>
                <dt>
                  法 人 照 片：
                  <em></em>
                </dt>
                <dd  class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('corporation_picture')">
                  <span class="preview btnshowfix" data-tarfix="fix_corporation_picture"></span>
                  <div class="pre_picbox" id="corporation_picture_div">
                    
                    <volist name="audit[corporation_picture]" id="v">
                      <div id='corporation_picture_image_{$i}'>
                        <input type='hidden' name='corporation_picture[]' value='{$v}'>                      
                        <img src='{$v}'>                      
                        <br>                      
                        <a href=\"javascript:remove_div('corporation_picture_image_{$i}')\" class='tupian' >删除</a>
                      </div>
                    </volist>

                  </div>
                  
                  <div class="position" id="fix_corporation_picture">
                       <div class="box">
                            <h3>法人半身照范例</h3>
                            <img src="{$config_siteurl}statics/zt/images/Seller_register04img_float2.png" >
                            <p>1、请上传营业执照正面照；<br>2、图片字迹清晰可见；<br>3、照片支持jpg/jpeg/bmp格式，最大不超过10M</p>
                            <div class="close">关闭</div>
                       </div>
                  </div>
                </dd>
                <dt>
                  法人证件照：
                  <em></em>
                </dt>
                <dd  class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('corporation_idcard_picture')">
                  <span class="preview btnshowfix" data-tarfix="fix_corporation_idcard_picture"></span>
                  <div class="pre_picbox" id="corporation_idcard_picture_div">
                    <volist name="audit[corporation_idcard_picture]" id="v">
                      <div id='corporation_idcard_picture_image_{$i}'>
                        <input type='hidden' name='corporation_idcard_picture[]' value='{$v}'>                      
                        <img src='{$v}'>                      
                        <br>                      
                        <a href=\"javascript:remove_div('corporation_idcard_picture_image_{$i}')\" class='tupian' >删除</a>
                      </div>
                    </volist>
                  </div>
                  <div class="position" id="fix_corporation_idcard_picture">
                       <div class="box">
                            <h3>法人证件照范例</h3>
                            <img src="{$config_siteurl}statics/zt/images/Seller_register04img_float3.png" >
                            <p>1、请上传营业执照正面照；<br>2、图片字迹清晰可见；<br>3、照片支持jpg/jpeg/bmp格式，最大不超过10M</p>
                            <div class="close">关闭</div>
                       </div>
                  </div>
                  
                </dd>
                <dt>
                  法 人 电 话：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" placeholder="XXX" name="corporation_phone"   value="{$audit.corporation_phone}"/>
                </dd>
                <dt>
                  代 理 资 质：
                  <em></em>
                </dt>
                <dd></dd>
                <dt>
                  <p>代理品牌：</p>
                </dt>
                <dd>
                  <input type="text" name="agent_brand_name"   value="{$audit.agent_brand_name}"/>
                </dd>
                <dt>
                  <p>代理级别：</p>
                </dt>
                <dd>
                  <input type="text" name="agent_level" value="{$audit.agent_level}" />
                </dd>
                <dt>
                  <p>代理时间：</p>
                </dt>
                <dd>
                  <Form function="date" parameter="agent_start_date,$audit[agent_start_date],0,"/>
                  <strong>至</strong>
                  <Form function="date" parameter="agent_end_date,$audit[agent_end_date],0"/>
                </dd>
                <dt>
                  <p>授权证明：</p>
                </dt>
                <dd  class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('agent_authorize_picture')">
                  <span class="preview btnshowfix" data-tarfix="fix_agent_authorize_picture"></span>
                  <div class="pre_picbox" id="agent_authorize_picture_div">
                    <volist name="audit[agent_authorize_picture]" id="v">
                      <div id='agent_authorize_pictureimage_{$i}'>
                        <input type='hidden' name='agent_authorize_picture[]' value='{$v}'>                      
                        <img src='{$v}'>                      
                        <br>                      
                        <a href=\"javascript:remove_div('agent_authorize_picture_image_{$i}')\" class='tupian' >删除</a>
                      </div>
                    </volist>
                  </div>
                  
                  <div class="position" id="fix_agent_authorize_picture">
                       <div class="box">
                            <h3>代理授权范例</h3>
                            <img src="{$config_siteurl}statics/zt/images/Seller_register04img_float1.png" >
                            <p>1、请上传营业执照正面照；<br>2、图片字迹清晰可见；<br>3、照片支持jpg/jpeg/bmp格式，最大不超过10M</p>
                            <div class="close">关闭</div>
                       </div>
                  </div>
                  
                </dd>
                <dt>
                  实   体   店：
                  <em></em>
                </dt>
                <dd class="hasradio">
                  <input type="radio" name="has_shop" value="1" id="youshiti">
                  <label for="youshiti">是</label>
                  <input type="radio" name="has_shop" value="0" id="wushiti">
                  <label for="wushiti">否</label>
                  
                  <!--<span class="chkredout" name="has_shop">
                    <img src="{$config_siteurl}statics/zt/images/sub-MatPro_conb.png" />
                  </span>
                  <strong>有</strong>
                  <span class="chkredout" name="has_shop">
                    <img src="{$config_siteurl}statics/zt/images/sub-MatPro_conb.png" />
                  </span>
                  <strong>否</strong>-->

                </dd>
                <dt>
                  <p>店铺名称：</p>
                </dt>
                <dd>
                  <input type="text" name="shop_name"   value="{$audit.shop_name}" />
                </dd>
                <dt>
                  <p>店铺地址：</p>
                </dt>
                <dd>
                  <input type="text" name="shop_address"   value="{$audit.shop_address}" />
                </dd>
                <dt>
                  <p>店铺面积：</p>
                </dt>
                <dd>
                  <input type="text" name="shop_area" value="{$audit.shop_area}" />
                </dd>
                <dt>
                  <p>店铺电话：</p>
                </dt>
                <dd>
                  <input type="text" name="shop_phone" value="{$data.shop_phone}" />
                </dd>
                <dt>
                  <p>店铺照片：</p>
                </dt>
                <dd  class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('shop_picture')">
                  <span class="preview"></span>
                  <div id="shop_picture_div">
                    <volist name="audit[shop_picture]" id="v">
                      <div id='shop_picture_image_{$i}'>
                        <input type='hidden' name='shop_picture[]' value='{$v}'>                      
                        <img src='{$v}'>                      
                        <br>                      
                        <a href=\"javascript:remove_div('shop_picture_image_{$i}')\" class='tupian' >删除</a>
                      </div>
                    </volist>
                  </div>
                </dd>
              </dl>
              
              
              <dl class="chconli" <eq name="userinfo[type]" value="0">style="display:none;"</eq><eq name="userinfo[type]" value="2">style="display:none;"</eq>>
                <dt>
                  真 实 姓 名：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" name="truename" placeholder="XXX" value="{$userinfo.truename}" />
                </dd>
                <dt>
                  性       别：
                  <em></em>
                </dt>
                <dd class="hasradio">
                  <input type="radio" name="sex" value="1" id="comnan" ><label for="comnan">男</label>
                  <input type="radio" name="sex" value="2" id="comnv"><label for="comnv">女</label>
                  <!--<span class="chkredout">
                    <img src="{$config_siteurl}statics/zt/images/sub-MatPro_conb.png" />
                  </span>
                  <strong>男</strong>
                  <span class="chkredout">
                    <img src="{$config_siteurl}statics/zt/images/sub-MatPro_conb.png" />
                  </span>
                  <strong>女</strong>-->
                </dd>
                <dt>
                  年 龄：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" value="{$audit.age}" name="age" />
                </dd>
                <dt>
                  证 件 类 型：
                  <em></em>
                </dt>
                <dd>
                  <select>
                    <option>二代身份证</option>
                    <option>一代身份证</option>
                  </select>
                  证件号：
                  <input type="text" name="idcard" class="card" value="{$userinfo.idcard}" />
                </dd>
                <dt>
                  证件所在地：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" placeholder="XXX" name='idcard_address'  value="{$userinfo.idcard_address}" />
                </dd>
                <dt>
                  联 络 方 式：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" name="phone" value="{$audit.phone}" />
                </dd>
                <dt>
                  联 系 地 址：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" name="address" value="{$audit.address}" />
                </dd>

                <dt>
                  紧急联络人：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" name="emergency_contactor" value="{$audit.emergency_contactor}" />
                </dd>
                <dt>
                  联 络 方 式：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" name="emergency_phone" value="{$audit.emergency_phone}" />
                </dd>
                <dt>
                  联 系 地 址：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" name="emergency_address" value="{$audit.emergency_address}" />
                </dd>
                <dt>
                  实 名 认 证：
                  <em></em>
                </dt>
                <dd class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('realname_picture')">
                  <span>请上传手持身份证半身照，身份证正、反面照；画面清晰；最大不超过2M</span>
                  <div id="realname_picture_div"></div>
                </dd>
                <dt></dt>
                <dd>
                  <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>
                </dd>
              </dl>
              </div>
            </div>
    <div class="">
        <div class="btn_wrap_pd" align='center'>
            <!--<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>-->
             <button class="btn btn_submit mr10" type="submit">提交</button>
        </div>
    </div>
  </form>
</div>

  <script>
  $("[data-tag='zizhi'] .chtitli").click(function(){
	 $("[name='type']").val($(this).attr("data-v"));
  })
  </script>
  <script type="text/javascript">

    <?php 
      $alowexts = "jpg|jpeg|gif|bmp|png";
      $thumb_ext = ",";
      $watermark_setting = 0;
      $module = "Seller";
      $catid = "0";
      $max = 5;
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
          str += "<div id='"+returnid+"image"+ids+"'><input type='hidden' name='"+returnid+"[]' value='" + n + "'><img src='"+n+"'><br><a href=\"javascript:remove_div('"+returnid+"image" + ids + "')\" class='tupian' >删除</a></div>";
      });
      $('#' + returnid+'_div').html(str);
    }


  </script>

  <script type="text/javascript" src="{$config_siteurl}statics/js/common.js"></script>
</body>


</html>