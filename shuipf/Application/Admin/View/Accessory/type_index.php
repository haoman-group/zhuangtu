<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/21/16
 * Time: 19:35
 */

if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">搜索</div>
    <form name="searchform" action="" method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Accessory" name="m">
        <input type="hidden" value="index" name="a">
        <input type="hidden" value="1" name="search">
        <span class="mr10">
        <select name="type">
            <option value='1' >辅材分类</option>
            <option value='2' >品牌名称</option>
            <option value='3' >规格</option>
        </select>
        <input name="keyword" type="text" value="{$Think.get.keyword}" class="input" />
        <button class="btn">搜索</button>
        </span> </div>
</div>
</form>
<form name="myform" action="{:U('Accessory/delete')}" method="post" class="J_ajaxForm">
    <div class="table_list">
        <table width="100%" cellspacing="0">
            <thead>
            <tr>
                <td align="left" width="20">#</td>
                <td align="left">辅材类名</td>
                <td align="left">辅材类型</td>
                <td align="left">品牌</td>
                <td align="left">规格</td>
                <td align="left">操作</td>
            </tr>
            </thead>
            <tbody>
            <volist name="data" id="vo">
                <tr>
                    <td align="left">{$i}</td>
                    <td align="left">{$vo.name}</td>
                    <td align="left">{$vo.category}</td>
                    <td align="left">{$vo.brand}</td>
                    <td align="left">{$vo.norm}</td>
                    <td align="left">
                        <a href="{:U('delete_type', array('id'=>$vo['id']))}">[删除]</a>
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