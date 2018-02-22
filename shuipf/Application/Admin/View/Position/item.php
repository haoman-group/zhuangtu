<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">信息管理&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{:U('item_add',array('posid'=>$position['posid'],'place'=>$place))}">添加信息</a></span></div>
  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="20"  align="center">ID</td>
          <td width="40"  align="center">信息ID</td>
          <td>推荐位名称</td>
          <td>标题</td>
          <td>窗口状态</td>
          <td>开始时间</td>
          <td>结束时间</td>
          <td>状态</td>
          <td width="180" align="center">管理操作</td>
        </tr>
      </thead>
      <tbody>
        <volist name="data" id="vo">
            <tr>
            <td>{$vo.id}</td>
            <td align="center">{$vo.posid}</td>
            <td>{:M('Position')->getFieldByPosid($vo['posid'],'name')}</td>
            <td>{$vo.title}</td>
            <td>{$vo.window_status}</td>
            <td>{$vo.starttime}</td>
            <td>{$vo.endtime}</td>
            <td><eq name="vo[status]" value="1">启用<else/>未启用</eq></td>
            <td align="center">
            <if condition="$vo.status === '1'" ><a class="J_ajax_del" href="{:U('item_status',array('id'=>$vo['id']))}" >禁用</a><else/><a class="J_ajax_del" href="{:U('item_status',array('id'=>$vo['id']))}">启用</a></if>
               <a href="{:U('item_edit',array('id'=>$vo[id]))}">修改</a>
               <a href="{:U('item_delete',array('id'=>$vo[id]))}">删除</a>
            </td>
          </tr>
        </volist>
      </tbody>
    </table>
    <a class="btn mr10 "  href="{:U('Admin/Position/place',array('posid'=>$position['posid']))}">返回</a>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>