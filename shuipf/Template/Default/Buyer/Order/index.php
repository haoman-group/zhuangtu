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
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
</head>

<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>

<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
    <template file="Buyer/common/_head.php"/>
    <div class="wraprt">
      <if condition="strpos($_SERVER['PHP_SELF'], 'refundlist') eq true"><else/>
        <ul class="goodsstatus">
            <li <empty name="_GET['order_state']">class="on"</empty>><a href="{:U('index')}">所有订单</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_NEW">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_NEW))}">待付款</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_PAY">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_PAY))}">待发货</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SEND">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SEND))}">待安装</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SETUP">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SEND))}">待确认</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SUCCESS">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SUCCESS))}">交易成功</a></li>
            <li><a href="{:U('index')}">待评价</a></li>
            <li class="recycle"><a href="{:U('recyclebin')}">订单回收站</a></li>
        </ul>
      </if>
        <div class="productsell_sear">

          <form id="searchoptions" method="post"  <if condition="strpos($_SERVER['PHP_SELF'], 'refundlist') eq true">action="refundsearch" <else/> action="ordersearch" </if>>
            <div class="order_form">
                <input type="text" placeholder="输入商品订单号或者标题" name="order_sn">
                <input type="submit" value="订单搜索">
            </div>
            <a href="javascript:void(0)" class="btn">按条件搜索</a>
            <div class="table_box">
                <table>
                  <tbody>
                  <tr>
                    <td>
                      <span>店铺名称</span>
                      <input type="text" name="shop_name" value="" placeholder="请选择店铺名称">
                    </td>
                    <td>
                      <span>交易状态</span>
                      <select name="status">
                          <option value='' >全部</option>
                          <option value="10">等待买家付款</option>
                          <option value="20">已付款，待服务</option>
                          <option value="35">服务中</option>
                          <option value="30">已发货，待确认</option>
                          <option value="40">交易成功</option>
                          <option value="0">退款中的订单</option>
                      </select>
                    </td>
                    <td>
                      <span>成交时间</span>
                      <input type="text" name="starttime" value="" placeholder="请选择开始时间"> <em>--</em> <input type="text" name="endtime" placeholder="请选择结束时间">
                    </td>

                  </tr>
                  <tr>
                    <td>
                      <span>评价状态</span>
                      <select name="type">
                          <option value='-1'>全部</option>
                          <option value="0">已评价</option>
                          <option value="1">追加评价</option>
                      </select>
                    </td>
                    <td colspan="2">
                      <span>售后状态</span>
                      <select name="refund_state">
                          <option value=''>全部</option>
                          <option value="2">退款退货</option>
                         <!--  <option>已投诉</option> -->
                      </select>
                    </td>
                  </tr>
                  </tbody>
                </table>
                <div class="orderform_bott"><input type="submit" value="订单搜索"></div>
            </div>
          </form>
        </div>
         <form action="">
            <div class="buy_goods">
                <table>
                    <tr>
                        <th class="td_1">宝贝</th>
                        <th>数量</th>
                        <th>单价(元)</th>
                        <th>商品操作</th>
                        <th>实付款(元)</th>
                        <th>交易状态</th>
                        <th>操作</th>
                    </tr>
                <volist name="order" id="vo">
                <tbody>
                    <tr class="sep_row">
                        <td colspan="7" class="empty"></td>
                    </tr>
                    <tr class="title">
                        <td colspan="7">
                            <h6>
                                <span class="data">日期：{$vo.addtime|date="Y/m/d",###}</span>
                                <span class="num">订单号：<i>{$vo['order_sn']}</i></span>
                                <a href="/s/{$vo.shop.domain}" target="_blank" title="{$vo.shop.name}" data-imurl="{:U('Member/Chat/index',array('order_sn'=>$vo['order_sn'],'shopid'=>$vo['shop']['id']))}" class="shop btnopenserviceim"><i>{$vo.shop.name}</i><img src="{$config_siteurl}statics/zt/images/buyercenter/chat.png" alt="联系卖家" /></a>
                                <!-- <a href="javascript:void(0)" class="comment">联系商家</a> -->
                                <a href="javascript:void(0)" class="address" data-fulladdr="{$vo.shop.addr}">{$vo.shop.addr}</a>
                                <a href="javascript:void(0)" class="phone">{$vo.shop.phone}</a>
                                <switch name="vo['order_state']">
                                    <case value="10"><a href="javascript:void(0)" class="delete" title="删除"><img src="{$config_siteurl}statics/zt/images/buyercenter/deletegray.png"><span>删除订单</span></a></case>
                                    <case value="20"></case>
                                    <case value="30"></case>
                                    <case value="35"></case>
                                    <case value="40"><a href="javascript:void(0)" class="delete" title="删除"><img src="{$config_siteurl}statics/zt/images/buyercenter/deletegray.png"><span>删除订单</span></a></case>
                                    <case value="-1"><a href="javascript:void(0)" class="delete" title="删除"><img src="{$config_siteurl}statics/zt/images/buyercenter/deletegray.png"><span>删除订单</span></a></case>
                                    <default /> <a href="javascript:void(0)" class="delete" title="删除"><img src="{$config_siteurl}statics/zt/images/buyercenter/deletegray.png"><span>删除订单</span></a>
                                </switch>
                                <!-- <a href="javascript:void(0)" class="delete" title="删除"><img src="{$config_siteurl}statics/zt/images/buyercenter/deletegray.png"><span>删除订单</span></a> -->
                            </h6>
                        </td>
                    </tr>
                    <volist name="vo[goods]" id="v" key='k'>
                    <tr>
                        <td class="td_1">
                            <dl>
                                <dt><a href="{:U('Shop/Product/show',array('id'=>$v['goods_id']))}"><img src="{$v.goods_image}"></a></dt>
                                <dd><a href="{:U('Shop/Product/show',array('id'=>$v['goods_id']))}" target="_blank">{$v.goods_name}</a> </dd>
                                <volist name="v[provalue]" id="provalue">
                                    <?php if($key=='price'|| $key=='price_act') break; ?>
                                    <dd>{$key}：<strong>{$provalue['txt']}</strong></dd>
                                </volist>
                            </dl>
                        </td>
                        <td>{$v['goods_num']}</td>
                        <td>￥{$v['goods_pay_price']}</td>
                        <td class="operation">
                            <a href="{:U('/Public/contact')}">投诉</a>
                            <a href="{:U('/Public/contact')}">售后</a>
                        </td>
                        <if condition="$k eq 1">
                            <td rowspan="<?php echo count($vo[goods]);?>" class="border_line">￥{$vo['order_amount']}</td>
                            <td rowspan="<?php echo count($vo[goods]);?>" class="border_line">
                                <a href="{:U('Order/detail',array('order_sn'=>$vo['order_sn']))}"  target="_blank">订单详情</a>
                                <span>已签非标合同</span>
                                <switch name="vo['order_state']">
                                    <case value="10"><span class="active">{$status[0][$vo['shop']['cat_pid']]}</span></case>
                                    <case value="20"><span class="active">{$status[1][$vo['shop']['cat_pid']]}</span></case>
                                    <case value="30"><span class="active">{$status[2][$vo['shop']['cat_pid']]}</span></case>
                                    <case value="35"><span class="active">{$status[3][$vo['shop']['cat_pid']]}</span></case>
                                    <case value="40"><span class="active">{$status[4][$vo['shop']['cat_pid']]}</span></case>
                                    <case value="-1"><span class="active">{$status[6][$vo['shop']['cat_pid']]}</span></case>
                                    <default /><span></span>
                                </switch>
                            </td>
                            <td rowspan="<?php echo count($vo[goods]);?>" class="border_line">
                                 <switch name="vo['order_state']">
                                        <case value="10">
                                            <a  class="on" href="{:U('Cart/orderpay',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}" target="_blank">付款</a>
                                            <a href="{:U('Order/order_cancel',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}">取消订单</a>
                                        </case>
                                        <case value="20"><a>已付款</a><a class="on" href="{:U('Order/refund',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}"><?=$refund[$vo['refund_state']]?></a></case>
                                        <case value="30"><a>服务中</a><a class="on" href="{:U('Order/refund',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}"><?=$refund[$vo['refund_state']]?></a></case>
                                        <case value="35"><a class="on" href="{:U('Order/order_confirm',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}">确认</a><a class="on" href="{:U('Order/refund',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}"><?=$refund[$vo['refund_state']]?></a><!-- <a class="on" href="{:U('Order/order_cancel',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}">退货退款</a> --></case>
                                        <case value="40"><if condition="$vo['evaluation_state'] eq '1'"><a class="red" href="javascript:void(0)">已评价</a><else/><a class="on" href="<if condition ='count($vo[goods]) gt 1'>{:U('Buyer/Cart/pay_commentProduct',array('order_sn'=>$vo['order_sn']))}<else/>{:U('Buyer/Cart/pay_comment',array('order_sn'=>$vo['order_sn']))}</if>">评价</a></if>
                                            <a class="red" href="<if condition='$vo["commenttype"]["type"] neq 1 '>{:U('Buyer/Cart/pay_comment',array('order_sn'=>$vo['order_sn']))}<else/>javascript:void(0)</if>">追加评论</a>
                                        </case>
                                        <case value="-1"><a href="javascript:void(0)">已取消</a><if condition="$vo['refund_state'] == 2"><a href="{:U('Order/refund',array('pay_sn'=>$vo['pay_sn'],'order_sn'=>$vo['order_sn']))}" style="color:#cc2728" ><?=$refund[$vo['refund_state']]?></a></if></case>
                                        <default /><a>无状态</a>
                                </switch>
                                 <a href="javascript:void(0)">我要去实体店</a>
                            </td>
                        </if>
                    </tr>
                    </volist>
<!--                     <if condition="$vo['installment'] == '1'">
                    <tr class="installment">
                        <td class="td_1">第一期付款：首付（33%）</td>
                        <td>{$v['goods_num']}</td>
                        <td>￥{$v['goods_pay_price']}</td>
                        <td class="operation"></td>
                        <td class="border_line">￥{$vo['order_amount']}</td>
                        <td class="border_line"></td>
                        <td class="border_line">已完成付款</td>
                    </tr>
                    <tr class="installment">
                        <td class="td_1">第二期付款：后期付款（67%）</td>
                        <td>{$v['goods_num']}</td>
                        <td>￥{$v['goods_pay_price']}</td>
                        <td class="operation"></td>
                        <td class="border_line">￥{$vo['order_amount']}</td>
                        <td class="border_line"></td>
                        <td class="border_line"><a href="" class="on">付款</a></td>
                    </tr>
                    </if> -->
                </tbody>
                </volist>
                </table>
                <!-- 页数 -->

                <div class="pagebox">
                    {$Page}
                </div>
            </div>

            <div class="clear"></div>
        </form>
    </div>
</div>




<!--保证栏-->
<template file="common/_promise.php"/>
<!--尾部-->
<!--背景容器-->
<template file="common/_footer.php"/>

<script>
    $(function(){
        $(".buy_goods .title .address").click(function(){

            layer.tips($(this).attr("data-fulladdr"), $(this), {
                tips: [1, '#e03c43']
            });
        })

        // 搜索功能展示
        $(".productsell_sear .btn").on("click",function(){
            $(".table_box").toggleClass("on");
        });

        // 删除订单
        $(".buy_goods table tr.title .delete").on("click",function(){
            var $that = $(this);
            var order_sn = $(this).parents("tr").find(".num i").html();
            layer.confirm("<strong style='font-weight:bold'>确定删除此订单？</strong><br />删除以后，可到订单回收站找回，或永久删除",{
                    btn:['确认','取消']
                },
                function(){
                  layer.closeAll();
                  $.ajax({
                      type:"POST",
                      url:"/api/Foot/addrecycle_bin",
                      dataType:"json",
                      data:{'order_sn':order_sn},
                      success:function(data){
                          if(data.status == 1){
                              layer.msg('删除成功');
                              $that.parents("tbody").remove();
                          }
                      },
                      error:function(){

                      }
                  });
                },
                function(){

                }
            );
        });

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
