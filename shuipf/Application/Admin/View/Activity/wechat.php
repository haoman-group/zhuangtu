<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form name="searchform" action="" method="get" id="searchform">
    <input type="hidden" value="Admin" name="g">
    <input type="hidden" value="Activity" name="m">
    <input type="hidden" value="wechat" name="a" id="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 
        登记时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        关键词：
        <select name="type">
          <option value='1' <if condition="$_GET['type'] eq '1'">selected</if>>手机号</option>
          <option value='2' <if condition="$_GET['type'] eq '2'">selected</if>>名称</option>
          <option value='3' <if condition="$_GET['type'] eq '3'">selected</if>>地址</option>
        </select>
        <input name="keyword" type="text" value="{$Think.get.keyword}" class="input" />
        活动名称：
        <select name="actname">
          <option>--全部--</option>
          <volist name="actnames" id ='vo'>
            <option value='{$vo.actname}' <if condition="$_GET['actname'] eq $vo['actname']">selected</if>>{$vo.actname}</option>
          </volist>
        </select>
        <button class="btn">搜索</button>
        <input type='button' class='btn export' value="导出csv"/>
        <a style="margin-left:20px;" href="{:U('wechat')}">清除条件</a>
        </span> </div>
    </div>
  </form>
  <div class="table_list">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <!-- <td width="50"  align="center">ID</td> -->
          <td>ID</td>
          <td>手机号</td>
          <td>姓名</td>
          <td>地址</td>
          <td>活动名称</td>
          <td>报名时间</td>
        </tr>
      </thead>
      <tbody>
        <volist name='data' id='vo'>
          <tr>
            <td>{$vo.wid}</td>
            <td>{$vo.mobile}</td>
            <td>{$vo.name}</td>
            <td>{$vo.addr}</td>
            <td>{$vo.actname}</td>
            <td>{$vo.addtime|date='Y-m-d H:i:s',###}</td>
            <td></td>
          </tr>
        </volist>
    </table>
    <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script>
$(function(){
  $('.export').click(function(){
      $("#searchform #a").val("exportWechat");
      $("#searchform").submit();
      $("#searchform #a").val("wechat");
    });
})
</script>
</body>
</html>