<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform" action="{:U('status')}" method="post" class="J_ajaxForm1">
    <div class="h_a">基本信息</div>
    <div class="table_full"> 
    <table width="100%" class="table_form">
		<tr>
			<th width="80">用户名</th> 
			<td>{$data.username}</td>
		</tr>
    <tr>
      <th width="80">真实姓名</th> 
      <td>{$data.truename}</td>
    </tr>
    <tr>
      <th width="80">手机号</th> 
      <td>{$data.mobile}</td>
    </tr>
		<tr>
			<th>交易时间</th> 
			<td><Form function="date" parameter="tradedate,$now,1,"/></td>
		</tr>
    <tr>
      <th>经手人</th> 
      <td><input type="text" name="operator" value="{$userInfo.username}" class="input"/></td>
    </tr>
		<tr>
			<th>交易状态</th>
			<td>
        <select name="status">
          <volist name="status" id="vo">
            <option value="{$key}" <eq name="vo[status]" value="$key">selected</eq>>{$vo}</option>
          </volist>   
        </select>
			</td>
		</tr>
	</table>

    </div>
    <div class="">
      <div class="btn_wrap_pd">
        <input type="hidden" name="id" value="{$data.id}" />
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>