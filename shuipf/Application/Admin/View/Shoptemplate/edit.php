<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">修改</div>
        <form action="{:U('Shoptemplate/edit')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <tr>
                        <th width="147">标题：</th>
                        <td>
                            <input type="text" class="input" name="title" size="40" value="{$data.title}">
                        </td>
                    </tr>
                    <tr>
                        <th width="147">页面类型：</th>
                        <td>
                            <select name="type">
                            <option value="level1" <eq name="data[type]" value='level1'>selected</eq>>一级页面</option>
                                <option value="detail"  <eq name="data[type]" value='detail'>selected</eq>>详情页面</option>
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
                        <th width="147">状态：</th>
                        <td>
                            <select name="status">
                                <option value="1" <eq name="data[status]" value='1'>selected</eq>>启用</option>
                                <option value="0" <eq name="data[status]" value='0'>selected</eq>>禁用</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th width="147">高度：</th>
                        <td>
                            <input type="text" class="input" name="height" size="40" value="{$data.height}">px
                        </td>
                    </tr>
                    <tr>
                        <th width="147">模版内容：</th>
                        <td>
                            <textarea name="content" style="height:400px;" cols="100" rows="10">{$data.content}</textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="">
                <div class="btn_wrap_pd">
                    <input type="hidden" name="id" value="{$data.id}">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>