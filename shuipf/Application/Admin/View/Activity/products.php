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
          <td>活动名称</td>
          <td>产品最大个数</td>
          <td>当前产品个数</td>
          <td>计价方式</td>
          <td>状态</td>
          <td>操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="data" id="vo">
          <tr>
            <td align="center" >{$vo.id}</td>
            <td>{$vo.title}</td>
            <td>{$vo.maxnum}</td>
            <td>{$vo.count}</td>
            <td>{$types[$vo['type']]}</td>
            <td>{$status[$vo['status']]}</td>
            <td><a href="{:U('lists',array('act_id'=>$vo[id]))}">管理</a></td>
          </tr>
        </volist>
      </tbody>
    </table>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>