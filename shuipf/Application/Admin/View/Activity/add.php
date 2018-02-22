<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a">添加推荐位</div>
    <form name="myform" action="{:U('add')}" method="post" class="J_ajaxForm">
        <div class="table_full">
            <table width="100%" class="table_form">

                <tr>
                    <th width=100>活动标题</th>
                    <td><input type="text" name="activetitle" value="" class="input"/></td>
                </tr>
                <tr>
                    <th width=100>活动描述</th>
                    <td><input type="text" name="activedescript" value="" class="input"/></td>
                </tr>



               <tr>
                    <th>状态</th>
                    <td>
                        <select name="status">
                            <volist name="status" id="vo">
                                <option value="{$key}">{$vo}</option>
                            </volist>
                        </select>
                    </td>
                </tr>
                <tr>
                  <th>选择套餐</th>
                    <td>
                      <select name="package">
                         <volist name="types" id="vo">
                            <option value="{$key}">{$vo}</option>
                         </volist>
                      </select>
                    </td>
                </tr>
                <!--<tr>
                    <th>排序</th>
                    <td><input type="text" name="listorder" id="listorder" class="input" size="5" value="0"/></td>
                </tr>-->
                <tr>
                    <th>最大保存条数</th>
                    <td><input type="text" name="maxnum" id="maxnum" class="input" size="5" value="1"/> <span>条</span></td>
                </tr>



            </table>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">添加</button>
            </div>
        </div>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>
</body>
</html>