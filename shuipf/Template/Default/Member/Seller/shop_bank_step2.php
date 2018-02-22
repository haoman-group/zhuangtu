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
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
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
                    <span>填写身份信息</span>
               </li>
               <li  class="on" >
                    <em><i>2</i></em>
                    <span>验证银行卡信息</span>
               </li>
               <li>
                    <em><i>3</i></em>
                    <span>打款验证</span>
               </li>
          </ul>

          <div class="reg_bcard_stepform sellerreground">
               <div class="formhead fonrm ">
                    <strong>打款方式验证银行卡</strong>
               </div>
               
               <div class="stepitip shopst2"><span class="icon_i"></span>请确认您的银行卡信息准确无误。</div>
               <div class="stepcardnum  shopst2"><span>银行卡信息：</span><strong>{$data.bank}</strong><strong>{$data.bank_card_number}</strong></div>
                <div class="stepproduce sellerreground bggrey" >
                     <div class="tit">验证流程：</div>
                         <p>为确认此卡是您的，装途网会向此卡汇入一笔1元以下的金额（需1-2天）。</p>
                         <p>您需要查询银行卡的明细，并将此截图反馈给装途网才能通过认证。</p>
                </div>
               
          </div>
          
          <div class="btnbox">
               <a href="{:U('shop_bank_step3')}">
                    下一步
               </a>
               <a href="{:U('shop_bank_step1')}">
                    更换银行卡
               </a>
          </div>
     </div>
</div>
<template file="common/_footer.php"/>                  
</body>
</html>