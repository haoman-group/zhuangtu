<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/account.css" type="text/css"/>
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/member_change_auth.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/account.js"></script>
</head>
<body>
  <!--背景容器-->
  <div class="seller_accounttopbg conwhole">
    <!--保护容器-->
    <div class="seller_accounttop">
      <img src="{$config_siteurl}statics/zt/images/logo_04.png">
      <span>重置密码</span>
    </div>
  </div>

  <eq name="step" value="1">
    <div class="seller_accountmain">
      <h5>
        {$Think.get.msg}
      </h5>
      <h5>
        您正在通过绑定手机为您的账户重置密码，请输入注册时填写的注册手机号码：
      </h5>
      <div class="verify">
        <form id="form_mobile"  action="{:U('resetpwd',array('step'=>2))}" method ="post">
          <dl class="dlform sellerregform">
            <dt>手机号码</dt>
            <dd>
              <span class="refrom_num86">+86</span>
              <input type="text" placeholder="请输入你的手机号" name="mobile" value="{$Think.get.mobile}" onkeyup="checkMobileNum(this)"/><br><i class="error" id='tips'></i>
            </dd>
            <dt>用户名</dt>
            <dd>
              <input type="text" placeholder="请输入你的注册用户名" name="username"/>
            </dd>
            <dt>验证码</dt>
            <dd>
              <input class="sellerregfrom_verify_input" type="text" name="vcode" />
              <img align="absmiddle" src="{:U("Api/Checkcode/index","type=resetpwd&code_len=4&font_size=14&width=100&height=39&font_color=&background=")}" onclick="changeAuthCode()" title="看不清？点击更换" id="authCode" />
            </dd>
           <a href="javascript:$('#form_mobile').submit()" class="btn_verify">立即重置</a>
           </dl>
        </form>
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
        的方式为<span>{$username}</span>验证身份，请完成以下操作
      </h6>
      <form id="form_verify" action="{:U('resetpwd',array('step'=>3))}" method="post">
        <dl>
          <dt>您的手机：</dt>
          <dd>
            <input type="text" class="phone" value="{$mobile}" name="mobile"></dd>
          <dt></dt>
          <dd>
            <!--<input type="button" class="getverifycode" value="点此免费获取"></dd>-->
            <input type="button" value="获取验证码" class="btnsellerregfrom_verify getverifycode" />
          <dt>验证码：</dt>
          <dd>
             <input class="inptverify" class="sellerregfrom_verify_input verifycode" type="text" name="vcode" placeholder="6位数字"/>
            <!--<input type="text" class="verifycode" placeholder="6位数字"></dd>-->
          <dt>证件号码：</dt>
          <dd class="idcard">
            <input type="text" name="idcard" class="inptverifyy">
            <p>请输入您认证的证件号，个人用户可使用身份证号码，企业用户可使用营业执照注册号等</p>
          </dd>
          <dt></dt>
          <dd>
            <input type="hidden" name="act" value="verify">
            <input type="hidden" name="username"  value="{$username}">
            <a class="sure" href="javascript:$('#form_verify').submit()">确定</a>
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
      <form id="form_change" action="{:U('resetpwd',array('step'=>4))}" method="post">
        <dl>
          <dt>新的登陆密码：</dt>
          <dd class="safe">
            <input type="password" name="password" class="inptverify"  placeholder="设置你的登录密码"  id="password" >  
            
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
                <img class="" >密码为6位6-30位字符</p>
              <p  class="mediumRegex">
                <img class="" >密码为6位及以上并包含数字、字母和特殊字符中的两项</p>
              <p class="strongRegex">
                <img class="" >密码为6位及以上并包含数字、大写字母、小写字母和特殊字符</p>
              </div>
            </div>
          </dd>
          <dt>确认新的登陆密码：</dt>
          <dd>
            <input type="password" name="repassword" class="inptverify"  placeholder="再次输入你的登录密码"></dd>
          <dt></dt>
          <dd>
            <input type="hidden" name="act" value="change">
            <input type="hidden" name="mobile"  value="{$mobile}">
            <input type="hidden" name="username"  value="{$username}">
            <input type="hidden" name="passverify" value="{:session('passverify')}">
            <a class="sure" href="javascript:$('#form_change').submit()">确定</a>
          </dd>
        </dl>
      </form>
      <div class="tip">
       
      </div>
    </div>

  </eq>

  <eq name="step" value="4">
    <div class="seller_accountmain">
      <div class="success">
        <img class="left" src="{$config_siteurl}statics/zt/images/right_rgreen.png">    
        <div class="left">
          <span>修改成功，请牢记新的登陆密码</span>
          <a href="{:U('Member/Seller/login')}">重新登陆</a>
        </div>
      </div>
    </div>
  </eq>
  
  <template file="common/_footer.php"/>
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
                   $("#tips").text("手机号码不存在!");	 
                }else{	 
                  $("#tips").text("");
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
</body>
</html>