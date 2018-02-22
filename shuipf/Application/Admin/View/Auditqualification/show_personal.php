<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
    <div class="h_a">基本信息</div>
    <div class="table_full"> 
    <table width="100%" class="table_form">
		<tr>
			<th width="80">真实姓名</th> 
			<td>{$data.truename}</td>
		</tr>
    <tr>
      <th>性别</th> 
      <td>
        <?php
        echo $data['sex'] == "1"?"男":"女";
        ?></td>
    </tr>
    <tr>
      <th>年龄</th> 
      <td>{$data.age}</td>
    </tr>
    <tr>
      <th>证件类型</th> 
      <td>二代身份证</td>
    </tr>
    <tr>
      <th>证件号码</th> 
      <td>{$data.idcard}</td>
    </tr>
    <tr>
      <th>证件所在地</th> 
      <td>{$data.idcard_address}</td>
    </tr>
    <tr>
      <th>联络方式</th> 
      <td>{$data.phone}</td>
    </tr>
    <tr>
      <th>联系地址</th> 
      <td>{$data.address}</td>
    </tr>
    <tr>
      <th>紧急联络人</th> 
      <td>{$data.emergency_contactor}</td>
    </tr>
    <tr>
      <th>联络方式</th> 
      <td>{$data.emergency_phone}</td>
    </tr>
    <tr>
      <th>联系地址</th> 
      <td>{$data.emergency_address}</td>
    </tr>
    <tr>
      <th>实名认证</th> 
      <td>
        <volist name="data[realname_picture]" id="v">
          <a href="{$v}" target="_blank"><img src="{$v}" height="100"></a>&nbsp;&nbsp;&nbsp;
        </volist>
      </td>
    </tr>
  </table>
  </div>
  <div class="h_a">审核记录</div>
  <div class="table_full">
    <table>
      <tr>
        <th width="100">审核时间</th>
        <th width="100">审核操作</th>
        <th width="400">原因</th>
        <th width="100">审核人</th>
      </tr>
      <volist name="log" id="vo">
      <tr>
        <th>{$vo.addtime|date="Y-m-d H:i",###}</th>
        <th>{$status[$vo['status']]}</th>
        <th>{$vo.reason}</th>
        <th>{$vo.adminid|getAdminName}</th>
      </tr>
      </volist>
    </table>
  </div>

  <div class="h_a">审核操作</div>
  <form name="myform" action="{:U('status')}" method="post" class="J_ajaxForm1">
  <div class="table_full">
    <table>
  		<tr>
  			<th>审核状态</th>
  			<td>
          <select name="status">
            <volist name="status" id="vo">
              <option value="{$key}" <eq name="vo[status]" value="$key">selected</eq>>{$vo}</option>
            </volist>   
          </select>
  			</td>
  		</tr>
      <tr>
        <th width="80">违规原因选择</th> 
        <td>
          <input type="checkbox" name="reason[]" value="图片与分类不符">图片与分类不符 
          备注：<input type="text" name="reason[]">
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