<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>

  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="50"  align="center">ID</td>
          <td>推荐位名称</td>
          <td width="180" align="center">管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="data" id="vo">
          <tr>
            <td align="center">{$vo.posid}</td>
            <td>{$vo.name}</td>
            
            <td align="center">
              <a href="{:U('Position/place',array('posid'=>$vo['posid']))}">信息管理</a> |
              <a href="{:U('Position/edit',array('posid'=>$vo['posid']))}">修改</a>
            </td>
          </tr>
        </volist>
      </tbody>
    </table>
    <a class="btn mr10 "  href="{:U('Admin/Position/page',array('menuid'=>195))}">返回</a>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>