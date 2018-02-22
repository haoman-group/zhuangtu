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
                    <th width="147">图片：</th>
                    <td>
                        <ul class="ulups">
                            <li>
                                <strong><img src="{$config_siteurl}statics/images/admin/content/nopic.gif"> </strong>
                                <cite>
                                    <div class="li">
                                        <Form function="images" parameter="picture,picture,'',content"/>
                                    </div>
                                    <div class="li">
                                        <input type="text" name="title" class="input" placeholder="标题">
                                        <input type="text" name="url" class="input" placeholder="链接">
                                        <input type="button" class="btnadd btn btnop" value="新增" >
                                        <input type="button" class="btndel btn btnop" value="删除">
                                    </div>
                                </cite>
                            </li>



                        </ul>
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

<script>
    $(function(){
        $(".ulups").on("click",".btnadd",function(){
            var $obj = $(this).closest("li");
            var $objc = $obj.clone();
            $objc.find(".input").val("");
            $objc.find("img").attr("src","{$config_siteurl}statics/images/admin/content/nopic.gif");
            $obj.after($objc);
        })
        $(".ulups").on("click",".btndel",function(){
            if(confirm("是否删除?")){
                $(this).closest("li").remove();
            }
        })
    })
</script>
</body>
</html>