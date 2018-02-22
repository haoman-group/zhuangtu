<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/seller_register031.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
</head>
<body>
  <template file="common/_header.php"/>
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
      <li class="on" >
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


  <!--内容-->
  <!--保护容器-->
  <div class="container">
    <div class="seller_main">
      <div class="reg_bcard_itembox sellerreground bggrey">
        <h1>银行卡绑定实名认证</h1>
        <ul class="ulitem_intro ulsquare">
          <li>请在15天内完成认证，逾期将重新申请</li>
          <li>认证成功后不能撤销</li>
          <li>需提交一张本人的银行卡信息</li>
        </ul>
        <div class="sellerregfrom_bcard_box sellerregfrom_bcard_bg_white">
          <span class="chkredout">
            <img src="{$config_siteurl}statics/zt/images/sub-MatPro_conb.png" />
          </span>
          绑定银行卡实名认证
          <br/>
          <a href="">《装途网服务协议》</a>
          <a href="">《晋城银行网上交易直销自助服务协议》</a>
        </div>
      </div>

      <a class="btn_sellerreg_bank btn_sellerreg_bank1" href="{:U('shop_bank_step1')}">立即认证</a>
      <eq name="step" value="1">
         <div class="btnbox"><a href="{:U('shop_bank_skip')}"class="btn">跳过</a></div>
        </eq>
<!--      <a class="btn_sellerreg_bank btn_sellerreg_bank1">立即认证</a>-->
<!--         <div class="btnbox"><a href="{:U('shop_bank_skip')}"class="btn">跳过</a></div>-->
    </div>
  </div>

  <template file="common/_footer.php"/>
  <script type="text/javascript">
    var main_con11b=0; 
    $(document).ready(function(){
      /*绑定银行卡实名认证*/
      $(".chkredout").click(function(){
        $(this).toggleClass("on");  
        if($(this).hasClass("on")){
          $(".btn_sellerreg_bank1").css("background-color","#c8000b");
          $(".btn_sellerreg_bank1").attr("href","{:U('shop_bank_step1')}");
          }   
        else{
          $(".btn_sellerreg_bank1").css("background-color","#888");
          $(".btn_sellerreg_bank1").removeAttr("href");
          } 
      })
      })
  </script>
</body>
</html>