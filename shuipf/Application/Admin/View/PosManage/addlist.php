<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form name="searchform" action="" method="get" >
    <input type="hidden" value="Admin" name="g">
    <input type="hidden" value="PosManage" name="m">
    <input type="hidden" value="addlist" name="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 注册时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        <select name="type">
          <option value='1' >用户名</option>
          <option value='2' >用户ID</option>
          <option value='3' >邮箱</option>
          <option value='4' >注册ip</option>
          <option value='5' >昵称</option>
          <option value='6' >手机号</option>
        </select>
        <input name="keyword" type="text" value="{$Think.get.keyword}" class="input" />
        <button class="btn">搜索</button>
        </span> </div>
    </div>
  </form>
  <form name="myform" action="{:U('Member/delete')}" method="post" class="J_ajaxForm">
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x"></td>
            <td align="left"></td>
            <td align="left">用户ID</td>
            <td align="left">用户名</td>
            <td align="left">手机号</td>
            <td align="left">昵称</td>
            <td align="left">邮箱</td>
            <td align="left">模型名称</td>
            <td align="left">注册ip</td>
            <td align="left">最后登录</td>
            <td align="left">状态</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="left"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x"  value="{$vo.userid}" name="userid[]"></td>
              <td align="left"><if condition=" $vo['islock'] eq '1' "><img title="锁定" src="{$config_siteurl}statics/images/icon/icon_padlock.gif"></if>
                <if condition=" $vo['checked'] eq '0' "><img title="待审核" src="{$config_siteurl}statics/images/icon/info.png"></if></td>
              <td align="left">{$vo.userid}</td>
              <td align="left"><img src="{:getavatar($vo['userid'])}" height=18 width=18 onerror="this.src='{$config_siteurl}statics/images/member/nophoto.gif'">{$vo.username}</td>
              <td align="left">{$vo.mobile}</td>
              <td align="left">{$vo.nickname}</td>
              <td align="left">{$vo.email}</td>
              <td align="left">{$groupsModel[$vo['modelid']]}</td>
              <td align="left">{$vo.regip}</td>
              <td align="left"><if condition=" $vo['lastdate'] eq 0 ">还没有登录过
                  <else />
                  {$vo.lastdate|date='Y-m-d H:i:s',###}</if></td>
              <!-- <td align="left">{$vo.amount}</td> -->
              <td align="left">{$vo.step}</td>
              <td align="left">
                <empty name="vo['pos_id']">
                  <a href="{:U('Admin/PosManage/add', array('userid'=>$vo['userid']) )}">[添加]</a>
                  <else/>
                  已添加|<a href="{:U('Admin/PosManage/show', array('userid'=>$vo['userid']) )}">[查看]</a>
                </empty>
              </td>
            </tr>
          </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
</body>
</html>