<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
	<div class="wrap J_check_wrap">
		 <Admintemplate file="Common/Nav"/>
		 <div class="h_a">搜索</div>
		   <div class="table_list">	
		   	  <table width="100%" cellspacing="0">
		   	  	<thread>
                 <tr>
             <td align="left"></td>
            <td align="left">页面名称</td>
            <td align="left">推荐位名称</td>
            <td align="left">页面位置</td>
                 </tr>
                 <volist name="search" id="vo">
                 <tr >
                 	   <td align="left"></td>
                 <td align="left">{$vo.pagename}</td>
                 <td align="left">{$vo.name}</td>
                 <td align="left">{$vo.place}</td>
                 </tr>
             </volist>
		   	  	</thread>
		   	  	<table>
              <div>
		   </div>
</body>