<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>微信支付订单-装途网</title>
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/base.css">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/pay_page.css">
</head>
<body class="bdwxpay">
<?php
    try {
        $result = \beecloud\rest\api::bill($data);
        if ($result->result_code != 0) {
            echo json_encode($result);
            exit();
        }
        $code_url = $result->code_url;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>

<div class="conwhole paywxhead">
    <div class="conpaywx headin">
        <img src="{$config_siteurl}statics/zt/images/pay_page/wei.jpg">
    </div>
</div>
<div class="conpaywx">
    <div class="paywxtit">
        <strong>装途网订单支付</strong>
        <span class="shoukuan">收款方：山西窝牛信息技术有限公司</span>
        <div class="jine" style="display: none;">
            <span>{$total_fee}</span>元
        </div>
    </div>
    <div class="qrcodearea">
        <div class="arealt">
            <strong>微信扫码支付</strong>
            <div class="qrcodebox" id="qrcodebox"></div>
            <p class="old"><span>42</span>秒后此二维码过期</p>
            <p class="else"><a href="/Buyer/Cart/orderpay/pay_sn/270519490263663000.html">使用其他方式付款 >></a></p>
        </div>
            <img src="{$config_siteurl}statics/zt/images/pay_page/wxboxright.jpg" class="areart">
    </div>
</div>

<div align="center" style="display: none;">
    <p>id：<?php echo $result->id; ?></p>
    <p>订单号：<?php echo $data["bill_no"]; ?></p>
    <p id="query-result"></p>
</div>



<template file="common/_promise.php"/>
<template file="common/_footer.php"/>

<script src="{$config_siteurl}statics/zt/js/jquery.min.js"></script>
<script src="{$config_siteurl}statics/js/qrcode.js"></script>
<script>
    if(<?php echo $code_url != NULL; ?>) {
        var options = {text: "<?php echo $code_url;?>"};
        //参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
        var canvas = BCUtil.createQrCode(options);
        var element=document.getElementById("qrcodebox");
        element.appendChild(canvas);
    }

$(function(){
    freshwxpay();
})

function freshwxpay(){
    $.ajax({
        type:"GET",
        url: "/buyer/cart/order_status?pay_sn={$data['bill_no']}",
        dataType:"json",
        timeout:5000,
        success: function(data,status){
            if(data.status==1){
                window.location.href = "{:U('paysuccess',array('trade_status'=>'TRADE_SUCCESS','out_trade_no'=>$data['bill_no']))}";
            }
            else{

                setTimeout(freshwxpay,3000);
            }
            voidrepeat=0;
        }
        ,error:function(XHR, textStatus, errorThrown){
            voidrepeat=0;
            console.log(textStatus+"\n"+errorThrown);
        }
    });
}

</script>


</body>
</html>