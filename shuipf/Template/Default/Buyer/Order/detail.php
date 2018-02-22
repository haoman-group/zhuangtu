<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>买家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/product.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/js/zClip/jquery.zeroclipboard.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/buyercenter.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/Chart.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/OrderDetails.js"></script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>
<div class="container buyercenter_wrap scindex">
    <ul class="buyerdetailstatus">
        <li class="<if condition="$order['order_state'] eq ORDER_STATE_NEW">now<elseif condition="$order['order_state'] gt ORDER_STATE_NEW"/>on<else/></if>">
        <span class="line"><span class="img"></span></span>
        <p>{$status[0][$cat_pid]}</p>
        <if condition="$order['order_state'] egt ORDER_STATE_NEW">
            <p>{$order.addtime|date="Y-m-d",###}&nbsp;&nbsp;{$order.addtime|date="H:i:s",###}</p>
        </if>
        </li>
        <if condition="$order['pay_type'] != 1">
                <li class="<if condition="$order['order_state'] eq ORDER_STATE_PAY">now<elseif condition="$order['order_state'] gt ORDER_STATE_PAY"/>on<else/></if>">
                <span class="line"><span class="img"></span></span>
                <p>{$status[1][$cat_pid]}</p>
                <if condition="$order['order_state'] egt ORDER_STATE_PAY">
                    <p>{$order.payment_time|date="Y-m-d",###}&nbsp;&nbsp;{$order.payment_time|date="H:i:s",###}</p>
                </if>
                </li>
                <li class="<if condition="$order['order_state'] eq ORDER_STATE_SEND">now<elseif condition="$order['order_state'] gt ORDER_STATE_SEND"/>on<else/></if>">
                <span class="line"><span class="img"></span></span>
                <p>{$status[2][$cat_pid]}</p>
                <if condition="$order['order_state'] egt ORDER_STATE_SEND">
                    <p>{$order.extend_order_common.shipping_time|date="Y-m-d",###}&nbsp;&nbsp;{$order.extend_order_common.shipping_time|date="H:i:s",###}</p>
                </if>
                </li>
                <li class="<if condition="$order['order_state'] eq ORDER_STATE_SETUP">now<elseif condition="$order['order_state'] gt ORDER_STATE_SETUP"/>on<else/></if>">
                <span class="line"><span class="img"></span></span>
                <p>{$status[3][$cat_pid]}</p>
                <if condition="$order['order_state'] egt ORDER_STATE_SETUP">
                    <p>{$order.setup_time|date="Y-m-d",###}&nbsp;&nbsp;{$order.setup_time|date="H:i:s",###}</p>
                </if>
                </li>
        </if>
        <li class="<if condition="($order['order_state'] eq ORDER_STATE_SUCCESS) and ($order['evaluation_state'] neq '1')">now<elseif condition="($order['order_state'] eq ORDER_STATE_SUCCESS) and ($order['evaluation_state'] eq '1')"/>on<else/></if>">
            <span class="line"><span class="img"></span></span>
            <p>{$status[4][$cat_pid]}</p>
            <if condition="$order['order_state'] egt ORDER_STATE_SUCCESS">
            <p>{$order.finnshed_time|date="Y-m-d",###}&nbsp;&nbsp;{$order.finnshed_time|date="H:i:s",###}</p>
        </if>
        </li>
        <li class="<if condition="$order['evaluation_state'] eq '1'">now<else/></if>">
        <span class="line"><span class="img"></span></span>
        <p>{$status[5][$cat_pid]}</p>
        <if condition="$order['evaluation_state'] eq '1'">
            <p>{$order.evalseller_time|date="Y-m-d",###}&nbsp;&nbsp;{$order.evalseller_time|date="H:i:s",###}</p>
        </if>
        </li>
    </ul>
<!--     <if condition="$order['installment'] eq '1'">
    <ul class="buyerdetailstatus_installment">
        <li class="branch"></li>
        <li class="now">
            <span class="line"><i></i><span class="img"></span></span>
            <p>工长服务费+水电工服务费已付款</p>
            <p>09:51:04</p>
        </li>
        <li>
            <span class="line"><i></i><span class="img"></span></span>
            <p>二期待付款</p>
            <p>09:51:04</p>
        </li>
        <li>
            <span class="line"><i></i><span class="img"></span></span>
            <p>三期待付款</p>
            <p>09:51:04</p>
        </li>
        <li>
            <span class="line"><i></i><span class="img"></span></span>
            <p>四期待付款</p>
            <p>09:51:04</p>
        </li>
    </ul></if> -->
    <div class="buyerdetailoperate">
        <div class="dt">
            <dl>
                <dt class="head">订单编号：</dt>
                <dd class="head">{$order.order_sn}</dd>
                <dt>卖家信息：</dt>
                <dd>
                 {$order['extend_order_goods']['goods_id']}   {$order.extend_shop.name} <a data-imurl="{:U('Member/Chat/index',array('shopid'=>$order['shop_id'],'order_sn'=>$order['order_sn']))}" class="btnopenserviceim needlogin">联系卖家</a>
                </dd>
                <dt>收货方式:</dt>
                <dd><?php if($order['extend_order_common']['reciver_type'] =='1'){echo "买家自提";}else{echo "商家发货";}?></dd>
                <if condition="$order['extend_order_common']['reciver_type'] eq '0'">
                <dt>收货地址：</dt>
                <dd>
                    {$order.extend_order_common.reciver_info.zone} &nbsp;{$order.extend_order_common.reciver_info.address}， {$order.extend_order_common.reciver_info.postcode}
                </dd>
                <dt>收 货 人 ：</dt>
                <dd>{$order.extend_order_common.reciver_info.name}</dd>
                <dt>联系电话：</dt>
                <dd>{$order.extend_order_common.reciver_info.phone}</dd>
                </if>   
                <dt>买家留言：</dt>
                <dd>{$order.extend_order_common.order_message}</dd>
                <div class="money">
                    <dt>金&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;额：</dt>
                    <dd><span>￥{$order.order_amount}</span></dd>
                </div>
            </dl>
        </div>
        <div class="dd">
            <div class="head">
                <notempty name="order[payment_time]"><span class="time">付款时间：{$order.payment_time|date="Y.m.d H:i",###}</span></notempty>
                <span class="time">成交时间：<em>{$order.addtime|date="Y.m.d H:i",###}</em></span>
            </div>
            <div class="status">
                <if condition="$order['refund_state']  eq '1'">
                    订单状态：<strong>退款申请中</strong>
                <elseif condition="$order['refund_state'] eq '2'"/>
                    订单状态：<strong>退款已完成</strong>
                <else/>
                <switch name="order['order_state']">
                    <case value="10">
                        <span>订单状态：</span><strong>{$status[0][$cat_pid]}</strong>
                        <a class="red" href="{:U('Cart/orderpay',array('pay_sn'=>$order['pay_sn'],'order_sn'=>$order['order_sn']))}" target="_blank">付款</a>
                        <a class="grey" href="{:U('Order/order_cancel',array('pay_sn'=>$order['pay_sn'],'order_sn'=>$order['order_sn']))}">取消订单</a>
                        <!-- <p>订单提交成功！还有 <span class="day">000天</span><span class="hour">00小时</span><span class="min">00分</span><span class="sec">00秒</span> 来付款，超时订单自动关闭</p> -->
                        <p class="countdown">订单提交成功！还有 <span class="time">23天58小时12分21秒</span> 来付款（超时订单自动关闭）</p>
                    </case>
                    <case value="20">
                        订单状态：<strong>{$status[1][$cat_pid]}</strong>
                        <a class="red" style="cursor:pointer">催卖家发货</a>
                        <p>付款成功，等待实体商家服务，商家正在紧急安排您的订单，如有任何问题， 可拨打商家电话：{$order.extend_shop.phone}<br>或装途网全国统一客服热线400-003-3030进行咨询</p>
                    </case>
                    <case value="30">
                        订单状态：<strong>{$status[2][$cat_pid]}</strong>
                        <a class="red" href="">申请服务</a>
                        <p>商家已接受订单，有些产品存在上门测量、定制、配货等特殊需求，具体发货时间请与商家联系，联系电话：{$order.extend_shop.phone}</p>
                    </case>
                    <case value="35">
                        订单状态：<strong>{$status[3][$cat_pid]}</strong>
                        <a class="red" href="{:U('Order/order_confirm',array('pay_sn'=>$order['pay_sn'],'order_sn'=>$order['order_sn']))}">确认安装</a>
                        <a class="red" href="">申请服务</a>
                        <p>产品已成功发货，等待买家确定收货</p>
                    </case>
                    <case value="40">
                        订单状态：<strong>{$status[4][$cat_pid]}</strong>
                        <if condition="$order['evaluation_state'] eq '0'"><a class="red" href="{:U('Buyer/Cart/pay_comment',array('order_sn'=>$order['order_sn']))}">评价</a></if>
                        <if condition='$commenttype eq 1 '><a class="red" href="{:U('Buyer/Cart/pay_comment',array('order_sn'=>$order['order_sn']))}">追加评论</a></if>
                        <a class="red" href="">申请服务</a>
                        <if condition="$order['evaluation_state'] eq '1'">
                            <p>已评价，交易完成</p>
                        <else/>
                            <p>已确定，交易完成，等待您的评价</p>
                        </if>
                    </case>
                    <case value="-1">
                        订单状态：<strong>{$status[6][$cat_pid]}</strong>
                        <!-- <a class="red" href="{:U('Cart/orderpay',array('pay_sn'=>$orNder['pay_sn'],'order_sn'=>$order['order_sn']))}" target="_blank">付款</a> -->
                        <!-- <a class="red" href="{:U('Order/order_cancel',array('pay_sn'=>$order['pay_sn'],'order_sn'=>$order['order_sn']))}">取消订单</a> -->
                        <!-- <p>订单提交成功！请在3天 内及时付款；谢谢您的支持！</p> -->
                        <!-- <p>还有<span class="time">23天58小时12分21秒</span>来付款（超时订单自动关闭）</p> -->
                    </case>
                    <default/>
                </switch>
                </if>
                <p class="statusnum">订单号：{$order['order_sn']}</p>
                <if condition="$order['extend_order_common']['reciver_type'] eq '0'">
                    <p class="statusaddress">收货地址：{$order.extend_order_common.reciver_info.zone} &nbsp;{$order.extend_order_common.reciver_info.address}， {$order.extend_order_common.reciver_info.postcode}</p>
                <else/>
                    <p class="statusaddress">收货方式: 买家自提</p>
                </if>
            </div>
            <div class="details">
                    <if condition="$order['order_state'] egt ORDER_STATE_SUCCESS"><p>{$order.finnshed_time|date="Y-m-d H:i:s",###}<span>{$status[4][$cat_pid]}</span></p></if>
                    <if condition="$order['pay_type'] != 1">
                        <if condition="$order['order_state'] egt ORDER_STATE_SETUP"><p>{$order.setup_time|date="Y-m-d H:i:s",###}<span>{$status[3][$cat_pid]}</span></p></if>
                        <if condition="$order['order_state'] egt ORDER_STATE_SEND"><p>{$order.extend_order_common.shipping_time|date="Y-m-d H:i:s",###}<span>{$status[2][$cat_pid]}</span></p></if>
                        <if condition="$order['order_state'] egt ORDER_STATE_PAY"><p>{$order.payment_time|date="Y-m-d H:i:s",###}<span>{$status[1][$cat_pid]}</span></p></if>
                    </if>
                    <if condition="$order['order_state'] egt ORDER_STATE_NEW"><p>{$order.addtime|date="Y-m-d H:i:s",###}<span>{$status[0][$cat_pid]}</span></p></if>
            </div>
        </div>
    </div>
    <div class="buyerdetailgoods">
        <div class="head">
            订单详情
        </div>
        <volist name="order['extend_order_goods']" id="vo">
            <ul>
                <li><a href=""><img src="{$vo.goods_image}"></a></li>
                <li>
                    <p>{$vo.goods_name}</p>

                    <volist name="vo[provalue]" id="provalue">
                        <?php if($key=='price'|| $key=='price_act') break; ?>
                        <p>{$key}：{$provalue['txt']}</p>
                    </volist>
                </li>
                <li>金额：{$vo.goods_price}</li>
                <li>数量：{$vo.goods_num}</li>
                <li>
                    <switch name="order['order_state']">
                        <case value="10">
                            <a class="red" href="{:U('Cart/orderpay',array('pay_sn'=>$order['pay_sn'],'order_sn'=>$order['order_sn']))}" target="_blank">付款</a>
                            <a href="{:U('Order/order_cancel',array('pay_sn'=>$order['pay_sn'],'order_sn'=>$order['order_sn']))}">取消订单</a></case>
                        <case value="20"></case>
                        <case value="30"></case>
                        <case value="35"><a href="{:U('Order/order_confirm',array('pay_sn'=>$order['pay_sn'],'order_sn'=>$order['order_sn']))}">确认安装</a></case>
                        <case value="40"></case>
                        <default/>
                    </switch>
                    <!-- <a class="delivery" href="">送货服务</a> -->
                    <!-- <a class="install" href="">安装服务</a> -->
                    <!-- <a class="agreement" href="">合同</a> -->
                </li>
            </ul>
        </volist>
        <div class="footer">
            <span>金&nbsp;&nbsp;额</span>:<strong>¥{$order.order_amount}</strong>
        </div>
    </div>

    <div class="clear"></div>
</div>
<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>

<script>
    $(function(){
        var pheight = $(".details").find("p").height();
        var plength = $(".details").find("p").length;
        var moneytop = pheight*plength + 30 +'px';
        $(".money").css({'margin-top':moneytop});

        // 倒计时显示
        updateTime();
        var timer = setInterval(updateTime,1000);

        function fillZero(num,digit){
            var str = '' + num;
            while(str.length < digit){
                str = '0' + str;
            }
            return str;
        }

        function updateTime(){
            var oDateNow = new Date();
            var oldDtate = {$order.addtime};
            var limit = 172800;
            var iRemain = 0;
            var iDay = 0;
            var iHour = 0;
            var iMin = 0;
            var iSec = 0;

            iRemain = (limit - (parseInt(oDateNow.getTime()/1000) - oldDtate));
            var order_state = {$order.order_state};
            if(order_state == '-1' || iRemain<=0){
                clearInterval(timer);
                iRemain = 0;
                // $(".buyerdetailoperate .dd .status").find(".countdown").hide().end().find("strong").html("已取消");
            }

            iDay = parseInt(iRemain/86400);
            iRemain %= 86400;

            iHour = parseInt(iRemain/3600);
            iRemain %=3600;

            iMin = parseInt(iRemain/60);
            iRemain %= 60;

            iSec = iRemain;

            $(".buyerdetailoperate .dd .status .time").html(fillZero(iDay,2) + '天' + fillZero(iHour,2) + '小时' + fillZero(iMin,2) + '分' + fillZero(iSec,2) + '秒');


        }



        $(".btnopenserviceim").click(function(){
            var imurl = $(this).attr("data-imurl");
            layer.open({
                type:2,
                title: false,
                closeBtn: 0,
                scrollbar: false,
                //title:"装途网在线客服系统",
                area: ['902px','607px'],
                shadeClose: false,
                content: [imurl ,'no']
            });
            return false;
        })
    })




</script>

</body>
</html>
