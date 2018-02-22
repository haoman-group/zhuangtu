<html>
<head>
    <title>添加物流单号</title>
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
	<form class="send"  onsubmit="return false" >
        <h2 class="new_box_add">添加物流单号</h2>
        <input name="order_sn" value="{$order_sn}" hidden>
		<dt>物流单号：</dt>
        <dd><input name="shipping_code" ></dd>
        <dd>
                <input type="submit" value="提交">
                <input type="button" class="btncancel" value="取消" >
        </dd>
	</form>
</body>
<script type="text/javascript">

    $(function(){
        $(".send").validate({
            errorElement : "i",
            onkeyup : false,
            submitHandler : function(form){
                $(form).attr("action","{:U("Api/SellerOrder/send")}")
                $(form).ajaxSubmit({
                    "success":function(res){
                        // console.log(res);
                        var data = $.parseJSON(res);
                        if(data.status != '1')
                        {
                            alert(data.msg);
                        }
                        if(self != top){
                            top.location.reload();
                        }
                    },
                    "error":function(res){

                    }
                });

            },
            rules : {
                new_price:{
                    required : true
                }
            },
            messages : {
                new_price:{
                    required : "请填写价格"
                }
            }
        });

        $(".btncancel").click(function(){
            parent.layer.closeAll();
        });
    });
</script>
</html>