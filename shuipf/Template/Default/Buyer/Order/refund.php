<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>买家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/product.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"> </script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>

<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
    <template file="Buyer/common/_title.php"/>
    <h2 class="refund_title">退款申请</h2>
    <div class="refund_wraplt">
        <h4 class="rf_title">订单信息</h4>
        <dl>
            <dt>订 单 号：</dt><dd>{$order.order_sn}</dd>
            <dt>成交时间：</dt><dd>{$order.payment_time|date="Y-m-d H:i:s",###}</dd>
            <dt>订单状态：</dt><dd>
             <switch name="order['order_state']">
                    <case value="20">已付款</case>
                    <case value="30">服务中</case>
                </switch>
            </dd>
        </dl>
        <a href="/s/{$order.extend_shop.domain}" target="_blank"><i>{$order.extend_shop.name}</i><img src="/statics/zt/images/buyercenter/chat.png" alt="联系卖家"></a>
    </div>
    <div class="wraprt refund_wraprt">
        <h6 class="rfr_title">申请退款的宝贝</h6>
        <table>
            <tr>
                <th>宝贝</th>
                <th>数量</th>
                <th>单价</th>
                <th>总价</th>
            </tr>
            <volist name="order['extend_order_goods']" id="vo">
            <tr>
                <td>
                    <dl>
                        <dt>
                          <a href="###">
                            <img src="{$vo.goods_image}">
                          </a>
                        </dt>
                        <dd>
                          <a href="###" target="_blank">{$vo.goods_name}</a>
                        </dd>
                        <!-- <dd>计价方式：<strong>普通家装</strong></dd> -->
                         <volist name="vo[provalue]" id="provalue">
                        <?php if($key=='price'|| $key=='price_act') break; ?>
                        <dd>{$key}：<strong>{$provalue['txt']}</strong></dd>
                    </volist>
                    </dl>
                </td>
                <td>{$vo.goods_num}</td>
                <td><?=$vo['goods_pay_price']/$vo['goods_num']?></td>
                <td>{$vo.goods_pay_price}</td>
            </tr>
        </volist>
        </table>
        <if condition="$order['refund_state'] eq 0">
        <div class="rfr_box">
            <h6 class="rfr_title">填写退款协议</h6>
            <form class="refund_agreement" action="/Buyer/Order/refund" method="POST">
                <input value="{$order.order_id}" name="order_id" hidden>
                <input value="{$Think.get.pay_sn}" name="pay_sn" hidden>
                <input value="{$Think.get.order_sn}" name="order_sn" hidden>
                <dl>
                    <dt>是否收到货物：</dt>
                    <dd>
                      <input type="radio" name="received" id="yes" checked value="1"><label for="yes">已经收到货</label>
                      <input type="radio" name="received" id="no" value="0"><label for="no">没有收到货</label>
                    </dd>
                    <dt>退款原因：</dt>
                    <dd>
                      <Form function="select" parameter="option('refund_reason'),$data['activity'],class='' name='reason',"/>
                    </dd>
                    <dt>退款说明：</dt>
                    <dd>
                        <textarea name="explain" id="" cols="30" rows="10" placeholder="200字以内，请具体的说明要求卖家退款的请款，如：存在质量问题等"></textarea>
                    </dd>
                </dl>
                <input type="submit" value="确认申请退款">
            </form>
        </div>
        <elseif condition="$order['refund_state'] eq 1"/>
        <div class="tips" >
            <h6>退款说明</h6>
            <p><span>是否收到货物:</span>{$order[extend_order_refund][received]?'已经收到货':'没有收到货物'}</p>
            <p><span>退款原因:</span>{$order[extend_order_refund][reason]}</p>
            <p><span>退款说明:</span>{$order[extend_order_refund][explain]}</p>
            <div class="confrim">
            <h6 class="rfr_title">填写退款协议完成</h6>
            <p class="seller_info">请耐心等待卖家的确认！或者与商家直接联系，卖家联系电话：{$order.extend_shop.phone}！或装途网全国统一客服热线400-003-3030进行咨询</p>
            <p class="notice">注：部分产品不能退款（比如定制类产品等）</p>
            </div>
            <form class="refund_agreement" action="/Buyer/Order/refund" method="POST">
                <input value="{$order.order_id}" name="order_id" hidden>
                <input value="{$order.pay_sn}" name="pay_sn" hidden>
                <input value="{$order.order_sn}" name="order_sn" hidden>
                <input value="2" name="type" hidden>
                <input type="submit" value="确认已退款">
            </form>
        </div>
        <elseif condition="$order['refund_state'] eq 2"/>
        <div class="tips">
            <h6>退款说明</h6>
            <p><span>是否收到货物：</span>{$order[extend_order_refund][received]?'已经收到货':'没有收到货物'}</p>
            <p><span>退款原因：</span>{$order[extend_order_refund][reason]}</p>
            <p><span>退款说明：</span>{$order[extend_order_refund][explain]}</p>

            <!-- <p><span>退款金额:</span>{$order.refund_amount}</p> -->
            <h6 class="rfr_title">退款已完成</h6>
        </div>
    </if>


    </div>
</div>
<div class="buyer_question" id="buyer_question">
    <h1 class="title">卖家退款</h1>
    <div class="shop clearfix">
        <a href=""><img src="" alt=""></a>
        <p>{$vo.goods_name}</p>
        <p>颜色：</p>
        <p>规格：</p>
        <strong>价格：2690.00元</strong>
    </div>
    <p class="refund_money">退款金额：<span>2690.00</span>元</p>
    <p class="tip">注：同意此商品的退款金额，退款金额退至您的账户，如若不同意此退款，请选择不同意并联系商家进行协商！</p>
    <div class="btn"><a href="">同意</a><a href="">不同意</a></div>
</div>
<template file="common/_promise.php"/>
<template file="common/_footer.php"/>

</body>
</html>
<script>
    $(".question .title").click(function(){
        layer.open({
            type:1,
            content:$("#buyer_question"),
            title:false,
            area:'700px',
            btn:false,
            closeBtn:0
        });
    })
</script>
