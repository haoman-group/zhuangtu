<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a" style="color: red">待审核宝贝：<?php $num = 0;foreach($data as $da){if($da['auditstatus'] == '0') { $num += 1; } } echo $num; ?> ---------- 
                                        待处理宝贝: <?php $num = 0;foreach($data as $da){if($da['auditstatus'] == '2') { $num += 1; } } echo $num; ?>  </div>
    <div class="h_a">搜索</div>
    <form id="searchform"  method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Product" name="m">
        <input type="hidden" value="index" name="a">
        <input type="hidden" value="1" name="search">
        <div class="search_type cc mb10">
            <div class="mb10">
                <span class="mr20">
                         <table>
                             <tr>
                                 <td>
                                     <span>发布时间：</span>
                                     <input type="text" name="start_time" class="input length_2 J_date"  style="width:120px;" value="{$Think.get.start_time}">
                                     -
                                     <input type="text" class="input length_2 J_date" name="end_time"  style="width:120px;" value="{$Think.get.end_time}">
                                 </td>
                                 <td>
                                     <span style="margin-left: 30px;">宝贝名称：</span>
                                     <input name="title" type="text"  class="input" style="width:300px;" value="{$Think.get.title}">
                                 </td>
                                 <td>
                                     <span style="margin-left: 30px;">审核状态：</span>
                                     <select name="audit_status" style="width:200px;">
                                         <option>--全部--</option>
                                         <option value="0"  <if condition="$Think.get.audit_status === '0'">selected</if>>待审核</option>
                                         <option value="-1" <if condition="$Think.get.audit_status === '-1'">selected</if>>违规</option>
                                         <option value="2"  <if condition="$Think.get.audit_status === '2'">selected</if>>待处理</option>
                                         <option value="10" <if condition="$Think.get.audit_status === '10'">selected</if>>下架</option>
                                         <option value="1"  <if condition="$Think.get.audit_status === '1'">selected</if>>通过</option>
                                     </select>
                                 </td>
                             </tr>
                             <!-- 第二行-->
                             <tr>
                                 <td>
                                     <span>店铺名称：</span>
                                     <input name="shop" type="text"  class="input" style="width:260px;" value="{$Think.get.shop}">
                                 </td>
                                 <td>
                                     <span style="margin-left: 30px;">宝贝编号：</span>
                                     <input name="number" type="text"  class="input" style="width:300px;" value="{$Think.get.number}">
                                 </td>
                                 <td>
                                     <span style="margin-left: 30px;">宝贝状态：</span>
                                     <select name="status" style="width:200px;">
                                         <option>--全部--</option>
                                         <option value="10" <if condition="$Think.get.status === '10'">selected</if>>出售中</option>
                                         <option value="-1" <if condition="$Think.get.status === '-1'">selected</if>>仓库中(从未出售)</option>
                                         <option value="1"  <if condition="$Think.get.status === '1'">selected</if>>橱窗推荐</option>
                                         <option value="11" <if condition="$Think.get.status === '11'">selected</if>>售完下架</option>
                                         <option value="12" <if condition="$Think.get.status === '12'">selected</if>>商家下架</option>
                                         <option value="20" <if condition="$Think.get.status === '20'">selected</if>>即将开始</option>
                                         <option value="13" <if condition="$Think.get.status === '13'">selected</if>>违规下架</option>
                                     </select>
                                 </td>
                                 <td>
                                     <input type="reset" class='reset' value="清除条件" style="margin-left: 30px;"/>
                                     <input type='submit' class='sear' value="搜 索"/>
                                 </td>
                             </tr>

                         </table>

                </span>
            </div>
        </div>


    </form>
    <form name="myform" action="{:U('Member/delete')}" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td  align="left"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">ID</td>
                    <td align="left"></td>
                    <td align="left">宝贝编号</td>
                    <td align="left">宝贝标题</td>
                    <td align="left">宝贝类目</td>
                    <td align="left">店铺名称</td>
                    <td align="left">发布时间</td>
                    <td align="left">宝贝状态</td>
                    <td align="left">审核状态</td>
                    <td align="left">操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
<!--                        <a href="javascript:product_infomation({$vo.id}, '', '')">-->
                        <td align="left"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" value="{$vo.id}" name="id[]">{$vo.id}</td>
                        <td align="left">                </td>
                        <td align="left">{$vo.attr_code}</td>
                        <td align="left">{$vo.title}
                        <td align="left"><if condition="$vo.designtype =='0'">家装设计<else/>软装设计</if></td>
                        <td align="left"><font color="#0099ff">{$vo.shopname}</font></td>
                        <td align="left">{$vo.addtime|date='Y-m-d H:i:s',###}</td>
                        <td align="left">
                            <eq name="vo.status" value="10">出售中</eq>
                            <eq name="vo.status" value="-1">仓库中(从未出售)</eq>
                            <eq name="vo.status" value="1">橱窗推荐</eq>
                            <eq name="vo.status" value="11">售完下架</eq>
                            <eq name="vo.status" value="12">商家下架</eq>
                            <eq name="vo.status" value="20">即将开始</eq>
                            <eq name="vo.status" value="13">违规下架</eq>
                        </td>
                        <td align="left">
                            <eq name="vo.auditstatus" value="0">待审核</eq>
                            <eq name="vo.auditstatus" value="-1">违规</eq>
                            <eq name="vo.auditstatus" value="2">待处理</eq>
                            <eq name="vo.auditstatus" value="10">下架</eq>
                            <eq name="vo.auditstatus" value="1">通过</eq>
                        </td>
                        <td align="left">
                            <a href="{:U('info', array('pid'=>$vo['id']) )}"><if condition='$vo.status == "10"'>审核<else/>查看详情</if></a>
                        </td>
                    </tr>
                </volist>
                </tbody>
            </table>
            <div class="p10">
                <div class="pages"> {$Page} </div>
            </div>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn  mr10 J_ajax_submit_btn" data-action="{:U('Admin/Product/delete')}" type="submit">删除</button>
            </div>
        </div>
    </form>
</div>
<!--固定购物车导航-->
<template file="common/_shopcart.php"/>
<!---->
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script>
    //会员信息查看
    function product_infomation(id, modelid, name) {
        omnipotent("product_infomation", GV.DIMAUB+'index.php?g=Admin&m=Product&a=info&pid='+id+'','宝贝详情',1,700,740)
    }
    $(function(){
        	/*绑定"清除条件"的事件*/
	    $("#searchform .reset").click(function(){
		$('#searchform :text').each(function(){$(this).attr('value','')});
	});
    });
</script>
</body>
</html>