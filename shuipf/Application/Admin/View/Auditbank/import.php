<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform" action="{:U('import')}" method="post" class="J_ajaxForm1" enctype="multipart/form-data">
    <div class="h_a">导入文件</div>
    <div class="table_full"> 
    <table width="100%" class="table_form">
		<tr>
			<th width="80">文件路径</th> 
			<td><input type="file" name="csv_file"></td>
		</tr>
	 </table>
    </div>
    <div class="">
      <div class="btn_wrap_pd">
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>