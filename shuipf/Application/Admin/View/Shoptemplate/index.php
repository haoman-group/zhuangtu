<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform" class="J_ajaxForm" action="{:U('Shopcategory/delete')}" method="post">
  <div class="table_list">
  <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td align="center" width="50">ID</td>
            <td align="left" width="50">标题</td>
            <td align="center" width="50">类型</td>
            <td align="center" width="50">缩略图</td>
            <td align="center" width="50">添加日期</td>
            <td align="center" width="50">状态</td>
            <td align="center" width="80">相关操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="data" id="vo">
          <tr>
            <td align="center">{$vo.id}</td>
            <td align="left">{$vo.title}</td>
            <td align="center">{$type[$vo[type]]}</td>
            <td align="center"><img src="{$vo.thumb}" style="width:50px;"></td>
            <td align="center"><?php echo date("Y-m-d h:i:s",$vo['addtime']);  ?></td>
            <td align="center">{$status[$vo[status]]}</td>
            <td align="center">
            <?php
			$op = array();
			if(\Libs\System\RBAC::authenticate('edit')){
				$op[] = '<a href="'.U('Shoptemplate/edit',array('id'=>$vo['id'])).'">修改</a>';
			}
			if(\Libs\System\RBAC::authenticate('delete')){
				$op[] = '<a class="J_ajax_del" href="'.U('Shoptemplate/delete',array('id'=>$vo['id'])).'">删除</a>';
			}
			echo implode(" | ",$op);
			?>
            </td>
          </tr>
        </volist>
        </tbody>
      </table>
      <div class="p10">
        <div class="pages"> {$Page} </div>
      </div>
  </div>
  <div class="btn_wrap">

    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>