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
                                        <div class="cell cellpics" data-itemid="11">
                                            <div class="celltit">图片</div>
                                            <img src="{$config_siteurl}statics/images/admin/content/nopic.gif">
                                            <div class="tools">
                                                <a class="btn_move_up"class href="javascript:;"><i class="icon-arrow-up"></i>上移</a>
                                                <a class="btn_move_down" href="javascript:;"><i class="icon-arrow-down"></i>下移</a>
                                                <a class="btn_usable" data-id="2" href="javascript:;"><i class="icon-off"></i>启用</a>
                                                <a class="btn_edit_item" data-id="2" href="/index.php?g=Admin&m=Wapdiy&a=diy1&id="><i class="icon-edit"></i>编辑</a>
                                                <a class="btn_del_item" data-id="2" href="javascript:;"><i class="icon-trash"></i>删除</a>
                                            </div>
                                        </div>

                                        <div class="cell cellfocus"  data-itemid="22">
                                            <div class="celltit">轮播</div>
                                            <img src="{$config_siteurl}statics/images/admin/content/nopic.gif">
                                            <div class="tools">
                                                <a class="btn_move_up" href="javascript:;"><i class="icon-arrow-up"></i>上移</a>
                                                <a class="btn_moveclass_down" href="javascript:;"><i class="icon-arrow-down"></i>下移</a>
                                                <a class="btn_usable" data-id="2" href="javascript:;"><i class="icon-off"></i>启用</a>
                                                <a class="btn_edit_item" data-id="2" href="/index.php?g=Admin&m=Wapdiy&a=diy2&id="><i class="icon-edit"></i>编辑</a>
                                                <a class="btn_del_item" data-id="2" href="javascript:;"><i class="icon-trash"></i>删除</a>
                                            </div>
                                        </div>

                                        <div class="cell cellprods"  data-itemid="33">
                                            <div class="celltit">产品列表</div>
                                            <ul class="ulprodlist">
                                                <li>
                                                    <img src="{$config_siteurl}statics/images/admin/content/nopic.gif">
                                                    <div class="name">产品名称</div>
                                                </li>
                                            </ul>
                                            <div class="classtools">
                                                <a class="btn_move_up" href="javascript:;"><i class="icon-arrow-up"></i>上移</a>
                                                <a class="btn_move_down" href="javascript:;"><i class="icon-arrow-down"></i>下移</a>
                                                <a class="btn_usable" data-id="2" href="javascript:;"><i class="icon-off"></i>启用</a>
                                                <a class="btn_edit_item" data-id="2" href="/index.php?g=Admin&m=Wapdiy&a=diy3&id="><i class="icon-edit"></i>编辑</a>
                                                <a class="btn_del_item" data-id="2" href="javascript:;"><i class="icon-trash"></i>删除</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="diybtns">
                                <a href="javascript:" data-itype="1">图片</a>
                                <a href="javascript:" data-itype="2">轮播图</a>
                                <a href="javascript:" data-itype="3">产品列表</a>
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

<script>
    var spid = "<%=special_id%>";
    $(".diybtns a").click(function(){
        $.ajax({
            type : "GET",
            url : "/index.php?g=Admin&m=Mbspecial&a=special_item_add?special_id = "+spid +"&item_type= "+$(this).attr("data-itype"),
            dataType : "json",
            data : {},
            timeout : 5000,
            success:function(data,status){

            },
            error: function (XHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            }
        });
    });


    $(".diypanelout .btn_del_item").click(function(){
        $.ajax({
            type : "GET",
            url : "/index.php?g=Admin&m=Mbspecial&a=special_item_del?special_id = "+spid +"&item_type= "+$(this).closest(".cell").attr("data-itemid"),
            dataType : "json",
            data : {},
            timeout : 5000,
            success:function(data,status){

            },
            error: function (XHR, textStatus, errorThrown) {
                console.log(textStatus + "\n" + errorThrown);
            }
        });
    });


</script>

</body>
</html>