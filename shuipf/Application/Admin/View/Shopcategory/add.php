<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">添加</div>
        <form action="{:U('Shopcategory/add')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">名称：</th>
                        <td>
                            <input type="text" class="input" name="name" id="name" size="20" value="">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">店铺级别名称：</th>
                        <td>
                            <input type="text" class="input" name="shopname" id="shopname" size="20" value="">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">级别：</th>
                        <td>
                            <input type="text" class="input" name="level" id="level" size="20" value="">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">状态：</th>
                        <td>
                            <input type="text" class="input" name="status" id="status" size="20" value="">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">介绍：</th>
                        <td>
                            <input type="text" class="input" name="introduce" id="introduce" size="20" value="">
                        </td>
                    </tr>
                    
                </table>
            </div>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>