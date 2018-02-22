<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
   <div class="h_a">搜索</div>
   <form action="{:U('search')}" method="post" name="search">
      <input name="keyword" type="text" value="" class="input" />
       <button class="btn">搜索</button>
   </form>

  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="50"  align="center">ID</td>
          <td>页面名称</td>
        </tr>
      </thead>
      <tbody>
        <volist name="data" id="vo">
          <tr>
            <td align="center" >{$vo.id}</td>
            <td><a href="{:U('lists',array('pageid'=>$vo[id]))}">{$vo.name}</a></td>
          </tr>
        </volist>
      </tbody>
    </table>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>