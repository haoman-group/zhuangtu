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
</head>
<body bgcolor="#FFFFFF">
  <template file="common/_header"/>
  <div class="seller_reg_process_ul">
    <ul>
      <li>
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
      <li >
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
  <eq name="result[status]" value="-1">
    <div class="seller_main">
      <ul class="guocheng">
        <li class="on">
          <em><i>1</i></em>
          <span>填写资质信息</span>
        </li>
        <li class="on">
          <em><i>2</i></em>
          <span>等待人工审核</span>
        </li>
        <li  class="on">
          <em><i>3</i></em>
          <span>查看审核结果</span>
        </li>
      </ul>
      <div class="qualification">
        <div class="formhead"> <strong>审核结果</strong>
        </div>
        <div class="pass">
          <div class="pass">
            <div class="pasti"><img src="{$config_siteurl}statics/zt/images/sellerdologin/Seller_registeri04_pass02.png">
              <span>很抱歉，您的资质未通过审核，原因如下：</span></br>
              <span>{$result[message]}</span>
            </div>
          </div>
          <p class="wen">如有疑问，请拨打电话400-003-3030咨询客服</p>
          <div  class="btnbox"><a href="{:U('shop_offline_info')}">修改认证信息</a></div>
        </div>
      </div>
      <!-- <div  class="btnbox">
      <a href="">装修店铺</a>
    </div> -->
    </div>
  </eq>
  <eq name="result[status]" value="1">
    <div class="seller_main">
      <ul class="guocheng">
        <li class="on">
          <em><i>1</i></em>
          <span>填写资质信息</span>
        </li>
        <li class="on">
          <em><i>2</i></em>
          <span>等待人工审核</span>
        </li>
        <li  class="on">
          <em><i>3</i></em>
          <span>查看审核结果</span>
        </li>
      </ul>
      <div class="qualification">
        <div class="formhead">
          <strong>审核结果</strong>
        </div>
        <div class="pass">
          <div class="pasti"><img src="{$config_siteurl}statics/zt/images/sellerdologin/Seller_registerRight.png"><span>审核通过！恭喜您创建店铺成功</span></div>
          <p>欢迎开启装途店铺之旅，您的店铺账号为{$userinfo['mobile']}，</p>
          <p>该账号可同时用于客服登陆，密码同装途网登录密码</p>
        </div>
        <div  class="btnbox">
          <a href="{:U('/')}">
            创建店铺
          </a>
        </div>
      </div>

    </div>
  </eq>
  <template file="common/_footer"/>
</body>
</html>