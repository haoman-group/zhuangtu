<?php

if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
    <Admintemplate file="Common/Nav"/>
    <div class="common-form">
        <div class="h_a">商户信息</div>
            <div class="table_list">
                <table>
                    <tbody>
                        <tr>
                            <td>用户ID:</td>
                            <td>{$Think.get.userid}</td>
                        </tr>
                        <tr>
                            <td>用户名:</td>
                            <td>{$userinfo.username}</td>
                        </tr>
                        <tr>
                            <td>用户手机号:</td>
                            <td>{$userinfo.mobile}</td>
                        </tr>
                        <tr>
                            <td>店铺名称:</td>
                            <td>{$userinfo.name}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <div class="h_a">添加POS机信息</div>
        <div class="table_list">
            <form action="{:U('Admin/PosManage/add')}" method="post">
            <input type="hidden" name="uid" value="{$Think.get.userid}">
            <table cellpadding="0" cellspacing="0" class="table_form" width="30%">
                <tbody>
                    <tr>
                        <td>终端号:</td>
                        <td><input name="pos_sn"  type="text" class="input" id="pos_sn"></td>
                    </tr>
                    <tr>
                        <td>经手人/安装:</td>
                        <td><input name="manager"  type="text" class="input" id="pos_sn"></td>
                    </tr><tr>
                        <td>法人:</td>
                        <td><input name="legal_person"  type="text" class="input" id="pos_sn"></td>
                    </tr><tr>
                        <td>联系电话:</td>
                        <td><input name="pmobile"  type="text" class="input" id="pos_sn"></td>
                    </tr><tr>
                        <td>安装地址:</td>
                        <td><input name="paddr"  type="text" class="input" id="pos_sn"></td>
                    </tr>
                    <tr>
                        <td>商户类型:</td>
                        <td>
                            <select name="ptype" style="width:100px;">
                                <volist name="ptypes" id="pvo">
                                    <option value='{$key}'>{$pvo}</option>
                                </volist>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>付款类型:</td>
                        <td><select name="ppayment" style="width:100px;">
                                <volist name="ppayments" id="pvo">
                                    <option value='{$key}'>{$pvo}</option>
                                </volist>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type='submit' class='' value="提交"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>

</body>
</html>