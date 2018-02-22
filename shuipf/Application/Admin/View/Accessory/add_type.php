<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/22/16
 * Time: 11:36
 */
if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">添加辅材类型</div>
    <form name="myform" action="{:U('add_type')}" method="post" class="J_ajaxForm">
        <div class="table_full">
            <table width="100%" class="table_form">
                <tr>
                    <th width=100>类型</th>
                    <td><select name="category">
                            <volist name="category_list" id="voc">
                                <option value="{$voc.category_name}">{$voc.category_name}</option>
                            </volist>
                        </select></td>
                </tr>
                <tr>
                    <th width=100>辅材类型名</th>
                    <td><input type="text" name="name" value="" class="input"/></td>
                </tr>
                <tr>
                    <th width=100>品牌</th>
                    <td class="selected_tag brand_tag"><input type="text" name="brand" value="" class="input brand_input"/></td>
                </tr>
                <tr>
                    <th width=100>规格</th>
                    <td class="selected_tag norm_tag"><input type="text" name="norm" value="" class="input norm_input"/> </td>
                </tr>

            </table>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn btn_submit mr10" type="submit">添加</button>
            </div>
        </div>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
<script>
    (function(){
        $('.brand_input').bind('keypress', function(){
            if(event.keyCode == "13" && $('.brand_input').val() != "") {
                $('.brand_tag').append("<div><label>"
                    + $('.brand_input').val()
                    + "</label><input hidden name='brand[]' value="
                    + $('.brand_input').val()
                    + "></input><b>X</b></div>");
                $('.brand_input').val("");
                return false;
            }
        });
        $('.norm_input').bind('keypress', function(){
            if(event.keyCode == "13" && $('.norm_input').val() != "") {
                $('.norm_tag').append("<div><label>"
                    + $('.norm_input').val()
                    + "</label><input hidden name='norm[]' value="
                    + $('.norm_input').val()
                    + "></input><b>X</b></div>");
                $('.norm_input').val("");
                return false;
            }
        });
        $('.selected_tag div').find('b').live('click',function(){$(this).parent().remove()});
    })();
</script>
<style>
    .selected_tag input{float:left; margin-right:5px;}
    .selected_tag div{border:1px solid #ccc;float:left;padding:5px;margin-right: 5px;}
    .selected_tag b{color:red;margin-left:5px;cursor:pointer;}
</style>
</html>