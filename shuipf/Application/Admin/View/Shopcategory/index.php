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
            <td width="50"  align="left"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x" onClick="selectall('tagid[]');">全选</td>
            <td align="center" width="50">PID</td>
            <td align="left" width="50">店铺分类</td>
            <td align="center" width="50">店铺级别</td>
            <td align="center" width="50">级别</td>
            <td align="center" width="50">状态</td>
            <td align="center" width="80">添加时间</td>
            <td align="center" width="80">介绍</td>
            <td align="center" width="80">相关操作</td>
          </tr>
        </thead>
        <tbody>
        <volist name="data" id="vo">
          <eq name="vo['level']" value="1">
          <tr>
            <td width="50"><input type="checkbox" value="{$vo.id}" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="tagid[]">{$vo.id}</td>
            <td align="center">{$vo.pid}</td>
            <td align="left">{$vo.name}</td>
            <td align="center">{$vo.shopname }</td>
            <td align="center">{$vo.level}</td>
            <td align="center">{$vo.status}</td>
            <td align="center"><?php echo date("Y-m-d h:i:s",$vo['addtime']);  ?></td>
            <td align="center">{$vo.introduce}</td>
            <td align="center">
            <?php
			$op = array();
			if(\Libs\System\RBAC::authenticate('edit')){
				$op[] = '<a href="'.U('Shopcategory/edit',array('id'=>$vo['id'])).'">修改</a>';
			}
			if(\Libs\System\RBAC::authenticate('delete')){
				$op[] = '<a class="J_ajax_del" href="'.U('Shopcategory/delete',array('id'=>$vo['id'])).'">删除</a>';
			}
			echo implode(" | ",$op);
			?>
            </td>
          </tr>
          <volist name="data" id="sub">
            <if condition="($sub['level'] eq '2') AND ($sub['pid'] eq $vo['id'])">
              <tr>
            <td width="50"><input type="checkbox" value="{$sub.id}" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="tagid[]">{$sub.id}</td>
            <td align="center">{$sub.pid}</td>
            <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ {$sub.name}</td>
            <td align="center">{$sub.shopname }</td>
            <td align="center">{$sub.level}</td>
            <td align="center">{$sub.status}</td>
            <td align="center"><?php echo date("Y-m-d h:i:s",$sub['addtime']);  ?></td>
            <td align="center">{$sub.introduce}</td>
            <td align="center">
            <?php
			$op = array();
			if(\Libs\System\RBAC::authenticate('edit')){
				$op[] = '<a href="'.U('Shopcategory/edit',array('id'=>$sub['id'])).'">修改</a>';
			}
			if(\Libs\System\RBAC::authenticate('delete')){
				$op[] = '<a class="J_ajax_del" href="'.U('Shopcategory/delete',array('id'=>$sub['id'])).'">删除</a>';
			}
			echo implode(" | ",$op);
			?>
            </td>
          </tr>
            </if>
          </volist>
          </eq>
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