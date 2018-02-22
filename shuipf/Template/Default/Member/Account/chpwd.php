<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css" />
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/account.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/account.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/member_change_auth.js"></script>
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
        <span>{$username}（{$userinfo[mobile]|hidtel})</span>
        修改登陆密码，请选择身份验证方式：
      </h5>
      <div class="verify">
        <img src="{$config_siteurl}statics/zt/images/seller_account_verifyphone.png"> 通过“手机验证码+证件号码”
        <a href="{:U('chpwd',array('step'=>2,'type'=>1))}" class="btn_verify">立即认证</a>
      </div>
       <if condition="!empty($userinfo['email'])">
      <div class="verify">
        <img src="{$config_siteurl}statics/zt/images/seller_account_verifyphone.png"> 通过“邮箱验证码”验证身份
        <a href="{:U('chpwd',array('step'=>2,'type'=>2))}" class="btn_verify">立即认证</a>
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
        <span class="tit">修改登录密码</span>
        <span class="tit">完成</span>
      </div>
      <h6>
        您正在使用
        <span>手机验证码+证件号码</span>
        验证身份，请完成以下操作
      </h6>
      <form id="form_verify" action="{:U('chpwd')}" method="post">
        <dl>
          <if condition="$type == 1">
            <dt>您的手机：</dt>
            <dd>
              <input type="text" class="phone" value="{$userinfo['mobile']}" name="mobile" disabled="true">
              <input type="hidden" name="type" value="1"/>
            </dd>
            <dt></dt>
            <dd>
              <!--<input type="button" class="getverifycode" value="点此免费获取"></dd>-->
              <input type="button" value="点此免费获取验证码" class="btnsellerregfrom_verify_click" />
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
            <input class="sellerregfrom_verify_input verifycode inptverify" type="text" name="smscode" placeholder="6位数字" />
            <!--<input type="text" class="verifycode" placeholder="6位数字"></dd>-->
            <if condition="$userinfo['isbuyer'] != '1'">
              <dt>证件号码：</dt>
              <dd class="idcard">
                <input type="text" name="idcard" class="inptverify">
                <p>请输入您认证的证件号，个人用户可使用身份证号码，企业用户可使用营业执照注册号等</p>
              </dd>
            </if>
            <dt></dt>
            <dd>
              <input type="hidden" name="act" value="verify">
              <a class="sure" href="javascript:$('#form_verify').submit()">确定</a>
              <a class="return" href="{:U('chpwd')}">重新选择验证方式</a>
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
          <div class="  degreered"></div>
        </div>
        <span class="tit titred">验证身份</span>
        <span class="tit titred">修改登录密码</span>
        <span class="tit">完成</span>
      </div>
      <h6>请保管好你的密码</h6>
      <form id="form_change" action="{:U('chpwd')}" method="post">
        <dl>
          <dt>当前登录密码：</dt>
          <dd>
            <input type="password" name="oldpassword">
          </dd>
          <dt>新的登陆密码：</dt>
          <dd class="safe">
            <input type="password" name="password" class="inptverify" placeholder="设置你的登录密码" id="password">

            <div class="degree" hidden>
              安全程度：
              <div class="trigonb"></div>
              <div class="trigon"></div>
              <!--安全程度：-->
              <div id="level" class="pw-strength">
                <div class="pw-bar"></div>
                <div class="pw-bar-on"></div>
                <div class="pw-txt">
                  <span>弱</span>
                  <span>中</span>
                  <span>强</span>
                </div>
              </div>
              <div class="pw-tips">
                <p class="enoughRegex">
                  <img class="">密码为6位6-30位字符</p>
                <p class="mediumRegex">
                  <img class="">密码为6位及以上并包含数字、字母和特殊字符中的两项</p>
                <p class="strongRegex">
                  <img class="">密码为6位及以上并包含数字、大写字母、小写字母和特殊字符</p>
              </div>
            </div>
          </dd>
          <dt>确认新的登陆密码：</dt>
          <dd>
            <input type="password" name="repassword" class="inptverify" placeholder="再次输入你的登录密码">
          </dd>
          <dt></dt>
          <dd>
            <input type="hidden" name="act" value="change">
            <input type="hidden" name="passverify" value="{:session('passverify')}">
            <a class="sure" href="javascript:$('#form_change').submit()">确定</a>
          </dd>
        </dl>
      </form>
      <div class="tip">
        <h4>没收到邮件？</h4>
        <p>1、网络通讯异常可能会造成邮件丢失，请重新获取或稍后再试。</p>
        <p>2、请核实邮箱是否正常使用，并检查垃圾邮箱夹。</p>
      </div>
    </div>

  </eq>

  <eq name="step" value="4">
    <div class="seller_accountmain">
      <div class="success">
        <img class="left" src="{$config_siteurl}statics/zt/images/right_rgreen.png">
        <div class="left">
          <span>修改成功，请牢记新的登陆密码</span>
          <a href="{:U('Member/Index/index')}">重新登陆</a>
        </div>
      </div>
    </div>
  </eq>

  <template file="common/_footer.php" />
</body>

</html>
