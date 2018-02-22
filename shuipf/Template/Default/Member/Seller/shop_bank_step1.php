<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/seller_reg.js"></script>
</head>
<body>
  <template file="common/_header.php"/>
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
  <!--内容-->
  <!--保护容器-->
  <div class="container">
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

      <form id="form_bank" action="{:U('shop_bank_step1')}" method="post">
        <div class="sellerregfrom_bcard_box reg_bcard_stepform">
          <div class="formhead"> <strong>验证身份信息</strong>
            请如实填入您的身份信息，成功后将不能更改。
          </div>
          <dl>
            <dt>账户名</dt>
            <dd>
              <input class="nober" value="{$userinfo['mobile']}" disabled="true" />
            </dd>

            <dt>真实姓名</dt>
            <dd>
              <input class="inptverify" type="text"  name="truename" value="{$data.truename}" />
            </dd>

            <dt>身份证号码</dt>
            <dd>
              <input class="inptverify" type="text"   name="idcard" value="{$data.idcard}" />
            </dd>

            <dt>银行卡号</dt>
            <dd>
              <input class="inptverify" type="text"  name="bank_card_number" value="{$data.bank_card_number}" />
            </dd>

            <dt>开户行</dt>
            <dd class="ddbo" >
              <select name="bank" class="bankof">
                <option <eq name="data[bank]" value="晋城银行">selected</eq>>晋城银行</option>
<!--                <option <eq name="data[bank]" value="中国工商银行">selected</eq>>中国工商银行</option>-->
<!--                <option <eq name="data[bank]" value="中国建设银行">selected</eq>>中国建设银行</option>-->
<!--                <option <eq name="data[bank]" value="中国农业银行">selected</eq>>中国农业银行</option>-->
<!--                <option <eq name="data[bank]" value="招商银行">selected</eq>>招商银行</option>-->
<!--                <option <eq name="data[bank]" value="平安银行">selected</eq>>平安银行</option>-->
<!--                <option <eq name="data[bank]" value="中信银行">selected</eq>>中信银行</option>-->
<!--                <option <eq name="data[bank]" value="中国光大银行">selected</eq>>中国光大银行</option>-->
<!--                <option <eq name="data[bank]" value="浦发银行">selected</eq>>浦发银行</option>-->
<!--                <option <eq name="data[bank]" value="民生银行">selected</eq>>民生银行</option>-->
<!--                <option <eq name="data[bank]" value="交通银行">selected</eq>>交通银行</option>-->
<!--                <option <eq name="data[bank]" value="邮政储蓄银行">selected</eq>>邮政储蓄银行</option>-->
              </select>
            </dd>
            <div  class="ztbz">
              装途网指定开户银行：太原市晋城银行高新区支行（山西省太原市小店区高新街15号）
            </div>
          </dl>
        </div>

        
        <input type="submit" value="下一步" class="btn_sellerreg_bank">
        
      </form>
    </div>
  </div>
<template file="common/_footer.php"/>
</body>
</html>