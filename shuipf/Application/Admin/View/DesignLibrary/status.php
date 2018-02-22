<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 11/4/15
 * Time: 11:14
 */
if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <form name="myform" action="{:U('status')}" method="post" class="J_ajaxForm1">
        <div class="h_a">基本信息</div>
        <div class="table_full">
            <table width="100%" class="table_form">
                <tr>
                    <th width="80">用户名</th>
                    <td>{$data.uid}</td>
                </tr>
                <tr>
                    <th width="80">用户名</th>
                    <td>{$data.username}</td>
                </tr>
                <tr>
                    <th width="80">店铺名称</th>
                    <td>{$data.shopname}</td>
                </tr>
                <tr>
                    <th width="80">产品ID</th>
                    <td>{$data.proid}</td>
                </tr>
                <tr>
                    <th width="80">产品标题</th>
                    <td>{$data.title}</td>
                </tr>
                <tr>
                    <th width="80">风格</th>
                    <td>{$data.style}</td>
                </tr>
                <tr>
                    <th width="80">设计库首页</th>
                    <td><img src="{$data.picture}"></img></td>
                </tr>
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