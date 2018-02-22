<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>

<Admintemplate file="Common/Head" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>
<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">内容</div>
        <form action="{:U('Property/add')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                        <tr>
                            <th width="147">类目CID：</th>
                            <td>
                                       <div id="category" style="display:inline-block;">
            <select id="parentItems" name="cid" onchange="getchildlist(this)">
                <option value='0'>--请选择--</option>
                <volist name="category" id="ca">
                    <option value="{$key}">{$ca}</option>
                </volist>
            </select>
            <div id="childItems" style="display:inline-block;" ></div>
        </div>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">名称：</th>
                            <td>
                                <input type="text" class="input" name="name" id="name" size="20" value={$vo.name}></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">颜色属性：</th>
                            <td>
                                <input name="is_color_prop" type="radio" value="1" <if condition="$vo['is_color_prop'] eq '1' "> checked</if>  />是 <label class="type"><input name="is_color_prop" type="radio" value="0"  <if condition=" $vo['is_color_prop'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        <tr>
                            <th width="147">枚举属性：</th>
                            <td>
                                <input name="is_enum_prop" type="radio" value="1" <if condition="$vo['is_enum_prop'] eq '1' "> checked</if>  />是 <label class="type"><input name="is_enum_prop" type="radio" value="0"  <if condition=" $vo['is_enum_prop'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        <tr>
                            <th width="147">可否自定义：</th>
                            <td>
                                <input name="is_input_prop" type="radio" value="1" <if condition="$vo['is_input_prop'] eq '1' "> checked</if>  />是 <label class="type"><input name="is_input_prop" type="radio" value="0"  <if condition=" $vo['is_input_prop'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        <tr>
                            <th width="147">商品属性：</th>
                            <td>
                                <input name="is_item_prop" type="radio" value="1" <if condition="$vo['is_item_prop'] eq '1' "> checked</if>  />是 <label class="type"><input name="is_item_prop" type="radio" value="0"  <if condition=" $vo['is_item_prop'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        <tr>
                            <th width="147">关键属性：</th>
                            <td>
                                <input name="is_key_prop" type="radio" value="1" <if condition="$vo['is_key_prop'] eq '1' "> checked</if>  />是 <label class="type"><input name="is_key_prop" type="radio" value="0"  <if condition=" $vo['is_key_prop'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        <tr>
                            <th width="147">销售属性：</th>
                            <td>
                                <input name="is_sale_prop" type="radio" value="1" <if condition="$vo['is_sale_prop'] eq '1' "> checked</if>  />是 <label class="type"><input name="is_sale_prop" type="radio" value="0"  <if condition=" $vo['is_sale_prop'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否多值：</th>
                            <td>
                                <input name="multi" type="radio" value="1" <if condition="$vo['multi'] eq '1' "> checked</if>  />是 <label class="type"><input name="multi" type="radio" value="0"  <if condition=" $vo['multi'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否必须：</th>
                            <td>
                                <input name="must" type="radio" value="1" <if condition="$vo['must'] eq '1' "> checked</if>  />是 <label class="type"><input name="must" type="radio" value="0"  <if condition=" $vo['must'] eq '0' "> checked</if> />否
                            </td>
                        </tr>
                        
                        <tr>
                            <th width="147">状态：</th>
                            <td>
                                <!--<input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>-->
                                 <select name="status">
                                      <volist name="status" id='va'>
                                        <option value="{$key}">{$va}</option>
                                      </volist>
                                  </select>
                            </td>
                        </tr>
                            
                </table>
            </div>
            
                <div class="h_a">属性</div>
                <div class="table_full">
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                         <thead>
                            <tr>
                            <td width="70" >属性值</td>
                            <td width="70">属性值别名</td>
                            <td width="50">状态</td>
                            <td width="50">操作</td>
                            </tr>
                        </thead>
                        <tbody id ="vaItems"></tbody>
                    </table>
                                    <a class="btn" onclick="newItem()">新增</a>
                </div>
            <div class="">
                <div class="btn_wrap_pd">
                      <?php echo '<a class="btn" href="'.U('Admin/Property/index').'">取消</a>'; ?>     
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script>
    function newItem()
    {
        //获取子元素个数
        var index = $('#vaItems').children().length;
        $("#vaItems").append('<tr><td><input type="text" class="input" name="value['+index+'][name]" id="va.name" size="20" value=""></td><td><input type="text" class="input" name="value['+index+'][name_alias]" id="va.name_alias" size="20" value=""></td> <td><select name="value['+index+'][status]"><option value="normal">正常</option><option value="disabled">不可用</option></select></td><td><button type="button" id="del'+index+'" onclick=delthis(this)>删除</button></td></tr>');
    }
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
        var html = childItems(data,obj.value);
        $("#"+obj.id).next().html(html);
    }
    function childItems(data,pid) {
        var jsonObj = jQuery.parseJSON(data);
        var optionstring = "";
        for (var item in jsonObj) {
            if(item != "state"){
                optionstring += "<option value=\"" + item + "\" >" + jsonObj[item] + "</option>";
            }
        }
        if(optionstring.length >0 ){
            optionstring = "<select id=" + pid +"  name ='cid' onchange='getchildlist(this)'> "+"<option value='0'>--请选择--</option>"+ optionstring;
            optionstring += "</select><div style='display:inline-block;'></div>";
        }
        else{
        }
        return optionstring;
    }
    function delthis(obj){
        $("#"+obj.id).parent().parent().remove();
    }
</script>
</html>