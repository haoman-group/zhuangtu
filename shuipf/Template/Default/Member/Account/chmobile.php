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
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
</head>
<body>
  <!--背景容器-->
  <div class="seller_accounttopbg conwhole">
    <!--保护容器-->
    <div class="seller_accounttop">
      <img src="{$config_siteurl}statics/zt/images/logo_04.png">
      <span>身份验证</span>
      <ul>
        <li>
          你好，
          <span>{$username}</span>
        </li>
        <li>
          <span><a href="{:U('Member/Index/logout')}">退出</a></span>
        </li>
        <li><a href="{:U('Member/Index/index')}">我的装途</a></li>
      </ul>
    </div>
  </div>

  <eq name="step" value="1">
    <div class="seller_accountmain">
      <h5>
        您正在为账户
        <span>{$username}（{$userinfo['mobile']|hidtel})</span>
        修改手机，请选择身份验证方式：
      </h5>
      <div class="verify">
        <img src="{$config_siteurl}statics/zt/images/seller_account_verifyphone.png"> 通过“手机验证码+证件号码”
        <a href="{:U('chmobile',array('step'=>2,'type'=>1))}" class="btn_verify">立即认证</a>
      </div>
       <if condition="!empty($userinfo['email'])">
      <div class="verify">
        <img src="{$config_siteurl}statics/zt/images/seller_account_verifyphone.png"> 通过“邮箱验证码”验证身份
        <a href="{:U('chmobile',array('step'=>2,'type'=>2))}" class="btn_verify">立即认证</a>
      </div>
      </if>
      <div class="verify">
        <img src="{$config_siteurl}statics/zt/images/seller_account_verifyperson.png"> 通过人工服务
        <span>（请拨打400客服电话申请修改）</span>
      </div>
    </div>
  </eq>

  <eq name="step" value="2">
    <div class="seller_accountmain">
      <div class="processb">
        <div class="process">
          <div class="degree"></div>
        </div>
        <span class="tit titred">验证身份</span>
        <span class="tit">修改手机</span>
        <span class="tit">完成</span>
      </div>
      <h6>
        您正在使用
        <span>手机验证码+证件号码</span>
        验证身份，请完成以下操作
      </h6>
      <form id="form_verify" action="{:U('chmobile')}" method="post">
        <dl>
          <if condition="$type == 1">
          <dt>您的手机：</dt>
          <dd>
            <input type="text" class="phone" name="mobile" value="{$userinfo['mobile']}" disabled="true">
          </dd>
          <dt></dt>
          <dd>
            <input type="button" value="点此免费获取验证码" class="btnsellerregfrom_verify_click getverifycode" />
            <input type="hidden" name="type" value="1"/>
          </dd>
           <else/>
            <dt>您的邮箱：</dt>
            <dd>
              <input type="text" class="phone" value="{$userinfo['email']}" name="email" disabled="true">
              <input type="hidden" name="type" value="2"/>
            </dd>
            <dt></dt>
            <dd>
              <!--<input type="button" class="getverifycode" value="点此免费获取"></dd>-->
              <input type="button" value="点此免费获取验证码" class="btnsellerregfrom_verify_click_email" />
            </dd>
          </if>
          <dt>验证码：</dt>
          <dd>
            <input type="text" name="smscode" class="verifycode" placeholder="6位数字">
          </dd>
          <if condition="$userinfo['isbuyer'] != '1'">
            <dt>证件号码：</dt>
            <dd class="idcard">
              <input type="text" name="idcard">
              <p>请输入您认证的证件号，个人用户可使用身份证号码，企业用户可使用营业执照注册号等</p>
            </dd>
          </if>
          <dt></dt>
          <dd>
            <input type="hidden" name="act" value="verify">
            <a class="sure" href="javascript:$('#form_verify').submit()">确定</a>
            <a class="return" href="{:U('chmobile')}">重新选择验证方式</a>
          </dd>
        </dl>
      </form>
      <div class="tip">
        <h4>没收到短信验证码？</h4>
        <p>1、网络通讯异常可能会造成短信丢失，请重新获取或稍后再试。</p>
        <p>2、请核实手机是否欠费停机，或者屏蔽了系统短信。</p>
        <p>3、如果手机已丢失或停用，请选择其他验证方式。</p>
      </div>
    </div>
  </eq>

  <eq name="step" value="3">

    <div class="seller_accountmain">
      <div class="processb">
        <div class="process">
          <div class="degree degreered"></div>
        </div>
        <span class="tit titred">验证身份</span>
        <span class="tit titred">修改手机</span>
        <span class="tit">完成</span>
      </div>
      <h6>我们不会泄露您的手机信息</h6>
      <form id="form_change" action="{:U('chmobile')}" method="post">
        <dl>
          <!--<dt>国家/地区：</dt>-->
          <!--<dd>-->
          <!--  <select>-->
          <!--    <option>中国大陆</option>-->
          <!--    <option>香港</option>-->
          <!--    <option>英</option>-->
          <!--    <option>俄</option>-->
          <!--    <option>日</option>-->
          <!--    <option>法</option>-->
          <!--  </select>-->
          <!--</dd>-->
          <dt>原始号码：</dt>
          <dd>
            <span class="refrom_num86">+86</span>
            <input type="text" class="phone" disabled="true" value="{$userinfo['mobile']}">
          </dd>
          <dt>新电话号码：</dt>
          <dd>
            <span class="refrom_num86">+86</span>
            <input type="text" class="phone" name="new_phone" onkeyup="checkMobileNum(this)" /><i class="error" id='tips'></i> </dd>
          <!--<dt></dt>-->
          <!--<dd>-->
          <!--<input type="button" class="btnsellerregfrom_verify getverifycode" value="点此免费获取验证码" name="passverify"></dd>-->
          <dt>验证码：</dt>
          <dd>
            <input type="text" name="vcode" class="verifycode" placeholder="">
            <img align="absmiddle" src="{:U("Api/Checkcode/index","type=chmobile&code_len=4&font_size=14&width=100&height=39&font_color=&background=")}" onclick="changeAuthCode()" title="看不清？点击更换" id="authCode" />
            <dt></dt>
            <dd>
              <!--below edit by f-->
              <input type="hidden" name="act" value="new_mobile">
              <!--  <a class="sure" href="Seller_accountphone4.html">确定</a>-->
              <a class="sure" href="javascript:$('#form_change').submit()">确定</a>
              <!--above edit by f-->
            </dd>
        </dl>
      </form>
      <div class="tip">
        <h4>没收到短信验证码？</h4>
        <p>1、网络通讯异常可能会造成短信丢失，请重新获取或稍后再试。</p>
        <p>2、请核实手机是否欠费停机，或者屏蔽了系统短信。</p>
        <p>3、如果手机已丢失或停用，请选择其他验证方式。</p>
      </div>
    </div>

  </eq>
  <eq name="step" value="4">

    <div class="seller_accountmain">
      <div class="processb">
        <div class="process">
          <div class="degree degreered"></div>
        </div>
        <span class="tit titred">验证身份</span>
        <span class="tit titred">修改手机</span>
        <span class="tit">完成</span>
      </div>
      <h6>我们不会泄露您的手机信息</h6>
      <form id="form_change" action="{:U('chmobile')}" method="post">
        <dl>
          <dt>原始号码：</dt>
          <dd>
            <span class="refrom_num86">+86</span>
            <input type="text" class="phone" disabled="true" value="{$userinfo['mobile']}">
          </dd>
          <dt>新电话号码：</dt>
          <dd>
            <span class="refrom_num86">+86</span>
            <input type="text" class="phone" readonly name="mobile" value="{$mobile}" onkeyup="checkMobileNum(this)" /><i class="error" id='tips'></i> </dd>
          <!--<dt></dt>-->
          <dd>
            <input type="button" class="btnsellerregfrom_verify getverifycode" value="点此免费获取验证码" name="passverify">
          </dd>
          <dt>验证码：</dt>
          <dd>
            <input type="text" name="smscode" class="verifycode" placeholder="">
            <dt></dt>
            <dd>
              <!--below edit by f-->
              <input type="hidden" name="act" value="change">
              <!--  <a class="sure" href="Seller_accountphone4.html">确定</a>-->
              <a class="sure" href="javascript:$('#form_change').submit()">确定</a>
              <!--above edit by f-->
            </dd>
        </dl>
      </form>
      <div class="tip">
        <h4>没收到短信验证码？</h4>
        <p>1、网络通讯异常可能会造成短信丢失，请重新获取或稍后再试。</p>
        <p>2、请核实手机是否欠费停机，或者屏蔽了系统短信。</p>
        <p>3、如果手机已丢失或停用，请选择其他验证方式。</p>
      </div>
    </div>

  </eq>
  <eq name="step" value="5">
    <div class="seller_accountmain">
      <div class="success">
        <img class="left" src="{$config_siteurl}statics/zt/images/right_rgreen.png">
        <div class="left">
          <span>修改成功，您的手机号码为{$new_mobile}</span>
          <p>您可以使用该手机进行相关验证。</p>
          <!--<if condition="$userinfo['isbuyer'] != '1'">-->
          <a href="{:U('Member/Index/index')}">返回我的装途</a>
          <!--<else/>-->
          <!--<a href="{:U('Buyer/Index/index')}">返回我的装途</a>-->
          <!--</if>-->
        </div>
      </div>
    </div>
  </eq>

  <template file="common/_footer.php" />
</body>
<script type="text/javascript">
      function changeAuthCode () {
        var num = new Date().getTime();
        var rand = Math.round(Math.random() * 10000);
        var num = num + rand;
        $("#authCode").attr('src', $("#authCode").attr('src') + "&refresh=1&t=" + num);
    }
 //验证手机号是否合法可用
  function checkMobileNum(obj){
    var MoblieNum = $(obj).val();
    if((MoblieNum.length != 11 ) || isNaN(MoblieNum)){
      $("#tips").text('手机号码至少为11位数字!');
    }else{
      $.ajax({url:'/Api/User/checkMobile',
              type:'post',
              data:'mobile='+MoblieNum,
              success:function(data){
                var data = $.parseJSON(data);
                if(data['status'] == 1){
                   $("#tips").text("手机号可用！");
                }else{
                  $("#tips").text(data['msg']);
                }
              },
              error:function(data){
                var data = $.parseJSON(data);
                $("#tips").text(data['msg']);
              }
      });
    }
  }
  </script>
</html>
