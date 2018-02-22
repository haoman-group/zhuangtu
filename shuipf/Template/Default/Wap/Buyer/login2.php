<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>用户注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="{$config_siteurl}statics/wap/css/mobileclient.css" >
</head>
<body>

<div class="log_con lotos">
    <form class="dlform">
        <dl class="">
            <dt>所在国家/地区</dt>
            <dd>
                <select  class="valid">
                    <option value="86" selected="">中国</option>
                    <option value="1">美国</option>
                    <option value="49">德国</option>
                    <option value="33">法国</option>
                </select>
            </dd>
        </dl>
        <dl>
            <dt>手机号码</dt>
            <dd class="ddin_s">
                <input type="text" placeholder="请输入你的手机号" name="mobile"><i class="error" id="tips"></i>
            </dd>
        </dl>
        <dl>
            <dt>验证码</dt>
            <dd class="ddin_s">
                <input class="sellerregfrom_verify_input" type="text" name="vcode">

                <img align="absmiddle" src="{$config_siteurl}statics/wap/images/pncw.png" title="看不清？点击更换" >
            </dd>
        </dl>

    </form>
    <div class="protocol">
        <span class="chkredin">
          <img src="/statics/zt/images/sub-MatPro_conb.png">
        </span>同意<a href="">《装途网服务协议》</a><a href="">《法律声明及隐私权政策》</a></div>
    <button>下一步</button>
</div>

</body>
</html>