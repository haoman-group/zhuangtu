<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">移动端专题页</div>

    <form action="{:U('edit')}" method="post">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tbody>
                
                <tr>
                    <th width="147">标题：</th>
                    <td>
                        <input type="text" class="input" name="title" size="20" value="{$data.title}">
                    </td>
                </tr>
                <tr>
                    <th width="147">简介：</th>
                    <td>
                        <input type="text" class="input" name="description" size="20" value="{$data.description}">
                    </td>
                </tr>
                

                </tbody></table>
        </div>


        <div class="">
            <div class="btn_wrap_pd">
                <input type="hidden" name="special_id" value="{$data.special_id}">
                <a class="btn" href="javascript:history.back()">取消</a>
                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
            </div>
        </div>
    </form>

</div>
</body>
</html>