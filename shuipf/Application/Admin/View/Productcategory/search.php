<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
   <div class="h_a">当前位置：</div>
  <div class="prompt_text">
    <p>{$path}</p>
  </div>
  <form action="{:U('Admin/Productcategory/search')}" method="post">
      <input type="text" name="name"/>
      <input type="submit" value="Submit"/>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>