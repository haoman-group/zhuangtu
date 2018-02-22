<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>装途网-设置密码</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/account.css" type="text/css"/>

    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/account.js"></script>
</head>
<body>
  <template file="common/_header"/>
  <div class="seller_reg_process_ul">
    <ul>
      <li class="on">
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
      <li>
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
  <!--下部-->
  <!--保护容器-->
  <div class="seller_reg_info_ul">
    <div class="seller_reg_info_li finish"> <b></b>
      免费注册
    </div>
    <div class="seller_reg_info_li finish"> <b></b>
      设置登录名
    </div>
    <div class="seller_reg_info_li finish">
      <b></b>
      填写账户信息
    </div>
    <div class="seller_reg_info_li">
      <b></b>
      注册成功
    </div>
  </div>
  <!--内容-->
  <!--保护容器-->
  <div class="seller_main">
    <form id="form_reg" action="{:U('register')}" method="post">
      <dl class="dlform sellerregform">

        <dt>注册手机号

        </dt>
        
      <dd> <input value="{$mobile}" name="mobile" readonly /></dd>

        <dt class="cmima">设置登录密码
        </dt>
        <dd class="xinxi">登录时验证，保护账户信息</dd>

        <dt>登录密码</dt>
        <dd class="safe">
          <input type="password" class="inptverify"  placeholder="设置你的登录密码" name="password" id="password" />
          <div class="degree" >

              <div class="trigonb"></div>
              <div class="trigon"></div>
            <!--安全程度：-->
            <div class="degres">
              <div class="degrel">安全程度：</div>
              <div class="degrer">
                <div id="level" class="pw-strength">
                  <div class="pw-bar"></div>
                  <div class="pw-bar-on"></div>

                </div>
              </div>
            </div>
              <div class="pw-tips">
              <p class="enoughRegex">
                <img class="" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">6-20位字符</p>
              <p  class="mediumRegex">
                <img class="" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==" >只能包含大小写字母、数字以及标点符号（除空格）</p>
              <p class="strongRegex">
                <img class="" src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQImWNgYGBgAAAABQABh6FO1AAAAABJRU5ErkJggg==">大写字母、小写字母、数字和标点符号至少包含2种</p>
              </div>
            </div>
        </dd>

        <dt>再次确认</dt>
        <dd>
          <input type="password" class="inptverify"  placeholder="再次输入你的登录密码" name="repassword" />
        </dd>

        <dt class="userna">
          设置用户名
        </dt>
        <dd></dd>

        <dt>用户名</dt>
        <dd>
          <input type="text" class="inptverify"  placeholder="用户名一旦设置成功，无法修改" name="username" /></br>
          <i class="errors">注：如果您的一个手机号码注册两个以上装途网用户，登录装途网时必须使用用户名登录。</i>
        </dd>

        <dt></dt>
        <dd>
          <a class="btn_sellerreg_next" href="javascript:$('#form_reg').submit()">
            <p>确 定</p>
          </a>
        </dd>

      </dl>
    </form>
  </div>

  <template file="common/_footer"/>

</body>
<script>
  $(window).keydown(function(event){
    if(event.keyCode == 13){
      $("#form_reg").submit();
    }
  });
</script>
</html>