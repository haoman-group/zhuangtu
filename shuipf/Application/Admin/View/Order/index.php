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

    <form id="searchform"  name="searchform" method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Order" name="m">
        <input type="hidden" value="index" name="a" id='a'>
        <input type="hidden" value="1" name="search">
        <div class="search_type cc mb10">
            <div class="mb10">
                <span class="mr20">
                         <table>
                             <tr>
                                 <td>
                                     <span >订单号：</span>
                                     <input name="order_sn" type="text"  class="input"  value="{$Think.get.order_sn}">
                                 </td>
                                 <td>
                                     <span >支付号：</span>
                                     <input name="pay_sn" type="text" class="input"  value="{$Think.get.pay_sn}">
                                 </td>
                                 <td>
                                     <span>店铺名称：</span>
                                     <input name="shop" type="text"  class="input" value="{$Think.get.shop}">
                                 </td>
                                 <td class="range">
                                     <span> 订单总额：</span>
                                     <input name="min_price" type="text" class="input" value="{$Think.get.min_price}">
                                     --
                                     <input name="max_price" type="text" class="input" value="{$Think.get.max_price}">
                                 </td>
                             </tr>
                             <!-- 第二行 -->
                             <tr>
                                 <td>
                                     <span>买家名：</span>
                                     <input name="username" type="text"  class="input" value="{$Think.get.username}">
                                 </td>
                                 <td>
                                     <span>买家电话：</span>
                                     <input name="mobile" type="text"  class="input" value="{$Think.get.mobile}">
                                 </td>
                                 <td class="range">
                                     <span >下单时间：</span>
                                     <input type="text" name="start_time" class="input length_2 J_date"   value="{$Think.get.start_time}">
                                     --
                                     <input type="text" class="input length_2 J_date" name="end_time"   value="{$Think.get.end_time}">
                                 </td>
                                 <td class="range">
                                     <span>付款时间：</span>
                                     <input type="text" name="pay_start_time" class="input length_2 J_date"  value="{$Think.get.pay_start_time}">
                                     --
                                     <input type="text" class="input length_2 J_date" name="pay_end_time" value="{$Think.get.pay_end_time}">
                                 </td>
                             </tr>

                             <!-- 第三行-->
                             <tr>
                             </tr>
                             <tr>
                                 <td class="select">
                                     <span >订单状态：</span>
                                     <select name="order_state">
                                         <option value="">--全部--</option>
                                         <volist name='statelist' id='at' >
                                             <option value='{$key}' <if condition=" null !== $Think.get.order_state and $Think.get.order_state == $key">selected</if>>{$at}</option>
                                         </volist>
                                     </select>
                                 </td>
                                 <td class="select">
                                     <span>支付方式：</span>
                                     <select name="paymode">
                                         <option value=""> --全部-- </option>
                                         <volist name="paymodelist" id="pvo">
                                             <option value='{$key}' <if condition=" null !== $Think.get.paymode and $Think.get.paymode == $key">selected</if>>{$pvo}</option>
                                         </volist>
                                     </select>
                                 </td>
                                <td  class="select" >
                                    <span>退款状态:</span>
                                    <select name="refund_state" >
                                        <option value=''>--全部--</option>
                                        <volist name="refundState" id="rs">
                                            <option value='{$key}' <if condition=" ''!==$Think.get.refund_state and null !== $Think.get.refund_state and $Think.get.refund_state == $key">selected</if>>{$rs}</option>
                                        </volist>
                                    </select>
                                </td>
                                <td><!--<input type="reset" class='reset' value="清除条件" style="margin-left: 30px;"/>-->
                                     <a style="margin-left:20px;" href="{:U('index')}">清除条件</a>
                                     <input type='submit' class='sear' value="搜 索"/>
                                     <input type='button' class='export' value="导出csv"/>
                                     <!-- <a class="btn export" href="javascript:void(0)">导出CSV</a> -->
                                </td>
                                </tr>
                         </table>

                </span>
            </div>
        </div>


    </form>
    <form name="myform" action="{:U('Order/delete')}" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td align="left" width="45">#</td>
                    <td align="left">订单号</td>
                    <td align="left">支付号</td>
                    <td align="left">店铺</td>
                    <td align="left">买家</td>
                    <td align="left">买家电话</td>
                    <td align="left">下单时间</td>
                    <td align="left">付款时间</td>
                    <td align="left">订单总额</td>
                    <td align="left">支付方式</td>
                    <td align="left">订单状态</td>
                    <td align="left">退款状态</td>
                    <td align="left">操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
                      <td align="left">{$vo.order_id}</td>
                      <td align="left">{$vo.order_sn}</td>
                      <td align="left">{$vo.pay_sn}</td>
                      <td align="left">{$vo.shop_name}</td>
                      <td align="left">{$vo.buyer_name}</td>
                      <td align="left">{$vo.mobile}</td>
                      <td align="left">{$vo.addtime|date="Y-m-d H:i:s",###}</td>
                      <td align="left"><?= empty($vo['payment_time'])?"N/A":date("Y-m-d H:i:s",$vo['payment_time']);?></td>
                      <td align="left">{$vo.order_amount}元</td>
                      <td align="left">{$vo.payment_code}</td>
                      <td align="left">{$statelist[$vo[order_state]]}</td>
                      <td align="left">{$refundState[$vo[refund_state]]}</td>
                      <td align="left">
                          <a href="{:U('show', array('order_id'=>$vo['order_id']) )}">[查看]</a>
                        </td>
                    </tr>
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
