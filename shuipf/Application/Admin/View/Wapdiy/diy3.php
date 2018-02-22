<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">移动端专题页</div>

    <form action="http://l.zhuangtu.net/index.php?g=Admin&amp;m=Property&amp;a=add" method="post">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tbody><tr>
                    <th width="147">产品ID串：</th>
                    <td>
                        <input type="text" class="input" name="prods">
                    </td>
                </tr>



                </tbody></table>
        </div>


        <div class="">
            <div class="btn_wrap_pd">
                <a class="btn" href="javascript:history.back()">取消</a>
                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
            </div>
        </div>
    </form>

</div>


</body>
</html>