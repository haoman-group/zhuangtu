<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">添加推荐位</div>
  <form name="myform" action="{:U('pageadd')}" method="post" class="J_ajaxForm">
  
    添加页：<input type="text" name="pageadd" value="">
     
    <input type="submit" name="submit" value="添加">
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>