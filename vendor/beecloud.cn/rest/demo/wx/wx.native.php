<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>BeeCloud微信扫码示例</title>
</head>
<body>
<?php
    try {
        $result = $api->bill($data);
        if ($result->result_code != 0) {
            print_r($result);
            exit();
        }
        $code_url = $result->code_url;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
<div align="center" id="qrcode" ></div>
<div align="center">
    <p>id：<?php echo $result->id; ?></p>
    <p>订单号：<?php echo $data["bill_no"]; ?></p>
    <button id="query">查询订单状态</button>
    <p id="query-result"></p>
</div>
</body>
<script src="statics/jquery-1.11.1.min.js"></script>
<script src="statics/qrcode.js"></script>
<script>
    if(<?php echo $code_url != NULL; ?>) {
        var options = {text: "<?php echo $code_url;?>"};
        //参数1表示图像大小，取值范围1-10；参数2表示质量，取值范围'L','M','Q','H'
        var canvas = BCUtil.createQrCode(options);
        var wording=document.createElement('p');
        wording.innerHTML = "扫我 扫我";
        var element=document.getElementById("qrcode");
        element.appendChild(wording);
        element.appendChild(canvas);
    }
    $('#query').click(function(){
        $.getJSON('wx/wx.native.query.php', {'billNo' : '<?php echo $data["bill_no"]; ?>'}, function(res){
            var str = '';
            if (res && res.result_msg == "OK" && res.count > 0) {
                str = res.bills[0].spay_result?"支付成功":"未支付";
            }else{
                str = 'Error: ' + res.err_detail;
            }
            $('#query-result').text(str);
        })
    });
</script>
</body>
</html>