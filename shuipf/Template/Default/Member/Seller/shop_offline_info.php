<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
    <template file="common/_global_js.php"/>
    <script type="text/javascript" src="{$config_siteurl}statics/js/wind.js"></script>
    <link href="{$config_siteurl}statics/js/artDialog/skins/default.css" rel="stylesheet" />
</head>
<body bgcolor="#FFFFFF">
  <template file="common/_header.php"/>
  <div class="seller_reg_process_ul">
    <ul>
      <li >
        <em></em>
        <span>1.商家注册</span>
      </li>
      <li>
        <em></em>
        <span>2.申请开店</span>
      </li>
      <li >
        <em></em>
        <span>3.绑定银行卡</span>
      </li>
      <li class="on">
        <em></em>
        <span>4.资质审核</span>
      </li>
      <li>
        <em></em>
        <span>5.创建店铺</span>
      </li>
      <li>
        <em></em>
        <span>6.店铺上线</span>
      </li>
    </ul>
  </div>
  <!--内容-->
  <!--保护容器-->
  <div class="container">
    <div class="seller_main">
      <ul class="guocheng">
        <li class="on">
          <em><i>1</i></em>
          <span>填写资质信息</span>
        </li>
        <li >
          <em><i>2</i></em>
          <span>等待人工审核</span>
        </li>
        <li>
          <em><i>3</i></em>
          <span>查看审核结果</span>
        </li>
      </ul>
      <div class="qualification">
        <form id="form_info" action="{:U('shop_offline_info')}" method="post">
          <div class="formhead"> <strong>线上审核证</strong>
          </div>
          <h5>会员信息校验</h5>
          <dl class="dlinfofilled">
            <dt>
              会 员 账 号： <em></em>
            </dt>
            <dd> <strong>{$userinfo['username']}</strong>
            </dd>
            <dt>
              手 机 号 码： <em></em>
            </dt>
            <dd>
              <strong>{$userinfo['mobile']}</strong>
            </dd>

          </dl>
          <h5>店铺信息校验</h5>
          <dl class="dlinfofilled">
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
            </dt>
            <dd>
              <strong>{$userinfo['truename']}</strong>
            </dd>
            <dt>
              开   户   行：
              <em></em>
            </dt>
            <dd>
              <strong>{$userinfo['bank']}</strong>
            </dd>
            <dt>
              银 行 卡 号：
              <em></em>
            </dt>
            <dd>
              <strong>{$userinfo['bank_card_number']}</strong>
            </dd>
          </dl>
          <h5>申请资质信息</h5>
          
            <div class="form">
              <div class="head_ul chtitul" data-tag="zizhi">
                <div class="head_li chtitli <eq name="userinfo[type]" value="0">chtitli on</eq>  <eq name="userinfo[type]" value="2">on</eq>" data-v="2">
                  <p>公司资质信息</p><span>公司资质信息</span>
                </div>
                <div class="head_li chtitli <eq name="userinfo[type]" value="0">chtitli</eq> <eq name="userinfo[type]" value="1">on</eq>" data-v="1">
                <p>个人资质信息</p><span>个人资质信息</span>
                </div>
              </div>
              <div class="chconul" data-tag="zizhi">
              <dl class="chconli" <eq name="userinfo[type]" value="1">style="display:none;"</eq>>
                <dt>
                  公 司 名 称：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" class="inptverify" placeholder="XXX" name="company_name" value="{$audit.company_name}"/>
                </dd>
                <dt>
                  营业执照号：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" class="inptverify" placeholder="XXX" name="business_licence_number"  value="{$audit.business_licence_number}"/>
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
                  <input type="text" class="inptverify" name="business_scope"  value="{$audit.business_scope}"/>
                </dd>
                <dt>
                  代 理 品 牌：
                  <em></em>
                </dt>
                <dd>
                  <input type="text" class="inptverify" placeholder="XXX" name="agent_brand"   value="{$audit.agent_brand}"/>
                </dd>
                <dt>
                  营 业 执 照：
                  <em></em>
                </dt>
                <dd  class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('business_licence_picture')">
                  <span class="preview btnshowfix" data-tarfix="fix_business_licence"></span>
                  <span class="imgupdemand">请上传正面照、反面照；图片字迹清晰可见；最大不超过10M</span>
                  <!--<div class="pre_picbox jsaddimgdiv" id="business_licence_picture_div">-->
                  <!--  <volist name="audit[business_licence_picture]" id="v">-->
                  <!--    <div id='business_licence_picture_image_{$i}'>-->
                  <!--      <input type='hidden' name='business_licence_picture[]' value='{$v}'>                      -->
                  <!--      <img src='{$v}'>                      -->
                  <!--      <br>                      -->
                  <!--      <a href="javascript:remove_div('business_licence_picture_image_{$i}')" class='tupian' >删除</a>-->
                  <!--    </div>-->
                  <!--  </volist>-->
                  <!--</div>-->
                  <ul id="business_licence_picture" class="jsaddimgul">
                    <for start="0" end="4">
                      <if condition="$audit[business_licence_picture][$i] neq ''">
                        <li class=''>
                          <input type="hidden" name="business_licence_picture_url[]" value="{$audit[business_licence_picture][$i]}">
                          <img src="{$audit[business_licence_picture][$i]}">
                          <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                        </li>
                      <else/>
                        <li class="noimg"></li>
                      </if>
                    </for>
                  </ul>
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
                  <span class="imgupdemand">请上传正面照、反面照；图片字迹清晰可见；最大不超过10M</span>
                  <!--<div class="pre_picbox jsaddimgdiv" id="corporation_picture_div">-->
                    
                  <!--  <volist name="audit[corporation_picture]" id="v">-->
                  <!--    <div id='corporation_picture_image_{$i}'>-->
                  <!--      <input type='hidden' name='corporation_picture[]' value='{$v}'>                      -->
                  <!--      <img src='{$v}'>                      -->
                  <!--      <br>                      -->
                  <!--      <a href=\"javascript:remove_div('corporation_picture_image_{$i}')\" class='tupian' >删除</a>-->
                  <!--    </div>-->
                  <!--  </volist>-->

                  <!--</div>-->
                  <ul id="corporation_picture" class="jsaddimgul">
                    <for start="0" end="4">
                      <if condition="$audit[corporation_picture][$i] neq ''">
                        <li class=''>
                          <input type="hidden" name="corporation_picture_url[]" value="{$audit[corporation_picture][$i]}">
                          <img src="{$audit[corporation_picture][$i]}">
                          <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                        </li>
                      <else/>
                        <li class="noimg"></li>
                      </if>
                    </for>
                  </ul>
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
                  <span class="imgupdemand">请上传正面照、反面照；图片字迹清晰可见；最大不超过10M</span>
                  <!--<div class="pre_picbox jsaddimgdiv" id="corporation_idcard_picture_div">-->
                  <!--  <volist name="audit[corporation_idcard_picture]" id="v">-->
                  <!--    <div id='corporation_idcard_picture_image_{$i}'>-->
                  <!--      <input type='hidden' name='corporation_idcard_picture[]' value='{$v}'>                      -->
                  <!--      <img src='{$v}'>                      -->
                  <!--      <br>                      -->
                  <!--      <a href=\"javascript:remove_div('corporation_idcard_picture_image_{$i}')\" class='tupian' >删除</a>-->
                  <!--    </div>-->
                  <!--  </volist>-->
                  <!--</div>-->
                  <ul id="corporation_idcard_picture" class="jsaddimgul">
                    <for start="0" end="4">
                      <if condition="$audit[corporation_idcard_picture][$i] neq ''">
                        <li class=''>
                          <input type="hidden" name="corporation_idcard_picture_url[]" value="{$audit[corporation_idcard_picture][$i]}">
                          <img src="{$audit[corporation_idcard_picture][$i]}">
                          <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                        </li>
                      <else/>
                        <li class="noimg"></li>
                      </if>
                    </for>
                  </ul>
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
                  <input type="text" class="inptverify" placeholder="XXX" name="corporation_phone"   value="{$audit.corporation_phone}"/>
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
                  <input type="text" class="inptverify" name="agent_brand_name"   value="{$audit.agent_brand_name}"/>
                </dd>
                <dt>
                  <p>代理级别：</p>
                </dt>
                <dd>
                  <input type="text" class="inptverify" name="agent_level" value="{$audit.agent_level}" />
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
                  <span class="imgupdemand">请上传正面照、反面照；图片字迹清晰可见；最大不超过10M</span>
                  <!--<div class="pre_picbox jsaddimgdiv" id="agent_authorize_picture_div">-->
                  <!--  <volist name="audit[agent_authorize_picture]" id="v">-->
                  <!--    <div id='agent_authorize_pictureimage_{$i}'>-->
                  <!--      <input type='hidden' name='agent_authorize_picture[]' value='{$v}'>                      -->
                  <!--      <img src='{$v}'>                      -->
                  <!--      <br>                      -->
                  <!--      <a href=\"javascript:remove_div('agent_authorize_picture_image_{$i}')\" class='tupian' >删除</a>-->
                  <!--    </div>-->
                  <!--  </volist>-->
                  <!--</div>-->
                   <ul id="agent_authorize_picture" class="jsaddimgul">
                    <for start="0" end="4">
                      <if condition="$audit[agent_authorize_picture][$i] neq ''">
                        <li class=''>
                          <input type="hidden" name="agent_authorize_picture_url[]" value="{$audit[agent_authorize_picture][$i]}">
                          <img src="{$audit[agent_authorize_picture][$i]}">
                          <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                        </li>
                      <else/>
                        <li class="noimg"></li>
                      </if>
                    </for>
                  </ul>
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
                  <input type="text" name="shop_phone" value="{$audit.shop_phone}" />
                </dd>
                <dt>
                  <p>店铺照片：</p>
                </dt>
                <dd  class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('shop_picture')">
                  <span class="preview"></span>
                  <!--<div id="shop_picture_div" class="jsaddimgdiv">-->
                  <!--  <volist name="audit[shop_picture]" id="v">-->
                  <!--    <div id='shop_picture_image_{$i}'>-->
                  <!--      <input type='hidden' name='shop_picture[]' value='{$v}'>                      -->
                  <!--      <img src='{$v}'>                      -->
                  <!--      <br>                      -->
                  <!--      <a href=\"javascript:remove_div('shop_picture_image_{$i}')\" class='tupian' >删除</a>-->
                  <!--    </div>-->
                  <!--  </volist>-->
                  <!--</div>-->
                      <ul id="shop_picture" class="jsaddimgul">
                    <for start="0" end="4">
                      <if condition="$audit[shop_picture][$i] neq ''">
                        <li class=''>
                          <input type="hidden" name="shop_picture_url[]" value="{$audit[shop_picture][$i]}">
                          <img src="{$audit[shop_picture][$i]}">
                          <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                        </li>
                      <else/>
                        <li class="noimg"></li>
                      </if>
                    </for>
                  </ul>
                </dd>
              </dl>
              <dl class="chconli" <eq name="userinfo[type]" value="0">style="display:none;"</eq><eq name="userinfo[type]" value="2">style="display:none;"</eq>>
                <dt>
                  真 实 姓 名：
                  <em></em>
                </dt>
                <dd>
                  <input class="inptverify" type="text"  name="truename" placeholder="XXX" value="{$userinfo.truename}" />
                </dd>
                <dt>
                  性       别：
                  <em></em>
                </dt>
                <dd class="hasradio">
                  <input type="radio" name="sex" value="1" id="comnan" <eq name="userinfo['sex']" value='1'>checked</eq>><label for="comnan">男</label>
                  <input type="radio" name="sex" value="2" id="comnv"  <eq name="userinfo['sex']" value='2'>checked</eq>><label for="comnv">女</label>

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
                  <input class="inptverify" type="text" value="{$audit.age}" name="age" />
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


                </dd>
                <dt>证件号：</dt>
                <dd><input class="inptverify" type="text" class="card" name="idcard" value="{$userinfo.idcard}" /></dd>
                <dt>
                  证件所在地：
                  <em></em>
                </dt>
                <dd>
                  <input class="inptverify" type="text" name="idcard_address" placeholder="XXX" value="{$userinfo.idcard_address}" />
                </dd>
                <dt>
                  联 络 方 式：
                  <em></em>
                </dt>
                <dd>
                  <input class="inptverify" type="text" name="phone" value="{$audit.phone}" />
                </dd>
                <dt>
                  联 系 地 址：
                  <em></em>
                </dt>
                <dd>
                  <input class="inptverify" type="text" name="address" value="{$audit.address}" />
                </dd>

                <dt>
                  紧急联络人：
                  <em></em>
                </dt>
                <dd>
                  <input class="inptverify" type="text" name="emergency_contactor" value="{$audit.emergency_contactor}" />
                </dd>
                <dt>
                  联 络 方 式：
                  <em></em>
                </dt>
                <dd>
                  <input class="inptverify" type="text" name="emergency_phone" value="{$audit.emergency_phone}" />
                </dd>
                <dt>
                  联 系 地 址：
                  <em></em>
                </dt>
                <dd>
                  <input class="inptverify" type="text" name="emergency_address" value="{$audit.emergency_address}" />
                </dd>
                <dt>
                  实 名 认 证：
                  <em></em>
                </dt>
                <dd class="img_upload">
                  <img src="{$config_siteurl}statics/zt/images/Seller_register04img_upload.png" onclick="upfile('realname_picture')">
                  <span>请上传手持身份证半身照，身份证正、反面照；画面清晰；最大不超过2M</span>
                  <div></div>
                </dd>
                <dt></dt>
                <dd>
                  <ul id="realname_picture" class="jsaddimgul">
                    <for start="0" end="4">
                      <if condition="$audit[realname_picture][$i] neq ''">
                        <li class=''>
                          <input type="hidden" name="realname_picture_url[]" value="{$audit[realname_picture][$i]}">
                          <img src="{$audit[realname_picture][$i]}">
                          <div class="operate"><span class="sl"></span><span class="sr"></span><a href="javascript:void(0)" class="tupian"></a></div>
                        </li>
                      <else/>
                        <li class="noimg"></li>
                      </if>
                    </for>
                  </ul>
                </dd>
              </dl>
              
              </div>
              
              
            </div>


          

          <!--<h5>店铺信息校验</h5>
          <dl>
            <dt>
              店 铺 命 名：
              <em></em>
            </dt>
            <dd>
              <input type="text" name="online_shop_name" />
            </dd>
            <p class="care">注：如需修改店铺名称请拨打400客服电话</p>
            <dt>
              店 铺 域 名：
              <em></em>
            </dt>
            <dd>
              http://www.zhuangtu.com/shop/
              <input type="text" name="domain" style="width:100px;" />
            </dd>
          </dl>
          href="javascript:$('#form_info').submit()"-->
          <div  class="btnbox btnboxtwo">
            <input type="hidden" name="type" value="2">
            <a href="javascript:$('#form_info').submit()">提交审核</a>
          </div>

          <div class="care">
            注：线上审核通常需要2-3个工作日，审核一旦通过，我们将尽快告知您，请保证通信畅通；
            <br>如果审核不能通过，你可以选择线下审核，如需帮助，请拨打400-003-3030咨询客服.</div>
        </form>
      </div>

      <div class="qualification  toexamine">
        <div class="formhead">
          <strong>线下审核证</strong>
        </div>
        <dl>
          <dt>
            预 约 电 话：
            <em></em>
          </dt>
          <dd>400-003-3030</dd>
          <dt>
            审 核 地 址：
            <em></em>
          </dt>
          <dd>太原市小店区高新区高新街环能科技12层</dd>
          <dt>
            所 需 材 料：
            <em></em>
          </dt>
          <dd>
            企业法人身份证原件及复印件
            <br>
            工商营业执照原件及复印件
            <br>(若为代办，需要增加代办人本人的身份证原件及复印件）</dd>
        </dl>

        <div class="care">
          注：电话预约时间为每周一到周五，10：00-17:00（法定节假日除外），线下审核；
          <br> 通常需要1-2个工作日，审核一旦通过，我们将尽快告知您，请保证通信畅通。</div>
      </div>

    </div>
  </div>

  <template file="common/_footer.php"/>
  
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
	  var $id=$('#' + id).find(".noimg");
	  var maxnum= $id.length;
	  console.log(maxnum);
      flashupload(id+'_images', '图片上传',id,submit_pic, maxnum+',{$alowexts},1,{$thumb_ext},{$watermark_setting}','{$module}','{$catid}','{$authkey}');
    }
	
	
    function submit_pic(uploadid,returnid){
      var d = uploadid.iframe.contentWindow;
      var in_content = d.$("#att-status").html().substring(1);
      var in_filename = d.$("#att-name").html().substring(1);
      /*var str = $('#' + returnid).html();*/
      var contents = in_content.split('|');
      var filenames = in_filename.split('|');
      if (contents == '') return true;
      $.each(contents, function (i, n) {
          var ids = parseInt(Math.random() * 10000 + 10 * i);
          var filename = filenames[i].substr(0, filenames[i].indexOf('.'));
          console.log(ids);
          var str = "<input type='hidden' name='"+returnid+"_url[]' value='" + n + "'><img src='"+n+"'><div class='operate'><span class='sl'></span><span class='sr'></span><a href=\"javascript:void(0)\" class='tupian' ></a></div>";
      	  $('#' + returnid).find(".noimg:first").html(str);
		  $('#' + returnid).find(".noimg:first").removeClass("noimg");
	  });
	  

    }
	
	  	/*图片移动*/
	
	$(".jsaddimgul").on("click","li span",function(){
		var $ul1=$(this).parent().parent();
		if($(this).hasClass("sl")){
			var $ul2=$(this).parent().parent().prev("li");
		}
		else {
			var $ul2=$(this).parent().parent().next("li");
		}
		var ulhtml1=$ul1.html();
		var ulhtml2=$ul2.html();
		$ul1.html(ulhtml2);
		$ul2.html(ulhtml1);
		if($ul2.hasClass("noimg")){
			$ul2.removeClass("noimg");
			$ul1.addClass("noimg");
		}

		
	})
	$(".jsaddimgul").on("click","li a",function(){
		var $li=$(this).parent().parent();
		$li.addClass("noimg");
		$li.empty();
	})


  </script>

  <script type="text/javascript" src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>