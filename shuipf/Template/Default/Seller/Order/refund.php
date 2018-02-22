<html>
<head>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css"/>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/product.css" type="text/css"/>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/sellercenter.css" type="text/css"/>
  <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/shipping_address_news.css" type="text/css"/>
  <script src="{$config_siteurl}statics/zt/js/jquery.js"></script>

</head>
<body>
    <div class="seller_question" id="seller_question">
        <h1 class="title">买家订单详情</h1>
        <div class="order_message clearfix">
          <dl>
            <dt>收货地址：</dt><dd>{$order.extend_order_common.reciver_info.zone} &nbsp;{$order.extend_order_common.reciver_info.address}， {$order.extend_order_common.reciver_info.postcode}</dd>
            <dt>买家信息：</dt><dd>{$order.extend_order_common.reciver_info.name}<span>{$order.extend_order_common.reciver_info.phone}</span></dd>
            <dt>订单编号：</dt><dd>{$order.order_sn}</dd>
          </dl>
          <strong>时间：{$order.addtime|date="Y-m-d H:i:s",###}</strong>
        </div>
        <div class="shop_message clearfix">
          <table>
              <caption>买家申请退款的宝贝</caption>
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
                            <a href="#" target="_blank">{$vo.goods_name}</a>
                          </dd>
                          <!-- <dd>计价方式：<strong>普通家装</strong></dd> -->
                            <volist name="vo[provalue]" id="provalue">
                      <?php if($key=='price'|| $key=='price_act') break; ?>
                      <dd>{$key} : <strong>{$provalue['txt']}</strong></dd>
                    </volist>
                      </dl>
                  </td>
                  <td>{$vo.goods_num}</td>
                  <td><?=$vo['goods_pay_price']/$vo['goods_num']?></td>
                  <td>{$vo.goods_pay_price}</td>
              </tr>
            </volist>
          </table>
          <dl>
            <dt>是否收到货物：</dt><dd><if condition="$refund['received'] =='0'">没有收到货<else/>已收到货物</if></dd>
            <dt>退款原因：</dt><dd>{$refund.reason}</dd>
            <dt>退款说明：</dt><dd>{$refund.explain}</dd>
          </dl>
        </div>
        <if condition="$order['refund_state'] == '1'">
        <form action="" method="post" class="refund_form">
          <input name="order_id" value="{$order.order_id}" hidden>
          <br><br><p class="tip" style="color:#cc2728">请尽快联系买家商议退款服务流程!</p><br><br>
        <!-- <p class="refund_money">退款金额：<input type="text" name="refund_amount" value="<?=empty($order['refund_amount'])?$order['order_amount']:$order['refund_amount'];?>"><span>填写退款金额或者默认退款金额！请于买家进行沟通，填写沟通过后确认的金额！避免不必要的麻烦！</span></p> -->
        <p class="tip">注：请在三天内处理此次退款申请，否则装途客服将会介入，强制退款！</p>
        <div class="btn">
          <input type="button"  class="refund_form_submit" value='确定'> <a href="###" onclick="javascript:parent.layer.closeAll();">取消</a>
        </div>
      </form>
      <elseif condition="$order['refund_state'] == 2"/>
        <p class="tip">退款成功 !</p>
        <div class="btn">
          <a href="###" onclick="javascript:parent.layer.closeAll();">取消</a>
        </div>
        </if>
    </div>
    <script>
    $(".refund_form_submit").click(function(){
        $.post(
          "/Seller/Order/refund",
          $('.refund_form').serialize(),
          function(data){
            if(data.status == 1){
              parent.layer.closeAll();
            }
          },
          "json"
          );
    });
    </script>
  </body>

  </html>
