<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form name="searchform" action="" method="get" >
    <input type="hidden" value="Admin" name="g">
    <input type="hidden" value="Auditqualification" name="m">
    <input type="hidden" value="index" name="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 注册时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        <select name="status">
          <option>-请选择-</option>
          <option value='0'  <eq name="Think.get.status" value="0">selected</eq> >待审核</option>
          <option value='1'  <eq name="Think.get.status" value="1">selected</eq> >审核通过</option>
          <option value='-1' <eq name="Think.get.status" value="-1">selected</eq> >被拒绝</option>
        </select>
        <select name="type">
          <option value='1'  <eq name="Think.get.type" value="1">selected</eq> >用户名</option>
          <option value='2'  <eq name="Think.get.type" value="2">selected</eq> >真实姓名</option>
          <option value='3'  <eq name="Think.get.type" value="3">selected</eq> >手机号</option>
          <option value='4'  <eq name="Think.get.type" value="4">selected</eq> >用户ID</option>
          <!--<option value='5' >昵称</option>-->
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
            <td  align="left" width="20">#</td>
            <td align="left">注册时间</td>
            <td align="left">用户名</td>
            <td align="left">真实姓名</td>
            <td align="left">手机号码</td>
            <td align="left">身份证号</td>
            <td align="left">经营范围</td>
            <td align="left">店铺级别</td>
            <td align="left">审核人</td>
            <td align="left">审核状态</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="left">{$i}</td>
              <td align="left">{$vo.user.regdate|date="Y-m-d H:i",###}</td>
              <td align="left">{$vo.user.username}</td>
              <td align="left">{$vo.truename}</td>
              <td align="left">{$vo.user.mobile}</td>
              <td align="left">{$vo.idcard}</td>
              <td align="left"><?php echo (strlen($vo['business_scope'])>36)?substr($vo['business_scope'],0,36).'...':$vo['business_scope']; ?></td>
              <td align="left">{$vo.category.shopname}</td>
              <td align="left">{$vo.adminid|getAdminName}</td>
              <td align="left">{$status[$vo[status]]|default="待审核"}</td>                
              <td align="left"><a href="{:U('show',array('id'=>$vo[id]))}">查看</a></td>
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
</script>
</body>
</html>