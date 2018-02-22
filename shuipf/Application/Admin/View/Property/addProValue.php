<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">内容</div>
        <form action="{:U('Property/addProValue')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">类目CID：</th>
                            <td>
                                <div id="category" style="display:inline-block;">
                                    <select id="parentItems" name="cid[]" onchange="getchildlist(this)">
                                        <option value='0'>--请选择--</option>
                                        <volist name="category" id="ca">
                                            <option value="{$key}">{$ca}</option>
                                        </volist>
                                    </select>
                                    <div id="childItems" style="display:inline-block;"></div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                                <th width="147">已选分类：</th>
                                <td  class="selected_brand" ></td>
                            </tr>
                            <tr>
                                <th width="147">属性PID：</th>
                                <td>
                                    <input type="text" class="input" name="pid" id="name" size="20"></input>
                                </td>
                            </tr>
                            <tr>
                                <th width="147">属性值：</th>
                                <td>
                                    <input type="text" class="input" name="name" id="name" size="20"></input>
                                </td>
                            </tr>
                            <tr>
                                <th width="147">状态：</th>
                                <td>
                                    <select name="status"><option value="normal">正常</option><option value="disabled">不可用</option></select>
                                </td>
                            </tr>
                            </table>
                            </div>
                            <div class="">
                                <div class="btn_wrap_pd">
                                    <?php echo '<a class="btn" href="'.U( 'Admin/Property/index'). '">取消</a>'; ?>
                                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                                </div>
                            </div>
                            </form>
                            </div>
                            </body>
<script>
    function getchildlist(obj) {
        var val = obj.value;
        if(val=="0") return;
        $.ajax({url: "Admin//Property/index",
                data: {"cid": val},
                success: function(data) {process(obj,data);},
                error: function() {alert("获取子菜单信息错误!");}
        });
    }
    function process(obj,data){
        var html = childItems(data,obj);
        $("#"+obj.id).next().html(html);
    }
    function childItems(data,obj) {
        var jsonObj = jQuery.parseJSON(data);
        var optionstring = "";
        for (var item in jsonObj) {
            if(item != "state"){
                optionstring += "<option value=\"" + item + "\" >" + jsonObj[item] + "</option>";
            }
        }
        if(optionstring.length >0 ){
            optionstring = "<select id=" + obj.value +"  name ='cid' onchange='getchildlist(this)'> "+"<option value='0'>--请选择--</option>"+ optionstring;
            optionstring += "</select><div style='display:inline-block;'></div>";
        }
        else{
            $(".selected_brand").append("<div><label>"+$(obj).find("option:selected").text()+"</label><input hidden name='cid[]' value="+$(obj).val()+"></input><b>X</b></div>");
        }
        return optionstring;
    }
    function delthis(obj){
        $("#"+obj.id).parent().parent().remove();
    }
    (function(){
        var divs = $('.selected_brand div');
        var bs = divs.find('b');
        bs.live('click',function(){$(this).parent().remove()})
    })();
</script>
<style>
   .selected_brand div{border:1px solid #ccc;float:left;padding:5px;margin-right: 5px;} 
   .selected_brand b{color:red;margin-left:5px;cursor:pointer;}
</style>
</html>