<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">添加推荐位</div>
    <form name="myform" action="{:U('edit')}" method="post" class="J_ajaxForm">
        <div class="table_full">
            <table width="100%" class="table_form">

                <tr>
                    <th width=100>活动标题</th>
                    <td><input type="text" name="activetitle" value="{$data.title}" class="input"/></td>
                    <input type="hidden" value="{$data.id}" name="id">
                </tr>
                <tr>
                    <th width=100>活动描述</th>
                    <td><input type="text" name="activedescript" value="{$data.description}" class="input"/></td>
                </tr>



                <tr>
                    <th>状态</th>
                    <td>
                        <select name="status">

                            <option name="status" value="0" <if condition="$data.status eq 0">selected </if>>未启用</option>
                            <option name="status" value="-1" <if condition="$data.status eq -1">selected </if>>禁用</option>
                            <option name="status" value="1" <if condition="$data.status eq 1">selected </if>>启用中</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>选择套餐</th>
                    <td>
                        <select name="package">
                             <option name="package" value="0" <if condition="$data.type eq 0">selected </if>>未选</option>
                            <option name="package" value="1" <if condition="$data.type eq 1">selected </if>>价格组合</option>
                               <option name="package" value="2" <if condition="$data.type eq 2">selected </if>>满减</option>
                        </select>
                    </td>
                </tr>
                <!--<tr>
                    <th>排序</th>
                    <td><input type="text" name="listorder" id="listorder" class="input" size="5" value="0"/></td>
                </tr>-->
                <tr>
                    <th>最大保存条数</th>
                    <td><input type="text" name="maxnum" id="maxnum" class="input" size="5" value="{$data.maxnum}"/> <span>条</span></td>
                </tr>



            </table>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
            </div>
        </div>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>