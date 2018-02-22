<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>商家首页－注册</title>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
  <!--[if lt IE 9]>
  <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
  <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
  <![endif]-->
  <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
  <script src="{$config_siteurl}statics/zt/js/base.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
  <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
</head>
<body>
  <template file="common/_header.php"/>
  <!--中部-->
  <div class="seller_reg_process_ul">
    <ul>
      <li  class="on">
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
    <div class="seller_reg_info_li">
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
  <form id="form_sendsms" action="{:U('reg_mobile')}" method="post">
    <dl class="dlform sellerregform">
      <dt>所在国家/地区</dt>
      <dd>
        <select onchange = "changeRegions(this)">
          <option value="86" selected>中国大陆</option>
          <option value="1" >美国</option>
          <option value="49">德国</option>
          <option value="33">法国</option>
        </select>
      </dd>
      <dt>手机号码</dt>
      <dd class="ddin_s">
<!--        <span class="refrom_num86">+86</span>-->
        <input type="text" placeholder="请输入你的手机号" name="mobile" onkeyup="checkMobileNum(this)"/><i class="error" id='tips'></i>
      </dd>
      <dt>验证码</dt>
      <dd class="ddin_s">
        <input class="sellerregfrom_verify_input" type="text" name="vcode" />
        <img align="absmiddle" src="{:U("Api/Checkcode/index","type=sendsms&code_len=4&font_size=14&width=100&height=39&font_color=&background=")}" onclick="changeAuthCode()" title="看不清？点击更换" id="authCode" />
      </dd>
      <dt></dt>
      <dd class="xieyi">
        <span class="chkredin reg_mobile_chkredin">
          <img src="{$config_siteurl}statics/zt/images/sub-MatPro_conb.png" />
        </span>
        同意
        <a href="">《装途网服务协议》</a>
        <a href="">《法律声明及隐私权政策》</a>
        和
        <a href="">《支付宝服务协议》</a>
        <a class="btn_sellerreg_next btn_sellerreg_next1" >下一步</a>

      </dd>
    </dl>
  </form>
  </div>
  <!--保证栏-->
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
</body>
</html>