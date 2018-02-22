<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 10/29/15
 * Time: 17:50
 */
if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<style type="text/css">
.mr20 table tr{line-height: 35px;}
.mr20 table tr td span{width:60px;display:inline-block;margin-left: 20px;}
.mr20 table tr td{width:260px;display:inline-block;}
.mr20 table tr td.range{width:520px;display:inline-block;}
.mr20 table tr td.select{width:260px;display:inline-block;}
</style>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <form action="{:U('find')}"  method="post" >
     
                         <table>
                             <tr style="float:left">
                                 <td>
                                     <span >产品ID：</span>
                                     <input name="productid" type="text"  class="input"  value="">
                                 </td>
                             </tr>
                             <tr style="float:left">
                              <td>
                                <input type='submit'  value="搜 索"/>
                              </td>
                             </tr>
                         </table>

         


    </form>
    <form name="myform" action="{:U('Order/delete')}" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td align="left" width="45">ID</td>
                    <td align="left">产品ID</td>
                    <td align="left">卖家名</td>
                    <td align="left">评价内容</td>
                    <td align="left">添加时间</td>
                    <td align="left">操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
                      <td align="left">{$vo.id}</td>
                      <td align="left">{$vo.itemid}</td>
                      <td align="left">{$vo.sellername}</td>
                      <td align="left">{$vo.content}</td>
                      <td align="left">{$vo.addtime|date="Y-m-d H:i",###}</td>
                      <td align="left">
                    <a href="{:U('edit',array('id'=>$vo['id']))}">修改</a>
                    <a href="{:U('delete',array('id'=>$vo['id']))}">删除</a></td>
                        </td>
                    </tr>
                </volist>
                </tbody>
            </table>
            <div class="p10">
                <div class="pages"> {$pageinfo['page']} </div>
            </div>
        </div>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
$(function(){
  $('.export').click(function(){
      $("#searchform #a").val("export");
      $("#searchform").submit();
      $("#searchform #a").val("index");
    });
})
</script>
</body>
</html>
