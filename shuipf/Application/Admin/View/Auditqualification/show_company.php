<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
    <div class="h_a">基本信息</div>
    <div class="table_full"> 
    <table width="100%" class="table_form">
    <tr>
      <th width="80">公司名称</th> 
      <td>{$data.company_name}</td>
    </tr>
    <tr>
      <th>营业执照</th> 
      <td>{$data.business_licence_number}</td>
    </tr>
    <tr>
      <th>执照有效期</th> 
      <td>{$data.business_licence_validity}</td>
    </tr>
    <tr>
      <th>主营范围</th> 
      <td>{$data.business_scope}</td>
    </tr>
    <tr>
      <th>代理品牌</th> 
      <td>{$data.agent_brand}</td>
    </tr>
    <tr>
      <th>营业执照</th> 
      <td>
        <volist name="data[business_licence_picture]" id="v">
          <a href="{$v}" target="_blank"><img src="{$v}" height="100"></a>&nbsp;&nbsp;&nbsp;
        </volist>
      </td>
    </tr>
    <tr>
      <th>法人照片</th> 
      <td>
        <volist name="data[corporation_picture]" id="v">
          <a href="{$v}" target="_blank"><img src="{$v}" height="100"></a>&nbsp;&nbsp;&nbsp;
        </volist>
      </td>
    </tr>
    <tr>
      <th>法人证件照</th> 
      <td>
        <volist name="data[corporation_idcard_picture]" id="v">
          <a href="{$v}" target="_blank"><img src="{$v}" height="100"></a>&nbsp;&nbsp;&nbsp;
        </volist>
      </td>
    </tr>
    <tr>
      <th>法人电话</th> 
      <td>{$data.corporation_phone}</td>
    </tr>
    <tr>
      <th>代理资质</th> 
      <td></td>
    </tr>
    <tr>
      <th>代理品牌</th> 
      <td>{$data.agent_brand_name}</td>
    </tr>
    <tr>
      <th>代理级别</th> 
      <td>{$data.agent_level}</td>
    </tr>
    <tr>
      <th>代理时间</th> 
      <td>{$data.agent_start_date}-{$data.agent_end_date}</td>
    </tr>
    <tr>
      <th>授权证明</th> 
      <td>
        <volist name="data[agent_authorize_picture]" id="v">
          <a href="{$v}" target="_blank"><img src="{$v}" height="100"></a>&nbsp;&nbsp;&nbsp;
        </volist>
      </td>
    </tr>
    <tr>
      <th>实体店</th> 
      <td><?php echo $data[ 'has_shop']=='1' ?有:无; ?></td>
    </tr>
    <tr>
      <th>店铺名称</th> 
      <td>{$data.shop_name}</td>
    </tr>
    <tr>
      <th>店铺地址</th> 
      <td>{$data.shop_address}</td>
    </tr>
    <tr>
      <th>店铺电话</th> 
      <td>{$data.shop_phone}</td>
    </tr>
    <tr>
      <th>店铺照片</th> 
      <td>
        <volist name="data[shop_picture]" id="v">
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