<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>

  <div class="table_list">

    <form  name="myform" action="{:U('check')}" method="post" class="J_ajaxForm">
   <input type="hidden" name="posid" value="{$posid}">
    <table width="100%" cellspacing="0">
      <thead>
        <tr>
          <td width="40"  align="center">位置</td>
          <td>页面</td>
          <td>推荐位</td>
          <td>操作</td>
        </tr>
      </thead>
      <tbody>
        <for start="1" end="$position[maxnum] + 1">

          <tr>
            <td align="center"><input type="checkbox" name="checkAll[]" value={$i} >{$i}</td>
            <td>{$position.name}</td>
            <td><a href="{:U('lists',array('pageid'=>$page['id']))}">{$page.name}</a></td>
            <td>
              <a href="{:U('item',array('posid'=>$position['posid'],'place'=>$i))}">查看信息</a>
            </td>
          </tr>
        </for>
      </tbody>

    </table>
    <a class="btn mr10 "  href="{:U('Admin/Position/lists',array('pageid'=>$page['id']))}">返回</a>
    <input class="btn mr10 " type="submit" value="更新"> <!--<button name="allChecked" id="allChecked" onclick="DoCheck()">全选/取消</button>-->
    <input type="checkbox" name="allChecked" id ="allChecked" onclick="DoCheck()"/>全选/取消
   
  </form>
  </div>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script>
  
   function DoCheck()
{
  var num={$position[maxnum]};

var ch=document.getElementsByName("checkAll[]");

if(document.getElementsByName("allChecked")[0].checked==true)
{
for(var i=0;i<num;i++)
{
ch[i].checked=true;
}
}else{
for(var i=0;i<num;i++)
{
ch[i].checked=false;
}
}
}

  
  </script>
  </body>
  </html>