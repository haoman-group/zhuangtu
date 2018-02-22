<?php if (!defined( 'SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head" />

<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav" />
        <div class="h_a">内容</div>
        <form action="{:U('Productcategory/edit')}" method="post">
            <div class="table_full">
                <table cellpadding="2" cellspacing="1" class="table_form" width="100%">
                    <volist name="data" id="vo">
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
                            <th width="147">父类目CID：</th>
                            <td>
                                <input type="text" class="input" name="parent_cid" id="parent_cid" size="20" value={$vo.parent_cid}></input>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">名称：</th>
                            <td>
                                <input type="text" class="input" name="name" id="name" size="20" value={$vo.name}></input>
                            </td>
                        </tr>

                        <tr>
                            <th width="147">状态：</th>
                            <td>
                                <input type="text" class="input" name="status" id="status" size="20" value={$vo.status}>
                            </td>
                        </tr>
                        <tr>
                            <th width="147">是否有子菜单：</th>
                            <td>
                                <!--<input type="text" class="input" name="is_parent" id="is_parent" size="20" value={$vo.is_parent}>-->
                                <select name="is_parent">
                                        <option value="0" <if condition=" $vo['is_parent'] eq '0' "> selected</if> >否</option>
                                        <option value="1" <if condition=" $vo['is_parent'] eq '1' "> selected</if> >是</option>
                                </select>
                            </td>
                        </tr>
                    </volist>
                </table>
            </div>
            <div class="">
                <div class="btn_wrap_pd">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                </div>
            </div>
        </form>
    </div>
    <div class="h_a">属性</div>
</body>

</html>