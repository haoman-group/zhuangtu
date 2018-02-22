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
    <script src="{$config_siteurl}statics/js/layer/layer.js"> </script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
</head>
<body class="sjkhomebody">
<!--背景容器-->
<template file="common/_top.php"/>
<div class="sjk_sear">
     <img class="SJK" src="{$config_siteurl}statics/zt/images/SJK.png" />
     <form >
           <input  type="text" placeholder="搜索你喜欢的" />
           <input type="image" src="{$config_siteurl}statics/zt/images/SJK_S.png" />
     </form>
     <div class="hotsear">
          <strong>热门搜索：</strong>
          <a href="#">小说封面设计</a>，<a href="#">旧物改造</a>，<a href="#">挑空客厅</a>，<a href="#">抹胸婚纱</a>，<a href="#">哈尔滨旅游图片</a>
     </div>
</div>
<div class="conwhole sjk_banner">
          发现、搜索你喜欢的家
</div>
<div class="sjk_nav">
     <p>大家正在关注</p>
     <ul>
         <volist name='style' id='vo'>
            <li><a href="{:(U('lists',array('style'=>$vo,'page'=>1)))}">{$vo}</a></li>
        </volist>
     </ul>  
     <p>为您推荐</p>   
</div>

<div class="jsk_main">
  <ul>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F11.jpg" ></a>
      </li>
      <li>
          <div class="instruction_borup instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
            </div>
          <div class="instruction_bordown instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li> 
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F13.jpg" ></a>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F14.jpg" ></a>
      </li>
      <li>
          <div class="instruction_up instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li>
      <li>
          <div class="instruction_down instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F22.jpg" ></a>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F23.jpg" ></a>
      </li>
      <li>
          <div class="instruction_borup instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
            </div>
          <div class="instruction_bordown instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li> 
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F25.jpg" ></a>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F31.jpg" ></a>
      </li>
      <li>
          <div class="instruction_borup instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
            </div>
          <div class="instruction_bordown instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li> 
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F33.jpg" ></a>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F34.jpg" ></a>
      </li>
      <li>
          <div class="instruction_up instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li>
      <li>
          <div class="instruction_down instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F42.jpg" ></a>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F43.jpg" ></a>
      </li>
      <li>
          <div class="instruction_borup instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
            </div>
          <div class="instruction_bordown instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li>
      <li> 
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F45.jpg" ></a>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F51.jpg" ></a>
      </li>
      <li>
          <div class="instruction_borup instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
            </div>
          <div class="instruction_bordown instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li> 
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F53.jpg" ></a>
      </li>
      <li>
          <a href="#"><img src="{$config_siteurl}statics/zt/images/SJK_F54.jpg" ></a>
      </li>
      <li>
          <div class="instruction_up instruction">
               <div class="tit">兴趣<a href="#">素材</a></div>
          </div>
      </li>
  </ul>
</div>  
<!--尾部-->
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>
</body>
</html>