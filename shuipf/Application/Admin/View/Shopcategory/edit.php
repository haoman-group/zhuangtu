<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">修改</div>
        <form action="{:U('Shopcategory/edit')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <volist name="data" id="vo">
                        <tr>
                            <th width="147">ID：</th>
                            <td>
                                <input type="text" class="input" name="id" id="id" size="20" value={$vo.id} readonly="readonly"></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">PID：</th>
                            <td>
                                <input type="text" class="input" name="pid" id="pid" size="20" value={$vo.pid}></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">名称：</th>
                            <td>
                                <input type="text" class="input" name="name" id="name" size="20" value={$vo.name}></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">店铺级别名称：</th>
                            <td>
                                <input type="text" class="input" name="shopname" id="shopname" size="20" value={$vo.shopname}>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">级别：</th>
                            <td>
                                <input type="text" class="input" name="level" id="level" size="20" value={$vo.level}>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">状态：</th>
                            <td>
                                <input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">介绍：</th>
                            <td>
                                <input type="text" class="input" name="introduce" id="introduce" size="20" value={$vo.introduce}>
                            </td>
                        </tr>
                    </volist>
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