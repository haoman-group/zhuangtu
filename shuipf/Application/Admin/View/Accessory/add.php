<?php
/**
 * Created by PhpStorm.
 * User: yfzhang
 * Date: 3/23/16
 * Time: 14:23
 */
if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">添加辅材类型</div>
    <form name="myform" action="{:U('add')}" method="post" class="J_ajaxForm">
        <div class="table_full">
            <table width="100%" class="table_form">
                <tr>
                    <th width=100>类型</th>
                    <td><select id="category" name="category" onchange="getSubItems(this)">
                            <option value="0">--请选择类型--</option>
                            <volist name="category_list" id="voc">
                                <option value="{$voc.category}">{$voc.category}</option>
                            </volist>
                        </select>
                        <div id="accessory_type" style="display:inline-block;"></div></td>
                </tr>
                <tr>
                    <th width=100>辅材名称</th>
                    <td><input type="text" name="name" value="" class="input"/></td>
                </tr>
                <tr>
                    <th width=100>品牌</th>
                    <td><div id="brand"><select name="brand_id">
                            <option value="--">-----------</option>
                        </select></div></td>
                </tr>
                <tr>
                    <th width=100>规格</th>
                    <td><div id="norm"><select name="norm_id">
                            <option value="--">-----------</option>
                        </select></div></td>
                </tr>
                <tr>
                    <th width="100">单位</th>
                    <td> <input type="text" name="unit_name" value="" class="input"/></td>
                </tr>
                <tr>
                    <th width="100">单价</th>
                    <td> <input type="text" name="unit_price" value="" class="input"/></td>
                </tr>
                <tr>
                    <th width="100">图片</th>
                    <td>
                        <Form function="images" parameter="picture,picture,'',content"/>
                    </td>
                </tr>
                <tr>
                    <th width="100">备注</th>
                    <td> <input type="text" name="remark" value="" class="input"/></td>
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
    var getSubItems = function(obj) {
        var category_name = obj.value;
        if(category_name == "0") return;
        $.ajax({
            url: 'Admin//Accessory/getSubItems',
            data: {"category_name": category_name},
            success: function (data) {
                processChild(obj, data);
            },
            error: function () {
                alert("获取子菜单信息错误!");
            }
        });
    }
    var processChild = function(obj, data) {
        var jsonObj = jQuery.parseJSON(data);
        var subItemHtml = "";
        for (var item in jsonObj) {
            if(item != "state") {
                subItemHtml += "<option value=\"" + item + "\" >" + jsonObj[item] + "</option>";
            }
        }
        if (subItemHtml.length > 0) {
            subItemHtml = "<select id='" + obj.value + "' name = 'accessory_type' onchange='getBrandNorm(this)'> "
                        + "<option value='0'>--请选择子类型--</option>"
                        + subItemHtml
                        + "</select>";
        }
        $('#'+obj.id).next().html(subItemHtml);
    }

    var getBrandNorm = function(obj) {
        var type_id = obj.value;
        if(type_id == "0") return;
        $.ajax({
           url: 'Admin//Accessory/getBrandNorm',
           data: {"tid": type_id},
           success: function(data) { processBrandNorm(data);},
           error: function() { alert("获取品牌或者规格错误!");}
        });
    }
    var processBrandNorm = function(data) {
        var jsonObj = jQuery.parseJSON(data);
        var brandHtml = "";
        for (var bitem in jsonObj['brand']) {
            brandHtml += "<option value=\"" + bitem + "\">" + jsonObj['brand'][bitem] + "</option>";
        }
        if (brandHtml.length > 0) {
            brandHtml = "<select name='brand_id'>" + brandHtml + "</select>";
            $('#brand').html(brandHtml);
        }
        var normHtml = "";
        for (var nitem in jsonObj['norm']) {
            normHtml += "<option value=\"" + nitem + "\">" + jsonObj['norm'][nitem] + "</option>";
        }
        if (normHtml.length > 0) {
            normHtml = "<select name='norm_id'>" + normHtml + "</select>";
            $('#norm').html(normHtml);
        }
    }

</script>
</html>