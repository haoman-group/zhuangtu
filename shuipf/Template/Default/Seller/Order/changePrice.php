<html>
<head>
<title>修改价格</title>
<meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css" />
    <!--<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css" />-->
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/shipping_address_news.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"></script>
<script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/comm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
</head>
<body>
	<form class="changePrice chprSize"  onsubmit="return false" >
        <p class="old_price">订单原价：<span>{$goods.goods_pay_price}</span>元</p>
        <table>
            <tr>
                <th>宝贝</th>
                <th>单价（元）</th>
                <th>数量</th>
                <th>修改后价格（元）</th>
            </tr>
            <tr>
                <td>{$goods.goods_name}</td>
                <td>{$goods.goods_pay_price}</td>
                <td>1</td>
                <td><input type="text" class="after_price" name="new_price" value="{$goods.goods_pay_price}"></td>
            </tr>
        </table>
        <p class="addre">收货地址：{$common.reciver_info.zone}{$common.reciver_info.address} {$common.reciver_info.name}（收）</p>
        <p class="real_price">买家实际付款：<span>{$goods.goods_pay_price}</span>元</p>
        <input name="rec_id" value="{$goods.rec_id}" hidden>
        <input name="order_id" value="{$goods.order_id}" hidden>
        <div class="btn">
            <input type="submit" value="提交">
            <input type="button" class="btncancel" value="取消" >
        </div>
	</form>
</body>
<script type="text/javascript">
$(function() {
    $(".changePrice").validate({
        errorElement: "i",
        onkeyup: false,
        submitHandler: function(form) {
            $(form).attr("action", "{:U('Api/SellerOrder/changePrice')}")
            $(form).ajaxSubmit({
                success: function(data) {
                        if(data.status != '1')
                        {
                            alert(data.msg);
                        }
                    if (self != top) {
                       top.location.reload();
                    }
                },
                error: function(res) {

                }
            });

        },
        rules: {
            new_price: {
                required: true
            }
        },
        messages: {
            new_price: {
                required: "请填写价格"
            }
        }
    });

    $(".btncancel").click(function() {
        parent.layer.closeAll();
    });

    $(".real_price").find("span").html($(".after_price").val());

    // $(".after_price").change(function(){
        $(".after_price").keyup(function(){
            $(".real_price").find("span").html($(".after_price").val());
        })
        
    // })
});
</script>
</html>