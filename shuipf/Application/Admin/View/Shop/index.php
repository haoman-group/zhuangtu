<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 10/29/15
 * Time: 17:50
 */
if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">搜索</div>
    <form name="searchform" action="" method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Shop" name="m">
        <input type="hidden" value="index" name="a">
        <input type="hidden" value="1" name="search">
        <div class="search_type cc mb10">
            <div class="mb10"> <span class="mr20"> 注册时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        <select name="type">
            <option value='1' <eq name="Think.get.type" value="1">selected</eq>>用户ID</option>
            <option value='2' <eq name="Think.get.type" value="2">selected</eq>>用户名</option>
            <option value='3' <eq name="Think.get.type" value="3">selected</eq>>店铺名称</option>
            <option value='4' <eq name="Think.get.type" value="4">selected</eq>>店铺类型ID</option>
            <option value='5' <eq name="Think.get.type" value="5">selected</eq>>站内域名</option>
        </select>
        <input name="keyword" type="text" value="{$Think.get.keyword}" class="input" />
        <button class="btn">搜索</button>
        </span> </div>
        </div>
    </form>
    <form name="myform" action="{:U('Shop/delete')}" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td align="left" width="45">#</td>
                    <td align="left">用户ID</td>
                    <td align="left">店铺ID</td>
                    <td align="left">用户名</td>
                    <td align="left">店铺名称</td>
                    <td align="left">店铺类型</td>
                    <td align="left">注册时间</td>
                    <td align="left">更新时间</td>
                    <td align="left">状态</td>
                    <td align="left">站内域名</td>
                    <td align="left">操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
                      <td align="left"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x"  value="{$vo.id}" name="id[]">{$i}</td>
                      <td align="left">{$vo.uid}</td>
                      <td align="left">{$vo.id}</td>
                      <td align="left">{$vo.username}</td>
                      <td align="left">{$vo.name}</td>
                      <td align="left">{$vo.category}</td>
                      <td align="left">{$vo.addtime|date="Y-m-d H:i",###}</td>
                      <td align="left">{$vo.updatetime|date="Y-m-d H:i",###}</td>
                      <td align="left">{$status[$vo['status']]}</td>
                      <td align="left">{$vo.domain}</td>
                      <td align="left">
                          <a href="{:U('edit', array('id'=>$vo['id']) )}">[修改]</a>
                          <!-- <a href="{:U('addBrand', array('id'=>$vo['id']) )}">[绑卡]</a> -->
                        </td>
                    </tr>
                </volist>
                </tbody>
            </table>
             <input type="checkbox" name="allChecked" id ="allChecked" onclick="DoCheck()"/>全选/取消
            <div class="p10">
                <div class="pages"> {$Page} </div>
            </div>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn  mr10 J_ajax_submit_btn" data-action="{:U('Admin/Shop/lock')}"   type="submit">冻结</button>
                <button class="btn  mr10 J_ajax_submit_btn" data-action="{:U('Admin/Shop/unlock')}" type="submit">解冻</button>
                <button class="btn  mr10 J_ajax_submit_btn" data-action="{:U('Admin/Shop/delete')}" type="submit">删除</button>
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
    function DoCheck()
    {
        var num=20;
        var ch=document.getElementsByName("id[]");
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