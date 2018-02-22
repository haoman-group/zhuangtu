<html>
<head>
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
    <div class="readdress">
        <form method="post" id="form_useraddr"  class="address_forms" onsubmit="return false" >
            <h2 class="new_box_add">新增宝贝所在地址</h2>
           <!--  <empty name="Think.get.id">
                <input type='hidden' value='addAddr' name='a'>
                <else/>
                <input type='hidden' value='editAddr' name='a'>
            </empty> -->
            <input type="text" name="id" value="<if condition="$Think.get.id eq 'undefined'"><else/>{$Think.get.id}</if>" hidden/>


            <dl class="news_box">
                <dt>所在地区</dt>
                <dd class="areas"><select id="area"></select><input type="hidden" style="opacity: 0; width: 0px;" name="area" class="area" value="{$addr.area}"/></dd>
                <dt>详细地址</dt>
                <dd><textarea class="detailed" type="text" name="address" value="{$addr.address}" placeholder="例如接到名称，门牌号码，楼层和房间号等信息">{$addr.address}</textarea></dd>
                <dt>邮政编码</dt>
                <dd><input type="text" name="postcode" value="{$addr.postcode}"  placeholder="如您不清楚邮递区号，请填写030000"</dd>
                <dt>商家名称</dt>
                <dd><input type="text" name="name" value="{$addr.name}" /></dd>
                <dt>手机号码</dt>
                <dd><input type="text" name="phone" value="{$addr.phone}" /></dd>
                <dt>电子邮箱</dt>
                <dd><input type="text" name="email" value="{$addr.email}" /></dd>
                <!--<input type="text" name="手机号码"/>-->
                <!--<dt>设置为默认地址</label>-->
                <!--<input type="checkbox" name="default" value="1" <if condition="$addr.default == 1">checked</if> />-->
                <!--<dd class="default"><input type="checkbox" id="default"><label for="default">设为默认收货地址</label></dd>-->
                <dd>
                    <input type="submit" value="保存" class="preservation" />
                    <input type="button" class="btncancel" value="取消" >
                </dd>
            </dl>
        </form>
    </div>
    <script>
        var opts = {
            ajax: '/Api/Buyeraddr/getArea',
            selStyle: 'margin-left: 3px;',
            select: '#area',
            loaderImg:'/statics/js/linkagesel/ui-anim_basic_16x16.gif',
            defVal:[<?php echo $addr['area'] ?>]
    };
    var linkageSel = new LinkageSel(opts);
     linkageSel.onChange(function() {
        var selected = linkageSel.getSelectedArr();
        $(".area").val(selected.toString());
    });



    $(function(){
        $("#form_useraddr").validate({
            errorElement : "i",
            ignore :"",
            onkeyup : false,
            submitHandler : function(form){
                $(form).attr("action","{:U("Api/Selleraddr/add")}")
                $(form).ajaxSubmit({
                    "success":function(res){
                        console.log(res);
                        if(self != top){
                            top.location.reload();
                        }
                    },
                    "error":function(res){

                    }
                });

            },
            rules : {
                area:{
                    chkarea:true
                },
                address:{
                    required:true
                },
                name:{
                    required:true
                },
                phone:{
                    required:true,
                    chkallphone:true

                },
                email:{
                    chkemails:true
                }

            },
            messages : {
                area:{
                    chkarea:"请填写完整地区"
                },
                address:{
                    required:"必填"
                },
                name:{
                    required:"必填"
                },
                phone:{
                    required:"必填",
                    chkallphone : "手机号码不正确"
                },
                email:{
                    chkemails:"请输入正确邮箱"
                }
            }
        });

        jQuery.validator.addMethod("chkallphone", function(value, element) {
            return /^(1[3|4|5|8|7|9][0-9]\d{8})|(0\d{2,3}-\d{5,9}|0\d{2,3}-\d{5,9})$/.test(value);
        });

        jQuery.validator.addMethod("chkemails",function(value,element){
            return /^([\w!#$%&'*+/=?^_`{|}~-]+(?:\.[\w!#$%&'*+/=?^_`{|}~-]+)*@(?:[\w](?:[\w-]*[\w])?\.)+[\w](?:[\w-]*[\w])?)?$/.test(value);
        });
        jQuery.validator.addMethod("postcode", function(value, element){
            return /^[1-9]\d{5}(?!\d)$/.test(value);
        });
        jQuery.validator.addMethod("chkarea", function(value, element){
            return /^\d{1,4}\,\d{1,4}\,\d{1,4}$/.test(value);
        });


        $(".btncancel").click(function(){
            parent.layer.closeAll();
        });
    });
    </script>
    </body>
</html>