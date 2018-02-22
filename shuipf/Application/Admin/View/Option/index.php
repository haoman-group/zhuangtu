<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">搜索</div>
  <form name="searchform" action="" method="get" >
    <input type="hidden" value="Member" name="g">
    <input type="hidden" value="Member" name="m">
    <input type="hidden" value="index" name="a">
    <input type="hidden" value="1" name="search">
    <div class="search_type cc mb10">
      <div class="mb10"> <span class="mr20"> 注册时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        <select name="status">
          <option value='0' >状态</option>
          <option value='1' >锁定</option>
          <option value='2' >正常</option>
        </select>
        <?php echo Form::select($groupCache, (int)$_GET['groupid'], 'name="groupid"', '会员组') ?>
        <?php echo Form::select($groupsModel, (int)$_GET['modelid'], 'name="modelid"', '会员模型'); ?>
        <select name="type">
          <option value='1' >用户名</option>
          <option value='2' >用户ID</option>
          <option value='3' >邮箱</option>
          <option value='4' >注册ip</option>
          <option value='5' >昵称</option>
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
            <td align="left" width="400">名称</td>
            <td align="left">标识</td>
            <td align="left">值</td>
            <td align="left">状态</td>
            <td align="left">操作</td>
          </tr>
        </thead>
        <tbody>
          <volist name="data" id="vo">
            <tr>
              <td align="left">{$vo['id']}</td>
              <td align="left">{$vo.title}</td>
              <td align="left">{$vo.name}</td>
              <td align="left">-</td>
              <td align="left">-</td>
              <td align="left"><a href="{:U('add', array('id'=>$vo['id']) )}">[新增]</a></td>
            </tr>
            <volist name="vo[field]" id="v">
              <eq name="v['pid']" value="0">
              <tr>
                <td align="left">{$v.id}</td>
                <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ {$v.value}</td>
                <td align="left">{$vo.name}</td>
                <td align="left">{$v.key}</td>
                <td align="left">{$status[$v['status']]}</td>
                <td align="left">
                  <a href="{:U('edit', array('id'=>$v['id']) )}">[修改]</a>
                  <a href="{:U('delete', array('id'=>$v['id']) )}"  class="J_ajax_del">[删除]</a>
                </td>
              </tr>
              </eq>
               <volist name="vo[field]" id="v2">
                 <if condition="$v2['pid'] eq $v['id']">
                <tr>
                <td align="left">{$v2.id}</td>
                <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─ {$v2.value}</td>
                <td align="left">{$vo.name}</td>
                <td align="left">{$v2.key}</td>
                <td align="left">{$status[$v2['status']]}</td>
                <td align="left">
                  <a href="{:U('edit', array('id'=>$v2['id']) )}">[修改]</a>
                  <a href="{:U('delete', array('id'=>$v2['id']) )}"  class="J_ajax_del">[删除]</a>
                </td>
              </tr>
              </if>
              </volist>
            </volist>
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