<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>买家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/product.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.js"> </script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
</head>
<body>
<!--背景容器-->
<template file="Content/common/_header.php"/>
<!--buyercent_wrap买家中心通用     scindex买家中心首页-->
<div class="container buyercenter_wrap scindex">
    <template file="Buyer/common/_head.php"/>
    <div class="wraprt">
        <ul class="goodsstatus">
            <li <empty name="_GET['order_state']">class=""</empty>><a href="{:U('index')}">所有订单</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_NEW">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_NEW))}">待付款</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_PAY">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_PAY))}">待发货</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SEND">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SEND))}">待安装</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SETUP">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SEND))}">待确认</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SUCCESS">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SUCCESS))}">交易成功</a></li>
            <li><a href="{:U('index')}">待评价</a></li>
            <li class="recycle on"><a href="{:U('recyclebin')}">订单回收站</a></li>
        </ul>
        <ul class="batch">
            <li><input type="checkbox" id="all"><label for="all">全选</label></li>
            <li><a href="javascript:void(0)" class="batch_delete">批量永久删除</a></li>
            <li><a href="javascript:void(0)" class="batch_restore">批量还原</a></li>
        </ul>
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
                    <volist name="orderinfo" id="vo">
                    <tbody>
                    <tr class="sep_row">
                        <td colspan="7" class="empty"></td>
                    </tr>
                    <tr class="title">
                        <td colspan="7">
                            <h6>
                                <input type="checkbox">
                                <span class="data">日期：{$vo.addtime|date="Y/m/d",###}</span>
                                <span class="num">订单号：<i>{$vo.order_sn}</i></span>
                                <a href="" target="_blank" title="" class="shop"><i>{$vo.shopinfo.name}</i><img src="{$config_siteurl}statics/zt/images/buyercenter/chat.png" alt="联系卖家" /></a>
                                <!-- <a href="javascript:void(0)" class="comment">联系商家</a> -->
                                <a href="javascript:void(0)" class="address" data-fulladdr="{$vo.shop.addr}">{$vo.shopinfo.addr}</a>
                                <a href="javascript:void(0)" class="phone">{$vo.shopinfo.phone}</a>
                                <a href="javascript:void(0)" class="delete" title="删除"><img src="{$config_siteurl}statics/zt/images/buyercenter/deletegray.png"><span>删除订单</span></a>
                            </h6>
                        </td>
                    </tr>
                    <tr>
                        <volist name="vo['product']" id="v"  key='k'>
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
                                    <case value="10"><span class="active">{$status[0][$vo['shopinfo']['cat_pid']]}</span></case>
                                    <case value="20"><span class="active">{$status[1][$vo['shopinfo']['cat_pid']]}</span></case>
                                    <case value="30"><span class="active">{$status[2][$vo['shopinfo']['cat_pid']]}</span></case>
                                    <case value="35"><span class="active">{$status[3][$vo['shopinfo']['cat_pid']]}</span></case>
                                    <case value="40"><span class="active">{$status[4][$vo['shopinfo']['cat_pid']]}</span></case>
                                    <case value="-1"><span class="active">{$status[6][$vo['shopinfo']['cat_pid']]}</span></case>
                                    <default /><span></span>
                                </switch>
                            </td>
                            <td rowspan="<?php echo count($vo[goods]);?>" class="border_line">
                                 <a href="javascript:void(0)" class="restore">订单还原</a>
                            </td>
                        </if>
                    </tr>
                     </volist>
                    <if condition="$vo['installment'] == '1'">
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
                    </if>
                    <tbody>
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
        });
        // 单个删除订单
        $(".buy_goods table tr.title .delete").on("click",function(){
            var $that = $(this);
            var order_sn = $(this).parents("tr").find(".num i").html();
            layer.confirm("<strong style='font-weight:bold'>确定要永久删除此订单吗？</strong><br />删除以后，订单无法找回",{
                    btn:['确认','取消']
                },
                function(){
                  layer.closeAll();
                  $.ajax({
                      type:"POST",
                      url:"/api/Foot/deleorder",
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

        $(".batch li").find("input").click(function(){
            var hason = $(this).hasClass("on");
            $(this).toggleClass("on");
            !hason ? $(".buy_goods table tr.title h6").find("input").prop("checked",true) : $(".buy_goods table tr.title h6").find("input").removeProp("checked",false);
        });
        // 批量删除订单
        $(".batch .batch_delete").on("click",function(){
            $that = $(this);
            var order_sn = $(".buy_goods table tr.title h6").find("input:checked");
            var ordersnarr = [];
            $.each(order_sn,function(i,v){
                ordersnarr.push($(v).parents("tr").find(".num i").html());
            });
            layer.confirm("<strong style='font-weight:bold'>确定要永久删除这些订单吗？</strong><br />删除以后，订单无法找回",{
                    btn:['确认','取消']
                },
                function(){
                  layer.closeAll();
                  $.ajax({
                      type:"POST",
                      url:"/api/Foot/deleorder",
                      dataType:"json",
                      data:{'order_sn':ordersnarr.toString()},
                      success:function(data){
                          if(data.status == 1){
                              layer.msg('删除成功');
                              $that.addClass("on");
                              $(".buy_goods table tr.title h6").find("input:checked").parents("tbody").remove();
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
        // 单个还原订单
        $(".buy_goods table .restore").on("click",function(){
            var $that = $(this);
            var order_sn = $(this).parents("tr").prev(".title").find(".num i").html();
            $.ajax({
              type:"POST",
              url:"/api/Foot/redorder",
              dataType:"json",
              data:{'order_sn':order_sn},
              success:function(data){
                  if(data.status == 1){
                      layer.msg('还原成功');
                      $that.parents("tbody").remove();
                  }
              },
              error:function(){

              }
            });
        });
        // 批量还原订单
        $(".batch .batch_restore").on("click",function(){
            var $that = $(this);
            var order_sn = $(".buy_goods table tr.title h6").find("input:checked");
            var ordersnarr = [];
            $.each(order_sn,function(i,v){
                ordersnarr.push($(v).parents("tr").find(".num i").html());
            });
            $.ajax({
              type:"POST",
              url:"/api/Foot/redorder",
              dataType:"json",
              data:{'order_sn':ordersnarr.toString()},
              success:function(data){
                  if(data.status == 1){
                      layer.msg('还原成功');
                      $that.addClass("on");
                      $(".buy_goods table tr.title h6").find("input:checked").parents("tbody").remove();
                  }
              },
              error:function(){

              }
            });
        });
    })
</script>

</body>
</html>
