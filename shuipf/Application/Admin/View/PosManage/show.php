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
        <div class="h_a">POS机绑定信息</div>
        <div class="table_list">
            <table cellpadding="0" cellspacing="0" class="table_form" width="30%">
                <tbody>
                    <tr>
                        <td>终端号:</td>
                        <td>{$data.pos_sn}</td>
                    </tr>
                    <tr>
                        <td>POS_ID:</td>
                        <td>{$data.pos_id}</td>
                    </tr><tr>
                        <td>安装时间:</td>
                        <td>{$data.addtime|date="Y-m-d H:i:s",###}</td>
                    </tr><tr>
                        <td>经手人/安装:</td>
                        <td>{$data.manager}</td>
                    </tr><tr>
                        <td>法人:</td>
                        <td>{$data.legal_person}</td>
                    </tr><tr>
                        <td>联系电话:</td>
                        <td>{$data.pmobile}</td>
                    </tr><tr>
                        <td>安装地址:</td>
                        <td>{$data.paddr}</td>
                    </tr><tr>
                        <td>商户类型:</td>
                        <td>{$data.ptype}</td>
                    </tr>
                    <tr>
                        <td>付款类型:</td>
                        <td>{$data.ppayment}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>

</body>
</html>