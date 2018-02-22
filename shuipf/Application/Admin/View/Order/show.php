<?php

if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
<div class="wrap jj">
    <Admintemplate file="Common/Nav"/>
    <div class="common-form">
        <div class="h_a">订单信息</div>
        <div class="table_list">
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <tbody>
                    <tr>
                        <td style="width:100px;">订单号:</td>
                        <td>{$order.order_sn}</td>
                        <td>下单时间:</td>
                        <td>{$order.addtime|date="Y-m-d H:i:s",###}</td>
                    </tr>
                    <tr>
                        <td>支付号:</td>
                        <td>{$order.pay_sn}</td>
                        <td>支付时间:</td>
                        <td>{$order.payment_time|date="Y-m-d H:i:s",###}</td>
                        <td>支付类型:</td>
                        <td>{$order.payment_code}</td>
                    </tr>
                    <tr>
                        <td>订单状态:</td>
                        <td>{$order.order_state}</td>
                    </tr>
                    <tr>
                        <td>退货状态:</td>
                        <td>{$refundState[$order[refund_state]]}</td>
                        <td>退货金额:</td>
                        <td>{$order[refund_amount]}</td>
                    </tr>
                    <tr>
                        <td>订单总额:</td>
                        <td>{$order.order_amount}元</td>
                    </tr>
                    <tr>
                        <td>运费:</td>
                        <td>{$order.shipping_fee}元</td>
                    </tr>
                    <tr>
                        <td>完成时间:</td>
                        <td>{$order.finished_time}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="h_a">收货人信息</div>
        <div class="table_list">
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <if condition="$order['extend_order_common']['reciver_type'] =='1'">
                <tbody>
                    <tr>
                        <td style="width:100px;">买家自提</td>
                    </tr>
                </tbody>
                <else/>
                <tbody>
                    <tr>
                        <td style="width:100px;">收货人姓名:</td>
                        <td>{$order.extend_order_common.reciver_info.name}</td>
                    </tr>
                    <tr>
                        <td>电话号码:</td>
                        <td>{$order.extend_order_common.reciver_info.phone}</td>
                    </tr>
                    <tr>
                        <td>详细地址:</td>
                        <td>{$order.extend_order_common.reciver_info.zone} &nbsp;{$order.extend_order_common.reciver_info.address}</td>
                    </tr>
                    <tr>
                        <td>运费:</td>
                        <td></td>
                    </tr>
                </tbody>
                </if>   
            </table>
        </div>
        <div class="h_a">商品信息</div>
        <div class="table_list">
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <tbody>
                    <volist name="order['extend_order_goods']" id="vo">
                        <ul>
                            <li><a href="{:U('Shop/Product/show',array('id'=>$vo['goods_id']))}" target="_blank"><img src="{$vo.goods_image}" style="width:50px;"></a></li>
                            <li>
                                <p>{$vo.goods_name}</p>

                                <volist name="vo[provalue]" id="provalue">
                                  <?php if($key=='price'||$key=='price_act') break; ?>
                                  <p>{$key}：{$provalue['txt']}</p>
                                </volist>
                            </li>
                            <li>金额：{$vo.goods_price}元</li>
                            <li>数量：{$vo.goods_num}</li>
                        </ul>
                        <hr/>
                    </volist>
                    
                </tbody>
            </table>
        </div>
        <if condition="$order['refund_state'] neq '0'">
        <div class="h_a">退货信息</div>
        <div class="table_list">
            <table>
                <tbody>
                    <tr>
                        <td>退货申请时间:</td>
                        <td>{$order.extend_order_refund.addtime|date="Y-m-d H:i:s",###}</td>
                    </tr>
                    <tr>
                        <td>是否收货:</td>
                        <td>{$order[extend_order_refund][received]?'已收到':'未收到'}</td>
                    </tr>
                    <tr>
                        <td>退货原因:</td>
                        <td>{$order.extend_order_refund.reason}</td>
                    </tr>
                    <tr>
                        <td>退货说明:</td>
                        <td>{$order.extend_order_refund.explain}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </if>

    </div>
</div>
<script src="{$config_siteurl}statics/js/common.js"></script>

</body>
</html>