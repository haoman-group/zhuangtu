<?php
/**
 * 微信用户的openid获取请参考官方demo sdk和文档
 * https://pay.weixin.qq.com/wiki/doc/api/jsapi.php?chapter=11_1
 * 微信获取openid php代码, 运行环境是微信内置浏览器访问时
 */
include_once('vendor/beecloud.cn/rest/demo/lib/WxPayPubHelper/WxPayPubHelper.php');
$jsApi = new \JsApi_pub();
//网页授权获取用户openid============
//通过code获得openid
if(!$data['openid']){
    if (!isset($_GET['code'])){
        //触发微信返回code码
        // $url = $jsApi->createOauthUrlForCode(\WxPayConf_pub::JS_API_CALL_URL);
        $url = $jsApi->createOauthUrlForCode(urlencode("http://www.zhuangtu.net/Buyer/Cart/pay/?payment_code=WX_JSAPI&pay_sn=".$data['bill_no']));
        Header("Location: $url");
    } else {
        //获取code码，以获取openid
        $code = $_GET['code'];
        $jsApi->setCode($code);
        $openid = $jsApi->getOpenId();
    }

    $data["openid"] = $openid;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>微信支付订单-装途网</title>
</head>
<?php
    try {
        $result = \beecloud\rest\api::bill($data);
        if ($result->result_code != 0) {
            echo json_encode($result);
            exit();
        }
        $jsApiParam = array(
        "appId" => $result->app_id,
        "timeStamp" => $result->timestamp,
        "nonceStr" => $result->nonce_str,
        "package" => $result->package,
        "signType" => $result->sign_type,
        "paySign" => $result->pay_sign
    );
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
<script type="text/javascript">
    //调用微信JS api 支付
    function jsApiCall() {
        WeixinJSBridge.invoke(
            'getBrandWCPayRequest',
            <?php echo json_encode($jsApiParam);?>,
            function(res){
                WeixinJSBridge.log(res.err_msg);
                //alert(res.err_msg);
                //window.location.href = '';
            }
        );
    }
    function callpay() {
        if (typeof WeixinJSBridge == "undefined"){
            if( document.addEventListener ){
                document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
            }else if (document.attachEvent){
                document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
            }
        }else{
            jsApiCall();
        }
    }
</script>
<body onload="callpay();"> </body>
</html>