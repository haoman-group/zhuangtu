<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>

  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <!-- <td width="50"  align="center">ID</td> -->
          <td>位置</td>
          <td>活动</td>
          <td>当前产品信息</td>
          <td>当前产品状态</td>
          <td>操作</td>
        </tr>
      </thead>
      <tbody>
        <for start="1" end="$activity['maxnum'] + 1">
          <tr>
            <td><input type="checkbox" name="checkAll[]" value={$i} >{$i}</td>
            <td>{$activity.title}</td>
            <td>{$data[$i]['title']} -- {$data[$i]['description']}</td>
            <td>{$status[$data[$i]['status']]}</td>
            <td>
              <empty name="data[$i]">
                <a href="{:U('item',array('place'=>$i,'act_id'=>$activity['id']))}">新增</a>
              <else/>
                <if condition="$data[$i]['status'] eq '1'">
                  <a href="{:U('item_status',array('id'=>$data[$i]['id']))}">禁用</a>
                <else/>
                  <a href="{:U('item_status',array('id'=>$data[$i]['id']))}">启用</a>
                </if>
                &nbsp;|&nbsp;<a href="{:U('item',array('place'=>$i,'act_id'=>$activity['id'],'id'=>$data[$i]['id']))}">修改</a>&nbsp;|&nbsp;
                <a href="{:U('item_delete',array('place'=>$i,'id'=>$data[$i]['id']))}">删除</a>
              </empty>
            </td>
          </tr>
        </volist>
      </for>
    </table>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>