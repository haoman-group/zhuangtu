<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
   <div class="h_a">当前位置：</div>
  <div class="prompt_text">
    <p>{$path}</p>
  </div>
  <form name="myform" class="J_ajaxForm" action="{:U('Productcategory/back')}" method="post">
  <div class="table_list">
  <table width="100%" cellspacing="0">
        <thead>
          <tr>
            <td width="50"  align="left"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x" onClick="selectall('tagid[]');">CID</td>
            <td align="center" width="50">PID</td>
            <td align="center" width="50">名称</td>
            <td align="center" width="50">状态</td>
            <td align="center" width="80">添加时间</td>
            <td align="center" width="80">相关操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="data" id="vo">
          <tr>
            <td width="50"><input type="checkbox" value="{$vo.id}" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="tagid[]">{$vo.cid}</td>
            <td align="center">{$vo.parent_cid}</td>
            <td align="center">{$vo.name}</td>
            <td align="center">{$vo.status}</td>
            <td align="center"><?php echo date("Y-m-d h:i:s",$vo['addtime']);  ?></td>
            <td align="center">
            <?php
			$op = array();
			if($vo['is_parent'] == 1){
				$op[] = '<a href="'.U('Productcategory/child',array('cid'=>$vo['cid'])).'">子菜单</a>';
			}
//			$op[] = '<a href="'.U('Property/index',array('cid'=>$vo['cid'],'path' => $path)).'">属性</a>';
		// 	if(\Libs\System\RBAC::authenticate('edit')){
				$op[] = '<a href="'.U('Productcategory/edit',array('cid'=>$vo['cid'])).'">修改</a>';
		// 	}
		// 	if(\Libs\System\RBAC::authenticate('delete')){
				$op[] = '<a class="J_ajax_del" href="'.U('Productcategory/delete',array('id'=>$vo['id'])).'">删除</a>';
		// 	}
			echo implode(" | ",$op);
			?>
            </td>
          </tr>
        </volist>
        </tbody>
      </table>
        <div class="btn_wrap">
      <div class="btn_wrap_pd">
        <button type="submit">返回</button>
      </div>
    </div>
  </div>
  <div class="btn_wrap">

    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
</body>
</html>