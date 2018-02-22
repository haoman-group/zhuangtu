<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>卖家中心</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/product.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/shipping_address_news.css" type="text/css"/>
    <!--[if lt IE 9]>
    <script src="{$config_siteurl}statics/zt/js/html5.js "></script >
    <script src="{$config_siteurl}statics/zt/js/respond.min.js "></script >
    <![endif]-->
    <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/js/zClip/jquery.zeroclipboard.min.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/sellercenter.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/OrderDetails.js"></script>
</head>
<body>
  <!--背景容器-->
  <template file="Seller/common/_header.php"/>

  <!--sellercent_wrap卖家中心通用     scindex卖家中心首页-->
  <div class="container sellercenter_wrap scindex">
    <template file="Seller/common/_left.php"/>
    <div class="wraprt">
      <div class="crumbs">
        <a href="http://zhuangtu.local/Seller/Index/index.html" class="cat-ajx">卖家中心</a>
        <a href="#" class="icon-ajx"> &gt; </a>
        <a href="{:U(Order/index)}" class="icon-ajx">交易管理</a>
        <a href="#" class="icon-ajx"> &gt; </a>
        <a href="{:U(Order/index)}" class="icon-ajx">已卖出的宝贝</a>
        <a href="#" class="icon-ajx"> </a>
      </div>

      <div class="productsell_sear">

        <form  action="search" method="post">
          <table>
            <tbody><tr>
              <td>
                <span>宝贝名称:</span>
                <input type="text" name="title" value=""></td>
              <td colspan="2">
                <span>成交时间:</span>
                <input type="text" name="starttime" value=""> <em>-</em> <input type="text" name="endtime">
              </td>

            </tr>
            <tr>
              <td>
                <span>买家昵称:</span>
                <input type="text"  name="buyername" value="">
              </td>
              <td >
                <span>订单编号: </span>
                <input type="text" class="inputs" name="order_sn" value="">
              </td>
              <td>
                <input type="reset" class="reset" value="清除条件">
                <input type="submit" class="sear" value="搜 索">
              </td>

            </tr>

            </tbody></table>
        </form>

      </div>

      <ul class="goodsstatus">
            <li <empty name="_GET['order_state']">class="on"</empty>><a href="{:U('index')}">所有订单</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_NEW">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_NEW))}">等待买家付款</a></li>
<li <if condition="$_GET[order_state] eq ORDER_STATE_PAY">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_PAY))}">  <switch name="cat_pid"><case value="1">等待设计师交稿</case><case value="2">等待工人施工</case><case value="3|4|5">等待服务</case></switch></a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SEND">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SEND))}"><switch name="cat_pid"><case value="1">改稿中</case><case value="2">施工中</case><case value="3|4|5">服务中</case></switch></a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SETUP">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SETUP))}"><switch name="cat_pid"><case value="1">待确认</case><case value="2">待验收</case><case value="3|4|5">待确认</case></switch></a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_SUCCESS">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_SUCCESS))}">交易成功</a></li>
            <li <if condition="$_GET[order_state] eq ORDER_STATE_CANCEL">class="on"</if>><a href="{:U('index',array('order_state'=>ORDER_STATE_CANCEL))}">交易关闭</a></li>
            <!-- <li><a href="{:U('index')}">待评价</a></li> -->
      </ul>

      <form action="">
        <div class="buy_goods">
          <ul class="title">
            <li></li>
            <li>数量</li>
            <li>单价</li>
            <li>实付款</li>
            <li>买家</li>
            <li>交易状态</li>
            <li>操作</li>
          </ul>
          <volist name="order" id='vo'>
          <div class="goods_list">
            <h6>
              <span class="data">日期：{$vo.addtime|date="Y/m/d",###}</span>
              <span class="num">订单号：{$vo.order_sn}</span>
              <span> <empty name="vo['shipping_code']"><else/>物流单号：{$vo.shipping_code}</empty></span>

            </h6>
            <div class="border">
               <volist name="vo[goods]" id="v">
                <ul class="cost">
                  <li><a href="" class="cost_image"><img src="{$v.goods_image|thumb=###,'88','88','0'}" style="width:88px;height:88px;"></a><div class="describe"><a href="">{$v.goods_name}</a>
                    <div>
                       <volist name="v[provalue]" id="provalue">
                                      <?php if($key=='price' || $key == 'price_act') break; ?>
                                      {$key}：{$provalue['txt']}<br/>
                                    </volist>
                    </div></div></li>
                  <li>{$v.goods_num}</li>
                  <li>￥{$v.goods_price}</li>
                  <li>￥{$v.goods_pay_price}</li>
                  <li>{$vo.buyer.username}<a href=""><!-- 联系买家 --></a></li>
                     <switch name="vo['order_state']">
                      <case value="10">
                        <li>
                          {$status[0][$cat_pid]}<a href="{:U('detail',array('order_sn'=>$vo['order_sn']))}">订单详情</a>
                          <li>
                            
                            <!-- <if condition="$vo['installment'] eq '0'"> -->
                            <a class="changePrice"        data-recid="{$v.rec_id}" data-ordersn="{$vo.order_sn}" href="javascript:void(0)">改价</a>
                              <!-- <a class="seller_installment" data-recid="{$v.rec_id}" data-ordersn="{$vo.order_sn}" href="javascript:void(0)">分期付款</a> -->
                            <!-- </if> -->
                          </li>
                        </li>
                      </case>
                      <case value="20">
                        <li>
                            {$status[1][$cat_pid]}<a href="{:U('detail',array('order_sn'=>$vo['order_sn']))}">订单详情</a>
                          </li>
                        <if condition="$vo['refund_state'] == '1'">
                          <li><a href="###" class="btn refund" data-orderSn="{$vo.order_sn}"  style="cursor:pointer">退款提醒</a></li>
                        <else/>
                          <li>
                            <a href="###" class="btn send" data-orderSn="{$vo.order_sn}" style="cursor:pointer">{$actions[1][$cat_pid]}</a>
                          </li>
                        </if>
                      </case>
                      <case value="30"><li>{$status[2][$cat_pid]}<a href="{:U('detail',array('order_sn'=>$vo['order_sn']))}">订单详情</a></li><li><a class="btn setup" data-orderSn="{$vo.order_sn}" style="cursor:pointer">{$actions[2][$cat_pid]}</a></li></case>
                      <case value="35"><li>{$status[3][$cat_pid]}<a href="{:U('detail',array('order_sn'=>$vo['order_sn']))}">订单详情</a></li><li>无操作</li></case>
                      <case value="40"><li>{$status[4][$cat_pid]}<a href="{:U('detail',array('order_sn'=>$vo['order_sn']))}">订单详情</a></li><li>无操作</li></case>
                      <case value="-1"><li>交易关闭<a href="{:U('detail',array('order_sn'=>$vo['order_sn']))}">订单详情</a></li><if condition="$vo['refund_state'] =='2'"><li style="color:#cc2728"><a  class="btn refund" data-orderSn="{$vo.order_sn}"  style="cursor:pointer;border:0px solid #c7161e">退款成功</a></li><else/><li>无操作</li></if></case>
                      <default /><li>无状态</li><li>无操作</li>
                    </switch>
                    <!-- <li><a href="{:U('detail',array('order_sn'=>$vo['order_sn']))}">订单详情</a></li> -->
                </ul>
              </volist>
            </div>
            <!-- 分期付款 -->
           <!--  <if condition="$vo['installment'] eq '1'">
            <div class="border">
                <ul class="cost install_cost">
                  <li>第一期付款：首付（33%）</li>
                  <li>{$v.goods_num}</li>
                  <li>￥{$v.goods_price}</li>
                  <li>￥{$v.goods_pay_price}</li>
                  <li></li>
                  <li></li>
                  <li>已完成</li>
                </ul>
            </div>
            <div class="border">
                <ul class="cost">
                  <li>第二期付款：后期付款（33%）</li>
                  <li>{$v.goods_num}</li>
                  <li>￥{$v.goods_price}</li>
                  <li>￥{$v.goods_pay_price}</li>
                  <li></li>
                  <li></li>
                  <li class="active">等待买家付款</li>
                </ul>
            </div>
            <div class="border">
                <ul class="cost">
                  <li>第三期付款：三付（33%）</li>
                  <li>{$v.goods_num}</li>
                  <li>￥{$v.goods_price}</li>
                  <li>￥{$v.goods_pay_price}</li>
                  <li></li>
                  <li></li>
                  <li>已完成</li>
                </ul>
            </div>
          </if> -->
          </div>
          </volist>
          <div class="popup">
            <div class="popup_cancel"><span></span><span></span></div>
            <form action="">
              <select name="" id="">
                <option value="">取消订单原因</option>
                <option value="">服务不满意</option>
              </select>
              <div class="popup_cause">*请选择取消订单原因</div>
              <div class="popup_sure"><a href="">确定</a></div>
            </form>
          </div>
          <!-- 页数 -->
          <div class="pagebox">
              {$Page}
          </div>
        </div>

        <div class="clear"></div>
      </form>
    </div>
  </div>
    <div class="clear"></div>
<!--end-->
<template file="common/_promise.php"/>
<template file="Seller/common/_footer.php"/>
</body>
<script>
$(".refund").click(function(){
  var order_sn = $(this).attr('data-orderSn');
  // console.log(order_sn);
    layer.open({
        type:2,
        content: "/Seller/Order/refund?order_sn="+order_sn,
        title:false,
        area:['1190px','700px'],
        btn:false,
        closeBtn:1,
        shadeClose:true

    });
})
</script>
</html>
