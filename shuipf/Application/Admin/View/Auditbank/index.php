<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form id="searchform" name="searchform" action="" method="get" >
    <input type="hidden" value="Admin" name="g">
    <input type="hidden" value="Auditbank" name="m">
    <input type="hidden" value="index" name="a" id="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 绑定时间：
        <input type="text" name="start_time" class="input length_2 J_datetime" value="{$Think.get.start_time}" style="width:110px;">
        -
        <input type="text" class="input length_2 J_datetime" name="end_time" value="{$Think.get.end_time}" style="width:110px;">
        <select name="status">
          <option>--请选择--</option>
          <option value='-1' <eq name="Think.get.status" value="-1">selected</eq> >交易失败</option>
          <option value='0'  <eq name="Think.get.status" value="0">selected</eq>>未交易</option>
          <option value='1'  <eq name="Think.get.status" value="1">selected</eq>>交易成功</option>
          <option value='2'  <eq name="Think.get.status" value="2">selected</eq>>审核成功</option>
          <option value='5'  <eq name="Think.get.status" value="5">selected</eq>>被锁定</option>
        </select>
        <select name="type">
          <option value='1' <eq name="Think.get.type" value="1">selected</eq>>用户名</option>
          <option value='2' <eq name="Think.get.type" value="2">selected</eq>>真实姓名</option>
          <option value='3' <eq name="Think.get.type" value="3">selected</eq>>手机号码</option>
          <option value='4' <eq name="Think.get.type" value="4">selected</eq>>身份证号</option>
          <option value='5' <eq name="Think.get.type" value="5">selected</eq>>银行卡号</option>
          <option value='6' <eq name="Think.get.type" value="6">selected</eq>>经手人</option>
        </select>
        <input name="keyword" type="text" value="{$Think.get.keyword}" class="input" />
        <button class="btn">搜索</button>
        <a class="btn export" href="javascript:void(0)">导出CSV</a>
        </span> </div>
    </div>
  </form>
  <form name="myform" action="{:U('Member/delete')}" method="post" class="J_ajaxForm">
    <div class="table_list">
      <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td  align="left" width="20">ID</td>
            <!-- <td align="left">注册时间</td> -->
            <td align="left">绑定时间</td>
            <td align="left">用户名</td>
            <td align="left">真实姓名</td>
            <td align="left">手机号码</td>
            <td align="left">身份证号</td>
            <td align="left">银行卡号</td>
            <td align="left">开户行</td>
            <td align="left">汇款金额</td>
            <td align="left">交易时间</td>
            <td align="left">经手人</td>
            <td align="left">交易状态</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="left">{$vo.id}</td>
              <!-- <td align="left">{$vo.regdate|date="Y-m-d H:i",###}</td> -->
              <td align="left">{$vo.addtime|date="Y-m-d H:i",###}</td>
              <td align="left">{$vo.username}</td>
              <td align="left">{$vo.truename}</td>
              <td align="left">{$vo.mobile}</td>
              <td align="left">{$vo.idcard}</td>
              <td align="left">{$vo.bank_card_number}</td>
              <td align="left">{$vo.bank}</td>
              <td align="left">{$vo.money}元</td>
              <td align="left">{$vo.tradedate}</td>
              <td align="left">{$vo.operator}</td>
              <td align="left">{$status[$vo[status]]}</td>
              <td align="left">
                <a href="{:U('status', array('id'=>$vo['id']) )}">[状态]</a>
                <a href="{:U('delete', array('id'=>$vo['id']) )}" class="J_ajax_del">[删除]</a>
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
<script>
//会员信息查看
function member_infomation(userid, modelid, name) {
	omnipotent("member_infomation", GV.DIMAUB+'index.php?g=Member&m=Member&a=memberinfo&userid='+userid+'', "个人信息",1)
}
$(function(){
  $('.export').click(function(){
      $("#searchform #a").val("export");
      $("#searchform").submit();
      $("#searchform #a").val("index");
    });
})
</script>
</body>
</html>