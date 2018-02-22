<!--create by f-->
<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap J_check_wrap">
    <div class="table_full">
        <div class="h_a">详细信息</div>
        <table width="100%" class="table_form">
            <tr>
                <th>宝贝标题</th>
                <td>{$info.title}</td>
            </tr>
             <tr>
                <th>店铺名称</th>
                <td>{$info['shopname']}</td>
            </tr>
            <tr>
                <th>宝贝类目</th>
                <td>{$info.cname}</td>
            </tr>
            <tr>
                <th>宝贝卖点</th>
                <td>{$info.sell_points}</td>
            </tr>
            <tr>
                <th>宝贝属性</th>
               <!--<p>关键属性：</p>-->
               <td>
                   
           <volist name="property" id ="vo">
          <if condition="$vo.is_key_prop == '1'">
            {$vo.name}：
          <volist name="vo['value']" id='va'>
            <if condition="$info['key_prop'][$vo['pid']] == $va['vid']">{$va.name}<br/></if>
          </volist>
          </if>
          </volist>
        <!--<p>非关键属性：</p>-->
          <!--非关键属性和非销售属性-->
          <volist name="property" id ="vo">
          <if condition="$vo['is_key_prop'] != '1' and $vo['is_sale_prop'] !='1'">
  {$vo.name}：
            <!--枚举属性-->
            <if condition="$vo['is_enum_prop'] == '1'">
            
              <volist name="vo['value']" id='va'>
              <if condition="$info['nokey_prop'][$vo['pid']] == $va['vid']">{$va.name}<br/></if>
              </volist>
         
            <else/>
            {$info['nokey_prop'][$vo['pid']]}<br/>
            </if>
          </if>
        </volist>
                </td>
            <tr>
                <th>宝贝规格</th>
                <td></td>
            </tr>
            <tr>
                <th>商家编码</th>
                <td>{$info.shopcode}</td>
            </tr>
            <tr>
                <th>宝贝数量</th>
                <td>{$info.number}</td>
            </tr>
            <tr>
                <th>发布时间</th>
                <td>{$info.addtime|date='Y-m-d H:i:s',###}</td>
            </tr>
            <tr>
                <th>当前状态</th>
                <td>
                    {$auditStatus[$info[auditstatus]]}
                </td>
            </tr>
            <tr>
                <th>计价单位</th>
                <td>{$info.charge_unit}</td>
            </tr>
            <tr>
                <th>付款模式</th>
                <td>{$info['pay_mode']}</td>
            </tr>
            <tr>
                <th>计价单位</th>
                <td><eq name="$info['purchase_addr']" value='1'>国内<else/>海外</eq></td>
            </tr>
            <tr>
                <th>宝贝展示</th>
                <td>{$info.show}</td>
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
                    <td width="100">{$auditStatus[$vo[status]]}</td>
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
        <form method="post" class="J_ajaxForm" action="{:U('materialaudit')}">
            <table>
                <tbody>
                <tr>
                    <th>审核状态</th>
                    <td>
                        <select name="auditstatus"  id="statusselect" onchange='ifreason()'>
                            <option value="10"  selected>通过</option>
                            <option value="-10" <eq name="info['auditstatus']" value="-1">hidden</eq>>违规</option>
                            <option value="-5">下架</option>
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
                    <input type="hidden" name="type" value="{$Think.get.type}">
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