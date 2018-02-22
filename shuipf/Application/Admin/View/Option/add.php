<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">添加选项</div>
  <form name="myform" action="{:U('add')}" method="post" class="J_ajaxForm">
  <div class="table_full">
  <table width="100%" class="table_form">
		<tr>
			<th width="80">选项</th> 
			<td>{$data.title}</td>
		</tr>

    <tr>
      <th>父节点</th> 
      <td>
        <select name="pid">
          <option value="0">请选择</option>
          <volist name="parent" id="vo">
            <option value="{$key}">{$vo}</option>
          </volist>
        </select>
      </td>
    </tr>

		<tr>
			<th>名称</th> 
			<td><input type="text" name="value" value="" class="input"/></td>
		</tr>

		<tr>
			<th>标识</th>
			<td>
			<input type="text" name="key" value="" class="input" size="30"/>
			</td>
		</tr>


    <tr>
      <th>是否启用</th>
      <td>
        <select name="status">
          <volist name="status" id="vo">
            <option value="{$key}">{$vo}</option>
          </volist>
        </select>
      </td>
    </tr>

	</table>
  </div>
   <div class="">
      <div class="btn_wrap_pd">   
        <input type="hidden" name="name" value="{$data.name}">          
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>