<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
  <Admintemplate file="Common/Nav"/>
  <!-- <div class="h_a">添加数据</div> -->
  <form name="myform" action="{:U('newedit')}" method="post">
  <div class="table_full">
  <table width="100%" class="table_form">

    <tr>
      <th width="80">评论ID</th> 
      <td >{$data['id']}</td>
    </tr>
    <tr>
      <th width="80">订单号</th> 
      <td><input type="number" name="order_sn" value="{$data.order_sn}" class="input" readonly/>
</td>
    </tr>

    <tr>
      <th>店铺id</th> 
  <td><input type="text" name="shop_id" value="{$data.shop_id}" class="input" readonly/>
  </td>
    </tr>
     <tr>
      <th>店铺名称:</th> 
      <td>
  <input type="text" name="shop_name" value="{$data.shop_name}" class="input" readonly/>
   </td>
    </tr>
    <tr>
      <th>产品ID</th>
      <td>
        <input type="text" name="productid" value="{$data.product_id}" class="input" size="30" readonly/>
      </td>
    </tr>

    <tr>
      <th>评论人ID</th>
      <td>
      <input type="text" name="userid" value="{$data.userid}" class="input" size="30"  
      readonly/>
      </td>
    </tr>

    <tr>
      <th>评论人姓名</th>
      <td>
    <input type="text" name="username" value="{$data.username}" class="input" size="30"
     readonly/>
      </td>
    </tr>

    <tr>
      <th>评论人电话</th>
      <td>
      <input type="text" name="title" value="{$data.buyertel}" class="input" size="70" 
      readonly/>
      </td>
    </tr>
     <tr>
      <th>评论人时间</th>
      <td>
      <input type="text" name="addtime" value="{$data.addtime|date="Y-m-d H:i",###}" class="input" size="70" readonly/>
      </td>
    </tr>

    <tr>
      <th>评论内容</th>
      <td>
      <textarea name="content" cols="70">{$data.content}</textarea>
      </td>
    </tr>

    <!-- <tr>
      <th>图片</th>
      <td>
        <Form function="multi_images" parameter="picture,picture,$data['picture'],content"/>
      </td>
    </tr>
      <th>手机图片</th>
      <td>
          <Form function="multi_images" parameter="picture1,picture1,$data['wap_picture'],content"/>
      </td>
      </tr> -->
   

   <!--  <tr>
      <th>链接</th>
      <td>
        <input type="text" name="url" value="{$data.url}" class="input" size="70"/>
      </td>
    </tr> -->


  </table>
  </div>
   <div class="">
      <div class="btn_wrap_pd">   
        <input type="hidden" name="id" value="{$data.id}">          
      <button class="btn " type="submit">提交</button>
        <!-- <a class="btn mr10 "  href="{:U('Admin/Position/item',array('posid'=>$position['posid'],'place'=>$data['place']))}">返回</a> -->
      </div>
    </div>
    
  </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>

</body>
</html>