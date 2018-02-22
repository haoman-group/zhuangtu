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
                    <td width="50">编号</td>
                    <td>名称</td>
                    <td>简介</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
                        <td>{$vo.special_id}</td>
                        <td>{$vo.title}</td>
                        <td>{$vo.description}</td>
                        <td>
                            <a href="{:U('edit',array('special_id'=>$vo['special_id']))}">修改</a>
                            <a href="{:U('special_edit',array('special_id'=>$vo['special_id']))}">设置</a>
                            <a href="{:U('delete',array('special_id'=>$vo['special_id']))}" class="J_ajax_del">删除</a>
                        </td>
                    </tr>
                </volist>
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