<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <form name="myform" action="{:U('edit')}" method="post" class="J_ajaxForm1">
    <div class="h_a">基本信息</div>
    <div class="table_full"> 
    <table width="100%" class="table_form">

      <tr>
        <th width=100>名称</th> 
        <td><input type="text" name="name" class="input" value="{$data[name]}" /></td>
      </tr>
      <tr>
        <th width=100>模型</th> 
        <td><input type="text" name="model" class="input" value="{$data.model}" /></td>
      </tr>
      <tr>
        <th width=100>字段</th> 
        <td><input type="text" name="field" class="input" size="100" value="{$data.field}" /></td>
      </tr>
      <tr>
        <th width=100>主键</th> 
        <td><input type="text" name="primarykey" class="input" value="{$data.primarykey}" /></td>
      </tr>
      <tr>
      <th>Pageid</th>
      <td>
        <select name="pageid">
          <volist name="num" id="vo">
            <option name="pageid" value="{$vo.id}" <if condition ="$data['pageid'] ==$vo['id']">selected</if>>{$vo.name}</option>
            <!--<option name="pageid" value="{$vo.id}">{$vo.name}</option>-->
            
          </volist>
        </select>
      </td>
    </tr>
      <tr>
        <th>排序</th>
        <td><input type="text" name="listorder" id="listorder" class="input" size="5" value="{$data.listorder|default=0}"/></td>
      </tr>
      <tr>
        <th>最大保存条数</th>
        <td><input type="text" name="maxnum" id="maxnum" class="input" size="5" value="{$data.maxnum|default=10}"/> <span>条</span></td>
      </tr>

    </table>

    </div>
    <div class="">
      <div class="btn_wrap_pd">
        <input type="hidden" name="posid" value="{$data.posid}" />
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
      </div>
    </div>
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>