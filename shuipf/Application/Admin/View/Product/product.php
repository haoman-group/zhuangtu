<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <Admintemplate file="Common/Nav"/>
    <div class="h_a" style="color: red">待审核宝贝：<?php $num = 0;foreach($data as $da){if($da['auditstatus'] == '0') { $num += 1; } } echo $num; ?> ---------- 
                                        待处理宝贝: <?php $num = 0;foreach($data as $da){if($da['auditstatus'] == '-1') { $num += 1; } } echo $num; ?>  </div>
    <div class="h_a">搜索</div>
    <form id="searchform"  method="get" >
        <input type="hidden" value="Admin" name="g">
        <input type="hidden" value="Product" name="m">
        <input type="hidden" value="product" name="a">
        <input type="hidden" value="1" name="search">
        <input type="hidden" value="{$Think.get.type}" name="type">
        <div class="search_type cc mb10">
            <div class="mb10">
                <span class="mr20">
                         <table>
                             <tr>
                                 <td>
                                     <span style="margin-left:12px;">宝贝ID：</span>
                                     <input name="prodid" type="text" class="input" style="width:260px;" value="{$Think.get.prodid}">
                                 </td>
                                 <td>
                                     <span style="margin-left: 30px;">宝贝标题：</span>
                                     <input name="title" type="text"  class="input"  style="width:200px;" value="{$Think.get.title}">
                                 </td>
                             </tr>
                             <!-- 第二行-->
                             <tr>
                                 <td>
                                     <span>发布时间：</span>
                                     <input type="text" name="start_time" class="input length_2 J_date"  style="width:120px;" value="{$Think.get.start_time}">
                                     -
                                     <input type="text" class="input length_2 J_date" name="end_time"  style="width:120px;" value="{$Think.get.end_time}">
                                 </td>
                                 <td>
                                     <span style="margin-left: 30px;">审核状态：</span>
                                     <select name="audit_status" style="width:200px;">
                                          <option value="">--全部--</option>
                                          <volist name='auditStatus' id='st' >
                                            <option value='{$key}' <if condition="'' !==$_GET['audit_status'] and null !== $Think.get.audit_status and $Think.get.audit_status == $key">selected</if>>{$st}</option>
                                          </volist>
                                     </select>
                                 </td>
                             </tr>
                             <!-- 第三行-->
                             <tr>
                                 <td>
                                     <span>店铺名称：</span>
                                     <input name="shop" type="text"  style="width:260px" class="input" value="{$Think.get.shop}">
                                 </td>

                                 <td>
                                     <span style="margin-left: 30px;">宝贝类目：</span>
                                     <!--<input name="crafttype" type="text"  class="input" style="width:300px;" value="{$Think.get.crafttype}">-->
                                     <select name="type" onchange="getCategory(this)">
                                            <option value="">--请选择--</option>
                                         <volist name="category" id="vo">
                                             <option value="{$key}" <if condition ="$Think.get.type == $key">selected</if>>{$vo.name}</option>
                                         </volist>
                                     </select>
                                     <select name="proptype" id="cateItem">
                                         <option value="">--请选择--</option>
                                     </select>
                                 </td>
                                 <td>
                                     <span style="margin-left: 30px;">宝贝状态：</span>
                                     <select name="status" style="width:200px;">
                                       <option value="">--全部--</option>
                                          <volist name='proStatus' id='at' >
                                            <option value='{$key}' <if condition=" null !== $Think.get.status and $Think.get.status == $key">selected</if>>{$at}</option>
                                          </volist>
                                     </select>
                                 </td>
                                 <td>
                                     <!--<input type="reset" class='reset' value="清除条件" style="margin-left: 30px;"/>-->
                                     <a href="{:U('product')}">清除条件</a>
                                     <input type='submit' class='sear' value="搜 索"/>
                                 </td>
                             </tr>

                         </table>

                </span>
            </div>
        </div>


    </form>
    <form name="myform" action="{:U('Member/delete')}" method="post" class="J_ajaxForm">
        <div class="table_list">
            <table width="100%" cellspacing="0">
                <thead>
                <tr>
                    <td  align="left"><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">ID</td>
                    <td align="left"></td>
                    <td align="left">宝贝标题</td>
                    <td align="left">宝贝类目</td>
                    <td align="left">店铺名称</td>
                    <td align="left">发布时间</td>
                    <td align="left">宝贝状态</td>
                    <td align="left">审核状态</td>
                    <td align="left">操作</td>
                </tr>
                </thead>
                <tbody>
                <volist name="data" id="vo">
                    <tr>
<!--                        <a href="javascript:product_infomation({$vo.id}, '', '')">-->
                        <td align="left"><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" value="{$vo.id}" name="id[]">{$vo.id}</td>
                        <td align="left">                </td>
                        <td align="left">{$vo.title}
                        <td align="left">{$vo.typeName}</td>
                        <td align="left"><font color="#0099ff">{$vo.shopname}</font></td>
                        <td align="left">{$vo.addtime|date='Y-m-d H:i:s',###}</td>
                        <td align="left">
                            {$proStatus[$vo[status]]}
                        </td>
                        <td align="left">
                            <if condition='$vo.status == "10"'>{$auditStatus[$vo[auditstatus]]}<else/>--</if>
                        </td>
                        <td align="left">
                            <a href="{:U('productinfo', array('pid'=>$vo['id']))}"><if condition='$vo.status == "10"'>审核<else/>查看详情</if></a>
                            <a class="changeRank" data-prod-id="{$vo.id}" style="cursor:pointer">排名</a>
                        </td>
                    </tr>
                </volist>
                </tbody>
            </table>
            <div class="p10">
                <div class="pages"> {$Page} </div>
            </div>
        </div>
        <div class="">
            <div class="btn_wrap_pd">
                <button class="btn  mr10 J_ajax_submit_btn" data-action="{:U('Admin/Product/materialdelete')}" type="submit">删除</button>
            </div>
        </div>
    </form>
</div>
<script src="{$config_siteurl}statics/js/common.js?v"></script>
<script src="{$config_siteurl}statics/js/content_addtop.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
<script>
    //会员信息查看
    function product_infomation(id, modelid, name) {
        omnipotent("product_infomation", GV.DIMAUB+'index.php?g=Admin&m=Product&a=info&pid='+id+'','宝贝详情',1,700,740)
    }
    $(function(){
        	/*绑定"清除条件"的事件*/
	    $("#searchform .reset").click(function(){
		$('#searchform :text').each(function(){$(this).attr('value','')});
	});
    });


    var getCategory = function(obj) {
        var proptype = obj.value;
        var cate = <empty name ="category">""<else/>{:json_encode($category)}</empty>;
        var cateHtml = "<option value='0' > --请选择-- </option>";
        for (var cateItem in cate[proptype]['category']) {
            cateHtml += "<option value=\"" + cateItem + "\">" + cate[proptype]['category'][cateItem] + "</option>";
        }
        $('#cateItem').html(cateHtml);
    };

    $(".changeRank").click(function(){
        var prod_id = $(this).attr("data-prod-id");
        layer.open({
            type: 2 ,
            title: false,
            closeBtn: 0,
            scrollbar: false,
            area:['480px', '360px'],
            shadeClose: true,
            content: "{:U('changerank')}" + "&prodid=" + prod_id ,
        });
        return false;
    });

</script>
</body>
</html>