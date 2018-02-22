<html>
<head>
	<title>分期付款</title>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/index.css" type="text/css" />
    <!--<link rel="stylesheet" href="{$config_siteurl}statics/zt/css/buyercenter.css" type="text/css" />-->
    <link rel="stylesheet" href="{$config_siteurl}statics/zt/css/shipping_address_news.css" type="text/css"/>
    <script type="text/javascript" src="/statics/zt/js/jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/layer/layer.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/base_jquery.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/ajaxForm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/zt/js/jquery.validate.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/comm.js"></script>
    <script type="text/javascript" src="{$config_siteurl}statics/js/linkagesel/linkagesel-min.js"></script>
</head>
<body>
	<form class="seller_installment"  onsubmit="return false" method="post">
        <input name="order_sn" value="{$order.order_sn}" hidden>
        <ul class="installment_num clearfix">
            <li class="on"><a href="javascript:void(0)">分两期</a></li>
            <li><a href="javascript:void(0)">分三期</a></li>
            <li><a href="javascript:void(0)">工长流程</a></li>
        </ul>
        <div class="install_list">
            <table class='active'>
                <tr>
                    <th>百分比</th>
                    <th>金额</th>
                    <th>名称说明</th>
                    <th>分开付</th>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="precent[1]" value="50%"></td>
                    <td><input type="text" class="" name="ins_amount[1]" value="">元</td>
                    <td>
                      <input type="text" class="select" name="ins_desc[1]">
                      <select>
                          <option>首付</option>
                          <option>尾款</option>
                      </select>
                    </td>
                    <td>首期付款</td>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="precent[2]" value="50%"></td>
                    <td><input type="text" class="" name="ins_amount[2]" value="">元</td>
                    <td>
                      <input type="text" class="select" name="ins_desc[2]">
                      <select>
                          <option>首付</option>
                          <option>尾款</option>
                      </select>
                    </td>
                    <td>第二期付款</td>
                </tr>
            </table>
            <table hidden>
                <tr>
                    <th>百分比</th>
                    <th>金额</th>
                    <th>名称说明</th>
                    <th>分开付</th>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="precent[1]" value="50%"></td>
                    <td><input type="text" class="" name="ins_amount[1]" value="1000">元</td>
                    <td>
                      <input type="text" class="select" name="ins_desc[1]">
                      <select>
                          <option>首付</option>
                          <option>尾款</option>
                      </select>
                    </td>
                    <td>首期付款</td>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="precent[2]" value="50%"></td>
                    <td><input type="text" class="" name="ins_amount[2]" value="1000">元</td>
                    <td>
                      <input type="text" class="select" name="ins_desc[2]">
                      <select>
                          <option>首付</option>
                          <option>尾款</option>
                      </select>
                    </td>
                    <td>第二期付款</td>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="precent[3]" value="50%"></td>
                    <td><input type="text" class="" name="ins_amount[3]" value="1000">元</td>
                    <td>
                      <input type="text" class="select"  name="ins_desc[3]">
                      <select>
                          <option>首付</option>
                          <option>尾款</option>
                      </select>
                    </td>
                    <td>第三期付款</td>
                </tr>
            </table>
            <table hidden class="work_boss">
                <tr>
                    <th>金额</th>
                    <th>名称说明</th>
                    <th>分开付</th>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="" value="1000" ><span>元</span></td>
                    <td>
                      <input type="text" value="工长服务费+水电工服务费">
                    </td>
                    <td>首期付款</td>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="" value="1000"><span>元</span></td>
                    <td>
                      <input type="text" value="铺地瓦工服务费">
                    </td>
                    <td>第二期付款</td>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="" value="1000"><span>元</span></td>
                    <td>
                      <input type="text" value="吊顶木工服务费">
                    </td>
                    <td>第三期付款</td>
                </tr>
                <tr>
                    <td>*<input type="text" class="" name="" value="1000"><span>元</span></td>
                    <td>
                      <input type="text" value="刮家油工服务费">
                    </td>
                    <td>第四期付款</td>
                </tr>
            </table>
            <p class="description">注：百分比可修改，金额随着百分比计算，名称下拉可选择，也可以自行修改。</p>
            <div class="btn">
                <input type="submit" class="ins_form_submit" value="确定">
                <input type="button" class="btncancel" value="取消" >
            </div>
        </div>
	</form>
</body>
<script type="text/javascript">
$(function() {
    var order_amount = <?=$order['order_amount']?>;
    $(".ins_form_submit").click(function(){
        $.post(
          "/Seller/Order/installment",
          $('.seller_installment').serialize(),
          function(data){
            if(data.status == 1){
              parent.layer.closeAll();
            }else{
                alert(data.msg);
            }
          },
          "json"
          );
    });
    $(".btncancel").click(function() {
        parent.layer.closeAll();
    });

    $(".real_price").find("span").html($(".after_price").val());

    $(".after_price").keyup(function(){
        $(".real_price").find("span").html($(".after_price").val());
    })
    // 初始化input
    $(".select").val($(".select").next("select").val());
    $('table:not(".active")').find("input").attr("disabled","disabled");
    // input的值随select的值改变
    $("select").on("change",function(){
        $(this).prev(".select").val($(this).val());
    });
    // tab切换
    $(".installment_num").find("a").on("click",function(){
        var index = $(this).parent("li").index();
        $(this).parent("li").addClass("on").siblings().removeClass("on");
        $(".install_list").find("table").eq(index).show().find("input").removeAttr("disabled").end().siblings("table").hide().find("input").attr("disabled","disabled");
        if(index == 2){
            $(".description").html("注：金额可修改，最后一个自动显示剩下未分配的价格，名称可以自行修改");
        }else{
            $(".description").html("注：百分比可修改，金额随着百分比计算，名称下拉可选择，也可以自行修改。");
        }
    });

});
</script>
</html>
