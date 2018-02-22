<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">移动端专题页</div>

    <form action="/index.php?g=Admin&amp;m=Property&amp;a=add" method="post">
        <div class="table_full">
            <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                <tbody>
                
                <tr>
                    <th width="147">内容：</th>
                    <td>
                        <div class="diywout cc">
                            <div class="diymobilebox">
                                <div class="diypanelout">
                                    <div class="diypanelin">
                                        <div class="cell cellpics">
                                            <div class="celltit">图片</div>
                                            <img src="{$config_siteurl}statics/images/admin/content/nopic.gif">
                                            <div class="tools">
                                                <a nctype="btn_move_up" href="javascript:;"><i class="icon-arrow-up"></i>上移</a>
                                                <a nctype="btn_move_down" href="javascript:;"><i class="icon-arrow-down"></i>下移</a>
                                                <a nctype="btn_usable" data-id="2" href="javascript:;"><i class="icon-off"></i>启用</a>
                                                <a nctype="btn_edit_item" data-id="2" href="/index.php?g=Admin&m=Wapdiy&a=diy1&id="><i class="icon-edit"></i>编辑</a>
                                                <a nctype="btn_del_item" data-id="2" href="javascript:;"><i class="icon-trash"></i>删除</a>
                                            </div>
                                        </div>

                                        <div class="cell cellfocus">
                                            <div class="celltit">轮播</div>
                                            <img src="{$config_siteurl}statics/images/admin/content/nopic.gif">
                                            <div class="tools">
                                                <a nctype="btn_move_up" href="javascript:;"><i class="icon-arrow-up"></i>上移</a>
                                                <a nctype="btn_move_down" href="javascript:;"><i class="icon-arrow-down"></i>下移</a>
                                                <a nctype="btn_usable" data-id="2" href="javascript:;"><i class="icon-off"></i>启用</a>
                                                <a nctype="btn_edit_item" data-id="2" href="/index.php?g=Admin&m=Wapdiy&a=diy2&id="><i class="icon-edit"></i>编辑</a>
                                                <a nctype="btn_del_item" data-id="2" href="javascript:;"><i class="icon-trash"></i>删除</a>
                                            </div>
                                        </div>

                                        <div class="cell cellprods">
                                            <div class="celltit">产品列表</div>
                                            <ul class="ulprodlist">
                                                <li>
                                                    <img src="{$config_siteurl}statics/images/admin/content/nopic.gif">
                                                    <div class="name">产品名称</div>
                                                </li>
                                            </ul>
                                            <div class="tools">
                                                <a nctype="btn_move_up" href="javascript:;"><i class="icon-arrow-up"></i>上移</a>
                                                <a nctype="btn_move_down" href="javascript:;"><i class="icon-arrow-down"></i>下移</a>
                                                <a nctype="btn_usable" data-id="2" href="javascript:;"><i class="icon-off"></i>启用</a>
                                                <a nctype="btn_edit_item" data-id="2" href="/index.php?g=Admin&m=Wapdiy&a=diy3&id="><i class="icon-edit"></i>编辑</a>
                                                <a nctype="btn_del_item" data-id="2" href="javascript:;"><i class="icon-trash"></i>删除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="diybtns">
                                <a href="">图片</a>
                                <a href="">轮播图</a>
                                <a href="">产品列表</a>
                            </div>
                        </div>


                    </td>
                </tr>


                </tbody></table>
        </div>


<!--        <div class="">-->
<!--            <div class="btn_wrap_pd">-->
<!--                <a class="btn" href="/index.php?g=Admin&amp;m=Property">取消</a>-->
<!--                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>-->
<!--            </div>-->
<!--        </div>-->
    </form>

</div>
</body>
</html>