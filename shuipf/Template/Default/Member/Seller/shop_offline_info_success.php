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
</head>
<body bgcolor="#FFFFFF">
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
</div>>
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
               <li>
                    <em><i>3</i></em>
                    <span>查看审核结果</span>
               </li>
          </ul>
          <div class="qualification">
               <div class="formhead">
                    <strong>人工审核</strong>
               </div>
               <div class="pass">


                    <div class="pasti"><img src="{$config_siteurl}statics/zt/images/sellerdologin/Seller_registeri04_pass01.png"><span>资质信息提交成功！</span></div>
                    <p>线上审核通常需要2-3个工作日</p>
                    <p>审核一旦通过，我们将尽快通知您，请保持通讯畅通</p>
               </div>
               <div  class="btnbox">
                    <a href="{:U('/')}">
                         返回装途网首页
                    </a>
               </div>
          </div> 

     </div>
</div>
<template file="common/_footer.php"/>                  
</body>
</html>