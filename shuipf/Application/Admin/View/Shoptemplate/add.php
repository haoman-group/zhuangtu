<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">添加</div>
        <form action="{:U('Shoptemplate/add')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">标题：</th>
                        <td>
                            <input type="text" class="input" name="title" size="40" value="">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">页面类型：</th>
                        <td>
                            <select name="type">
                                <option value="level1">一级页面</option>
                                <option value="detail">详情页面</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">状态：</th>
                        <td>
                            <select name="status">
                                <option value="1">启用</option>
                                <option value="0">禁用</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                      <th>图片</th>
                      <td>
                        <Form function="images" parameter="thumb,thumb,$data['thumb'],content"/>
                      </td>
                    </tr>
                    <tr>
                        <th width="147">高度：</th>
                        <td>
                            <input type="text" class="input" name="height" size="40" value="">px
                        </td>
                    </tr>
                    <tr>
                        <th width="147">模版内容：</th>
                        <td>
                            <textarea name="content" style="height:400px;" cols="100" rows="10"></textarea>
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