<!--create by f-->
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <div class="table_full">
        <div class="h_a">详细信息</div>
        <table width="100%" class="table_form">
            <tr>
                <th width="80">宝贝编号</th>
                <td>{$info['attr_code']}</td>
            </tr>
            <tr>
                <th>宝贝类目</th>
                <td><if condition="$info.designtype =='0'">家装设计<else/>软装设计</if></td>
            </tr>
            <tr>
                <th>店铺名称</th>
                <td>{$info['shopname']}</td>
            </tr>
            <tr>
                <th>发布时间</th>
                <td>{$info.addtime|date='Y-m-d H:i:s',###}</td>
            </tr>
            <tr>
                <th>宝贝状态</th>
                <td>
                    <eq name="info.auditstatus" value="0">待审核</eq>
                    <eq name="info.auditstatus" value="-1">违规</eq>
                    <eq name="info.auditstatus" value="2">待处理</eq>
                    <eq name="info.auditstatus" value="10">下架</eq>
                    <eq name="info.auditstatus" value="1">通过</eq>
                </td>
            </tr>
            <tr>
                <th>宝贝标题</th>
                <td>{$info['title']}</td>
            </tr>
            <tr>
                <th>设计理念</th>
                <td>{$info['idea']}</td>
            </tr>
            <tr>
                <th>宝贝属性</th>
                <td>
                    <table>
                        <tbody>
                        <tr>
                            <td>设计风格：</td>
                            <td>{$info['attr_style']}</td>
                        </tr>
                        <tr>
                            <td>案例面积：</td>
                            <td>{$info['attr_area']}</td>
                        </tr>
                        <tr>
                            <td>案例户型：</td>
                            <td>{$info['attr_huxing']}</td>
                        </tr>
                        <tr>
                            <td>局部设计：</td>
                            <td>{$info['attr_jubu']}</td>
                        </tr>
                        <tr>
                            <td>独立空间：</td>
                            <td>{$info['attr_kongjian']}</td>
                        </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
            <tr>
                <th>价格</th>
                <td>{$info['charge_unit']}</td>
            </tr>
            <tr>
                <th>付款模式</th>
                <td>{$info['pay_mode']}</td>
            </tr>
            <tr>
                <th>设计师资历</th>
                <td>{$info['designer_qualification']}</td>
            </tr>
            <tr>
                <th>专属设计师</th>
                <td>{$info['designer_name']}</td>
            </tr>
            <tr>
                <th>宝贝类型</th>
                <td>
                    <dd class="type">
                        <table>
                            <tr>
                                <td>规格</td>
                                <td>计价单位</td>
                                <td>价格</td>
                                <td>数量</td>
                            </tr>
                            <tr>
                                <td>
                                    独立空间效果图
                                </td>
                                <td>/套</td>
                                <td><eq name="info['type']['独立空间效果图'][0]" value="on">{$info['type']['独立空间效果图'][1]}<else/></eq></td>
                                <td><eq name="info['type']['独立空间效果图'][0]" value="on">{$info['type']['独立空间效果图'][2]}<else/></eq></td>
                            </tr>
                            <tr>
                                <td>
                                    全屋效果图
                                </td>
                                <td>/套</td>
                                <td><eq name="info['type']['全屋效果图'][0]" value="on">{$info['type']['全屋效果图'][1]}<else/></eq></td>
                                <td><eq name="info['type']['全屋效果图'][0]" value="on">{$info['type']['全屋效果图'][2]}<else/></eq></td>
                            </tr>
                            <tr>
                                <td>
                                    独立空间套图
                                </td>
                                <td>/㎡</td>
                                <td><eq name="info['type']['独立空间套图'][0]" value="on">{$info['type']['独立空间套图'][1]}<else/></eq></td>
                                <td><eq name="info['type']['独立空间套图'][0]" value="on">{$info['type']['独立空间套图'][2]}<else/></eq></td>
                            </tr>
                            <tr>
                                <td>
                                    全屋套图
                                </td>
                                <td>/套</td>
                                <td><eq name="info['type']['全屋套图'][0]" value="on">{$info['type']['全屋套图'][1]}<else/></eq></td>
                                <td><eq name="info['type']['全屋套图'][0]" value="on">{$info['type']['全屋套图'][2]}<else/></eq></td>
                            </tr>
                        </table>
                    </dd>
                </td>
            </tr>
            <tr>
                <th>增值服务</th>
                <td>
                    <?php
                    $i=0;
                    $addedNew=array();
                    $added=unserialize($info['service_added']);
                    foreach ($added as $k=>$v){
                        if(strlen($added[$k])>2){
                            $addedNew[$i]=$added[$k];
                            $i++;
                        }
                    }
                    echo implode("、",$addedNew);
                    ?>
                </td>
            </tr>
            <tr>
                <th>出图类型</th>
                <td>
                    <dd>
                        <table>
                            <tr>
                                    <?php
                                    $i=0;
                                    $effectNew=array();
                                    $effect=unserialize($info['pictype_effect']);
                                    foreach ($effect as $k=>$v){
                                        if(strlen($effect[$k])>0){
                                            $effectNew[$i]=$effect[$k];
                                            $i++;
                                        }
                                    }
                                    if(count($effectNew)) echo" <td>效果图：";
                                    echo implode("、",$effectNew)." </td>";
                                    ?>
                            </tr>
                            <tr>
                                    <?php
                                    $i=0;
                                    $cadNew=array();
                                    $cad=unserialize($info['pictype_cad']);
                                    foreach ($cad as $k=>$v){
                                        if(strlen($cad[$k])>0){
                                            $cadNew[$i]=$cad[$k];
                                            $i++;
                                        }
                                    }
                                    if(count($cadNew)) echo"<td>CAD图：";
                                    echo implode("、",$cadNew)." </td>";
                                    ?>
                            </tr>
                        </table>
                    </dd>
                </td>
            </tr>
            <tr>
                <th>其他信息</th>
                <td>
                    <dl class="other">
                        <dt>会员打折：<eq name="info['is_member_discount']" value="0">不参与会员打折<else/>参与会员打折</eq></dt>
                        <dt>库存记数：<eq name="info['stock_type']" value="1">拍下减库存<else/>付款减库存</eq></dt>
                        <dt>有  效  期：7天</dt>
                        <dt>开始时间：{$info['starttime']}</dt>
                        <dt>橱窗推荐：<eq name="info['is_showcase']" value="0">否<else/>是</eq></dt>
                    </dl>
                </td>
            </tr>
            <tr>
                <th>宝贝图片</th>
                <td><img src="{$info['picture']}" onerror="this.src='{$config_siteurl}statics/images/member/nophoto.gif'" height="90" width="90"></td>
            </tr>
            <tr>
                <th>宝贝展示</th>
                <td><img src="{$info['headpic']}" onerror="this.src='{$config_siteurl}statics/images/member/nophoto.gif'" height="600" width="800"></td>
            </tr>
        </table>
        <div class="h_a">审核记录</div>
        <div class="table_full">
            <table>
                <tbody>
                <tr>
                    <th width="120">审核时间</th>
                    <th width="100">审核结果</th>
                    <th width="400">原因</th>
                    <th width="100">审核人</th>
                </tr>
                 <volist name="auditlogs" id="vo">
                <tr>
                    <td width="120">{$vo.addtime|date='Y-m-d H:i:s',###}</td>
                    <td width="100">
                        <eq name="vo.status" value="0">待审核</eq>
                        <eq name="vo.status" value="-1">违规</eq>
                        <eq name="vo.status" value="2">待处理</eq>
                        <eq name="vo.status" value="10">下架</eq>
                        <eq name="vo.status" value="1">通过</eq>
                    </td>
                    <td width="400"><volist name='vo.reason' id='reason' mod='2'>
                    <eq name="mod" value="0">{$reason}，</eq>
                    <eq name="mod" value="1">备注：{$reason}<br/></eq>
                    </volist></td>
                    <td width="100">{$vo.name}</td>
                </tr>
                </volist>
                </tbody>
            </table>
        </div>
        <div <neq name="info['status']" value="10">hidden</neq> >  
        <div class="h_a">审核操作</div>
        <form method="post" class="J_ajaxForm" action="{:U('audit')}">
            <table>
                <tbody>
                <tr>
                    <th>审核状态</th>
                    <td>
                        <select name="auditstatus"  id="statusselect" onchange='ifreason()'>
                            <option value="1"  selected>通过</option>
                            <option value="-1" <eq name="info['auditstatus']" value="2">hidden</eq>>违规</option>
                            <option value="10" <eq name="info['auditstatus']" value="0">hidden</eq>>下架</option>
                        </select>
                    </td>
                </tr>
                <!--<tr>-->
                <!--    <th>审核人</th>-->
                <!--    <td><input type="text" name="operator" value="" class="input"></td>-->
                <!--</tr>-->
                <tr class="reason">
                    <th width="80">选择原因</th>
                    <td>
                        <table class="reasonTable">
                            <tbody>
                            <tr class="reasonItem">
                                <td>
                                     <Form function="select" parameter="option('audit_reason'),'',class='' name='audit_reason[]'"/>
                                </td>
                                <td>
                                    备注：<input type="text" name="audit_reason[]" value="无">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a class="btn" onclick="newReason()">新增</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="">
                <div class="btn_wrap_pd">
                    <input type="hidden" name="id" value="{$info['id']}">
                    <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
<script>
    //新增原因按钮事件
    function newReason(){
        var html = '<tr class="reasonItem">' + $('.reasonItem:first').clone(true).html();
        html += '<td><button type="button" onclick=delthis(this)>删除</button></td><tr>';
        $('.reasonTable').append(html);
    }
    //删除原因按钮事件
    function delthis(obj){
        $(obj).parent().parent().remove();
    }
    //审核原因select
    function ifreason(){
        if($('#statusselect option:selected').val() == '1'){
            $('.reason').hide();
        }else{
            $('.reason').show();
        }
    }
    $(function(){
        ifreason();
     });
</script>
</html>