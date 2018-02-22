<html>
<head>
	<title>修改搜索排名</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css" />
    <script type="text/javascript" src="/statics/zt/js/jquery.js"></script>
    <script src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script src="{$config_siteurl}statics/js/ajaxForm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
</head>
<body>

	<form class="changeRank"  onsubmit="return false" >
        <h2 class="new_box_add">修改搜索排名</h2>
        <input name="prodid" value="{$prod.id}" hidden>
        <dl>
            <dt>原始排名：</dt>
            <dd><input value="{$prod.rank}"></dd>
            <dt>修改排名：</dt>
            <dd><input name="new_rank" ></dd>
            <dd>
                <input type="submit" value="提交">
                <input type="button" class="btncancel" value="取消" >
            </dd>
        </dl>
	</form>
</body>
<script type="text/javascript">
    $(function() {
        $(".changeRank").validate({
        errorElement: "i",
        onkeyup: false,
        submitHandler: function(form) {
            $(form).attr("action", "{:U('Api/Product/changeRank')}")
            $(form).ajaxSubmit({
                "success": function(res) {
                var data = $.parseJSON(res);
                if(data.status != '1')
                {
                    alert(data.msg);
                }
                if (self != top) {
                    parent.layer.closeAll();
                }
            },
                "error": function(res) {

            }
            });

        },
        rules: {
            new_rank: {
                required: true
            }
        },
        messages: {
            new_rank: {
                required: "请填写新的搜索排名"
            }
        }
    });

    $(".btncancel").click(function() {
        parent.layer.closeAll();
    });
});
</script>
</html>