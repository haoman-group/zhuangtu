<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />
<script src="{$config_siteurl}statics/js/jquery.js"></script>

<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div id="category" style="display:inline-block;">
            <label>商品类目:</label>
            <select id="parentItems" onchange="getchildlist(this)">
                <option value='0'>--请选择--</option>
                <volist name="category" id="vo">
                    <option value="{$key}">{$vo}</option>
                </volist>
            </select>
            <div id="childItems" style="display:inline-block;" ></div>
        </div>
        <br/>
        <div class="h_a">属性</div>
        
        <form name="myform" class="J_ajaxForm" >
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                    <tr>
                            <td width="50" width="70">ID</td>
                            <td width="50" width="70">CID</td>
                            <td align="center" width="70">属性ID</td>
                            <td align="center" width="50">名称</td>
                            <td align="center" width="50">颜色属性</td>
                            <td align="center" width="80">枚举属性</td>
                            <td align="center" width="80">可否自定义</td>
                            <td align="center" width="80">商品属性</td>
                            <td align="center" width="80">关键属性</td>
                            <td align="center" width="80">销售属性</td>
                            <td align="center" width="80">是否多值</td>
                            <td align="center" width="80">是否必须</td>
                            <td align="center" width="80">取值</td>
                            <td align="center" width="80">状态</td>
                            <td align="center" width="80">相关操作</td>
                    </tr>
                </thead>
                <tbody>
                    <volist name="data" id="vo">
                        <tr>
                            <td width="50">{$vo.id}</td>
                            <td align="center">{$vo.cid}</td>
                            <td align="center">{$vo.pid}</td>
                            <td align="center">{$vo.name}</td>
                            <td align="center">
                                <?php echo $vo[ 'is_color_prop']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <?php echo $vo[ 'is_enum_prop']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <?php echo $vo[ 'is_input_prop']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <?php echo $vo[ 'is_item_prop']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <?php echo $vo[ 'is_key_prop']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <?php echo $vo[ 'is_sale_prop']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <?php echo $vo[ 'multi']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <?php echo $vo[ 'must']=='1' ?是:否; ?>
                            </td>
                            <td align="center">
                                <select>
                                    <?php
                                    foreach($vo['values'] as $n){
                                        echo "<option>".$n."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td align="center">{$status[$vo[status]]}</td>
                            <td align="center">
                            <?php
			                    $op = array();
				                $op[] = '<a href="'.U('Property/edit',array('id'=>$vo['id'])).'">修改</a>';
				                	if(\Libs\System\RBAC::authenticate('delete')){
			            	    $op[] = '<a class="J_ajax_del" href="'.U('Property/delete',array('id'=>$vo['id'],'cid' => $vo['cid'],'pid' => $vo['pid'])).'">删除</a>';}
			                    echo implode(" | ",$op);
			                  ?>
                            </td>
                        </tr>
                    </volist>
                </tbody>
            </table>
        </div>
         </form>
        
        
</body>
<script>
    function getchildlist(obj) {
        var val = obj.value;
        if(val=="0") return;
        $.ajax({data: {"cid": val},
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
            optionstring = "<select id=" + pid +" onchange='getchildlist(this)'> "+"<option value='0'>--请选择--</option>"+ optionstring;
            optionstring += "</select><div style='display:inline-block;'></div>";
        }
        else{
            window.location.href ="/Admin/Property/index?pid="+pid;
        }
        return optionstring;
    }
</script>

</html>