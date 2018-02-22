<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 11/3/15
 * Time: 14:57
 */

if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">搜索</div>
    <form name="searchform" action="" method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="DesignLibrary" name="m">
        <input type="hidden" value="index" name="a">
        <input type="hidden" value="1" name="search">
        <div class="search_type cc mb10">
            <div class="mb10"> <span class="mr20"> 上传时间：
        <input type="text" name="start_time" class="input length_2 J_date" value="{$Think.get.start_time}" style="width:80px;">
        -
        <input type="text" class="input length_2 J_date" name="end_time" value="{$Think.get.end_time}" style="width:80px;">
        <select name="type">
            <option value='1' >用户ID</option>
            <option value='2' >用户名</option>
            <option value='3' >店铺名称</option>
            <option value='4' >店铺类型</option>
            <option value='5' >风格</option>
        </select>
        <input name="keyword" type="text" value="{$Think.get.keyword}" class="input" />
        <button class="btn">搜索</button>
        </span> </div>
        </div>
    </form>
    <form name="myform" action="{:U('DesignLibrary/delete')}" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td  align="left" width="25">#</td>
                    <td align="left" width="100">用户名</td>
                    <td align="left" width="100">店铺名称</td>
                    <td align="left" width="100">店铺类型</td>
                    <td align="left" width="35">产品ID</td>
                    <td align="left" width="250px" style="overflow:hidden">产品标题</td>
                    <td align="left" width="50">风格</td>
                    <td align="left" width="100">上传时间</td>
                    <td align="left" width="50">状态</td>
                    <td align="left" width="80">操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
                        <td align="left">{$vo.id}</td>
                        <td align="left">{$vo.username}</td>
                        <td align="left">{$vo.shopname}</td>
                        <td align="left">{$vo.shopcatname}</td>
                        <td align="left">{$vo.proid}</td>
                        <td align="left">{$vo.title}</td>
                        <td align="left">{$vo.style}</td>
                        <td align="left">{$vo.addtime|date="Y-m-d H:i",###}</td>
                        <td align="left">{$status[$vo[status]]}</td>
                        <td align="left">
                            <a href="{:U('status', array('id'=>$vo['id']) )}">[状态]</a>
                            <a href="{:U('delete', array('id'=>$vo['id']) )}" class="J_ajax_del">[删除]</a>
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
    //会员信息查看
    function member_infomation(userid, modelid, name) {
        omnipotent("member_infomation", GV.DIMAUB+'index.php?g=Member&m=Member&a=memberinfo&userid='+userid+'', "个人信息",1)
    }
</script>
</body>
</html>