<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <form name="myform" action="http://l.zhuangtu.net/index.php?g=Admin&amp;m=Order&amp;a=delete" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td align="left"  style="text-align:center">编号</td>
                    <td align="left"  style="text-align:center">名称</td>
                    <td align="left"  style="text-align:center">文件名</td>
                    <td align="left">操作</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td align="left" style="text-align:center">1</td>
                    <td align="left" style="text-align:center">预约验收</td>
                    <td align="left"  style="text-align:center">yanshou</td>
                    <td align="left">
                        <a href="http://l.zhuangtu.net/index.php?g=Admin&amp;m=Wapdiy&amp;a=edit&amp;id=1">修改</a>
                        <a href="http://l.zhuangtu.net/index.php?g=Admin&amp;m=Wapdiy&amp;a=diy&amp;id=1">设置内容</a>
                        <a href="http://l.zhuangtu.net/index.php?g=Admin&amp;m=Wapdiy&amp;a=del&amp;id=1">删除</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="p10">
                <div class="pages">  </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>