<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">内容</div>
        <form action="{:U('Property/edit')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                   
                        <tr>
                            <th width="147">ID：</th>
                            <td>
                                <input type="text" class="input" name="id" id="id" size="20" value={$vo.id} readonly="readonly"></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">类目CID：</th>
                            <td>
                                <input type="text" class="input" name="cid" id="cid" size="20" value={$vo.cid}></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">属性ID：</th>
                            <td>
                                <input type="text" class="input" name="pid" id="pid" size="20" value={$vo.pid}></input>
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
                                      <volist name="status" id='vs'>
                                        <option value="{$key}" <if condition="$key == $vo['status']">selected</if>>{$vs}</option>
                                      </volist>
                                  </select>
                            </td>
                        </tr>
                            
                </table>
            </div>
            
                <div class="h_a">属性值</div>
                <div class="table_full">
                    <a class="btn" onclick="newItem()">新增</a>
                    <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                         <thead>
                            <tr>
                            <td width="50" >属性值ID</td>
                            <td width="70" >属性值</td>
                            <td width="70">属性值别名</td>
                            <td width="50">状态</td>
                            <td width="50">操作</td>
                            </tr>
                        </thead>
                        <tbody  id ="vaItems">
                            <volist  name="values" id="va">
                                <tr>
                                    <td><input type="text" class="input" name="value[{$va.vid}][vid]" id="va.vid" size="20" value={$va.vid}></td>
                                    <td><input type="text" class="input" name="value[{$va.vid}][name]" id="va.name" size="20" value={$va.name}></td>
                                    <td><input type="text" class="input" name="value[{$va.vid}][name_alias]" id="va.name_alias" size="20" value={$va.name_alias}></td>
                                    <td>
                                        <!--<input type="text" class="input" name="value[{$va.vid}][status]" id="va.status" size="20" value={$va.status}>-->
                                         <select name="value[{$va.vid}][status]">
                                              <volist name="status" id='v'>
                                                <option value="{$key}" <if condition="$key == $va['status']">selected</if>>{$v}</option>
                                              </volist>
                                        </select>
                                    </td>
                                     <td><?php echo  '<a  class="J_ajax_del" href="'.U('Property/deletevalue',array('vid'=>$va['vid'],'cid' => $va['cid'],'pid' => $va['pid'])).'">删除</a>';?>
			                  </td>
                                </tr>
                            </volist>
                            </tbody>
                    </table>
                </div>
            <div class="">
                <div class="btn_wrap_pd">
                      <?php echo '<a class="btn" href="'.U('Admin/Property/show',array("pid" => $vo['cid'])).'">返回</a>'; ?>     
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
        $("#vaItems").prepend('<tr><td><input type="text" class="input" name="value['+index+'][vid]" id="va.vid" size="20" readonly value="勿填"></input></td><td><input type="text" class="input" name="value['+index+'][name]" id="va.name" size="20"></td><td><input type="text" class="input" name="value['+index+'][name_alias]" id="va.name_alias" size="20"></td> <td><select name="value['+index+'][status]"><option value="normal">正常</option><option value="disabled">不可用</option></select></td><td><button type="button" id="del'+index+'" onclick=delthis(this)>删除</button></td></tr>');
    }
        function delthis(obj){
        $("#"+obj.id).parent().parent().remove();
    }
</script>
</html>