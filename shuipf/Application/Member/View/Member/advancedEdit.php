<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform" action="{:U('Member/advancedEdit')}" method="post" class="J_ajaxForm">
  		<input type="hidden" name="userid" value="{$data.userid}" />
		<div class="h_a">注册信息</div>
		<div class="table_full"> 
		<table width="100%" class="table_form">
			<tr>
				<th width="80">注册用户名</th> 
				<td><input name="username" type="text" class="input" value="{$data.username}" required="required"></td>
			</tr>
			<tr>
				<th width="80">注册手机号</th> 
				<td><input name="mobile" type="text" class="input" value="{$data.mobile}" required="required" ></td>
			</tr>
			<tr>
				<th width="80">注册状态</th> 
				<td><input name="step" type="text" class="input" value="{$data.step}" required="required"></td>
			</tr>
		</table>
		<div class="h_a">银行卡信息</div>
		<notempty name="member_data">
		<div class="table_full"> 
		<table width="100%" class="table_form">
			<tr>
				<th width="80">开户行</th> 
				<td><input name="bank" type="text" class="input" value="{$member_data.bank}"></td>
			</tr>
			<tr>
				<th width="80">账户姓名</th> 
				<td><input name="truename" type="text" class="input" value="{$member_data.truename}"></td>
			</tr>
			<tr>
				<th width="80">银行卡号</th> 
				<td><input name="bank_card_number" type="text" class="input" value="{$member_data.bank_card_number}"></td>
			</tr>
			<tr>
				<th width="80">身份证号</th> 
				<td><input name="idcard" type="text" class="input" value="{$member_data.idcard}"></td>
			</tr>
		</table>
	</div>
	<else /> 
	暂无
	</notempty>
	 <div class="">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">修改</button>
      </div>
    </div>
</form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>