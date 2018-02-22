<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <div class="h_a">添加数据</div>
  <form name="myform" action="{:U('item_edit')}" method="post" class="J_ajaxForm1">
  <div class="table_full">
  <table width="100%" class="table_form">

    <tr>
      <th width="80">推荐位</th> 
      <td>{:M('Position')->getFieldByPosid($data['posid'],'name')}</td>
    </tr>
    <tr>
      <th width="80">位置</th> 
      <td><input type="number" name="place" value="{$data.place}" class="input"/></td>
    </tr>

    <tr>
      <th>推荐id</th> 
      <td><input type="text" name="dataid" value="{$data.dataid}" class="input"/></td>
    </tr>
     <tr>
      <th>状态:</th> 
      <td>
     <select name="status">
      <option value="0" <if condition="$data['status'] == 0">selected</if>>禁用</option>
      <option value="1" <if condition="$data['status'] == 1">selected</if>>启用</option>
     </select>
   </td>
    </tr>
    <tr>
      <th>开始时间</th>
      <td>
      <input type="text" name="starttime" value="{$data.starttime}" class="input J_datetime" size="30"/>
      </td>
    </tr>

    <tr>
      <th>结束时间</th>
      <td>
      <input type="text" name="endtime" value="{$data.endtime}" class="input J_datetime" size="30"/>
      </td>
    </tr>

    <tr>
      <th>排序</th>
      <td>
      <input type="text" name="listorder" value="{$data.listorder}" class="input" size="30"/>
      </td>
    </tr>

    <tr>
      <th>标题</th>
      <td>
      <input type="text" name="title" value="{$data.title}" class="input" size="70"/>
      </td>
    </tr>

    <tr>
      <th>简介</th>
      <td>
      <textarea name="description" cols="70">{$data.description}</textarea>
      </td>
    </tr>

    <tr>
      <th>图片</th>
      <td>
        <Form function="multi_images" parameter="picture,picture,$data['picture'],content"/>
      </td>
    </tr>
      <th>手机图片</th>
      <td>
          <Form function="multi_images" parameter="picture1,picture1,$data['wap_picture'],content"/>
      </td>
      </tr>
   

    <tr>
      <th>链接</th>
      <td>
        <input type="text" name="url" value="{$data.url}" class="input" size="70"/>
      </td>
    </tr>
     <tr>
      <th>视频连接</th>
      <td>
      <textarea name="void" cols="70"><?php echo htmlspecialchars_decode($data['void']); ?></textarea>
      </td>
    </tr>


  </table>
  </div>
   <div class="">
      <div class="btn_wrap_pd">   
        <input type="hidden" name="id" value="{$data.id}">          
        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
        <a class="btn mr10 "  href="{:U('Admin/Position/item',array('posid'=>$position['posid'],'place'=>$data['place']))}">返回</a>
      </div>
    </div>
    
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>

</body>
</html>