<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form name="searchform" action="" method="get" >
    <input type="hidden" value="Admin" name="g">
    <input type="hidden" value="PosManage" name="m">
    <input type="hidden" value="lists" name="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 
        <!-- 注册时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;"> -->
        <select name="type">
          <option value='7' >终端号</option>
          <option value='8' >店铺名称</option>
          <option value='1' >注册用户名</option>
          <option value='2' >用户ID</option>
          <option value='6' >注册手机号</option>
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
            <!-- <td align="left">POSID</td> -->
            <td align="left">用户ID</td>
            <td align="left">店铺ID</td>
            <td align="left">用户名</td>
            <td align="left">店铺名称</td>
            <td align="left">注册手机号</td>
            <td align="left">终端号</td>
            <td align="left">银行户名</td>
            <td align="left">身份证号</td>
            <td align="left">银行卡号</td>
            <td align="left">开户行</td>
            <td align="left">安装时间</td>
            <td align="left">安装地址</td>
            <td align="left">负责人</td>
            <td align="left">操作</td>
            <!-- <td align="left">操作</td> -->
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <!-- <td align="left">{$vo.pos_id}</td> -->
              <td align="left">{$vo.userid}</td>
              <td align="left">{$vo.shopid}</td>
              <td align="left"><img src="{:getavatar($vo['userid'])}" height=18 width=18 onerror="this.src='{$config_siteurl}statics/images/member/nophoto.gif'">{$vo.username}</td>
              <td align="left">{$vo.name}</td>
              <td align="left">{$vo.mobile}</td>
              <td align="left">{$vo.pos_sn}</td>
              <td align="left">{$vo.truename}</td>
              <td align="left">{$vo.idcard}</td>
              <td align="left">{$vo.bank_card_number}</td>
              <td align="left">{$vo.bank}</td>
              <td align="left">{$vo.addtime|date='Y-m-d H:i:s',###}</td>
              <td align="left">{$vo.paddr}</td>
              <td align="left">{$vo.manager}</td>
              <td align="left"><a href="{:U('PosManage/edit',array('id'=>$vo['pos_id']))}">修改</a>|<a href="{:U('PosManage/delete',array('id'=>$vo['pos_id']))}">删除</a></td>
             <!--  <td align="left">
                <empty name="vo['pos_id']">
                  <a href="{:U('Admin/PosManage/add', array('userid'=>$vo['userid']) )}">[添加]</a>
                  <else/>
                  已添加|<a href="{:U('Admin/PosManage/show', array('userid'=>$vo['userid']) )}">[查看]</a>
                </empty>
              </td> -->
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